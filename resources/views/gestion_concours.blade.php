@extends('layouts.default')

@section('title', 'Gestion - Concours')

@section('content')
<div class="website">
  <h1 id="hero-title">Gestion des Concours</h1>
  <main id="main" role="main" class="main">
    @if(!empty($concours))
      <div class="btn_concours">
        <a href="{{ route('modification_concours', ['id' => $concours->id]) }}">
          <button type="button">{{ $concours->nom }}</button>
        </a>
      </div>
    @else
      <div class="btn_concours">
        <a href="{{ route('gestion_concours') }}">
          <button type="button">Aucun concours défini</button>
        </a>
      </div>
    @endif
  </main>
</div>
@endsection
