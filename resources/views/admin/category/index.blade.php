@extends('layouts.master')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header bg-primary text-light">
      Manage Categories
    </div>
 <div class="card-text">
   @include('admin.error')
   <!-- Button trigger modal -->
<button
  type="button"
  class="btn btn-primary m-3"
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
        <h5 class="modal-title" id="staticBackdropLabel">Create Category</h5>
        <button
          type="button"
          class="btn-close"
          data-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form action="{{route('categories.store')}}" method="post" id="create-cat">
          @csrf
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter Category Name">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Close
        </button>
        <button type="submit" class="btn btn-primary" form="create-cat">Create</button>
      </div>
    </div>
  </div>
</div> 
      <div class="table-responsive">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Slug</th>
      <th scope="col" colspan="3" class="text-center">Manage</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $cat)
    <tr>
      <th scope="row">{{$cat->id}}</th>
      <td>{{$cat->name}}</td>
      <td>{{$cat->slug}}</td>
      <td class="text-center" colspan="2"><a href="{{route('categories.edit',$cat->slug)}}" class="btn btn-info btn-sm">Edit</a></td>
      <td>
        <form action="{{route('categories.destroy',$cat->slug )}}" method="post">
          @csrf
          {{method_field('Delete')}}
          <button class="btn btn-sm btn-danger" type="submit">Delete</button>
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