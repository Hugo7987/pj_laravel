@extends('layouts.default')

@section('title', 'Ajout Épreuve')

@section('content')
        <h1>Ajout d'une nouvelle Épreuve</h1>
        <form action="{{route ('form_epreuve.store')}}" method="post">
            @csrf
            <fieldset>

                Nom: <input type="text" name="nom_epreuve" value="{{ old('nom_epreuve') }}"><br>
                <br>

                Code: <input type="text" name="code_epreuve" value="{{ old('code_epreuve') }}"><br>
                <br>

                Catégorie:
                <select name="id_categorie">
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                    @endforeach
                </select>
                <br><br>

                Coefficient: <input type="number" name="coefficient" value="{{ old('coefficient') }}" step="0.1" min="0.5"><br>
                <br> 

                Score Max: <input type="number" name="score_max" value="{{ old('score_max') }}"><br>
                <br>

                Commentaire(facultatif):<br>
                <textarea name="commentaire" rows="4" cols="40">{{ old('commentaire') }}</textarea><br><br>

                <input type="hidden" name="id_concours" value="{{ $concours->id }}">
                
                <input type="submit" value="Ajouter l'épreuve">
            </fieldset>
        </form>
@endsection