@extends('layouts.default')

@section('title', 'Modification Catégorie')

@section('content')
    <h1>Modification de la Catégorie {{$categorie->nom}}</h1>

    <form action="{{ route('majCategorie', $categorie->id) }}" method="post">
        @csrf
        @method('PUT')
        <fieldset>

            Nom: <input type="text" name="nom_categorie" value="{{ old('nom_categorie', $categorie->nom) }}"><br>

            Code: <input type="text" name="code_categorie" value="{{ old('code_categorie', $categorie->code) }}"><br>

            Commentaire: <textarea name="commentaire" rows="4" cols="40">{{ old('commentaire', $categorie->commentaire) }}</textarea><br>

            <input type="submit" value="Modifier la catégorie">
        </fieldset>
    </form>
@endsection
