@extends('index')
@section('content')
@if($errors->any())

  @foreach($errors->all() as $errors)
    <div class="badge text-bg-danger">
      {{$errors}}
    </div>
  @endforeach
@endif
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">title</label>
      <input type="text" class="form-control" name="titre" value="{{$article->nom ?? ''}}">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">content</label>
      <input type="text" class="form-control" name="content" value="{{$article->content ?? ''}}">
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="file" class="form-control" name="file" value="{{$article->photo_path ?? ''}}">
    </div>
  </div>
  
 
  <button type="submit" class="btn btn-primary">update item</button>
</form>
@endsection()