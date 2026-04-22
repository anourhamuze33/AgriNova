@extends('layouts.app')
@section('title', 'Listes des cultures')

@section('content')
    <div class="topbar">
      <div class="tb-left">
        <span class="tb-eyebrow">Gestion des cultures</span>
        <span class="tb-title">Mes Cultures</span>
      </div>
      <div class="tb-right">
        <a href="{{route('fields.create')}}" class="btn-add">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          Ajouter un Field
        </a>
      </div>
    </div>

      @foreach($fields as $field)
      <div class="parcelle-section">
        <div class="ps-header">
          <div class="ps-header-img" style="background-image:url('../assets/parcelles.jpg')"></div>
          <div class="ps-header-overlay"></div>
          <div class="ps-header-content">
            <div class="ps-header-left">
              <div class="ps-num">{{strtoupper(str($field->name)->substr(0,1))}}</div>
              <div>
                <div class="ps-name">Parcelle {{strtoupper(str($field->name)->substr(0,1))}} — {{$field->name}}</div>
                <div class="ps-meta">{{$field->size}} hectares · Zone maraîchère · Irrigation goutte-à-goutte</div>
              </div>
            </div>
            <div class="ps-header-right">
              <div class="ps-stat">
                <div class="ps-stat-num">{{$field->cultures->count()}}</div>
                <div class="ps-stat-lbl">Cultures</div>
              </div>
              <div class="ps-stat-sep"></div>
              <div class="ps-stat-sep"></div>
              <div class="ps-stat">
                <div class="ps-stat-num">{{$field->cultures->sum('quantite_prevu')}}t</div>
                <div class="ps-stat-lbl">Rendement</div>
              </div>
            </div>
          </div>
        </div>

        <div class="culture-grid">

          <!-- Culture card: Tomates -->
          @foreach($field->cultures as $culture)

          <div class="culture-card">
            <div class="cc-photo">
              <img src="{{ $culture->typeCulture->imgUrl ? asset('storage/Cultures/' . $culture->typeCulture->imgUrl) :  asset('assets/unknowing.png')}}" alt="{{ $culture->typeCulture->name }}">
              <div class="cc-overlay"></div>
              <div class="cc-cycle cy-harvest">
                {{$culture->cycle}}
              </div>
              <div class="cc-yield">
                <div class="cc-yield-num">{{$culture->quantite_prevu}}t</div>
                <div class="cc-yield-lbl">Prévu</div>
              </div>
              <div class="cc-photo-footer">
                <div class="cc-crop-name">{{$culture->typeCulture->name}}</div>
                <div class="cc-season">{{ucfirst($culture->season)}} {{$culture->harvest_date->format('Y')}} · Parcelle
                  {{strtoupper(str($field->name)->substr(0,1))}} — {{$field->name}}</div>
              </div>
            </div>
            <div class="cc-body">
              <div class="cc-progress">
                <div class="cc-prog-steps">
                  @php
                  $steps = ['planting', 'growth', 'treatment', 'harvest', 'done'];
                  $currentIndex = array_search($culture->cycle, $steps);
                  @endphp
                  @foreach($steps as $index => $step)
                  <div class="cc-step @if($index < $currentIndex) done
                                      @elseif($index === $currentIndex && $index!=4) current 
                                      @elseif($currentIndex === 4) done
                                      @endif
                              "></div>
                  @endforeach
                </div>
                <div class="cc-prog-labels">
                  <span>Semis</span><span>Trait.</span><span>Crois.</span><span>Récolte</span><span>Done</span>
                </div>
              </div>
              <div class="cc-meta-row">
                <div class="cc-meta-chip"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7" />
                  </svg>{{$culture->user->name}}</div>
              </div>
              <div class="cc-dates">
                <div class="cc-date-item">
                  <div class="cc-date-label">Semis</div>
                  <div class="cc-date-val">{{$culture->planting_date->format('d M Y')}}</div>
                </div>
                <div class="cc-date-item">
                  <div class="cc-date-label">Récolte prévue</div>
                  <div class="cc-date-val">{{$culture->harvest_date->format('d M Y')}}</div>
                </div>
              </div>
            </div>
            <div class="cc-footer">
              <a href="{{route('cultures.show', $culture->id)}}" class="cc-action-btn"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>Détails</a>
              <a href="{{ route('cultures.edit', $culture->id) }}" class="cc-action-btn cc-action-primary"><svg fill="none" stroke="currentColor"
                  viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>Modifier</a>
            </div>
          </div>
          @endforeach
          <a href="{{route('cultures.create')}}" class="culture-card-add">
            <div class="cca-icon"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg></div>
            <div class="cca-label">Ajouter une culture</div>
          </a>

        </div>

        <div class="ps-summary">
          <div class="ps-sum-chip"><span class="ps-sum-dot dot-harvest"></span>1 en récolte</div>
          <div class="ps-sum-chip"><span class="ps-sum-dot dot-plant"></span>1 en plantation</div>
        </div>
      </div>
      @endforeach
      {{ $fields->links('pagination.custom') }}
    </div>
  @endsection