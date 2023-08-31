@extends('layouts.app')

@section('content')
<section class="container justify-content-center">
  <div class="card mx-auto mt-5" style="max-width: 700px">
    <div class="card-body">
      @include('includes.forms.horizontal.form', [
        'form' => [
          'action' => route('login.authenticate'),
          'method' => 'POST',
          'fields' => [
            [
              'label' => 'Email Address',
              'name' => 'email',
              'type' => 'email',
              'value' => old('email'),
              'required' => true,
            ],
            [
              'label' => 'Password',
              'name' => 'password',
              'type' => 'password',
              'value' => old('password'),
              'required' => true,
            ],
          ],
          'buttons' => [
            'submit' => [
              'label' => 'Login',
              'class' => 'btn btn-primary'
            ],
          ],
        ],
      ])
      <div class="mt-3">No Account yet? Register <a href="{{ route('register.index') }}">here</a></div>
    </div>
  </div>

</section>
@endsection
