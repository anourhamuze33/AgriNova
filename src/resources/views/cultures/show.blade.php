@extends('layouts.app')
@section('title', 'Listes des cultures')

@section('content')
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
                            <div class="wc-emoji">{!! $emoji !!}</div>
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
@endsection
