@extends('layouts.app')
@section('title', 'changer des cultures')
@section('content')
    <div class="wrap">
        <div class="header">
            <div>
                <h1>Modifier la culture</h1>
                <p>Ajustez les informations de la culture puis enregistrez les changements.</p>
            </div>
            <div class="actions">
                <a class="btn btn-secondary" href="{{ route('cultures.show', $culture->id) }}">Retour au detail</a>
                <a class="btn btn-secondary" href="{{ route('cultures.index') }}">Liste des cultures</a>
            </div>
        </div>

        <div class="card">
            @if ($errors->any())
                <div class="notice">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('cultures.update', $culture->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid">
                    <div class="field">
                        <label for="type_culture_id">Type de culture</label>
                        <select id="type_culture_id" name="type_culture_id" required>
                            @foreach ($typesNames as $type => $culturesNames)
                                <optgroup label="{{ $type }}">
                                    @foreach ($culturesNames as $cultureType)
                                        <option value="{{ $cultureType->id }}" @selected(old('type_culture_id', $culture->type_culture_id) == $cultureType->id)>
                                            {{ $cultureType->name }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>

                    <div class="field">
                        <label for="field_id">Parcelle</label>
                        <select id="field_id" name="field_id" required>
                            @foreach ($fields as $field)
                                <option value="{{ $field->id }}" @selected(old('field_id', $culture->field_id) == $field->id)>
                                    {{ $field->name }} ({{ $field->size }} ha)
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field">
                        <label for="season">Saison</label>
                        <select id="season" name="season" required>
                            @php
                                $seasons = ['printemps' => 'Printemps', 'été' => 'Ete', 'automne' => 'Automne', 'hiver' => 'Hiver'];
                            @endphp
                            @foreach ($seasons as $value => $label)
                                <option value="{{ $value }}" @selected(old('season', $culture->season) == $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field">
                        <label for="cycle">Cycle</label>
                        <select id="cycle" name="cycle" required>
                            @php
                                $cycles = ['planting' => 'Plantation', 'growth' => 'Croissance', 'treatment' => 'Traitement', 'harvest' => 'Recolte', 'done' => 'Termine'];
                            @endphp
                            @foreach ($cycles as $value => $label)
                                <option value="{{ $value }}" @selected(old('cycle', $culture->cycle) == $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field">
                        <label for="planting_date">Date de plantation</label>
                        <input id="planting_date" type="date" name="planting_date" value="{{ old('planting_date', $culture->planting_date->format('Y-m-d')) }}" required>
                    </div>

                    <div class="field">
                        <label for="harvest_date">Date de recolte</label>
                        <input id="harvest_date" type="date" name="harvest_date" value="{{ old('harvest_date', $culture->harvest_date->format('Y-m-d')) }}" required>
                    </div>

                    <div class="field">
                        <label for="quantite_prevu">Quantite prevue</label>
                        <input id="quantite_prevu" type="number" step="0.01" min="0" name="quantite_prevu" value="{{ old('quantite_prevu', $culture->quantite_prevu) }}" required>
                    </div>

                    <div class="field">
                        <label for="user_id">Responsable</label>
                        <select id="user_id" name="user_id" required>
                            @foreach ($rolesWithUsers as $rolesWithUser)
                                <optgroup label="{{ $rolesWithUser->name }}">
                                    @foreach ($rolesWithUser->users as $user)
                                        <option value="{{ $user->id }}" @selected(old('user_id', $culture->user_id) == $user->id)>{{ $user->name }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="meta">
                    Culture actuelle: {{ $culture->typeCulture->name }} sur {{ $culture->field->name }}. Les modifications seront enregistrees directement sur cet enregistrement.
                </div>

                <div class="footer">
                    <a class="btn btn-secondary" href="{{ route('cultures.show', $culture->id) }}">Annuler</a>
                    <button type="submit" class="btn-primary">Enregistrer les changements</button>
                </div>
            </form>
        </div>
    </div>
@endsection
