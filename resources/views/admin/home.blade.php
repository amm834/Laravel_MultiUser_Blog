@extends('layouts.master')
@section('content')
<!-- Top Panel For Showing Total users,posts and cats  -->
<div class="container-fluid">
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
      <div class="card h-100 bg-primary text-white">
        <div class="card-body">
          <h5 class="card-title">{{$users->count()}}</h5>
          <p class="card-text">
            Users
          </p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100 bg-secondary text-white">
        <div class="card-body">
          <h5 class="card-title">{{$cats->count()}}</h5>
          <p class="card-text">
            Categories
          </p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100 bg-success text-white">
        <div class="card-body">
          <h5 class="card-title">{{$posts->count()}}</h5>
          <p class="card-text">
            Posts
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <!-- Tabs navs -->
  <ul class="nav nav-tabs nav-justified my-3 border border-1" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
      <a
        class="nav-link active"
        id="ex3-tab-1"
        data-toggle="tab"
        href="#ex3-tabs-1"
        role="tab"
        aria-controls="ex3-tabs-1"
        aria-selected="true"
        >Users</a
      >
    </li>
    <li class="nav-item" role="presentation">
      <a
        class="nav-link"
        id="ex3-tab-2"
        data-toggle="tab"
        href="#ex3-tabs-2"
        role="tab"
        aria-controls="ex3-tabs-2"
        aria-selected="false"
        >Categories</a
      >
    </li>
    <li class="nav-item" role="presentation">
      <a
        class="nav-link"
        id="ex3-tab-3"
        data-toggle="tab"
        href="#ex3-tabs-3"
        role="tab"
        aria-controls="ex3-tabs-3"
        aria-selected="false"
        >Posts</a
      >
    </li>
  </ul>
  <!-- Tabs navs -->

  <!-- Tabs content -->
  <div class="tab-content" id="ex2-content">
    <div
      class="tab-pane fade show active"
      id="ex3-tabs-1"
      role="tabpanel"
      aria-labelledby="ex3-tab-1"
      >
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <th scope="row">{{$user->id}}</th>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div
      class="tab-pane fade"
      id="ex3-tabs-2"
      role="tabpanel"
      aria-labelledby="ex3-tab-2"
      >
      <!-- Categories Card  -->
      <div class="card">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Related Posts</th>
            </tr>
          </thead>
          <tbody>
            @foreach($cats as $cat)
            <tr>
              <th scope="row">{{$cat->id}}</th>
              <td>{{$cat->name}}</td>
              <td>{{$cat->posts->count()}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- Categories Card  -->

    </div>
    <div
      class="tab-pane fade"
      id="ex3-tabs-3"
      role="tabpanel"
      aria-labelledby="ex3-tab-3"
      >
      <div class="card">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col" >Related Category</th>
            </tr>
          </thead>
          <tbody>
            @foreach($posts as $post)
            <tr>
              <td scope="row">{{$post->id}}</td>
              <td class=" d-flex justify-content-between">{{$post->category->name}}
              <a href="{{route('public.show',$post->id)}}" class="btn btn-secondary">Detail</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>
  <!-- Tabs content -->
</div>


@endsection