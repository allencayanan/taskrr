@extends('layouts.app')

@section('content')

<section class="container">

  <div class="d-flex">
    @include('includes.buttons.redirect', [
      'label' => 'Create New Task',
      'class' => 'btn btn-success me-3',
      'to' => route('tasks.create'),
    ])

    @include('includes.buttons.redirect', [
      'label' => 'See Trashed',
      'class' => 'btn btn-outline-secondary me-3',
      'to' => request()->fullUrlWithQuery([
        'withTrashed' => '1',
      ]),
    ])

    @include('includes.buttons.redirect', [
      'label' => 'Sort By Asc',
      'class' => 'btn btn-outline-secondary me-3',
      'to' => request()->fullUrlWithQuery([
        'sortBy' => 'asc',
      ]),
    ])

    @include('includes.buttons.redirect', [
      'label' => 'Sort By Desc',
      'class' => 'btn btn-outline-secondary me-3',
      'to' => request()->fullUrlWithQuery([
        'sortBy' => 'desc',
      ]),
    ])
  </div>
  <div class="row mt-5">
    @foreach ($tasks as $task)
      <div class="col-3">
        <div class="card mt-4">
          <div class="card-body">
            <div class="card-title">
              <h4><a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a></h4>
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
    @endforeach
  </div>
</section>

@endsection
