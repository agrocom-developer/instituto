@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ Card ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('modal_edit') }} {{ $title }}</h5>
                    </div>
                    <div class="card-block">
                        <a href="{{ route($route.'.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> {{ __('btn_back') }}</a>

                        <a href="{{ route($route.'.edit', $row->id) }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                    </div>

                    <form class="needs-validation" novalidate action="{{ route($route.'.update', $row->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-block">
                      <div class="row">
                        <!-- Form Start -->
                        <div class="form-group col-md-12">
                            <label for="title">{{ __('field_title') }} <span>*</span></label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $row->title) }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_title') }}
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="description">{{ __('field_description') }}</label>
                            <textarea class="form-control" name="description" id="description" rows="3">{{ old('description', $row->description) }}</textarea>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_description') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="switch d-inline m-r-10">
                                <input type="checkbox" id="requires_document" name="requires_document" value="1" @if(old('requires_document', $row->requires_document) == 1) checked @endif>
                                <label for="requires_document" class="cr"></label>
                            </div>
                            <label>{{ __('field_requires_document') }}</label>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="switch d-inline m-r-10">
                                <input type="checkbox" id="status" name="status" value="1" @if(old('status', $row->status) == 1) checked @endif>
                                <label for="status" class="cr"></label>
                            </div>
                            <label>{{ __('field_status') }}</label>
                        </div>
                        <!-- Form End -->
                      </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_update') }}</button>
                    </div>
                    </form>
                </div>
            </div>
            <!-- [ Card ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection

