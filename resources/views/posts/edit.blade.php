<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editer {{$post->title}} - C'est bon pour ce que tu as</title>
</head>
<body>
@component('components.main-navigation')
@endcomponent
<h1>Modifier le post {{$post->title}}</h1>

<div>
    <form method="POST" action="/posts/{{$post->id}}">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Modifier le titre de l'article</label>
        </div>
        <div>
            <input type="text" name="title" id="title" placeholder="Titre" value="{{$post->title}}">
        </div>

        <div>
            <label for="content">Modifier le contenu de l'article</label>
        </div>
        <div>
            <label for="published_at_date">Modifier la date de publication</label>
            <input type="date" id="published_at_date" name="published_at_date" value="{{$post->published_at->format('Y-m-d')}}">
        </div>

        <div>
            <label for="published_at_time">Modifier l'heure de publication</label>
            <input type="time" id="published_at_time" name="published_at_time" value="{{$post->published_at->format('h:i')}}">
        </div>
        <div>
            <textarea name="content" id="content" cols="30" rows="10">{{$post->content}}</textarea>
        </div>

        <div>
            <button type="submit">Enregistrer vos modifications</button>
        </div>
    </form>
</div>
</body>
</html>