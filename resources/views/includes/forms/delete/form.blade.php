<form
  class="form"
  action="{{ Arr::get($form, 'action') }}"
  method="POST"
  id="{{ Str::slug(Arr::get($form, 'title') . ' form') }}"
>
  @csrf
  @method('DELETE')
  <div class="text-center my-4">
    {{ Arr::get($form, 'message') }}
  </div>
  <div class="text-center">
    @include('includes.buttons.submit', Arr::get($form, 'buttons.submit', []))
    <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal" aria-label="Close">
      Cancel
    </button>
  </div>
</form>
