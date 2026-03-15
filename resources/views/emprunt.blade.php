@extends('template')

@section('content')

<h2>Emprunter un livre</h2>

<form method="POST" action="/emprunt">

@csrf

<select name="livre_id">

@foreach($livres as $livre)

<option value="{{ $livre->id }}">
{{ $livre->titre }}
</option>

@endforeach

</select>

<button type="submit">Emprunter</button>

</form>

@endsection