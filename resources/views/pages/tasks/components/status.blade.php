@switch($status)
  @case('Todo')
    <span class="badge rounded-pill bg-secondary">Todo</span>
    @break
  @case('In Progress')
    <span class="badge rounded-pill bg-primary">In Progress</span>
    @break
  @case('Completed')
    <span class="badge rounded-pill bg-success">Completed</span>
    @break
  @default
    <span class="badge rounded-pill bg-danger">Trashed</span>
@endswitch
