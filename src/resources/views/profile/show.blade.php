<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriNova - Profil</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --forest: #1b3a2d;
            --pine: #254d3a;
            --fern: #2e6b4f;
            --sage: #4a8c68;
            --mint: #6dbd8e;
            --dew: #b8dfc8;
            --fog: #e6f2eb;
            --parch: #f8f4ed;
            --white: #ffffff;
            --text: #1a2318;
            --muted: #5a6b55;
            --border: #c8dcc0;
            --rust: #b84a1e;
            --sidebar-w: 250px;
        }
        html, body { height: 100%; }
        body {
            font-family: 'Outfit', sans-serif;
            background: var(--parch);
            color: var(--text);
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: var(--sidebar-w);
            flex-shrink: 0;
            background: var(--white);
            border-right: 1.5px solid var(--border);
            display: flex;
            flex-direction: column;
            height: 100vh;
            position: sticky;
            top: 0;
            overflow-y: auto;
        }
        .sb-logo {
            background: linear-gradient(135deg, var(--forest) 0%, #2d6444 100%);
            padding: 1.375rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 11px;
            text-decoration: none;
            flex-shrink: 0;
        }
        .sb-logo-svg { width: 38px; height: 38px; flex-shrink: 0; }
        .sb-brand { font-family: 'Playfair Display', serif; font-size: 1.25rem; font-weight: 700; color: #fff; }
        .sb-tagline { font-size: .58rem; color: rgba(184, 223, 200, .72); letter-spacing: .1em; text-transform: uppercase; margin-top: 2px; }
        .sb-sec { font-size: .58rem; font-weight: 700; letter-spacing: .14em; text-transform: uppercase; color: var(--muted); padding: .875rem 1.25rem .3rem; opacity: .7; }
        .sb-nav { padding: .375rem .625rem; flex: 1; }
        .sb-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: .6rem .875rem;
            border-radius: 10px;
            color: var(--muted);
            text-decoration: none;
            font-size: .8125rem;
            font-weight: 600;
            margin-bottom: 2px;
            transition: background .18s, color .18s;
            position: relative;
        }
        .sb-link:hover { background: var(--fog); color: var(--fern); }
        .sb-link.active { background: var(--fog); color: var(--forest); }
        .sb-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 20%;
            height: 60%;
            width: 3px;
            background: var(--sage);
            border-radius: 0 3px 3px 0;
        }
        .sb-link svg { width: 17px; height: 17px; flex-shrink: 0; }
        .sb-badge { margin-left: auto; background: var(--sage); color: #fff; font-size: .6rem; font-weight: 700; padding: 2px 7px; border-radius: 20px; }
        .sb-footer { padding: 1rem .625rem; border-top: 1px solid var(--border); }
        .sb-user {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: .625rem .75rem;
            border-radius: 10px;
            background: var(--fog);
            text-decoration: none;
        }
        .sb-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: var(--forest);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .75rem;
            font-weight: 700;
            color: #fff;
            flex-shrink: 0;
        }
        .sb-uname { font-size: .8125rem; font-weight: 600; color: var(--text); }
        .sb-urole { font-size: .65rem; color: var(--muted); margin-top: 1px; }
        .sb-logout {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: .5rem .875rem;
            margin-top: .375rem;
            border-radius: 8px;
            color: var(--muted);
            font-size: .75rem;
            font-weight: 600;
            text-decoration: none;
        }
        .main { flex: 1; min-width: 0; display: flex; flex-direction: column; }
        .content { padding: 2.25rem; overflow-y: auto; flex: 1; }
        .page-hdr {
            display: flex;
            justify-content: space-between;
            align-items: end;
            margin-bottom: 1.75rem;
            padding-bottom: 1.5rem;
            border-bottom: 1.5px solid var(--border);
            gap: 16px;
        }
        .page-title { font-family: 'Playfair Display', serif; font-size: 2rem; color: var(--forest); }
        .page-sub { color: var(--muted); margin-top: .5rem; }
        .layout {
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 1.5rem;
        }
        .card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 18px;
            overflow: hidden;
        }
        .card-head {
            padding: 1rem 1.25rem;
            background: var(--fog);
            border-bottom: 1.5px solid var(--border);
            font-family: 'Playfair Display', serif;
            color: var(--forest);
            font-size: 1rem;
            font-weight: 700;
        }
        .card-body { padding: 1.25rem; }
        .profile-hero {
            background: linear-gradient(140deg, var(--forest), #29553d 65%, #356c4b);
            padding: 1.5rem;
            color: #fff;
        }
        .profile-avatar {
            width: 74px;
            height: 74px;
            border-radius: 50%;
            background: rgba(255,255,255,.15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }
        .profile-name { font-size: 1.25rem; font-weight: 700; }
        .profile-role { font-size: .85rem; color: rgba(255,255,255,.8); margin-top: .25rem; }
        .meta-list { display: grid; gap: .8rem; }
        .meta-item { display: flex; flex-direction: column; gap: .2rem; }
        .meta-label { font-size: .72rem; text-transform: uppercase; letter-spacing: .08em; color: var(--muted); }
        .meta-value { font-size: .95rem; color: var(--text); font-weight: 600; }
        .notice {
            margin-bottom: 1rem;
            background: #edf8f0;
            color: var(--fern);
            border: 1px solid #cde4d2;
            padding: .875rem 1rem;
            border-radius: 12px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1rem;
        }
        .field { display: flex; flex-direction: column; gap: .45rem; }
        .field.full { grid-column: 1 / -1; }
        label { font-size: .82rem; font-weight: 700; color: var(--pine); }
        input, select {
            width: 100%;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            padding: .78rem .9rem;
            font-size: .9rem;
            font-family: 'Outfit', sans-serif;
            background: var(--parch);
        }
        .actions {
            display: flex;
            justify-content: flex-end;
            gap: .75rem;
            margin-top: 1.25rem;
        }
        .btn {
            border: none;
            border-radius: 10px;
            padding: .8rem 1.15rem;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            font-family: 'Outfit', sans-serif;
        }
        .btn-outline { background: var(--white); border: 1.5px solid var(--border); color: var(--muted); }
        .btn-primary { background: var(--forest); color: #fff; }
        .hint-grid { display: grid; gap: .85rem; }
        .hint {
            padding: .9rem 1rem;
            border-radius: 12px;
            background: var(--parch);
            border: 1px solid var(--border);
        }
        .hint strong { display: block; color: var(--forest); margin-bottom: .25rem; }
        @media (max-width: 960px) {
            .layout { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    @php
        $roleName = optional($user->roles->first())->name ?? 'Utilisateur';
        $initials = collect(explode(' ', trim($user->name)))->filter()->map(fn ($part) => strtoupper(substr($part, 0, 1)))->take(2)->implode('');
    @endphp

    <aside class="sidebar">
        <a href="{{ route('dashboard') }}" class="sb-logo">
            <svg class="sb-logo-svg" viewBox="0 0 48 48" fill="none">
                <circle cx="24" cy="24" r="22" fill="rgba(255,255,255,0.08)" stroke="rgba(255,255,255,0.18)" stroke-width="1.5" />
                <path d="M8 36 Q24 30 40 36" stroke="rgba(255,255,255,0.18)" stroke-width="1.5" fill="none" stroke-linecap="round" />
                <path d="M24 38 L24 18" stroke="#a8e6c0" stroke-width="2.8" stroke-linecap="round" />
                <path d="M24 29 C19 25 13 23 11 17 C17 16 23 22 24 29Z" fill="#6dbd8e" />
                <path d="M24 24 C29 20 36 18 38 12 C31 11 25 17 24 24Z" fill="#a8e6c0" />
            </svg>
            <div>
                <div class="sb-brand">AgriNova</div>
                <div class="sb-tagline">Gestion Agricole</div>
            </div>
        </a>
        <div class="sb-nav">
            <div class="sb-sec">Principal</div>
            <a href="{{ route('dashboard') }}" class="sb-link">Tableau de bord</a>
            <a href="{{ route('cultures.index') }}" class="sb-link">Cultures <span class="sb-badge">Go</span></a>
            <a href="{{ route('stocks.index') }}" class="sb-link">Stocks</a>
            <a href="{{ route('fields.index') }}" class="sb-link">Parcelles</a>
            <div class="sb-sec">Gestion</div>
            <a href="{{ route('equipments.index') }}" class="sb-link">Equipements</a>
            <div class="sb-sec">Compte</div>
            <a href="{{ route('profile.show') }}" class="sb-link active">Profil</a>
        </div>
        <div class="sb-footer">
            <a href="{{ route('profile.show') }}" class="sb-user">
                <div class="sb-avatar">{{ $initials ?: 'AG' }}</div>
                <div>
                    <div class="sb-uname">{{ $user->name }}</div>
                    <div class="sb-urole">{{ $roleName }}</div>
                </div>
            </a>
            <a href="{{ route('logout') }}" class="sb-logout">Deconnexion</a>
        </div>
    </aside>

    <div class="main">
        <div class="content">
            <div class="page-hdr">
                <div>
                    <h1 class="page-title">Mon profil</h1>
                    <p class="page-sub">Modifiez vos informations personnelles en gardant la meme interface que le reste de l'application.</p>
                </div>
            </div>

            @if (session('success'))
                <div class="notice">{{ session('success') }}</div>
            @endif

            <div class="layout">
                <div>
                    <div class="card">
                        <div class="profile-hero">
                            <div class="profile-avatar">{{ $initials ?: 'AG' }}</div>
                            <div class="profile-name">{{ $user->name }}</div>
                            <div class="profile-role">{{ $roleName }}</div>
                        </div>
                        <div class="card-body">
                            <div class="meta-list">
                                <div class="meta-item">
                                    <div class="meta-label">Email</div>
                                    <div class="meta-value">{{ $user->email }}</div>
                                </div>
                                <div class="meta-item">
                                    <div class="meta-label">Telephone</div>
                                    <div class="meta-value">{{ $user->telephone ?: 'Non renseigne' }}</div>
                                </div>
                                <div class="meta-item">
                                    <div class="meta-label">Ville</div>
                                    <div class="meta-value">{{ optional($user->ville)->name ?: 'Non renseignee' }}</div>
                                </div>
                                <div class="meta-item">
                                    <div class="meta-label">Specialite</div>
                                    <div class="meta-value">{{ $user->specialite ?: 'Non renseignee' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="margin-top: 1rem;">
                        <div class="card-head">Resume professionnel</div>
                        <div class="card-body">
                            <div class="hint-grid">
                                <div class="hint">
                                    <strong>Experience</strong>
                                    {{ $user->annees_experience ?? 0 }} an(s)
                                </div>
                                <div class="hint">
                                    <strong>Tarif horaire</strong>
                                    {{ $user->tarif_horaire ?? 0 }} DH
                                </div>
                                <div class="hint">
                                    <strong>Interventions</strong>
                                    {{ $user->interventions ?? 0 }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-head">Editer le profil</div>
                    <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="grid">
                                <div class="field">
                                    <label for="name">Nom complet</label>
                                    <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required>
                                </div>
                                <div class="field">
                                    <label for="user_name">Nom utilisateur</label>
                                    <input id="user_name" name="user_name" type="text" value="{{ old('user_name', $user->user_name) }}">
                                </div>
                                <div class="field">
                                    <label for="email">Email</label>
                                    <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required>
                                </div>
                                <div class="field">
                                    <label for="telephone">Telephone</label>
                                    <input id="telephone" name="telephone" type="text" value="{{ old('telephone', $user->telephone) }}">
                                </div>
                                <div class="field">
                                    <label for="ville_id">Ville</label>
                                    <select id="ville_id" name="ville_id">
                                        <option value="">Choisir une ville</option>
                                        @foreach ($villes as $ville)
                                            <option value="{{ $ville->id }}" @selected(old('ville_id', $user->ville_id) == $ville->id)>{{ $ville->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="field">
                                    <label for="specialite">Specialite</label>
                                    <input id="specialite" name="specialite" type="text" value="{{ old('specialite', $user->specialite) }}">
                                </div>
                                <div class="field">
                                    <label for="annees_experience">Annees d'experience</label>
                                    <input id="annees_experience" name="annees_experience" type="number" min="0" value="{{ old('annees_experience', $user->annees_experience) }}">
                                </div>
                                <div class="field">
                                    <label for="tarif_horaire">Tarif horaire</label>
                                    <input id="tarif_horaire" name="tarif_horaire" type="number" min="0" step="0.01" value="{{ old('tarif_horaire', $user->tarif_horaire) }}">
                                </div>
                                <div class="field full">
                                    <label for="interventions">Nombre d'interventions</label>
                                    <input id="interventions" name="interventions" type="number" min="0" value="{{ old('interventions', $user->interventions) }}">
                                </div>
                            </div>

                            @if ($errors->any())
                                <div class="notice" style="margin-top: 1rem; background: #fff4f1; color: var(--rust); border-color: #f1d4cc;">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <div class="actions">
                                <a href="{{ route('dashboard') }}" class="btn btn-outline">Retour</a>
                                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
