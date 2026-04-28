<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AgriNova - Detail equipement</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box}
body{margin:0;font-family:'Outfit',sans-serif;background:#f5f1e8;color:#1f2b1f}
a{text-decoration:none;color:inherit}
.page{max-width:1280px;margin:0 auto;padding:24px}
.hero{background:linear-gradient(135deg,#193628,#2d5a42);border-radius:24px;color:#fff;padding:28px;box-shadow:0 20px 50px rgba(25,54,40,.18)}
.hero-top,.hero-bottom,.stats-row,.grid,.field-row,.history-item,.danger-row,.assign-grid{display:flex;gap:16px}
.hero-top,.hero-bottom,.danger-row{justify-content:space-between;align-items:center}
.breadcrumb{font-size:13px;color:rgba(255,255,255,.7)}
.hero-title{font-family:'Playfair Display',serif;font-size:40px;margin:8px 0 10px}
.hero-meta{display:flex;gap:12px;flex-wrap:wrap;color:rgba(255,255,255,.82);font-size:14px}
.btn{display:inline-flex;align-items:center;justify-content:center;padding:11px 16px;border-radius:12px;font-weight:700;border:1px solid transparent}
.btn-light{background:#fff;color:#214333}
.btn-outline{background:transparent;border-color:rgba(255,255,255,.28);color:#fff}
.btn-danger{background:#9b3f1f;color:#fff}
.status{display:inline-flex;align-items:center;gap:8px;padding:10px 14px;border-radius:999px;font-size:14px;font-weight:700}
.status.available,.status.using{background:rgba(122,211,160,.18);color:#bff3d1}
.status.maintenance{background:rgba(240,192,73,.18);color:#f5d98d}
.status.other{background:rgba(255,255,255,.16);color:#fff}
.content{margin-top:24px;display:grid;grid-template-columns:minmax(0,2fr) minmax(280px,1fr);gap:24px}
.panel{background:#fff;border:1px solid #d9e4d5;border-radius:22px;overflow:hidden}
.panel-head{padding:18px 22px;background:#eef6ef;border-bottom:1px solid #d9e4d5;display:flex;justify-content:space-between;align-items:center}
.panel-title{font-family:'Playfair Display',serif;font-size:22px;color:#214333;margin:0}
.panel-body{padding:22px}
.grid{flex-wrap:wrap}
.card{flex:1 1 240px;background:#faf7f0;border:1px solid #e2e7da;border-radius:18px;padding:16px}
.label{font-size:12px;letter-spacing:.08em;text-transform:uppercase;color:#6b7b69;font-weight:700;margin-bottom:8px}
.value{font-size:18px;font-weight:700;color:#214333}
.sub{font-size:13px;color:#6b7b69;margin-top:6px}
.type-pill{display:inline-flex;padding:6px 12px;border-radius:999px;font-size:13px;font-weight:700}
.tp-moto{background:#fff1d8;color:#b7790d}
.tp-irrig{background:#e4f0ff;color:#2563eb}
.tp-recolte{background:#e5f4e9;color:#2f7d4b}
.tp-stock{background:#efe8ff;color:#7c3aed}
.tp-transport{background:#dff8f4;color:#0d9488}
.tp-autre{background:#eef3ee;color:#556455}
.section-stack{display:flex;flex-direction:column;gap:24px}
.field-list,.history-list{display:flex;flex-direction:column;gap:14px}
.field-row,.history-item{align-items:flex-start;background:#faf7f0;border:1px solid #e2e7da;border-radius:16px;padding:16px}
.field-main,.history-main{flex:1}
.field-name,.history-title{font-size:18px;font-weight:700;color:#214333;margin:0 0 6px}
.field-meta,.history-time,.hint{font-size:13px;color:#6b7b69}
.field-badges{display:flex;gap:8px;flex-wrap:wrap}
.badge{padding:6px 10px;border-radius:999px;background:#eef6ef;color:#2f7d4b;font-size:12px;font-weight:700}
.empty{padding:20px;border:2px dashed #d9e4d5;border-radius:18px;text-align:center;color:#6b7b69;background:#fcfbf7}
form{margin:0}
select,input,textarea{width:100%;padding:12px 14px;border:1px solid #d9e4d5;border-radius:12px;background:#faf7f0;font:inherit;color:#1f2b1f}
textarea{min-height:90px;resize:vertical}
.assign-grid{align-items:stretch}
.assign-grid > div{flex:1}
.aside-list{display:flex;flex-direction:column}
.aside-row{display:flex;justify-content:space-between;gap:12px;padding:14px 22px;border-bottom:1px solid #edf1ea}
.aside-row:last-child{border-bottom:none}
.aside-key{color:#6b7b69;font-size:14px}
.aside-val{font-weight:700;color:#214333;text-align:right}
.danger-copy{color:#6b7b69;font-size:14px;line-height:1.6}
@media (max-width: 980px){
  .content{grid-template-columns:1fr}
}
@media (max-width: 640px){
  .page{padding:14px}
  .hero{padding:20px}
  .hero-title{font-size:30px}
  .hero-top,.hero-bottom,.danger-row,.assign-grid{flex-direction:column;align-items:stretch}
}
</style>
</head>
<body>
@php
  $typeData = $typeMeta($equipement->type);
  $statusData = $statusMeta($equipement->status);
  $typePillClass = match ($typeData['class']) {
      'tb-moto' => 'tp-moto',
      'tb-irrig' => 'tp-irrig',
      'tb-recolte' => 'tp-recolte',
      'tb-stock' => 'tp-stock',
      'tb-transport' => 'tp-transport',
      default => 'tp-autre',
  };
  $statusClass = in_array($equipement->status, ['available', 'using', 'maintenance'], true) ? $equipement->status : 'other';
  $assignedFields = $equipement->fields;
@endphp

<div class="page">
  <section class="hero">
    <div class="hero-top">
      <div class="breadcrumb">
        <a href="{{ route('equipments.index') }}">Equipements</a> / <span>{{ $equipement->name }}</span>
      </div>
      <a class="btn btn-outline" href="{{ route('equipments.index') }}">Retour</a>
    </div>

    <div class="hero-bottom">
      <div>
        <div style="font-size:12px;letter-spacing:.12em;text-transform:uppercase;color:rgba(255,255,255,.65);font-weight:700;">Equipement agricole</div>
        <h1 class="hero-title">{{ $equipement->name }}</h1>
        <div class="hero-meta">
          <span></span>
          <span>Achat: {{ $equipement->purchase_date->format('d M Y') }}</span>
          <span>{{ number_format( $equipement->purchase_price, 0, ',', ' ') }} DH</span>
        </div>
      </div>

      <div class="status {{ $statusClass }}">{{ $statusData['label'] }}</div>
    </div>
  </section>

  <div class="content">
    <div class="section-stack">
      <section class="panel">
        <div class="panel-head">
          <h2 class="panel-title">Informations de l'equipement</h2>
        </div>
        <div class="panel-body">
          <div class="grid">
            <div class="card">
              <div class="label">Nom</div>
              <div class="value">{{ $equipement->name }}</div>
            </div>
            <div class="card">
              <div class="label">Type</div>
              <div class="value"><span class="type-pill {{ $typePillClass }}">{{ $typeData['label'] }}</span></div>
            </div>
            <div class="card">
              <div class="label">Statut</div>
              <div class="value">{{ $statusData['label'] }}</div>
              <div class="sub">{{ $equipement->status === 'maintenance' ? 'Suivi recommande' : 'Etat courant de l equipement' }}</div>
            </div>
            <div class="card">
              <div class="label">Date d'achat</div>
              <div class="value">{{ $equipement->purchase_date->format('d M Y') }}</div>
              <div class="sub">il y a {{ $equipement->purchase_date->diffInYears(now()) }} ans</div>
            </div>
            <div class="card">
              <div class="label">Prix d'achat</div>
              <div class="value">{{ number_format($equipement->purchase_price, 0, ',', ' ') }} DH</div>
            </div>
            <div class="card">
              <div class="label">Parcelles assignees</div>
              <div class="value">{{ $assignedFields->count() }}</div>
              <div class="sub">{{ $assignedFields->count() ? $assignedFields->pluck('name')->join(', ') : 'Aucune parcelle' }}</div>
            </div>
          </div>
        </div>
      </section>

      <section class="panel">
        <div class="panel-head">
          <h2 class="panel-title">Parcelles assignees</h2>
          <div class="hint">{{ $assignedFields->count() }} parcelle(s)</div>
        </div>
        <div class="panel-body">
          @if ($assignedFields->isNotEmpty())
            <div class="field-list">
              @foreach ($assignedFields as $field)
                <div class="field-row">
                  <div class="field-main">
                    <p class="field-name">{{ $field->name }}</p>
                    <div class="field-meta">
                      {{ $field->location }} · {{ $field->size }} ha · {{ $field->cultures->count() }} culture(s)
                    </div>
                  </div>

                  <div class="field-badges">
                    <span class="badge">Active</span>
                    <form action="{{ route('equipments.removeField', [$equipement->id, $field->id]) }}" method="POST" onsubmit="return confirm('Retirer l assignation de cette parcelle ?')">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Retirer</button>
                    </form>
                  </div>
                </div>
              @endforeach
            </div>
          @else
            <div class="empty">
              <strong>Aucune parcelle assignee</strong>
              <div class="sub">Utilisez le formulaire ci-dessous pour ajouter une assignation.</div>
            </div>
          @endif
        </div>
      </section>

      <section class="panel">
        <div class="panel-head">
          <h2 class="panel-title">Assigner a une parcelle</h2>
        </div>
        <div class="panel-body">
          <form action="{{ route('equipments.assignField', $equipement->id) }}" method="POST">
            @csrf
            <div class="assign-grid">
              <div>
                <label class="label" for="field_id">Parcelle</label>
                <select id="field_id" name="field_id" required>
                  <option value="">Choisir une parcelle...</option>
                  @foreach ($availableFields as $field)
                    <option value="{{ $field->id }}">
                      {{ $field->name }} - {{ $field->location }} ({{ $field->size }} ha)
                    </option>
                  @endforeach
                </select>
              </div>
              <div>
                <label class="label" for="start_date">Date de debut</label>
                <input id="start_date" type="date" name="start_date" value="{{ now()->format('Y-m-d') }}">
              </div>
              <div>
                <label class="label" for="end_date">Date de fin prevue</label>
                <input id="end_date" type="date" name="end_date">
              </div>
            </div>

            <div style="margin-top:16px;">
              <label class="label" for="notes">Notes</label>
              <textarea id="notes" name="notes" placeholder="Notes optionnelles sur l utilisation de cet equipement"></textarea>
            </div>

            <div style="margin-top:18px;">
              <button class="btn btn-light" type="submit">Assigner l'equipement</button>
            </div>
          </form>
        </div>
      </section>
    </div>

    <div class="section-stack">
      <aside class="panel">
        <div class="panel-head">
          <h2 class="panel-title">Fiche equipement</h2>
        </div>
        <div class="aside-list">
          <div class="aside-row"><span class="aside-key">Nom</span><span class="aside-val">{{ $equipement->name }}</span></div>
          <div class="aside-row"><span class="aside-key">Type</span><span class="aside-val">{{ $typeData['label'] }}</span></div>
          <div class="aside-row"><span class="aside-key">Statut</span><span class="aside-val">{{ $statusData['label'] }}</span></div>
          <div class="aside-row"><span class="aside-key">Date achat</span><span class="aside-val">{{ $equipement->purchase_date->format('d M Y') }}</span></div>
          <div class="aside-row"><span class="aside-key">Prix</span><span class="aside-val">{{ number_format((float) $equipement->purchase_price, 0, ',', ' ') }} DH</span></div>
          <div class="aside-row"><span class="aside-key">Age</span><span class="aside-val">{{ $equipement->purchase_date->diffInYears(now()) }} ans</span></div>
          <div class="aside-row"><span class="aside-key">Parcelles</span><span class="aside-val">{{ $assignedFields->count() }}</span></div>
        </div>
      </aside>

      <section class="panel">
        <div class="panel-head">
          <h2 class="panel-title">Historique</h2>
        </div>
        <div class="panel-body">
          <div class="history-list">
            @forelse ($assignedFields as $field)
              <div class="history-item">
                <div class="history-main">
                  <div class="history-title">Assignation a {{ $field->name }}</div>
                  <div class="history-time">
                    {{ !empty($field->pivot->start_date) ? \Carbon\Carbon::parse($field->pivot->start_date)->format('d M Y') : 'Date non renseignee' }}
                  </div>
                </div>
              </div>
            @empty
              <div class="empty">Aucune assignation enregistree.</div>
            @endforelse

            <div class="history-item">
              <div class="history-main">
                <div class="history-title">Equipement enregistre</div>
                <div class="history-time">{{ $equipement->purchase_date->format('d M Y') }}</div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="panel" style="border-color:#efc4b6;">
        <div class="panel-head" style="background:#fff3ef;border-bottom-color:#efc4b6;">
          <h2 class="panel-title" style="color:#9b3f1f;">Zone dangereuse</h2>
        </div>
        <div class="panel-body">
          <p class="danger-copy">La suppression est irreversible. Toutes les assignations liees a cet equipement seront supprimees.</p>
          <div class="danger-row" style="margin-top:16px;">
            <form action="{{ route('equipments.destroy', $equipement->id) }}" method="POST" onsubmit="return confirm('Supprimer cet equipement ?')">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Supprimer l'equipement</button>
            </form>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
</body>
</html>
