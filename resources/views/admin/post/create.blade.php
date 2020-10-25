<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">

  <title>CKEditor 5 – Classic editor</title>
</head>
<body>
  @include('layouts.navbar')
</div>
<div class="container my-3">
  @include('admin.error')
  <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container justify-content-between d-flex my-3">
      <a href="{{route('posts.index')}}" class="btn btn-outline-info">
        Cancel
      </a>
      <button type="submit" class="btn btn-primary">Post</button>
    </div>
    <div class="form-group my-3 ">
      <input type="file" class="form-control" name="img">
    </div>
        <div class="form-group my-3">
      <select name="category_id" class="form-control">
        @foreach($categories as $cat)
        <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
      </select>
    </div>

    <textarea id="editor" name="content">
        </textarea>
        
    </form>
  </div>

</div>
</div>


</div>
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<script src="{{asset('js/app.js')}}"></script>

<script>
ClassicEditor
.create(document.querySelector('#editor'), {
toolbar: [
'Heading',
'bold',
'italic',
'|',
'undo',
'redo',
'bulletedList',
'numberedList',
'blockQuote',
'Link',
]
})
.catch(error => {
console.error(error);
});
</script>
</body>
</html>