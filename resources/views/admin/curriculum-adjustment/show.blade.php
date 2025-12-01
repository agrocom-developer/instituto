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
                    <h4><mark class="text-primary">{{ __('field_program') }}:</mark> {{ $row->program->title ?? '' }}</h4>
                    <hr/>
                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_title') }}:</mark> {{ $row->title }}</p><hr/>

                                <p><mark class="text-primary">{{ __('field_regulation_reference') }}:</mark> {{ $row->regulation_reference ?? '-' }}</p><hr/>

                                <p><mark class="text-primary">{{ __('field_effective_date') }}:</mark> 
                                    @if($row->effective_date)
                                        @if(isset($setting->date_format))
                                        {{ date($setting->date_format, strtotime($row->effective_date)) }}
                                        @else
                                        {{ date("Y-m-d", strtotime($row->effective_date)) }}
                                        @endif
                                    @else
                                        -
                                    @endif
                                </p><hr/>

                                @if(is_file('uploads/'.$path.'/'.$row->attach))
                                <p><mark class="text-primary">{{ __('field_attach') }}:</mark> 
                                    <a href="{{ asset('uploads/'.$path.'/'.$row->attach) }}" target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-download"></i> {{ __('btn_download') }}</a>
                                </p><hr/>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_status') }}:</mark> 
                                @if( $row->status == 0 )
                                <span class="badge badge-pill badge-danger">{{ __('status_inactive') }}</span>
                                @elseif( $row->status == 1 )
                                <span class="badge badge-pill badge-success">{{ __('status_active') }}</span>
                                @elseif( $row->status == 2 )
                                <span class="badge badge-pill badge-primary">{{ __('status_pending') }}</span>
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

                                <p><mark class="text-primary">{{ __('field_recorded_by') }}:</mark> #{{ $row->createdBy->staff_id ?? '' }}</p><hr/>

                                <p><mark class="text-primary">{{ __('field_date') }}:</mark> 
                                    @if(isset($setting->date_format))
                                    {{ date($setting->date_format, strtotime($row->created_at)) }}
                                    @else
                                    {{ date("Y-m-d", strtotime($row->created_at)) }}
                                    @endif
                                </p><hr/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><mark class="text-primary">{{ __('field_description') }}:</mark> {!! $row->description ?? '' !!}</p><hr/>

                                <p><mark class="text-primary">{{ __('field_changes_summary') }}:</mark> {!! $row->changes_summary ?? '' !!}</p><hr/>
                            </div>
                        </div>
                    </div>
                    <!-- Details View End -->
                </div>
                <div class="modal-footer">
                    @if($row->status == 2)
                    <div class="dropdown show d-inline-block">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="statusMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-question"></i> {{ __('field_status') }}
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> {{ __('btn_close') }}</button>
                </div>
            </div>
        </div>
    </div>

