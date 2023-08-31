@extends('layouts.app')

@section('content')
<section class="container">
  <div class="card mx-auto mt-5" style="max-width: 700px">
    <div class="card-body">
      @include('includes.forms.horizontal.form', [
        'form' => [
          'action' => route('register.store'),
          'method' => 'POST',
          'fields' => [
            [
              'label' => 'Name',
              'name' => 'name',
              'type' => 'name',
              'value' => old('name'),
              'required' => true,
            ],
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
            [
              'label' => 'Confirm Password',
              'name' => 'password_confirmation',
              'type' => 'password',
              'value' => '',
              'required' => true,
            ],
          ],
          'buttons' => [
            'submit' => [
              'label' => 'Register',
            ],
          ],
        ],
      ])
      <div class="mt-3">Already have an account? Login <a href="{{ route('login.index') }}">here</a></div>
    </div>
  </div>
</section>
@endsection
