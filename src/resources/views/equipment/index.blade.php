<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AgriNova — Équipements</title>
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
      --purple: #7c3aed;
      --teal: #0d9488;
      --white: #ffffff;
      --sidebar-w: 250px;
      --amber-bg: rgba(201, 138, 18, .1);
      --rust-bg: rgba(184, 74, 30, .08);
      --blue-bg: rgba(37, 99, 235, .08);
      --sage-bg: rgba(74, 140, 104, .1);
      --purple-bg: rgba(124, 58, 237, .08);
      --teal-bg: rgba(13, 148, 136, .08);
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

    ::-webkit-scrollbar {
      width: 5px;
    }

    ::-webkit-scrollbar-thumb {
      background: var(--dew);
      border-radius: 4px;
    }

    /* ══ SIDEBAR ══ */
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

    .sb-logo-svg {
      width: 38px;
      height: 38px;
      flex-shrink: 0;
    }

    .sb-brand {
      font-family: 'Playfair Display', serif;
      font-size: 1.25rem;
      font-weight: 700;
      color: #fff;
    }

    .sb-tagline {
      font-size: .58rem;
      color: rgba(184, 223, 200, .72);
      letter-spacing: .1em;
      text-transform: uppercase;
      margin-top: 2px;
    }

    .sb-sec {
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
      top: 20%;
      height: 60%;
      width: 3px;
      background: var(--sage);
      border-radius: 0 3px 3px 0;
    }

    .sb-link svg {
      width: 17px;
      height: 17px;
      flex-shrink: 0;
    }

    .sb-badge {
      margin-left: auto;
      background: var(--amber);
      color: #fff;
      font-size: .6rem;
      font-weight: 700;
      padding: 2px 7px;
      border-radius: 20px;
    }

    .sb-badge.red {
      background: var(--rust);
    }

    .sb-footer {
      padding: 1rem .625rem;
      border-top: 1px solid var(--border);
    }

    .sb-user {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: .625rem .75rem;
      border-radius: 10px;
      background: var(--fog);
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

    .sb-uname {
      font-size: .8125rem;
      font-weight: 600;
      color: var(--text);
    }

    .sb-urole {
      font-size: .65rem;
      color: var(--muted);
      margin-top: 1px;
    }

    /* ══ MAIN ══ */
    .main {
      flex: 1;
      min-width: 0;
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }

    .scroll {
      overflow-y: auto;
      flex: 1;
    }

    /* ══ HERO ══ */
    .hero {
      background: linear-gradient(140deg, #1a2f3d 0%, #1b3a2d 55%, #243d2b 100%);
      padding: 2.5rem 2.5rem 0;
      position: relative;
      overflow: hidden;
    }

    .hero::before {
      content: '';
      position: absolute;
      inset: 0;
      pointer-events: none;
      background:
        radial-gradient(ellipse at 85% 0%, rgba(124, 58, 237, .1) 0%, transparent 55%),
        radial-gradient(ellipse at 10% 110%, rgba(13, 148, 136, .08) 0%, transparent 45%);
    }

    .hero-deco {
      position: absolute;
      right: 0;
      top: 0;
      bottom: 0;
      width: 340px;
      background: url('https://images.unsplash.com/photo-1593508512255-86ab42a8e620?w=600&q=50&fit=crop') right center/cover;
      opacity: .06;
      mask-image: linear-gradient(to left, rgba(0, 0, 0, .5), transparent);
      -webkit-mask-image: linear-gradient(to left, rgba(0, 0, 0, .5), transparent);
    }

    .hero-z {
      position: relative;
      z-index: 2;
    }

    .hero-top {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      margin-bottom: 2rem;
      gap: 1.5rem;
    }

    .hero-eyebrow {
      display: flex;
      align-items: center;
      gap: 7px;
      font-size: .63rem;
      font-weight: 700;
      letter-spacing: .14em;
      text-transform: uppercase;
      color: rgba(184, 223, 200, .6);
      margin-bottom: .625rem;
    }

    .hero-eyebrow::before {
      content: '';
      width: 16px;
      height: 1.5px;
      background: rgba(184, 223, 200, .3);
    }

    .hero-title {
      font-family: 'Playfair Display', serif;
      font-size: 2.25rem;
      font-weight: 700;
      color: #fff;
      line-height: 1.05;
      letter-spacing: -.025em;
    }

    .hero-title em {
      font-style: italic;
      color: rgba(184, 223, 200, .8);
    }

    .hero-sub {
      font-size: .875rem;
      color: rgba(255, 255, 255, .38);
      margin-top: .5rem;
    }

    .hero-btns {
      display: flex;
      align-items: center;
      gap: .625rem;
      flex-shrink: 0;
    }

    .hbtn {
      display: flex;
      align-items: center;
      gap: 7px;
      padding: .575rem 1.25rem;
      border-radius: 10px;
      font-size: .8125rem;
      font-weight: 700;
      font-family: 'Outfit', sans-serif;
      cursor: pointer;
      transition: all .2s;
      text-decoration: none;
    }

    .hbtn-ghost {
      background: rgba(255, 255, 255, .1);
      border: 1.5px solid rgba(255, 255, 255, .18);
      color: rgba(255, 255, 255, .82);
    }

    .hbtn-ghost:hover {
      background: rgba(255, 255, 255, .17);
      border-color: rgba(255, 255, 255, .32);
    }

    .hbtn-mint {
      background: var(--mint);
      border: none;
      color: var(--forest);
      box-shadow: 0 4px 16px rgba(109, 189, 142, .28);
    }

    .hbtn-mint:hover {
      background: #7ed4a0;
    }

    .hbtn svg {
      width: 14px;
      height: 14px;
    }

    /* Hero KPIs */
    .hero-kpis {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      border-top: 1px solid rgba(255, 255, 255, .08);
    }

    .hk {
      padding: 1.125rem 1.25rem;
      border-right: 1px solid rgba(255, 255, 255, .07);
      transition: background .2s;
      cursor: default;
    }

    .hk:last-child {
      border-right: none;
    }

    .hk:hover {
      background: rgba(255, 255, 255, .05);
    }

    .hk-em {
      font-size: 1.1rem;
      margin-bottom: .375rem;
    }

    .hk-n {
      font-family: 'Playfair Display', serif;
      font-size: 1.625rem;
      font-weight: 700;
      color: #fff;
      line-height: 1;
    }

    .hk-l {
      font-size: .63rem;
      color: rgba(255, 255, 255, .38);
      margin-top: 3px;
    }

    .hk-t {
      display: inline-flex;
      align-items: center;
      font-size: .6rem;
      font-weight: 700;
      padding: 2px 7px;
      border-radius: 20px;
      margin-top: 5px;
    }

    .ht-up {
      background: rgba(109, 189, 142, .18);
      color: var(--mint);
    }

    .ht-dn {
      background: rgba(184, 74, 30, .2);
      color: #f4907a;
    }

    .ht-nt {
      background: rgba(255, 255, 255, .07);
      color: rgba(255, 255, 255, .38);
    }

    .ht-warn {
      background: rgba(201, 138, 18, .2);
      color: #f5c842;
    }

    /* ══ CONTENT ══ */
    .content {
      padding: 1.75rem 2.5rem 3rem;
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }

    /* ══ ALERT ══ */
    .alert-bar {
      display: flex;
      align-items: center;
      gap: .875rem;
      padding: .75rem 1.125rem;
      border-radius: 12px;
      background: rgba(201, 138, 18, .07);
      border: 1.5px solid rgba(201, 138, 18, .2);
      animation: alin .3s ease;
    }

    @keyframes alin {
      from {
        opacity: 0;
        transform: translateY(-4px)
      }

      to {
        opacity: 1;
        transform: translateY(0)
      }
    }

    .al-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: var(--amber);
      box-shadow: 0 0 0 3px rgba(201, 138, 18, .18);
      flex-shrink: 0;
    }

    .al-text {
      flex: 1;
    }

    .al-title {
      font-size: .8125rem;
      font-weight: 700;
      color: var(--text);
    }

    .al-sub {
      font-size: .7rem;
      color: var(--muted);
      margin-top: 1px;
    }

    .al-x {
      width: 22px;
      height: 22px;
      border-radius: 50%;
      background: rgba(0, 0, 0, .05);
      border: none;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--muted);
    }

    .al-x:hover {
      background: rgba(0, 0, 0, .1);
    }

    .al-x svg {
      width: 11px;
      height: 11px;
    }

    /* ══ VIEW TOGGLE + TOOLBAR ══ */
    .toolbar {
      display: flex;
      align-items: center;
      gap: .75rem;
      flex-wrap: wrap;
    }

    .view-toggle {
      display: flex;
      background: var(--white);
      border: 1.5px solid var(--border);
      border-radius: 10px;
      overflow: hidden;
      flex-shrink: 0;
    }

    .vt-btn {
      display: flex;
      align-items: center;
      gap: 5px;
      padding: .4rem .875rem;
      font-size: .75rem;
      font-weight: 700;
      color: var(--muted);
      font-family: 'Outfit', sans-serif;
      border: none;
      background: transparent;
      cursor: pointer;
      transition: all .18s;
    }

    .vt-btn.on {
      background: var(--forest);
      color: #fff;
    }

    .vt-btn svg {
      width: 14px;
      height: 14px;
    }

    .f-chip {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      padding: .38rem .9rem;
      border-radius: 20px;
      border: 1.5px solid var(--border);
      background: var(--white);
      color: var(--muted);
      font-size: .775rem;
      font-weight: 600;
      cursor: pointer;
      transition: all .18s;
      font-family: 'Outfit', sans-serif;
      white-space: nowrap;
    }

    .f-chip:hover {
      border-color: var(--sage);
      color: var(--fern);
      background: var(--fog);
    }

    .f-chip.on {
      background: var(--forest);
      border-color: var(--forest);
      color: #fff;
    }

    .f-chip-n {
      font-size: .58rem;
      font-weight: 700;
      padding: 1px 6px;
      border-radius: 20px;
      background: rgba(255, 255, 255, .2);
    }

    .f-chip:not(.on) .f-chip-n {
      background: var(--fog);
      color: var(--muted);
    }

    .f-sel {
      background: var(--white);
      border: 1.5px solid var(--border);
      border-radius: 9px;
      padding: .4rem .75rem;
      font-size: .8rem;
      font-family: 'Outfit', sans-serif;
      color: var(--text);
      cursor: pointer;
      outline: none;
      transition: border-color .2s;
    }

    .f-sel:focus {
      border-color: var(--sage);
    }

    .fsrch {
      display: flex;
      align-items: center;
      gap: 6px;
      background: var(--white);
      border: 1.5px solid var(--border);
      border-radius: 9px;
      padding: .4rem .875rem;
      margin-left: auto;
    }

    .fsrch:focus-within {
      border-color: var(--sage);
    }

    .fsrch svg {
      width: 13px;
      height: 13px;
      color: var(--muted);
    }

    .fsrch input {
      border: none;
      outline: none;
      background: transparent;
      font-size: .8rem;
      font-family: 'Outfit', sans-serif;
      color: var(--text);
      width: 150px;
    }

    .fsrch input::placeholder {
      color: #aab5a4;
    }

    /* ══ TABLE VIEW ══ */
    .tcard {
      background: var(--white);
      border: 1.5px solid var(--border);
      border-radius: 18px;
      overflow: hidden;
    }

    .thead {
      display: grid;
      grid-template-columns: 2.2fr 1fr 1fr 1.1fr 1.1fr 1fr .8fr;
      padding: .7rem 1.375rem;
      background: var(--fog);
      border-bottom: 1.5px solid var(--border);
    }

    .th {
      font-size: .61rem;
      font-weight: 800;
      letter-spacing: .09em;
      text-transform: uppercase;
      color: var(--muted);
      display: flex;
      align-items: center;
      gap: 4px;
      cursor: pointer;
      user-select: none;
    }

    .th:hover {
      color: var(--fern);
    }

    .th svg {
      width: 10px;
      height: 10px;
      opacity: .4;
    }

    .trow {
      display: grid;
      grid-template-columns: 2.2fr 1fr 1fr 1.1fr 1.1fr 1fr .8fr;
      padding: .9rem 1.375rem;
      border-bottom: 1px solid var(--border);
      align-items: center;
      transition: background .15s;
      cursor: pointer;
    }

    .trow:last-child {
      border-bottom: none;
    }

    .trow:hover {
      background: rgba(248, 244, 237, .7);
    }

    /* Name cell */
    .ce-name {
      display: flex;
      align-items: center;
      gap: .875rem;
      min-width: 0;
    }

    .e-icon {
      width: 42px;
      height: 42px;
      border-radius: 11px;
      flex-shrink: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.25rem;
      border: 1.5px solid var(--border);
      background: var(--fog);
    }

    .e-n {
      font-family: 'Playfair Display', serif;
      font-size: .9rem;
      font-weight: 700;
      color: var(--forest);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .e-m {
      font-size: .63rem;
      color: var(--muted);
      margin-top: 2px;
      font-style: italic;
    }

    /* Type badge */
    .type-badge {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      font-size: .68rem;
      font-weight: 700;
      padding: 4px 10px;
      border-radius: 20px;
      white-space: nowrap;
    }

    .tb-moto {
      background: var(--amber-bg);
      color: var(--amber);
    }

    .tb-irrig {
      background: var(--blue-bg);
      color: var(--blue);
    }

    .tb-recolte {
      background: var(--sage-bg);
      color: var(--sage);
    }

    .tb-stock {
      background: var(--purple-bg);
      color: var(--purple);
    }

    .tb-transport {
      background: var(--teal-bg);
      color: var(--teal);
    }

    .tb-autre {
      background: var(--fog);
      color: var(--muted);
    }

    /* Status badge */
    .st-badge {
      display: inline-flex;
      align-items: center;
      gap: 4px;
      font-size: .6rem;
      font-weight: 800;
      letter-spacing: .04em;
      text-transform: uppercase;
      padding: 4px 10px;
      border-radius: 20px;
      white-space: nowrap;
    }

    .st-badge::before {
      content: '';
      width: 5px;
      height: 5px;
      border-radius: 50%;
    }

    .st-op {
      background: var(--sage-bg);
      color: var(--sage);
    }

    .st-op::before {
      background: var(--sage);
    }

    .st-mnt {
      background: var(--amber-bg);
      color: var(--amber);
    }

    .st-mnt::before {
      background: var(--amber);
    }

    .st-hs {
      background: var(--rust-bg);
      color: var(--rust);
    }

    .st-hs::before {
      background: var(--rust);
    }

    .st-idle {
      background: var(--blue-bg);
      color: var(--blue);
    }

    .st-idle::before {
      background: var(--blue);
    }

    .st-use {
      background: var(--teal-bg);
      color: var(--teal);
    }

    .st-use::before {
      background: var(--teal);
    }

    /* Date / price cells */
    .ce-date {
      font-size: .8rem;
      font-weight: 600;
      color: var(--text);
    }

    .ce-date-sub {
      font-size: .62rem;
      color: var(--muted);
      margin-top: 2px;
    }

    .ce-price {
      font-family: 'DM Mono', monospace;
      font-size: .9rem;
      font-weight: 700;
      color: var(--forest);
    }

    .ce-price-sub {
      font-size: .62rem;
      color: var(--muted);
      margin-top: 2px;
    }

    /* Actions */
    .ce-acts {
      display: flex;
      align-items: center;
      justify-content: flex-end;
      gap: .35rem;
    }

    .abtn {
      width: 30px;
      height: 30px;
      border-radius: 8px;
      border: 1.5px solid var(--border);
      background: var(--white);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all .15s;
    }

    .abtn:hover {
      background: var(--fog);
      border-color: var(--sage);
    }

    .abtn.del:hover {
      background: var(--rust-bg);
      border-color: var(--rust);
    }

    .abtn svg {
      width: 13px;
      height: 13px;
      color: var(--muted);
    }

    .abtn.del svg {
      color: var(--rust);
    }

    /* Pagination */
    .pagrow {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: .875rem 1.375rem;
      background: var(--fog);
      border-top: 1.5px solid var(--border);
    }

    .pag-info {
      font-size: .75rem;
      color: var(--muted);
    }

    .pag-btns {
      display: flex;
      gap: .3rem;
    }

    .pag-btn {
      min-width: 30px;
      height: 30px;
      padding: 0 .25rem;
      border-radius: 8px;
      border: 1.5px solid var(--border);
      background: var(--white);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      font-size: .78rem;
      font-weight: 700;
      color: var(--muted);
      font-family: 'Outfit', sans-serif;
      transition: all .15s;
      text-decoration: none;
    }

    .pag-btn:hover {
      background: var(--fog);
      border-color: var(--sage);
      color: var(--fern);
    }

    .pag-btn.cur {
      background: var(--forest);
      border-color: var(--forest);
      color: #fff;
    }

    .pag-btn.off {
      opacity: .3;
      cursor: not-allowed;
      pointer-events: none;
    }

    .pag-btn svg {
      width: 12px;
      height: 12px;
    }

    /* ══ CARD GRID VIEW ══ */
    .card-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1rem;
    }

    .eq-card {
      background: var(--white);
      border: 1.5px solid var(--border);
      border-radius: 16px;
      overflow: hidden;
      transition: box-shadow .22s, transform .22s;
      cursor: pointer;
    }

    .eq-card:hover {
      box-shadow: 0 10px 32px rgba(27, 58, 45, .11);
      transform: translateY(-3px);
    }

    .eq-card-head {
      padding: 1.25rem 1.25rem .875rem;
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      gap: .75rem;
      border-bottom: 1.5px solid var(--border);
    }

    .eq-card-icon {
      width: 52px;
      height: 52px;
      border-radius: 14px;
      flex-shrink: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      border: 1.5px solid var(--border);
      background: var(--fog);
    }

    .eq-card-title {
      font-family: 'Playfair Display', serif;
      font-size: 1rem;
      font-weight: 700;
      color: var(--forest);
      line-height: 1.1;
    }

    .eq-card-sub {
      font-size: .7rem;
      color: var(--muted);
      margin-top: 3px;
      font-style: italic;
    }

    .eq-card-body {
      padding: .875rem 1.25rem;
      display: flex;
      flex-direction: column;
      gap: .5rem;
    }

    .eq-meta-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .eq-meta-lbl {
      font-size: .68rem;
      color: var(--muted);
    }

    .eq-meta-val {
      font-size: .8rem;
      font-weight: 700;
      color: var(--text);
    }

    .eq-meta-val.mono {
      font-family: 'DM Mono', monospace;
    }

    .eq-card-footer {
      padding: .75rem 1.25rem;
      background: var(--fog);
      border-top: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .eq-card-acts {
      display: flex;
      gap: .375rem;
    }

    /* ══ MODAL ══ */
    .overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(10, 20, 14, .55);
      z-index: 1000;
      align-items: center;
      justify-content: center;
      backdrop-filter: blur(4px);
    }

    .overlay.open {
      display: flex;
    }

    .modal {
      background: var(--white);
      border-radius: 22px;
      width: min(660px, 94vw);
      max-height: 90vh;
      overflow-y: auto;
      box-shadow: 0 24px 80px rgba(0, 0, 0, .28);
      display: flex;
      flex-direction: column;
    }

    .mhdr {
      background: linear-gradient(135deg, var(--forest), #2a5c40);
      padding: 1.375rem 1.75rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-radius: 22px 22px 0 0;
      flex-shrink: 0;
    }

    .mhdr h3 {
      font-family: 'Playfair Display', serif;
      font-size: 1.2rem;
      font-weight: 700;
      color: #fff;
    }

    .mhdr p {
      font-size: .72rem;
      color: rgba(184, 223, 200, .8);
      margin-top: 3px;
    }

    .mclose {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      background: rgba(255, 255, 255, .12);
      border: 1px solid rgba(255, 255, 255, .18);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: background .18s;
    }

    .mclose:hover {
      background: rgba(255, 255, 255, .22);
    }

    .mclose svg {
      width: 15px;
      height: 15px;
      color: #fff;
    }

    .mbody {
      padding: 1.75rem;
    }

    .msec {
      display: flex;
      align-items: center;
      gap: 7px;
      font-family: 'Playfair Display', serif;
      font-size: .9rem;
      color: var(--forest);
      font-weight: 600;
      padding-bottom: .5rem;
      border-bottom: 1.5px solid var(--border);
      margin-bottom: 1.125rem;
    }

    .msec svg {
      width: 14px;
      height: 14px;
      color: var(--sage);
    }

    .msec.mt {
      margin-top: 1.625rem;
    }

    .mg2 {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1rem;
      margin-bottom: 1rem;
    }

    .mf {
      margin-bottom: 1rem;
    }

    .mlbl {
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-size: .8125rem;
      font-weight: 600;
      color: var(--pine);
      margin-bottom: .4rem;
    }

    .mlbl .req {
      color: var(--rust);
    }

    .mhint {
      font-size: .68rem;
      font-weight: 400;
      color: var(--muted);
    }

    .minp {
      width: 100%;
      background: var(--parch);
      border: 1.5px solid var(--border);
      border-radius: 10px;
      padding: .625rem .875rem;
      font-size: .875rem;
      font-family: 'Outfit', sans-serif;
      color: var(--text);
      outline: none;
      transition: border-color .2s, box-shadow .2s, background .2s;
    }

    .minp::placeholder {
      color: #aab8a4;
    }

    .minp:focus {
      border-color: var(--sage);
      background: var(--white);
      box-shadow: 0 0 0 3px rgba(74, 140, 104, .12);
    }

    select.minp {
      appearance: auto;
      cursor: pointer;
    }

    .miw {
      position: relative;
    }

    .miw .minp {
      padding-left: 2.5rem;
    }

    .mico {
      position: absolute;
      left: .75rem;
      top: 50%;
      transform: translateY(-50%);
      color: var(--muted);
      display: flex;
      pointer-events: none;
    }

    .mico svg {
      width: 15px;
      height: 15px;
    }

    /* input with suffix */
    .msuf-wrap {
      position: relative;
    }

    .msuf-wrap .minp {
      padding-right: 3.5rem;
    }

    .msuf {
      position: absolute;
      right: 0;
      top: 0;
      bottom: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0 .875rem;
      font-size: .72rem;
      font-weight: 700;
      color: var(--white);
      background: var(--sage);
      border-radius: 0 9px 9px 0;
      pointer-events: none;
      min-width: 44px;
    }

    /* Status selector cards */
    .st-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: .5rem;
      margin-bottom: 1rem;
    }

    .sc {
      cursor: pointer;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 5px;
      padding: .75rem .5rem;
      background: var(--parch);
      border: 1.5px solid var(--border);
      border-radius: 12px;
      transition: all .18s;
      position: relative;
    }

    .sc:hover {
      border-color: var(--sage);
    }

    .sc.sel {
      border-color: var(--fern);
      background: var(--fog);
      box-shadow: 0 0 0 2.5px rgba(74, 140, 104, .13);
    }

    .sc input {
      display: none;
    }

    .sc-em {
      font-size: 1.25rem;
      line-height: 1;
    }

    .sc-lbl {
      font-size: .62rem;
      font-weight: 700;
      text-align: center;
      color: var(--text);
    }

    .sc-ck {
      position: absolute;
      top: 5px;
      right: 5px;
      width: 14px;
      height: 14px;
      background: var(--sage);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transition: opacity .18s;
    }

    .sc-ck svg {
      width: 8px;
      height: 8px;
      color: #fff;
    }

    .sc.sel .sc-ck {
      opacity: 1;
    }

    /* Type selector cards */
    .type-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: .5rem;
      margin-bottom: 1rem;
    }

    .tc {
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 8px;
      padding: .625rem .875rem;
      background: var(--parch);
      border: 1.5px solid var(--border);
      border-radius: 11px;
      transition: all .18s;
      position: relative;
    }

    .tc:hover {
      border-color: var(--sage);
      background: var(--fog);
    }

    .tc.sel {
      background: var(--fog);
      border-color: var(--fern);
      box-shadow: 0 0 0 2.5px rgba(74, 140, 104, .13);
    }

    .tc input {
      display: none;
    }

    .tc-em {
      font-size: 1.125rem;
      flex-shrink: 0;
    }

    .tc-lbl {
      font-size: .72rem;
      font-weight: 700;
      color: var(--text);
    }

    .tc-ck {
      position: absolute;
      top: 5px;
      right: 5px;
      width: 14px;
      height: 14px;
      background: var(--sage);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transition: opacity .18s;
    }

    .tc-ck svg {
      width: 8px;
      height: 8px;
      color: #fff;
    }

    .tc.sel .tc-ck {
      opacity: 1;
    }

    /* Modal footer */
    .mftr {
      padding: 1.125rem 1.75rem;
      background: var(--fog);
      border-top: 1.5px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: flex-end;
      gap: .75rem;
      flex-shrink: 0;
    }

    .btn-c {
      display: flex;
      align-items: center;
      gap: 6px;
      padding: .575rem 1.25rem;
      background: var(--white);
      border: 1.5px solid var(--border);
      color: var(--muted);
      font-weight: 600;
      font-size: .8125rem;
      font-family: 'Outfit', sans-serif;
      border-radius: 10px;
      cursor: pointer;
    }

    .btn-c:hover {
      background: var(--parch);
    }

    .btn-c svg {
      width: 13px;
      height: 13px;
    }

    .btn-s {
      display: flex;
      align-items: center;
      gap: 6px;
      padding: .575rem 1.5rem;
      background: var(--forest);
      color: #fff;
      font-weight: 700;
      font-size: .875rem;
      font-family: 'Outfit', sans-serif;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      box-shadow: 0 4px 14px rgba(27, 58, 45, .22);
    }

    .btn-s:hover {
      background: var(--fern);
    }

    .btn-s svg {
      width: 13px;
      height: 13px;
    }

    /* Delete modal */
    .del-box {
      background: var(--white);
      border-radius: 20px;
      width: min(400px, 92vw);
      padding: 2rem;
      text-align: center;
      box-shadow: 0 24px 80px rgba(0, 0, 0, .28);
    }

    .del-ico {
      width: 58px;
      height: 58px;
      background: var(--rust-bg);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1rem;
    }

    .del-ico svg {
      width: 28px;
      height: 28px;
      color: var(--rust);
    }

    .del-title {
      font-family: 'Playfair Display', serif;
      font-size: 1.1rem;
      color: var(--forest);
      font-weight: 700;
      margin-bottom: .5rem;
    }

    .del-sub {
      font-size: .8125rem;
      color: var(--muted);
      line-height: 1.55;
      margin-bottom: 1.5rem;
    }

    .del-acts {
      display: flex;
      gap: .75rem;
      justify-content: center;
    }

    .btn-del {
      padding: .575rem 1.375rem;
      background: var(--rust);
      color: #fff;
      font-weight: 700;
      font-size: .875rem;
      font-family: 'Outfit', sans-serif;
      border: none;
      border-radius: 10px;
      cursor: pointer;
    }

    .btn-del:hover {
      background: #9a3d18;
    }

    /* hidden helper */
    .hidden {
      display: none;
    }
  </style>
</head>

<body>
  <!-- ══ SIDEBAR ══ -->
  <aside class="sidebar">
    <a href="/dashboard" class="sb-logo">
      <svg class="sb-logo-svg" viewBox="0 0 48 48" fill="none">
        <circle cx="24" cy="24" r="22" fill="rgba(255,255,255,0.08)" stroke="rgba(255,255,255,0.18)"
          stroke-width="1.5" />
        <path d="M8 36 Q24 30 40 36" stroke="rgba(255,255,255,0.18)" stroke-width="1.5" fill="none"
          stroke-linecap="round" />
        <path d="M24 38 L24 18" stroke="#a8e6c0" stroke-width="2.8" stroke-linecap="round" />
        <path d="M24 29 C19 25 13 23 11 17 C17 16 23 22 24 29Z" fill="#6dbd8e" />
        <path d="M24 24 C29 20 36 18 38 12 C31 11 25 17 24 24Z" fill="#a8e6c0" />
        <path d="M24 33 C28 31 32 29 33 25 C29 25 25 28 24 33Z" fill="#6dbd8e" opacity="0.7" />
        <circle cx="24" cy="11" r="3.5" fill="#f7e96e" opacity="0.9" />
        <line x1="24" y1="6" x2="24" y2="4.5" stroke="#f7e96e" stroke-width="1.5" stroke-linecap="round" />
      </svg>
      <div>
        <div class="sb-brand">AgriNova</div>
        <div class="sb-tagline">Gestion Agricole</div>
      </div>
    </a>
    <div class="sb-nav">
      <div class="sb-sec">Principal</div>
      <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>Dashboard</a>
      <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064" />
        </svg>Cultures<span class="sb-badge">12</span></a>
      <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
        </svg>Récoltes</a>
      <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7" />
        </svg>Stocks</a>
      <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>Parcelles</a>
      <div class="sb-sec">Gestion</div>
      <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>Personnel</a>
      <a href="#" class="sb-link active"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>Équipements<span class="sb-badge red">1</span></a>
      <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
        </svg>Rapports</a>
    </div>
    <div class="sb-footer">
      <div class="sb-user">
        <div class="sb-avatar">MA</div>
        <div>
          <div class="sb-uname">Mohamed Alami</div>
          <div class="sb-urole">Agriculteur</div>
        </div>
      </div>
    </div>
  </aside>

  <!-- ══ MAIN ══ -->
  <div class="main">
    <div class="scroll">

      <!-- HERO -->
      <div class="hero">
        <div class="hero-deco"></div>
        <div class="hero-z">
          <div class="hero-top">
            <div>
              <div class="hero-eyebrow">Exploitation El Haouz · Inventaire</div>
              <h1 class="hero-title">Gestion des <em>Équipements</em></h1>
              <p class="hero-sub">Suivi du parc matériel · Statuts · Achats · Maintenance</p>
            </div>
            <div class="hero-btns">
              <a href="#" class="hbtn hbtn-ghost">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                Exporter
              </a>
              <a class="hbtn hbtn-mint" href="{{ route('equipments.create') }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Ajouter équipement
              </a>
            </div>
          </div>
          <div class="hero-kpis">
            <div class="hk">
              <div class="hk-em"></div>
              <div class="hk-n">{{ $stats['total'] }}</div>
              <div class="hk-l">Total équipements</div>
              <div class="hk-t ht-nt">Inventaire</div>
            </div>
            <div class="hk">
              <div class="hk-em"></div>
              <div class="hk-n">{{ $stats['operational'] }}</div>
              <div class="hk-l">Opérationnels</div>
              <div class="hk-t ht-up">{{ $stats['total'] ? round(($stats['operational'] / $stats['total']) * 100) : 0
                }}% du parc</div>
            </div>
            <div class="hk">
              <div class="hk-em"></div>
              <div class="hk-n">{{ $stats['using'] }}</div>
              <div class="hk-l">En utilisation</div>
              <div class="hk-t ht-nt">Sur le terrain</div>
            </div>
            <div class="hk">
              <div class="hk-em"></div>
              <div class="hk-n">{{ $stats['maintenance'] }}</div>
              <div class="hk-l">En maintenance</div>
              <div class="hk-t ht-warn">À surveiller</div>
            </div>
            <div class="hk">
              <div class="hk-em"></div>
              <div class="hk-n">{{ number_format($stats['total_value'], 0, ',', ' ') }}</div>
              <div class="hk-l">Valeur totale (DH)</div>
              <div class="hk-t ht-nt">Coût d'achat</div>
            </div>
          </div>
        </div>
      </div>

      <!-- CONTENT -->
      <div class="content">

        @php
        $alertEquipment = isset($equipments) ? $equipments->firstWhere('status', 'maintenance') : null;
        $alertFields = $alertEquipment?->fields?->pluck('name')->filter()->implode(', ');
        @endphp
        @if($alertEquipment)
        <div class="alert-bar" id="al1">
          <div class="al-dot"></div>
          <div class="al-text">
            <div class="al-title">{{ $alertEquipment->name }} — En maintenance</div>
            <div class="al-sub">Réf. {{ sprintf('EQ-%03d', $alertEquipment->id) }} · {{ $alertFields ? "Parcelle(s) :
              $alertFields" : "Non assigné à une parcelle" }}</div>
          </div>
          <button class="al-x" onclick="dismissAl()"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg></button>
        </div>
        @endif

        <!-- TOOLBAR -->
        <div class="toolbar">
          <!-- View toggle -->
          <div class="view-toggle">
            <button class="vt-btn on" id="btnTable" onclick="setView('table')">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 10h16M4 14h16M4 18h16" />
              </svg>
              Tableau
            </button>
            <button class="vt-btn" id="btnCards" onclick="setView('cards')">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
              </svg>
              Cartes
            </button>
          </div>
          <!-- Status filters -->
          <button class="f-chip on" onclick="fchip(this)">Tous <span class="f-chip-n">{{ $stats['total']
              }}</span></button>
          <button class="f-chip" onclick="fchip(this)"> Disponible <span class="f-chip-n">{{ $stats['available']
              }}</span></button>
          <button class="f-chip" onclick="fchip(this)"> En utilisation <span class="f-chip-n">{{ $stats['using']
              }}</span></button>
          <button class="f-chip" onclick="fchip(this)"> Maintenance <span class="f-chip-n">{{ $stats['maintenance']
              }}</span></button>
          <!-- Type filter -->
          <select class="f-sel">
            <option value="">Tous les types</option>
            <option> Motorisé</option>
            <option> Irrigation</option>
            <option> Récolte</option>
            <option> Stockage</option>
            <option> Transport</option>
          </select>
          <div class="fsrch">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <input type="text" placeholder="Rechercher un équipement...">
          </div>
        </div>

        <!-- ══ TABLE VIEW ══ -->
        <div id="viewTable">
          <div class="tcard">
            <div class="thead">
              <div class="th">Équipement <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 16V4m0 0L3 8m4-4l4 4M17 8v12m0 0l4-4m-4 4l-4-4" />
                </svg></div>
              <div class="th">Type</div>
              <div class="th">Statut</div>
              <div class="th">Date achat</div>
              <div class="th">Prix achat</div>
              <div class="th">Âge</div>
              <div class="th" style="justify-content:flex-end">Actions</div>
            </div>

            @forelse($equipments as $equipment)
            <div class="trow" onclick="openEdit({{ $equipment->id }})">
              <div class="ce-name">
                <div class="e-icon"></div>
                <div>
                  <div class="e-n">{{ $equipment->name }}</div>
                  <div class="e-m">Réf. </div>
                </div>
              </div>
              <div><span class="type-badge {{ $typeMeta($equipment->type)['class'] }}"> {{
                  $typeMeta($equipment->type)['label'] }}</span></div>
              <div><span class="st-badge {{ $statusMeta($equipment->status)['class'] }}">{{
                  $statusMeta($equipment->status)['label'] }}</span></div>
              <div>
                <div class="ce-date">{{ $equipment->purchase_date }}</div>
                <div class="ce-date-sub">{{ $equipment->purchase_date
                  ? 'il y a ' . (date('Y') - date('Y', strtotime((string)$equipment->purchase_date))) . ' an'
                  . ((date('Y') - date('Y', strtotime((string)$equipment->purchase_date))) > 1 ? 's' : '')
                  : '—'
                  }}</div>
              </div>
              <div>
                <div class="ce-price">{{ $equipment->purchase_price }}</div>
                <div class="ce-price-sub">DH</div>
              </div>
              <div>
                <div class="ce-date">{{ $equipment->purchase_date
                  ? 'il y a ' . (date('Y') - date('Y', strtotime((string)$equipment->purchase_date))) . ' an'
                  . ((date('Y') - date('Y', strtotime((string)$equipment->purchase_date))) > 1 ? 's' : '')
                  : '—'
                  }}</div>
                <div class="ce-date-sub">{{ $statusMeta($equipment->status)['label'] }}</div>
              </div>
              <div class="ce-acts" onclick="event.stopPropagation()">
                <button class="abtn" title="Voir" onclick="openEdit({{ $equipment->id }})"><svg fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg></button>
                <button class="abtn" title="Modifier" onclick="openEdit({{ $equipment->id }})"><svg fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                  </svg></button>
                <button class="abtn del" title="Supprimer" onclick="openDel(@json($equipment->name))"><svg fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </svg></button>
              </div>
            </div>
            @empty
            <div style="padding:1.25rem;color:var(--muted);">
              Aucun équipement pour le moment.
              <a href="{{ route('equipments.create') }}"
                style="color:var(--forest);font-weight:700;text-decoration:none;">Ajouter un équipement</a>
            </div>
            @endforelse

            <div class="pagrow">
              <span class="pag-info">Affichage {{ $equipments->count() ? 1 : 0 }}–{{ $equipments->count() }} sur {{
                $stats['total'] }} équipements</span>
            </div>
          </div>
        </div>

        <!-- ══ CARD GRID VIEW ══ -->
        <div id="viewCards" class="hidden">
          <div class="card-grid">

            @forelse($equipments as $equipment)
            <div class="eq-card">
              <div class="eq-card-head">
                <div class="eq-card-icon"></div>
                <div style="flex:1;min-width:0;">
                  <div class="eq-card-title">{{ $equipment->name }}</div>
                  <div class="eq-card-sub">Réf. </div>
                </div>
                <span class="st-badge {{ $statusMeta($equipment->status)['class'] }}" style="flex-shrink:0;">{{
                  $statusMeta($equipment->status)['label'] }}</span>
              </div>
              <div class="eq-card-body">
                <div class="eq-meta-row"><span class="eq-meta-lbl">Type</span><span
                    class="type-badge {{ $typeMeta($equipment->type)['class'] }}"> {{
                    $typeMeta($equipment->type)['label'] }}</span></div>
                <div class="eq-meta-row"><span class="eq-meta-lbl">Date d'achat</span><span class="eq-meta-val">{{
                    $equipment->purchase_date }}</span></div>
                <div class="eq-meta-row"><span class="eq-meta-lbl">Prix d'achat</span><span class="eq-meta-val mono">{{
                    $equipment->purchase_price }} DH</span></div>
                <div class="eq-meta-row"><span class="eq-meta-lbl">Âge</span><span class="eq-meta-val">{{
                    $equipment->purchase_date
                    ? 'il y a ' . (date('Y') - date('Y', strtotime((string)$equipment->purchase_date))) . ' an'
                    . ((date('Y') - date('Y', strtotime((string)$equipment->purchase_date))) > 1 ? 's' : '')
                    : '—'
                    }}</span></div>
              </div>
              <div class="eq-card-footer">
                <div class="eq-card-acts">
                  <button class="abtn" onclick="openEdit({{ $equipment->id }})"><svg fill="none" stroke="currentColor"
                      viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg></button>
                  <button class="abtn" onclick="openEdit({{ $equipment->id }})"><svg fill="none" stroke="currentColor"
                      viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg></button>
                  <button class="abtn del" onclick="openDel(@json($equipment->name))"><svg fill="none"
                      stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg></button>
                </div>
              </div>
            </div>
            @empty
            <div style="padding:1.25rem;color:var(--muted);">
              Aucun équipement pour le moment.
              <a href="{{ route('equipments.create') }}"
                style="color:var(--forest);font-weight:700;text-decoration:none;">Ajouter un équipement</a>
            </div>
            @endforelse

          </div>
        </div>

      </div><!-- /content -->
    </div><!-- /scroll -->
  </div><!-- /main -->

  <!-- ══ CREATE/EDIT MODAL ══ -->
  <div class="overlay" id="crudModal" onclick="closeCrudBg(event)">
    <div class="modal">
      <div class="mhdr">
        <div>
          <h3 id="mTitle">Nouvel Équipement</h3>
          <p id="mSub">Renseignez les informations de l'équipement</p>
        </div>
        <div class="mclose" onclick="closeCrud()"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg></div>
      </div>
      <div class="mbody">

        <!-- Type -->
        <div class="msec">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
          </svg>
          Type d'équipement
        </div>
        <div class="type-grid">
          <label class="tc sel">
            <input type="radio" name="type" value="motorise" onchange="selType(this)" checked>
            <span class="tc-em">🚜</span><span class="tc-lbl">Motorisé</span>
            <div class="tc-ck"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
              </svg></div>
          </label>
          <label class="tc">
            <input type="radio" name="type" value="irrigation" onchange="selType(this)">
            <span class="tc-em">💧</span><span class="tc-lbl">Irrigation</span>
            <div class="tc-ck"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
              </svg></div>
          </label>
          <label class="tc">
            <input type="radio" name="type" value="recolte" onchange="selType(this)">
            <span class="tc-em">🌾</span><span class="tc-lbl">Récolte</span>
            <div class="tc-ck"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
              </svg></div>
          </label>
          <label class="tc">
            <input type="radio" name="type" value="stockage" onchange="selType(this)">
            <span class="tc-em">📦</span><span class="tc-lbl">Stockage</span>
            <div class="tc-ck"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
              </svg></div>
          </label>
          <label class="tc">
            <input type="radio" name="type" value="transport" onchange="selType(this)">
            <span class="tc-em">🚚</span><span class="tc-lbl">Transport</span>
            <div class="tc-ck"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
              </svg></div>
          </label>
          <label class="tc">
            <input type="radio" name="type" value="autre" onchange="selType(this)">
            <span class="tc-em">🔧</span><span class="tc-lbl">Autre</span>
            <div class="tc-ck"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
              </svg></div>
          </label>
        </div>

        <!-- Identification -->
        <div class="msec mt">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
          Identification
        </div>

        <!-- name -->
        <div class="mf">
          <div class="mlbl"><span>Nom de l'équipement <span class="req">*</span></span><span class="mhint">Marque +
              modèle recommandé</span></div>
          <div class="miw">
            <span class="mico"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg></span>
            <input type="text" name="name" class="minp" placeholder="ex: Tracteur Massey Ferguson 135" required>
          </div>
        </div>

        <!-- Status -->
        <div class="msec mt">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          Statut
        </div>
        <div class="st-grid">
          <label class="sc sel" data-s="operationnel">
            <input type="radio" name="status" value="operationnel" checked onchange="selStatus(this)">
            <div class="sc-em">✅</div>
            <div class="sc-lbl">Opérationnel</div>
            <div class="sc-ck"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
              </svg></div>
          </label>
          <label class="sc" data-s="maintenance">
            <input type="radio" name="status" value="maintenance" onchange="selStatus(this)">
            <div class="sc-em">⚙️</div>
            <div class="sc-lbl">Maintenance</div>
            <div class="sc-ck"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
              </svg></div>
          </label>
          <label class="sc" data-s="hors_service">
            <input type="radio" name="status" value="hors_service" onchange="selStatus(this)">
            <div class="sc-em">🚫</div>
            <div class="sc-lbl">Hors service</div>
            <div class="sc-ck"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
              </svg></div>
          </label>
          <label class="sc" data-s="inactif">
            <input type="radio" name="status" value="inactif" onchange="selStatus(this)">
            <div class="sc-em">💤</div>
            <div class="sc-lbl">Inactif</div>
            <div class="sc-ck"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
              </svg></div>
          </label>
        </div>

        <!-- Achat -->
        <div class="msec mt">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          Informations d'achat
        </div>

        <div class="mg2">
          <!-- purchase_date -->
          <div>
            <div class="mlbl"><span>Date d'achat <span class="req">*</span></span></div>
            <div class="miw">
              <span class="mico"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg></span>
              <input type="date" name="purchase_date" class="minp" required>
            </div>
          </div>
          <!-- purchase_price -->
          <div>
            <div class="mlbl"><span>Prix d'achat <span class="req">*</span></span><span class="mhint">En Dirhams
                (DH)</span></div>
            <div class="msuf-wrap">
              <input type="number" name="purchase_price" class="minp" placeholder="ex: 85000" min="0" step="100"
                required>
              <span class="msuf">DH</span>
            </div>
          </div>
        </div>

      </div><!-- /mbody -->
      <div class="mftr">
        <button class="btn-c" onclick="closeCrud()">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
          Annuler
        </button>
        <button class="btn-s">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
          Enregistrer
        </button>
      </div>
    </div>
  </div>

  <!-- ══ DELETE MODAL ══ -->
  <div class="overlay" id="delModal" onclick="closeDelBg(event)">
    <div class="del-box">
      <div class="del-ico"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg></div>
      <div class="del-title">Supprimer cet équipement ?</div>
      <div class="del-sub" id="delTxt">Cette action est irréversible.</div>
      <div class="del-acts">
        <button class="btn-c" onclick="closeDel()">Annuler</button>
        <button class="btn-del">Supprimer</button>
      </div>
    </div>
  </div>

  <script>
    // View toggle
function setView(v) {
  const isTable = v === 'table';
  document.getElementById('viewTable').classList.toggle('hidden', !isTable);
  document.getElementById('viewCards').classList.toggle('hidden', isTable);
  document.getElementById('btnTable').classList.toggle('on', isTable);
  document.getElementById('btnCards').classList.toggle('on', !isTable);
}

// Filter chips
function fchip(el) {
  document.querySelectorAll('.f-chip').forEach(c => c.classList.remove('on'));
  el.classList.add('on');
}

// Alert dismiss
function dismissAl() {
  const el = document.getElementById('al1');
  el.style.transition='all .3s ease';el.style.opacity='0';el.style.maxHeight='0';
  el.style.padding='0';el.style.overflow='hidden';
  setTimeout(()=>el.remove(),320);
}

// CRUD Modal
function openCreate() {
  document.getElementById('mTitle').textContent = 'Nouvel Équipement';
  document.getElementById('mSub').textContent = 'Renseignez les informations de l\'équipement';
  document.getElementById('crudModal').classList.add('open');
}
function openEdit(id) {
  document.getElementById('mTitle').textContent = 'Modifier l\'équipement';
  document.getElementById('mSub').textContent = 'Équipement #EQ-00' + id;
  document.getElementById('crudModal').classList.add('open');
}
function closeCrud() { document.getElementById('crudModal').classList.remove('open'); }
function closeCrudBg(e) { if(e.target === document.getElementById('crudModal')) closeCrud(); }

// Delete modal
function openDel(name) {
  document.getElementById('delTxt').textContent = `L'équipement "${name}" sera définitivement supprimé.`;
  document.getElementById('delModal').classList.add('open');
}
function closeDel() { document.getElementById('delModal').classList.remove('open'); }
function closeDelBg(e) { if(e.target === document.getElementById('delModal')) closeDel(); }

// Type selector
function selType(radio) {
  document.querySelectorAll('.tc').forEach(c => c.classList.remove('sel'));
  radio.closest('.tc').classList.add('sel');
}

// Status selector
function selStatus(radio) {
  document.querySelectorAll('.sc').forEach(c => c.classList.remove('sel'));
  radio.closest('.sc').classList.add('sel');
}

document.addEventListener('keydown', e => { if(e.key==='Escape'){closeCrud();closeDel();} });
  </script>
</body>

</html>