@extends('template')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- Carte dernière connexion --}}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
            <div class="p-6">
                @php $derniere = session('derniere_connexion'); @endphp
                @if($derniere)
                    <div class="flex items-center gap-3">
                        <span class="text-gray-500 text-sm">🕐 Dernière connexion :</span>
                        <span class="font-medium text-gray-800">
                            {{ \Carbon\Carbon::parse($derniere)->format('d/m/Y à H:i') }}
                        </span>
                    </div>
                @else
                    <div class="flex items-center gap-3">
                        <span class="text-green-600 font-medium">👋 Première connexion — bienvenue !</span>
                    </div>
                @endif
            </div>
        </div>

        {{-- Carte principale --}}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                Vous êtes connecté en tant que <strong>{{ Auth::user()->name }}</strong>.
            </div>
        </div>

    </div>
</div>
@endsection