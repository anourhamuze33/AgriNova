<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Ajouter équipement</title>

  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Outfit', sans-serif;
      background: #f8f4ed;
      padding: 2rem;
    }

    .form-container {
      max-width: 700px;
      margin: auto;
      background: #fff;
      padding: 2rem;
      border-radius: 16px;
      border: 1.5px solid #c8dcc0;
    }

    h1 {
      margin-bottom: 1.5rem;
      color: #1b3a2d;
    }

    .form-group {
      margin-bottom: 1.25rem;
    }

    label {
      display: block;
      margin-bottom: 6px;
      font-weight: 600;
      font-size: 14px;
      color: #254d3a;
    }

    input,
    select {
      width: 100%;
      padding: 10px 12px;
      border-radius: 10px;
      border: 1.5px solid #c8dcc0;
      font-size: 14px;
    }

    input:focus,
    select:focus {
      outline: none;
      border-color: #4a8c68;
    }

    .btn {
      background: #1b3a2d;
      color: #fff;
      padding: 10px 18px;
      border-radius: 10px;
      border: none;
      cursor: pointer;
      font-weight: 600;
    }

    .btn:hover {
      background: #2e6b4f;
    }

    .checkbox-group {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-top: 10px;
    }
  </style>
</head>

<body>

  <div class="form-container">
    <h1>Ajouter un équipement</h1>

    <form action="" method="POST">
      @csrf

      <!-- NAME -->
      <div class="form-group">
        <label>Nom de l’équipement</label>
        <input type="text" name="name" required>
      </div>

      <!-- TYPE -->
      <div class="form-group">
        <label>Type</label>
        <select name="type" required>
          <option value="">-- Choisir --</option>
          <option value="tracteur">Tracteur</option>
          <option value="irrigation">Irrigation</option>
          <option value="outil">Outil</option>
        </select>
      </div>

      <!-- STATUS -->
      <div class="form-group">
        <label>Status</label>
        <select name="status" required>
          <option value="active">Actif</option>
          <option value="maintenance">Maintenance</option>
          <option value="inactive">Inactif</option>
        </select>
      </div>

      <!-- PURCHASE DATE -->
      <div class="form-group">
        <label>Date d'achat</label>
        <input type="date" name="purchase_date" required>
      </div>

      <!-- PRICE -->
      <div class="form-group">
        <label>Prix d'achat (DH)</label>
        <input type="number" name="purchase_price" step="0.01" required>
      </div>

      <!-- FIELD ASSIGN -->
      <div class="form-group">
        <label>Parcelle assignée</label>
        <select name="field_id">
          <option value="">-- Aucune --</option>


        </select>
      </div>

      <!-- CURRENT FIELD -->
      <div class="checkbox-group">
        <input type="checkbox" name="is_current" value="1">
        <label>Définir comme parcelle actuelle</label>
      </div>

      <!-- LATEST ASSIGNMENT -->
      <div class="checkbox-group">
        <input type="checkbox" name="is_latest" value="1">
        <label>Dernière affectation</label>
      </div>

      <br>

      <button type="submit" class="btn">Enregistrer</button>

    </form>
  </div>

</body>
</html>

