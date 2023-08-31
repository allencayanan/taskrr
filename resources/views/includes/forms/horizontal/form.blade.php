@includeWhen($errors->isNotEmpty(), 'includes.alert.message', [
  'message' => $errors->all(),
  'class' => 'danger',
])
<form
  class="form form-horizontal"
  action="{{ Arr::get($form, 'action') }}"
  method="POST"
  id="{{ Str::slug(Arr::get($form, 'title') . ' form') }}"
>
  @csrf
  @if (Arr::get($form, 'method') !== 'POST')
    @method(Arr::get($form, 'method'))
  @endif
  <div class="row">
    @foreach (Arr::get($form, 'fields', []) as $field)
      <div class="col-12">
        <div class="mb-4 row">
          <div class="col-sm-3">
            <label for="{{ Arr::get($field, 'name') }}" class="col-form-label">{{ Arr::get($field, 'label', Str::title(Arr::get($field, 'name'))) }}</label>
          </div>
          <div class="col-sm-9">
            @switch(Arr::get($field, 'type'))
              @case('datepicker')
                <div class="position-relative">
                  @include('includes.forms.inputs.datepicker', $field)
                </div>
                @break
              @case('number')
                @include('includes.forms.inputs.number', $field)
                @break
              @case('email')
                @include('includes.forms.inputs.email', $field)
                @break
              @case('password')
                @include('includes.forms.inputs.password', $field)
                @break
              @case('textarea')
                @include('includes.forms.inputs.textarea', $field)
                @break
              @case('checkbox')
                <div class="form-check form-check-inline">
                  @include('includes.forms.inputs.checkbox', $field)
                </div>
                @break
              @case('select')
                  @include('includes.forms.inputs.select', $field)
                @break
              @case('switch')
                <div class="form-check form-switch">
                  @include('includes.forms.inputs.switch', $field)
                </div>
                @break
              @default
                @include('includes.forms.inputs.text', $field)
            @endswitch
          </div>
        </div>
      </div>
    @endforeach

    <div class="col-sm-9 offset-sm-3">
        @include('includes.buttons.submit', Arr::get($form, 'buttons.submit', []))
        @includeWhen(Arr::exists($form, 'buttons.reset'), 'includes.buttons.reset', Arr::get($form, 'buttons.reset'))
    </div>
  </div>
</form>
