<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un nouvelle article</title>
</head>
<body>
@component('components.main-navigation')
@endcomponent
<h1>Ajouter un nouvel article</h1>

<div>
    <form action="/posts" method="POST">
        @csrf
        <div>
            <label for="title">Titre de l'article</label>
            <input type="text" name="title" id="title" placeholder="Titre">
        </div>

        <div>
            <label for="published_at_date">Date de publication</label>
            <input type="date" id="published_at_date" name="published_at_date">
        </div>

        <div>
            <label for="published_at_time">Heure de publication</label>
            <input type="time" id="published_at_time" name="published_at_time">
        </div>

        <div>
            <label for="content">Contenu de l'article</label>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
        </div>

        <div>
            <button>Publier</button>
        </div>
    </form>
</div>
</body>
</html>