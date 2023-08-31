<input
  type="number"
  class="{{ $class ?? 'form-control' }}"
  id="{{ $name ?? '' }}"
  name="{{ $name ?? '' }}"
  value="{{ $value ?? '' }}"
  placeholder="{{ $placeholder ?? '' }}"
  @if (isset($min))
    min="{{ $min }}"
  @endif
  @if (isset($max))
    max="{{ $max }}"
  @endif
  @if ($required ?? false)
    required
  @endif
  step="{{ $step ?? 'any' }}"
>
