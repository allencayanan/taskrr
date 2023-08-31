<select
  class="{{ $class ?? 'form-select' }}"
  id="{{ $name ?? '' }}"
  name="{{ $name ?? '' }}"
>
  @foreach ($options as $key => $option)
    <option @if(isset($selected) && $selected == $option) selected @endif value="{{ $option }}">{{ $option }}</option>
  @endforeach
</select>
