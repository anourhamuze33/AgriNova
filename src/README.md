# AgriNova - Application Laravel

## Presentation

AgriNova est une application de gestion agricole destinee a digitaliser les operations d'une exploitation. Le projet suit une architecture MVC avec Laravel pour organiser les couches `Model`, `View` et `Controller`, faciliter la maintenance et permettre une evolution progressive du systeme.

## Objectifs

- Planifier les cultures et les recoltes
- Centraliser les donnees de production
- Suivre les parcelles et les cycles culturaux
- Encadrer les acces via des roles utilisateurs
- Poser une base evolutive pour les stocks, equipements et personnel

## Fonctionnalites presentes dans le depot

- Gestion des parcelles (`fields`)
- Gestion des types de culture
- Gestion des cultures avec cycle, saison, dates et quantite prevue
- Gestion des utilisateurs et des roles
- Processus de demande/validation pour certains profils
- Interface Blade Laravel pour plusieurs vues principales

## Fonctionnalites prevues par le cahier des charges

- Gestion complete des recoltes et des rendements
- Gestion des stocks, entrees/sorties et alertes
- Gestion des equipements et historique des couts
- Gestion du personnel, des taches et des responsabilites
- Notifications metier
- Tableaux de bord par role

## Architecture

Le projet repose sur :

- `app/Models` pour les entites metier
- `app/Http/Controllers` pour l'orchestration des actions utilisateur
- `app/Services` et `app/Repositories` pour separer la logique metier et l'acces aux donnees
- `resources/views` pour les vues Blade
- `database/migrations` pour la structure de la base
- `routes/web.php` pour les routes HTTP

## Modules observes

### Parcelles

- Table principale : `fields`
- Donnees : nom, ville, taille
- Controleur : `FieldController`

### Cultures

- Table principale : `cultures`
- Donnees : type de culture, parcelle, cycle, saison, dates, statut, quantite prevue, utilisateur
- Controleur : `CultureController`

### Types de culture

- Table principale : `type_cultures`
- Donnees : type, nom, image

### Utilisateurs et roles

- Tables principales : `users`, `roles`, `user_role`
- Gestion d'acces et rattachement a des roles

### Demandes

- Table principale : `demandes`
- Utilisee pour la validation d'acces/metiers avec statut et notes

## Installation locale

### Prerequis

- PHP 8.x
- Composer
- MySQL ou SQLite pour le developpement
- Node.js si compilation front necessaire

### Etapes

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Si vous utilisez Vite :

```bash
npm install
npm run dev
```

## Base de donnees

Le dossier [../docs](C:/Users/Youcode/Desktop/Agrnova/docs) contient :

- un script SQL MySQL
- un diagramme de classes
- un diagramme de cas d'utilisation
- un diagramme ERD

## Remarque importante

Le cahier des charges decrit un perimetre plus large que l'etat courant du code. La base actuelle est exploitable pour demarrer la gestion des cultures, mais plusieurs CRUD et modules strategiques restent a completer pour atteindre la version finale attendue.
