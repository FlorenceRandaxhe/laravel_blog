@extends('layouts.app')
@section('content')
<h1>{{$post->title}}</h1>
<div>
    <article>
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
        @can('delete', $post)
            <form action="/posts/{{$post->id}}" method="post">
                @csrf
                @method('DELETE')
                <div>
                    <button class="btn btn-dark" type="submit">Supprimer le post</button>
                </div>
            </form>
        @endcan

        <h2>Commentaires</h2>
        <div>
            @foreach($post->comments as $comment)
                <div>
                    {{--<p>{{$comment->author->name}}</p>--}}

                    <p>{{$comment->content}}</p>

                    @can('delete', $comment)
                        <form action="/comments/{{$comment->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-dark">
                                Supprimer
                            </button>
                        </form>
                    @endcan
                </div>
            @endforeach
        </div>

        @auth
            <h2>Ajouter un commentaire</h2>
            <form action="/comments" method="POST">
                @csrf
                <input class="form-control" type="hidden" name="post_id" value="{{$post->id}}">
                <div>
                    <label for="post_comment">Votre commentaire&nbsp;:</label>
                    <textarea class="form-control" name="post_comment" id="post_comment"></textarea>
                </div>
                @error('post_comment')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror

                <button class="btn btn-dark" type="submit">Poster le commentaire</button>
            </form>
        @endauth
    </article>
</div>
@endsection
