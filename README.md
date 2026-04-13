# AgriNova

AgriNova est une application web de gestion agricole construite avec Laravel, PHP et MySQL selon une architecture MVC. Le projet vise a centraliser la gestion des cultures, des parcelles, des utilisateurs et du suivi de production dans une interface simple et evolutive.

## Contenu du depot

- `src/` : application Laravel
- `docs/` : documentation technique, diagrammes UML/ERD et script SQL
- `docker-compose.yml` : environnement de developpement
- `docker/` : configuration conteneurs

## Livrables ajoutes

- README projet
- Documentation technique du projet Laravel
- Diagramme de cas d'utilisation
- Diagramme de classes
- ERD
- Script SQL MySQL base sur les migrations actuelles

## Demarrage rapide

1. Aller dans `src/`
2. Configurer `.env`
3. Installer les dependances si necessaire avec `composer install`
4. Generer la cle avec `php artisan key:generate`
5. Executer les migrations avec `php artisan migrate`
6. Lancer le serveur avec `php artisan serve`

## Documentation

- Application Laravel : [src/README.md](C:/Users/Youcode/Desktop/Agrnova/src/README.md)
- Cas d'utilisation : [docs/use-case-diagram.md](C:/Users/Youcode/Desktop/Agrnova/docs/use-case-diagram.md)
- Diagramme de classes : [docs/class-diagram.md](C:/Users/Youcode/Desktop/Agrnova/docs/class-diagram.md)
- Diagramme ERD : [docs/erd.md](C:/Users/Youcode/Desktop/Agrnova/docs/erd.md)
- Script SQL : [docs/agrinova_schema.sql](C:/Users/Youcode/Desktop/Agrnova/docs/agrinova_schema.sql)

## Etat actuel

Le depot implemente deja une partie du coeur fonctionnel autour des parcelles (`fields`), cultures (`cultures`), types de culture, utilisateurs, roles et demandes. Le cahier des charges cible va plus loin avec la gestion complete des recoltes, stocks, equipements et personnel; ces modules restent a finaliser dans l'application.
