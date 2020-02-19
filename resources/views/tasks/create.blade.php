@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h5 class="font-weight-bold text-dark">Add New Task</h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            @if ($errors->any())
            <div class="alert alert-danger">
              <p><strong>Whoops!</strong> There were some problems with your input.</p>
              <ul class="m-0 pl-4">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
        </div>

        <form action="{{ route('projects.tasks.store', $project) }}" method="POST">
          @csrf

          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
                <input type="hidden" name="project_id" value="{{ $project }}">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <strong>Plan Start Date:</strong>
                <input type="date" name="plan_start_date" class="form-control">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <strong>Plan End Date:</strong>
                <input type="date" name="plan_end_date" class="form-control">
              </div>
            </div>
            <div class="col-12 text-right">
              <a class="btn btn-sm btn-info" href="{{ route('projects.tasks.index', $project) }}">Cancel</a>
              <button type="submit" class="btn btn-sm btn-success">Submit</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection