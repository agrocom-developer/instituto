@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $title }}</h5>
                    </div>
                    <div class="card-block">
                        <form class="needs-validation" novalidate method="get" action="{{ route($route.'.teacher-performance') }}">
                            <div class="row gx-2">
                                <div class="form-group col-md-3">
                                    <label for="teacher">{{ __('field_teacher') }}</label>
                                    <select class="form-control select2" name="teacher" id="teacher">
                                        <option value="">{{ __('select') }}</option>
                                        @foreach( $teachers as $teacher )
                                        <option value="{{ $teacher->id }}" @if($selected_teacher == $teacher->id) selected @endif>{{ $teacher->staff_id }} - {{ $teacher->first_name }} {{ $teacher->last_name }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_teacher') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="session">{{ __('field_session') }}</label>
                                    <select class="form-control" name="session" id="session">
                                        <option value="">{{ __('all') }}</option>
                                        @foreach( $sessions as $session )
                                        <option value="{{ $session->id }}" @if($selected_session == $session->id) selected @endif>{{ $session->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_session') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="start_date">{{ __('field_from_date') }}</label>
                                    <input type="date" class="form-control date" name="start_date" id="start_date" value="{{ $selected_start_date }}" required>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_from_date') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="end_date">{{ __('field_to_date') }}</label>
                                    <input type="date" class="form-control date" name="end_date" id="end_date" value="{{ $selected_end_date }}" required>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_to_date') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="submit" class="btn btn-info btn-filter"><i class="fas fa-search"></i> {{ __('btn_search') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @if(isset($teacher_data) && !empty($teacher_data))
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('field_teacher') }}: #{{ $teacher_data['user']->staff_id }} - {{ $teacher_data['user']->first_name }} {{ $teacher_data['user']->last_name }}</h5>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <!-- Summary Cards -->
                            <div class="col-md-3">
                                <div class="card bg-primary text-white">
                                    <div class="card-body">
                                        <h6>{{ __('field_total_classes') }}</h6>
                                        <h3>{{ $teacher_data['total_classes'] }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-info text-white">
                                    <div class="card-body">
                                        <h6>{{ __('field_subjects_assigned') }}</h6>
                                        <h3>{{ $subjects_count ?? 0 }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        <h6>{{ __('field_students_assigned') }}</h6>
                                        <h3>{{ $students_count ?? 0 }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-warning text-white">
                                    <div class="card-body">
                                        <h6>{{ __('field_assignments_created') }}</h6>
                                        <h3>{{ $assignments_count ?? 0 }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h6>{{ __('field_attendance') }}</h6>
                                    </div>
                                    <div class="card-body">
                                        <p><strong>{{ __('field_total_days') }}:</strong> {{ $attendance['total'] ?? 0 }}</p>
                                        <p><strong>{{ __('field_present') }}:</strong> {{ $attendance['present'] ?? 0 }}</p>
                                        <p><strong>{{ __('field_absent') }}:</strong> {{ $attendance['absent'] ?? 0 }}</p>
                                        <p><strong>{{ __('field_attendance_percentage') }}:</strong> {{ number_format($attendance['percentage'] ?? 0, 2) }}%</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h6>{{ __('field_tutorials') }}</h6>
                                    </div>
                                    <div class="card-body">
                                        <p><strong>{{ __('field_total_tutorials') }}:</strong> {{ $tutorials_count ?? 0 }}</p>
                                        <p><strong>{{ __('field_completed_tutorials') }}:</strong> {{ $tutorials_completed ?? 0 }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('field_classes_taught') }}</h5>
                    </div>
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table id="report-table" class="display table nowrap table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('field_subject') }}</th>
                                        <th>{{ __('field_program') }}</th>
                                        <th>{{ __('field_semester') }}</th>
                                        <th>{{ __('field_section') }}</th>
                                        <th>{{ __('field_day') }}</th>
                                        <th>{{ __('field_time') }}</th>
                                        <th>{{ __('field_room') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $teacher_data['classes'] as $key => $class )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $class->subject->title ?? '' }} ({{ $class->subject->code ?? '' }})</td>
                                        <td>{{ $class->program->title ?? '' }}</td>
                                        <td>{{ $class->semester->title ?? '' }}</td>
                                        <td>{{ $class->section->title ?? '' }}</td>
                                        <td>{{ $class->day ?? '' }}</td>
                                        <td>
                                            {{ date("H:i", strtotime($class->start_time)) }}
                                            @if($class->end_time)
                                            - {{ date("H:i", strtotime($class->end_time)) }}
                                            @endif
                                        </td>
                                        <td>{{ $class->room->title ?? '' }}</td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- [ Data table ] end -->
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('field_subjects_assigned') }}</h5>
                    </div>
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table id="subjects-table" class="display table nowrap table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('field_code') }}</th>
                                        <th>{{ __('field_title') }}</th>
                                        <th>{{ __('field_credit_hour') }}</th>
                                        <th>{{ __('field_subject_type') }}</th>
                                        <th>{{ __('field_class_type') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $teacher_data['subjects'] as $key => $subject )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $subject->code }}</td>
                                        <td>{{ $subject->title }}</td>
                                        <td>{{ $subject->credit_hour }}</td>
                                        <td>{{ $subject->subject_type ?? '-' }}</td>
                                        <td>{{ $subject->class_type ?? '-' }}</td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- [ Data table ] end -->
                    </div>
                </div>
            </div>
            @endif
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection

