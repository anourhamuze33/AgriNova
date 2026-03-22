<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriNova — Admin · Validation Documents</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Outfit:wght@300;400;500;600;700&display=swap"
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
            --amber-bg: #fef3c7;
            --rust: #b84a1e;
            --rust-bg: #fef2ee;
            --blue: #2563eb;
            --blue-bg: #eff6ff;
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

        /* ══════ SIDEBAR ══════ */
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

        /* ══════ MAIN ══════ */
        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
            background: var(--parch);
        }

        .content {
            padding: 2.25rem 2.25rem 3rem;
            overflow-y: auto;
            flex: 1;
        }

        /* ══════ PAGE HEADER ══════ */
        .page-hdr {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 1.75rem;
            padding-bottom: 1.5rem;
            border-bottom: 1.5px solid var(--border);
        }

        .page-hdr-left {}

        .page-eyebrow {
            font-size: .65rem;
            font-weight: 700;
            color: var(--sage);
            letter-spacing: .14em;
            text-transform: uppercase;
            margin-bottom: .5rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .page-eyebrow::before {
            content: '';
            width: 20px;
            height: 2px;
            background: var(--sage);
            border-radius: 2px;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--forest);
            line-height: 1.05;
            letter-spacing: -.02em;
        }

        .page-sub {
            font-size: .875rem;
            color: var(--muted);
            margin-top: .5rem;
        }

        .page-hdr-right {
            display: flex;
            align-items: center;
            gap: .75rem;
        }

        /* ══════ STATS ROW ══════ */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            margin-bottom: 1.75rem;
        }

        .st-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 14px;
            padding: 1.125rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: box-shadow .2s;
        }

        .st-card:hover {
            box-shadow: 0 4px 18px rgba(27, 58, 45, .08);
        }

        .st-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .st-icon svg {
            width: 22px;
            height: 22px;
        }

        .st-icon.amber {
            background: rgba(201, 138, 18, .12);
            color: var(--amber);
        }

        .st-icon.green {
            background: rgba(74, 140, 104, .12);
            color: var(--sage);
        }

        .st-icon.red {
            background: rgba(184, 74, 30, .1);
            color: var(--rust);
        }

        .st-icon.blue {
            background: rgba(37, 99, 235, .1);
            color: var(--blue);
        }

        .st-num {
            font-family: 'Playfair Display', serif;
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--forest);
            line-height: 1;
        }

        .st-lbl {
            font-size: .72rem;
            font-weight: 600;
            color: var(--muted);
            margin-top: 2px;
        }

        /* ══════ FILTER BAR ══════ */
        .filter-bar {
            display: flex;
            align-items: center;
            gap: .75rem;
            margin-bottom: 1.375rem;
            flex-wrap: wrap;
        }

        .filter-tab {
            padding: .45rem 1rem;
            border-radius: 20px;
            font-size: .8rem;
            font-weight: 700;
            cursor: pointer;
            border: 1.5px solid var(--border);
            background: var(--white);
            color: var(--muted);
            transition: all .18s;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .filter-tab:hover {
            border-color: var(--sage);
            color: var(--fern);
        }

        .filter-tab.active {
            background: var(--forest);
            border-color: var(--forest);
            color: #fff;
        }

        .filter-count {
            background: rgba(255, 255, 255, .25);
            border-radius: 20px;
            padding: 1px 7px;
            font-size: .65rem;
            font-weight: 700;
        }

        .filter-tab:not(.active) .filter-count {
            background: var(--fog);
            color: var(--muted);
        }

        .search-bar {
            display: flex;
            align-items: center;
            gap: 7px;
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 10px;
            padding: .45rem .875rem;
            margin-left: auto;
            transition: border-color .2s;
        }

        .search-bar:focus-within {
            border-color: var(--sage);
        }

        .search-bar svg {
            width: 15px;
            height: 15px;
            color: var(--muted);
        }

        .search-bar input {
            border: none;
            outline: none;
            background: transparent;
            font-size: .8125rem;
            font-family: 'Outfit', sans-serif;
            color: var(--text);
            width: 180px;
        }

        .search-bar input::placeholder {
            color: #aab5a4;
        }

        /* ══════ WORKER CARDS TABLE ══════ */
        .workers-list {
            display: flex;
            flex-direction: column;
            gap: .875rem;
        }

        .worker-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 18px;
            overflow: hidden;
            transition: box-shadow .2s, border-color .2s;
        }

        .worker-card:hover {
            box-shadow: 0 6px 24px rgba(27, 58, 45, .09);
            border-color: var(--dew);
        }

        /* Card top row */
        .wc-top {
            display: flex;
            align-items: center;
            gap: 1.125rem;
            padding: 1.125rem 1.375rem;
            cursor: pointer;
        }

        .wc-avatar {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--forest), var(--sage));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .9rem;
            font-weight: 700;
            color: #fff;
            flex-shrink: 0;
            border: 2px solid var(--dew);
        }

        .wc-info {
            flex: 1;
            min-width: 0;
        }

        .wc-name {
            font-family: 'Playfair Display', serif;
            font-size: 1rem;
            font-weight: 700;
            color: var(--forest);
        }

        .wc-meta {
            font-size: .72rem;
            color: var(--muted);
            margin-top: 3px;
            display: flex;
            align-items: center;
            gap: .5rem;
            flex-wrap: wrap;
        }

        .wc-meta-dot {
            width: 3px;
            height: 3px;
            border-radius: 50%;
            background: var(--dew);
        }

        .wc-role-badge {
            font-size: .62rem;
            font-weight: 800;
            letter-spacing: .06em;
            text-transform: uppercase;
            padding: 3px 10px;
            border-radius: 20px;
        }

        .role-agri {
            background: rgba(74, 140, 104, .12);
            color: var(--sage);
        }

        .role-stock {
            background: rgba(37, 99, 235, .1);
            color: var(--blue);
        }

        .role-ouv {
            background: rgba(201, 138, 18, .12);
            color: var(--amber);
        }

        .role-admin {
            background: rgba(27, 58, 45, .1);
            color: var(--forest);
        }

        .wc-status-badge {
            font-size: .65rem;
            font-weight: 800;
            letter-spacing: .05em;
            text-transform: uppercase;
            padding: 5px 14px;
            border-radius: 20px;
            flex-shrink: 0;
        }

        .status-pending {
            background: var(--amber-bg);
            color: var(--amber);
        }

        .status-approved {
            background: var(--fog);
            color: var(--sage);
        }

        .status-rejected {
            background: var(--rust-bg);
            color: var(--rust);
        }

        .wc-toggle {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--fog);
            border: 1.5px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            cursor: pointer;
            transition: background .18s;
        }

        .wc-toggle:hover {
            background: var(--dew);
        }

        .wc-toggle svg {
            width: 15px;
            height: 15px;
            color: var(--muted);
            transition: transform .25s;
        }

        .wc-toggle.open svg {
            transform: rotate(180deg);
        }

        /* Expanded docs section */
        .wc-docs {
            display: none;
            border-top: 1.5px solid var(--border);
            padding: 1.25rem 1.375rem;
            background: var(--parch);
        }

        .wc-docs.open {
            display: block;
        }

        .docs-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1.25rem;
        }

        .doc-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 14px;
            overflow: hidden;
        }

        .doc-preview {
            height: 150px;
            background: var(--fog);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .doc-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .doc-preview-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: .625rem;
        }

        .doc-preview-placeholder svg {
            width: 36px;
            height: 36px;
            color: var(--dew);
        }

        .doc-preview-placeholder span {
            font-size: .72rem;
            color: var(--muted);
            font-weight: 500;
        }

        .doc-type-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background: rgba(27, 58, 45, .85);
            border-radius: 20px;
            padding: 3px 10px;
            font-size: .6rem;
            font-weight: 700;
            color: #fff;
            letter-spacing: .05em;
            text-transform: uppercase;
        }

        .doc-view-btn {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: rgba(255, 255, 255, .92);
            border: 1px solid rgba(27, 58, 45, .15);
            border-radius: 20px;
            padding: 4px 12px;
            font-size: .65rem;
            font-weight: 700;
            color: var(--forest);
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: background .18s;
        }

        .doc-view-btn:hover {
            background: #fff;
        }

        .doc-view-btn svg {
            width: 12px;
            height: 12px;
        }

        .doc-info {
            padding: .75rem;
        }

        .doc-title {
            font-size: .8125rem;
            font-weight: 700;
            color: var(--text);
        }

        .doc-meta {
            font-size: .68rem;
            color: var(--muted);
            margin-top: 3px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .doc-size {
            font-size: .65rem;
            color: var(--muted);
        }

        /* Doc status tag */
        .doc-status {
            font-size: .6rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .05em;
            padding: 2px 8px;
            border-radius: 20px;
        }

        .doc-ok {
            background: var(--fog);
            color: var(--sage);
        }

        .doc-warn {
            background: var(--amber-bg);
            color: var(--amber);
        }

        .doc-miss {
            background: var(--rust-bg);
            color: var(--rust);
        }

        /* Action buttons */
        .wc-actions {
            display: flex;
            align-items: center;
            gap: .75rem;
            padding-top: 1.125rem;
            border-top: 1px solid var(--border);
            flex-wrap: wrap;
        }

        .wc-actions-left {
            flex: 1;
            min-width: 0;
        }

        .wc-note-label {
            font-size: .72rem;
            font-weight: 600;
            color: var(--muted);
            margin-bottom: .375rem;
        }

        .wc-note {
            width: 100%;
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 9px;
            padding: .5rem .75rem;
            font-size: .8125rem;
            font-family: 'Outfit', sans-serif;
            color: var(--text);
            outline: none;
            resize: none;
            height: 60px;
            transition: border-color .2s;
        }

        .wc-note:focus {
            border-color: var(--sage);
        }

        .wc-note::placeholder {
            color: #aab5a4;
        }

        .wc-actions-right {
            display: flex;
            gap: .625rem;
            flex-shrink: 0;
        }

        .btn-reject {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: .5625rem 1.125rem;
            background: var(--rust-bg);
            border: 1.5px solid rgba(184, 74, 30, .25);
            border-radius: 10px;
            color: var(--rust);
            font-weight: 700;
            font-size: .8125rem;
            font-family: 'Outfit', sans-serif;
            cursor: pointer;
            transition: all .18s;
        }

        .btn-reject:hover {
            background: rgba(184, 74, 30, .15);
            border-color: var(--rust);
        }

        .btn-reject svg {
            width: 15px;
            height: 15px;
        }

        .btn-approve {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: .5625rem 1.375rem;
            background: var(--forest);
            border: none;
            border-radius: 10px;
            color: #fff;
            font-weight: 700;
            font-size: .8125rem;
            font-family: 'Outfit', sans-serif;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(27, 58, 45, .22);
            transition: all .18s;
        }

        .btn-approve:hover {
            background: var(--fern);
            box-shadow: 0 6px 18px rgba(27, 58, 45, .28);
        }

        .btn-approve svg {
            width: 15px;
            height: 15px;
        }

        /* Status override for already decided */
        .wc-decided-banner {
            display: flex;
            align-items: center;
            gap: .75rem;
            padding: .875rem 1rem;
            border-radius: 10px;
            font-size: .8125rem;
            font-weight: 600;
            width: 100%;
        }

        .wc-decided-banner.approved {
            background: var(--fog);
            color: var(--sage);
            border: 1.5px solid var(--dew);
        }

        .wc-decided-banner.rejected {
            background: var(--rust-bg);
            color: var(--rust);
            border: 1.5px solid rgba(184, 74, 30, .2);
        }

        .wc-decided-banner svg {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
        }

        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 18px;
        }

        .empty-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .empty-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
            color: var(--forest);
            margin-bottom: .5rem;
        }

        .empty-sub {
            font-size: .875rem;
            color: var(--muted);
        }

        /* modal overlay */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(10, 20, 14, .6);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(4px);
        }

        .modal-overlay.open {
            display: flex;
        }

        .modal {
            background: var(--white);
            border-radius: 20px;
            width: min(600px, 92vw);
            max-height: 88vh;
            overflow-y: auto;
            box-shadow: 0 24px 80px rgba(0, 0, 0, .35);
        }

        .modal-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.25rem 1.5rem;
            border-bottom: 1.5px solid var(--border);
            position: sticky;
            top: 0;
            background: var(--white);
            z-index: 2;
        }

        .modal-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--forest);
        }

        .modal-close {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--fog);
            border: 1.5px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background .18s;
        }

        .modal-close:hover {
            background: var(--dew);
        }

        .modal-close svg {
            width: 15px;
            height: 15px;
            color: var(--muted);
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-img {
            width: 100%;
            border-radius: 12px;
            border: 1.5px solid var(--border);
        }

        .modal-doc-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-top: 1rem;
            padding: 1rem;
            background: var(--fog);
            border-radius: 10px;
            font-size: .8125rem;
        }

        .modal-doc-meta strong {
            color: var(--forest);
        }

        .modal-doc-meta span {
            color: var(--muted);
        }

        /* Utility */
        .hidden {
            display: none !important;
        }

        .btn-icon {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: .5rem 1rem;
            border-radius: 10px;
            font-size: .8rem;
            font-weight: 700;
            font-family: 'Outfit', sans-serif;
            cursor: pointer;
            transition: all .18s;
            text-decoration: none;
        }

        .btn-icon.outline {
            background: var(--white);
            border: 1.5px solid var(--border);
            color: var(--muted);
        }

        .btn-icon.outline:hover {
            background: var(--fog);
            border-color: var(--sage);
            color: var(--fern);
        }

        .btn-icon svg {
            width: 14px;
            height: 14px;
        }
    </style>
</head>

<body>

    <!-- ══════ SIDEBAR ══════ -->
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
                <line x1="28.5" y1="7" x2="29.5" y2="5.8" stroke="#f7e96e" stroke-width="1.3" stroke-linecap="round"
                    opacity="0.75" />
                <line x1="19.5" y1="7" x2="18.5" y2="5.8" stroke="#f7e96e" stroke-width="1.3" stroke-linecap="round"
                    opacity="0.75" />
            </svg>
            <div>
                <div class="sb-brand">AgriNova</div>
                <div class="sb-tagline">Administration</div>
            </div>
        </a>

        <div class="sb-nav">
            <div class="sb-sec">Tableau de bord</div>
            <a href="#" class="sb-link">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Vue d'ensemble
            </a>
            <a href="#" class="sb-link active">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Validation Comptes
                <span class="sb-badge">5</span>
            </a>
            <a href="#" class="sb-link">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Tous les Utilisateurs
            </a>

            <div class="sb-sec">Gestion</div>
            <a href="#" class="sb-link">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064" />
                </svg>
                Cultures
            </a>
            <a href="#" class="sb-link">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7" />
                </svg>
                Stocks
            </a>
            <a href="#" class="sb-link">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                Rapports
            </a>

            <div class="sb-sec">Compte</div>
            <a href="#" class="sb-link">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Paramètres
            </a>
            <a href="/logout" class="sb-link">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Déconnexion
            </a>
        </div>

        <div class="sb-footer">
            <div class="sb-user">
                <div class="sb-avatar">AD</div>
                <div>
                    <div class="sb-uname">Administrateur</div>
                    <div class="sb-urole">Super Admin</div>
                </div>
            </div>
        </div>
    </aside>

    <!-- ══════ MAIN ══════ -->
    <div class="main">
        <div class="content">

            <!-- Page header -->
            <div class="page-hdr">
                <div class="page-hdr-left">
                    <div class="page-eyebrow">Administration</div>
                    <h1 class="page-title">Validation des Comptes</h1>
                    <p class="page-sub">Vérifiez les documents soumis et activez les comptes professionnels</p>
                </div>
                <div class="page-hdr-right">
                    <a href="#" class="btn-icon outline">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Exporter
                    </a>
                </div>
            </div>

            <!-- Stats -->
            <div class="stats-row">
                <div class="st-card">
                    <div class="st-icon amber"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg></div>
                    <div>
                        <div class="st-num">5</div>
                        <div class="st-lbl">En attente</div>
                    </div>
                </div>
                <div class="st-card">
                    <div class="st-icon green"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg></div>
                    <div>
                        <div class="st-num">23</div>
                        <div class="st-lbl">Approuvés</div>
                    </div>
                </div>
                <div class="st-card">
                    <div class="st-icon red"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg></div>
                    <div>
                        <div class="st-num">3</div>
                        <div class="st-lbl">Refusés</div>
                    </div>
                </div>
                <div class="st-card">
                    <div class="st-icon blue"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg></div>
                    <div>
                        <div class="st-num">31</div>
                        <div class="st-lbl">Total inscrits</div>
                    </div>
                </div>
            </div>

            <!-- Filter bar -->
            <div class="filter-bar">
                <button class="filter-tab active" onclick="filterCards('all',this)">
                    Tous <span class="filter-count">31</span>
                </button>
                <button class="filter-tab" onclick="filterCards('pending',this)">
                    ⏳ En attente <span class="filter-count">5</span>
                </button>
                <button class="filter-tab" onclick="filterCards('approved',this)">
                    ✅ Approuvés <span class="filter-count">23</span>
                </button>
                <button class="filter-tab" onclick="filterCards('rejected',this)">
                    ❌ Refusés <span class="filter-count">3</span>
                </button>
                <div class="search-bar">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" placeholder="Rechercher un utilisateur..." oninput="searchCards(this.value)">
                </div>
            </div>

            <!-- Workers list -->
            <div class="workers-list" id="workersList">
                @foreach($usersDemanding as $user)
                <div class="worker-card" data-name="{{$user->name}}">
                    <div class="wc-top" onclick="toggleCard(this)">
                        <div class="wc-avatar">{{strtoupper(substr($user->name, 0, 2))}}</div>
                        <div class="wc-info">
                            <div class="wc-name">{{$user->name}}</div>
                            <div class="wc-meta">
                                <span>m_{{$user->name}}</span>
                                <span class="wc-meta-dot"></span>
                                <span>{{$user->email}}</span>
                                <span class="wc-meta-dot"></span>
                                <span>{{$user->ville_id}}</span>
                                <span class="wc-meta-dot"></span>
                                <span>Inscrit le 14 Mars 2026</span>
                            </div>
                        </div>
                        <span class="wc-role-badge role-agri">{{$user->role_id}}</span>
                        <span class="wc-status-badge 
                        {{ $user->demandes[0]->status == 'approved' ? 'status-approved' : 
                        ($user->demandes[0]->status == 'rejected' ? 'status-rejected' : 'status-pending') }}">
                            {{ $user->demandes[0]->status }}
                        </span>
                        <div class="wc-toggle">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                    <div class="wc-docs">
                        <div class="docs-grid">
                            <!-- Diplôme -->
                            <div class="doc-card">
                                <div class="doc-preview">
                                    <img src="../assets/docs.jpg" alt="Diplôme">
                                    <span class="doc-type-badge">Diplôme</span>
                                    <a href="{{route('file.Diplome.show', $user->lienDiplome)}}" target="_blank">
                                        <button class="doc-view-btn">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            Voir
                                        </button>
                                    </a>
                                </div>
                                <div class="doc-info">
                                    <div class="doc-title">Diplôme d'Agriculture</div>
                                    <div class="doc-meta">
                                        <span class="doc-size">{{strtoupper($user->diplome_info[0])}} ·
                                            {{strtoupper($user->diplome_info[1])}}</span>
                                        <span class="doc-status doc-ok">Soumis</span>
                                    </div>
                                </div>
                            </div>
                            <!-- CIN -->
                            <div class="doc-card">
                                <div class="doc-preview">
                                    <img class="img" src="../assets/docs.jpg" alt="CIN">
                                    <span class="doc-type-badge">CIN</span>
                                    <a href="{{route('file.CIN.show', $user->lienCIN)}}" target="_blank">
                                        <button class="doc-view-btn">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            Voir
                                        </button>
                                    </a>
                                </div>
                                <div class="doc-info">
                                    <div class="doc-title">Carte d'Identité Nationale</div>
                                    <div class="doc-meta">
                                        <span class="doc-size">{{strtoupper($user->cin_info[0])}} ·
                                            {{strtoupper($user->cin_info[1])}}</span>
                                        <span class="doc-status doc-ok">Soumis</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($user->demandes[0]->status == 'approved')
                        <div class="wc-decided-banner approved">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                style="width:18px;height:18px;flex-shrink:0">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Compte approuvé à l'instant{{$user->demandes[0]->notes ? ' · Note : ' .
                            $user->demandes[0]->notes : ''}} — Utilisateur désormais actif
                        </div>

                        @elseif($user->demandes[0]->status == 'rejected')
                        <div class="wc-decided-banner rejected">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                style="width:18px;height:18px;flex-shrink:0">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Compte refusé à l'instant{{$user->demandes[0]->notes ? ' · Note : ' .
                            $user->demandes[0]->notes : ''}} — Notification envoyée à
                            l'utilisateur
                        </div>
                        @else
                        <form action="{{route('acceptOrRefuse', $user)}}" method="POST" class="wc-actions">
                            @csrf
                            <div class="wc-actions-left">
                                <div class="wc-note-label">Note administrative (optionnel)</div>
                                <textarea class="wc-note" name="note"
                                    placeholder="Ajouter une remarque sur ce dossier..."></textarea>
                            </div>
                            <input type="hidden" name="type" id="hiddenType" value="">
                            <div class="wc-actions-right">
                                <button type="submit" class="btn-reject btnType" data-type="rejected">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Refuser
                                </button>

                                <button type="submit" class="btn-approve btnType" data-type="approved">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Approuver le compte
                                </button>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>

                @endforeach
                <!-- ── WORKER 2 — Pending, missing CIN ── -->
                <div class="worker-card" data-status="pending" data-name="Karim Benali">
                    <div class="wc-top" onclick="toggleCard(this)">
                        <div class="wc-avatar" style="background:linear-gradient(135deg,#2563eb,#6dbd8e)">KB</div>
                        <div class="wc-info">
                            <div class="wc-name">Karim Benali</div>
                            <div class="wc-meta">
                                <span>k_benali</span>
                                <span class="wc-meta-dot"></span>
                                <span>k.benali@farm.ma</span>
                                <span class="wc-meta-dot"></span>
                                <span>Agadir</span>
                                <span class="wc-meta-dot"></span>
                                <span>Inscrit le 15 Mars 2026</span>
                            </div>
                        </div>
                        <span class="wc-role-badge role-stock">Gest. Stock</span>
                        <span class="wc-status-badge status-pending">⏳ En attente</span>
                        <div class="wc-toggle">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                    <div class="wc-docs">
                        <div class="docs-grid">
                            <div class="doc-card">
                                <div class="doc-preview">
                                    <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=400&q=70&fit=crop"
                                        alt="Diplôme">
                                    <span class="doc-type-badge">📄 Diplôme</span>
                                    <button class="doc-view-btn"
                                        onclick="openModal('Diplôme — Karim Benali','https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=800&q=80','PDF · 2.1 MB · Soumis le 15 Mars 2026')">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Voir
                                    </button>
                                </div>
                                <div class="doc-info">
                                    <div class="doc-title">Attestation Gestion Stock</div>
                                    <div class="doc-meta"><span class="doc-size">PDF · 2.1 MB</span><span
                                            class="doc-status doc-ok">Soumis</span></div>
                                </div>
                            </div>
                            <div class="doc-card">
                                <div class="doc-preview">
                                    <div class="doc-preview-placeholder">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <span>Non soumis</span>
                                    </div>
                                    <span class="doc-type-badge">🪪 CIN</span>
                                </div>
                                <div class="doc-info">
                                    <div class="doc-title">Carte d'Identité Nationale</div>
                                    <div class="doc-meta"><span class="doc-size">—</span><span
                                            class="doc-status doc-miss">Manquant</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="wc-actions">
                            <div class="wc-actions-left">
                                <div class="wc-note-label">Note administrative (optionnel)</div>
                                <textarea class="wc-note"
                                    placeholder="ex: CIN manquante, demander le document..."></textarea>
                            </div>
                            <div class="wc-actions-right">
                                <button class="btn-reject" onclick="updateStatus(this,'rejected')">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Refuser
                                </button>
                                <button class="btn-approve" onclick="updateStatus(this,'approved')">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Approuver le compte
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ── WORKER 3 — Pending ── -->
                <div class="worker-card" data-status="pending" data-name="Fatima Ouzir">
                    <div class="wc-top" onclick="toggleCard(this)">
                        <div class="wc-avatar" style="background:linear-gradient(135deg,#c98a12,#4a8c68)">FO</div>
                        <div class="wc-info">
                            <div class="wc-name">Fatima Ouzir</div>
                            <div class="wc-meta">
                                <span>f_ouzir</span>
                                <span class="wc-meta-dot"></span>
                                <span>fatima.ouzir@agri.ma</span>
                                <span class="wc-meta-dot"></span>
                                <span>Fès</span>
                                <span class="wc-meta-dot"></span>
                                <span>Inscrit le 16 Mars 2026</span>
                            </div>
                        </div>
                        <span class="wc-role-badge role-agri">Agriculteur</span>
                        <span class="wc-status-badge status-pending">⏳ En attente</span>
                        <div class="wc-toggle">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                    <div class="wc-docs">
                        <div class="docs-grid">
                            <div class="doc-card">
                                <div class="doc-preview">
                                    <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=400&q=70&fit=crop"
                                        alt="Diplôme">
                                    <span class="doc-type-badge">📄 Diplôme</span>
                                    <button class="doc-view-btn"
                                        onclick="openModal('Diplôme — Fatima Ouzir','https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=800&q=80','JPG · 1.8 MB · Soumis le 16 Mars 2026')">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Voir
                                    </button>
                                </div>
                                <div class="doc-info">
                                    <div class="doc-title">Brevet Technicien Agricole</div>
                                    <div class="doc-meta"><span class="doc-size">JPG · 1.8 MB</span><span
                                            class="doc-status doc-ok">Soumis</span></div>
                                </div>
                            </div>
                            <div class="doc-card">
                                <div class="doc-preview">
                                    <img src="https://images.unsplash.com/photo-1578926288207-32356a8e5437?w=400&q=70&fit=crop"
                                        alt="CIN">
                                    <span class="doc-type-badge">🪪 CIN</span>
                                    <button class="doc-view-btn"
                                        onclick="openModal('Carte d\'Identité — Fatima Ouzir','https://images.unsplash.com/photo-1578926288207-32356a8e5437?w=800&q=80','JPG · 0.6 MB · Soumis le 16 Mars 2026')">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Voir
                                    </button>
                                </div>
                                <div class="doc-info">
                                    <div class="doc-title">Carte d'Identité Nationale</div>
                                    <div class="doc-meta"><span class="doc-size">JPG · 0.6 MB</span><span
                                            class="doc-status doc-ok">Soumis</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="wc-actions">
                            <div class="wc-actions-left">
                                <div class="wc-note-label">Note administrative (optionnel)</div>
                                <textarea class="wc-note"
                                    placeholder="Ajouter une remarque sur ce dossier..."></textarea>
                            </div>
                            <div class="wc-actions-right">
                                <button class="btn-reject" onclick="updateStatus(this,'rejected')">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Refuser
                                </button>
                                <button class="btn-approve" onclick="updateStatus(this,'approved')">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Approuver le compte
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ── WORKER 4 — Approved ── -->
                <div class="worker-card" data-status="approved" data-name="Said El Mansouri">
                    <div class="wc-top" onclick="toggleCard(this)">
                        <div class="wc-avatar" style="background:linear-gradient(135deg,#1b3a2d,#6dbd8e)">SM</div>
                        <div class="wc-info">
                            <div class="wc-name">Said El Mansouri</div>
                            <div class="wc-meta">
                                <span>s_mansouri</span>
                                <span class="wc-meta-dot"></span>
                                <span>said.mansouri@farm.ma</span>
                                <span class="wc-meta-dot"></span>
                                <span>Casablanca</span>
                                <span class="wc-meta-dot"></span>
                                <span>Approuvé le 12 Mars 2026</span>
                            </div>
                        </div>
                        <span class="wc-role-badge role-ouv">Ouvrier</span>
                        <span class="wc-status-badge status-approved">✅ Approuvé</span>
                        <div class="wc-toggle">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                    <div class="wc-docs">
                        <div class="docs-grid">
                            <div class="doc-card">
                                <div class="doc-preview">
                                    <img src="https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?w=400&q=70&fit=crop"
                                        alt="Diplôme">
                                    <span class="doc-type-badge">📄 Diplôme</span>
                                    <button class="doc-view-btn"
                                        onclick="openModal('Diplôme — Said El Mansouri','https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?w=800&q=80','PDF · 0.9 MB · Soumis le 10 Mars 2026')">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Voir
                                    </button>
                                </div>
                                <div class="doc-info">
                                    <div class="doc-title">Certificat Formation Agricole</div>
                                    <div class="doc-meta"><span class="doc-size">PDF · 0.9 MB</span><span
                                            class="doc-status doc-ok">Vérifié ✓</span></div>
                                </div>
                            </div>
                            <div class="doc-card">
                                <div class="doc-preview">
                                    <div class="doc-preview-placeholder">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <span>Non fourni</span>
                                    </div>
                                    <span class="doc-type-badge">🪪 CIN</span>
                                </div>
                                <div class="doc-info">
                                    <div class="doc-title">Carte d'Identité Nationale</div>
                                    <div class="doc-meta"><span class="doc-size">—</span><span
                                            class="doc-status doc-warn">Optionnel</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="wc-actions">
                            <div class="wc-decided-banner approved">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Compte approuvé le 12 Mars 2026 — Utilisateur actif sur la plateforme
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ── WORKER 5 — Rejected ── -->
                <div class="worker-card" data-status="rejected" data-name="Hassan Tazi">
                    <div class="wc-top" onclick="toggleCard(this)">
                        <div class="wc-avatar" style="background:linear-gradient(135deg,#b84a1e,#c98a12)">HT</div>
                        <div class="wc-info">
                            <div class="wc-name">Hassan Tazi</div>
                            <div class="wc-meta">
                                <span>h_tazi</span>
                                <span class="wc-meta-dot"></span>
                                <span>h.tazi@domain.ma</span>
                                <span class="wc-meta-dot"></span>
                                <span>Rabat</span>
                                <span class="wc-meta-dot"></span>
                                <span>Refusé le 10 Mars 2026</span>
                            </div>
                        </div>
                        <span class="wc-role-badge role-agri">Agriculteur</span>
                        <span class="wc-status-badge status-rejected">❌ Refusé</span>
                        <div class="wc-toggle">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                    <div class="wc-docs">
                        <div class="docs-grid">
                            <div class="doc-card">
                                <div class="doc-preview">
                                    <div class="doc-preview-placeholder">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <span>Non soumis</span>
                                    </div>
                                    <span class="doc-type-badge">📄 Diplôme</span>
                                </div>
                                <div class="doc-info">
                                    <div class="doc-title">Diplôme / Attestation</div>
                                    <div class="doc-meta"><span class="doc-size">—</span><span
                                            class="doc-status doc-miss">Manquant</span></div>
                                </div>
                            </div>
                            <div class="doc-card">
                                <div class="doc-preview">
                                    <div class="doc-preview-placeholder">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <span>Non soumis</span>
                                    </div>
                                    <span class="doc-type-badge">🪪 CIN</span>
                                </div>
                                <div class="doc-info">
                                    <div class="doc-title">Carte d'Identité Nationale</div>
                                    <div class="doc-meta"><span class="doc-size">—</span><span
                                            class="doc-status doc-miss">Manquant</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="wc-actions">
                            <div class="wc-decided-banner rejected">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Compte refusé le 10 Mars 2026 — Documents obligatoires manquants (Diplôme + CIN)
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- /workers-list -->

        </div><!-- /content -->
    </div><!-- /main -->

    <!-- ══════ DOCUMENT MODAL ══════ -->
    <div class="modal-overlay" id="docModal" onclick="closeModalOnBg(event)">
        <div class="modal">
            <div class="modal-head">
                <span class="modal-title" id="modalTitle">Document</span>
                <div class="modal-close" onclick="closeModal()">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
            <div class="modal-body">
                <img id="modalImg" class="modal-img" src="" alt="Document">
                <div class="modal-doc-meta">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        style="width:16px;height:16px;color:#4a8c68;flex-shrink:0">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span id="modalMeta" style="color:#5a6b55;font-size:.8125rem;"></span>
                </div>
            </div>
        </div>
    </div>

    <script>
        const btns = document.querySelectorAll(".btnType");
const hiddenType = document.querySelector('#hiddenType');

btns.forEach(btn => {
    btn.addEventListener('click', (e) => {
        hiddenType.value = btn.dataset.type;
    });
});

        // Toggle worker card expand/collapse
function toggleCard(topEl) {
  const card = topEl.closest('.worker-card');
  const docs = card.querySelector('.wc-docs');
  const toggle = topEl.querySelector('.wc-toggle');
  const isOpen = docs.classList.contains('open');
  // Close all others
  document.querySelectorAll('.wc-docs.open').forEach(d => {
    d.classList.remove('open');
    d.closest('.worker-card').querySelector('.wc-toggle').classList.remove('open');
  });
  if (!isOpen) {
    docs.classList.add('open');
    toggle.classList.add('open');
  }
}

// Filter tabs
function filterCards(status, btn) {
  document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
  btn.classList.add('active');
  document.querySelectorAll('.worker-card').forEach(card => {
    if (status === 'all' || card.dataset.status === status) {
      card.style.display = '';
    } else {
      card.style.display = 'none';
    }
  });
}

// Search
function searchCards(val) {
  const q = val.toLowerCase();
  document.querySelectorAll('.worker-card').forEach(card => {
    const name = card.dataset.name.toLowerCase();
    card.style.display = name.includes(q) ? '' : 'none';
  });
}

// Modal
function openModal(title, imgSrc, meta) {
  document.getElementById('modalTitle').textContent = title;
  document.getElementById('modalImg').src = imgSrc;
  document.getElementById('modalMeta').textContent = meta;
  document.getElementById('docModal').classList.add('open');
}
function closeModal() {
  document.getElementById('docModal').classList.remove('open');
}
function closeModalOnBg(e) {
  if (e.target === document.getElementById('docModal')) closeModal();
}
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });
    </script>
</body>

</html>