<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BiblioTEK - BTS SIO</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
<style>
    body { background-color: #f8f9fa; }
    .navbar-brand { font-weight: 700; font-size: 1.4rem; }
    .nav-link { font-weight: 500; }
    footer { background: #1a1a2e; color: #aaa; padding: 1.5rem 0; text-align: center; margin-top: 3rem; }
    .admin-link { color: #ff6b6b !important; }
    .main-content { min-height: 70vh; padding: 2rem 0; }
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark" style="background: #1a1a2e;">
    <div class="container">
        <a class="navbar-brand text-white" href="/">
            📚 BiblioTEK
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link text-white" href="/">Accueil</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/livres">Livres</a></li>
                @auth
                <li class="nav-item"><a class="nav-link text-white" href="/emprunt">Emprunter</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/retour">Retour</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/compte">Compte</a></li>
                @if(auth()->user()->isAdmin())
                <li class="nav-item"><a class="nav-link admin-link fw-bold" href="/admin/dashboard">⚙️ Admin</a></li>
                @endif
                @else
                <li class="nav-item"><a class="nav-link text-white" href="/login">Connexion</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/register">Inscription</a></li>
                @endauth
            </ul>
            @auth
            <form action="/logout" method="POST" class="d-flex">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">
                    <i class="bi bi-box-arrow-right"></i> Déconnexion
                </button>
            </form>
            @endauth
        </div>
    </div>
</nav>

<div class="main-content">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @yield('content')
    </div>
</div>

<footer>
    <p class="mb-0">Projet BTS SIO SLAM — Ashvin Mariyathas — Laravel</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>