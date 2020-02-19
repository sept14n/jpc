@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-6">
            <h5 class="font-weight-bold text-dark">Detail Project Task</h5>
          </div>
          <div class="col-6 text-right">
            <a href="{{ route('projects.tasks.index', $project) }}" class="btn btn-sm btn-info">Back</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <h5 class="card-title">{{ $task->name }}</h5>
        <p class="card-text">{{ $task->plan_start_date }}<br>{{ $task->plan_end_date }}</p>
      </div>
    </div>
  </div>
</div>
@endsection