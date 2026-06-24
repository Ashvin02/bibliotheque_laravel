@extends('template')
@section('content')
<h2>Retour d'un livre</h2>
<p>Sélectionnez un livre à retourner :</p>
<form method="POST" action="/retour">
    @csrf
    <div class="d-flex align-items-center gap-2">
        <select name="livre_id" class="form-select" style="max-width: 350px;">
            @foreach($livres as $livre)
            <option value="{{ $livre->id }}">
                {{ $livre->titre }} - {{ $livre->auteur }}
            </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Retourner le livre</button>
    </div>
</form>
@endsection