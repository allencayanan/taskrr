<a class="{{ $class ?? 'btn btn-outline-secondary' }}"
  href="{{ $to ?? route('/') }}"
  @if (! empty($opens_new_tab))
    target="_blank"
  @endif
  >
  @if (! empty($icon))
    <i class="ficon" data-feather="{{ $icon }}"></i>
  @endif
  {{ $label ?? 'Home' }}
</a>
