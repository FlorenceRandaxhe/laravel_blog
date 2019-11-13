<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description"
          content="Liste des articles sur c'est bon pour ce que tu as">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$post->title}} - C'est bon pour ce que tu as</title>
</head>
<body>
@component('components.main-navigation')
@endcomponent
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
                    <button type="submit">Supprimer le post</button>
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
                            <button>
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
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div>
                    <label for="post_comment">Votre commentaire&nbsp;:</label>
                    <textarea name="post_comment" id="post_comment"></textarea>
                </div>

                <button type="submit">Poster le commentaire</button>
            </form>
        @endauth
    </article>
</div>
</body>
</html>