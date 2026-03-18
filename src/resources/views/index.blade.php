<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriNova — Gestion Agricole Intelligente</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,900;1,600&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            --wheat:     #e8d5a0;
            --earth:     #8b5e3c;
            --text:      #1a2318;
            --muted:     #5a6b55;
            --white:     #ffffff;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--parchment);
            color: var(--text);
            overflow-x: hidden;
        }

        /* ══════════════════════════════
           BACKGROUND — same pattern as register
        ══════════════════════════════ */
        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-image: url('../assets/background3.png');
            background-repeat: repeat-x;
            background-size: auto 100%;
            background-position: top left;
            z-index: 0;
        }
        body::after {
            content: '';
            position: fixed;
            inset: 0;
            background: linear-gradient(
                160deg,
                rgba(10, 24, 15, 0.82) 0%,
                rgba(20, 48, 32, 0.70) 45%,
                rgba(12, 30, 18, 0.88) 100%
            );
            z-index: 1;
        }

        /* All content above overlays */
        .page-wrap {
            position: relative;
            z-index: 2;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ══════════════════════════════
           NAVBAR
        ══════════════════════════════ */
        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.25rem 4rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            backdrop-filter: blur(12px);
            background: rgba(15,30,20,0.35);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .nav-logo-svg { width: 42px; height: 42px; filter: drop-shadow(0 2px 6px rgba(0,0,0,0.3)); }

        .nav-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: #fff;
            letter-spacing: -0.01em;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: color 0.2s;
        }
        .nav-links a:hover { color: var(--mint); }

        .nav-ctas {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .btn-ghost {
            padding: 0.5rem 1.25rem;
            border: 1.5px solid rgba(255,255,255,0.3);
            border-radius: 30px;
            color: rgba(255,255,255,0.88);
            font-size: 0.8125rem;
            font-weight: 600;
            font-family: 'Outfit', sans-serif;
            background: transparent;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s;
        }
        .btn-ghost:hover {
            border-color: rgba(255,255,255,0.6);
            background: rgba(255,255,255,0.08);
            color: #fff;
        }

        .btn-solid {
            padding: 0.5rem 1.4rem;
            background: var(--sage);
            border: none;
            border-radius: 30px;
            color: #fff;
            font-size: 0.8125rem;
            font-weight: 700;
            font-family: 'Outfit', sans-serif;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s;
            box-shadow: 0 4px 14px rgba(74,140,104,0.4);
        }
        .btn-solid:hover {
            background: var(--mint);
            box-shadow: 0 6px 20px rgba(109,189,142,0.45);
        }

        /* ══════════════════════════════
           HERO
        ══════════════════════════════ */
        .hero {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 5rem 2rem 4rem;
            max-width: 820px;
            margin: 0 auto;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: rgba(74,140,104,0.18);
            border: 1px solid rgba(109,189,142,0.35);
            border-radius: 30px;
            padding: 6px 16px;
            font-size: 0.72rem;
            font-weight: 700;
            color: var(--mint);
            letter-spacing: 0.1em;
            text-transform: uppercase;
            margin-bottom: 1.75rem;
            animation: fadeUp 0.6s ease both;
        }
        .hero-badge-dot {
            width: 6px; height: 6px;
            background: var(--mint);
            border-radius: 50%;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.6rem, 6vw, 4.2rem);
            font-weight: 900;
            color: #fff;
            line-height: 1.08;
            letter-spacing: -0.02em;
            margin-bottom: 1.5rem;
            animation: fadeUp 0.7s 0.1s ease both;
        }

        .hero-title em {
            font-style: italic;
            color: var(--mint);
        }

        .hero-subtitle {
            font-size: 1.0625rem;
            font-weight: 400;
            color: rgba(255,255,255,0.65);
            line-height: 1.7;
            max-width: 560px;
            margin: 0 auto 2.5rem;
            animation: fadeUp 0.7s 0.2s ease both;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeUp 0.7s 0.3s ease both;
        }

        .btn-hero-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 0.875rem 2rem;
            background: var(--sage);
            color: #fff;
            font-size: 0.9375rem;
            font-weight: 700;
            font-family: 'Outfit', sans-serif;
            border: none;
            border-radius: 14px;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 8px 28px rgba(74,140,104,0.45);
            transition: all 0.22s;
        }
        .btn-hero-primary:hover {
            background: var(--mint);
            transform: translateY(-2px);
            box-shadow: 0 12px 36px rgba(109,189,142,0.5);
        }
        .btn-hero-primary svg { width: 18px; height: 18px; }

        .btn-hero-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 0.875rem 2rem;
            background: rgba(255,255,255,0.08);
            border: 1.5px solid rgba(255,255,255,0.25);
            color: rgba(255,255,255,0.88);
            font-size: 0.9375rem;
            font-weight: 600;
            font-family: 'Outfit', sans-serif;
            border-radius: 14px;
            cursor: pointer;
            text-decoration: none;
            backdrop-filter: blur(8px);
            transition: all 0.22s;
        }
        .btn-hero-secondary:hover {
            background: rgba(255,255,255,0.14);
            border-color: rgba(255,255,255,0.45);
            color: #fff;
        }
        .btn-hero-secondary svg { width: 18px; height: 18px; }

        /* stats strip */
        .hero-stats {
            display: flex;
            align-items: center;
            gap: 3rem;
            justify-content: center;
            margin-top: 3.5rem;
            animation: fadeUp 0.7s 0.4s ease both;
        }

        .stat-item { text-align: center; }
        .stat-num {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
            line-height: 1;
        }
        .stat-label {
            font-size: 0.72rem;
            font-weight: 500;
            color: rgba(255,255,255,0.5);
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-top: 4px;
        }
        .stat-divider {
            width: 1px;
            height: 40px;
            background: rgba(255,255,255,0.12);
        }

        /* ══════════════════════════════
           FEATURES SECTION
        ══════════════════════════════ */
        .features-section {
            padding: 5rem 4rem;
            max-width: 1100px;
            margin: 0 auto;
            width: 100%;
        }

        .section-eyebrow {
            text-align: center;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--mint);
            margin-bottom: 0.875rem;
        }

        .section-title {
            text-align: center;
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.75rem, 3.5vw, 2.5rem);
            font-weight: 700;
            color: #fff;
            line-height: 1.2;
            margin-bottom: 0.875rem;
        }

        .section-sub {
            text-align: center;
            color: rgba(255,255,255,0.5);
            font-size: 0.9375rem;
            max-width: 520px;
            margin: 0 auto 3.5rem;
            line-height: 1.65;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.25rem;
        }

        .feat-card {
            background: rgba(255,255,255,0.055);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 20px;
            padding: 1.75rem 1.5rem;
            backdrop-filter: blur(12px);
            transition: background 0.25s, border-color 0.25s, transform 0.25s;
            cursor: default;
        }
        .feat-card:hover {
            background: rgba(255,255,255,0.09);
            border-color: rgba(109,189,142,0.3);
            transform: translateY(-4px);
        }

        .feat-icon {
            width: 48px; height: 48px;
            background: rgba(74,140,104,0.2);
            border: 1px solid rgba(109,189,142,0.25);
            border-radius: 13px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 1.125rem;
        }
        .feat-icon svg { width: 24px; height: 24px; color: var(--mint); }

        .feat-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.0625rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 0.5rem;
        }

        .feat-desc {
            font-size: 0.8125rem;
            color: rgba(255,255,255,0.52);
            line-height: 1.65;
        }

        /* large feature card */
        .feat-card.large {
            grid-column: span 2;
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .feat-card.large .feat-visual {
            flex-shrink: 0;
            width: 120px; height: 120px;
            background: rgba(74,140,104,0.15);
            border: 1px solid rgba(109,189,142,0.2);
            border-radius: 18px;
            display: flex; align-items: center; justify-content: center;
        }
        .feat-card.large .feat-visual svg { width: 56px; height: 56px; color: var(--sage); }

        /* ══════════════════════════════
           ROLES SECTION
        ══════════════════════════════ */
        .roles-section {
            padding: 4rem 4rem 5rem;
            max-width: 1100px;
            margin: 0 auto;
            width: 100%;
        }

        .roles-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            margin-top: 3rem;
        }

        .role-card {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.09);
            border-radius: 18px;
            padding: 1.5rem 1.25rem;
            text-align: center;
            backdrop-filter: blur(10px);
            transition: all 0.25s;
        }
        .role-card:hover {
            background: rgba(74,140,104,0.12);
            border-color: rgba(109,189,142,0.28);
            transform: translateY(-3px);
        }

        .role-avatar {
            width: 56px; height: 56px;
            border-radius: 50%;
            background: rgba(74,140,104,0.2);
            border: 1.5px solid rgba(109,189,142,0.25);
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1rem;
        }
        .role-avatar svg { width: 26px; height: 26px; color: var(--mint); }

        .role-name {
            font-family: 'Playfair Display', serif;
            font-size: 0.975rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 0.5rem;
        }

        .role-desc {
            font-size: 0.75rem;
            color: rgba(255,255,255,0.48);
            line-height: 1.6;
        }

        /* ══════════════════════════════
           CTA SECTION
        ══════════════════════════════ */
        .cta-section {
            margin: 0 4rem 5rem;
            background: rgba(74,140,104,0.12);
            border: 1px solid rgba(109,189,142,0.22);
            border-radius: 28px;
            padding: 4rem 3rem;
            text-align: center;
            backdrop-filter: blur(14px);
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: -80px; left: 50%;
            transform: translateX(-50%);
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(109,189,142,0.12) 0%, transparent 70%);
            pointer-events: none;
        }

        .cta-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.75rem, 3vw, 2.5rem);
            font-weight: 700;
            color: #fff;
            margin-bottom: 0.875rem;
        }

        .cta-sub {
            color: rgba(255,255,255,0.55);
            font-size: 0.9375rem;
            max-width: 460px;
            margin: 0 auto 2rem;
            line-height: 1.65;
        }

        .cta-btns {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        /* ══════════════════════════════
           FOOTER
        ══════════════════════════════ */
        footer {
            border-top: 1px solid rgba(255,255,255,0.08);
            padding: 1.5rem 4rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            backdrop-filter: blur(10px);
        }

        .footer-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: rgba(255,255,255,0.6);
        }

        .footer-copy {
            font-size: 0.75rem;
            color: rgba(255,255,255,0.3);
        }

        .footer-links {
            display: flex; gap: 1.5rem; list-style: none;
        }
        .footer-links a {
            font-size: 0.75rem;
            color: rgba(255,255,255,0.38);
            text-decoration: none;
            transition: color 0.2s;
        }
        .footer-links a:hover { color: var(--mint); }

        /* ══════════════════════════════
           ANIMATIONS
        ══════════════════════════════ */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(22px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* stagger children */
        .reveal-stagger > * {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 0.55s ease, transform 0.55s ease;
        }
        .reveal-stagger.visible > *:nth-child(1) { opacity:1; transform:none; transition-delay: 0s; }
        .reveal-stagger.visible > *:nth-child(2) { opacity:1; transform:none; transition-delay: 0.1s; }
        .reveal-stagger.visible > *:nth-child(3) { opacity:1; transform:none; transition-delay: 0.2s; }
        .reveal-stagger.visible > *:nth-child(4) { opacity:1; transform:none; transition-delay: 0.3s; }
        .reveal-stagger.visible > *:nth-child(5) { opacity:1; transform:none; transition-delay: 0.4s; }
        .reveal-stagger.visible > *:nth-child(6) { opacity:1; transform:none; transition-delay: 0.5s; }

        /* Decorative floating leaves */
        .deco-leaf {
            position: fixed;
            pointer-events: none;
            z-index: 1;
            opacity: 0.06;
        }
        .deco-leaf svg { color: #6dbd8e; }
        .deco-leaf-1 { top: 8%; left: 3%;  }
        .deco-leaf-1 svg { width: 120px; height: 120px; transform: rotate(-25deg); }
        .deco-leaf-2 { bottom: 15%; right: 4%; }
        .deco-leaf-2 svg { width: 90px; height: 90px; transform: rotate(40deg); }
        .deco-leaf-3 { top: 40%; left: 1%; }
        .deco-leaf-3 svg { width: 60px; height: 60px; transform: rotate(10deg); }
    </style>
</head>
<body>

<!-- Decorative leaves -->
<div class="deco-leaf deco-leaf-1">
    <svg fill="currentColor" viewBox="0 0 100 100"><path d="M50 10 C30 20 10 50 20 80 C35 60 60 50 80 60 C70 35 65 15 50 10Z"/></svg>
</div>
<div class="deco-leaf deco-leaf-2">
    <svg fill="currentColor" viewBox="0 0 100 100"><path d="M50 10 C30 20 10 50 20 80 C35 60 60 50 80 60 C70 35 65 15 50 10Z"/></svg>
</div>
<div class="deco-leaf deco-leaf-3">
    <svg fill="currentColor" viewBox="0 0 100 100"><path d="M50 10 C30 20 10 50 20 80 C35 60 60 50 80 60 C70 35 65 15 50 10Z"/></svg>
</div>

<div class="page-wrap">

    <!-- ═══════ NAV ═══════ -->
    <nav>
        <a href="#" class="nav-logo">
            <svg class="nav-logo-svg" viewBox="0 0 48 48" fill="none">
                <circle cx="24" cy="24" r="22" fill="rgba(255,255,255,0.1)" stroke="rgba(255,255,255,0.22)" stroke-width="1.5"/>
                <path d="M8 34 Q24 29 40 34" stroke="rgba(255,255,255,0.2)" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                <path d="M24 36 L24 18" stroke="#a8e6c0" stroke-width="2.8" stroke-linecap="round"/>
                <path d="M24 28 C19 24 13 22 11 16 C17 15 23 21 24 28Z" fill="#6dbd8e"/>
                <path d="M24 23 C29 19 36 17 38 11 C31 10 25 16 24 23Z" fill="#a8e6c0"/>
                <path d="M24 32 C28 30 32 28 33 24 C29 24 25 27 24 32Z" fill="#6dbd8e" opacity="0.7"/>
                <circle cx="24" cy="10" r="3.5" fill="#f7e96e" opacity="0.9"/>
                <line x1="24" y1="5" x2="24" y2="3.5" stroke="#f7e96e" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="28.5" y1="6" x2="29.5" y2="4.8" stroke="#f7e96e" stroke-width="1.5" stroke-linecap="round" opacity="0.75"/>
                <line x1="19.5" y1="6" x2="18.5" y2="4.8" stroke="#f7e96e" stroke-width="1.5" stroke-linecap="round" opacity="0.75"/>
            </svg>
            <span class="nav-brand">AgriNova</span>
        </a>

        <ul class="nav-links">
            <li><a href="#fonctionnalites">Fonctionnalités</a></li>
            <li><a href="#roles">Rôles</a></li>
            <li><a href="#about">À propos</a></li>
        </ul>

        <div class="nav-ctas">
            <a href="/login" class="btn-ghost">Se connecter</a>
            <a href="/register" class="btn-solid">S'inscrire</a>
        </div>
    </nav>

    <!-- ═══════ HERO ═══════ -->
    <section class="hero">
        <div class="hero-badge">
            <span class="hero-badge-dot"></span>
            Plateforme Agricole Professionnelle
        </div>

        <h1 class="hero-title">
            Gérez votre exploitation<br>avec <em>intelligence</em>
        </h1>

        <p class="hero-subtitle">
            AgriNova centralise la gestion de vos cultures, récoltes, stocks et équipements en une seule plateforme. Simple, fiable, conçu pour l'agriculteur moderne.
        </p>

        <div class="hero-actions">
            <a href="/register" class="btn-hero-primary">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                Commencer gratuitement
            </a>
            <a href="/login" class="btn-hero-secondary">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                Se connecter
            </a>
        </div>

        <div class="hero-stats">
            <div class="stat-item">
                <div class="stat-num">4</div>
                <div class="stat-label">Rôles utilisateurs</div>
            </div>
            <div class="stat-divider"></div>
            <div class="stat-item">
                <div class="stat-num">6+</div>
                <div class="stat-label">Modules de gestion</div>
            </div>
            <div class="stat-divider"></div>
            <div class="stat-item">
                <div class="stat-num">100%</div>
                <div class="stat-label">Traçabilité</div>
            </div>
            <div class="stat-divider"></div>
            <div class="stat-item">
                <div class="stat-num">MVC</div>
                <div class="stat-label">Architecture Laravel</div>
            </div>
        </div>
    </section>

    <!-- ═══════ FEATURES ═══════ -->
    <section class="features-section" id="fonctionnalites">
        <p class="section-eyebrow reveal">Fonctionnalités</p>
        <h2 class="section-title reveal">Tout ce dont votre exploitation a besoin</h2>
        <p class="section-sub reveal">Une solution complète pour digitaliser et optimiser chaque aspect de votre activité agricole.</p>

        <div class="features-grid reveal-stagger">

            <!-- Large card: Cultures -->
            <div class="feat-card large">
                <div class="feat-visual">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/>
                    </svg>
                </div>
                <div>
                    <p class="feat-title">Gestion des Cultures</p>
                    <p class="feat-desc">Suivez les cycles complets — semis, traitement, croissance, récolte. Gérez les parcelles, saisons et cultures avec une traçabilité totale du rendement et des pertes.</p>
                </div>
            </div>

            <!-- Stock -->
            <div class="feat-card">
                <div class="feat-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7m0 10l8-4"/></svg>
                </div>
                <p class="feat-title">Gestion des Stocks</p>
                <p class="feat-desc">Suivi en temps réel des produits récoltés, semences et engrais. Alertes automatiques pour stocks faibles ou périmés.</p>
            </div>

            <!-- Récoltes -->
            <div class="feat-card">
                <div class="feat-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                </div>
                <p class="feat-title">Planification Récoltes</p>
                <p class="feat-desc">Planifiez et suivez vos récoltes. Notifications pour récoltes à venir ou en retard. Filtrage par parcelle, culture ou saison.</p>
            </div>

            <!-- Équipements -->
            <div class="feat-card">
                <div class="feat-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <p class="feat-title">Équipements</p>
                <p class="feat-desc">Historique des machines et équipements agricoles. Suivi des coûts et allocation aux parcelles ou tâches.</p>
            </div>

            <!-- Personnel -->
            <div class="feat-card">
                <div class="feat-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <p class="feat-title">Personnel</p>
                <p class="feat-desc">Gestion des profils, attribution des tâches selon les cultures et parcelles. Accès sécurisé par rôle.</p>
            </div>

            <!-- Sécurité -->
            <div class="feat-card">
                <div class="feat-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <p class="feat-title">Accès Sécurisé</p>
                <p class="feat-desc">Contrôle d'accès par rôle. Interface adaptée pour chaque profil — Admin, Agriculteur, Ouvrier, Gestionnaire.</p>
            </div>

        </div>
    </section>

    <!-- ═══════ ROLES ═══════ -->
    <section class="roles-section" id="roles">
        <p class="section-eyebrow reveal">Rôles & Accès</p>
        <h2 class="section-title reveal">Une plateforme pour tous les acteurs</h2>
        <p class="section-sub reveal">Chaque utilisateur accède aux fonctionnalités adaptées à son rôle dans l'exploitation.</p>

        <div class="roles-grid reveal-stagger">

            <div class="role-card">
                <div class="role-avatar">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <p class="role-name">Administrateur</p>
                <p class="role-desc">Gestion globale, supervision complète, création des comptes et paramétrage du système.</p>
            </div>

            <div class="role-card">
                <div class="role-avatar">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064"/></svg>
                </div>
                <p class="role-name">Agriculteur</p>
                <p class="role-desc">Planification cultures et récoltes, gestion du personnel sur les parcelles, consultation des stocks.</p>
            </div>

            <div class="role-card">
                <div class="role-avatar">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
                <p class="role-name">Ouvrier</p>
                <p class="role-desc">Suivi des tâches assignées, mise à jour des informations sur les cultures, récoltes et traitements.</p>
            </div>

            <div class="role-card">
                <div class="role-avatar">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7"/></svg>
                </div>
                <p class="role-name">Gestionnaire Stock</p>
                <p class="role-desc">Suivi des entrées et sorties, inventaire des produits, notifications stocks faibles ou périmés.</p>
            </div>

        </div>
    </section>

    <!-- ═══════ CTA ═══════ -->
    <section class="cta-section reveal" id="about">
        <h2 class="cta-title">Prêt à digitaliser votre exploitation ?</h2>
        <p class="cta-sub">Rejoignez AgriNova et bénéficiez d'une gestion agricole centralisée, efficace et traçable dès aujourd'hui.</p>
        <div class="cta-btns">
            <a href="/register" class="btn-hero-primary">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                Créer un compte
            </a>
            <a href="/login" class="btn-hero-secondary">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                Déjà inscrit ? Se connecter
            </a>
        </div>
    </section>

    <!-- ═══════ FOOTER ═══════ -->
    <footer>
        <span class="footer-brand">AgriNova</span>
        <span class="footer-copy">© 2025 AgriNova — Gestion Agricole Intelligente</span>
        <ul class="footer-links">
            <li><a href="#">Conditions</a></li>
            <li><a href="#">Confidentialité</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </footer>

</div><!-- /page-wrap -->

<script>
    // Scroll reveal
    const revealEls = document.querySelectorAll('.reveal, .reveal-stagger');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('visible');
                observer.unobserve(e.target);
            }
        });
    }, { threshold: 0.12 });

    revealEls.forEach(el => observer.observe(el));
</script>
</body>
</html>