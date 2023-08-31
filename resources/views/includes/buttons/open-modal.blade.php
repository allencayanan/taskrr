<a class="{{ $class ?? 'btn btn-primary' }}" tabindex="0" type="button" data-bs-toggle="modal" data-bs-target="#{{ $modal_id }}">
  @if (! empty($icon))
    <i class="ficon" data-feather="{{ $icon }}"></i>
  @endif
  {{ $label ?? 'Create New Record' }}
</a>
