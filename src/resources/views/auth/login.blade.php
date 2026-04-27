<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriNova — Connexion</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/auth/login.css')}}">
</head>
<body>

<div class="shell">

    <!-- Brand bar — identical to register -->
    <div class="brand-bar">
        <div class="logo-lockup">
            <!-- AgriNova SVG Logo — same as register -->
            <svg class="logo-svg-wrap" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="29" cy="29" r="28" fill="rgba(255,255,255,0.1)" stroke="rgba(255,255,255,0.28)" stroke-width="1.5"/>
                <path d="M10 40 Q29 34 48 40" stroke="rgba(255,255,255,0.2)" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                <path d="M29 42 L29 20" stroke="#a8e6c0" stroke-width="3.2" stroke-linecap="round"/>
                <path d="M29 32 C23 28 14 26 12 19 C18 18 26 24 29 32Z" fill="#6dbd8e"/>
                <path d="M29 27 C35 22 43 20 45 13 C38 12 31 18 29 27Z" fill="#a8e6c0"/>
                <path d="M29 37 C34 34 38 32 39 27 C35 27 30 31 29 37Z" fill="#6dbd8e" opacity="0.7"/>
                <path d="M29 23 C25 20 20 18 19 13 C24 13 28 17 29 23Z" fill="#b8f0d0" opacity="0.65"/>
                <circle cx="29" cy="11" r="4" fill="#f7e96e" opacity="0.92"/>
                <line x1="29" y1="5" x2="29" y2="3.5" stroke="#f7e96e" stroke-width="1.8" stroke-linecap="round" opacity="0.85"/>
                <line x1="34" y1="6.5" x2="35.2" y2="5.2" stroke="#f7e96e" stroke-width="1.8" stroke-linecap="round" opacity="0.72"/>
                <line x1="24" y1="6.5" x2="22.8" y2="5.2" stroke="#f7e96e" stroke-width="1.8" stroke-linecap="round" opacity="0.72"/>
                <line x1="35.5" y1="11" x2="37" y2="11" stroke="#f7e96e" stroke-width="1.8" stroke-linecap="round" opacity="0.62"/>
                <line x1="22.5" y1="11" x2="21" y2="11" stroke="#f7e96e" stroke-width="1.8" stroke-linecap="round" opacity="0.62"/>
            </svg>
            <div>
                <div class="brand-name">AgriNova</div>
                <div class="brand-tagline">Réseau Agricole Professionnel</div>
            </div>
        </div>
        <a href="{{route('register.form')}}" class="top-register">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
            </svg>
            S'inscrire
        </a>
    </div>

    <!-- Card -->
    <div class="card">

        <!-- Header -->
        <div class="card-header">
            <div class="ch-left">
                <h2>Connexion</h2>
                <p>Accédez à votre espace professionnel AgriNova</p>
            </div>
            <span class="ch-badge">Espace Pro</span>
        </div>

        <!-- Role selector -->
        <div class="role-strip">
            <div class="role-strip-label">Connectez-vous en tant que</div>
            <div class="role-tabs">
                <button class="role-tab active" onclick="switchRole('agriculteur', this)">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064"/></svg>
                    Agriculteur
                </button>
                <button class="role-tab" onclick="switchRole('stock', this)">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7"/></svg>
                    Gest. Stock
                </button>
                <button class="role-tab" onclick="switchRole('admin', this)">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    Admin
                </button>
            </div>
        </div>

        <!-- Form -->
        <form action="{{ route('login') }}" method="POST" id="loginForm">
            @csrf

            <div class="form-body">

                <!-- Welcome block -->
                <div class="welcome-block">
                    <div class="welcome-eyebrow" id="roleEyebrow">Espace Agriculteur</div>
                    <h1 class="welcome-title">Bon retour, <em>votre exploitation</em> vous attend</h1>
                    <p class="welcome-sub" id="roleSub">Gérez vos cultures, récoltes et équipements depuis votre tableau de bord.</p>
                </div>

                <div class="form-divider"></div>

                <!-- Error banner (Laravel) -->
                @if ($errors->any())
                <div class="error-banner">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    <span>{{ $errors->first() }}</span>
                </div>
                @endif

                <!-- Pending account notice -->
                <div class="pending-notice" id="pendingNotice" style="display:none;">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Votre compte est en cours de vérification par notre équipe. Vous recevrez un email dès l'activation (24–48h).</span>
                </div>

                <!-- Email / Username -->
                <div class="field-group">
                    <label class="f-label" for="email">
                        Email ou nom d'utilisateur <span class="req">*</span>
                    </label>
                    <div class="inp-wrap">
                        <span class="inp-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </span>
                        <input
                            type="text"
                            name="email"
                            id="email"
                            class="inp"
                            placeholder="contact@exemple.ma ou m_alami"
                            value="{{ old('email') }}"
                            autocomplete="username"
                            required
                        >
                    </div>
                </div>

                <!-- Password -->
                <div class="field-group">
                    <label class="f-label" for="password">
                        Mot de Passe <span class="req">*</span>
                    </label>
                    <div class="pw-wrap">
                        <span class="inp-icon" style="left:0.75rem;top:50%;transform:translateY(-50%);position:absolute;color:var(--muted);display:flex;pointer-events:none;">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:16px;height:16px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </span>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="inp"
                            style="padding-left:2.5rem;"
                            placeholder="Votre mot de passe"
                            autocomplete="current-password"
                            required
                        >
                        <button type="button" class="pw-toggle" onclick="togglePw()">
                            <svg id="eyeIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Remember me + Forgot -->
                <div class="form-meta">
                    <label class="remember-label">
                        <input type="checkbox" name="remember" id="remember">
                        Se souvenir de moi
                    </label>
                    <a href="#" class="forgot-link">Mot de passe oublié ?</a>
                </div>

                <!-- Info box — activation notice -->
                <div class="info-box">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <p class="info-box-text">
                        Les comptes sont activés après vérification des documents par notre équipe.
                        Délai habituel : <strong>24 à 48 heures</strong>.
                    </p>
                </div>

                <!-- Submit -->
                <button type="submit" class="btn-submit">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                    </svg>
                    Se connecter
                </button>
            </div>
            <input type="hidden" name="role" id="roleInput" value="agriculteur">

        </form>
        <!-- Card footer -->
        <div class="card-footer">
            <div class="card-footer-row">
                <span>Pas encore de compte ? <a href="{{route('register.form')}}">S'inscrire</a></span>
                <span class="card-footer-sep"></span>
                <a href="/register">Créer un compte</a>
            </div>
        </div>

    </div><!-- /card -->

</div><!-- /shell -->

<script>
    // Password toggle
    function togglePw() {
        const inp = document.getElementById('password');
        const icon = document.getElementById('eyeIcon');
        if (inp.type === 'password') {
            inp.type = 'text';
            icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
            `;
        } else {
            inp.type = 'password';
            icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            `;
        }
    }

    // Role switcher
    const roleConfig = {
        agriculteur: {
            eyebrow: 'Espace Agriculteur',
            sub: 'Gérez vos cultures, récoltes et équipements depuis votre tableau de bord.',
        },
        stock: {
            eyebrow: 'Espace Gestionnaire de Stock',
            sub: 'Suivez vos stocks, entrées/sorties et alertes en temps réel.',
        },
        admin: {
            eyebrow: 'Espace Administrateur',
            sub: 'Gérez les utilisateurs, validez les comptes et supervisez l\'ensemble du système.',
        },
    };

    function switchRole(role, btn) {
        // Update tabs
        document.querySelectorAll('.role-tab').forEach(t => t.classList.remove('active'));
        btn.classList.add('active');
        // Update texts
        document.getElementById('roleEyebrow').textContent = roleConfig[role].eyebrow;
        document.getElementById('roleSub').textContent     = roleConfig[role].sub;
        // Update hidden input
        document.getElementById('roleInput').value = role;
    }
</script>
</body>
</html>