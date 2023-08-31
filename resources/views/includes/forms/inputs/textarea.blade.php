<textarea
  class="{{ $class ?? 'form-control' }}"
  name="{{ $name ?? '' }}"
  id="{{ $name ?? '' }}"
  @if ($required ?? false)
    required
  @endif
  cols="{{ $cols ?? 5 }}"
  rows="{{ $rows ?? 1 }}"
>{{ $value ?? '' }}</textarea>
