<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AcademicTransition;
use App\Models\Student;
use App\Models\Program;
use App\Models\WorkShiftType;
use Carbon\Carbon;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AcademicTransitionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_academic_transition', 1);
        $this->route = 'admin.academic-transition';
        $this->view = 'admin.academic-transition';
        $this->path = 'academic-transition';
        $this->access = 'academic-transition';


        $this->middleware('permission:'.$this->access.'-view|'.$this->access.'-create|'.$this->access.'-edit|'.$this->access.'-delete', ['only' => ['index','show']]);
        $this->middleware('permission:'.$this->access.'-create', ['only' => ['create','store']]);
        $this->middleware('permission:'.$this->access.'-edit', ['only' => ['edit','update','status']]);
        $this->middleware('permission:'.$this->access.'-delete', ['only' => ['destroy']]);
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


        if(!empty($request->type) || $request->type != null){
            $data['selected_type'] = $type = $request->type;
        }
        else{
            $data['selected_type'] = $type = '0';
        }

        if(!empty($request->status) || $request->status != null){
            $data['selected_status'] = $status = $request->status;
        }
        else{
            $data['selected_status'] = $status = '99';
        }

        if(!empty($request->start_date) || $request->start_date != null){
            $data['selected_start_date'] = $start_date = $request->start_date;
        }
        else{
            $data['selected_start_date'] = $start_date = date('Y-m-d', strtotime(Carbon::now()->subYear()));
        }

        if(!empty($request->end_date) || $request->end_date != null){
            $data['selected_end_date'] = $end_date = $request->end_date;
        }
        else{
            $data['selected_end_date'] = $end_date = date('Y-m-d', strtotime(Carbon::today()));
        }


        // Search Filter
        $data['students'] = Student::where('status', '1')->orderBy('student_id', 'asc')->get();
        $data['programs'] = Program::where('status', '1')->orderBy('title', 'asc')->get();
        $data['workShifts'] = WorkShiftType::where('status', '1')->orderBy('title', 'asc')->get();

        $rows = AcademicTransition::whereDate('created_at', '>=', $start_date)
                    ->whereDate('created_at', '<=', $end_date);
                    if(!empty($request->type) || $request->type != null){
                        $rows->where('type', $type);
                    }
                    if(!empty($request->status) || $request->status != null && $status != '99'){
                        $rows->where('status', $status);
                    }
        $data['rows'] = $rows->orderBy('id', 'desc')->get();

        return view($this->view.'.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;

        $data['students'] = Student::where('status', '1')->orderBy('student_id', 'asc')->get();
        $data['programs'] = Program::where('status', '1')->orderBy('title', 'asc')->get();
        $data['workShifts'] = WorkShiftType::where('status', '1')->orderBy('title', 'asc')->get();

        return view($this->view.'.create', $data);
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
            'type' => 'required',
            'reason' => 'required',
        ]);

        if($request->type == 1){
            $request->validate([
                'current_program' => 'required',
                'new_program' => 'required',
            ]);
        }

        if($request->type == 2){
            $request->validate([
                'current_work_shift' => 'required',
                'new_work_shift' => 'required',
            ]);
        }

        try{
            DB::beginTransaction();

            $student = Student::findOrFail($request->student);

            // Insert Data
            $transition = new AcademicTransition;
            $transition->student_id = $request->student;
            $transition->type = $request->type;
            $transition->current_program_id = $request->current_program ?? $student->program_id;
            $transition->new_program_id = $request->new_program ?? null;
            $transition->current_work_shift_id = $request->current_work_shift ?? null;
            $transition->new_work_shift_id = $request->new_work_shift ?? null;
            $transition->reason = $request->reason;
            $transition->note = $request->note;
            $transition->status = '1';
            $transition->created_by = Auth::guard('web')->user()->id;
            $transition->save();

            DB::commit();

            Toastr::success(__('msg_created_successfully'), __('msg_success'));

            return redirect()->route($this->route.'.index');
        }
        catch(\Exception $e){

            Toastr::error(__('msg_created_error'), __('msg_error'));

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AcademicTransition  $academicTransition
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicTransition $academicTransition)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;

        $data['row'] = $academicTransition;

        return view($this->view.'.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AcademicTransition  $academicTransition
     * @return \Illuminate\Http\Response
     */
    public function edit(AcademicTransition $academicTransition)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;

        $data['row'] = $academicTransition;
        $data['students'] = Student::where('status', '1')->orderBy('student_id', 'asc')->get();
        $data['programs'] = Program::where('status', '1')->orderBy('title', 'asc')->get();
        $data['workShifts'] = WorkShiftType::where('status', '1')->orderBy('title', 'asc')->get();

        return view($this->view.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AcademicTransition  $academicTransition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcademicTransition $academicTransition)
    {
        // Field Validation
        $request->validate([
            'student' => 'required',
            'type' => 'required',
            'reason' => 'required',
        ]);

        if($request->type == 1){
            $request->validate([
                'current_program' => 'required',
                'new_program' => 'required',
            ]);
        }

        if($request->type == 2){
            $request->validate([
                'current_work_shift' => 'required',
                'new_work_shift' => 'required',
            ]);
        }

        // Update Data
        $academicTransition->student_id = $request->student;
        $academicTransition->type = $request->type;
        $academicTransition->current_program_id = $request->current_program;
        $academicTransition->new_program_id = $request->new_program;
        $academicTransition->current_work_shift_id = $request->current_work_shift;
        $academicTransition->new_work_shift_id = $request->new_work_shift;
        $academicTransition->reason = $request->reason;
        $academicTransition->note = $request->note;
        $academicTransition->updated_by = Auth::guard('web')->user()->id;
        $academicTransition->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AcademicTransition  $academicTransition
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcademicTransition $academicTransition)
    {
        // Delete data
        $academicTransition->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Update status for approval/rejection.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $id)
    {
        // Field Validation
        $request->validate([
            'status' => 'required',
        ]);

        try{
            DB::beginTransaction();

            $transition = AcademicTransition::findOrFail($id);

            if($request->status == '2'){
                $transition->status = '2';
                $transition->approved_by = Auth::guard('web')->user()->id;
                $transition->approved_at = now();

                // Apply transition to student
                $student = Student::findOrFail($transition->student_id);
                
                if($transition->type == 1){
                    $student->program_id = $transition->new_program_id;
                }
                elseif($transition->type == 2){
                    // Update work shift in current enroll if exists
                    $currentEnroll = $student->currentEnroll;
                    if($currentEnroll){
                        // Note: Work shift is stored in User model, not in StudentEnroll
                        // This would need to be handled differently if work shift affects enrollment
                    }
                }
                
                $student->save();

                Toastr::success(__('msg_approve_successfully'), __('msg_success'));
            }
            elseif($request->status == '3'){
                $transition->status = '3';
                $transition->rejected_by = Auth::guard('web')->user()->id;
                $transition->rejected_at = now();

                Toastr::success(__('msg_reject_successfully'), __('msg_success'));
            }

            $transition->updated_by = Auth::guard('web')->user()->id;
            $transition->save();

            DB::commit();

            return redirect()->back();
        }
        catch(\Exception $e){

            Toastr::error(__('msg_created_error'), __('msg_error'));

            return redirect()->back();
        }
    }
}

