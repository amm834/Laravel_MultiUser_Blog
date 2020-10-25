@extends('layouts.master')
@section('content')

<div class="container">
  <div class="card">
    @include('admin.error')
    <div class="card-header bg-primary text-light">
      Rename Role
    </div>
    <div class="card-body">
   
        <form action="{{route('roles.update',$role->id)}}" method="post">
             @csrf
      {{method_field('PUT')}}
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Enter Role Name" value="{{$role->name}}" name="name">
      </div>
      <button type="submit" class="btn btn-info my-3">Rename</button>
    </form>
    </div>
  </div>
</div>
@endsection