@extends('template')

@section('content')

<h2>Retour d'un livre</h2>

<p>Sélectionnez un livre à retourner :</p>

<form method="POST" action="/retour">
@csrf

<select name="livre_id">

@foreach($livres as $livre)

<option value="{{ $livre->id }}">
{{ $livre->titre }} - {{ $livre->auteur }}
</option>

@endforeach

</select>

<button type="submit" class="btn btn-primary">Retourner le livre</button>

</form>

@endsection