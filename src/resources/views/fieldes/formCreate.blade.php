<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriNova — Créer une Parcelle</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --forest:    #1b3a2d;
            --pine:      #254d3a;
            --fern:      #2e6b4f;
            --sage:      #4a8c68;
            --mint:      #6dbd8e;
            --dew:       #b8dfc8;
            --fog:       #e6f2eb;
            --parchment: #f8f4ed;
            --cream:     #fdfbf7;
            --text:      #1a2318;
            --muted:     #5a6b55;
            --border:    #c8dcc0;
            --white:     #ffffff;
            --danger:    #b33a3a;
            --amber:     #c98a12;
        }

        html, body { height: 100%; }

        body {
            font-family: 'Outfit', sans-serif;
            min-height: 180vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-image: url('../assets/fields.jpg');
            background-repeat: repeat-x;
            background-size: auto 100%;
            background-position: top left;
            z-index: 0;
        }
        body::after {
            content: '';
            position: fixed; inset: 0;
            background: linear-gradient(
                150deg,
                rgba(12,28,18,0.55) 0%,
                rgba(27,58,45,0.45) 55%,
                rgba(18,38,24,0.60) 100%
            );
            z-index: 1;
        }

        /* ── Shell ── */
        .shell {
            width: 100%;
            max-width: 480px;
            position: relative;
            z-index: 2;
        }

        /* ── Brand bar ── */
        .brand-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
            padding: 0 4px;
        }
        .logo-lockup { display: flex; align-items: center; gap: 12px; }
        .logo-svg-wrap { width: 52px; height: 52px; flex-shrink: 0; filter: drop-shadow(0 3px 10px rgba(0,0,0,0.35)); }
        .brand-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.75rem; font-weight: 700;
            color: #fff; letter-spacing: -0.01em; line-height: 1;
            text-shadow: 0 2px 12px rgba(0,0,0,0.45);
        }
        .brand-tagline {
            font-size: 0.68rem; font-weight: 400;
            color: rgba(184,223,200,0.9);
            letter-spacing: 0.14em; text-transform: uppercase; margin-top: 3px;
        }
        .top-back {
            display: flex; align-items: center; gap: 6px;
            font-size: 0.8125rem; font-weight: 600;
            color: #fff; text-decoration: none;
            padding: 8px 16px;
            border: 1.5px solid rgba(255,255,255,0.3);
            border-radius: 30px;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            transition: all 0.2s;
        }
        .top-back:hover { background: rgba(255,255,255,0.18); }
        .top-back svg { width: 14px; height: 14px; }

        /* ── Card ── */
        .card {
            background: rgba(253,251,247,0.97);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border-radius: 24px;
            border: 1.5px solid rgba(255,255,255,0.65);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1), 0 25px 80px rgba(0,0,0,0.4);
        }

        /* ── Card Header ── */
        .card-header {
            background: linear-gradient(135deg, var(--forest) 0%, #2d6444 100%);
            padding: 1.5rem 2.25rem;
            display: flex; align-items: center; justify-content: space-between;
            position: relative; overflow: hidden; flex-shrink: 0;
        }
        .card-header::after {
            content: ''; position: absolute;
            top: -50px; right: -50px; width: 200px; height: 200px;
            background: radial-gradient(circle, rgba(109,189,142,0.15) 0%, transparent 70%);
            pointer-events: none;
        }
        /* decorative field icon in header */
        .card-header::before {
            content: '';
            position: absolute;
            bottom: -20px; left: -20px;
            width: 100px; height: 100px;
            background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
            pointer-events: none;
        }
        .ch-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem; color: #fff; font-weight: 700;
        }
        .ch-sub {
            font-size: 0.75rem; color: rgba(184,223,200,0.82);
            margin-top: 4px; letter-spacing: 0.04em;
        }
        .ch-icon {
            width: 48px; height: 48px;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .ch-icon svg { width: 24px; height: 24px; color: var(--dew); }

        /* ── Form body ── */
        .form-body {
            padding: 2rem 2.25rem 2.5rem;
            flex: 1;
        }

        /* ── Section label ── */
        .sec-label {
            display: flex; align-items: center; gap: 8px;
            font-family: 'Playfair Display', serif;
            font-size: 0.95rem; color: var(--forest); font-weight: 600;
            padding-bottom: 0.6rem;
            border-bottom: 1.5px solid var(--border);
            margin-bottom: 1.25rem;
        }
        .sec-label svg { width: 15px; height: 15px; color: var(--sage); flex-shrink: 0; }

        /* ── Field group ── */
        .field-group { margin-bottom: 1.125rem; }
        .f-label {
            display: flex; align-items: center; justify-content: space-between;
            font-size: 0.8125rem; font-weight: 600;
            color: var(--pine); margin-bottom: 0.4rem;
        }
        .req { color: var(--danger); }
        .f-hint { font-size: 0.7rem; font-weight: 400; color: var(--muted); }

        /* ── Inputs ── */
        .inp {
            width: 100%;
            background: var(--parchment);
            border: 1.5px solid var(--border);
            border-radius: 10px;
            padding: 0.675rem 0.9rem;
            font-size: 0.875rem;
            font-family: 'Outfit', sans-serif;
            color: var(--text); outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
        }
        .inp::placeholder { color: #aab8a4; }
        .inp:focus {
            border-color: var(--sage);
            background: var(--white);
            box-shadow: 0 0 0 3px rgba(74,140,104,0.12);
        }
        select.inp { appearance: auto; cursor: pointer; }

        /* input with icon */
        .inp-wrap { position: relative; }
        .inp-wrap .inp { padding-left: 2.625rem; }
        .inp-icon {
            position: absolute; left: 0.875rem; top: 50%;
            transform: translateY(-50%);
            color: var(--muted); display: flex; pointer-events: none;
        }
        .inp-icon svg { width: 15px; height: 15px; }

        /* input with unit suffix */
        .inp-unit-wrap { position: relative; }
        .inp-unit-wrap .inp { padding-right: 3.5rem; }
        .inp-unit {
            position: absolute; right: 0;
            top: 0; bottom: 0;
            display: flex; align-items: center; justify-content: center;
            padding: 0 0.875rem;
            font-size: 0.75rem; font-weight: 700;
            color: var(--white);
            background: var(--sage);
            border-radius: 0 9px 9px 0;
            border: 1.5px solid var(--sage);
            pointer-events: none;
            min-width: 44px;
        }

        /* ── Size selector cards ── */
        .size-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.625rem;
            margin-bottom: 0.5rem;
        }
        .size-card {
            cursor: pointer;
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            gap: 4px;
            padding: 0.75rem 0.5rem;
            background: var(--parchment);
            border: 1.5px solid var(--border);
            border-radius: 12px;
            transition: all 0.18s;
            position: relative;
        }
        .size-card:hover { border-color: var(--sage); background: var(--fog); }
        .size-card.selected {
            border-color: var(--fern);
            background: var(--fog);
            box-shadow: 0 0 0 3px rgba(74,140,104,0.12);
        }
        .size-card input[type="radio"] { display: none; }
        .size-card-icon {
            font-size: 1.25rem;
            line-height: 1;
        }
        .size-card-label {
            font-size: 0.7rem; font-weight: 700;
            color: var(--text); text-align: center;
        }
        .size-card-range {
            font-size: 0.62rem; color: var(--muted); text-align: center;
        }
        .size-check {
            position: absolute; top: 6px; right: 6px;
            width: 16px; height: 16px;
            background: var(--sage); border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            opacity: 0; transition: opacity 0.18s;
        }
        .size-check svg { width: 9px; height: 9px; color: #fff; }
        .size-card.selected .size-check { opacity: 1; }

        /* ── OR custom size ── */
        .or-custom {
            display: flex; align-items: center; gap: 0.75rem;
            margin: 0.875rem 0 0.875rem;
            font-size: 0.68rem; font-weight: 700;
            color: var(--muted); letter-spacing: 0.06em; text-transform: uppercase;
        }
        .or-custom::before, .or-custom::after {
            content: ''; flex: 1; height: 1px; background: var(--border);
        }

        /* ── Location select with preview ── */
        .ville-select-wrap { position: relative; }
        .ville-select-wrap select.inp { padding-left: 2.625rem; appearance: none; cursor: pointer; }
        .ville-flag {
            position: absolute; right: 0.875rem; top: 50%;
            transform: translateY(-50%);
            font-size: 0.875rem; pointer-events: none;
        }

        /* Ville region chips */
        .ville-chips {
            display: flex; flex-wrap: wrap; gap: 0.4rem;
            margin-top: 0.625rem;
        }
        .ville-chip {
            font-size: 0.68rem; font-weight: 600;
            padding: 3px 10px; border-radius: 20px;
            background: var(--fog); color: var(--muted);
            border: 1px solid var(--border);
            cursor: pointer; transition: all 0.15s;
        }
        .ville-chip:hover { border-color: var(--sage); color: var(--fern); }
        .ville-chip.selected { background: var(--forest); color: #fff; border-color: var(--forest); }

        /* ── Info box ── */
        .info-box {
            background: var(--fog);
            border: 1.5px solid var(--dew);
            border-left: 3px solid var(--sage);
            border-radius: 10px;
            padding: 0.875rem 1rem;
            margin-bottom: 1.5rem;
            display: flex; gap: 0.75rem; align-items: flex-start;
        }
        .info-box svg { width: 15px; height: 15px; color: var(--sage); flex-shrink: 0; margin-top: 2px; }
        .info-box-text { font-size: 0.775rem; color: var(--muted); line-height: 1.55; }
        .info-box-text strong { color: var(--forest); }

        /* ── Nav footer ── */
        .nav-footer {
            background: #f0e6c8;
            border-top: 1.5px solid var(--border);
            padding: 1.125rem 2.25rem;
            display: flex; align-items: center; justify-content: space-between;
            gap: 0.75rem; flex-shrink: 0;
        }
        .btn-cancel {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 0.6rem 1.25rem;
            border: 1.5px solid var(--border);
            background: var(--white); color: var(--muted);
            font-weight: 600; font-size: 0.8125rem;
            font-family: 'Outfit', sans-serif;
            border-radius: 10px; cursor: pointer; text-decoration: none;
            transition: background 0.2s;
        }
        .btn-cancel:hover { background: var(--fog); }
        .btn-cancel svg { width: 14px; height: 14px; }

        .btn-submit {
            display: flex; align-items: center; gap: 7px;
            padding: 0.6rem 1.5rem;
            background: var(--forest); color: #fff;
            font-weight: 700; font-size: 0.875rem;
            font-family: 'Outfit', sans-serif;
            border: none; border-radius: 10px; cursor: pointer;
            box-shadow: 0 4px 14px rgba(27,58,45,0.25);
            transition: background 0.2s, box-shadow 0.2s, transform 0.15s;
        }
        .btn-submit:hover { background: var(--fern); box-shadow: 0 6px 20px rgba(27,58,45,0.32); transform: translateY(-1px); }
        .btn-submit:active { transform: translateY(0); }
        .btn-submit svg { width: 16px; height: 16px; }

        /* ── Error banner ── */
        .error-banner {
            background: #fef2f2;
            border: 1.5px solid #fca5a5;
            border-left: 3px solid var(--danger);
            border-radius: 10px; padding: 0.875rem 1rem; margin-bottom: 1.25rem;
            display: flex; align-items: flex-start; gap: 0.625rem;
            font-size: 0.8125rem; color: var(--danger);
        }
        .error-banner svg { width: 15px; height: 15px; flex-shrink: 0; margin-top: 1px; }

        /* ── Preview card ── */
        .preview-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 14px;
            padding: 1rem 1.125rem;
            margin-bottom: 1.5rem;
            display: flex; align-items: center; gap: 1rem;
        }
        .preview-icon {
            width: 52px; height: 52px;
            background: var(--fog);
            border: 1.5px solid var(--dew);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            font-size: 1.5rem;
        }
        .preview-name {
            font-family: 'Playfair Display', serif;
            font-size: 1rem; font-weight: 700;
            color: var(--forest); line-height: 1.1;
        }
        .preview-meta {
            font-size: 0.75rem; color: var(--muted);
            margin-top: 3px; display: flex; align-items: center; gap: 6px;
        }
        .preview-meta-dot { width: 3px; height: 3px; border-radius: 50%; background: var(--dew); }
        .preview-size-badge {
            font-size: 0.65rem; font-weight: 700;
            background: var(--fog); color: var(--sage);
            border: 1px solid var(--dew);
            border-radius: 20px; padding: 2px 9px;
        }
    </style>
</head>
<body>

<div class="shell">

    <!-- Brand bar -->
    <div class="brand-bar">
        <div class="logo-lockup">
            <svg class="logo-svg-wrap" viewBox="0 0 58 58" fill="none">
                <circle cx="29" cy="29" r="28" fill="rgba(255,255,255,0.1)" stroke="rgba(255,255,255,0.28)" stroke-width="1.5"/>
                <path d="M10 40 Q29 34 48 40" stroke="rgba(255,255,255,0.2)" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                <path d="M29 42 L29 20" stroke="#a8e6c0" stroke-width="3.2" stroke-linecap="round"/>
                <path d="M29 32 C23 28 14 26 12 19 C18 18 26 24 29 32Z" fill="#6dbd8e"/>
                <path d="M29 27 C35 22 43 20 45 13 C38 12 31 18 29 27Z" fill="#a8e6c0"/>
                <path d="M29 37 C34 34 38 32 39 27 C35 27 30 31 29 37Z" fill="#6dbd8e" opacity="0.7"/>
                <circle cx="29" cy="11" r="4" fill="#f7e96e" opacity="0.92"/>
                <line x1="29" y1="5" x2="29" y2="3.5" stroke="#f7e96e" stroke-width="1.8" stroke-linecap="round"/>
                <line x1="34" y1="6.5" x2="35.2" y2="5.2" stroke="#f7e96e" stroke-width="1.5" stroke-linecap="round" opacity="0.75"/>
                <line x1="24" y1="6.5" x2="22.8" y2="5.2" stroke="#f7e96e" stroke-width="1.5" stroke-linecap="round" opacity="0.75"/>
            </svg>
            <div>
                <div class="brand-name">AgriNova</div>
                <div class="brand-tagline">Gestion Agricole</div>
            </div>
        </div>
        <a href="/dashboard" class="top-back">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Retour
        </a>
    </div>

    <!-- Card -->
    <div class="card">

        <!-- Header -->
        <div class="card-header">
            <div>
                <div class="ch-title">Nouvelle Parcelle</div>
                <div class="ch-sub">Définissez les informations de votre champ agricole</div>
            </div>
            <div class="ch-icon">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
        </div>

        <!-- Form -->
        <form action="{{ route('fields.store') }}" method="POST" id="fieldForm">
            @csrf

            <div class="form-body">

                @if ($errors->any())
                <div class="error-banner">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <span>{{ $errors->first() }}</span>
                </div>
                @endif

                <!-- Live preview -->
                <div class="preview-card" id="previewCard">
                    <div class="preview-icon" id="prevIcon">🌾</div>
                    <div>
                        <div class="preview-name" id="prevName">Nom de la parcelle</div>
                        <div class="preview-meta">
                            <span id="prevVille">Ville non sélectionnée</span>
                            <span class="preview-meta-dot" id="prevDot" style="display:none;"></span>
                            <span class="preview-size-badge" id="prevSize" style="display:none;"></span>
                        </div>
                    </div>
                </div>

                <!-- SECTION 1: Identité -->
                <p class="sec-label">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                    Identité de la parcelle
                </p>

                <!-- Name -->
                <div class="field-group">
                    <label class="f-label" for="name">
                        <span>Nom de la parcelle <span class="req">*</span></span>
                        <span class="f-hint">Ex : Parcelle A, Champ Nord</span>
                    </label>
                    <div class="inp-wrap">
                        <span class="inp-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </span>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="inp"
                            placeholder="ex: Parcelle A — Nord"
                            value="{{ old('name') }}"
                            oninput="updatePreview()"
                            required
                        >
                    </div>
                </div>

                <!-- SECTION 2: Localisation -->
                <p class="sec-label" style="margin-top:1.5rem;">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Localisation
                </p>

                <!-- Location (villes) -->
                <div class="field-group">
                    <label class="f-label" for="location">
                        <span>Ville / Région <span class="req">*</span></span>
                    </label>
                    <div class="ville-select-wrap">
                        <span class="inp-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </span>
                        <select name="ville_id" id="location" class="inp" onchange="updatePreview(); syncChips(this.value)" required>
                            <option value="">Sélectionner une ville</option>
                            @foreach($villes as $ville)
                            <option value="{{$ville->id}}">{{$ville->name}}</option>
                            @endforeach
                        </select>
                        <span class="ville-flag" id="villeFlag"></span>
                    </div>
                </div>

                <!-- SECTION 3: Taille -->
                <p class="sec-label" style="margin-top:1.5rem;">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                    </svg>
                    Superficie
                </p>

                <!-- Size preset cards -->
                <div class="size-grid">
                    <label class="size-card" id="sc-small">
                        <input type="radio" name="_size_preset" value="small" onchange="applyPreset(1)">
                        <div class="size-card-icon"></div>
                        <div class="size-card-label">Petite</div>
                        <div class="size-card-range">< 2 ha</div>
                        <div class="size-check"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                    </label>

                    <label class="size-card" id="sc-medium">
                        <input type="radio" name="_size_preset" value="medium" onchange="applyPreset(5)">
                        <div class="size-card-icon"></div>
                        <div class="size-card-label">Moyenne</div>
                        <div class="size-card-range">2 – 10 ha</div>
                        <div class="size-check"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                    </label>

                    <label class="size-card" id="sc-large">
                        <input type="radio" name="_size_preset" value="large" onchange="applyPreset(20)">
                        <div class="size-card-icon"></div>
                        <div class="size-card-label">Grande</div>
                        <div class="size-card-range">> 10 ha</div>
                        <div class="size-check"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                    </label>
                </div>

                <div class="or-custom">ou saisir manuellement</div>
                <!-- Custom size input -->
                <div class="field-group">
                    <label class="f-label" for="size">
                        <span>Superficie exacte <span class="req">*</span></span>
                        <span class="f-hint">En hectares (ha)</span>
                    </label>
                    <div class="inp-unit-wrap">
                        <input
                            type="number"
                            name="size"
                            id="size"
                            class="inp"
                            placeholder="ex: 4.5"
                            min="0.1"
                            step="0.1"
                            value="{{ old('size') }}"
                            oninput="updatePreview(); clearPresets()"
                            required
                        >
                        <span class="inp-unit">ha</span>
                    </div>
                </div>

                <!-- Info box -->
                <div class="info-box">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="info-box-text">
                        La parcelle sera associée à votre exploitation. Vous pourrez y assigner des
                        <strong>cultures</strong>, des <strong>ouvriers</strong> et des <strong>équipements</strong> après création.
                    </p>
                </div>

            </div><!-- /form-body -->

            <!-- Nav footer -->
            <div class="nav-footer">
                <a href="/dashboard" class="btn-cancel">
                    Annuler
                </a>
                <button type="submit" class="btn-submit">
                    Créer la parcelle
                </button>
            </div>

        </form>
    </div><!-- /card -->

</div><!-- /shell -->

<script>

    function updatePreview() {
        const name  = document.getElementById('name').value.trim();
        const ville = document.getElementById('location').value;
        const size  = document.getElementById('size').value;

        // Name
        document.getElementById('prevName').textContent = name || 'Nom de la parcelle';

        // Ville
        if (ville) {
            document.getElementById('prevVille').textContent = ville;
            document.getElementById('prevIcon').textContent = villeFlags[ville] || '';
            document.getElementById('villeFlag').textContent = villeFlags[ville] || '';
        } else {
            document.getElementById('prevVille').textContent = 'Ville non sélectionnée';
            document.getElementById('prevIcon').textContent = '';
            document.getElementById('villeFlag').textContent = '';
        }

        // Size badge
        const dot     = document.getElementById('prevDot');
        const sizeBadge = document.getElementById('prevSize');
        if (size) {
            dot.style.display = '';
            sizeBadge.style.display = '';
            sizeBadge.textContent = size + ' ha';
        } else {
            dot.style.display = 'none';
            sizeBadge.style.display = 'none';
        }
    }

    // Quick ville chip
    function quickVille(ville) {
        const sel = document.getElementById('location');
        sel.value = ville;
        syncChips(ville);
        updatePreview();
    }

    function syncChips(ville) {
        document.querySelectorAll('.ville-chip').forEach(c => {
            c.classList.toggle('selected', c.textContent === ville);
        });
    }

    // Size preset cards
    function applyPreset(val) {
        document.getElementById('size').value = val;
        updatePreview();
        // Visual: mark selected card
        document.querySelectorAll('.size-card').forEach(c => c.classList.remove('selected'));
        const checked = document.querySelector('input[name="_size_preset"]:checked');
        if (checked) checked.closest('.size-card').classList.add('selected');
    }

    function clearPresets() {
        document.querySelectorAll('.size-card').forEach(c => c.classList.remove('selected'));
        document.querySelectorAll('input[name="_size_preset"]').forEach(r => r.checked = false);
    }
</script>
</body>
</html>