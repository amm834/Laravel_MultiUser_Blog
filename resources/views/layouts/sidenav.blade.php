<div class="container mt-3">
  <div class="card">
    <div class="card-header bg-primary text-light">
      Admin Panel
    </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      <a href="{{url('admin/home')}}">
      Admin Dashboard
    </a>
    </li>
    <li class="list-group-item">
      <a href="{{route('roles.index')}}">
      Manage Role
    </a>
    </li>
    <li class="list-group-item">
      <a href="{{route('users.index')}}">
      Manage Users
    </a>
    </li>
    <li class="list-group-item ">
      <a href="{{route('categories.index')}}">
      Manage Categories
    </a>
    </li>
    <li class="list-group-item">
      <a href="{{route('posts.index')}}">
     Manage Posts
    </a>
    </li>
  </ul>
</div>
</div>
