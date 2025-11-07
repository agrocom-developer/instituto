    @php
        $enablePcoded = $enablePcoded ?? true;
    @endphp

    <!-- Required Js -->
    <script src="{{ asset('dashboard/plugins/jquery/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/popper/js/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    @if($enablePcoded)
        <script src="{{ asset('dashboard/plugins/jquery-scrollbar/js/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('dashboard/js/pcoded.min.js') }}"></script>
    @endif

    <!-- datatable Js -->
    <script src="{{ asset('dashboard/plugins/data-tables/js/datatables.min.js') }}"></script>
    
    <!-- form-validation Js -->
    <script src="{{ asset('dashboard/js/pages/form-validation.js') }}"></script>

    <!-- select2 Js -->
    <script src="{{ asset('dashboard/plugins/select2/js/select2.full.min.js') }}"></script>

    <!-- material datetimepicker Js -->
    <script src="{{ asset('dashboard/plugins/moment/js/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>

    <!-- Input mask Js -->
    <script src="{{ asset('dashboard/plugins/inputmask/js/autoNumeric.js') }}"></script>

    <!-- minicolors Js -->
    <script src="{{ asset('dashboard/plugins/mini-color/js/jquery.minicolors.min.js') }}"></script>

    <!-- toastr Js -->
    <script src="{{ asset('dashboard/plugins/toastr/js/toastr.min.js') }}"></script>
    <!-- Toastr message display -->
    @toastr_render

    <script type="text/javascript">
        (function () {
            "use strict";
            if (typeof toastr === 'undefined') {
                return;
            }
            @if($errors->any())
                @foreach($errors->all() as $error)
                    toastr["error"]("{{ $error }}");
                @endforeach
            @endif
        })();
    </script>

    <!-- Print Js -->
    <script src="{{ asset('dashboard/plugins/print/js/jQuery.print.min.js') }}"></script>
    <script type="text/javascript">
    (function () {
        "use strict";
        if (typeof window.jQuery === 'undefined' || typeof jQuery.fn.print === 'undefined') {
            return;
        }
        jQuery(function ($) {
            $("html").find('.btn-print').on('click', function () {
                $.print(".printable");
            });
        });
    })();
    </script>

    <!-- Popup Window Js -->
    <script type="text/javascript">
        "use strict";
        function PopupWin(pageURL, pageTitle, popupWinWidth, popupWinHeight) {
            var left = (screen.width - popupWinWidth) / 2;
            var top = (screen.height - popupWinHeight) / 4;

            var myWindow = window.open(pageURL, pageTitle, 'resizable=yes, width=' + popupWinWidth + ', height=' + popupWinHeight + ', top=' + top + ', left=' + left);
        };
    </script>


    <!-- page js -->
    @yield('page_js')


    <script type="text/javascript">
        'use strict';
        if (typeof window.jQuery !== 'undefined') {
            jQuery(function ($) {
                // [ Single Select ] start
                if ($.fn.select2) {
                    $(".select2").select2();

                    // [ Multi Select ] start
                    $(".select2-multiple").select2({
                        placeholder: "{{ __('select') }}"
                    });
                }

                // Date Picker
                if ($.fn.bootstrapMaterialDatePicker) {
                    $('.date').bootstrapMaterialDatePicker({
                        setDate: new Date(),
                        weekStart: 0,
                        time: false
                    });

                    // Time Picker
                    $('.time').bootstrapMaterialDatePicker({
                        date: false,
                        shortTime: true,
                        format: 'HH:mm'
                    });
                }

                // Color Picker
                if ($.fn.minicolors) {
                    $('.color_picker').each(function() {
                        $(this).minicolors({
                            control: $(this).attr('data-control') || 'hue',
                            defaultValue: $(this).attr('data-defaultValue') || '',
                            format: $(this).attr('data-format') || 'hex',
                            keywords: $(this).attr('data-keywords') || '',
                            inline: $(this).attr('data-inline') === 'true',
                            letterCase: $(this).attr('data-letterCase') || 'lowercase',
                            opacity: $(this).attr('data-opacity'),
                            position: $(this).attr('data-position') || 'bottom',
                            swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
                            change: function(value, opacity) {
                                if (!value) return;
                                if (opacity) value += ', ' + opacity;
                            },
                            theme: 'bootstrap'
                        });
                    });
                }

                // Number Mask
                if (typeof AutoNumeric !== 'undefined') {
                    var autoNumberFields = document.querySelectorAll('.autonumber');
                    if (autoNumberFields.length) {
                        Array.prototype.forEach.call(autoNumberFields, function(field) {
                            new AutoNumeric(field, {
                                minimumValue : '0',
                                maximumValue : '999999999',
                                decimalPlaces : 0,
                                decimalCharacter : '.',
                                digitGroupSeparator : '',
                            });
                        });
                    }
                }
            });
        }
    </script>

    <script type="text/javascript">
        'use strict';
        if (typeof window.jQuery !== 'undefined') {
            jQuery(function ($) {
                if (typeof $.fn.DataTable !== 'function') {
                    return;
                }

                var basicTable = $('#basic-table');
                if (basicTable.length) {
                    basicTable.DataTable();
                }

                var basicTable2 = $('#basic-table2');
                if (basicTable2.length) {
                    basicTable2.DataTable();
                }

                var exportTable = $('#export-table');
                if (exportTable.length) {
                    exportTable.DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                extend: 'copyHtml5',
                                text: '<i class="fas fa-copy"></i>',
                                footer: true,
                                exportOptions: {
                                    columns: ':not(:last-child)',
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                text: '<i class="fas fa-file-excel"></i>',
                                footer: true,
                                exportOptions: {
                                    columns: ':not(:last-child)',
                                }
                            },
                            {
                                extend: 'csvHtml5',
                                text: '<i class="fas fa-file"></i>',
                                footer: true,
                                exportOptions: {
                                    columns: ':not(:last-child)',
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                text: '<i class="fas fa-file-pdf"></i>',
                                footer: true,
                                exportOptions: {
                                    columns: ':not(:last-child)',
                                }
                            },
                            {
                                extend: 'print',
                                text: '<i class="fas fa-print"></i>',
                                autoPrint: true,
                                footer: true,
                                exportOptions: {
                                    columns: ':not(:last-child)',
                                },
                                customize: function ( win ) {
                                    $(win.document.body)
                                        .css( 'font-size', '10pt' );

                                    $(win.document.body).find( 'table' )
                                        .addClass( 'compact' )
                                        .css( 'font-size', 'inherit' );

                                    $(win.document.body).find( 'caption' )
                                        .css( 'font-size', '10px' );

                                    $(win.document.body).find('h1')
                                        .css({"text-align": "center", "font-size": "16pt"});
                                }
                            }
                        ]
                    });
                }
            });
        }
    </script>

    {{-- Set Cookie --}}
    <script type="text/javascript">
        "use strict";
        if (typeof window.jQuery !== 'undefined') {
            jQuery(function ($) {
                var $mobileCollapse = $("#mobile-collapse");
                if (!$mobileCollapse.length) {
                    return;
                }
                $mobileCollapse.on( "click", function(e) {
                   e.preventDefault();
                   $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
                    $.ajax({
                       url: "{{ route('setCookie') }}",
                       method: 'get',
                       data: {},
                       success: function(result){
                          console.log(result.data);
                       }});
                });
            });
        }
    </script>


    {{-- Text Editors --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.3/tinymce.min.js"></script>

    @php 
    $version = App\Models\Language::version(); 
    @endphp
    @if($version->direction == 1)
    <script type="text/javascript">
      "use strict";
      tinymce.init({
        selector: '.texteditor',
        
        height: 200,
        setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });
        },

        directionality : 'rtl',
        language: '{{ $version->code }}',
      });
    </script>
    @else
    <script type="text/javascript">
      "use strict";
      tinymce.init({
        selector: '.texteditor',

        height: 200,
        setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });
        },

        directionality : 'ltr',
        language: '{{ $version->code }}',
      });
    </script>
    @endif