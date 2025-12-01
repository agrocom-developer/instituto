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
                        <h5>{{ __('modal_add') }} {{ $title }}</h5>
                    </div>
                    <div class="card-block">
                        <a href="{{ route($route.'.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> {{ __('btn_back') }}</a>

                        <a href="{{ route($route.'.create') }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                    </div>

                    <form class="needs-validation" novalidate action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-block">
                      <div class="row">
                        <!-- Form Start -->
                        <div class="form-group col-md-4">
                            <label for="student">{{ __('field_student_id') }} <span>*</span></label>
                            <select class="form-control select2" name="student" id="student" required>
                                <option value="">{{ __('select') }}</option>
                                @foreach( $students as $student )
                                <option value="{{ $student->id }}" @if(old('student') == $student->id) selected @endif>{{ $student->student_id }} - {{ $student->first_name }} {{ $student->last_name }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_student_id') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="type">{{ __('field_type') }} <span>*</span></label>
                            <select class="form-control transition_type" name="type" id="type" required>
                                <option value="">{{ __('select') }}</option>
                                <option value="1" @if(old('type') == 1) selected @endif>{{ __('field_program_change') }}</option>
                                <option value="2" @if(old('type') == 2) selected @endif>{{ __('field_work_shift_change') }}</option>
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_type') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4 program_fields" style="display: none;">
                            <label for="current_program">{{ __('field_current_program') }} <span>*</span></label>
                            <select class="form-control" name="current_program" id="current_program">
                                <option value="">{{ __('select') }}</option>
                                @foreach( $programs as $program )
                                <option value="{{ $program->id }}" @if(old('current_program') == $program->id) selected @endif>{{ $program->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_current_program') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4 program_fields" style="display: none;">
                            <label for="new_program">{{ __('field_new_program') }} <span>*</span></label>
                            <select class="form-control" name="new_program" id="new_program">
                                <option value="">{{ __('select') }}</option>
                                @foreach( $programs as $program )
                                <option value="{{ $program->id }}" @if(old('new_program') == $program->id) selected @endif>{{ $program->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_new_program') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4 work_shift_fields" style="display: none;">
                            <label for="current_work_shift">{{ __('field_current_work_shift') }} <span>*</span></label>
                            <select class="form-control" name="current_work_shift" id="current_work_shift">
                                <option value="">{{ __('select') }}</option>
                                @foreach( $workShifts as $workShift )
                                <option value="{{ $workShift->id }}" @if(old('current_work_shift') == $workShift->id) selected @endif>{{ $workShift->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_current_work_shift') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4 work_shift_fields" style="display: none;">
                            <label for="new_work_shift">{{ __('field_new_work_shift') }} <span>*</span></label>
                            <select class="form-control" name="new_work_shift" id="new_work_shift">
                                <option value="">{{ __('select') }}</option>
                                @foreach( $workShifts as $workShift )
                                <option value="{{ $workShift->id }}" @if(old('new_work_shift') == $workShift->id) selected @endif>{{ $workShift->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_new_work_shift') }}
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="reason">{{ __('field_reason') }} <span>*</span></label>
                            <textarea class="form-control" name="reason" id="reason" rows="3" required>{{ old('reason') }}</textarea>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_reason') }}
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="note" class="form-label">{{ __('field_note') }}</label>
                            <textarea class="form-control" name="note" id="note" rows="3">{{ old('note') }}</textarea>
                        </div>
                        <!-- Form End -->
                      </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_save') }}</button>
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

@section('page_js')
<script type="text/javascript">
"use strict";
$(".transition_type").on('change',function(e){
    e.preventDefault(e);
    var type = $(this).val();
    
    if(type == 1){
        $('.program_fields').show();
        $('.work_shift_fields').hide();
        $('.program_fields select').attr('required', true);
        $('.work_shift_fields select').removeAttr('required');
    }
    else if(type == 2){
        $('.program_fields').hide();
        $('.work_shift_fields').show();
        $('.work_shift_fields select').attr('required', true);
        $('.program_fields select').removeAttr('required');
    }
    else{
        $('.program_fields').hide();
        $('.work_shift_fields').hide();
        $('.program_fields select').removeAttr('required');
        $('.work_shift_fields select').removeAttr('required');
    }
});

// Initial call
if($('.transition_type').val()){
    $('.transition_type').trigger('change');
}
</script>
@endsection

