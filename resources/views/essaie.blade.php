<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<body>


<div class="position-relative mt-4">
  <div class="position-absolute top-50 start-50">
    <h2  class="badge text-bg-secondary" >
        SHORT DASHBOARD 
      
    </h2>
    
</div>
<hr>
</div>

<table class="table table-striped mb-4">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">categories</th>
      <th scope="col">content</th>
      <th scope="col"><a href="{{route('createCategory')}}" class="badge text-bg-info"> create </a></th>
  
    </tr>
  </thead>

  <tbody>
   
   @foreach($category as $categories)
    <tr>
      <th scope="row">{{$categories->id}}</th>
      <td><a href="{{route('category',['id'=>$categories->id])}}" class="badge text-bg-secondary">{{$categories->titre}}</a></td>
      <td><i>{{ substr($categories->content,0,50)}}...</i></td>
      <td><i><a href="{{route('delete_category',['id'=>$categories->id])}}" class="badge text-bg-danger" onclick=confirm("voulez-vous supprimez")>delete</a> </i> -- <i><a href="{{route('updateCategory',['id'=>$categories->id])}}" class="badge text-bg-success">update</a></i></td>
      
    </tr>
    @endforeach

  </tbody>
</table>

<hr>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#~</th>
      <th scope="col">article</th>
      <th scope="col">content</th>
    <th class="scope"><a href="{{route('createArticle')}}" class="badge text-bg-info">create</a></th>
  
    </tr>
  </thead>

  <tbody>
   @forelse($article as $articles)

    <tr>
      <th scope="row">{{$articles->id}}</th>
      <td>{{$articles->nom}}</td>
      
      <!-- <a href="">{{$articles->category->titre}}</a> -->
     
      <td><i>{{ substr($articles->content,0,50)}}...</i></td>
      <td><i><a href="{{route('delete_article',['id'=>$articles->id])}}" class="badge text-bg-danger">delete</a> </i> -- <i><a href="{{route('updateArticle',['id'=>$articles->id])}}" class="badge text-bg-success">update</a></i></td>
    
    </tr>
    @empty
    <h1 class="badge text-bg-danger"> Aucun article disponible</h1>
    @endforelse
  </tbody>
</table>
        @auth

    <h1>bienvenu sur l'authentification de laravel chers {{Auth::user()->name}}</h1>
  
    @endauth
</body>
</html>