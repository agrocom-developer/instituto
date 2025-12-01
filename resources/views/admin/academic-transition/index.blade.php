@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $title }} {{ __('list') }}</h5>
                    </div>
                    <div class="card-block">
                        @can($access.'-create')
                        <a href="{{ route($route.'.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> {{ __('btn_add_new') }}</a>
                        @endcan

                        <a href="{{ route($route.'.index') }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                    </div>

                    <div class="card-block">
                        <form class="needs-validation" novalidate method="get" action="{{ route($route.'.index') }}">
                            <div class="row gx-2">
                                <div class="form-group col-md-2">
                                    <label for="type">{{ __('field_type') }}</label>
                                    <select class="form-control" name="type" id="type">
                                        <option value="">{{ __('all') }}</option>
                                        <option value="1" @if($selected_type == 1) selected @endif>{{ __('field_program_change') }}</option>
                                        <option value="2" @if($selected_type == 2) selected @endif>{{ __('field_work_shift_change') }}</option>
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_type') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="status">{{ __('field_status') }}</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="99">{{ __('all') }}</option>
                                        <option value="1" @if( $selected_status == 1 ) selected @endif>{{ __('status_pending') }}</option>
                                        <option value="2" @if( $selected_status == 2 ) selected @endif>{{ __('status_approved') }}</option>
                                        <option value="3" @if( $selected_status == 3 ) selected @endif>{{ __('status_rejected') }}</option>
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_status') }}
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
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-info btn-filter"><i class="fas fa-search"></i> {{ __('btn_filter') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table id="export-table" class="display table nowrap table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('field_student_id') }}</th>
                                        <th>{{ __('field_name') }}</th>
                                        <th>{{ __('field_type') }}</th>
                                        <th>{{ __('field_current') }}</th>
                                        <th>{{ __('field_new') }}</th>
                                        <th>{{ __('field_reason') }}</th>
                                        <th>{{ __('field_date') }}</th>
                                        <th>{{ __('field_status') }}</th>
                                        <th>{{ __('field_action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <a href="{{ route('admin.student.show', $row->student_id) }}" target="_blank">
                                            #{{ $row->student->student_id ?? '' }}
                                            </a>
                                        </td>
                                        <td>{{ $row->student->first_name ?? '' }} {{ $row->student->last_name ?? '' }}</td>
                                        <td>
                                            @if( $row->type == 1 )
                                            {{ __('field_program_change') }}
                                            @elseif( $row->type == 2 )
                                            {{ __('field_work_shift_change') }}
                                            @endif
                                        </td>
                                        <td>
                                            @if( $row->type == 1 )
                                            {{ $row->currentProgram->title ?? '' }}
                                            @elseif( $row->type == 2 )
                                            {{ $row->currentWorkShift->title ?? '' }}
                                            @endif
                                        </td>
                                        <td>
                                            @if( $row->type == 1 )
                                            {{ $row->newProgram->title ?? '' }}
                                            @elseif( $row->type == 2 )
                                            {{ $row->newWorkShift->title ?? '' }}
                                            @endif
                                        </td>
                                        <td>{{ Str::limit($row->reason, 50) }}</td>
                                        <td>
                                            @if(isset($setting->date_format))
                                                {{ date($setting->date_format, strtotime($row->created_at)) }}
                                            @else
                                                {{ date("Y-m-d", strtotime($row->created_at)) }}
                                            @endif
                                        </td>
                                        <td>
                                            @if( $row->status == 1 )
                                            <span class="badge badge-pill badge-primary">{{ __('status_pending') }}</span>
                                            @elseif( $row->status == 2 )
                                            <span class="badge badge-pill badge-success">{{ __('status_approved') }}</span>
                                            @elseif( $row->status == 3 )
                                            <span class="badge badge-pill badge-danger">{{ __('status_rejected') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->status == 1)
                                            <div class="dropdown show d-inline-block">
                                                <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="statusMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-question"></i>
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="statusMenuLink">
                                                    <a class="dropdown-item" href="#" onclick="document.getElementById('status_approved_{{ $row->id }}').submit();">{{ __('status_approved') }}</a>
                                                    <a class="dropdown-item" href="#" onclick="document.getElementById('status_rejected_{{ $row->id }}').submit();">{{ __('status_rejected') }}</a>
                                                </div>

                                                <form action="{{ route($route.'.status', $row->id) }}" method="post" id="status_approved_{{ $row->id }}">
                                                    @csrf
                                                    <input type="hidden" name="status" value="2">
                                                </form>
                                                <form action="{{ route($route.'.status', $row->id) }}" method="post" id="status_rejected_{{ $row->id }}">
                                                    @csrf
                                                    <input type="hidden" name="status" value="3">
                                                </form>
                                            </div>
                                            @endif

                                            <button type="button" class="btn btn-icon btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#showModal-{{ $row->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <!-- Include Show modal -->
                                            @include($view.'.show')

                                            @can($access.'-edit')
                                            <a href="{{ route($route.'.edit', $row->id) }}" class="btn btn-icon btn-primary btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            @endcan

                                            @can($access.'-delete')
                                            <button type="button" class="btn btn-icon btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $row->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <!-- Include Delete modal -->
                                            @include('admin.layouts.inc.delete')
                                            @endcan
                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- [ Data table ] end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection

