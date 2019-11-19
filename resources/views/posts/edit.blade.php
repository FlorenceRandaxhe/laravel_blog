@extends('layouts.app')
@section('content')
<h1>Modifier le post {{$post->title}}</h1>

<div>
    <form method="POST" action="/posts/{{$post->id}}">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Modifier le titre de l'article</label>
        </div>
        <div>
            <input class="form-control" type="text" name="title" id="title" placeholder="Titre" value="{{$post->title}}">
        </div>
        @error('title')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror

        <div>
            <label for="published_at_date">Modifier la date de publication</label>
            <input class="form-control" type="date" id="published_at_date" name="published_at_date" value="{{$post->published_at->format('Y-m-d')}}">
        </div>
        @error('published_at_date')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror

        <div>
            <label for="published_at_time">Modifier l'heure de publication</label>
            <input class="form-control" type="time" id="published_at_time" name="published_at_time" value="{{$post->published_at->format('h:i')}}">
        </div>
        @error('published_at_time')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror

        <div>
            <label for="content">Modifier le contenu de l'article</label>
        </div>
        <div>
            <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{$post->content}}</textarea>
        </div>
        @error('content')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror

        <div>
            <button class="btn btn-dark" type="submit">Enregistrer vos modifications</button>
        </div>
    </form>
</div>
@endsection
