<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une culture</title>
    <style>
        :root {
            --bg: #f7f3ea;
            --card: #ffffff;
            --text: #1b2e22;
            --muted: #627268;
            --border: #d7e1d6;
            --primary: #1f4d36;
            --primary-soft: #edf5ef;
            --danger: #a33d20;
        }

        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
        }
        .wrap {
            max-width: 980px;
            margin: 0 auto;
            padding: 32px 20px 48px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
        }
        .header h1 {
            margin: 0 0 6px;
            font-size: 32px;
        }
        .header p {
            margin: 0;
            color: var(--muted);
        }
        .actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }
        .btn,
        button {
            border: 0;
            border-radius: 10px;
            padding: 12px 18px;
            font-size: 14px;
            text-decoration: none;
            cursor: pointer;
        }
        .btn-secondary {
            background: var(--card);
            color: var(--text);
            border: 1px solid var(--border);
        }
        .btn-primary {
            background: var(--primary);
            color: #fff;
        }
        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 10px 30px rgba(31, 77, 54, 0.06);
        }
        .notice {
            margin-bottom: 16px;
            padding: 14px 16px;
            border-radius: 12px;
            background: #fff5f3;
            color: var(--danger);
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }
        .field {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .field.full {
            grid-column: 1 / -1;
        }
        label {
            font-weight: 700;
            font-size: 14px;
        }
        input,
        select {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 12px 14px;
            font-size: 14px;
            background: #fff;
        }
        .footer {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 24px;
        }
        .meta {
            margin-top: 20px;
            padding: 14px 16px;
            border-radius: 12px;
            background: var(--primary-soft);
            color: var(--muted);
            font-size: 14px;
        }
        @media (max-width: 720px) {
            .header { align-items: flex-start; flex-direction: column; }
            .grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
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
</body>
</html>
