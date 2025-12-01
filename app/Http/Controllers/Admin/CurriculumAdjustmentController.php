<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CurriculumAdjustment;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;
use App\Traits\FileUploader;

class CurriculumAdjustmentController extends Controller
{
    use FileUploader;

    public function __construct()
    {
        $this->title = trans_choice('module_curriculum_adjustment', 1);
        $this->route = 'admin.curriculum-adjustment';
        $this->view = 'admin.curriculum-adjustment';
        $this->path = 'curriculum-adjustment';
        $this->access = 'curriculum-adjustment';

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

        $data['selected_program'] = $programId = $request->get('program', '0');
        $data['selected_status'] = $status = $request->get('status', '99');

        $data['programs'] = Program::where('status', '1')->orderBy('title', 'asc')->get();

        $rows = CurriculumAdjustment::query();

        if ($programId != '0') {
            $rows->where('program_id', $programId);
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

        $data['programs'] = Program::where('status', '1')->orderBy('title', 'asc')->get();

        return view($this->view . '.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'program' => 'required',
            'title' => 'required|max:255',
            'description' => 'nullable',
            'regulation_reference' => 'nullable|max:255',
            'effective_date' => 'nullable|date',
            'changes_summary' => 'nullable',
            'attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,rar,csv,xls,xlsx,ppt,pptx|max:20480',
        ]);

        try {
            DB::beginTransaction();

            $adjustment = new CurriculumAdjustment();
            $adjustment->program_id = $request->program;
            $adjustment->title = $request->title;
            $adjustment->description = $request->description;
            $adjustment->regulation_reference = $request->regulation_reference;
            $adjustment->effective_date = $request->effective_date;
            $adjustment->changes_summary = $request->changes_summary;
            $adjustment->status = '2'; // Pending Approval
            $adjustment->created_by = Auth::guard('web')->user()->id;
            $adjustment->attach = $this->uploadMedia($request, 'attach', $this->path);
            $adjustment->save();

            DB::commit();

            Toastr::success(__('msg_created_successfully'), __('msg_success'));
            return redirect()->route($this->route . '.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error(__('msg_created_error'), __('msg_error'));
            return redirect()->back()->withInput();
        }
    }

    public function show(CurriculumAdjustment $curriculumAdjustment)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['row'] = $curriculumAdjustment;

        return view($this->view . '.show', $data);
    }

    public function edit(CurriculumAdjustment $curriculumAdjustment)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['row'] = $curriculumAdjustment;

        $data['programs'] = Program::where('status', '1')->orderBy('title', 'asc')->get();

        return view($this->view . '.edit', $data);
    }

    public function update(Request $request, CurriculumAdjustment $curriculumAdjustment)
    {
        $request->validate([
            'program' => 'required',
            'title' => 'required|max:255',
            'description' => 'nullable',
            'regulation_reference' => 'nullable|max:255',
            'effective_date' => 'nullable|date',
            'changes_summary' => 'nullable',
            'attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,rar,csv,xls,xlsx,ppt,pptx|max:20480',
        ]);

        try {
            DB::beginTransaction();

            $curriculumAdjustment->program_id = $request->program;
            $curriculumAdjustment->title = $request->title;
            $curriculumAdjustment->description = $request->description;
            $curriculumAdjustment->regulation_reference = $request->regulation_reference;
            $curriculumAdjustment->effective_date = $request->effective_date;
            $curriculumAdjustment->changes_summary = $request->changes_summary;
            $curriculumAdjustment->updated_by = Auth::guard('web')->user()->id;
            $curriculumAdjustment->attach = $this->updateMedia($request, 'attach', $this->path, $curriculumAdjustment);
            $curriculumAdjustment->save();

            DB::commit();

            Toastr::success(__('msg_updated_successfully'), __('msg_success'));
            return redirect()->route($this->route . '.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error(__('msg_updated_error'), __('msg_error'));
            return redirect()->back()->withInput();
        }
    }

    public function destroy(CurriculumAdjustment $curriculumAdjustment)
    {
        try {
            DB::beginTransaction();
            $this->deleteMedia($this->path, $curriculumAdjustment);
            $curriculumAdjustment->delete();
            DB::commit();

            Toastr::success(__('msg_deleted_successfully'), __('msg_success'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error(__('msg_deleted_error'), __('msg_error'));
            return redirect()->back();
        }
    }

    public function status(Request $request, CurriculumAdjustment $curriculumAdjustment)
    {
        $request->validate([
            'status' => 'required|in:0,1', // 0 for Inactive, 1 for Active (approve)
        ]);

        try {
            DB::beginTransaction();

            if ($request->status == 1) { // Active (Approved)
                $curriculumAdjustment->status = '1';
                $curriculumAdjustment->approved_by = Auth::guard('web')->user()->id;
                $curriculumAdjustment->approved_at = Carbon::now();
                Toastr::success(__('msg_approved_transition'), __('msg_success'));
            } elseif ($request->status == 0) { // Inactive
                $curriculumAdjustment->status = '0';
                Toastr::success(__('msg_status_changed'), __('msg_success'));
            }

            $curriculumAdjustment->updated_by = Auth::guard('web')->user()->id;
            $curriculumAdjustment->save();
            DB::commit();

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error(__('msg_updated_error'), __('msg_error'));
            return redirect()->back();
        }
    }
}
