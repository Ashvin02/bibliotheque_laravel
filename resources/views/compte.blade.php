@extends('template')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Mon compte</h1>

    <div class="row g-4">
        {{-- Infos utilisateur --}}
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    👤 Informations
                </div>
                <div class="card-body">
                    <p><strong>Nom :</strong> {{ auth()->user()->name }}</p>
                    <p><strong>Email :</strong> {{ auth()->user()->email }}</p>
                    <p>
                        <strong>Rôle :</strong>
                        <span class="badge {{ auth()->user()->isAdmin() ? 'bg-danger' : 'bg-primary' }}">
                            {{ ucfirst(auth()->user()->role) }}
                        </span>
                    </p>
                    <p><strong>Inscrit le :</strong> {{ auth()->user()->created_at->format('d/m/Y') }}</p>
                </div>
            </div>

            @if(auth()->user()->isAdmin())
            <div class="card mt-3 border-danger">
                <div class="card-body text-center">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-danger w-100">
                        🛠️ Accéder au Back-Office Admin
                    </a>
                </div>
            </div>
            @endif
        </div>

        {{-- Emprunts en cours --}}
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    📖 Mes emprunts en cours
                    <span class="badge bg-danger ms-2">
                        {{ $empruntsEnCours->count() }}
                    </span>
                </div>
                <div class="card-body">
                    @if($empruntsEnCours->isEmpty())
                        <p class="text-muted">Aucun emprunt en cours.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Livre</th>
                                        <th>Auteur</th>
                                        <th>Depuis le</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($empruntsEnCours as $emprunt)
                                    <tr>
                                        <td>{{ $emprunt->livre->titre }}</td>
                                        <td>{{ $emprunt->livre->auteur }}</td>
                                        <td>{{ $emprunt->date_emprunt->format('d/m/Y') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Historique --}}
            <div class="card shadow-sm mt-4">
                <div class="card-header bg-secondary text-white">
                    📋 Historique des emprunts
                </div>
                <div class="card-body">
                    @if($historique->isEmpty())
                        <p class="text-muted">Aucun emprunt passé.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Livre</th>
                                        <th>Emprunté le</th>
                                        <th>Retourné le</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($historique as $emprunt)
                                    <tr>
                                        <td>{{ $emprunt->livre->titre }}</td>
                                        <td>{{ $emprunt->date_emprunt->format('d/m/Y') }}</td>
                                        <td>{{ $emprunt->date_retour->format('d/m/Y') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection