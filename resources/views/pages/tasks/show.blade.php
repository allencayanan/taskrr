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
        'label' => $task->trashed() ? 'Delete Permanently' : 'Move to Trash',
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

<section class="container mt-5">
  <div class="d-flex">
    @include('includes.buttons.redirect', [
      'label' => 'Create New Sub Task',
      'class' => 'btn btn-success me-3',
      'to' => route('subtasks.create', $task->id),
    ])
  </div>

  <table class="table mt-5">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($task->subTasks as $subTask)

        <tr>
          <th>{{ $loop->iteration }}</th>
          <td>{{ $subTask->title }}</td>
          <td>{{ $subTask->description }}</td>
          <td>
            <div class="d-flex">
              @include('includes.buttons.redirect', [
                'label' => 'Edit Subtask',
                'class' => 'btn btn-warning me-1',
                'to' => route('subtasks.edit', [$task->id, $subTask->id]),
              ])
              <form method="POST" action="{{ route('subtasks.destroy', [$task->id, $subTask->id]) }}">
                @method('DELETE')
                @csrf
                @include('includes.buttons.submit', [
                  'class' => 'btn btn-danger',
                  'label' => 'Delete Sub Task',
                ])
            </form>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

</section>

@endsection
