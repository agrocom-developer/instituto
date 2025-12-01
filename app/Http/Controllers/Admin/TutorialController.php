<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tutorial;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\Student;
use Carbon\Carbon;
use App\User;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TutorialController extends Controller
{
    use FileUploader;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('module_tutorial', 1);
        $this->route = 'admin.tutorial';
        $this->view = 'admin.tutorial';
        $this->path = 'tutorial';
        $this->access = 'tutorial';


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


        if(!empty($request->student) || $request->student != null){
            $data['selected_student'] = $student = $request->student;
        }
        else{
            $data['selected_student'] = $student = '0';
        }

        if(!empty($request->tutor) || $request->tutor != null){
            $data['selected_tutor'] = $tutor = $request->tutor;
        }
        else{
            $data['selected_tutor'] = $tutor = '0';
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
            $data['selected_end_date'] = $end_date = date('Y-m-d', strtotime(Carbon::today()->addYear()));
        }


        // Search Filter
        $data['students'] = Student::where('status', '1')->orderBy('student_id', 'asc')->get();
        $data['tutors'] = User::where('status', '1')
                            ->whereHas('roles', function($query){
                                $query->whereIn('name', ['teacher', 'staff']);
                            })
                            ->orderBy('staff_id', 'asc')->get();

        $rows = Tutorial::whereDate('date', '>=', $start_date)
                    ->whereDate('date', '<=', $end_date);
                    if(!empty($request->student) || $request->student != null){
                        $rows->where('student_id', $student);
                    }
                    if(!empty($request->tutor) || $request->tutor != null){
                        $rows->where('tutor_id', $tutor);
                    }
                    if(!empty($request->status) || $request->status != null && $status != '99'){
                        $rows->where('status', $status);
                    }
        $data['rows'] = $rows->orderBy('date', 'desc')->orderBy('start_time', 'desc')->get();

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
        $data['tutors'] = User::where('status', '1')
                            ->whereHas('roles', function($query){
                                $query->whereIn('name', ['teacher', 'staff']);
                            })
                            ->orderBy('staff_id', 'asc')->get();

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
            'tutor' => 'required',
            'title' => 'required',
            'date' => 'required|date',
            'start_time' => 'required',
            'attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,rar,csv,xls,xlsx,ppt,pptx|max:20480',
        ]);

        try{
            DB::beginTransaction();

            // Insert Data
            $tutorial = new Tutorial;
            $tutorial->student_id = $request->student;
            $tutorial->tutor_id = $request->tutor;
            $tutorial->title = $request->title;
            $tutorial->topic = $request->topic;
            $tutorial->description = $request->description;
            $tutorial->date = $request->date;
            $tutorial->start_time = $request->start_time;
            $tutorial->end_time = $request->end_time;
            $tutorial->location = $request->location;
            $tutorial->notes = $request->notes;
            $tutorial->attach = $this->uploadMedia($request, 'attach', $this->path);
            $tutorial->status = '1';
            $tutorial->created_by = Auth::guard('web')->user()->id;
            $tutorial->save();

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
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function show(Tutorial $tutorial)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;

        $data['row'] = $tutorial;

        return view($this->view.'.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function edit(Tutorial $tutorial)
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;

        $data['row'] = $tutorial;
        $data['students'] = Student::where('status', '1')->orderBy('student_id', 'asc')->get();
        $data['tutors'] = User::where('status', '1')
                            ->whereHas('roles', function($query){
                                $query->whereIn('name', ['teacher', 'staff']);
                            })
                            ->orderBy('staff_id', 'asc')->get();

        return view($this->view.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tutorial $tutorial)
    {
        // Field Validation
        $request->validate([
            'student' => 'required',
            'tutor' => 'required',
            'title' => 'required',
            'date' => 'required|date',
            'start_time' => 'required',
            'attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,rar,csv,xls,xlsx,ppt,pptx|max:20480',
        ]);

        // Update Data
        $tutorial->student_id = $request->student;
        $tutorial->tutor_id = $request->tutor;
        $tutorial->title = $request->title;
        $tutorial->topic = $request->topic;
        $tutorial->description = $request->description;
        $tutorial->date = $request->date;
        $tutorial->start_time = $request->start_time;
        $tutorial->end_time = $request->end_time;
        $tutorial->location = $request->location;
        $tutorial->notes = $request->notes;
        $tutorial->outcome = $request->outcome;
        $tutorial->attach = $this->updateMedia($request, 'attach', $this->path, $tutorial);
        $tutorial->updated_by = Auth::guard('web')->user()->id;
        $tutorial->save();


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tutorial $tutorial)
    {
        // Delete Attach
        $this->deleteMedia($this->path, $tutorial);

        // Delete data
        $tutorial->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }

    /**
     * Update status for tutorial.
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

        // Status Update
        $tutorial = Tutorial::findOrFail($id);
        $tutorial->status = $request->status;
        $tutorial->updated_by = Auth::guard('web')->user()->id;
        $tutorial->save();


        Toastr::success(__('msg_status_changed'), __('msg_success'));

        return redirect()->back();
    }
}

