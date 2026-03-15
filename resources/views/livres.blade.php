@extends('template')

@section('content')

<h2>Liste des livres</h2>

<div class="grid">

@foreach($livres as $livre)

<div class="card">

<h3>{{ $livre->titre }}</h3>

<p>Auteur : {{ $livre->auteur }}</p>

@if($livre->disponible)
<span class="dispo">Disponible</span>
@else
<span class="indispo">Indisponible</span>
@endif

</div>

@endforeach

</div>

@endsection