<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Bibliothèque - BTS SIO</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<>
<header>
<div class="container">
<h1>📚 Bibliothèque</h1>
<nav>
<a href="/">Accueil</a>
<a href="/livres">Livres</a>
@auth
    <a href="/emprunt">Emprunter</a>
    <a href="/retour">Retour</a>
    <a href="/compte">Compte</a>
    @if(auth()->user()->isAdmin())
        <a href="/admin/dashboard" style="color: #ff6b6b;">⚙️ Admin</a>
    @endif
    <form action="/logout" method="POST" style="display:inline;">
        @csrf
        <button type="submit" style="background:none;border:none;color:white;cursor:pointer;">Déconnexion</button>
    </form>
@else
    <a href="/login">Connexion</a>
    <a href="/register">Inscription</a>
@endauth
</nav>
</div>
</header>
<main class="container">
@yield('content')
</main>
<footer>
<p>Projet BTS SIO SLAM Ashvin Mariyathas - Laravel</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>