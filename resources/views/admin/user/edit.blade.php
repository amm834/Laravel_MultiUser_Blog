@extends('layouts.master')
@section('content')
<div class="container">
  <div class="card my-3">
    <div class="card-header bg-primary text-light">
      Assign Role Of User
    </div>
    <div class="container">
      <form action="{{route('users.update',$user->id)}}" class="my-3" method="post">
        @csrf
        {{method_field('PUT')}}
        <div class="form-group mb-2">
          <label>Username</label>
          <input type="text" class="form-control" value="{{$user->name}}" disabled>
        </div>
        <div class="form-group mb-2">
          <label>Email</label>
          <input type="text" class="form-control" value="{{$user->email}}" disabled>
        </div>
        <div class="form-group mb-2">
          <label>Choose Role</label>
          <select name="role" class="form-control">
            @foreach($roles as $role)
            <option value="{{$role->name}}"
            
            @if(in_array($role->name,$selectedRole))
            selected
            @endif
            >{{$role->name}}
            </option>
            @endforeach
          </select>

        </div>
        <button type="submit" class="btn btn-secondary">Update</button>
      </form>

    </div>
  </div>
</div>
@endsection