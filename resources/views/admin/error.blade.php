@if($errors)
@foreach($errors->all() as $error)

<div class="alert alert-danger alert-dismissible fade show my-3" role="alert" data-color="danger">
  <strong>Alert!</strong> {{$error}}
  <button
    type="button"
    class="btn-close"
    data-dismiss="alert"
    aria-label="Close"
  ></button>
</div>
@endforeach
@endif

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show my-3" role="alert" >
  <strong>Success!</strong> {{session('success')}}
  <button
    type="button"
    class="btn-close"
    data-dismiss="alert"
    aria-label="Close"
  ></button>
</div>
@endif

@if(session('unique'))
<div class="alert alert-warning alert-dismissible fade show my-3" role="alert" >
  <strong>Warning!</strong> {{session('unique')}}
  <button
    type="button"
    class="btn-close"
    data-dismiss="alert"
    aria-label="Close"
  ></button>
</div>
@endif

