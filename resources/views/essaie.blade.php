<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<body>

  <div class="position-relative mt-4">
    <div class="position-absolute top-50 start-50">
      <h2 class="badge text-bg-secondary">
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
    <?php $i=1 ?>
    <tbody>

      @foreach($category as $categories)
      <tr>

        <th scope="row">{{$i++}}</th>
        <td><a href="{{route('category',['id'=>$categories->id])}}"
            class="badge text-bg-secondary">{{$categories->titre}}</a></td>
        <td><i>{{ substr($categories->content,0,50)}}...</i></td>
        <td><i><a href="{{route('delete_category',['id'=>$categories->id])}}" class="badge text-bg-danger"
              onclick=confirm("voulez-vous supprimez")>delete</a> </i> -- <i><a
              href="{{route('updateCategory',['id'=>$categories->id])}}" class="badge text-bg-success">update</a></i>
        </td>

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
        <th scope="col">image</th>
        <th scope="col">content</th>
        <th class="scope"><a href="{{route('createArticle')}}" class="badge text-bg-info">create</a></th>

      </tr>
    </thead>

    <tbody>
      <?php $i=1 ?>
      @forelse($article as $articles)

      <tr>
        <th scope="row">{{$i++}}</th>
        <td>{{$articles->nom}} <br> <i><a href="{{route('category', ['id'=>$articles->category->id ?? 0])}}"
              class="badge text-bg-secondary">{{$articles->category->titre ?? 'null'}}</i></a></td>
        <td>
          @php
          $articles->photo_path==null ?
          $image="default.png" :
          $image=$articles->photo_path;
          @endphp

          <img style="width:40px;height:50px" src="{{asset('storage/photo_items/'.$image)}}" alt=""
            class="rounded img-circle w-30 h-20">
        </td>
        <td><i>{{ substr($articles->content,0,50)}}...</i></td>
        <td><i><a href="{{route('delete_article',['id'=>$articles->id])}}" class="badge text-bg-danger">delete</a> </i>
          -- <i><a href="{{route('updateArticle',['id'=>$articles->id])}}" class="badge text-bg-success">update</a></i>
        </td>

      </tr>
      @empty
      <h1 class="badge text-bg-danger"> Aucun article disponible</h1>
      @endforelse
    </tbody>
  </table>
  <div class="position-absolute top-100% start-50">
    {{ $category->links() }}
    
  <br>
  </div>

  @auth

  <h1>bienvenu sur l'authentification de laravel chers {{Auth::user()->name}}</h1>

  @endauth
</body>

</html>