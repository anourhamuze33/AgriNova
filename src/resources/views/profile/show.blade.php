@extends('layouts.app')
@section('title', 'Listes des cultures')

@section('content')

    @php
        $roleName = optional($user->roles->first())->name ?? 'Utilisateur';
        $initials = collect(explode(' ', trim($user->name)))->filter()->map(fn ($part) => strtoupper(substr($part, 0, 1)))->take(2)->implode('');
    @endphp

 
            <div class="page-hdr">
                <div>
                    <h1 class="page-title">Mon profil</h1>
                    <p class="page-sub">Modifiez vos informations personnelles en gardant la meme interface que le reste de l'application.</p>
                </div>
            </div>

            <div class="layout">
                <div>
                    <div class="card">
                        <div class="profile-hero">
                            <div class="profile-avatar">{{ $initials ?: 'AG' }}</div>
                            <div class="profile-name">{{ $user->name }}</div>
                            <div class="profile-role">{{ $roleName }}</div>
                        </div>
                        <div class="card-body">
                            <div class="meta-list">
                                <div class="meta-item">
                                    <div class="meta-label">Email</div>
                                    <div class="meta-value">{{ $user->email }}</div>
                                </div>
                                <div class="meta-item">
                                    <div class="meta-label">Telephone</div>
                                    <div class="meta-value">{{ $user->telephone ?: 'Non renseigne' }}</div>
                                </div>
                                <div class="meta-item">
                                    <div class="meta-label">Ville</div>
                                    <div class="meta-value">{{ optional($user->ville)->name ?: 'Non renseignee' }}</div>
                                </div>
                                <div class="meta-item">
                                    <div class="meta-label">Specialite</div>
                                    <div class="meta-value">{{ $user->specialite ?: 'Non renseignee' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="margin-top: 1rem;">
                        <div class="card-head">Resume professionnel</div>
                        <div class="card-body">
                            <div class="hint-grid">
                                <div class="hint">
                                    <strong>Experience</strong>
                                    {{ $user->annees_experience ?? 0 }} an(s)
                                </div>
                                <div class="hint">
                                    <strong>Tarif horaire</strong>
                                    {{ $user->tarif_horaire ?? 0 }} DH
                                </div>
                                <div class="hint">
                                    <strong>Interventions</strong>
                                    {{ $user->interventions ?? 0 }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-head">Editer le profil</div>
                    <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="grid">
                                <div class="field">
                                    <label for="name">Nom complet</label>
                                    <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required>
                                </div>
                                <div class="field">
                                    <label for="user_name">Nom utilisateur</label>
                                    <input id="user_name" name="user_name" type="text" value="{{ old('user_name', $user->user_name) }}">
                                </div>
                                <div class="field">
                                    <label for="email">Email</label>
                                    <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required>
                                </div>
                                <div class="field">
                                    <label for="telephone">Telephone</label>
                                    <input id="telephone" name="telephone" type="text" value="{{ old('telephone', $user->telephone) }}">
                                </div>
                                <div class="field">
                                    <label for="ville_id">Ville</label>
                                    <select id="ville_id" name="ville_id">
                                        <option value="">Choisir une ville</option>
                                        @foreach ($villes as $ville)
                                            <option value="{{ $ville->id }}" @selected(old('ville_id', $user->ville_id) == $ville->id)>{{ $ville->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="field">
                                    <label for="specialite">Specialite</label>
                                    <input id="specialite" name="specialite" type="text" value="{{ old('specialite', $user->specialite) }}">
                                </div>
                                <div class="field">
                                    <label for="annees_experience">Annees d'experience</label>
                                    <input id="annees_experience" name="annees_experience" type="number" min="0" value="{{ old('annees_experience', $user->annees_experience) }}">
                                </div>
                                <div class="field">
                                    <label for="tarif_horaire">Tarif horaire</label>
                                    <input id="tarif_horaire" name="tarif_horaire" type="number" min="0" step="0.01" value="{{ old('tarif_horaire', $user->tarif_horaire) }}">
                                </div>
                                <div class="field full">
                                    <label for="interventions">Nombre d'interventions</label>
                                    <input id="interventions" name="interventions" type="number" min="0" value="{{ old('interventions', $user->interventions) }}">
                                </div>
                            </div>

                            @if ($errors->any())
                                <div class="notice" style="margin-top: 1rem; background: #fff4f1; color: var(--rust); border-color: #f1d4cc;">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <div class="actions">
                                <a href="{{ route('cultures.index') }}" class="btn btn-outline">Retour</a>
                                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection