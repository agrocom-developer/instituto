    <!-- Show modal content -->
    <div id="showModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">{{ __('modal_view') }} {{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!-- Details View Start -->
                    <h4><mark class="text-primary">{{ __('field_student_id') }}:</mark> #{{ $row->student->student_id ?? '' }} - {{ $row->student->first_name ?? '' }} {{ $row->student->last_name ?? '' }}</h4>
                    <hr/>
                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_type') }}:</mark> 
                                    @if( $row->type == 1 )
                                    {{ __('field_program_change') }}
                                    @elseif( $row->type == 2 )
                                    {{ __('field_work_shift_change') }}
                                    @endif
                                </p><hr/>

                                @if( $row->type == 1 )
                                <p><mark class="text-primary">{{ __('field_current_program') }}:</mark> {{ $row->currentProgram->title ?? '' }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_new_program') }}:</mark> {{ $row->newProgram->title ?? '' }}</p><hr/>
                                @elseif( $row->type == 2 )
                                <p><mark class="text-primary">{{ __('field_current_work_shift') }}:</mark> {{ $row->currentWorkShift->title ?? '' }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_new_work_shift') }}:</mark> {{ $row->newWorkShift->title ?? '' }}</p><hr/>
                                @endif

                                <p><mark class="text-primary">{{ __('field_date') }}:</mark> 
                                    @if(isset($setting->date_format))
                                    {{ date($setting->date_format, strtotime($row->created_at)) }}
                                    @else
                                    {{ date("Y-m-d", strtotime($row->created_at)) }}
                                    @endif
                                </p><hr/>
                            </div>
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_status') }}:</mark> 
                                @if( $row->status == 1 )
                                <span class="badge badge-pill badge-primary">{{ __('status_pending') }}</span>
                                @elseif( $row->status == 2 )
                                <span class="badge badge-pill badge-success">{{ __('status_approved') }}</span>
                                @elseif( $row->status == 3 )
                                <span class="badge badge-pill badge-danger">{{ __('status_rejected') }}</span>
                                @endif
                                </p><hr/>

                                @if($row->approved_by)
                                <p><mark class="text-primary">{{ __('field_approved_by') }}:</mark> #{{ $row->approvedBy->staff_id ?? '' }} - {{ $row->approvedBy->first_name ?? '' }} {{ $row->approvedBy->last_name ?? '' }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_approved_at') }}:</mark> 
                                    @if(isset($setting->date_format))
                                    {{ date($setting->date_format, strtotime($row->approved_at)) }}
                                    @else
                                    {{ date("Y-m-d H:i", strtotime($row->approved_at)) }}
                                    @endif
                                </p><hr/>
                                @endif

                                @if($row->rejected_by)
                                <p><mark class="text-primary">{{ __('field_rejected_by') }}:</mark> #{{ $row->rejectedBy->staff_id ?? '' }} - {{ $row->rejectedBy->first_name ?? '' }} {{ $row->rejectedBy->last_name ?? '' }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_rejected_at') }}:</mark> 
                                    @if(isset($setting->date_format))
                                    {{ date($setting->date_format, strtotime($row->rejected_at)) }}
                                    @else
                                    {{ date("Y-m-d H:i", strtotime($row->rejected_at)) }}
                                    @endif
                                </p><hr/>
                                @endif

                                <p><mark class="text-primary">{{ __('field_recorded_by') }}:</mark> #{{ $row->createdBy->staff_id ?? '' }}</p><hr/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><mark class="text-primary">{{ __('field_reason') }}:</mark> {!! $row->reason !!}</p><hr/>

                                <p><mark class="text-primary">{{ __('field_note') }}:</mark> {!! $row->note ?? '' !!}</p><hr/>
                            </div>
                        </div>
                    </div>
                    <!-- Details View End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> {{ __('btn_close') }}</button>
                </div>
            </div>
        </div>
    </div>

