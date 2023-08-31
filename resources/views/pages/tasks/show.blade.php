@extends('layouts.app')

@section('content')

<section class="container">
  <div class="d-flex">
    @include('includes.buttons.redirect', [
      'label' => 'Back',
      'class' => 'btn btn-outline-secondary me-3',
      'to' => route('tasks.index'),
    ])
    @include('includes.buttons.redirect', [
      'label' => 'Edit',
      'class' => 'btn btn-warning me-3',
      'to' => route('tasks.edit', $task->id),
    ])

    <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
      @method('DELETE')
      @csrf
      @include('includes.buttons.submit', [
        'class' => 'btn btn-danger',
        'label' => 'Move to Trash',
      ])
    </form>
  </div>
  <div class="row mt-5">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="card-title">
            <h4>{{ $task->title }}</h4>
          </div>
          <div class="card-text">
            <p>{{ $task->description }}</p>
          </div>
        </div>
        <div class="card-footer">
          @include('pages.tasks.components.status', ['status' => $task->status])
        </div>
      </div>
    </div>
  </div>

</section>

@endsection
