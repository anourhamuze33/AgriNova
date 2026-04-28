@extends('layouts.app')
@section('title', 'Listes des cultures')

@section('content')
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
            <div class="trow" onclick="window.location='{{ route('equipments.show', $equipment->id) }}'">
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
                  ? 'il y a ' . (date('Y') - date('Y', strtotime($equipment->purchase_date))) . ' an'
                  . ((date('Y') - date('Y', strtotime($equipment->purchase_date))) > 1 ? 's' : '')
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
                <button class="abtn" title="Voir" onclick="window.location='{{ route('equipments.show', $equipment->id) }}'"><svg fill="none"
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
                  <button class="abtn" onclick="window.location='{{ route('equipments.show', $equipment->id) }}'"><svg fill="none" stroke="currentColor"
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

      </div>
@endsection

  <script>
function setView(v) {
  const isTable = v === 'table';
  document.getElementById('viewTable').classList.toggle('hidden', !isTable);
  document.getElementById('viewCards').classList.toggle('hidden', isTable);
  document.getElementById('btnTable').classList.toggle('on', isTable);
  document.getElementById('btnCards').classList.toggle('on', !isTable);
}



function dismissAl() {
  const el = document.getElementById('al1');
  el.style.transition='all .3s ease';el.style.opacity='0';el.style.maxHeight='0';
  el.style.padding='0';el.style.overflow='hidden';
  setTimeout(()=>el.remove(),320);
}


  </script>
</body>

</html>
