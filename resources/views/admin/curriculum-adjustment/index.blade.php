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
                                <div class="form-group col-md-3">
                                    <label for="program">{{ __('field_program') }}</label>
                                    <select class="form-control select2" name="program" id="program">
                                        <option value="">{{ __('all') }}</option>
                                        @foreach( $programs as $program )
                                        <option value="{{ $program->id }}" @if($selected_program == $program->id) selected @endif>{{ $program->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="status">{{ __('field_status') }}</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="99">{{ __('all') }}</option>
                                        <option value="0" @if( $selected_status == 0 ) selected @endif>{{ __('status_inactive') }}</option>
                                        <option value="1" @if( $selected_status == 1 ) selected @endif>{{ __('status_active') }}</option>
                                        <option value="2" @if( $selected_status == 2 ) selected @endif>{{ __('status_pending') }}</option>
                                    </select>
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
                                        <th>{{ __('field_program') }}</th>
                                        <th>{{ __('field_title') }}</th>
                                        <th>{{ __('field_regulation_reference') }}</th>
                                        <th>{{ __('field_effective_date') }}</th>
                                        <th>{{ __('field_status') }}</th>
                                        <th>{{ __('field_action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->program->title ?? '' }}</td>
                                        <td>{{ Str::limit($row->title, 40) }}</td>
                                        <td>{{ $row->regulation_reference ?? '-' }}</td>
                                        <td>
                                            @if($row->effective_date)
                                                @if(isset($setting->date_format))
                                                    {{ date($setting->date_format, strtotime($row->effective_date)) }}
                                                @else
                                                    {{ date("Y-m-d", strtotime($row->effective_date)) }}
                                                @endif
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if( $row->status == 0 )
                                            <span class="badge badge-pill badge-danger">{{ __('status_inactive') }}</span>
                                            @elseif( $row->status == 1 )
                                            <span class="badge badge-pill badge-success">{{ __('status_active') }}</span>
                                            @elseif( $row->status == 2 )
                                            <span class="badge badge-pill badge-primary">{{ __('status_pending') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->status == 2)
                                            <div class="dropdown show d-inline-block">
                                                <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="statusMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-question"></i>
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="statusMenuLink">
                                                    <a class="dropdown-item" href="#" onclick="document.getElementById('status_approved_{{ $row->id }}').submit();">{{ __('status_approved') }}</a>
                                                </div>

                                                <form action="{{ route($route.'.status', $row->id) }}" method="post" id="status_approved_{{ $row->id }}">
                                                    @csrf
                                                    <input type="hidden" name="status" value="1">
                                                </form>
                                            </div>
                                            @endif

                                            <button type="button" class="btn btn-icon btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#showModal-{{ $row->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <!-- Include Show modal -->
                                            @include($view.'.show')

                                            @if(is_file('uploads/'.$path.'/'.$row->attach))
                                            <a href="{{ asset('uploads/'.$path.'/'.$row->attach) }}" class="btn btn-icon btn-dark btn-sm" download><i class="fas fa-download"></i></a>
                                            @endif

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

