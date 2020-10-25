@extends('layouts.app')
@section('content')
<div class="container my-3">
  <div class="card shadow-0 border-0">
    <img
    src="{{asset('imgs/'.$post->img)}}"
    class="img-fluid"
    />
    <div class="bg-image hover-overlay ripple" data-ripple-color="light">

      <a href="#!">
        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
      </a>
    </div>
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
          {{$post->created_at->diffForHumans()}}
        </span>
      </p>
      <p class="card-text">
        {!! $post->content !!}
      </p>
      <div class="card-footer">
        <button class="border-0 my-2" style="background-color:transparent;">
          {{$votes->count()}}
          Likes
        </button>

        @auth
        <form>
          @csrf
          <button
            formaction="{{action('User\VoteController@like',$post->id)}}"
            @if($likestatus)
            @if($likestatus->status == 'like')
            class="btn btn-success"
            @elseif($likestatus->status == 'unlike')
            class="btn btn-outline-success"
            @endif
            @else
            class="btn btn-outline-success"
            @endif
            >
            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-hand-thumbs-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16v-1c.563 0 .901-.272 1.066-.56a.865.865 0 0 0 .121-.416c0-.12-.035-.165-.04-.17l-.354-.354.353-.354c.202-.201.407-.511.505-.804.104-.312.043-.441-.005-.488l-.353-.354.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581 0-.211-.027-.414-.075-.581-.05-.174-.111-.273-.154-.315L12.793 9l.353-.354c.353-.352.373-.713.267-1.02-.122-.35-.396-.593-.571-.652-.653-.217-1.447-.224-2.11-.164a8.907 8.907 0 0 0-1.094.171l-.014.003-.003.001a.5.5 0 0 1-.595-.643 8.34 8.34 0 0 0 .145-4.726c-.03-.111-.128-.215-.288-.255l-.262-.065c-.306-.077-.642.156-.667.518-.075 1.082-.239 2.15-.482 2.85-.174.502-.603 1.268-1.238 1.977-.637.712-1.519 1.41-2.614 1.708-.394.108-.62.396-.62.65v4.002c0 .26.22.515.553.55 1.293.137 1.936.53 2.491.868l.04.025c.27.164.495.296.776.393.277.095.63.163 1.14.163h3.5v1H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
            </svg>
          </button>
        </form>
        @endauth
      </div>
    </div>
  </div>
  <!-- Comment Show -->
  @foreach($cmts as $cmt)
  <div class="card border border-1 border-dark mb-3">
    <div class="card-header">
      <p>
        <span class="badge bg-primary p-1">
          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-check-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9.854-2.854a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
          </svg>
          {{$cmt->user->name}}
        </span>
        <span class="badge bg-info p-1">
          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clock" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm8-7A8 8 0 1 1 0 8a8 8 0 0 1 16 0z" />
            <path fill-rule="evenodd" d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
          </svg>
          {{$cmt->created_at->diffForHumans()}}
        </span>
      </p>
    </div>
    <div class="card-body">
      <p class="card-text">
        {{$cmt->content}}
      </p>
    </div>
  </div>
  @endforeach
  <!-- Comment Form -->
  @auth
  <form action="{{route('public.store',$post->id)}}" method="post">
    @csrf
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <input type="hidden" name="commentable_id" value="{{$post->id}}">
    <input type="hidden" name="commentable_type" value="App\Models\Post">
    <div class="form-group">
      <input type="text" class="form-control" name="content" placeholder="Discuss Something ...">
    </div>
    <button type="submit" class="btn btn-primary float-right my-2">
      Comment
    </button>
  </form>
  <div style="clear:both;"></div>
  @else
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Login To Discuss!" disabled="on">
  </div>
  @endauth
</div>
@endsection