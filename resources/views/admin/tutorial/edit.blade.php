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

                    <form class="needs-validation" novalidate action="{{ route($route.'.update', [$row->id]) }}" method="post" enctype="multipart/form-data">
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
                                <option value="{{ $student->id }}" @if($row->student_id == $student->id) selected @endif>{{ $student->student_id }} - {{ $student->first_name }} {{ $student->last_name }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_student_id') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="tutor">{{ __('field_tutor') }} <span>*</span></label>
                            <select class="form-control select2" name="tutor" id="tutor" required>
                                <option value="">{{ __('select') }}</option>
                                @foreach( $tutors as $tutor )
                                <option value="{{ $tutor->id }}" @if($row->tutor_id == $tutor->id) selected @endif>{{ $tutor->staff_id }} - {{ $tutor->first_name }} {{ $tutor->last_name }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_tutor') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="title">{{ __('field_title') }} <span>*</span></label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $row->title }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_title') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="topic">{{ __('field_topic') }}</label>
                            <input type="text" class="form-control" name="topic" id="topic" value="{{ $row->topic }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_topic') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="location">{{ __('field_location') }}</label>
                            <input type="text" class="form-control" name="location" id="location" value="{{ $row->location }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_location') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="date">{{ __('field_date') }} <span>*</span></label>
                            <input type="date" class="form-control date" name="date" id="date" value="{{ $row->date }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_date') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="start_time">{{ __('field_start_time') }} <span>*</span></label>
                            <input type="time" class="form-control" name="start_time" id="start_time" value="{{ $row->start_time }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_start_time') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="end_time">{{ __('field_end_time') }}</label>
                            <input type="time" class="form-control" name="end_time" id="end_time" value="{{ $row->end_time }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_end_time') }}
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="description">{{ __('field_description') }}</label>
                            <textarea class="form-control" name="description" id="description" rows="3">{{ $row->description }}</textarea>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_description') }}
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="notes" class="form-label">{{ __('field_notes') }}</label>
                            <textarea class="form-control" name="notes" id="notes" rows="3">{{ $row->notes }}</textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="outcome" class="form-label">{{ __('field_outcome') }}</label>
                            <textarea class="form-control" name="outcome" id="outcome" rows="3">{{ $row->outcome }}</textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="attach">{{ __('field_attach') }}</label>
                            <input type="file" class="form-control" name="attach" id="attach" value="{{ old('attach') }}">

                            @if(is_file('uploads/'.$path.'/'.$row->attach))
                            <a href="{{ asset('uploads/'.$path.'/'.$row->attach) }}" target="_blank" class="badge badge-primary">{{ __('field_attach') }}</a>
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

