@extends('layouts.app')
@section('title', 'Listes des cultures')

@section('content')

<div class="page-hdr">
  <div>
    <div class="page-eyebrow">Exploitation El Haouz · Printemps 2026</div>
    <h1 class="page-title">Gestion des <em>Cultures</em></h1>
    <p class="page-sub">12 cultures actives sur 4 parcelles · Saison Printemps 2026</p>
  </div>
  <div class="page-hdr-right">
    <a href="{{route('fields.index')}}" class="btn-outline">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
      </svg>
      Par parcelle
    </a>
    <a href="{{route('cultures.create')}}">
      <button class="btn-primary">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Nouvelle culture
      </button>
    </a>
  </div>
</div>

<!-- Stats -->
<div class="stats-row">
  <div class="st-card">
    <div class="st-icon g"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064" />
      </svg></div>
    <div>
      <div class="st-num">{{ $stats['total'] }}</div>
      <div class="st-lbl">Total cultures</div>
    </div>
  </div>
  <div class="st-card">
    <div class="st-icon b"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
      </svg></div>
    <div>
      <div class="st-num">{{ $stats['planting'] }}</div>
      <div class="st-lbl">Plantation</div>
    </div>
  </div>
  <div class="st-card">
    <div class="st-icon p"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
      </svg></div>
    <div>
      <div class="st-num">{{ $stats['growth'] }}</div>
      <div class="st-lbl">Croissance</div>
    </div>
  </div>
  <div class="st-card">
    <div class="st-icon a"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.78 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
      </svg></div>
    <div>
      <div class="st-num">{{ $stats['treatment'] }}</div>
      <div class="st-lbl">Traitement</div>
    </div>
  </div>
  <div class="st-card">
    <div class="st-icon r"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
      </svg></div>
    <div>
      <div class="st-num">{{ $stats['harvest'] }}</div>
      <div class="st-lbl">Recolte</div>
    </div>
  </div>
</div>

<div class="toolbar">
  <button class="f-tab active" onclick="filterTab('all',this)">Toutes</button>
  <button class="f-tab" onclick="filterTab('planting',this)">Plantation</button>
  <button class="f-tab" onclick="filterTab('growth',this)">Croissance</button>
  <button class="f-tab" onclick="filterTab('treatment',this)">Traitement</button>
  <button class="f-tab" onclick="filterTab('harvest',this)">Recolte</button>
  <div class="toolbar-right">
    <div class="search-wrap">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
      </svg>
      <input type="text" id="searchInput" placeholder="Rechercher...">
    </div>
  </div>
</div>

<!-- Table -->
<div class="table-wrap">
  <div class="t-head">
    <div class="th">Culture <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M7 16V4m0 0L3 8m4-4l4 4M17 8v12m0 0l4-4m-4 4l-4-4" />
      </svg></div>
    <div class="th">Parcelle</div>
    <div class="th">Saison</div>
    <div class="th">Plantation</div>
    <div class="th">Recolte</div>
    <div class="th">Statut</div>
    <div class="th" style="justify-content:flex-end">Actions</div>
  </div>
  @php
  $steps = ['planting','treatment','growth','harvest','done'];
  @endphp
  @foreach($cultures as $culture)
  @php
  $currentIndex = array_search($culture->cycle, $steps);
  $progress = round((($currentIndex + 1) / count($steps)) * 100);
  @endphp
  <div class="t-row" data-cycle="{{ $culture->cycle }}">
    <div class="col-name">
      <div class="c-thumb"><img
          src="{{ $culture->typeCulture->imgUrl ? asset('storage/Cultures/' . $culture->typeCulture->imgUrl) :  asset('assets/unknowing.png')}}"
          alt="{{$culture->typeCulture->name}}"></div>
      <div>
        <div class="c-crop-name">{{$culture->typeCulture->name}}</div>
        <div class="c-crop-id">{{$culture->typeCulture->type}}</div>
      </div>
    </div>
    <div class="col-field"><span class="f-dot da"></span>{{$culture->field->name}}</div>
    <div><span class="s-pill sp-spring">{{ucfirst($culture->season)}}</span></div>
    <div>
      <div class="col-date">{{$culture->planting_date->format('d M Y')}}</div>
      <div class="col-date-note">{{floor($culture->planting_date->diffInDays())}} il ya </div>
    </div>
    <div>
      <div class="col-date">{{$culture->harvest_date->format('d M Y')}}</div>
      <div class="col-date-note">{{floor(-$culture->harvest_date->diffInDays())}} rest</div>
    </div>
    <div>
      <span class="st-badge stb-harvest">{{ucfirst($culture->cycle)}}</span>
      <div class="prog-bar">
        <div class="prog-fill pf-harvest" style="width:{{ $progress }}%"></div>
      </div>
      <div class="prog-pct">{{ $progress }}%</div>
    </div>
    <div class="col-acts">
      <a href="{{route('cultures.show', $culture->id)}}">
        <button class="a-btn" title="Voir"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
          </svg></button>
      </a>
      <a href="{{ route('cultures.edit', $culture->id) }}">
        <button class="a-btn" title="Modifier"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
          </svg></button>
      </a>
      <button class="a-btn del" onclick="openDel('{{$culture->id}},{{$culture->typeCulture->name}}')"><svg fill="none"
          stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg></button>
    </div>
  </div>
  @endforeach
  {{ $cultures->links('pagination.custom') }}
</div>
@endsection

<script>
  function openEdit(id){
      document.getElementById('mSub').textContent='Culture #00'+id;
      document.getElementById('crudModal').classList.add('open');
    }

    function closeCrud(){
      document.getElementById('crudModal').classList.remove('open');
    }

    const modal = document.getElementById('crudModal');
    modal.addEventListener('click', function (e) {
      if (e.target === e.currentTarget) {
        closeCrud();
      }
    });


    function openDel(id, name){
  document.getElementById('delTxt').textContent ='La culture "' + name + '" sera definitivement supprimee.';
  document.getElementById('delForm').action = '/cultures/' + id;
  document.getElementById('delModal').classList.add('open');
}

    function closeDel(){
      document.getElementById('delModal').classList.remove('open');
    }

    function closeDelBg(e){
      if(e.target===document.getElementById('delModal'))closeDel();
    }

    function selStatus(inputRadio){
      document.querySelectorAll('.sc').forEach(c=>c.classList.remove('sel'));
      inputRadio.closest('.sc').classList.add('sel');
    }

function filterTab(status, btn) {
  fillters =document.querySelectorAll('.f-tab');
  fillters.forEach(t => t.classList.remove('active'))
  btn.classList.add('active');

  const rows = document.querySelectorAll('.t-row');

  rows.forEach(row => {
    const rowStatus = row.dataset.cycle;
    
    if (status === 'all' || rowStatus === status) {
      row.style.display = 'grid';
    } else {
      row.style.display = 'none';
    }
  });
}

const searchInput = document.getElementById('searchInput');

searchInput.addEventListener('input', function () {
  const value = this.value.toLowerCase();
  const rows = document.querySelectorAll('.t-row');

  rows.forEach(row => {
    const text = row.innerText.toLowerCase();

    if (text.includes(value)) {
      row.style.display = 'grid';
    } else {
      row.style.display = 'none';
    }
  });
});
</script>
</body>

</html>