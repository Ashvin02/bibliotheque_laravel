@extends('template')

@section('content')
<div style="min-height: 60vh; display: flex; align-items: center; justify-content: center; padding: 2rem 1rem;">
    <div style="background: white; padding: 2.5rem; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); width: 100%; max-width: 420px;">
        
        <div style="text-align: center; margin-bottom: 2rem;">
            <span style="font-size: 2.5rem;">📚</span>
            <h2 style="margin: 0.5rem 0 0; color: #1a1a2e; font-size: 1.6rem;">Créer un compte</h2>
            <p style="color: #666; margin: 0.25rem 0 0; font-size: 0.9rem;">Rejoignez la bibliothèque</p>
        </div>

        @if($errors->any())
            <div style="background:#f8d7da; color:#721c24; padding:0.75rem 1rem; border-radius:8px; margin-bottom:1rem;">
                @foreach($errors->all() as $error)
                    <p style="margin:0;">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div style="margin-bottom: 1.25rem;">
                <label style="display:block; margin-bottom:0.4rem; color:#333; font-weight:600; font-size:0.9rem;">
                    👤 Nom complet
                </label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus
                    style="width:100%; padding:0.75rem 1rem; border:2px solid #e0e0e0; border-radius:8px; font-size:1rem; box-sizing:border-box;"
                    placeholder="Jean Dupont"
                    onfocus="this.style.borderColor='#4a90e2'"
                    onblur="this.style.borderColor='#e0e0e0'">
            </div>

            <div style="margin-bottom: 1.25rem;">
                <label style="display:block; margin-bottom:0.4rem; color:#333; font-weight:600; font-size:0.9rem;">
                    📧 Adresse email
                </label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    style="width:100%; padding:0.75rem 1rem; border:2px solid #e0e0e0; border-radius:8px; font-size:1rem; box-sizing:border-box;"
                    placeholder="exemple@mail.fr"
                    onfocus="this.style.borderColor='#4a90e2'"
                    onblur="this.style.borderColor='#e0e0e0'">
            </div>

            <div style="margin-bottom: 1.25rem;">
                <label style="display:block; margin-bottom:0.4rem; color:#333; font-weight:600; font-size:0.9rem;">
                    🔒 Mot de passe
                </label>
                <input type="password" name="password" required
                    style="width:100%; padding:0.75rem 1rem; border:2px solid #e0e0e0; border-radius:8px; font-size:1rem; box-sizing:border-box;"
                    placeholder="••••••••"
                    onfocus="this.style.borderColor='#4a90e2'"
                    onblur="this.style.borderColor='#e0e0e0'">
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display:block; margin-bottom:0.4rem; color:#333; font-weight:600; font-size:0.9rem;">
                    🔒 Confirmer le mot de passe
                </label>
                <input type="password" name="password_confirmation" required
                    style="width:100%; padding:0.75rem 1rem; border:2px solid #e0e0e0; border-radius:8px; font-size:1rem; box-sizing:border-box;"
                    placeholder="••••••••"
                    onfocus="this.style.borderColor='#4a90e2'"
                    onblur="this.style.borderColor='#e0e0e0'">
            </div>

            <button type="submit"
                style="width:100%; padding:0.85rem; background: linear-gradient(135deg, #4a90e2, #357abd); color:white; border:none; border-radius:8px; font-size:1rem; font-weight:600; cursor:pointer;"
                onmouseover="this.style.opacity='0.9'"
                onmouseout="this.style.opacity='1'">
                Créer mon compte →
            </button>
        </form>

        <p style="text-align:center; margin-top:1.5rem; color:#666; font-size:0.9rem;">
            Déjà un compte ? 
            <a href="{{ route('login') }}" style="color:#4a90e2; font-weight:600; text-decoration:none;">Se connecter</a>
        </p>
    </div>
</div>
@endsection