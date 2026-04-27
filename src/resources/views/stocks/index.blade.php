@extends('layouts.app')
@section('title', 'Listes des cultures')

@section('content')
    <section class="hero">
      <div class="hero-top">
        <div>
          <div class="hero-eyebrow">Exploitation agricole - {{ $today->format('Y') }}</div>
          <h1 class="hero-title">Gestion des Stocks</h1>
          <p class="hero-sub">Suivi des lots recoltes, statut de traitement et alertes de retard</p>
        </div>
      </div>
      <div class="hero-kpis">
        <div class="hk">
          <div class="hk-n">{{ $stats['total_lots'] }}</div>
          <div class="hk-l">Lots suivis</div>
        </div>
        <div class="hk">
          <div class="hk-n">{{ $stats['in_stock'] }}</div>
          <div class="hk-l">Lots en stock</div>
        </div>
        <div class="hk">
          <div class="hk-n">{{ $stats['to_harvest'] }}</div>
          <div class="hk-l">A recolter</div>
        </div>
        <div class="hk">
          <div class="hk-n">{{ $stats['late'] }}</div>
          <div class="hk-l">Retards</div>
        </div>
        <div class="hk">
          <div class="hk-n">{{ $stats['active_fields'] }}</div>
          <div class="hk-l">Parcelles actives</div>
        </div>
      </div>
    </section>

    <section class="body">
      @if(count($alerts))
      <div class="alerts">
        @foreach($alerts as $alert)
        <div class="al {{ $alert['type'] }}">
          <div class="al-dot"></div>
          <div>
            <div class="al-title">{{ $alert['title'] }}</div>
            <div class="al-sub">{{ $alert['description'] }}</div>
          </div>
        </div>
        @endforeach
      </div>
      @endif

      <div class="tcard">
        <div class="thead">
          <div class="th">Culture</div>
          <div class="th">Parcelle</div>
          <div class="th">Date recolte</div>
          <div class="th">Cycle</div>
          <div class="th">Echeance</div>
          <div class="th">Responsable</div>
          <div class="th">Statut</div>
        </div>

        @forelse($lots as $lot)
        <div class="trow">

          <div class="ccrop">
            <div class="cthumb">
              <img src="{{ $lot['image'] }}">
            </div>
            <div>
              <div class="cn">{{ $lot['culture_name'] }}</div>
              <div class="cm">{{ $lot['culture_type'] }}</div>
            </div>
          </div>

          <div class="cval">{{ $lot['field_name'] }}</div>

          <div>
            <div class="cval">{{ $lot['harvest_date']->format('d M Y') }}</div>
            <span class="dtag {{ $lot['date_badge_class'] }}">
              {{ $lot['date_badge'] }}
            </span>
          </div>

          <div class="cval">{{ ucfirst($lot['cycle']) }}</div>

          <div>
            @if($lot['days_to_harvest'] < 0) <div class="cval">{{ abs($lot['days_to_harvest']) }} j de retard</div>
          @else
          <div class="cval">{{ $lot['days_to_harvest'] }} j restants</div>
          @endif
        </div>

        <!-- ✅ MUST BE INSIDE -->
        <div>
          <div class="cval">{{ $lot['manager'] }}</div>
          <div class="csub">Gestionnaire</div>
        </div>

        <!-- ✅ MUST BE INSIDE -->
        <div>
          <span class="sbadge {{ $lot['status_class'] }}">
            {{ $lot['status_label'] }}
          </span>
        </div>

      </div>
      @empty
      <div class="empty">Aucun lot disponible pour le moment.</div>
      @endforelse
      </div>
      {{ $lots->links('pagination.custom') }}
    </section>
@endsection
