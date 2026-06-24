@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>👥 Gestion des utilisateurs</h1>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">← Retour</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Emprunts</th>
                    <th>Inscrit le</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="badge {{ $user->role === 'admin' ? 'bg-danger' : 'bg-primary' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td>{{ $user->emprunts_count }}</td>
                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                    <td class="d-flex gap-1">
                        {{-- Changer rôle --}}
                        <form action="{{ route('admin.users.role', $user) }}" method="POST">
                            @csrf @method('PATCH')
                            <select name="role" class="form-select form-select-sm" style="width:100px"
                                onchange="this.form.submit()">
                                <option value="user"  {{ $user->role === 'user'  ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </form>

                        {{-- Supprimer --}}
                        @if($user->id !== auth()->id())
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                              onsubmit="return confirm('Supprimer {{ $user->name }} ?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">🗑️</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection