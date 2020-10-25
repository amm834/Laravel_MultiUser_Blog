@extends('layouts.master')
@section('content')
<div class="container-fluid">
  <div class="card">
    @include('admin.error')
    <h5 class="card-header bg-primary text-light">Manage Roles</h5>
    <div class="card-body">

      <!-- Button trigger modal -->
      <button
        type="button"
        class="btn btn-success"
        data-toggle="modal"
        data-target="#staticBackdrop"
        >
        Create
      </button>

      <!-- Modal -->
      <div
        class="modal fade"
        id="staticBackdrop"
        data-backdrop="static"
        data-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
        >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Create New Role</h5>
            </div>
            <div class="modal-body">
              <form action="{{route('roles.store')}}" id="create-role" method="post">
                @csrf
                <div class="form-group">
                  <label>Enter Position Name</label>
                  <input type="text" class="form-control" autocomplete="off" name="name">
                </div>
              </form>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">
                Close
              </button>
              <button type="submit" class="btn btn-primary" form="create-role">Create</button>
            </div>
          </div>
        </div>
      </div>

      <div class="table-responsive my-3">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Position</th>
              <th scope="col" class="text-center" colspan="2">Manage</th>
            </tr>
          </thead>
          <tbody>
            @foreach($roles as $role)
            <tr>
              <th scope="row">{{$role->id}}</th>
              <td>{{$role->name}}</td>
              <td>
                <form action="{{route('roles.destroy',$role->id)}}" method="post" id="delete-role" class="text-center">
                  @csrf
               {{method_field('DELETE')}}
                               <a href="{{route('roles.edit',$role->id)}}" class="btn btn-info">Edit</a>

                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>

              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>

</div>
@endsection