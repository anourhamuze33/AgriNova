<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AgriNova - Gestion des Stocks</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Outfit:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap"
    rel="stylesheet">
  <style>
    *,
    *::before,
    *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0
    }

    :root {
      --forest: #1b3a2d;
      --pine: #254d3a;
      --fern: #2e6b4f;
      --sage: #4a8c68;
      --mint: #6dbd8e;
      --dew: #b8dfc8;
      --fog: #e6f2eb;
      --parch: #f8f4ed;
      --muted: #5a6b55;
      --border: #c8dcc0;
      --text: #1a2318;
      --amber: #c98a12;
      --rust: #b84a1e;
      --blue: #2563eb;
      --white: #fff;
      --sidebar-w: 250px;
      --amber-bg: rgba(201, 138, 18, .1);
      --rust-bg: rgba(184, 74, 30, .08);
      --blue-bg: rgba(37, 99, 235, .08);
      --sage-bg: rgba(74, 140, 104, .1);
      --mint-bg: rgba(109, 189, 142, .14);
    }

    html,
    body {
      height: 100%
    }

    body {
      font-family: 'Outfit', sans-serif;
      background: var(--parch);
      color: var(--text);
      display: flex;
      min-height: 100vh
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
      overflow-y: auto
    }

    .sb-logo {
      background: linear-gradient(135deg, var(--forest) 0%, #2d6444 100%);
      padding: 1.375rem 1.25rem;
      display: flex;
      align-items: center;
      gap: 11px;
      text-decoration: none
    }

    .sb-brand {
      font-family: 'Playfair Display', serif;
      font-size: 1.25rem;
      font-weight: 700;
      color: #fff
    }

    .sb-tagline {
      font-size: .58rem;
      color: rgba(184, 223, 200, .72);
      letter-spacing: .1em;
      text-transform: uppercase;
      margin-top: 2px
    }

    .sb-sec {
      font-size: .58rem;
      font-weight: 700;
      letter-spacing: .14em;
      text-transform: uppercase;
      color: var(--muted);
      padding: .875rem 1.25rem .3rem;
      opacity: .7
    }

    .sb-nav {
      padding: .375rem .625rem;
      flex: 1
    }

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
      position: relative
    }

    .sb-link:hover {
      background: var(--fog);
      color: var(--fern)
    }

    .sb-link.active {
      background: var(--fog);
      color: var(--forest)
    }

    .sb-link.active::before {
      content: '';
      position: absolute;
      left: 0;
      top: 20%;
      height: 60%;
      width: 3px;
      background: var(--sage);
      border-radius: 0 3px 3px 0
    }

    .sb-link svg {
      width: 17px;
      height: 17px
    }

    /* ══════ SIDEBAR (identical to dashboard) ══════ */
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

    .sb-logo-area {
      background: linear-gradient(135deg, var(--forest) 0%, #2d6444 100%);
      padding: 1.375rem 1.25rem;
      display: flex;
      align-items: center;
      gap: 11px;
      text-decoration: none;
      flex-shrink: 0;
    }

    .sb-logo-svg {
      width: 40px;
      height: 40px;
      flex-shrink: 0;
    }

    .sb-brand {
      font-family: 'Playfair Display', serif;
      font-size: 1.3rem;
      font-weight: 700;
      color: #fff;
      letter-spacing: .01em;
      line-height: 1;
    }

    .sb-tagline {
      font-size: .6rem;
      color: rgba(184, 223, 200, .75);
      letter-spacing: .1em;
      text-transform: uppercase;
      margin-top: 3px;
    }

    .sb-section-label {
      font-size: .58rem;
      font-weight: 700;
      letter-spacing: .14em;
      text-transform: uppercase;
      color: var(--muted);
      padding: .875rem 1.25rem .3rem;
      opacity: .7;
    }

    .sb-nav {
      padding: .375rem .625rem;
      flex: 1;
    }

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

    .sb-link:hover {
      background: var(--fog);
      color: var(--fern);
    }

    .sb-link.active {
      background: var(--fog);
      color: var(--forest);
    }

    .sb-link.active::before {
      content: '';
      position: absolute;
      left: 0;
      top: 6px;
      bottom: 6px;
      width: 3px;
      border-radius: 0 3px 3px 0;
      background: var(--sage);
      margin-left: -.625rem;
    }

    .sb-link svg {
      width: 16px;
      height: 16px;
      flex-shrink: 0;
    }

    .sb-badge {
      margin-left: auto;
      font-size: .6rem;
      font-weight: 700;
      padding: 2px 7px;
      border-radius: 20px;
      background: var(--sage);
      color: #fff;
    }

    .sb-badge.red {
      background: var(--rust);
    }

    .sb-footer {
      border-top: 1.5px solid var(--border);
      padding: .875rem .625rem;
      flex-shrink: 0;
    }

    .sb-user {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: .625rem .875rem;
      border-radius: 10px;
      background: var(--fog);
      cursor: pointer;
      transition: background .18s;
    }

    .sb-user:hover {
      background: var(--dew);
    }

    .sb-avatar {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--fern), var(--mint));
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: .75rem;
      font-weight: 800;
      color: #fff;
      flex-shrink: 0;
    }

    .sb-uname {
      font-size: .8125rem;
      font-weight: 700;
      color: var(--forest);
    }

    .sb-urole {
      font-size: .65rem;
      color: var(--muted);
      margin-top: 1px;
    }

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
      cursor: pointer;
      text-decoration: none;
      transition: background .18s, color .18s;
    }

    .sb-logout:hover {
      background: rgba(184, 74, 30, .07);
      color: var(--rust);
    }

    .sb-logout svg {
      width: 14px;
      height: 14px;
    }

    /* ══════ MAIN ══════ */
    .main {
      flex: 1;
      min-width: 0;
      display: flex;
      flex-direction: column;
      background: var(--parch);
    }

    /* ── Topbar ── */
    .topbar {
      background: var(--white);
      border-bottom: 1.5px solid var(--border);
      height: 62px;
      padding: 0 2rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: sticky;
      top: 0;
      z-index: 100;
      flex-shrink: 0;
    }

    .tb-left {
      display: flex;
      flex-direction: column;
    }

    .tb-eyebrow {
      font-size: .62rem;
      color: var(--muted);
      font-weight: 500;
      letter-spacing: .06em;
      text-transform: uppercase;
    }

    .tb-title {
      font-family: 'Playfair Display', serif;
      font-size: 1.175rem;
      font-weight: 700;
      color: var(--forest);
      line-height: 1.1;
    }

    .tb-right {
      display: flex;
      align-items: center;
      gap: .875rem;
    }

    .tb-search {
      display: flex;
      align-items: center;
      gap: 8px;
      background: var(--fog);
      border: 1.5px solid var(--border);
      border-radius: 10px;
      padding: 6px 14px;
      font-size: .8125rem;
      font-family: 'Outfit', sans-serif;
      color: var(--text);
      outline: none;
      width: 200px;
      transition: border-color .2s, width .3s;
    }

    .tb-search:focus {
      border-color: var(--sage);
      background: var(--white);
      width: 240px;
    }

    .tb-search::placeholder {
      color: var(--muted);
    }

    .tb-search-wrap {
      position: relative;
      display: flex;
      align-items: center;
    }

    .tb-search-icon {
      position: absolute;
      left: 10px;
      width: 14px;
      height: 14px;
      color: var(--muted);
      pointer-events: none;
    }

    .tb-search {
      padding-left: 32px;
    }

    .btn-add {
      display: flex;
      align-items: center;
      gap: 7px;
      padding: .5rem 1.25rem;
      background: var(--forest);
      border: none;
      border-radius: 10px;
      color: #fff;
      font-size: .8125rem;
      font-weight: 700;
      font-family: 'Outfit', sans-serif;
      cursor: pointer;
      transition: background .2s;
      text-decoration: none;
    }

    .main {
      flex: 1;
      min-width: 0;
      display: flex;
      flex-direction: column
    }

    .hero {
      background: linear-gradient(140deg, var(--forest) 0%, #1a4232 55%, #243d2b 100%);
      padding: 2.2rem 2.5rem 0
    }

    .hero-top {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      gap: 1rem;
      margin-bottom: 1.6rem
    }

    .hero-eyebrow {
      font-size: .63rem;
      font-weight: 700;
      letter-spacing: .14em;
      text-transform: uppercase;
      color: rgba(184, 223, 200, .65);
      margin-bottom: .6rem
    }

    .hero-title {
      font-family: 'Playfair Display', serif;
      font-size: 2rem;
      font-weight: 700;
      color: #fff;
      line-height: 1.1
    }

    .hero-sub {
      font-size: .875rem;
      color: rgba(255, 255, 255, .45);
      margin-top: .5rem
    }

    .hero-kpis {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      border-top: 1px solid rgba(255, 255, 255, .09)
    }

    .hk {
      padding: 1rem 1.1rem;
      border-right: 1px solid rgba(255, 255, 255, .07)
    }

    .hk:last-child {
      border-right: none
    }

    .hk-n {
      font-family: 'Playfair Display', serif;
      font-size: 1.6rem;
      font-weight: 700;
      color: #fff;
      line-height: 1
    }

    .hk-l {
      font-size: .63rem;
      color: rgba(255, 255, 255, .45);
      margin-top: 4px
    }

    .body {
      padding: 1.5rem 2.5rem 2.5rem;
      display: flex;
      flex-direction: column;
      gap: 1rem;
      overflow: auto
    }

    .alerts {
      display: flex;
      flex-direction: column;
      gap: .5rem
    }

    .al {
      display: flex;
      align-items: flex-start;
      gap: .75rem;
      padding: .75rem 1rem;
      border-radius: 12px;
      border: 1.5px solid transparent;
      background: var(--white)
    }

    .al.late {
      border-color: rgba(184, 74, 30, .18);
      background: rgba(184, 74, 30, .06)
    }

    .al.warn {
      border-color: rgba(201, 138, 18, .2);
      background: rgba(201, 138, 18, .07)
    }

    .al.good {
      border-color: rgba(74, 140, 104, .18);
      background: rgba(74, 140, 104, .07)
    }

    .al-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      margin-top: 5px;
      flex-shrink: 0
    }

    .late .al-dot {
      background: var(--rust)
    }

    .warn .al-dot {
      background: var(--amber)
    }

    .good .al-dot {
      background: var(--sage)
    }

    .al-title {
      font-size: .82rem;
      font-weight: 700
    }

    .al-sub {
      font-size: .72rem;
      color: var(--muted);
      margin-top: 2px
    }

    .tcard {
      background: var(--white);
      border: 1.5px solid var(--border);
      border-radius: 18px;
    }

    .thead,
    .trow {
      display: grid;
      grid-template-columns: minmax(0, 2.2fr) 1.1fr 1fr 1fr 1.2fr 1fr 1fr;
      align-items: center
    }

    .thead {
      padding: .7rem 1.1rem;
      background: var(--fog);
      border-bottom: 1.5px solid var(--border)
    }

    .th {
      font-size: .61rem;
      font-weight: 800;
      letter-spacing: .09em;
      text-transform: uppercase;
      color: var(--muted)
    }

    .trow {
      padding: .85rem 1.1rem;
      border-bottom: 1px solid var(--border)
    }

    .trow:last-child {
      border-bottom: none
    }

    .ccrop {
      display: flex;
      align-items: center;
      gap: .75rem;
      min-width: 0
    }

    .cthumb {
      width: 42px;
      height: 42px;
      border-radius: 9px;
      overflow: hidden;
      border: 1.5px solid var(--border)
    }

    .cthumb img {
      width: 100%;
      height: 100%;
      object-fit: cover
    }

    .cn {
      font-family: 'Playfair Display', serif;
      font-size: .9rem;
      font-weight: 700;
      color: var(--forest);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis
    }

    .cm {
      font-size: .63rem;
      color: var(--muted);
      margin-top: 2px
    }

    .cval {
      font-size: .8rem;
      font-weight: 600
    }

    .csub {
      font-size: .63rem;
      color: var(--muted);
      margin-top: 2px
    }

    .sbadge {
      display: inline-flex;
      align-items: center;
      gap: 4px;
      font-size: .6rem;
      font-weight: 800;
      letter-spacing: .04em;
      text-transform: uppercase;
      padding: 4px 10px;
      border-radius: 20px;
      white-space: nowrap
    }

    .sbadge::before {
      content: '';
      width: 5px;
      height: 5px;
      border-radius: 50%
    }

    .s-l {
      background: rgba(184, 74, 30, .1);
      color: var(--rust)
    }

    .s-l::before {
      background: var(--rust)
    }

    .s-s {
      background: var(--amber-bg);
      color: var(--amber)
    }

    .s-s::before {
      background: var(--amber)
    }

    .s-d {
      background: var(--sage-bg);
      color: var(--sage)
    }

    .s-d::before {
      background: var(--sage)
    }

    .s-p {
      background: var(--mint-bg);
      color: #28855a
    }

    .s-p::before {
      background: var(--mint)
    }

    .s-pl {
      background: var(--blue-bg);
      color: var(--blue)
    }

    .s-pl::before {
      background: var(--blue)
    }

    .dtag {
      display: inline-flex;
      font-size: .6rem;
      font-weight: 700;
      padding: 2px 7px;
      border-radius: 20px;
      margin-top: 3px
    }


    .dt-l {
      background: rgba(184, 74, 30, .1);
      color: var(--rust)
    }

    .dt-s {
      background: rgba(201, 138, 18, .1);
      color: var(--amber)
    }

    .dt-o {
      background: rgba(74, 140, 104, .1);
      color: var(--sage)
    }

    .dt-f {
      background: var(--fog);
      color: var(--muted)
    }

    .empty {
      padding: 2rem 1rem;
      text-align: center;
      color: var(--muted);
      font-size: .85rem
    }

    @media (max-width:1200px) {
      .sidebar {
        display: none
      }

      .hero,
      .body {
        padding-left: 1.2rem;
        padding-right: 1.2rem
      }

      .hero-kpis {
        grid-template-columns: repeat(2, 1fr)
      }

      .thead,
      .trow {
        grid-template-columns: minmax(0, 2fr) 1fr 1fr 1fr
      }

      .thead .th:nth-child(n+5),
      .trow> :nth-child(n+5) {
        display: none
      }
      
    }
  </style>
</head>

<body>
  <aside class="sidebar">
    <a href="{{ route('dashboard') }}" class="sb-logo-area">
      <svg class="sb-logo-svg" viewBox="0 0 48 48" fill="none">
        <circle cx="24" cy="24" r="22" fill="rgba(255,255,255,0.1)" stroke="rgba(255,255,255,0.22)"
          stroke-width="1.5" />
        <path d="M8 36 Q24 30 40 36" stroke="rgba(255,255,255,0.18)" stroke-width="1.5" fill="none"
          stroke-linecap="round" />
        <path d="M24 38 L24 18" stroke="#a8e6c0" stroke-width="2.8" stroke-linecap="round" />
        <path d="M24 29 C19 25 13 23 11 17 C17 16 23 22 24 29Z" fill="#6dbd8e" />
        <path d="M24 24 C29 20 36 18 38 12 C31 11 25 17 24 24Z" fill="#a8e6c0" />
        <path d="M24 33 C28 31 32 29 33 25 C29 25 25 28 24 33Z" fill="#6dbd8e" opacity=".7" />
        <circle cx="24" cy="11" r="3.2" fill="#f7e96e" opacity=".9" />
        <line x1="24" y1="6.5" x2="24" y2="5" stroke="#f7e96e" stroke-width="1.4" stroke-linecap="round" />
        <line x1="28" y1="7.5" x2="29" y2="6.3" stroke="#f7e96e" stroke-width="1.3" stroke-linecap="round"
          opacity=".72" />
        <line x1="20" y1="7.5" x2="19" y2="6.3" stroke="#f7e96e" stroke-width="1.3" stroke-linecap="round"
          opacity=".72" />
      </svg>
      <div>
        <div class="sb-brand">AgriNova</div>
        <div class="sb-tagline">Gestion agricole</div>
      </div>
    </a>

    <div class="sb-nav">
      <div class="sb-section-label">Principal</div>
      <a href="{{ route('dashboard') }}" class="sb-link">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        Dashboard
      </a>
      <a href="{{ route('cultures.index') }}" class="sb-link">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064" />
        </svg>
        Cultures
        <span class="sb-badge">12</span>
      </a>
      <a href="{{ route('stocks.index') }}" class="sb-link active">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
        </svg>
        Récoltes
      </a>
      <a href="{{ route('fields.index') }}" class="sb-link">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7" />
        </svg>
        Stocks
        <span class="sb-badge red">3</span>
      </a>
      <a href="{{ route('equipments.index') }}" class="sb-link">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        Parcelles
      </a>
      <div class="sb-section-label">Gestion</div>
      <a href="{{ route('profile.show') }}" class="sb-link">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        Personnel
      </a>
      <a href="#" class="sb-link">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        Équipements
      </a>
      <a href="#" class="sb-link">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
        </svg>
        Rapports
      </a>
      <div class="sb-section-label">Compte</div>
      <a href="#" class="sb-link">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
        </svg>
        Paramètres
      </a>
    </div>

    <div class="sb-footer">
      <a href="{{ route('profile.show') }}" class="sb-user">
        <div class="sb-avatar">MA</div>
        <div>
          <div class="sb-uname">Mohamed Alami</div>
          <div class="sb-urole">Agriculteur</div>
        </div>
      </a>
      <a href="{{ route('logout') }}" class="sb-logout">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
        </svg>
        Déconnexion
      </a>
    </div>
  </aside>


  <main class="main">
    <section class="hero">
      <div class="hero-top">
        <div>
          <div class="hero-eyebrow">Exploitation agricole - {{ $today->format('Y') }}</div>
          <h1 class="hero-title">Gestion des Stocks</h1>
          <p class="hero-sub">Suivi des lots recoltes, statut de traitement et alertes de retard</p>
        </div>
      </div>
      <div class="hero-kpis">
        <div class="hk">
          <div class="hk-n">{{ $stats['total_lots'] }}</div>
          <div class="hk-l">Lots suivis</div>
        </div>
        <div class="hk">
          <div class="hk-n">{{ $stats['in_stock'] }}</div>
          <div class="hk-l">Lots en stock</div>
        </div>
        <div class="hk">
          <div class="hk-n">{{ $stats['to_harvest'] }}</div>
          <div class="hk-l">A recolter</div>
        </div>
        <div class="hk">
          <div class="hk-n">{{ $stats['late'] }}</div>
          <div class="hk-l">Retards</div>
        </div>
        <div class="hk">
          <div class="hk-n">{{ $stats['active_fields'] }}</div>
          <div class="hk-l">Parcelles actives</div>
        </div>
      </div>
    </section>

    <section class="body">
      @if(count($alerts))
      <div class="alerts">
        @foreach($alerts as $alert)
        <div class="al {{ $alert['type'] }}">
          <div class="al-dot"></div>
          <div>
            <div class="al-title">{{ $alert['title'] }}</div>
            <div class="al-sub">{{ $alert['description'] }}</div>
          </div>
        </div>
        @endforeach
      </div>
      @endif

      <div class="tcard">
        <div class="thead">
          <div class="th">Culture</div>
          <div class="th">Parcelle</div>
          <div class="th">Date recolte</div>
          <div class="th">Cycle</div>
          <div class="th">Echeance</div>
          <div class="th">Responsable</div>
          <div class="th">Statut</div>
        </div>

        @forelse($lots as $lot)
        <div class="trow">

          <div class="ccrop">
            <div class="cthumb">
              <img src="{{ $lot['image'] }}">
            </div>
            <div>
              <div class="cn">{{ $lot['culture_name'] }}</div>
              <div class="cm">{{ $lot['culture_type'] }}</div>
            </div>
          </div>

          <div class="cval">{{ $lot['field_name'] }}</div>

          <div>
            <div class="cval">{{ $lot['harvest_date']->format('d M Y') }}</div>
            <span class="dtag {{ $lot['date_badge_class'] }}">
              {{ $lot['date_badge'] }}
            </span>
          </div>

          <div class="cval">{{ ucfirst($lot['cycle']) }}</div>

          <div>
            @if($lot['days_to_harvest'] < 0) <div class="cval">{{ abs($lot['days_to_harvest']) }} j de retard</div>
          @else
          <div class="cval">{{ $lot['days_to_harvest'] }} j restants</div>
          @endif
        </div>

        <!-- ✅ MUST BE INSIDE -->
        <div>
          <div class="cval">{{ $lot['manager'] }}</div>
          <div class="csub">Gestionnaire</div>
        </div>

        <!-- ✅ MUST BE INSIDE -->
        <div>
          <span class="sbadge {{ $lot['status_class'] }}">
            {{ $lot['status_label'] }}
          </span>
        </div>

      </div>
      @empty
      <div class="empty">Aucun lot disponible pour le moment.</div>
      @endforelse
      </div>
      {{ $lots->links('pagination.custom') }}
    </section>
  </main>
</body>

</html>
