@extends('layouts.app')
@section('content')
<h1>Ajouter un nouvel article</h1>

<div>
    <form action="/posts" method="POST">
        @csrf
        <div>
            <label for="title">Titre de l'article</label>
            <input class="form-control" type="text" name="title" id="title" placeholder="Titre" value="{{old('title')}}">
        </div>
        @error('title')
        <div class="alert alert-danger" role="alert">
           {{ $message }}
        </div>
        @enderror

        <div>
            <label for="published_at_date">Date de publication</label>
            <input class="form-control" type="date" id="published_at_date" name="published_at_date">
        </div>
        @error('published_at_date')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror

        <div>
            <label for="published_at_time">Heure de publication</label>
            <input class="form-control" type="time" id="published_at_time" name="published_at_time">
        </div>
        @error('published_at_time')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror

        <div>
            <label for="content">Contenu de l'article</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{old('content')}}</textarea>
        </div>
        @error('content')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror

        <div>
            <button class="btn btn-dark">Publier</button>
        </div>
    </form>
</div>
@endsection
