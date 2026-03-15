<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Bibliothèque - BTS SIO</title>

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

<header>

<div class="container">

<h1>📚 Bibliothèque</h1>

<nav>
<a href="/">Accueil</a>
<a href="/livres">Livres</a>
<a href="/emprunt">Emprunter</a>
<a href="/retour">Retour</a>
<a href="/compte">Compte</a>
</nav>

</div>

</header>

<main class="container">

@yield('content')

</main>

<footer>

<p>Projet BTS SIO SLAM Ashvin Mariyathas - Laravel</p>

</footer>

</body>
</html>