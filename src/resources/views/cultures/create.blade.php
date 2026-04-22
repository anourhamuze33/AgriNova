@extends('layouts.app')
@section('title', 'Listes des cultures')

@section('content')

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

                </div>
            </div>
@endsection

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
