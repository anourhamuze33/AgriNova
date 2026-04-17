<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Professionnel — AgriNova</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --soil:     #2c1a0e;
            --bark:     #5a3620;
            --moss:     #1a4a2e;
            --leaf:     #2d7a4f;
            --sprout:   #4aac6f;
            --mist:     #e8f5ee;
            --cream:    #faf7f2;
            --wheat:    #f0e6c8;
            --sand:     #ddd0b0;
            --text:     #1c1c1c;
            --subtle:   #6b7058;
            --border:   #c9d8c0;
            --white:    #ffffff;
            --red:      #c0392b;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            background-color: var(--cream);
            background-image:
                radial-gradient(ellipse at 0% 0%, rgba(45,122,79,0.08) 0%, transparent 50%),
                radial-gradient(ellipse at 100% 100%, rgba(90,54,32,0.06) 0%, transparent 50%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('../assets/backkk.jpg');
            background-repeat: repeat-x;
            z-index: -1;
        }

        /* ── Wrapper ── */
        .wrapper {
            width: 100%;
            max-width: 520px;
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        /* ── Header ── */
        .site-header {
            background: var(--moss);
            border-radius: 20px 20px 0 0;
            padding: 1.5rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 3px solid var(--sprout);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 0.875rem;
        }

        /* ── SVG Logo ── */
        .logo-mark {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
        }

        .brand-text h1 {
            font-family: 'DM Serif Display', serif;
            font-size: 1.375rem;
            color: var(--white);
            letter-spacing: 0.01em;
            line-height: 1.1;
        }

        .brand-text p {
            font-size: 0.7rem;
            color: rgba(232,245,238,0.7);
            font-weight: 400;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-top: 2px;
        }

        .login-link {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            color: rgba(232,245,238,0.85);
            font-size: 0.8rem;
            font-weight: 500;
            text-decoration: none;
            padding: 0.4rem 0.875rem;
            border: 1px solid rgba(232,245,238,0.25);
            border-radius: 20px;
            transition: background 0.2s, color 0.2s;
        }
        .login-link:hover { background: rgba(255,255,255,0.1); color: white; }
        .login-link svg { width: 14px; height: 14px; }

        /* ── Card ── */
        .card {
            background: var(--white);
            border-left: 1px solid var(--border);
            border-right: 1px solid var(--border);
        }

        /* ── Steps bar ── */
        .steps-bar {
            background: var(--wheat);
            padding: 1.125rem 2rem;
            display: flex;
            align-items: center;
            border-bottom: 1px solid var(--sand);
        }

        .step-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
            min-width: 60px;
        }

        .step-num {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 2px solid var(--sand);
            background: var(--white);
            color: var(--subtle);
            font-size: 0.8125rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .step-num.active {
            background: var(--moss);
            border-color: var(--moss);
            color: white;
        }

        .step-num.done {
            background: var(--sprout);
            border-color: var(--sprout);
            color: white;
        }

        .step-name {
            font-size: 0.625rem;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--subtle);
        }
        .step-name.active { color: var(--moss); }
        .step-name.done { color: var(--sprout); }

        .step-line {
            flex: 1;
            height: 2px;
            background: var(--sand);
            margin: 0 8px;
            margin-bottom: 16px;
            border-radius: 2px;
            overflow: hidden;
        }
        .step-line-fill {
            height: 100%;
            width: 0%;
            background: var(--sprout);
            border-radius: 2px;
        }

        /* ── Form body ── */
        .form-body {
            padding: 1.75rem 2rem;
        }

        .step-content { display: none; }
        .step-content.active { display: block; }

        /* ── Section label ── */
        .section-label {
            font-family: 'DM Serif Display', serif;
            font-size: 1rem;
            color: var(--moss);
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .section-label + .section-label { margin-top: 1.5rem; }
        .section-label svg { width: 16px; height: 16px; color: var(--sprout); }

        /* ── Type cards ── */
        .type-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .type-card {
            cursor: pointer;
            display: block;
            background: var(--cream);
            border: 1.5px solid var(--border);
            border-radius: 12px;
            padding: 1rem 0.875rem;
            position: relative;
            transition: border-color 0.2s, background 0.2s, box-shadow 0.2s;
        }
        .type-card:hover { border-color: var(--sprout); }
        .type-card.selected {
            border-color: var(--leaf);
            background: var(--mist);
            box-shadow: 0 0 0 3px rgba(74,172,111,0.15);
        }
        .type-card input[type="radio"] { display: none; }

        .type-card-inner {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 0.625rem;
        }

        .type-icon {
            width: 44px;
            height: 44px;
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .type-card.selected .type-icon { border-color: var(--sprout); background: var(--mist); }
        .type-icon svg { width: 22px; height: 22px; color: var(--leaf); }

        .type-name { font-weight: 700; font-size: 0.8125rem; color: var(--soil); }
        .type-sub { font-size: 0.7rem; color: var(--subtle); margin-top: 1px; }

        .type-badge {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 18px;
            height: 18px;
            background: var(--sprout);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
        }
        .type-badge svg { width: 10px; height: 10px; color: white; }
        .type-card.selected .type-badge { opacity: 1; }

        /* ── Fields ── */
        .field {
            margin-bottom: 0.875rem;
        }

        .field-row {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 0.875rem;
        }

        .field-label {
            width: 8.5rem;
            flex-shrink: 0;
            font-size: 0.8125rem;
            font-weight: 600;
            color: var(--bark);
        }
        .req { color: var(--red); }

        .input {
            flex: 1;
            width: 100%;
            background: var(--cream);
            border: 1.5px solid var(--border);
            border-radius: 9px;
            padding: 0.5625rem 0.75rem;
            font-size: 0.875rem;
            font-family: 'DM Sans', sans-serif;
            color: var(--text);
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .input::placeholder { color: #b0b8a8; }
        .input:focus {
            border-color: var(--leaf);
            background: var(--white);
            box-shadow: 0 0 0 3px rgba(45,122,79,0.1);
        }
        select.input { appearance: auto; cursor: pointer; }

        .two-col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
            margin-bottom: 0.875rem;
        }
        .col-label {
            font-size: 0.8125rem;
            font-weight: 600;
            color: var(--bark);
            margin-bottom: 0.3rem;
        }

        /* Password */
        .pw-wrap { flex: 1; position: relative; }
        .pw-wrap .input { padding-right: 2.5rem; }
        .pw-toggle {
            position: absolute;
            right: 0.625rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: var(--subtle);
            padding: 0;
            display: flex;
        }
        .pw-toggle:hover { color: var(--leaf); }
        .pw-toggle svg { width: 18px; height: 18px; }

        /* ── Intervention ── */
        .radio-box {
            background: var(--cream);
            border: 1.5px solid var(--border);
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 0.875rem;
        }
        .radio-box-title { font-size: 0.8125rem; font-weight: 600; color: var(--bark); margin-bottom: 0.625rem; }
        .radio-group { display: flex; gap: 1.5rem; }
        .radio-label {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text);
            cursor: pointer;
        }
        .radio-label input { accent-color: var(--leaf); width: 15px; height: 15px; }

        /* ── Info banner ── */
        .info-box {
            background: var(--mist);
            border: 1.5px solid var(--border);
            border-left: 3px solid var(--sprout);
            border-radius: 10px;
            padding: 0.875rem 1rem;
            margin-bottom: 1.125rem;
            display: flex;
            gap: 0.75rem;
        }
        .info-box svg { width: 16px; height: 16px; color: var(--sprout); flex-shrink: 0; margin-top: 2px; }
        .info-box-title { font-size: 0.8125rem; font-weight: 700; color: var(--moss); }
        .info-box-body { font-size: 0.75rem; color: var(--subtle); margin-top: 3px; line-height: 1.5; }

        /* ── Upload ── */
        .upload-section { margin-bottom: 1rem; }
        .upload-label { font-size: 0.8125rem; font-weight: 600; color: var(--bark); display: block; margin-bottom: 0.4rem; }
        .upload-label .opt { color: var(--subtle); font-weight: 400; font-size: 0.7rem; }

        .upload-zone input[type="file"] { display: none; }
        .upload-trigger {
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.125rem;
            background: var(--cream);
            border: 1.5px dashed var(--border);
            border-radius: 10px;
            transition: all 0.2s;
        }
        .upload-trigger:hover { border-color: var(--leaf); background: var(--mist); }
        .upload-zone.has-file .upload-trigger {
            border-color: var(--sprout);
            background: var(--mist);
            border-style: solid;
        }
        .upload-icon {
            width: 38px;
            height: 38px;
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .upload-icon svg { width: 18px; height: 18px; color: var(--leaf); }
        .upload-main { font-size: 0.8125rem; font-weight: 600; color: var(--soil); }
        .upload-sub { font-size: 0.7rem; color: var(--subtle); margin-top: 2px; }

        /* ── Summary ── */
        .summary-block {
            background: var(--cream);
            border: 1.5px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 1rem;
        }
        .summary-head {
            background: var(--moss);
            padding: 0.625rem 1rem;
        }
        .summary-head span { font-family: 'DM Serif Display', serif; font-size: 0.9rem; color: white; }
        .summary-body { padding: 0; }
        .sum-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.625rem 1rem;
            border-bottom: 1px solid var(--border);
            font-size: 0.8125rem;
        }
        .sum-row:last-child { border-bottom: none; }
        .sum-key { color: var(--subtle); }
        .sum-val { font-weight: 700; color: var(--soil); }

        /* ── Terms ── */
        .terms-box {
            background: var(--cream);
            border: 1.5px solid var(--border);
            border-radius: 10px;
            padding: 1rem;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            cursor: pointer;
            margin-bottom: 0.5rem;
        }
        .terms-box input { accent-color: var(--leaf); width: 15px; height: 15px; margin-top: 2px; flex-shrink: 0; }
        .terms-text { font-size: 0.8125rem; color: var(--subtle); line-height: 1.5; }
        .terms-link { color: var(--leaf); font-weight: 600; text-decoration: none; }
        .terms-link:hover { text-decoration: underline; }

        /* ── Nav buttons ── */
        .nav-footer {
            background: var(--wheat);
            border-top: 1px solid var(--sand);
            padding: 1.125rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.75rem;
        }

        .btn-prev {
            display: flex;
            align-items: center;
            gap: 0.375rem;
            padding: 0.5625rem 1.125rem;
            border: 1.5px solid var(--border);
            background: var(--white);
            color: var(--bark);
            font-weight: 600;
            font-size: 0.8125rem;
            font-family: 'DM Sans', sans-serif;
            border-radius: 9px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn-prev:hover { background: var(--mist); }
        .btn-prev svg { width: 14px; height: 14px; }

        .btn-group { display: flex; gap: 0.625rem; margin-left: auto; }

        .btn-cancel {
            display: inline-flex;
            align-items: center;
            padding: 0.5625rem 1.125rem;
            border: 1.5px solid var(--border);
            background: var(--white);
            color: var(--subtle);
            font-weight: 600;
            font-size: 0.8125rem;
            font-family: 'DM Sans', sans-serif;
            border-radius: 9px;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s;
        }
        .btn-cancel:hover { background: #f0ede7; }

        .btn-next, .btn-submit {
            display: flex;
            align-items: center;
            gap: 0.375rem;
            padding: 0.5625rem 1.375rem;
            background: var(--moss);
            color: white;
            font-weight: 700;
            font-size: 0.8125rem;
            font-family: 'DM Sans', sans-serif;
            border: none;
            border-radius: 9px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn-next:hover, .btn-submit:hover { background: var(--leaf); }
        .btn-next svg, .btn-submit svg { width: 14px; height: 14px; }

        .hidden { display: none !important; }

        /* ── Footer ── */
        .card-footer {
            background: var(--white);
            border-radius: 0 0 20px 20px;
            border: 1px solid var(--border);
            border-top: none;
            padding: 1rem 2rem;
            text-align: center;
            font-size: 0.8125rem;
            color: var(--subtle);
        }
        .card-footer a { color: var(--leaf); font-weight: 600; text-decoration: none; }
        .card-footer a:hover { text-decoration: underline; }

        /* ── Error banner ── */
        .error-banner {
            background: #fef2f2;
            border: 1.5px solid #fca5a5;
            border-radius: 10px;
            padding: 0.875rem 1rem;
            margin-bottom: 1rem;
            color: var(--red);
            font-size: 0.8125rem;
        }
        .error-banner ul { padding-left: 1.25rem; }
    </style>
</head>
<body>

    <div class="wrapper">

        <!-- Header -->
        <header class="site-header">
            <div class="brand">
                <!-- AgriNova SVG Logo -->
                <svg class="logo-mark" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- White circle background -->
                    <circle cx="24" cy="24" r="22" fill="white" opacity="0.12"/>
                    <circle cx="24" cy="24" r="21" stroke="rgba(255,255,255,0.25)" stroke-width="1"/>
                    <!-- Ground line -->
                    <path d="M8 32 Q24 28 40 32" stroke="rgba(255,255,255,0.35)" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                    <!-- Main stem -->
                    <path d="M24 34 L24 18" stroke="#7ee8a2" stroke-width="2.5" stroke-linecap="round"/>
                    <!-- Left leaf -->
                    <path d="M24 26 C20 24 15 22 14 18 C18 18 22 21 24 26Z" fill="#4aac6f"/>
                    <!-- Right leaf -->
                    <path d="M24 23 C28 21 33 19 34 15 C30 15 26 18 24 23Z" fill="#7ee8a2"/>
                    <!-- Small leaf right low -->
                    <path d="M24 30 C27 29 30 28 31 25 C28 25 25 27 24 30Z" fill="#4aac6f" opacity="0.7"/>
                    <!-- Sun arc -->
                    <path d="M16 14 Q24 8 32 14" stroke="#f0e68c" stroke-width="1.5" fill="none" stroke-linecap="round" opacity="0.8"/>
                    <!-- Sun rays -->
                    <line x1="24" y1="8" x2="24" y2="6" stroke="#f0e68c" stroke-width="1.5" stroke-linecap="round" opacity="0.8"/>
                    <line x1="30" y1="10" x2="31.5" y2="8.5" stroke="#f0e68c" stroke-width="1.5" stroke-linecap="round" opacity="0.6"/>
                    <line x1="18" y1="10" x2="16.5" y2="8.5" stroke="#f0e68c" stroke-width="1.5" stroke-linecap="round" opacity="0.6"/>
                </svg>
                <div class="brand-text">
                    <h1>AgriNova</h1>
                    <p>Réseau Agricole Professionnel</p>
                </div>
            </div>
            <a href="{{route('register.form')}}" class="login-link">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                </svg>
                Déjà inscrit ?
            </a>
        </header>

        <!-- Steps bar -->
        <div class="steps-bar card">
            <div class="step-item">
                <div class="step-num active" id="sn1">1</div>
                <span class="step-name active" id="sl1">Informations</span>
            </div>
            <div class="step-line"><div class="step-line-fill" id="fill1"></div></div>
            <div class="step-item">
                <div class="step-num" id="sn2">2</div>
                <span class="step-name" id="sl2">Documents</span>
            </div>
            <div class="step-line"><div class="step-line-fill" id="fill2"></div></div>
            <div class="step-item">
                <div class="step-num" id="sn3">3</div>
                <span class="step-name" id="sl3">Révision</span>
            </div>
        </div>

        <!-- Card / Form -->
        <div class="card">
            @if ($errors->any())
            <div style="padding: 1.5rem 2rem 0;">
                <div class="error-banner">
                    <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            </div>
            @endif

            <form action="{{route('register')}}" method="POST" novalidate enctype="multipart/form-data" id="registrationForm">
                @csrf

                <div class="form-body">

                    <!-- ══════════ STEP 1 ══════════ -->
                    <div class="step-content active" id="step1">

                        <p class="section-label">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            Type de Professionnel
                        </p>

                        <div class="type-grid">
                            <label class="type-card selected">
                                <input type="radio" name="role_id" value="1" checked onchange="selectType(this)">
                                <div class="type-card-inner">
                                    <div class="type-icon">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="type-name">Agriculteur</p>
                                        <p class="type-sub">Producteur agricole</p>
                                    </div>
                                </div>
                                <div class="type-badge"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                            </label>

                            <label class="type-card">
                                <input type="radio" name="role_id" value="2" onchange="selectType(this)">
                                <div class="type-card-inner">
                                    <div class="type-icon">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="type-name">Gestionnaire</p>
                                        <p class="type-sub">Gestion & inventaire</p>
                                    </div>
                                </div>
                                <div class="type-badge"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                            </label>
                        </div>

                        <p class="section-label">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            Informations Personnelles
                        </p>

                        <div class="field-row">
                            <label class="field-label">Nom Complet <span class="req">*</span></label>
                            <input type="text" name="name" class="input" placeholder="Mohamed Alami">
                        </div>
                        <div class="field-row">
                            <label class="field-label">Email <span class="req">*</span></label>
                            <input type="email" name="email" class="input" placeholder="contact@exemple.ma">
                        </div>
                        <div class="field-row">
                            <label class="field-label">Nom d'utilisateur <span class="req">*</span></label>
                            <input type="text" name="user_name" class="input" placeholder="m_alami">
                        </div>
                        <div class="field-row">
                            <label class="field-label">Téléphone <span class="req">*</span></label>
                            <input type="tel" name="telephone" class="input" placeholder="06 12 34 56 78">
                        </div>
                        <div class="field-row">
                            <label class="field-label">Ville <span class="req">*</span></label>
                            <select name="ville_id" class="input">
                                <option value="">Sélectionner une ville</option>
                                <option value="1">Casablanca</option>
                                <option value="2">Rabat</option>
                                <option value="3">Marrakech</option>
                                <option value="4">Fès</option>
                                <option value="5">Tanger</option>
                                <option value="6">Agadir</option>
                            </select>
                        </div>
                        <div class="field-row" id="specialitesField">
                            <label class="field-label">Spécialités <span class="req">*</span></label>
                            <input type="text" name="specialite" class="input" placeholder="Maraîchage, céréales...">
                        </div>

                        <div class="two-col">
                            <div>
                                <p class="col-label">Années d'expérience <span class="req">*</span></p>
                                <input type="number" name="annees_experience" min="0" class="input" placeholder="10">
                            </div>
                            <div>
                                <p class="col-label">Tarif Horaire (DH) <span class="req">*</span></p>
                                <input type="number" name="tarif_horaire" min="0" step="50" class="input" placeholder="500">
                            </div>
                        </div>

                        <p class="section-label" style="margin-top:1.25rem;">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            Sécurité du Compte
                        </p>

                        <div class="field-row">
                            <label class="field-label">Mot de Passe <span class="req">*</span></label>
                            <div class="pw-wrap">
                                <input type="password" name="password" id="password" minlength="8" class="input" placeholder="Minimum 8 caractères">
                                <button type="button" class="pw-toggle" onclick="togglePassword('password')">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                            </div>
                        </div>
                        <div class="field-row">
                            <label class="field-label">Confirmer <span class="req">*</span></label>
                            <div class="pw-wrap">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="input" placeholder="Confirmez le mot de passe">
                                <button type="button" class="pw-toggle" onclick="togglePassword('password_confirmation')">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                            </div>
                        </div>

                        <p class="section-label" style="margin-top:1.25rem;">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            Disponibilité
                        </p>

                        <div class="radio-box">
                            <p class="radio-box-title">Disponible pour des interventions à distance ou sur site ?</p>
                            <div class="radio-group">
                                <label class="radio-label"><input type="radio" name="interventions" value="1" checked><span>Oui</span></label>
                                <label class="radio-label"><input type="radio" name="interventions" value="0"><span>Non</span></label>
                            </div>
                        </div>
                    </div>

                    <!-- ══════════ STEP 2 ══════════ -->
                    <div class="step-content" id="step2">

                        <p class="section-label">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            Documents Justificatifs
                        </p>

                        <div class="info-box">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <div>
                                <p class="info-box-title">Documents requis</p>
                                <p class="info-box-body">Téléchargez vos documents pour vérification. Formats acceptés : PDF, JPG, PNG (max 2 MB par fichier).</p>
                            </div>
                        </div>

                        <div class="upload-section">
                            <label class="upload-label">Diplôme / Attestation <span class="req">*</span></label>
                            <div class="upload-zone" id="uploadZone2">
                                <input type="file" name="diplome" id="diplome" accept=".pdf,.jpg,.jpeg,.png" onchange="handleFileChange(this,'uploadZone2','fn2')">
                                <label for="diplome" class="upload-trigger">
                                    <div class="upload-icon">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                    </div>
                                    <div>
                                        <p class="upload-main">Cliquez pour télécharger</p>
                                        <p class="upload-sub" id="fn2">PDF, JPG ou PNG — Max 2 MB</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="upload-section">
                            <label class="upload-label">Carte d'Identité Nationale <span class="opt">(optionnel)</span></label>
                            <div class="upload-zone" id="uploadZone3">
                                <input type="file" name="cin" id="cin" accept=".pdf,.jpg,.jpeg,.png" onchange="handleFileChange(this,'uploadZone3','fn3')">
                                <label for="cin" class="upload-trigger">
                                    <div class="upload-icon">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2"/></svg>
                                    </div>
                                    <div>
                                        <p class="upload-main">Cliquez pour télécharger</p>
                                        <p class="upload-sub" id="fn3">PDF, JPG ou PNG — Max 2 MB</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- ══════════ STEP 3 ══════════ -->
                    <div class="step-content" id="step3">

                        <p class="section-label">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                            Révision et Confirmation
                        </p>

                        <div class="summary-block">
                            <div class="summary-head"><span>Résumé de votre inscription</span></div>
                            <div class="summary-body">
                                <div class="sum-row"><span class="sum-key">Type</span><span class="sum-val" id="sum-type">Agriculteur</span></div>
                                <div class="sum-row"><span class="sum-key">Nom</span><span class="sum-val" id="sum-nom">—</span></div>
                                <div class="sum-row"><span class="sum-key">Utilisateur</span><span class="sum-val" id="sum-user">—</span></div>
                                <div class="sum-row"><span class="sum-key">Email</span><span class="sum-val" id="sum-email">—</span></div>
                                <div class="sum-row"><span class="sum-key">Ville</span><span class="sum-val" id="sum-ville">—</span></div>
                                <div class="sum-row"><span class="sum-key">Expérience</span><span class="sum-val" id="sum-exp">—</span></div>
                                <div class="sum-row"><span class="sum-key">Tarif horaire</span><span class="sum-val" id="sum-tarif">—</span></div>
                            </div>
                        </div>

                        <div class="summary-block">
                            <div class="summary-head"><span>Documents téléchargés</span></div>
                            <div class="summary-body">
                                <div class="sum-row">
                                    <span class="sum-key">Diplôme</span>
                                    <span id="doc-diplome" style="font-size:0.8125rem;color:#9ca3af;display:flex;align-items:center;gap:4px;">
                                        <svg style="width:14px;height:14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01"/></svg> Non téléchargé
                                    </span>
                                </div>
                                <div class="sum-row">
                                    <span class="sum-key">CIN</span>
                                    <span id="doc-cin" style="font-size:0.8125rem;color:#9ca3af;display:flex;align-items:center;gap:4px;">
                                        <svg style="width:14px;height:14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01"/></svg> Non téléchargé
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="info-box">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <div>
                                <p class="info-box-title">Délai de validation</p>
                                <p class="info-box-body">Votre compte sera activé après vérification de vos documents. Ce processus prend généralement <strong>24 à 48 heures</strong>.</p>
                            </div>
                        </div>

                        <label class="terms-box">
                            <input type="checkbox" id="terms" name="terms" required>
                            <span class="terms-text">
                                J'atteste sur l'honneur que les informations fournies sont exactes et j'accepte les
                                <a href="/terms" class="terms-link">conditions d'utilisation</a> de la plateforme AgriNova.
                            </span>
                        </label>
                    </div>

                </div>

                <!-- Nav -->
                <div class="nav-footer">
                    <button type="button" id="prevBtn" onclick="changeStep(-1)" class="btn-prev hidden">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        Précédent
                    </button>
                    <div class="btn-group">
                        <a href="{{route('register.form')}}" class="btn-cancel">Annuler</a>
                        <button type="button" id="nextBtn" onclick="changeStep(1)" class="btn-next">
                            Suivant
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                        <button type="submit" id="submitBtn" class="btn-submit hidden">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Soumettre ma demande
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="card-footer">
            Vous avez déjà un compte ? <a href="/login">Se Connecter</a>
        </div>

    </div>

    <script>
        let currentStep = 1;
        const totalSteps = 3;

        function changeStep(direction) {
            const newStep = currentStep + direction;
            if (newStep < 1 || newStep > totalSteps) return;

            document.getElementById('step' + currentStep).classList.remove('active');

            if (direction > 0) {
                const sn = document.getElementById('sn' + currentStep);
                sn.classList.remove('active');
                sn.classList.add('done');
                sn.innerHTML = `<svg style="width:13px;height:13px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>`;
                document.getElementById('fill' + currentStep).style.width = '100%';
                const sl = document.getElementById('sl' + currentStep);
                sl.classList.remove('active');
                sl.classList.add('done');
            } else {
                const sn = document.getElementById('sn' + newStep);
                sn.classList.remove('done');
                sn.classList.add('active');
                sn.textContent = newStep;
                document.getElementById('fill' + newStep).style.width = '0%';
                document.getElementById('sl' + newStep).classList.remove('done');
            }

            currentStep = newStep;
            document.getElementById('step' + currentStep).classList.add('active');
            document.getElementById('sn' + currentStep).classList.add('active');
            document.getElementById('sn' + currentStep).textContent = currentStep;
            document.getElementById('sl' + currentStep).classList.add('active');

            document.getElementById('prevBtn').classList.toggle('hidden', currentStep === 1);
            document.getElementById('nextBtn').classList.toggle('hidden', currentStep === totalSteps);
            document.getElementById('submitBtn').classList.toggle('hidden', currentStep !== totalSteps);

            if (currentStep === 3) populateSummary();
        }

        function populateSummary() {
            const roleVal = document.querySelector('input[name="role_id"]:checked')?.value || '1';
            document.getElementById('sum-type').textContent = roleVal === '1' ? 'Agriculteur' : 'Gestionnaire de Stock';
            document.getElementById('sum-nom').textContent = document.querySelector('input[name="name"]')?.value || '—';
            document.getElementById('sum-user').textContent = document.querySelector('input[name="user_name"]')?.value || '—';
            document.getElementById('sum-email').textContent = document.querySelector('input[name="email"]')?.value || '—';
            const villeEl = document.querySelector('select[name="ville_id"]');
            document.getElementById('sum-ville').textContent = villeEl?.options[villeEl.selectedIndex]?.text || '—';
            const exp = document.querySelector('input[name="annees_experience"]')?.value;
            document.getElementById('sum-exp').textContent = exp ? exp + ' ans' : '—';
            const tarif = document.querySelector('input[name="tarif_horaire"]')?.value;
            document.getElementById('sum-tarif').textContent = tarif ? tarif + ' DH/h' : '—';
            updateDocStatus('diplome', 'doc-diplome');
            updateDocStatus('cin', 'doc-cin');
        }

        function updateDocStatus(inputId, spanId) {
            const input = document.getElementById(inputId);
            const span = document.getElementById(spanId);
            if (input?.files?.length > 0) {
                span.style.color = '#2d7a4f';
                span.style.fontWeight = '600';
                span.innerHTML = `<svg style="width:14px;height:14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> Téléchargé`;
            } else {
                span.style.color = '#9ca3af';
                span.style.fontWeight = '400';
                span.innerHTML = `<svg style="width:14px;height:14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01"/></svg> Non téléchargé`;
            }
        }

        function selectType(radio) {
            document.querySelectorAll('.type-card').forEach(c => c.classList.remove('selected'));
            radio.closest('.type-card').classList.add('selected');
        }

        function handleFileChange(input, zoneId, labelId) {
            const zone = document.getElementById(zoneId);
            const lbl = document.getElementById(labelId);
            if (input.files?.length > 0) {
                zone.classList.add('has-file');
                lbl.textContent = '✓ ' + input.files[0].name;
                lbl.style.color = '#2d7a4f';
                lbl.style.fontWeight = '600';
            } else {
                zone.classList.remove('has-file');
                lbl.textContent = 'PDF, JPG ou PNG — Max 2 MB';
                lbl.style.color = '';
                lbl.style.fontWeight = '';
            }
        }

        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
</body>
</html>