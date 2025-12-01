<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomRequest;
use App\Models\CustomRequestType;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;
use App\Traits\FileUploader;

class CustomRequestController extends Controller
{
    use FileUploader;

    public function __construct()
    {
        $this->title = trans_choice('module_custom_request', 1);
        $this->route = 'admin.custom-request';
        $this->view = 'admin.custom-request';
        $this->path = 'custom-request';
        $this->access = 'custom-request';

        $this->middleware('permission:' . $this->access . '-view|' . $this->access . '-create|' . $this->access . '-edit|' . $this->access . '-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:' . $this->access . '-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:' . $this->access . '-edit', ['only' => ['edit', 'update', 'status']]);
        $this->middleware('permission:' . $this->access . '-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;

        $data['selected_student'] = $studentId = $request->get('student', '0');
        $data['selected_type'] = $typeId = $request->get('request_type', '0');
        $data['selected_status'] = $status = $request->get('status', '99');

        $data['students'] = Student::where('status', '1')->orderBy('student_id', 'asc')->get();
        $data['requestTypes'] = CustomRequestType::where('status', '1')->orderBy('title', 'asc')->get();

        $rows = CustomRequest::query();

        if ($studentId != '0') {
            $rows->where('student_id', $studentId);
        }
        if ($typeId != '0') {
            $rows->where('request_type_id', $typeId);
        }
        if ($status != '99') {
            $rows->where('status', $status);
        }

        $data['rows'] = $rows->orderBy('id', 'desc')->get();

        return view($this->view . '.index', $data);
    }

    public function create()
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        $data['students'] = Student::where('status', '1')->orderBy('student_id', 'asc')->get();
        $data['requestTypes'] = CustomRequestType::where('status', '1')->orderBy('title', 'asc')->get();

        return view($this->view . '.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'student' => 'required',
            'request_type' => 'required',
            'title' => 'required|max:255',
            'description' => 'nullable',
            'attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,rar,csv,xls,xlsx,ppt,pptx|max:20480',
        ]);

        try {
            DB::beginTransaction();

            $customRequest = new CustomRequest();
            $customRequest->student_id = $request->student;
            $customRequest->request_type_id = $request->request_type;
            $customRequest->title = $request->title;
            $customRequest->description = $request->description;
            $customRequest->status = '1'; // Pending
            $customRequest->created_by = Auth::guard('web')->user()->id;
            $customRequest->attach = $this->uploadMedia($request, 'attach', $this->path);
            $customRequest->save();

            DB::commit();

            Toastr::success(__('msg_created_successfully'), __('msg_success'));
            return redirect()->route($this->route . '.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error(__('msg_created_error'), __('msg_error'));
            return redirect()->back()->withInput();
        }
    }

    public function show(CustomRequest $customRequest)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['row'] = $customRequest;

        return view($this->view . '.show', $data);
    }

    public function edit(CustomRequest $customRequest)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['row'] = $customRequest;

        $data['students'] = Student::where('status', '1')->orderBy('student_id', 'asc')->get();
        $data['requestTypes'] = CustomRequestType::where('status', '1')->orderBy('title', 'asc')->get();

        return view($this->view . '.edit', $data);
    }

    public function update(Request $request, CustomRequest $customRequest)
    {
        $request->validate([
            'student' => 'required',
            'request_type' => 'required',
            'title' => 'required|max:255',
            'description' => 'nullable',
            'attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,rar,csv,xls,xlsx,ppt,pptx|max:20480',
        ]);

        try {
            DB::beginTransaction();

            $customRequest->student_id = $request->student;
            $customRequest->request_type_id = $request->request_type;
            $customRequest->title = $request->title;
            $customRequest->description = $request->description;
            $customRequest->updated_by = Auth::guard('web')->user()->id;
            $customRequest->attach = $this->updateMedia($request, 'attach', $this->path, $customRequest);
            $customRequest->save();

            DB::commit();

            Toastr::success(__('msg_updated_successfully'), __('msg_success'));
            return redirect()->route($this->route . '.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error(__('msg_updated_error'), __('msg_error'));
            return redirect()->back()->withInput();
        }
    }

    public function destroy(CustomRequest $customRequest)
    {
        try {
            DB::beginTransaction();
            $this->deleteMedia($this->path, $customRequest);
            $customRequest->delete();
            DB::commit();

            Toastr::success(__('msg_deleted_successfully'), __('msg_success'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error(__('msg_deleted_error'), __('msg_error'));
            return redirect()->back();
        }
    }

    public function status(Request $request, CustomRequest $customRequest)
    {
        $request->validate([
            'status' => 'required|in:0,2', // 0 for Rejected, 2 for Approved
            'response' => 'nullable',
        ]);

        try {
            DB::beginTransaction();

            $customRequest->status = $request->status;
            $customRequest->response = $request->response;
            $customRequest->updated_by = Auth::guard('web')->user()->id;

            if ($request->status == 2) { // Approved
                $customRequest->approved_by = Auth::guard('web')->user()->id;
                $customRequest->approved_at = Carbon::now();
                $customRequest->rejected_by = null;
                $customRequest->rejected_at = null;

                Toastr::success(__('msg_approved_transition'), __('msg_success'));
            } elseif ($request->status == 0) { // Rejected
                $customRequest->rejected_by = Auth::guard('web')->user()->id;
                $customRequest->rejected_at = Carbon::now();
                $customRequest->approved_by = null;
                $customRequest->approved_at = null;
                Toastr::success(__('msg_rejected_transition'), __('msg_success'));
            }

            $customRequest->save();
            DB::commit();

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error(__('msg_updated_error'), __('msg_error'));
            return redirect()->back();
        }
    }
}
