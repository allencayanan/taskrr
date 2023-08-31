<input
  type="text"
  class="{{ $class ?? 'form-control' }} flatpickr"
  id="{{ $name ?? '' }}"
  name="{{ $name ?? '' }}"
  value="{{ $value ?? '' }}"
  placeholder="{{ $placeholder ?? '' }}"
  @if ($required ?? false)
    required
  @endif
>

@once
  @push('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
  @endpush
  @push('vendor-script')
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
  @endpush
@endonce
