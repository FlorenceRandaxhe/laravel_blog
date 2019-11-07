<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description"
          content="Liste des articles sur c'est bon pour ce que tu as">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article - C'est bon pour ce que tu as</title>
</head>
<body>
    @component('components.main-navigation')
    @endcomponent
    <h1>Tous les articles</h1>
    <div>
        @foreach($posts as $post)
        <article>
            <h2>
                <a href="/posts/{{$post->id}}">{{$post->title}}</a>
            </h2>
            <div>
                <p>
                    Un article posté par&nbsp;: <a href='/author/{{$post->author->id}}/posts'>{{$post->author->name}}</a>
                </p>
            </div>
            <div>
                <p>
                    {{$post->content}}
                </p>
            </div>
         </article>

        @can('update', $post)
            <div>
                <a href="/posts/{{$post->id}}/edit">Modifier l'article</a>
            </div>
        @endcan
        @endforeach

            {{ $posts->links() }}
    </div>
</body>
</html>