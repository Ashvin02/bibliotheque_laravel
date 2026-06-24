@extends('template')

@section('content')
<div style="min-height: 60vh; display: flex; align-items: center; justify-content: center; padding: 2rem 1rem;">
    <div style="background: white; padding: 2.5rem; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); width: 100%; max-width: 420px;">
        
        <div style="text-align: center; margin-bottom: 2rem;">
            <span style="font-size: 2.5rem;">📚</span>
            <h2 style="margin: 0.5rem 0 0; color: #1a1a2e; font-size: 1.6rem;">Connexion</h2>
            <p style="color: #666; margin: 0.25rem 0 0; font-size: 0.9rem;">Accédez à votre espace bibliothèque</p>
        </div>

        @if(session('status'))
            <div style="background:#d4edda; color:#155724; padding:0.75rem 1rem; border-radius:8px; margin-bottom:1rem;">
                {{ session('status') }}
            </div>
        @endif

        @if($errors->any())
            <div style="background:#f8d7da; color:#721c24; padding:0.75rem 1rem; border-radius:8px; margin-bottom:1rem;">
                @foreach($errors->all() as $error)
                    <p style="margin:0;">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div style="margin-bottom: 1.25rem;">
                <label style="display:block; margin-bottom:0.4rem; color:#333; font-weight:600; font-size:0.9rem;">
                    📧 Adresse email
                </label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                    style="width:100%; padding:0.75rem 1rem; border:2px solid #e0e0e0; border-radius:8px; font-size:1rem; box-sizing:border-box; transition:border-color 0.2s;"
                    placeholder="exemple@mail.fr"
                    onfocus="this.style.borderColor='#4a90e2'"
                    onblur="this.style.borderColor='#e0e0e0'">
            </div>

            <div style="margin-bottom: 1.25rem;">
                <label style="display:block; margin-bottom:0.4rem; color:#333; font-weight:600; font-size:0.9rem;">
                    🔒 Mot de passe
                </label>
                <input type="password" name="password" required
                    style="width:100%; padding:0.75rem 1rem; border:2px solid #e0e0e0; border-radius:8px; font-size:1rem; box-sizing:border-box; transition:border-color 0.2s;"
                    placeholder="••••••••"
                    onfocus="this.style.borderColor='#4a90e2'"
                    onblur="this.style.borderColor='#e0e0e0'">
            </div>

            <div style="margin-bottom: 1.5rem; display:flex; align-items:center; gap:0.5rem;">
                <input type="checkbox" name="remember" id="remember" style="width:16px; height:16px; cursor:pointer;">
                <label for="remember" style="color:#555; font-size:0.9rem; cursor:pointer;">Se souvenir de moi</label>
            </div>

            <button type="submit"
                style="width:100%; padding:0.85rem; background: linear-gradient(135deg, #4a90e2, #357abd); color:white; border:none; border-radius:8px; font-size:1rem; font-weight:600; cursor:pointer; transition:opacity 0.2s;"
                onmouseover="this.style.opacity='0.9'"
                onmouseout="this.style.opacity='1'">
                Se connecter →
            </button>
        </form>

        <p style="text-align:center; margin-top:1.5rem; color:#666; font-size:0.9rem;">
            Pas encore de compte ? 
            <a href="{{ route('register') }}" style="color:#4a90e2; font-weight:600; text-decoration:none;">S'inscrire</a>
        </p>
    </div>
</div>
@endsection