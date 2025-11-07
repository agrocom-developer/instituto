<div class="form-group col-md-12">
  <label for="present_province">{{ __('field_province') }}</label>
  <select class="form-control" name="present_province" id="present_province">
    <option>{{ __('select') }}</option>
    @foreach( $provinces as $province )
    <option value="{{ $province->id }}" @isset($row) {{ $row->present_province == $province->id ? 'selected' : '' }} @endisset>{{ $province->title }}</option>
    @endforeach
  </select>

  <div class="invalid-feedback">
  {{ __('required_field') }} {{ __('field_province') }}
  </div>
</div>

<div class="form-group col-md-12">
  <label for="present_district">{{ __('field_district') }}</label>
  <select class="form-control" name="present_district" id="present_district">
    <option>{{ __('select') }}</option>
    @isset($row)
    @foreach($present_districts as $district)
    <option value="{{ $district->id }}" {{ $row->present_district == $district->id ? 'selected' : '' }}>{{ $district->title }}</option>
    @endforeach
    @endisset
  </select>

  <div class="invalid-feedback">
  {{ __('required_field') }} {{ __('field_district') }}
  </div>
</div>


<script type="text/javascript">
(function() {
    "use strict";

    var initHandler = function () {
        if (typeof window.jQuery === 'undefined') {
            window.setTimeout(initHandler, 50);
            return;
        }

        var $ = window.jQuery;
        $(document).ready(function () {
            var $province = $('#present_province');
            if (!$province.length) {
                return;
            }

            $province.on('change', function (e) {
                e.preventDefault();
                var $presentDistrict = $('#present_district');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{ route('filter-district') }}",
                    data: {
                        _token: $('input[name=_token]').val(),
                        province: $(this).val()
                    },
                    success: function (response) {
                        $('option', $presentDistrict).remove();
                        $presentDistrict.append('<option value="">{{ __("select") }}</option>');
                        $.each(response, function () {
                            $('<option/>', {
                                'value': this.id,
                                'text': this.title
                            }).appendTo($presentDistrict);
                        });
                    }
                });
            });
        });
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initHandler);
    } else {
        initHandler();
    }
})();
</script>
