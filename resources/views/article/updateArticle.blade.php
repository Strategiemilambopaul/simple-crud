@extends('index')
@section('content')
@if($errors->any())

  @foreach($errors->all() as $errors)
    <div class="badge text-bg-danger">
      {{$errors}}
    </div>
  @endforeach
@endif
<form action="{{route('article_up_dashboard',['id'=>$article->id])}}" method="post" enctype="multipart/form-data">
  @Csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nom">title</label>
      <input type="text" class="form-control" name="nom" value="{{$article->nom ?? ''}}">
    </div>
    <div class="form-group col-md-6">
      <label for="content">content</label>
      <input type="text" class="form-control" name="content" value="{{$article->content ?? ''}}">
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="photo_path">City</label>
      <input type="file" class="form-control" name="photo_path" value="{{$article->photo_path ?? ''}}">
    </div>
  </div>
  <br>
  <button type="submit" class="btn btn-primary">update item</button>
</form>
@endsection()