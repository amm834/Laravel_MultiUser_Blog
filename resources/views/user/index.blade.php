@extends('layouts.app')
@section('content')
<div class="bg-image">
  <img
  src="https://images.unsplash.com/photo-1504164996022-09080787b6b3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80"
  class="img-fluid"
  alt="Sample"
  />
  <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="text-white text-center">
        <h1>Web Developer Enviroment</h1>
        <p>
          Having many errors make me strong!!
          <br>
        </p>
      </div>
    </div>
  </div>
</div>
<div class="container my-3">
  <div class="row">
    @foreach($posts as $post)
    <div class="col-sm-6 mb-3">
      <div class="card h-100 rounded">
        <img
        src="{{asset('imgs/'.$post->img)}}"
        alt="Image"
        class="img-fluid rounded-top" style="height:200px;"
        />
        <div class="card-body">
          <p class="card-text">
            <span class="badge bg-success p-1">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-check-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9.854-2.854a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
              </svg>
              {{$post->user->name}}
            </span>
            <span class="badge bg-primary p-1">
              <a href="{{action('user\CategoryController@index',$post->category)}}" class="text-white">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-tag-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1H2zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
              </svg>
              {{$post->category->name}}
              </a>
            </span>
            <span class="badge bg-info p-1">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clock" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm8-7A8 8 0 1 1 0 8a8 8 0 0 1 16 0z" />
                <path fill-rule="evenodd" d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
              </svg>
              {{$post->created_at->diffForHumans()}}</span>

          </span>

        </p>
        <p class="card-text">
          {!! Str::limit($post->content,251,' [...]') !!}

        </p>
      </div>
      <div class="card-footer">
        <!-- Read More -->
        <a href="{{route('public.show',$post->id)}}" class="btn btn-primary float-right">Read More</a>

      </div>
    </div>
  </div>
  @endforeach
</div>
</div>
<nav class="justify-content-center d-flex">
{{$posts->links()}}
</nav>

<!-- Footer -->
<div class="container my-5">
<div class="col-md-8 offset-md-2">
<div class="card">
<p class="text-center display-6 bold">
Categories
</p>
<ul class="list-group list-group-flush">
@foreach($cats as $cat)
<li class="list-group-item text-center"><a href="{{action('user\CategoryController@index',$cat->id)}}">
{{$cat->name}}
</a></li>
@endforeach
</ul>
</div>
</div>
</div>

<!-- Footer -->

@endsection