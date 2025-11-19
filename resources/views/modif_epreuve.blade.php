@extends('layouts.default')

@section('title', 'Modification Épreuve')

@section('content')
        <h1>Modification de l'Épreuve {{$epreuve->nom}}</h1>
        <form action="{{route ('majEpreuve', $epreuve->id)}}" method="post">
            @csrf 
            @method('PUT')
            <fieldset>

                Nom: <input type="text" name="nom_epreuve" value="{{ old('nom_epreuve', $epreuve->nom) }}"><br>

                Code: <input type="text" name="code_epreuve" value="{{ old('code_epreuve', $epreuve->code) }}"><br>

                <select name="id_categorie">
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $epreuve->id_categorie == $cat->id ? 'selected' : '' }}>{{ $cat->nom }}</option>
                    @endforeach
                </select>

                Coefficient: <input type="number" name="coefficient" value="{{ old('coefficient', $epreuve->coefficient) }}" step="0.1" min="0.5"><br>

                Score Max: <input type="number" name="score_max" value="{{ old('score_max', $epreuve->score_max) }}"><br>

                Commentaire: <textarea name="commentaire" rows="4" cols="40">{{ old('commentaire', $epreuve->commentaire) }}</textarea><br>

                <input type="hidden" name="id_concours" value="{{ $concours->id }}">
                
                <input type="submit" value="Modifier l'épreuve">
            </fieldset>
        </form>
@endsection