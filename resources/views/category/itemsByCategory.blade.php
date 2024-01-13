@extends('index')
@section('content')

<div class="position-relative mt-4">
    <div class="position-absolute top-50 start-50">
        <h1 class="badge text-bg-secondary">
            {{$category->titre}}
        </h1>
    </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#~</th>
            <th scope="col">article</th>
            <th scope="col">content</th>
        </tr>
    </thead>

    <tbody>

        @forelse($articles as $article)

        <tr>
            <th scope="row">{{$article->id}}</th>
            <td>{{$article->nom}} </td>
            <td><i>{{ substr($article->content,0,50)}}...</i></td>
            <td><i><a href="{{route('delete_article',['id'=>$article->id])}}" class="badge text-bg-danger">delete</a>
                </i> -- <i>
                    <a href="{{route('updateArticle',['id'=>$article->id])}}" class="badge text-bg-success">
                        update
                    </a>
                </i>
            </td>

        </tr>
        @empty
    </tbody>
</table>
<div class="position-relative mt-4">
    <div class="position-absolute top-50 start-50">
        <h4 class="badge text-bg-danger"> Aucun article disponible pour cette category (^_^) </h4>
    </div>
</div>
@endforelse

    
@endsection()