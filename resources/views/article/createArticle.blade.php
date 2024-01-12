<!DOCTYPE html>
@extends('index')
@Section('content')

@if($errors->any())

@foreach($errors->all() as $errors)
<div class="badge text-bg-danger">
  {{$errors}}
</div>
@endforeach
@endif
<form action="{{route('createArticle')}}" method="post" enctype="multipart/form-data">
  @Csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">title</label>
      <input type="text" class="form-control" name="nom">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">content</label>
      <input type="text" class="form-control" name="content">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">picture</label>
      <input type="file" class="form-control" name="photo_path">
    </div>
  </div>
  <br>
 <div class="select">
  <select class="form-select" aria-label="Default select example" name="category">
      <option selected>Open this select menu to add a cantegory</option>
      @foreach($category as $items)
        <option value="{{$items->id}}">{{$items->titre}}</option>
      @endforeach()
  </select>
 </div>
<br>
<button type="submit" class="btn btn-primary">Create item</button>
</form>
@endSection