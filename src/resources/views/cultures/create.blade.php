<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriNova — Ajouter une Culture</title>
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
            --rust: #b84a1e;
            --blue: #2563eb;
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
            background: var(--parch);
        }

        .content {
            padding: 2.25rem 2.5rem 3rem;
            overflow-y: auto;
            flex: 1;
        }

        /* ══ PAGE HEADER ══ */
        .page-hdr {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1.5px solid var(--border);
        }

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

        .page-title em {
            font-style: italic;
            color: var(--sage);
        }

        .page-sub {
            font-size: .875rem;
            color: var(--muted);
            margin-top: .5rem;
        }

        .btn-back {
            display: flex;
            align-items: center;
            gap: 7px;
            padding: .6rem 1.125rem;
            background: var(--white);
            border: 1.5px solid var(--border);
            color: var(--muted);
            font-weight: 600;
            font-size: .8125rem;
            font-family: 'Outfit', sans-serif;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            transition: background .2s;
        }

        .btn-back:hover {
            background: var(--fog);
            color: var(--fern);
        }

        .btn-back svg {
            width: 14px;
            height: 14px;
        }

        /* ══ MAIN LAYOUT — Left form + Right preview ══ */
        .form-layout {
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 1.75rem;
            align-items: start;
        }

        /* ══ FORM CARD ══ */
        .form-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 20px;
            overflow: hidden;
        }

        .form-card-header {
            background: linear-gradient(135deg, var(--forest) 0%, #2d6444 100%);
            padding: 1.375rem 1.75rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .form-card-header::after {
            content: '';
            position: absolute;
            top: -40px;
            right: -40px;
            width: 180px;
            height: 180px;
            background: radial-gradient(circle, rgba(109, 189, 142, .15) 0%, transparent 70%);
            pointer-events: none;
        }

        .fch-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.2rem;
            font-weight: 700;
            color: #fff;
        }

        .fch-sub {
            font-size: .72rem;
            color: rgba(184, 223, 200, .8);
            margin-top: 3px;
        }

        .fch-badge {
            background: rgba(255, 255, 255, .12);
            border: 1px solid rgba(255, 255, 255, .2);
            border-radius: 20px;
            padding: 5px 13px;
            font-size: .7rem;
            font-weight: 700;
            color: var(--dew);
            letter-spacing: .07em;
            text-transform: uppercase;
        }

        .form-body {
            padding: 1.875rem;
        }

        /* ══ SECTION LABEL ══ */
        .sec {
            display: flex;
            align-items: center;
            gap: 8px;
            font-family: 'Playfair Display', serif;
            font-size: .95rem;
            color: var(--forest);
            font-weight: 600;
            padding-bottom: .6rem;
            border-bottom: 1.5px solid var(--border);
            margin-bottom: 1.25rem;
        }

        .sec svg {
            width: 15px;
            height: 15px;
            color: var(--sage);
        }

        .sec.mt {
            margin-top: 1.875rem;
        }

        /* ══ GRID LAYOUTS ══ */
        .g2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.125rem;
        }

        .g3 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 1rem;
        }

        .g-full {
            margin-bottom: 1.125rem;
        }

        /* ══ FIELD ══ */
        .field {
            margin-bottom: 1.125rem;
        }

        .f-lbl {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: .8125rem;
            font-weight: 600;
            color: var(--pine);
            margin-bottom: .4rem;
        }

        .req {
            color: var(--rust);
        }

        .f-hint {
            font-size: .68rem;
            font-weight: 400;
            color: var(--muted);
        }

        .inp {
            width: 100%;
            background: var(--parch);
            border: 1.5px solid var(--border);
            border-radius: 10px;
            padding: .65rem .9rem;
            font-size: .875rem;
            font-family: 'Outfit', sans-serif;
            color: var(--text);
            outline: none;
            transition: border-color .2s, box-shadow .2s, background .2s;
        }

        .inp::placeholder {
            color: #aab8a4;
        }

        .inp:focus {
            border-color: var(--sage);
            background: var(--white);
            box-shadow: 0 0 0 3px rgba(74, 140, 104, .12);
        }

        select.inp {
            appearance: auto;
            cursor: pointer;
        }

        /* With icon */
        .iw {
            position: relative;
        }

        .iw .inp {
            padding-left: 2.5rem;
        }

        .ico {
            position: absolute;
            left: .75rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            display: flex;
            pointer-events: none;
        }

        .ico svg {
            width: 15px;
            height: 15px;
        }

        /* ══ STATUS CARDS ══ */
        .status-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: .5rem;
            margin-bottom: .5rem;
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
            background: var(--fog);
        }

        .sc.sel {
            border-color: var(--fern);
            background: var(--fog);
            box-shadow: 0 0 0 2.5px rgba(74, 140, 104, .15);
        }

        .sc input {
            display: none;
        }

        .sc-em {
            font-size: 1.5rem;
            line-height: 1;
        }

        .sc-lbl {
            font-size: .65rem;
            font-weight: 700;
            text-align: center;
            color: var(--text);
        }

        .sc-sub {
            font-size: .58rem;
            color: var(--muted);
            text-align: center;
        }

        .sc-ck {
            position: absolute;
            top: 6px;
            right: 6px;
            width: 16px;
            height: 16px;
            background: var(--sage);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity .18s;
        }

        .sc-ck svg {
            width: 9px;
            height: 9px;
            color: #fff;
        }

        .sc.sel .sc-ck {
            opacity: 1;
        }

        /* Status colors accent */
        .sc[data-s="planting"].sel {
            border-color: #2563eb;
            box-shadow: 0 0 0 2.5px rgba(37, 99, 235, .15);
        }

        .sc[data-s="planting"].sel .sc-ck {
            background: #2563eb;
        }

        .sc[data-s="growth"].sel {
            border-color: var(--sage);
            box-shadow: 0 0 0 2.5px rgba(74, 140, 104, .15);
        }

        .sc[data-s="treatment"].sel {
            border-color: var(--amber);
            box-shadow: 0 0 0 2.5px rgba(201, 138, 18, .15);
        }

        .sc[data-s="treatment"].sel .sc-ck {
            background: var(--amber);
        }

        .sc[data-s="harvest"].sel {
            border-color: var(--forest);
            box-shadow: 0 0 0 2.5px rgba(27, 58, 45, .15);
        }

        .sc[data-s="harvest"].sel .sc-ck {
            background: var(--forest);
        }

        .sc[data-s="done"].sel {
            border-color: var(--mint);
            box-shadow: 0 0 0 2.5px rgba(109, 189, 142, .2);
        }

        .sc[data-s="done"].sel .sc-ck {
            background: var(--mint);
        }

        /* ══ IMAGE UPLOAD ZONE ══ */
        .upload-zone {
            border: 2px dashed var(--border);
            border-radius: 14px;
            background: var(--parch);
            position: relative;
            overflow: hidden;
            transition: border-color .2s, background .2s;
            cursor: pointer;
        }

        .upload-zone:hover {
            border-color: var(--sage);
            background: var(--fog);
        }

        .upload-zone.has-img {
            border-style: solid;
            border-color: var(--sage);
            background: var(--fog);
        }

        .upload-zone input[type="file"] {
            display: none;
        }

        .upload-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: .875rem;
            padding: 2.5rem 1.5rem;
            text-align: center;
        }

        .upload-icon-ring {
            width: 64px;
            height: 64px;
            background: var(--fog);
            border: 2px solid var(--dew);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .upload-icon-ring svg {
            width: 28px;
            height: 28px;
            color: var(--sage);
        }

        .upload-title {
            font-family: 'Playfair Display', serif;
            font-size: 1rem;
            font-weight: 600;
            color: var(--forest);
        }

        .upload-sub {
            font-size: .75rem;
            color: var(--muted);
            line-height: 1.55;
            max-width: 200px;
        }

        .upload-browse {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: .78rem;
            font-weight: 700;
            color: var(--fern);
            border: 1.5px solid var(--dew);
            border-radius: 20px;
            padding: 5px 14px;
            background: var(--white);
            cursor: pointer;
            transition: all .18s;
        }

        .upload-browse:hover {
            background: var(--fog);
            border-color: var(--sage);
        }

        .upload-browse svg {
            width: 13px;
            height: 13px;
        }

        /* Image preview */
        .img-preview {
            display: none;
            position: relative;
        }

        .img-preview img {
            width: 100%;
            display: block;
            max-height: 280px;
            object-fit: cover;
            border-radius: 12px;
        }

        .img-preview-overlay {
            position: absolute;
            inset: 0;
            border-radius: 12px;
            background: linear-gradient(to top, rgba(10, 26, 16, .75) 0%, transparent 55%);
        }

        .img-preview-actions {
            position: absolute;
            bottom: 12px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: .5rem;
        }

        .img-btn {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 5px 13px;
            border-radius: 20px;
            font-size: .72rem;
            font-weight: 700;
            cursor: pointer;
            border: 1px solid rgba(255, 255, 255, .3);
            backdrop-filter: blur(6px);
            transition: all .18s;
        }

        .img-btn.change {
            background: rgba(255, 255, 255, .15);
            color: #fff;
        }

        .img-btn.change:hover {
            background: rgba(255, 255, 255, .25);
        }

        .img-btn.remove {
            background: rgba(184, 74, 30, .6);
            color: #fff;
            border-color: rgba(184, 74, 30, .4);
        }

        .img-btn.remove:hover {
            background: rgba(184, 74, 30, .85);
        }

        .img-btn svg {
            width: 11px;
            height: 11px;
        }

        /* Crop preset gallery */
        .crop-gallery {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: .5rem;
            margin-top: .875rem;
        }

        .crop-preset {
            border-radius: 10px;
            overflow: hidden;
            border: 2px solid var(--border);
            cursor: pointer;
            transition: border-color .2s, transform .18s;
            aspect-ratio: 1;
            position: relative;
        }

        .crop-preset:hover {
            border-color: var(--sage);
            transform: scale(1.03);
        }

        .crop-preset.active {
            border-color: var(--fern);
            box-shadow: 0 0 0 2.5px rgba(74, 140, 104, .18);
        }

        .crop-preset img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .crop-preset-lbl {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(10, 26, 16, .7);
            font-size: .55rem;
            font-weight: 700;
            color: #fff;
            text-align: center;
            padding: 3px 2px;
            letter-spacing: .04em;
        }

        /* ══ RIGHT PANEL — Preview card ══ */
        .preview-panel {
            display: flex;
            flex-direction: column;
            gap: 1.125rem;
            position: sticky;
            top: 2.25rem;
        }

        .preview-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(27, 58, 45, .07);
        }

        .preview-photo-wrap {
            height: 200px;
            position: relative;
            overflow: hidden;
            background: var(--fog);
        }

        .preview-photo-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .preview-photo-empty {
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: .625rem;
        }

        .preview-photo-empty svg {
            width: 36px;
            height: 36px;
            color: var(--dew);
        }

        .preview-photo-empty span {
            font-size: .75rem;
            color: var(--muted);
        }

        .preview-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(10, 26, 16, .75) 0%, transparent 55%);
        }

        .preview-season-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            font-size: .65rem;
            font-weight: 700;
            padding: 4px 11px;
            border-radius: 20px;
            backdrop-filter: blur(6px);
            background: rgba(255, 255, 255, .18);
            border: 1px solid rgba(255, 255, 255, .3);
            color: #fff;
        }

        .preview-status-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            font-size: .6rem;
            font-weight: 800;
            padding: 4px 10px;
            border-radius: 20px;
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        .psb-plant {
            background: rgba(37, 99, 235, .9);
            color: #fff;
        }

        .psb-growth {
            background: rgba(74, 140, 104, .9);
            color: #fff;
        }

        .psb-treat {
            background: rgba(201, 138, 18, .9);
            color: #fff;
        }

        .psb-harvest {
            background: rgba(27, 58, 45, .9);
            color: #fff;
        }

        .psb-done {
            background: rgba(109, 189, 142, .9);
            color: #fff;
        }

        .preview-info {
            padding: 1.125rem 1.25rem;
        }

        .preview-crop {
            font-family: 'Playfair Display', serif;
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--forest);
            line-height: 1.1;
        }

        .preview-field {
            font-size: .75rem;
            color: var(--muted);
            margin-top: 4px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .preview-field svg {
            width: 12px;
            height: 12px;
            color: var(--sage);
        }

        .preview-meta-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: .625rem;
            margin-top: 1rem;
        }

        .pmg-item {
            background: var(--parch);
            border-radius: 10px;
            padding: .625rem .75rem;
        }

        .pmg-lbl {
            font-size: .6rem;
            font-weight: 700;
            color: var(--muted);
            letter-spacing: .07em;
            text-transform: uppercase;
            margin-bottom: 3px;
        }

        .pmg-val {
            font-size: .8125rem;
            font-weight: 700;
            color: var(--forest);
        }

        /* Progress ring in preview */
        .preview-progress {
            margin-top: 1rem;
            padding: 0 1.25rem 1.25rem;
        }

        .pp-head {
            display: flex;
            justify-content: space-between;
            font-size: .68rem;
            font-weight: 600;
            color: var(--muted);
            margin-bottom: .375rem;
        }

        .pp-bar {
            height: 6px;
            background: var(--fog);
            border-radius: 4px;
            overflow: hidden;
        }

        .pp-fill {
            height: 100%;
            border-radius: 4px;
            background: linear-gradient(90deg, var(--fern), var(--mint));
            transition: width .4s ease;
        }

        /* Info box */
        .info-box {
            background: var(--fog);
            border: 1.5px solid var(--dew);
            border-left: 3px solid var(--sage);
            border-radius: 12px;
            padding: .875rem 1rem;
            display: flex;
            gap: .75rem;
            align-items: flex-start;
        }

        .info-box svg {
            width: 15px;
            height: 15px;
            color: var(--sage);
            flex-shrink: 0;
            margin-top: 2px;
        }

        .info-box-text {
            font-size: .775rem;
            color: var(--muted);
            line-height: 1.55;
        }

        .info-box-text strong {
            color: var(--forest);
        }

        /* ══ FORM FOOTER ══ */
        .form-footer {
            background: var(--fog);
            border-top: 1.5px solid var(--border);
            padding: 1.25rem 1.875rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: .75rem;
        }

        .footer-left {
            font-size: .78rem;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .footer-left svg {
            width: 14px;
            height: 14px;
            color: var(--sage);
        }

        .footer-btns {
            display: flex;
            align-items: center;
            gap: .75rem;
        }

        .btn-cancel {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: .625rem 1.25rem;
            background: var(--white);
            border: 1.5px solid var(--border);
            color: var(--muted);
            font-weight: 600;
            font-size: .8125rem;
            font-family: 'Outfit', sans-serif;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            transition: background .2s;
        }

        .btn-cancel:hover {
            background: var(--parch);
        }

        .btn-cancel svg {
            width: 13px;
            height: 13px;
        }

        .btn-draft {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: .625rem 1.25rem;
            background: var(--white);
            border: 1.5px solid var(--border);
            color: var(--muted);
            font-weight: 600;
            font-size: .8125rem;
            font-family: 'Outfit', sans-serif;
            border-radius: 10px;
            cursor: pointer;
            transition: background .2s;
        }

        .btn-draft:hover {
            background: var(--fog);
            border-color: var(--sage);
            color: var(--fern);
        }

        .btn-draft svg {
            width: 13px;
            height: 13px;
        }

        .btn-submit {
            display: flex;
            align-items: center;
            gap: 7px;
            padding: .625rem 1.625rem;
            background: var(--forest);
            color: #fff;
            font-weight: 700;
            font-size: .9rem;
            font-family: 'Outfit', sans-serif;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(27, 58, 45, .25);
            transition: background .2s, box-shadow .2s, transform .15s;
        }

        .btn-submit:hover {
            background: var(--fern);
            box-shadow: 0 6px 20px rgba(27, 58, 45, .32);
            transform: translateY(-1px);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .btn-submit svg {
            width: 16px;
            height: 16px;
        }

        /* Error banner */
        .error-banner {
            background: #fef2f2;
            border: 1.5px solid #fca5a5;
            border-left: 3px solid var(--rust);
            border-radius: 10px;
            padding: .875rem 1rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: flex-start;
            gap: .625rem;
            font-size: .8125rem;
            color: var(--rust);
        }

        .error-banner svg {
            width: 15px;
            height: 15px;
            flex-shrink: 0;
            margin-top: 1px;
        }
    </style>
</head>

<body>

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
                </svg>Recoltes</a>
            <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7" />
                </svg>Stocks</a>
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
                </svg>Equipements</a>
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
        <div class="content">

            <!-- Page header -->
            <div class="page-hdr">
                <div>
                    <div class="page-eyebrow">Cultures / Nouvelle culture</div>
                    <h1 class="page-title">Ajouter une <em>Culture</em></h1>
                    <p class="page-sub">Renseignez les informations de la nouvelle culture et choisissez son image</p>
                </div>
                <a href="/cultures" class="btn-back">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Retour aux cultures
                </a>
            </div>

            <!-- Layout -->
            <div class="form-layout">

                <!-- ══ LEFT: FORM ══ -->
                <div class="form-card">
                    <div class="form-card-header">
                        <div>
                            <div class="fch-title">Informations de la culture</div>
                            <div class="fch-sub">Tous les champs marques * sont obligatoires</div>
                        </div>
                        <span class="fch-badge">Nouvelle</span>
                    </div>

                    <form action="{{ route('cultures.store') }}" method="POST" enctype="multipart/form-data"
                        id="cultureForm">
                        @csrf

                        <div class="form-body">

                            @if ($errors->any())
                            <div class="error-banner">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                <span>{{ $errors->first() }}</span>
                            </div>
                            @endif

                            <!-- ── IMAGE DU PRODUIT ── -->
                            <div class="sec">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Image du produit
                            </div>

                            <!-- Upload zone -->
                            <div class="upload-zone" id="uploadZone">
                                <input type="file" name="img" id="imageInput" accept="image/jpeg,image/png,image/webp"
                                    onchange="handleImage(this)">
                                <div class="upload-placeholder" id="uploadPlaceholder">
                                    <div class="upload-icon-ring">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="upload-title">Deposez votre image ici</div>
                                        <div class="upload-sub">JPG, PNG ou WebP — Max 2 MB</div>
                                    </div>
                                    <label for="imageInput" class="upload-browse">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                        Parcourir les fichiers
                                    </label>
                                </div>
                                <div class="img-preview" id="imgPreview">
                                    <img id="previewImg" src="" alt="Preview">
                                    <div class="preview-overlay"></div>
                                    <div class="img-preview-actions">
                                        <label for="imageInput" class="img-btn change">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            Changer
                                        </label>
                                        <button type="button" class="img-btn remove" onclick="removeImage()">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Supprimer
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- ── IDENTIFICATION ── -->
                            <div class="sec">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                                Identification
                            </div>

                            <div class="g2">
                                <!-- crop_id -->
                                <div class="field">
                                    <div class="f-lbl"><span>Type de culture <span class="req">*</span></span></div>
                                    <div class="iw">
                                        <span class="ico"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064" />
                                            </svg></span>
                                        <select name="type_culture_id" class="inp" required>
                                            <option value="">Choisir une culture</option>
                                            @foreach($typesNames as $type => $culturesNames)
                                            <optgroup label="{{$type}}">
                                                @foreach($culturesNames as $culturesName)
                                                <option value="{{$culturesName->id}}">{{$culturesName->name}}</option>
                                                @endforeach
                                            </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- field_id -->
                                <div class="field">
                                    <div class="f-lbl"><span>Parcelle <span class="req">*</span></span></div>
                                    <div class="iw">
                                        <span class="ico"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg></span>
                                        <select name="field_id" class="inp" required>
                                            <option value="">Choisir une parcelle</option>
                                            @foreach($fields as $field)
                                            <option value="{{$field->id}}">Parcelle
                                                {{strtoupper(str($field->name)->substr(0,1))}} — {{$field->name}}
                                                ({{$field->size}} ha)</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="g2">
                                <!-- season -->
                                <div class="field">
                                    <div class="f-lbl"><span>Saison <span class="req">*</span></span></div>
                                    <div class="iw">
                                        <span class="ico"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg></span>
                                        <select name="season" class="inp" required>
                                            <option value="">Choisir la saison</option>
                                            <option value="printemps">Printemps</option>
                                            <option value="été">Ete</option>
                                            <option value="automne">Automne</option>
                                            <option value="hiver">Hiver</option>
                                        </select>
                                    </div>
                                </div>
                                                                <div class="field">
                                    <div class="f-lbl"><span>la quantite de recolte prevue en t<span class="req">*</span></span>
                                    </div>
                                    <div class="iw">
                                        <span class="ico"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                            </svg></span>
                                        <input type="number" name="quantite_prevu" class="inp"
                                            required>
                                    </div>
                                </div>
                            </div>
                            

                            <!-- ── DATES ── -->
                            <div class="sec mt">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Dates du cycle
                            </div>

                            <div class="g2">
                                <!-- planting_date -->
                                <div class="field">
                                    <div class="f-lbl"><span>Date de plantation <span class="req">*</span></span></div>
                                    <div class="iw">
                                        <span class="ico"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg></span>
                                        <input type="date" name="planting_date" class="inp"
                                            required>
                                    </div>
                                </div>

                                <!-- harvest_date -->
                                <div class="field">
                                    <div class="f-lbl"><span>Date de recolte prevue <span class="req">*</span></span>
                                    </div>
                                    <div class="iw">
                                        <span class="ico"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                            </svg></span>
                                        <input type="date" name="harvest_date" class="inp"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <!-- ── STATUS ── -->
                            <div class="sec mt">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Statut du cycle
                            </div>

                            <div class="status-grid">
                                <label class="sc sel" data-s="planting">
                                    <input type="radio" name="cycle" value="planting" checked
                                        onchange="selStatus(this)">
                                    <div class="sc-em">P</div>
                                    <div class="sc-lbl">Plantation</div>
                                    <div class="sc-sub">Debut du cycle</div>
                                    <div class="sc-ck"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7" />
                                        </svg></div>
                                </label>
                                <label class="sc" data-s="growth">
                                    <input type="radio" name="cycle" value="growth" onchange="selStatus(this)">
                                    <div class="sc-em">C</div>
                                    <div class="sc-lbl">Croissance</div>
                                    <div class="sc-sub">En developpement</div>
                                    <div class="sc-ck"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7" />
                                        </svg></div>
                                </label>
                                <label class="sc" data-s="treatment">
                                    <input type="radio" name="cycle" value="treatment" onchange="selStatus(this)">
                                    <div class="sc-em">T</div>
                                    <div class="sc-lbl">Traitement</div>
                                    <div class="sc-sub">Traitement en cours</div>
                                    <div class="sc-ck"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7" />
                                        </svg></div>
                                </label>
                                <label class="sc" data-s="harvest">
                                    <input type="radio" name="cycle" value="harvest" onchange="selStatus(this)">
                                    <div class="sc-em">R</div>
                                    <div class="sc-lbl">Recolte</div>
                                    <div class="sc-sub">Pret a recolter</div>
                                    <div class="sc-ck"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7" />
                                        </svg></div>
                                </label>
                                <label class="sc" data-s="done">
                                    <input type="radio" name="cycle" value="done" onchange="selStatus(this)">
                                    <div class="sc-em">C</div>
                                    <div class="sc-lbl">Termine</div>
                                    <div class="sc-sub">Cycle complet</div>
                                    <div class="sc-ck"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7" />
                                        </svg></div>
                                </label>
                            </div>

                            <!-- ── RESPONSABLE ── -->
                            <div class="sec mt">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Responsable
                            </div>

                            <!-- user_id -->
                            <div class="field">
                                <div class="f-lbl"><span>Agriculteur responsable <span class="req">*</span></span><span
                                        class="f-hint">Attribuer a un membre</span></div>
                                <div class="iw">
                                    <span class="ico"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg></span>
                                    <select name="user_id" class="inp" required>
                                        <option value="">Choisir un responsable</option>
                                        @foreach($rolesWithUsers as $rolesWithUser)
                                        <optgroup label="{{ $rolesWithUser->name }}">
                                            @foreach($rolesWithUser->users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Info box -->
                            <div class="info-box" style="margin-top:.5rem;">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="info-box-text">
                                    La culture sera associee a la parcelle selectionnee et apparaitra dans le tableau de
                                    bord du responsable.
                                    Vous pourrez modifier le statut a tout moment depuis la page de gestion.
                                </p>
                            </div>

                        </div><!-- /form-body -->

                        <!-- Form footer -->
                        <div class="form-footer">
                            <div class="footer-left">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                Les donnees seront sauvegardees en securite
                            </div>
                            <div class="footer-btns">
                                <a href="{{route('cultures.index')}}" class="btn-cancel">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Annuler
                                </a>
                                <button type="submit" class="btn-submit">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                    Ajouter la culture
                                </button>
                            </div>
                        </div>

                    </form>
                </div><!-- /form-card -->

                <!-- ══ RIGHT: PREVIEW PANEL ══ -->
                <div class="preview-panel">

                    <!-- Live preview card -->
                    <div class="preview-card">
                        <div class="preview-photo-wrap" id="previewPhotoWrap">
                            <!-- Empty state -->
                            <div class="preview-photo-empty" id="previewEmpty">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>Aucune image selectionnee</span>
                            </div>
                            <!-- Photo filled -->
                            <img id="previewCardImg" src="" alt=""
                                style="display:none;width:100%;height:100%;object-fit:cover;">
                            <span class="preview-season-badge" id="previewSeason" style="display:none;">
                                Printemps</span>
                            <span class="preview-status-badge psb-plant" id="previewStatusBadge"
                                style="display:none;">Plantation</span>
                        </div>
                        <div class="preview-info">
                            <div class="preview-crop" id="previewCrop">Nom de la culture</div>
                            <div class="preview-field" id="previewField">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Parcelle non selectionnee
                            </div>
                            <div class="preview-meta-grid">
                                <div class="pmg-item">
                                    <div class="pmg-lbl">Plantation</div>
                                    <div class="pmg-val" id="prevPlanting">—</div>
                                </div>
                                <div class="pmg-item">
                                    <div class="pmg-lbl">Recolte prevue</div>
                                    <div class="pmg-val" id="prevHarvest">—</div>
                                </div>
                                <div class="pmg-item">
                                    <div class="pmg-lbl">Cycle</div>
                                    <div class="pmg-val" id="prevCycle">—</div>
                                </div>
                                <div class="pmg-item">
                                    <div class="pmg-lbl">Statut</div>
                                    <div class="pmg-val" id="prevStatus">Plantation</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Info box in sidebar -->
                    <div class="info-box">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="info-box-text">
                            La <strong>progression</strong> est calculee automatiquement en fonction des dates de
                            plantation et de recolte.
                        </p>
                    </div>

                </div><!-- /preview-panel -->
            </div><!-- /form-layout -->

        </div>

    </div>

    <script>
        let currentImgUrl = '';

        function handleImage(input) {
        if (input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {                                
            showPreviewImage(e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
        }

        function showPreviewImage(url) {
        currentImgUrl = url;
        document.getElementById('uploadPlaceholder').style.display = 'none';
        const preview = document.getElementById('imgPreview');
        preview.style.display = 'block';
        document.getElementById('previewImg').src = url;        
        document.getElementById('uploadZone').classList.add('has-img');
        document.getElementById('previewEmpty').style.display = 'none';
        document.getElementById('previewCardImg').src = url;
        document.getElementById('previewCardImg').style.display = 'block';
        document.getElementById('previewOverlay').style.display = 'block';
        document.getElementById('previewSeason').style.display = '';
        document.getElementById('previewStatusBadge').style.display = '';
        }

        function removeImage() {
        currentImgUrl = '';
        document.getElementById('imageInput').value = '';
        document.getElementById('uploadPlaceholder').style.display = '';
        document.getElementById('imgPreview').style.display = 'none';
        document.getElementById('uploadZone').classList.remove('has-img');
        document.getElementById('previewEmpty').style.display = '';
        document.getElementById('previewCardImg').style.display = 'none';
        document.getElementById('previewOverlay').style.display = 'none';
        document.getElementById('previewSeason').style.display = 'none';
        document.getElementById('previewStatusBadge').style.display = 'none';
        }

        function selStatus(radio) {
        document.querySelectorAll('.sc').forEach(c => c.classList.remove('sel'));
        radio.closest('.sc').classList.add('sel');
        }
    </script>
</body>

</html>