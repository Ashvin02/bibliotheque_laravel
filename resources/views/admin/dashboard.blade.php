@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">🛠️ Dashboard Administrateur</h1>

    {{-- Alertes --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Statistiques --}}
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">📚 Total Livres</h5>
                    <p class="card-text display-6">{{ $stats['total_livres'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">✅ Disponibles</h5>
                    <p class="card-text display-6">{{ $stats['livres_dispo'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">📖 Empruntés</h5>
                    <p class="card-text display-6">{{ $stats['livres_empruntes'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">👥 Utilisateurs</h5>
                    <p class="card-text display-6">{{ $stats['total_users'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-secondary">
                <div class="card-body">
                    <h5 class="card-title">📋 Emprunts totaux</h5>
                    <p class="card-text display-6">{{ $stats['total_emprunts'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">⏳ En cours</h5>
                    <p class="card-text display-6">{{ $stats['emprunts_encours'] }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Navigation admin --}}
    <div class="d-flex gap-2 mb-4">
        <a href="{{ route('admin.livres') }}" class="btn btn-primary">📚 Gérer les livres</a>
        <a href="{{ route('admin.users') }}" class="btn btn-info text-white">👥 Gérer les utilisateurs</a>
        <a href="{{ route('admin.emprunts') }}" class="btn btn-warning">📋 Tous les emprunts</a>
    </div>

    {{-- Derniers emprunts --}}
    <h2 class="h4 mb-3">Derniers emprunts</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Utilisateur</th>
                    <th>Livre</th>
                    <th>Date emprunt</th>
                    <th>Date retour</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach($derniers_emprunts as $emprunt)
                <tr>
                    <td>{{ $emprunt->user->name }}</td>
                    <td>{{ $emprunt->livre->titre }}</td>
                    <td>{{ $emprunt->date_emprunt->format('d/m/Y') }}</td>
                    <td>{{ $emprunt->date_retour ? $emprunt->date_retour->format('d/m/Y') : '-' }}</td>
                    <td>
                        @if($emprunt->date_retour)
                            <span class="badge bg-success">Retourné</span>
                        @else
                            <span class="badge bg-danger">En cours</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection