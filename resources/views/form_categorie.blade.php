@extends('layouts.default')

@section('title', 'Ajout Catégorie')

@section('content')
    <h1>Ajout d'une nouvelle Catégorie</h1>
    <form action="{{ route('form_categorie.store') }}" method="post">
        @csrf
        <fieldset>

            Nom: <input type="text" name="nom_categorie" value="{{ old('nom_categorie') }}"><br><br>

            Code: <input type="text" name="code_categorie" value="{{ old('code_categorie') }}"><br><br>

            Commentaire (facultatif):<br>
            <textarea name="commentaire" rows="4" cols="40">{{ old('commentaire') }}</textarea><br><br>

            <input type="hidden" name="id_concours" value="{{ $concours->id }}">

            <input type="submit" value="Ajouter la catégorie">
        </fieldset>
    </form>
@endsection
