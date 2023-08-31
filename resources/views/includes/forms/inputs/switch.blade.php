<input
  class="{{ $class ?? 'form-check-input' }}"
  type="checkbox"
  id="{{ $name ?? '' }}"
  name="{{ $name ?? '' }}"
  value="{{ $value ?? '' }}"
  {{ $value ? 'checked' : '' }}
/>
@if (! empty($label))
  <label class="form-check-label" for="{{ $name ?? '' }}">{{ $label ?? '' }}</label>
@endif

