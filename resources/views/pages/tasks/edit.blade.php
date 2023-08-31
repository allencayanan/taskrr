@extends('layouts.app')

@section('content')

<section class="container">

  @include('includes.buttons.redirect', [
    'label' => 'Back',
    'to' => route('tasks.show', $task->id),
  ])
  <div class="card mx-auto mt-5">
    <div class="card-body">
      @include('includes.forms.horizontal.form', [
        'form' => [
          'action' => route('tasks.update', $task->id),
          'method' => 'PUT',
          'fields' => [
            [
              'label' => 'Title',
              'name' => 'title',
              'type' => 'title',
              'value' => old('title', $task->title),
              'required' => true,
            ],
            [
              'label' => 'Description',
              'name' => 'description',
              'type' => 'textarea',
              'value' => old('description', $task->description),
              'rows' => 5,
            ],
            [
              'label' => 'Status',
              'name' => 'status',
              'type' => 'select',
              'options' => App\Models\Task::getStatuses(),
              'selected' => old('status', $task->status),
            ]
          ],
          'buttons' => [
            'submit' => [
              'label' => 'Update Task',
              'class' => 'btn btn-primary'
            ],
          ],
        ],
      ])
    </div>
  </div>

</section>

@endsection
