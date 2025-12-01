<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentEnroll;
use Illuminate\Http\Request;
use App\Models\Semester;
use App\Models\Program;
use App\Models\Section;
use App\Models\Session;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Grade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SectionCapacityNotification;
use App\User;
use Yoeunes\Toastr\Facades\Toastr;

class StudentSingleEnrollController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_single_enroll', 1);
        $this->route = 'admin.single-enroll';
        $this->view = 'admin.single-enroll';
        $this->path = 'student';
        $this->access = 'student-enroll';

        $this->middleware('permission:'.$this->access.'-single');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;


        $data['students'] = Student::whereHas('currentEnroll')->where('status', '1')->orderBy('student_id', 'asc')->get();
        
        if(!empty($request->student) && $request->student != Null){

            $data['selected_student'] = $request->student;

            $data['row'] = $student = Student::where('student_id', $request->student)->first();

            // Filter Enroll Data
            $data['programs'] = Program::where('status', '1')->orderBy('title', 'asc')->get();

            $data['sessions'] = Session::with('programs')->whereHas('programs', function ($query) use ($student){
                $query->where('program_id', $student->program_id);
            })->where('status', '1')->orderBy('id', 'desc')->get();
            
            $data['semesters'] = Semester::with('programs')->whereHas('programs', function ($query) use ($student){
                $query->where('program_id', $student->program_id);
            })->where('status', '1')->orderBy('id', 'asc')->get();

            $sections = Section::with('semesterPrograms')->whereHas('semesterPrograms', function ($query) use ($student){
                $query->where('program_id', $student->program_id);
            })->where('status', '1')->orderBy('title', 'asc')->get();
            
            // Add capacity information to sections
            foreach ($sections as $section) {
                $section->available_seats = -1;
                $section->enrolled_count = 0;
                $section->capacity_percentage = null;
                
                if ($section->seat !== null) {
                    $currentEnroll = $student->currentEnroll;
                    if ($currentEnroll) {
                        $enrolledCount = $section->studentEnrolls()
                            ->where('program_id', $student->program_id)
                            ->where('session_id', $currentEnroll->session_id)
                            ->where('semester_id', $currentEnroll->semester_id)
                            ->where('status', '1')
                            ->count();
                        
                        $section->enrolled_count = $enrolledCount;
                        $section->available_seats = max(0, $section->seat - $enrolledCount);
                        $section->capacity_percentage = ($enrolledCount / $section->seat) * 100;
                    }
                }
            }
            
            $data['sections'] = $sections;

            $data['subjects'] = Subject::with('programs')->whereHas('programs', function ($query) use ($student){
                $query->where('program_id', $student->program_id);
            })->where('status', '1')->orderBy('code', 'asc')->get();

            $data['grades'] = Grade::where('status', '1')->orderBy('min_mark', 'desc')->get();
        }
        else {
            $data['selected_student'] = Null;
        }

        return view($this->view.'.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Field Validation
        $request->validate([
            'student' => 'required',
            'program' => 'required',
            'semester' => 'required',
            'session' => 'required',
            'section' => 'required',
            'subjects' => 'required',
        ]);


        try{
            DB::beginTransaction();
            
            // Check section capacity
            $section = Section::find($request->section);
            if ($section && $section->seat !== null) {
                $enrolledCount = $section->studentEnrolls()
                    ->where('program_id', $request->program)
                    ->where('session_id', $request->session)
                    ->where('semester_id', $request->semester)
                    ->where('status', '1')
                    ->count();
                
                if ($enrolledCount >= $section->seat) {
                    Toastr::error(__('msg_section_full'), __('msg_error'));
                    return redirect()->back();
                }
            }

            // Duplicate Enroll Check
            $duplicate_check = StudentEnroll::where('student_id', $request->student)->where('session_id', $request->session)->where('semester_id', $request->semester)->where('section_id', $request->section)->first();
            $session_check = StudentEnroll::where('student_id', $request->student)->where('session_id', $request->session)->first();
            // $semester_check = StudentEnroll::where('student_id', $request->student)->where('semester_id', $request->semester)->first();

            if(!isset($duplicate_check) && !isset($session_check)){
                // Pre Enroll Update
                $pre_enroll = StudentEnroll::where('student_id', $request->student)->where('status', '1')->first();
                if(isset($pre_enroll)){
                    $pre_enroll->status = '0';
                    $pre_enroll->save();
                }

                // Student New Enroll
                $enroll = new StudentEnroll;
                $enroll->student_id = $request->student;
                $enroll->program_id = $request->program;
                $enroll->session_id = $request->session;
                $enroll->semester_id = $request->semester;
                $enroll->section_id = $request->section;
                $enroll->created_by = Auth::guard('web')->user()->id;
                $enroll->save();

                // Attach Subject
                $enroll->subjects()->attach($request->subjects);

                // Program Update
                $student = Student::find($request->student);
                $student->program_id = $request->program;
                $student->save();

                // Check capacity and send notifications
                if ($section && $section->seat !== null) {
                    $enrolledCount = $section->studentEnrolls()
                        ->where('program_id', $request->program)
                        ->where('session_id', $request->session)
                        ->where('semester_id', $request->semester)
                        ->where('status', '1')
                        ->count();
                    
                    $percentage = ($enrolledCount / $section->seat) * 100;
                    
                    if ($percentage >= 100 || ($percentage >= 80 && $percentage < 100)) {
                        $program = Program::find($request->program);
                        $session = Session::find($request->session);
                        $semester = Semester::find($request->semester);
                        
                        $admins = User::where('status', '1')->role('admin')->get();
                        
                        if ($admins->count() > 0) {
                            $notificationData = [
                                'section_id' => $section->id,
                                'section_title' => $section->title,
                                'program_id' => $request->program,
                                'program_title' => $program->title ?? '',
                                'session_id' => $request->session,
                                'session_title' => $session->title ?? '',
                                'semester_id' => $request->semester,
                                'semester_title' => $semester->title ?? '',
                                'enrolled_count' => $enrolledCount,
                                'capacity' => $section->seat,
                                'percentage' => $percentage,
                                'type' => $percentage >= 100 ? 'full' : 'nearly_full'
                            ];
                            
                            Notification::send($admins, new SectionCapacityNotification($notificationData));
                        }
                    }
                }

                Toastr::success(__('msg_promoted_successfully'), __('msg_success'));
            }
            else{

                Toastr::error(__('msg_enroll_already_exists'), __('msg_error'));
            }
            DB::commit();

            return redirect()->back();
        }
        catch(\Exception $e){

            Toastr::error(__('msg_created_error'), __('msg_error'));

            return redirect()->back();
        }
    }
}
