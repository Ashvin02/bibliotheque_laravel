@extends('template')

@section('content')
<div class="container py-5" style="max-width: 400px; margin: auto;">
    <h2 class="mb-4">Connexion</h2>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                class="form-control" required autofocus>
        </div>
        <div class="mb-3">
            <label for="password">Mot de passe</label>
            <input id="password" type="password" name="password"
                class="form-control" required>
        </div>
        <div class="mb-3">
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Se souvenir de moi</label>
        </div>
        <button type="submit" class="btn btn-primary w-100">Se connecter</button>
    </form>

    <p class="mt-3 text-center">
        Pas encore de compte ? <a href="{{ route('register') }}">S'inscrire</a>
    </p>
</div>
@endsection