@extends('index')
  @Section('content')
  @if($errors->any())
    @foreach($errors->all() as $errors)
      <div class="badge text-bg-danger">
        {{$errors}}
      </div>
    @endforeach
  @endif
  <form action="{{route('category_up_dashboard',['id'=>$category->id])}}" method="post">
      @Csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">title</label>
        <input type="text" class="form-control" name="titre" value="{{$category->titre ?? ''}}">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">content</label>
        <input type="text" class="form-control" name="content" value="{{$category->content ?? ''}}">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
  </form>
@endSection()
