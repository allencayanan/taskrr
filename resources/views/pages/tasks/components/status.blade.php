@switch($status)
  @case('In Progress')
    <span class="badge rounded-pill bg-primary">In Progress</span>
    @break
  @case('Completed')
    <span class="badge rounded-pill bg-success">Completed</span>
    @break
  @case('Trashed')
    <span class="badge rounded-pill bg-danger">Trashed</span>
    @break
  @default
  <span class="badge rounded-pill bg-secondary">Todo</span>
@endswitch
