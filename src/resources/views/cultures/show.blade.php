<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriNova — Tomates Roma · Détails</title>
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
            --amber-bg: rgba(201, 138, 18, .1);
            --rust: #b84a1e;
            --rust-bg: rgba(184, 74, 30, .08);
            --blue: #2563eb;
            --blue-bg: rgba(37, 99, 235, .08);
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
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .content {
            padding: 0;
            overflow-y: auto;
            flex: 1;
        }

        /* ══ HERO BANNER ══ */
        .hero {
            height: 300px;
            position: relative;
            overflow: hidden;
        }

        .hero-img {
            position: absolute;
            inset: 0;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(170deg, rgba(10, 24, 14, .55) 0%, rgba(10, 24, 14, .88) 100%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 1.5rem 2.25rem 0;
        }

        /* Breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: .5rem;
            font-size: .72rem;
            color: rgba(255, 255, 255, .55);
        }

        .breadcrumb a {
            color: rgba(255, 255, 255, .55);
            text-decoration: none;
            transition: color .18s;
        }

        .breadcrumb a:hover {
            color: rgba(255, 255, 255, .9);
        }

        .breadcrumb-sep {
            color: rgba(255, 255, 255, .25);
        }

        .breadcrumb-cur {
            color: rgba(255, 255, 255, .9);
            font-weight: 600;
        }

        /* Hero bottom */
        .hero-bottom {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            padding-bottom: 0;
        }

        .hero-bottom-left {}

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(109, 189, 142, .2);
            border: 1px solid rgba(109, 189, 142, .35);
            border-radius: 20px;
            padding: 4px 13px;
            font-size: .65rem;
            font-weight: 700;
            color: var(--mint);
            letter-spacing: .1em;
            text-transform: uppercase;
            margin-bottom: .75rem;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: #fff;
            line-height: 1.05;
            letter-spacing: -.025em;
        }

        .hero-title em {
            font-style: italic;
            color: rgba(184, 223, 200, .85);
        }

        .hero-sub {
            font-size: .875rem;
            color: rgba(255, 255, 255, .5);
            margin-top: .5rem;
            display: flex;
            align-items: center;
            gap: .625rem;
            flex-wrap: wrap;
        }

        .hero-sub-dot {
            width: 3px;
            height: 3px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .25);
        }

        .hero-bottom-right {
            display: flex;
            align-items: center;
            gap: .625rem;
            padding-bottom: 2rem;
            flex-shrink: 0;
        }

        .hero-btn {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: .55rem 1.125rem;
            border-radius: 10px;
            font-size: .8rem;
            font-weight: 700;
            cursor: pointer;
            font-family: 'Outfit', sans-serif;
            text-decoration: none;
            transition: all .18s;
        }

        .hb-outline {
            background: rgba(255, 255, 255, .1);
            border: 1.5px solid rgba(255, 255, 255, .25);
            color: rgba(255, 255, 255, .88);
            backdrop-filter: blur(6px);
        }

        .hb-outline:hover {
            background: rgba(255, 255, 255, .18);
            border-color: rgba(255, 255, 255, .45);
        }

        .hb-primary {
            background: var(--sage);
            border: none;
            color: #fff;
            box-shadow: 0 4px 14px rgba(74, 140, 104, .4);
        }

        .hb-primary:hover {
            background: var(--mint);
        }

        .hero-btn svg {
            width: 14px;
            height: 14px;
        }

        /* ══ CYCLE STEPPER ══ */
        .stepper-wrap {
            background: var(--white);
            border-bottom: 1.5px solid var(--border);
            padding: 0 2.25rem;
        }

        .stepper {
            display: flex;
            align-items: stretch;
            position: relative;
        }

        .step {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 1.375rem .5rem 1.125rem;
            position: relative;
            cursor: pointer;
            transition: background .18s;
            border-bottom: 3px solid transparent;
        }

        .step:hover {
            background: var(--fog);
        }

        .step.done {
            border-bottom-color: var(--sage);
        }

        .step.active {
            border-bottom-color: var(--forest);
        }

        /* connector line between steps */
        .step::after {
            content: '';
            position: absolute;
            top: 2.1rem;
            right: -50%;
            width: 100%;
            height: 2px;
            background: var(--border);
            z-index: 0;
        }

        .step.done::after {
            background: var(--sage);
        }

        .step:last-child::after {
            display: none;
        }

        .step-bubble {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid var(--border);
            background: var(--white);
            position: relative;
            z-index: 1;
            margin-bottom: .5rem;
            transition: all .22s;
            font-size: .875rem;
        }

        .step.done .step-bubble {
            background: var(--sage);
            border-color: var(--sage);
            color: #fff;
        }

        .step.active .step-bubble {
            background: var(--forest);
            border-color: var(--forest);
            color: #fff;
            box-shadow: 0 0 0 4px rgba(27, 58, 45, .12);
        }

        .step-bubble svg {
            width: 16px;
            height: 16px;
        }

        .step-label {
            font-size: .7rem;
            font-weight: 700;
            color: var(--muted);
            text-align: center;
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        .step.done .step-label {
            color: var(--sage);
        }

        .step.active .step-label {
            color: var(--forest);
        }

        .step-date {
            font-size: .6rem;
            color: var(--muted);
            margin-top: 2px;
            font-family: 'DM Mono', monospace;
        }

        /* Next step CTA */
        .next-step-bar {
            background: linear-gradient(135deg, var(--forest), #2a5c40);
            padding: .875rem 2.25rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nsb-left {
            display: flex;
            align-items: center;
            gap: .875rem;
        }

        .nsb-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .12);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nsb-icon svg {
            width: 18px;
            height: 18px;
            color: #fff;
        }

        .nsb-text {}

        .nsb-label {
            font-size: .72rem;
            font-weight: 600;
            color: rgba(184, 223, 200, .75);
            letter-spacing: .04em;
        }

        .nsb-title {
            font-size: .9375rem;
            font-weight: 700;
            color: #fff;
        }

        .btn-next-step {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: .625rem 1.5rem;
            background: var(--mint);
            border: none;
            border-radius: 10px;
            color: var(--forest);
            font-weight: 800;
            font-size: .875rem;
            font-family: 'Outfit', sans-serif;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(0, 0, 0, .2);
            transition: background .2s, transform .15s;
        }

        .btn-next-step:hover {
            background: #7ed4a0;
            transform: translateY(-1px);
        }

        .btn-next-step svg {
            width: 15px;
            height: 15px;
        }

        /* ══ BODY CONTENT ══ */
        .body {
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 1.75rem;
            padding: 1.75rem 2.25rem 3rem;
        }

        /* ══ PANELS ══ */
        .panel {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 18px;
            overflow: hidden;
            margin-bottom: 1.25rem;
        }

        .panel:last-child {
            margin-bottom: 0;
        }

        .panel-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: .875rem 1.25rem;
            background: var(--fog);
            border-bottom: 1.5px solid var(--border);
        }

        .panel-title {
            font-family: 'Playfair Display', serif;
            font-size: .975rem;
            font-weight: 700;
            color: var(--forest);
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .panel-title svg {
            width: 15px;
            height: 15px;
            color: var(--sage);
        }

        .panel-body {
            padding: 1.125rem 1.25rem;
        }

        .panel-link {
            font-size: .72rem;
            font-weight: 700;
            color: var(--fern);
            text-decoration: none;
            cursor: pointer;
        }

        .panel-link:hover {
            text-decoration: underline;
        }

        /* ══ KEY METRICS STRIP ══ */
        .metrics-strip {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0;
            margin-bottom: 1.25rem;
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 18px;
            overflow: hidden;
        }

        .metric {
            padding: 1.125rem 1.25rem;
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .metric:last-child {
            border-right: none;
        }

        .metric-lbl {
            font-size: .62rem;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--muted);
        }

        .metric-val {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--forest);
            line-height: 1;
        }

        .metric-sub {
            font-size: .68rem;
            color: var(--muted);
        }

        .metric-icon {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 4px;
        }

        .metric-icon svg {
            width: 15px;
            height: 15px;
        }

        .mi-green {
            background: rgba(74, 140, 104, .12);
            color: var(--sage);
        }

        .mi-amber {
            background: var(--amber-bg);
            color: var(--amber);
        }

        .mi-blue {
            background: var(--blue-bg);
            color: var(--blue);
        }

        .mi-rust {
            background: var(--rust-bg);
            color: var(--rust);
        }

        /* ══ CHECKLIST per stage ══ */
        .checklist {
            display: flex;
            flex-direction: column;
            gap: .5rem;
        }

        .cl-item {
            display: flex;
            align-items: flex-start;
            gap: .75rem;
            padding: .625rem .875rem;
            border-radius: 10px;
            background: var(--parch);
            border: 1.5px solid var(--border);
            cursor: pointer;
            transition: all .18s;
        }

        .cl-item:hover {
            border-color: var(--dew);
            background: var(--fog);
        }

        .cl-item.checked {
            background: var(--fog);
            border-color: var(--dew);
        }

        .cl-check {
            width: 20px;
            height: 20px;
            border-radius: 6px;
            border: 2px solid var(--border);
            background: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-top: 1px;
            transition: all .18s;
        }

        .cl-item.checked .cl-check {
            background: var(--sage);
            border-color: var(--sage);
        }

        .cl-check svg {
            width: 11px;
            height: 11px;
            color: #fff;
            opacity: 0;
            transition: opacity .18s;
        }

        .cl-item.checked .cl-check svg {
            opacity: 1;
        }

        .cl-text {
            font-size: .8125rem;
            color: var(--text);
            font-weight: 500;
            line-height: 1.45;
        }

        .cl-text.done-text {
            color: var(--muted);
            text-decoration: line-through;
        }

        .cl-priority {
            font-size: .6rem;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 20px;
            flex-shrink: 0;
            margin-left: auto;
            margin-top: 2px;
        }

        .pr-high {
            background: var(--rust-bg);
            color: var(--rust);
        }

        .pr-med {
            background: var(--amber-bg);
            color: var(--amber);
        }

        .pr-low {
            background: var(--fog);
            color: var(--muted);
        }

        /* ══ NOTES (localStorage) ══ */
        .notes-area {
            width: 100%;
            min-height: 120px;
            background: var(--parch);
            border: 1.5px solid var(--border);
            border-radius: 10px;
            padding: .75rem .875rem;
            font-size: .8125rem;
            font-family: 'Outfit', sans-serif;
            color: var(--text);
            outline: none;
            resize: vertical;
            line-height: 1.6;
            transition: border-color .2s, background .2s;
        }

        .notes-area:focus {
            border-color: var(--sage);
            background: var(--white);
        }

        .notes-area::placeholder {
            color: #aab5a4;
        }

        .notes-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: .625rem;
            font-size: .68rem;
            color: var(--muted);
        }

        .notes-save {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 4px 12px;
            background: var(--forest);
            color: #fff;
            border: none;
            border-radius: 7px;
            font-size: .72rem;
            font-weight: 700;
            font-family: 'Outfit', sans-serif;
            cursor: pointer;
            transition: background .18s;
        }

        .notes-save:hover {
            background: var(--fern);
        }

        .notes-save svg {
            width: 12px;
            height: 12px;
        }

        .notes-saved {
            color: var(--sage);
            display: none;
        }

        /* ══ ACTIVITY TIMELINE ══ */
        .timeline {
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        .tl-item {
            display: flex;
            align-items: flex-start;
            gap: .875rem;
            padding: .75rem 0;
            border-bottom: 1px solid var(--border);
            position: relative;
        }

        .tl-item:last-child {
            border-bottom: none;
        }

        .tl-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            flex-shrink: 0;
            margin-top: 4px;
        }

        .tl-dot::before {
            content: '';
            position: absolute;
            left: 4px;
            top: 22px;
            width: 2px;
            height: calc(100% - 10px);
            background: var(--border);
        }

        .tl-item:last-child .tl-dot::before {
            display: none;
        }

        .tl-dot.g {
            background: var(--sage);
        }

        .tl-dot.a {
            background: var(--amber);
        }

        .tl-dot.b {
            background: var(--blue);
        }

        .tl-dot.r {
            background: var(--rust);
        }

        .tl-body {
            flex: 1;
        }

        .tl-text {
            font-size: .8125rem;
            font-weight: 500;
            color: var(--text);
            line-height: 1.45;
        }

        .tl-time {
            font-size: .65rem;
            color: var(--muted);
            margin-top: 2px;
            font-family: 'DM Mono', monospace;
        }

        .tl-badge {
            font-size: .58rem;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 20px;
            margin-left: 6px;
            vertical-align: middle;
        }

        .tb-g {
            background: var(--fog);
            color: var(--sage);
        }

        .tb-a {
            background: var(--amber-bg);
            color: var(--amber);
        }

        /* ══ WEATHER MINI ══ */
        .weather-card {
            background: linear-gradient(135deg, var(--forest) 0%, #2a5c40 100%);
            border-radius: 16px;
            overflow: hidden;
            margin-bottom: 1.25rem;
        }

        .wc-top {
            padding: 1.125rem 1.25rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .wc-left {}

        .wc-loc {
            font-size: .65rem;
            color: rgba(255, 255, 255, .45);
            text-transform: uppercase;
            letter-spacing: .08em;
        }

        .wc-temp {
            font-family: 'Playfair Display', serif;
            font-size: 2.25rem;
            font-weight: 700;
            color: #fff;
            line-height: 1;
        }

        .wc-desc {
            font-size: .75rem;
            color: rgba(255, 255, 255, .55);
            margin-top: 3px;
        }

        .wc-emoji {
            font-size: 2.5rem;
        }

        .wc-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: .5rem;
            padding: .875rem 1.25rem;
            border-top: 1px solid rgba(255, 255, 255, .1);
        }

        .wc-item {
            background: rgba(255, 255, 255, .08);
            border-radius: 9px;
            padding: .625rem;
        }

        .wc-item-lbl {
            font-size: .58rem;
            color: rgba(255, 255, 255, .4);
            letter-spacing: .06em;
            text-transform: uppercase;
            margin-bottom: 2px;
        }

        .wc-item-val {
            font-size: .875rem;
            font-weight: 700;
            color: #fff;
        }

        .wc-advice {
            margin: .625rem 1.25rem 1.125rem;
            background: rgba(109, 189, 142, .15);
            border: 1px solid rgba(109, 189, 142, .25);
            border-radius: 10px;
            padding: .625rem .875rem;
            font-size: .72rem;
            color: rgba(184, 223, 200, .9);
            display: flex;
            align-items: flex-start;
            gap: 6px;
            line-height: 1.5;
        }

        .wc-advice svg {
            width: 13px;
            height: 13px;
            color: var(--mint);
            flex-shrink: 0;
            margin-top: 2px;
        }

        /* ══ COUNTDOWN ══ */
        .countdown-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 16px;
            padding: 1.125rem 1.25rem;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .cd-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            background: var(--amber-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .cd-icon svg {
            width: 26px;
            height: 26px;
            color: var(--amber);
        }

        .cd-num {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--amber);
            line-height: 1;
        }

        .cd-lbl {
            font-size: .72rem;
            font-weight: 600;
            color: var(--muted);
            margin-top: 2px;
        }

        .cd-bar {
            flex: 1;
        }

        .cd-bar-track {
            height: 6px;
            background: var(--fog);
            border-radius: 4px;
            overflow: hidden;
            margin-top: .5rem;
        }

        .cd-bar-fill {
            height: 100%;
            border-radius: 4px;
            background: linear-gradient(90deg, var(--amber), #f5c842);
        }

        /* ══ INFOS CARD (right sidebar) ══ */
        .info-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            margin-bottom: 1.25rem;
        }

        .ic-head {
            background: linear-gradient(135deg, var(--forest), #2a5c40);
            padding: .875rem 1.125rem;
        }

        .ic-head span {
            font-family: 'Playfair Display', serif;
            font-size: .95rem;
            color: #fff;
        }

        .ic-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: .625rem 1.125rem;
            border-bottom: 1px solid var(--border);
            font-size: .8125rem;
        }

        .ic-row:last-child {
            border-bottom: none;
        }

        .ic-key {
            color: var(--muted);
        }

        .ic-val {
            font-weight: 700;
            color: var(--text);
        }

        .ic-val.green {
            color: var(--sage);
        }

        .ic-val.amber {
            color: var(--amber);
        }

        .ic-val.rust {
            color: var(--rust);
        }

        /* ══ NEXT STAGE CONFIRM MODAL ══ */
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

        .confirm-box {
            background: var(--white);
            border-radius: 20px;
            width: min(480px, 92vw);
            box-shadow: 0 24px 80px rgba(0, 0, 0, .3);
            overflow: hidden;
        }

        .cb-header {
            background: linear-gradient(135deg, var(--forest), #2a5c40);
            padding: 1.375rem 1.625rem;
        }

        .cb-header h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.2rem;
            color: #fff;
            font-weight: 700;
        }

        .cb-header p {
            font-size: .72rem;
            color: rgba(184, 223, 200, .8);
            margin-top: 3px;
        }

        .cb-body {
            padding: 1.5rem 1.625rem;
        }

        .cb-stage-arrow {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.25rem;
        }

        .cb-stage {
            flex: 1;
            background: var(--parch);
            border: 1.5px solid var(--border);
            border-radius: 12px;
            padding: .875rem 1rem;
            text-align: center;
        }

        .cb-stage-em {
            font-size: 1.5rem;
            margin-bottom: 4px;
        }

        .cb-stage-lbl {
            font-size: .72rem;
            font-weight: 700;
            color: var(--muted);
        }

        .cb-stage.next-s {
            border-color: var(--sage);
            background: var(--fog);
        }

        .cb-stage.next-s .cb-stage-lbl {
            color: var(--forest);
        }

        .cb-arrow svg {
            width: 24px;
            height: 24px;
            color: var(--sage);
        }

        .cb-note {
            background: var(--amber-bg);
            border: 1.5px solid rgba(201, 138, 18, .2);
            border-radius: 10px;
            padding: .75rem 1rem;
            font-size: .78rem;
            color: #7a5800;
            line-height: 1.55;
            display: flex;
            gap: .625rem;
            align-items: flex-start;
            margin-bottom: 1.25rem;
        }

        .cb-note svg {
            width: 15px;
            height: 15px;
            color: var(--amber);
            flex-shrink: 0;
            margin-top: 2px;
        }

        .cb-footer {
            padding: 1rem 1.625rem;
            background: var(--fog);
            border-top: 1.5px solid var(--border);
            display: flex;
            justify-content: flex-end;
            gap: .625rem;
        }

        .cb-cancel {
            padding: .575rem 1.125rem;
            background: var(--white);
            border: 1.5px solid var(--border);
            color: var(--muted);
            font-weight: 600;
            font-size: .8125rem;
            font-family: 'Outfit', sans-serif;
            border-radius: 9px;
            cursor: pointer;
        }

        .cb-confirm {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: .575rem 1.375rem;
            background: var(--forest);
            color: #fff;
            font-weight: 700;
            font-size: .875rem;
            font-family: 'Outfit', sans-serif;
            border: none;
            border-radius: 9px;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(27, 58, 45, .22);
        }

        .cb-confirm:hover {
            background: var(--fern);
        }

        .cb-confirm svg {
            width: 14px;
            height: 14px;
        }

        /* ══ SCROLLBAR ══ */
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
            <a href="#" class="sb-link active"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064" />
                </svg>Cultures<span class="sb-badge">12</span></a>
            <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>Récoltes</a>
            <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7" />
                </svg>Stocks<span class="sb-badge">3</span></a>
            <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>Parcelles</a>
            <div class="sb-sec">Gestion</div>
            <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>Personnel</a>
            <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>Équipements</a>
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
        <div class="content">

            <!-- HERO -->
            <div class="hero">
                <div class="hero-img"
                    style="background:url('{{ $culture->typeCulture->imgUrl ? asset('storage/Cultures/' . $culture->typeCulture->imgUrl) :  asset('assets/unknowing.png')}}') center/cover;">
                    ></div>
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <div class="breadcrumb">
                        <a href="/cultures">Cultures</a>
                        <span class="breadcrumb-sep">›</span>
                        <a href="/cultures">Parcelle {{strtoupper(str($culture->field->name)->substr(0,1))}} —
                            {{$culture->field->name}}</a>
                        <span class="breadcrumb-sep">›</span>
                        <span class="breadcrumb-cur">{{ucfirst($culture->name)}}</span>
                    </div>
                    <div class="hero-bottom">
                        <div class="hero-bottom-left">
                            <div class="hero-eyebrow"> Phase : {{ucfirst($culture->cycle)}}</div>
                            <h1 class="hero-title"><em>{{ucfirst($culture->name)}}</em><br>Parcelle
                                {{strtoupper(str($culture->field->name)->substr(0,1))}} — {{$culture->field->name}}</h1>
                            <p class="hero-sub">
                                <span class="hero-sub-dot"></span>
                                <span>Saison {{ucfirst($culture->season)}}</span>
                                <span class="hero-sub-dot"></span>
                                <span>Responsable : {{ucfirst($culture->user->name)}}</span>
                                <span class="hero-sub-dot"></span>
                            </p>
                        </div>
                        <div class="hero-bottom-right">
                            <a href="/cultures/1/edit" class="hero-btn hb-outline">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Modifier
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @php
            $steps = ['planting','treatment','growth','harvest','done'];

            $labels = [
            'planting' => 'Semis',
            'treatment' => 'Traitement',
            'growth' => 'Croissance',
            'harvest' => 'Récolte',
            'done' => 'Terminé',
            ];
            $currentIndex = array_search($culture->cycle, $steps);
            @endphp

            <!-- CYCLE STEPPER -->
            <div class="stepper-wrap">
                <div class="stepper">

                    @foreach($steps as $index => $step)
                    <div class="step 
        {{ $index < $currentIndex ? 'done' : '' }}
        {{ $index == $currentIndex ? 'active' : '' }}" data-step="{{ $index }}">

                        <div class="step-bubble">

                            @if($index < $currentIndex) <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M5 13l4 4L19 7" />
                                </svg>

                                @elseif($index == $currentIndex)
                                {{ $step == 'harvest' ? '': ''}}
                                @else
                                @if($step == 'done')
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4" />
                                </svg>
                                @endif
                                @endif

                        </div>

                        <div class="step-label">
                            {{ $labels[$step] }}
                        </div>

                    </div>
                    @endforeach

                </div>
            </div>

            <!-- NEXT STEP BAR -->
            <div class="next-step-bar">
                <div class="nsb-left">
                    <div class="nsb-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="nsb-text">
                        <div class="nsb-label">Étape actuelle</div>
                        <div class="nsb-title">Récolte — Prête à être validée et passée en Terminé</div>
                    </div>
                </div>
                <button class="btn-next-step" onclick="openConfirm()">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                    </svg>
                    Passer à l'étape suivante
                </button>
            </div>

            <!-- BODY GRID -->
            <div class="body">

                <!-- LEFT COLUMN -->
                <div>

                    <!-- Metrics -->
                    <div class="metrics-strip">
                        <div class="metric">
                            <div class="metric-icon mi-amber"><svg fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg></div>
                            <div class="metric-lbl">Jours restants</div>
                            <div class="metric-val" id="daysLeft">{{$daysLeft}}</div>
                            <div class="metric-sub">avant récolte</div>
                        </div>
                        <div class="metric">
                            <div class="metric-icon mi-green"><svg fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg></div>
                            <div class="metric-lbl">Rendement prévu</div>
                            <div class="metric-val">{{$culture->quantite_prevu}}t</div>
                        </div>
                        <div class="metric">
                            <div class="metric-icon mi-blue"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg></div>
                            <div class="metric-lbl">Avancement</div>
                            <div class="metric-val">{{$progress}}%</div>
                            <div class="metric-sub">du cycle total</div>
                        </div>
                        <div class="metric">
                            <div class="metric-icon mi-green"><svg fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg></div>
                            <div class="metric-lbl">Santé culture</div>
                            <div class="metric-val">Bonne</div>
                            <div class="metric-sub">Aucune alerte</div>
                        </div>
                    </div>

                    <!-- Checklist par étape (sans colonne DB — stocké localStorage) -->
                    <div class="panel">
                        <div class="panel-head">
                            <span class="panel-title">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2m-6 9l2 2 4-4" />
                                </svg>
                                Checklist — Phase Récolte
                            </span>
                            <span class="panel-link" id="checkProgress">0 / 5 complétés</span>
                        </div>
                        <div class="panel-body">
                            <div class="checklist" id="checklist">
                                <div class="cl-item" data-id="c1" onclick="toggleCheck(this)">
                                    <div class="cl-check"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7" />
                                        </svg></div>
                                    <div class="cl-text">Vérifier la maturité des fruits (couleur, fermeté)</div>
                                    <span class="cl-priority pr-high">Urgent</span>
                                </div>
                                <div class="cl-item" data-id="c2" onclick="toggleCheck(this)">
                                    <div class="cl-check"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7" />
                                        </svg></div>
                                    <div class="cl-text">Préparer les caisses et équipements de récolte</div>
                                    <span class="cl-priority pr-high">Urgent</span>
                                </div>
                                <div class="cl-item" data-id="c3" onclick="toggleCheck(this)">
                                    <div class="cl-check"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7" />
                                        </svg></div>
                                    <div class="cl-text">Notifier le gestionnaire de stock de l'arrivée prévue</div>
                                    <span class="cl-priority pr-med">Moyen</span>
                                </div>
                                <div class="cl-item" data-id="c4" onclick="toggleCheck(this)">
                                    <div class="cl-check"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7" />
                                        </svg></div>
                                    <div class="cl-text">Arrêter l'irrigation 48h avant la récolte</div>
                                    <span class="cl-priority pr-med">Moyen</span>
                                </div>
                                <div class="cl-item" data-id="c5" onclick="toggleCheck(this)">
                                    <div class="cl-check"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7" />
                                        </svg></div>
                                    <div class="cl-text">Planifier le transport vers le lieu de stockage</div>
                                    <span class="cl-priority pr-low">Normal</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notes (localStorage, sans colonne DB) -->
                    <div class="panel">
                        <div class="panel-head">
                            <span class="panel-title">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Notes de terrain
                            </span>
                            <span class="notes-saved" id="notesSaved">✓ Sauvegardé</span>
                        </div>
                        <div class="panel-body">
                            <textarea class="notes-area" id="notesArea"
                                placeholder="Ajoutez vos observations de terrain : santé des plantes, conditions météo, problèmes détectés, actions à prendre..."></textarea>
                            <div class="notes-footer">
                                <span id="notesInfo">Stocké localement sur votre appareil</span>
                                <button class="notes-save" onclick="saveNotes()">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                    </svg>
                                    Sauvegarder
                                </button>
                            </div>
                        </div>
                    </div>


                </div><!-- /left col -->

                <!-- RIGHT COLUMN -->
                <div>

                    <!-- Countdown -->
                    <div class="countdown-card">
                        <div class="cd-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="cd-bar" style="flex:1;">
                            @if($progress === 100.0)
                            <div style="display:flex;justify-content:space-between;margin-bottom:.25rem;">
                                <span style="font-size:.72rem;font-weight:600;color:var(--muted);">Récolte Terminé le {{$culture->harvest_date->format('d M Y')}}</span>
                            </div>
                            <div style="display:flex;align-items:baseline;gap:.375rem;">
                                <span class="cd-num">0</span>
                                <span style="font-size:.8rem;color:var(--amber);font-weight:700;">Done</span>
                            </div>
                            @else
                            <div style="display:flex;justify-content:space-between;margin-bottom:.25rem;">
                                <span style="font-size:.72rem;font-weight:600;color:var(--muted);">Récolte prévue le {{$culture->harvest_date->format('d M Y')}}</span>
                            </div>
                            <div style="display:flex;align-items:baseline;gap:.375rem;">
                                <span class="cd-num">{{$daysLeft}}</span>
                                <span style="font-size:.8rem;color:var(--amber);font-weight:700;">jours restants</span>
                            </div>
                            @endif

                            <div class="cd-bar-track">
                                <div class="cd-bar-fill" style="width:{{$progress}}%"></div>
                            </div>
                            <div style="font-size:.65rem;color:var(--muted);margin-top:.25rem;">{{$progress}}% du cycle écoulé
                            </div>
                        </div>
                    </div>

                    <!-- Météo (agronomique) — sans DB -->
                    <div class="weather-card">
                        <div class="wc-top">
                            <div class="wc-left">
                                <div class="wc-loc">{{ $weather['name'] }}</div>
                                <div class="wc-temp">{{ round($weather['main']['temp']) }}°C</div>
                                <div class="wc-desc">{{ ucfirst($weather['weather'][0]['description']) }}</div>
                            </div>
                            <div class="wc-emoji">{{ $emoji }}</div>
                        </div>
                        <div class="wc-grid">
                            <div class="wc-item">
                                <div class="wc-item-lbl">Humidité</div>
                                <div class="wc-item-val">{{ $weather['main']['humidity'] }}%</div>
                            </div>
                            <div class="wc-item">
                                <div class="wc-item-lbl">Vent</div>
                                <div class="wc-item-val">{{ $weather['wind']['speed'] }} km/h</div>
                            </div>
                            <div class="wc-item">
                                <div class="wc-item-lbl">Pluie prévue</div>
                                <div class="wc-item-val">{{ $weather['rain']['1h'] ?? 0 }} mm</div>
                            </div>
                        </div>
                        <div class="wc-advice">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                            <span>
                                <strong>Conseil agronomique :</strong> {{ $advice }}
                            </span>
                        </div>
                    </div>

                    <!-- Infos de la culture -->
                    <div class="info-card">
                        <div class="ic-head"><span>Informations culture</span></div>
                        <div class="ic-row"><span class="ic-key">Name</span><span class="ic-val">{{ucfirst($culture->typeCulture->name)}}</span>
                        </div>
                        <div class="ic-row"><span class="ic-key">Parcelle</span><span class="ic-val">Parcelle {{strtoupper(str($culture->field->name)->substr(0,1))}} — {{$culture->field->name}}</span></div>
                        <div class="ic-row"><span class="ic-key">Type</span><span class="ic-val">{{ucfirst($culture->typeCulture->type)}}</span></div>
                        <div class="ic-row"><span class="ic-key">Cycle</span><span class="ic-val">{{ucfirst($culture->cycle)}}</span></div>
                        <div class="ic-row"><span class="ic-key">Saison</span><span class="ic-val">{{ucfirst($culture->season)}}{{$culture->planting_date->format('Y')}}</span></div>
                        <div class="ic-row"><span class="ic-key">Date semis</span><span class="ic-val">{{$culture->planting_date->format('d M Y')}}</span></div>
                        <div class="ic-row"><span class="ic-key">Date récolte</span><span class="ic-val amber">{{$culture->harvest_date->format('d M Y')}}</span></div>
                        <div class="ic-row"><span class="ic-key">Responsable</span><span class="ic-val">{{ucfirst($culture->user->name)}}</span></div>
                        <div class="ic-row"><span class="ic-key">Rendement prévu</span><span class="ic-val green">{{$culture->quantite_prevu}}
                                t</span></div>
                    </div>

                    <!-- Calculateur de rentabilité (sans DB — calculé côté client) -->
                    <div class="panel">
                        <div class="panel-head">
                            <span class="panel-title">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 11h.01M12 11h.01M15 11h.01M4 19h16a2 2 0 002-2V7a2 2 0 00-2-2H4a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Estimation de rentabilité
                            </span>
                        </div>
                        <div class="panel-body">
                            <div style="font-size:.72rem;color:var(--muted);margin-bottom:.875rem;">Calculé à partir du
                                rendement et des données du marché — aucune colonne DB requise.</div>
                            <div style="display:flex;flex-direction:column;gap:.5rem;">
                                <div
                                    style="display:flex;justify-content:space-between;font-size:.8125rem;padding:.5rem .75rem;background:var(--parch);border-radius:8px;">
                                    <span style="color:var(--muted);">Rendement prévu</span>
                                    <span style="font-weight:700;">1 800 kg</span>
                                </div>
                                <div
                                    style="display:flex;justify-content:space-between;font-size:.8125rem;padding:.5rem .75rem;background:var(--parch);border-radius:8px;">
                                    <span style="color:var(--muted);">Prix marché (Tomate)</span>
                                    <input id="priceInput" type="number" value="3.5" min="0" step="0.1"
                                        style="width:70px;text-align:right;font-weight:700;font-size:.8125rem;border:1.5px solid var(--border);border-radius:6px;padding:2px 6px;outline:none;font-family:'Outfit',sans-serif;"
                                        oninput="calcRevenue()" /> <span
                                        style="color:var(--muted);font-size:.72rem;align-self:center;"> DH/kg</span>
                                </div>
                                <div
                                    style="display:flex;justify-content:space-between;font-size:.8125rem;padding:.5rem .75rem;background:var(--fog);border-radius:8px;border:1.5px solid var(--dew);">
                                    <span style="color:var(--forest);font-weight:700;">Revenu estimé</span>
                                    <span style="font-weight:800;color:var(--forest);font-size:.95rem;"
                                        id="revenueDisplay">6 300 DH</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- /right col -->
            </div><!-- /body -->

        </div>
    </div>

    <!-- ══ CONFIRM MODAL ══ -->
    <div class="overlay" id="confirmModal" onclick="closeConfirmBg(event)">
        <div class="confirm-box">
            <div class="cb-header">
                <h3>Passer à l'étape suivante</h3>
                <p>Cette action met à jour le statut de la culture</p>
            </div>
            <div class="cb-body">
                <div class="cb-stage-arrow">
                    <div class="cb-stage">
                        <div class="cb-stage-em">🌾</div>
                        <div class="cb-stage-lbl">Récolte (actuel)</div>
                    </div>
                    <div class="cb-arrow"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                        </svg></div>
                    <div class="cb-stage next-s">
                        <div class="cb-stage-em">✅</div>
                        <div class="cb-stage-lbl">Terminé (suivant)</div>
                    </div>
                </div>
                <div class="cb-note">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Le statut sera mis à jour en base de données via <code
                            style="font-family:'DM Mono',monospace;font-size:.78rem;">PATCH /cultures/1</code>. Tous les
                        membres de l'équipe seront notifiés.</span>
                </div>
            </div>
            <div class="cb-footer">
                <button class="cb-cancel" onclick="closeConfirm()">Annuler</button>
                <form action="{{route('cultures.next', $culture)}}" method="post">
                    @csrf
                    @method('patch')
                    <button type="submit" class="cb-confirm" onclick="advanceStep()">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Confirmer l'avancement
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>