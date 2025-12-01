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
                    <h4><mark class="text-primary">{{ __('field_title') }}:</mark> {{ $row->title }}</h4>
                    <hr/>
                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_student_id') }}:</mark> 
                                    <a href="{{ route('admin.student.show', $row->student_id) }}" target="_blank">
                                    #{{ $row->student->student_id ?? '' }} - {{ $row->student->first_name ?? '' }} {{ $row->student->last_name ?? '' }}
                                    </a>
                                </p><hr/>
                                <p><mark class="text-primary">{{ __('field_tutor') }}:</mark> 
                                    @isset($row->tutor)
                                    <a href="{{ route('admin.user.show', $row->tutor->id) }}" target="_blank">
                                    #{{ $row->tutor->staff_id ?? '' }} - {{ $row->tutor->first_name ?? '' }} {{ $row->tutor->last_name ?? '' }}
                                    </a>
                                    @endisset
                                </p><hr/>
                                <p><mark class="text-primary">{{ __('field_topic') }}:</mark> {{ $row->topic ?? '-' }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_location') }}:</mark> {{ $row->location ?? '-' }}</p><hr/>
                            </div>
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_date') }}:</mark> 
                                    @if(isset($setting->date_format))
                                    {{ date($setting->date_format, strtotime($row->date)) }}
                                    @else
                                    {{ date("Y-m-d", strtotime($row->date)) }}
                                    @endif
                                </p><hr/>
                                <p><mark class="text-primary">{{ __('field_time') }}:</mark> 
                                    {{ date("H:i", strtotime($row->start_time)) }}
                                    @if($row->end_time)
                                    - {{ date("H:i", strtotime($row->end_time)) }}
                                    @endif
                                </p><hr/>
                                <p><mark class="text-primary">{{ __('field_status') }}:</mark> 
                                @if( $row->status == 1 )
                                <span class="badge badge-pill badge-primary">{{ __('status_scheduled') }}</span>
                                @elseif( $row->status == 2 )
                                <span class="badge badge-pill badge-success">{{ __('status_completed') }}</span>
                                @elseif( $row->status == 3 )
                                <span class="badge badge-pill badge-danger">{{ __('status_cancelled') }}</span>
                                @endif
                                </p><hr/>
                                <p><mark class="text-primary">{{ __('field_recorded_by') }}:</mark> #{{ $row->createdBy->staff_id ?? '' }}</p><hr/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><mark class="text-primary">{{ __('field_description') }}:</mark> {!! $row->description ?? '' !!}</p><hr/>

                                <p><mark class="text-primary">{{ __('field_notes') }}:</mark> {!! $row->notes ?? '' !!}</p><hr/>

                                @if($row->outcome)
                                <p><mark class="text-primary">{{ __('field_outcome') }}:</mark> {!! $row->outcome !!}</p><hr/>
                                @endif

                                @if(is_file('uploads/'.$path.'/'.$row->attach))
                                <p><mark class="text-primary">{{ __('field_attach') }}:</mark> 
                                    <a href="{{ asset('uploads/'.$path.'/'.$row->attach) }}" target="_blank" class="badge badge-primary">{{ __('btn_download') }}</a>
                                </p><hr/>
                                @endif
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

