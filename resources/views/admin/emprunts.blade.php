@extends('template')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>📋 Tous les emprunts</h1>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">← Retour</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Utilisateur</th>
                    <th>Livre</th>
                    <th>Date emprunt</th>
                    <th>Date retour</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($emprunts as $emprunt)
                <tr>
                    <td>{{ $emprunt->id }}</td>
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
                    <td>
                        @if(!$emprunt->date_retour)
                        <form action="{{ route('admin.emprunts.retour', $emprunt) }}" method="POST">
                            @csrf @method('PATCH')
                            <button class="btn btn-sm btn-success">✅ Forcer retour</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $emprunts->links() }}
    </div>
</div>
@endsection