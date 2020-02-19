@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-12">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show">
      <span>{{ $message }}</span>
      <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-6">
            <h5 class="font-weight-bold text-dark">Project Tasks</h5>
          </div>
          <div class="col-6 text-right">
            <a href="{{ route('projects.show', $project) }}" class="btn btn-sm btn-info">Back</a>
            <a class="btn btn-sm btn-success" href="{{ route('projects.tasks.create', $project) }}"> Create New Task</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-sm table-striped">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Plan Start Date</th>
              <th>Plan End Date</th>
              <th width="280px">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tasks as $task)
            <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $task->name }}</td>
              <td>{{ $task->plan_start_date }}</td>
              <td>{{ $task->plan_end_date }}</td>
              <td class="text-center">
                <form id="delete-form" action="{{ route('projects.tasks.destroy', [$project, $task->id]) }}" method="POST">

                  <a class="btn btn-sm btn-info" href="{{ route('projects.tasks.show', [$project, $task->id]) }}">
                    <i class="fa fa-file" aria-hidden="true"></i>
                  </a>

                  <a class="btn btn-sm btn-primary" href="{{ route('projects.tasks.edit', [$project, $task->id]) }}">
                    <i class="fa fa-edit" aria-hidden="true"></i>
                  </a>

                  @csrf
                  @method('DELETE')

                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="showDeleteModal()">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                  </a>
                </form>
              </td>
            </tr>
            @endforeach

            {!! $tasks->links() !!}
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection