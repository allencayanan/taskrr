<input
  type="password"
  class="{{ $class ?? 'form-control' }}"
  id="{{ $name ?? '' }}"
  name="{{ $name ?? '' }}"
  value="{{ $value ?? '' }}"
  placeholder="{{ $placeholder ?? '' }}"
  @if ($required ?? false)
    required
  @endif
>
