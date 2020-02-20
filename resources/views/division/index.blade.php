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
            <h5 class="font-weight-bold text-dark">Division</h5>
          </div>
          <div class="col-6 text-right">
            <a class="btn btn-sm btn-success" href="{{ route('division.create') }}"> Create New Division</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-sm table-striped">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Name</th>              
              <th class="text-center" width="280px">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($division as $divisi)
            <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $divisi->name }}</td>
              <td class="text-center">
                <form id="delete-form" action="{{ route('division.destroy', $divisi->id) }}" method="POST">

                  <a class="btn btn-sm btn-info" href="{{ route('division.show', $divisi->id) }}">
                    <i class="fa fa-file" aria-hidden="true"></i>
                  </a>

                  <a class="btn btn-sm btn-primary" href="{{ route('division.edit', $divisi->id) }}">
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

            {{ $division->links() }}
          </tbody>          
        </table>
      </div>
    </div>
  </div>
</div>
@endsection