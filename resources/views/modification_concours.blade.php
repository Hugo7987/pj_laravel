@extends('layouts.default')

@section('title', 'Gestion - Concours Robot')

@section('content')
<div class="website">
  <h1>Gestion - Concours Robot</h1>

  <!-- Épreuves -->
  <section>
    <table border="1">
      <caption>Épreuves</caption>
      <thead>
        <tr>
          <th>Nom</th>
          <th>Code</th>
          <th>Catégorie</th>
          <th>Coefficient</th>
          <th>Score Max</th>
          <th>Commentaire</th>
          <th>Modification</th>
          <th>Suppression</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($epreuves as $epreuve)
        <tr>
          <td>{{ $epreuve->nom }}</td>
          <td>{{ $epreuve->code }}</td>
          <td>{{ $epreuve->categorie }}</td>
          <td>{{ $epreuve->coefficient }}</td>
          <td>{{ $epreuve->score_max }}</td>
          <td>{{ $epreuve->commentaire }}</td>
          <td><a href="{{ route('modif_epreuve', $epreuve->id) }}">Modifier</a></td>
          <td><a href="{{ route('supp_epreuve', $epreuve->id)}}">Supprimer</a></td>
        </tr>
        @endforeach

        <tr class="button">
          <td colspan="8"><a href="{{ url('form_epreuve') }}"><button>Ajouter +</button></a></td>
        </tr>
      </tbody>
    </table>
  </section>

  <!-- Catégories -->
  <section style="margin-top:1rem;">
    <table border="1">
      <caption>Catégories</caption>
      <thead>
        <tr>
          <th>Nom</th>
          <th>Code</th>
          <th>Commentaire</th>
          <th>Modification</th>
          <th>Suppression</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $categorie)
        <tr>
          <td>{{ $categorie->nom }}</td>
          <td>{{ $categorie->code }}</td>
          <td>{{ $categorie->commentaire }}</td>
          <td><a href="{{ route('modif_categorie', $categorie->id) }}">Modifier</a></td>
          <td><a href="{{ route('supp_categorie', $categorie->id) }}">Supprimer</a></td>
        </tr>
        @endforeach

        <tr class="button">
          <td colspan="5"><a href="{{ url('form_categorie') }}"><button>Ajouter +</button></a></td>
        </tr>
      </tbody>
    </table>
  </section>
</div>
@endsection
