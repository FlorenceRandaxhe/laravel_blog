@extends('layouts.app')
@section('content')
    <h1>Tous les articles</h1>
    <div>
        <p>Nombre total d'articles : {{$posts->total()}}</p>
        @foreach($posts as $post)
        <article>
            <h2>
                <a href="/posts/{{$post->slug}}">{{$post->title}}</a>
            </h2>
            <div>
                <p>
                    Un article posté par&nbsp;: <a href='/author/{{$post->author->id}}/posts'>{{$post->author->name}}</a>
                </p>
                <time datetime="{{$post->published_at}}">
                    {{$post->published_at->diffForHumans()}}
                </time>
            </div>
            <div>
                <p>
                    {{$post->content}}
                </p>
            </div>
         </article>

        @can('update', $post)
            <div>
                <a href="/posts/{{$post->slug}}/edit">Modifier l'article</a>
            </div>
        @endcan
        @endforeach

            {{ $posts->links() }}
    </div>
@endsection
