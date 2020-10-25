@extends('layouts.master')
@section('content')
<div class="container">
  @include('admin.error')
  <a href="{{route('posts.create')}}" class="btn btn-primary mb-3 text-center btn-sm">
    New Post
    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
    </svg>
  </a>
  <div class="row">
    @foreach($posts as $post)
    <div class="col-sm-6 mb-3">
      <div class="card h-100">
        <div class="card-header">
          <span class="badge bg-success p-1">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-check-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9.854-2.854a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
            </svg>          {{$post->user->name}}
          </span>
          <span class="badge bg-primary p-1">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-tag" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M2 2v4.586l7 7L13.586 9l-7-7H2zM1 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2z" />
              <path fill-rule="evenodd" d="M4.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
            </svg>          {{$post->category->name}}
          </span>
        </div>
        <div class="card-body">
          <p class="card-text">
            {!! Str::limit($post->content,201,' [...]')  !!}
          </p>
        </div>
        <div class="card-footer">
          @if(Auth::user()->id=== $post->user_id || Auth::user()->hasRole('Admin'))
          <a href="{{route('posts.edit',$post->id)}}" class="btn btn-info">Edit</a>
          <a href="{{action('post\PostController@destroy',$post->id)}}" class="btn btn-danger"
            onclick="return confirm('Are you sure to delete this post?')"
            >Delete</a>

          @endif
          <a href="{{route('public.show',$post->id)}}" class="btn btn-primary float-right">Detail</a>
        </div>
      </div>
    </div>
    @endforeach

  </div>
</div>
@endsection