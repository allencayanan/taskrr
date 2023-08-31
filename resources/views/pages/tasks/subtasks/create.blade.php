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
          'action' => route('subtasks.store', [
            'task' => $task->id
          ]),
          'method' => 'POST',
          'fields' => [
            [
              'label' => 'Title',
              'name' => 'title',
              'type' => 'title',
              'value' => old('title'),
              'required' => true,
            ],
            [
              'label' => 'Description',
              'name' => 'description',
              'type' => 'textarea',
              'value' => old('description'),
              'rows' => 5,
            ],
          ],
          'buttons' => [
            'submit' => [
              'label' => 'Create New Sub Task',
              'class' => 'btn btn-primary'
            ],
          ],
        ],
      ])
    </div>
  </div>

</section>

@endsection
