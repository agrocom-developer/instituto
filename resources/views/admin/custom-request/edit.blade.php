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
                        <div class="form-group col-md-4">
                            <label for="student">{{ __('field_student_id') }} <span>*</span></label>
                            <select class="form-control select2" name="student" id="student" required>
                                <option value="">{{ __('select') }}</option>
                                @foreach( $students as $student )
                                <option value="{{ $student->id }}" @if(old('student', $row->student_id) == $student->id) selected @endif>{{ $student->student_id }} - {{ $student->first_name }} {{ $student->last_name }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_student_id') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="request_type">{{ __('field_request_type') }} <span>*</span></label>
                            <select class="form-control select2" name="request_type" id="request_type" required>
                                <option value="">{{ __('select') }}</option>
                                @foreach( $requestTypes as $type )
                                <option value="{{ $type->id }}" @if(old('request_type', $row->request_type_id) == $type->id) selected @endif>{{ $type->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_request_type') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
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

                        <div class="form-group col-md-12">
                            <label for="attach">{{ __('field_attach') }}</label>
                            <input type="file" class="form-control" name="attach" id="attach" value="{{ old('attach') }}">

                            @if(is_file('uploads/'.$path.'/'.$row->attach))
                            <small class="form-text text-muted">
                                <a href="{{ asset('uploads/'.$path.'/'.$row->attach) }}" target="_blank">{{ __('field_current_file') }}</a>
                            </small>
                            @endif

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_attach') }}
                            </div>
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

