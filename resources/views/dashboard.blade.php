@php
    $derniere = session('derniere_connexion');
@endphp

<div class="alert">
    @if($derniere)
        Dernière connexion : {{ \Carbon\Carbon::parse($derniere)->format('d/m/Y à H:i') }}
    @else
        Première connexion 👋
    @endif
</div>