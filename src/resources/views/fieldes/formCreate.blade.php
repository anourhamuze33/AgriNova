<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriNova — Créer une Parcelle</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/fields/create.css')}}">

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