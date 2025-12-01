<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomRequestType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;

class CustomRequestTypeController extends Controller
{
    public function __construct()
    {
        $this->title = trans_choice('module_custom_request_type', 1);
        $this->route = 'admin.custom-request-type';
        $this->view = 'admin.custom-request-type';
        $this->path = 'custom-request-type';
        $this->access = 'custom-request-type';

        $this->middleware('permission:' . $this->access . '-view|' . $this->access . '-create|' . $this->access . '-edit|' . $this->access . '-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:' . $this->access . '-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:' . $this->access . '-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:' . $this->access . '-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;

        $data['rows'] = CustomRequestType::orderBy('id', 'desc')->get();

        return view($this->view . '.index', $data);
    }

    public function create()
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        return view($this->view . '.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        try {
            DB::beginTransaction();

            $requestType = new CustomRequestType();
            $requestType->title = $request->title;
            $requestType->description = $request->description;
            $requestType->requires_document = $request->requires_document ?? 1;
            $requestType->created_by = Auth::guard('web')->user()->id;
            $requestType->save();

            DB::commit();

            Toastr::success(__('msg_created_successfully'), __('msg_success'));
            return redirect()->route($this->route . '.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error(__('msg_created_error'), __('msg_error'));
            return redirect()->back()->withInput();
        }
    }

    public function show(CustomRequestType $customRequestType)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['row'] = $customRequestType;

        return view($this->view . '.show', $data);
    }

    public function edit(CustomRequestType $customRequestType)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['row'] = $customRequestType;

        return view($this->view . '.edit', $data);
    }

    public function update(Request $request, CustomRequestType $customRequestType)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        try {
            DB::beginTransaction();

            $customRequestType->title = $request->title;
            $customRequestType->description = $request->description;
            $customRequestType->requires_document = $request->requires_document ?? 1;
            $customRequestType->status = $request->status ?? 1;
            $customRequestType->updated_by = Auth::guard('web')->user()->id;
            $customRequestType->save();

            DB::commit();

            Toastr::success(__('msg_updated_successfully'), __('msg_success'));
            return redirect()->route($this->route . '.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error(__('msg_updated_error'), __('msg_error'));
            return redirect()->back()->withInput();
        }
    }

    public function destroy(CustomRequestType $customRequestType)
    {
        try {
            DB::beginTransaction();
            $customRequestType->delete();
            DB::commit();

            Toastr::success(__('msg_deleted_successfully'), __('msg_success'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error(__('msg_deleted_error'), __('msg_error'));
            return redirect()->back();
        }
    }
}
