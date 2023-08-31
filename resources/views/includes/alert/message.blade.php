<div class="alert alert-{{ $class ?? 'info' }} alert-dismissible fade show mt-1" role="alert">
  <div class="alert-body">
    @if (is_array($message))
      @foreach ($message as $msg)
        {{ $msg }} <br>
      @endforeach
    @else
      {{ $message }}
    @endif
  </div>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
