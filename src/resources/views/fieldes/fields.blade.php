<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AgriNova — Cultures</title>
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
      --cream: #fdfbf7;
      --muted: #5a6b55;
      --border: #c8dcc0;
      --text: #1a2318;
      --amber: #c98a12;
      --rust: #b84a1e;
      --blue: #3b6fd4;
      --teal: #1a8a7a;
      --white: #ffffff;
      --sidebar-w: 250px;
    }

    html,
    body {
      height: 100%;
    }

    body {
      font-family: 'Outfit', sans-serif;
      background: var(--parch);
      color: var(--text);
      display: flex;
      min-height: 100vh;
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

    .btn-add:hover {
      background: var(--fern);
    }

    .btn-add svg {
      width: 14px;
      height: 14px;
    }

    .tb-notif {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: var(--fog);
      border: 1.5px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      position: relative;
      transition: background .18s;
    }

    .tb-notif:hover {
      background: var(--dew);
    }

    .tb-notif svg {
      width: 16px;
      height: 16px;
      color: var(--fern);
    }

    .notif-dot {
      position: absolute;
      top: 7px;
      right: 7px;
      width: 7px;
      height: 7px;
      background: var(--amber);
      border-radius: 50%;
      border: 2px solid var(--white);
    }

    /* ══════ CONTENT ══════ */
    .content {
      padding: 1.75rem 2rem 3rem;
      overflow-y: auto;
      flex: 1;
    }

    /* ── Page header ── */
    .page-hdr {
      display: flex;
      align-items: flex-end;
      justify-content: space-between;
      margin-bottom: 1.75rem;
      padding-bottom: 1.5rem;
      border-bottom: 1.5px solid var(--border);
    }

    .ph-left {}

    .ph-eyebrow {
      font-size: .65rem;
      color: var(--sage);
      font-weight: 700;
      letter-spacing: .12em;
      text-transform: uppercase;
      margin-bottom: .4rem;
      display: flex;
      align-items: center;
      gap: 7px;
    }

    .ph-eyebrow::before {
      content: '';
      width: 18px;
      height: 1.5px;
      background: var(--sage);
    }

    .ph-title {
      font-family: 'Playfair Display', serif;
      font-size: 2rem;
      font-weight: 700;
      color: var(--forest);
      line-height: 1.05;
      letter-spacing: -.02em;
    }

    .ph-sub {
      font-size: .78rem;
      color: var(--muted);
      margin-top: .375rem;
    }

    /* filter chips */
    .filter-row {
      display: flex;
      align-items: center;
      gap: .5rem;
      flex-wrap: wrap;
    }

    .filter-chip {
      display: flex;
      align-items: center;
      gap: 5px;
      padding: 5px 14px;
      border-radius: 20px;
      border: 1.5px solid var(--border);
      background: var(--white);
      font-size: .75rem;
      font-weight: 600;
      color: var(--muted);
      cursor: pointer;
      transition: all .18s;
      white-space: nowrap;
    }

    .filter-chip:hover {
      border-color: var(--dew);
      background: var(--fog);
      color: var(--fern);
    }

    .filter-chip.active {
      background: var(--forest);
      border-color: var(--forest);
      color: #fff;
    }

    .filter-chip svg {
      width: 12px;
      height: 12px;
    }

    /* ══════════════════════════════════
   PARCELLE SECTIONS
══════════════════════════════════ */
    .parcelle-section {
      margin-bottom: 3rem;
    }

    /* Section header — full-width strip with photo bg */
    .ps-header {
      position: relative;
      border-radius: 18px;
      overflow: hidden;
      height: 110px;
      margin-bottom: 1.25rem;
      display: flex;
      align-items: flex-end;
      cursor: pointer;
    }

    .ps-header-img {
      position: absolute;
      inset: 0;
      background-size: cover;
      background-position: center;
    }

    .ps-header-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(90deg, rgba(10, 24, 14, .82) 0%, rgba(10, 24, 14, .45) 60%, rgba(10, 24, 14, .1) 100%);
    }

    .ps-header-content {
      position: relative;
      z-index: 2;
      padding: 1.25rem 1.625rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 100%;
    }

    .ps-header-left {
      display: flex;
      align-items: center;
      gap: 1.125rem;
    }

    .ps-num {
      font-family: 'Playfair Display', serif;
      font-size: 2.5rem;
      font-weight: 700;
      color: rgba(255, 255, 255, .18);
      line-height: 1;
      letter-spacing: -.04em;
      min-width: 3rem;
    }

    .ps-name {
      font-family: 'Playfair Display', serif;
      font-size: 1.3rem;
      font-weight: 700;
      color: #fff;
      line-height: 1.1;
    }

    .ps-meta {
      font-size: .72rem;
      color: rgba(255, 255, 255, .5);
      margin-top: 3px;
      letter-spacing: .04em;
    }

    .ps-header-right {
      display: flex;
      align-items: center;
      gap: 1.5rem;
    }

    .ps-stat {
      text-align: right;
    }

    .ps-stat-num {
      font-family: 'Playfair Display', serif;
      font-size: 1.3rem;
      font-weight: 700;
      color: #fff;
      line-height: 1;
    }

    .ps-stat-lbl {
      font-size: .58rem;
      color: rgba(255, 255, 255, .42);
      text-transform: uppercase;
      letter-spacing: .08em;
      margin-top: 2px;
    }

    .ps-stat-sep {
      width: 1px;
      height: 30px;
      background: rgba(255, 255, 255, .12);
      align-self: center;
    }

    /* ── Culture cards grid inside each parcelle ── */
    .culture-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1rem;
    }

    /* ── Culture card — tall editorial style ── */
    .culture-card {
      border-radius: 16px;
      overflow: hidden;
      background: var(--white);
      border: 1.5px solid var(--border);
      display: flex;
      flex-direction: column;
      transition: box-shadow .22s, transform .22s;
      cursor: pointer;
    }

    .culture-card:hover {
      box-shadow: 0 12px 36px rgba(27, 58, 45, .13);
      transform: translateY(-4px);
    }

    /* Photo area — tall */
    .cc-photo {
      height: 160px;
      position: relative;
      overflow: hidden;
      flex-shrink: 0;
    }

    .cc-photo img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      transition: transform .45s ease;
    }

    .culture-card:hover .cc-photo img {
      transform: scale(1.06);
    }

    /* gradient overlay at bottom of photo */
    .cc-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(10, 22, 10, .82) 0%, rgba(10, 22, 10, .2) 45%, transparent 100%);
    }

    /* cycle badge — top left over photo */
    .cc-cycle {
      position: absolute;
      top: 10px;
      left: 10px;
      display: flex;
      align-items: center;
      gap: 5px;
      border-radius: 20px;
      padding: 4px 10px;
      font-size: .62rem;
      font-weight: 700;
      letter-spacing: .08em;
      text-transform: uppercase;
    }

    .cc-cycle svg {
      width: 10px;
      height: 10px;
    }

    .cy-harvest {
      background: rgba(201, 138, 18, .9);
      color: #fff;
    }

    .cy-growth {
      background: rgba(46, 107, 79, .9);
      color: #fff;
    }

    .cy-treat {
      background: rgba(184, 74, 30, .9);
      color: #fff;
    }

    .cy-plant {
      background: rgba(59, 111, 212, .9);
      color: #fff;
    }

    /* rendement on photo */
    .cc-yield {
      position: absolute;
      top: 10px;
      right: 10px;
      background: rgba(255, 255, 255, .92);
      border-radius: 10px;
      padding: 4px 9px;
      text-align: center;
    }

    .cc-yield-num {
      font-family: 'Playfair Display', serif;
      font-size: .95rem;
      font-weight: 700;
      color: var(--forest);
      line-height: 1;
    }

    .cc-yield-lbl {
      font-size: .52rem;
      color: var(--muted);
      letter-spacing: .06em;
      text-transform: uppercase;
    }

    /* bottom of photo — crop name over photo */
    .cc-photo-footer {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: .875rem 1rem .75rem;
    }

    .cc-crop-name {
      font-family: 'Playfair Display', serif;
      font-size: 1.125rem;
      font-weight: 700;
      color: #fff;
      line-height: 1.1;
    }

    .cc-season {
      font-size: .65rem;
      color: rgba(255, 255, 255, .55);
      margin-top: 2px;
      letter-spacing: .04em;
    }

    /* ── Body below photo ── */
    .cc-body {
      padding: .875rem 1rem 1rem;
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: .75rem;
    }

    /* cycle progress track */
    .cc-progress {
      display: flex;
      flex-direction: column;
      gap: 5px;
    }

    .cc-prog-steps {
      display: flex;
      align-items: center;
      gap: 3px;
    }

    .cc-step {
      flex: 1;
      height: 5px;
      border-radius: 4px;
      background: var(--fog);
      transition: background .2s;
    }

    .cc-step.done {
      background: var(--sage);
    }

    .cc-step.current {
      background: var(--mint);
    }

    .cc-prog-labels {
      display: flex;
      justify-content: space-between;
      font-size: .58rem;
      color: var(--muted);
      font-family: 'DM Mono', monospace;
      letter-spacing: .05em;
    }

    /* meta row */
    .cc-meta-row {
      display: flex;
      align-items: center;
      gap: .5rem;
      flex-wrap: wrap;
    }

    .cc-meta-chip {
      display: flex;
      align-items: center;
      gap: 4px;
      padding: 3px 9px;
      border-radius: 20px;
      background: var(--fog);
      font-size: .65rem;
      font-weight: 600;
      color: var(--muted);
    }

    .cc-meta-chip svg {
      width: 11px;
      height: 11px;
      color: var(--sage);
    }

    /* dates row */
    .cc-dates {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: .5rem;
      padding-top: .625rem;
      border-top: 1px solid var(--border);
    }

    .cc-date-item {}

    .cc-date-label {
      font-size: .6rem;
      color: var(--muted);
      text-transform: uppercase;
      letter-spacing: .08em;
      margin-bottom: 2px;
    }

    .cc-date-val {
      font-family: 'DM Mono', monospace;
      font-size: .75rem;
      font-weight: 600;
      color: var(--text);
    }

    /* card footer actions */
    .cc-footer {
      padding: .625rem 1rem .875rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-top: 1.5px solid var(--border);
      flex-shrink: 0;
    }

    .cc-action-btn {
      display: flex;
      align-items: center;
      gap: 5px;
      padding: 5px 12px;
      border-radius: 8px;
      font-size: .72rem;
      font-weight: 700;
      font-family: 'Outfit', sans-serif;
      border: 1.5px solid var(--border);
      background: transparent;
      color: var(--muted);
      cursor: pointer;
      transition: all .18s;
      text-decoration: none;
    }

    .cc-action-btn:hover {
      background: var(--fog);
      color: var(--fern);
      border-color: var(--dew);
    }

    .cc-action-btn svg {
      width: 12px;
      height: 12px;
    }

    .cc-action-primary {
      background: var(--forest);
      border-color: var(--forest);
      color: #fff;
    }

    .cc-action-primary:hover {
      background: var(--fern);
      border-color: var(--fern);
    }

    /* ── EMPTY STATE card (add new) ── */
    .culture-card-add {
      border-radius: 16px;
      border: 2px dashed var(--dew);
      background: rgba(230, 242, 235, .35);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: .75rem;
      min-height: 320px;
      cursor: pointer;
      transition: background .2s, border-color .2s;
      text-decoration: none;
    }

    .culture-card-add:hover {
      background: var(--fog);
      border-color: var(--sage);
    }

    .cca-icon {
      width: 52px;
      height: 52px;
      border-radius: 50%;
      background: var(--white);
      border: 1.5px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .cca-icon svg {
      width: 22px;
      height: 22px;
      color: var(--sage);
    }

    .cca-label {
      font-size: .8125rem;
      font-weight: 700;
      color: var(--muted);
    }

    /* ── Summary chips row (below each parcelle) ── */
    .ps-summary {
      display: flex;
      align-items: center;
      gap: .5rem;
      margin-top: .875rem;
      flex-wrap: wrap;
    }

    .ps-sum-chip {
      display: flex;
      align-items: center;
      gap: 5px;
      padding: 4px 12px;
      border-radius: 20px;
      border: 1.5px solid var(--border);
      background: var(--white);
      font-size: .72rem;
      font-weight: 600;
      color: var(--muted);
    }

    .ps-sum-dot {
      width: 7px;
      height: 7px;
      border-radius: 50%;
    }

    .dot-harvest {
      background: var(--amber);
    }

    .dot-growth {
      background: var(--sage);
    }

    .dot-treat {
      background: var(--rust);
    }

    .dot-plant {
      background: var(--blue);
    }

    /* scrollbar */
    ::-webkit-scrollbar {
      width: 5px;
    }

    ::-webkit-scrollbar-track {
      background: transparent;
    }

    ::-webkit-scrollbar-thumb {
      background: var(--dew);
      border-radius: 4px;
    }
  </style>
</head>

<body>

  <!-- ══════ SIDEBAR ══════ -->
  <aside class="sidebar">
    <a href="/dashboard" class="sb-logo-area">
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
      <a href="#" class="sb-link">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        Dashboard
      </a>
      <a href="#" class="sb-link active">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064" />
        </svg>
        Cultures
        <span class="sb-badge">12</span>
      </a>
      <a href="#" class="sb-link">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
        </svg>
        Récoltes
      </a>
      <a href="#" class="sb-link">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7" />
        </svg>
        Stocks
        <span class="sb-badge red">3</span>
      </a>
      <a href="#" class="sb-link">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        Parcelles
      </a>
      <div class="sb-section-label">Gestion</div>
      <a href="#" class="sb-link">
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
      <div class="sb-user">
        <div class="sb-avatar">MA</div>
        <div>
          <div class="sb-uname">Mohamed Alami</div>
          <div class="sb-urole">Agriculteur</div>
        </div>
      </div>
      <a href="/logout" class="sb-logout">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
        </svg>
        Déconnexion
      </a>
    </div>
  </aside>

  <!-- ══════ MAIN ══════ -->
  <div class="main">
    <div class="topbar">
      <div class="tb-left">
        <span class="tb-eyebrow">Gestion des cultures</span>
        <span class="tb-title">Mes Cultures</span>
      </div>
      <div class="tb-right">
        <a href="{{route('fields.create')}}" class="btn-add">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          Ajouter un Field
        </a>
      </div>
    </div>

      @foreach($fields as $field)
      <div class="parcelle-section">
        <div class="ps-header">
          <div class="ps-header-img" style="background-image:url('../assets/parcelles.jpg')"></div>
          <div class="ps-header-overlay"></div>
          <div class="ps-header-content">
            <div class="ps-header-left">
              <div class="ps-num">{{strtoupper(str($field->name)->substr(0,1))}}</div>
              <div>
                <div class="ps-name">Parcelle {{strtoupper(str($field->name)->substr(0,1))}} — {{$field->name}}</div>
                <div class="ps-meta">{{$field->size}} hectares · Zone maraîchère · Irrigation goutte-à-goutte</div>
              </div>
            </div>
            <div class="ps-header-right">
              <div class="ps-stat">
                <div class="ps-stat-num">{{$field->cultures->count()}}</div>
                <div class="ps-stat-lbl">Cultures</div>
              </div>
              <div class="ps-stat-sep"></div>
              <div class="ps-stat-sep"></div>
              <div class="ps-stat">
                <div class="ps-stat-num">{{$field->cultures->sum('quantite_prevu')}}t</div>
                <div class="ps-stat-lbl">Rendement</div>
              </div>
            </div>
          </div>
        </div>

        <div class="culture-grid">

          <!-- Culture card: Tomates -->
          @foreach($field->cultures as $culture)

          <div class="culture-card">
            <div class="cc-photo">
              <img src="{{ $culture->typeCulture->imgUrl ? asset('storage/Cultures/' . $culture->typeCulture->imgUrl) :  asset('assets/unknowing.png')}}" alt="{{ $culture->typeCulture->name }}">
              <div class="cc-overlay"></div>
              <div class="cc-cycle cy-harvest">
                {{$culture->cycle}}
              </div>
              <div class="cc-yield">
                <div class="cc-yield-num">{{$culture->quantite_prevu}}t</div>
                <div class="cc-yield-lbl">Prévu</div>
              </div>
              <div class="cc-photo-footer">
                <div class="cc-crop-name">{{$culture->typeCulture->name}}</div>
                <div class="cc-season">{{ucfirst($culture->season)}} {{$culture->harvest_date->format('Y')}} · Parcelle
                  {{strtoupper(str($field->name)->substr(0,1))}} — {{$field->name}}</div>
              </div>
            </div>
            <div class="cc-body">
              <div class="cc-progress">
                <div class="cc-prog-steps">
                  @php
                  $steps = ['planting', 'growth', 'treatment', 'harvest', 'done'];
                  $currentIndex = array_search($culture->cycle, $steps);
                  @endphp
                  @foreach($steps as $index => $step)
                  <div class="cc-step @if($index < $currentIndex) done
                                      @elseif($index === $currentIndex && $index!=4) current 
                                      @elseif($currentIndex === 4) done
                                      @endif
                              "></div>
                  @endforeach
                </div>
                <div class="cc-prog-labels">
                  <span>Semis</span><span>Trait.</span><span>Crois.</span><span>Récolte</span><span>Done</span>
                </div>
              </div>
              <div class="cc-meta-row">
                <div class="cc-meta-chip"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7" />
                  </svg>{{$culture->user->name}}</div>
              </div>
              <div class="cc-dates">
                <div class="cc-date-item">
                  <div class="cc-date-label">Semis</div>
                  <div class="cc-date-val">{{$culture->planting_date->format('d M Y')}}</div>
                </div>
                <div class="cc-date-item">
                  <div class="cc-date-label">Récolte prévue</div>
                  <div class="cc-date-val">{{$culture->harvest_date->format('d M Y')}}</div>
                </div>
              </div>
            </div>
            <div class="cc-footer">
              <a href="{{route('cultures.show', $culture->id)}}" class="cc-action-btn"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>Détails</a>
              <a href="{{ route('cultures.edit', $culture->id) }}" class="cc-action-btn cc-action-primary"><svg fill="none" stroke="currentColor"
                  viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>Modifier</a>
            </div>
          </div>
          @endforeach
          <!-- Add card -->
          <a href="{{route('cultures.create')}}" class="culture-card-add">
            <div class="cca-icon"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg></div>
            <div class="cca-label">Ajouter une culture</div>
          </a>

        </div>

        <div class="ps-summary">
          <div class="ps-sum-chip"><span class="ps-sum-dot dot-harvest"></span>1 en récolte</div>
          <div class="ps-sum-chip"><span class="ps-sum-dot dot-plant"></span>1 en plantation</div>
        </div>
      </div>
      @endforeach
      {{ $fields->links('pagination.custom') }}
    </div>
  </div>
</body>
</html>