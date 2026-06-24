@extends('template')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>📚 Gestion des livres</h1>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">← Retour</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Formulaire ajout --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">➕ Ajouter un livre</div>
        <div class="card-body">
            <form action="{{ route('admin.livres.store') }}" method="POST" class="row g-2">
                @csrf
                <div class="col-md-5">
                    <input type="text" name="titre" class="form-control" placeholder="Titre" required>
                </div>
                <div class="col-md-5">
                    <input type="text" name="auteur" class="form-control" placeholder="Auteur" required>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary w-100">Ajouter</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Table --}}
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Disponibilité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($livres as $livre)
                <tr>
                    <td>{{ $livre->id }}</td>
                    <td>
                        {{-- Édition inline --}}
                        <form action="{{ route('admin.livres.update', $livre) }}" method="POST" class="d-flex gap-1">
                            @csrf @method('PATCH')
                            <input type="text" name="titre" value="{{ $livre->titre }}"
                                class="form-control form-control-sm">
                            <input type="text" name="auteur" value="{{ $livre->auteur }}"
                                class="form-control form-control-sm">
                            <button class="btn btn-warning btn-sm">💾</button>
                        </form>
                    </td>
                    <td></td>
                    <td>
                        <span class="badge {{ $livre->disponible ? 'bg-success' : 'bg-danger' }}">
                            {{ $livre->disponible ? 'Disponible' : 'Emprunté' }}
                        </span>
                    </td>
                    <td>
                        <form action="{{ route('admin.livres.destroy', $livre) }}" method="POST"
                              onsubmit="return confirm('Supprimer ce livre ?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">🗑️</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $livres->links() }}
    </div>
</div>
@endsection