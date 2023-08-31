<a
  href="{{ $to ?? '#' }}"
  class="{{ $class ?? 'btn btn-secondary waves-effect waves-float waves-light me-2' }} {{ isset($label) ? '' : 'btn-icon' }}"
>
  {!! $label ?? '<i data-feather="chevron-left"></i>' !!}
</a>
