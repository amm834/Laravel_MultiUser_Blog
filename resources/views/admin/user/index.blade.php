@extends('layouts.master')
@section('content')
<div class="container-fluid">
  <div class="table-responsive caption-top">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col" colspan="2" class="text-center">Manage</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <th scope="row">{{$user->id}}</th>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>

          <td>
            {{$user->roles()->pluck('name')->first()}}
          </td>
          <td>
            <div class="dropdown text-center">
              <button
                class="btn btn-primary dropdown-toggle"
                type="button"
                id="dropdownMenuButton"
                data-toggle="dropdown"
                aria-expanded="false"
                >
                Manager User
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li class="dropdown-item">
                  <a href="{{route('users.edit',$user->id)}}" class="btn btn-info btn-block">Edit</a>
                </li>
              </ul>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection