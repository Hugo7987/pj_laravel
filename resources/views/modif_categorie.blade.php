@extends('layouts.default')

@section('title', 'Modification Catégorie')

@section('content')
        <h1>Modification de la catégorie {{$categories->nom}}</h1>
        <form action="{{route ('majCategorie', $categories->id)}}" method="post">
            @csrf 
            @method('PUT')
            <fieldset>

                Nom: <input type="text" name="nom_categorie" value="{{ old('nom_categories', $categories->nom) }}"><br>

                Code: <input type="text" name="code_categorie" value="{{ old('code_categorie', $categories->code) }}"><br>

                Commentaire: <textarea name="commentaire" rows="4" cols="40">{{ old('commentaire', $categories->commentaire) }}</textarea><br>

                <input type="hidden" name="id_concours" value="{{ $concours->id }}">
                
                <input type="submit" value="Modifier la catégorie">
            </fieldset>
        </form>
@endsection