@extends('layouts.master')
@section('content')
<div class="container">
  <div class="card">
  <div class="card-header">
    Edit Category
  </div>
  <div class="card-body">
    <form action="{{route('categories.update',$cat->slug)}}" method="post">
      @csrf
      {{method_field('PUT')}}
      <div class="form-group">
        <input type="text" class="form-control" name="name" value="{{$cat->name}}" autocomplete="off">
      </div>
      <button type="submit" class="btn btn-secondary my-2">Rename</button>
    </form>
  </div>
</div>

</div>
@endsection