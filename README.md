# Lumen project

## Installation

Créer la base de données mysql et vérifié que ce sont bien les bonnes données de connection dans le fichier `.env`.

Ensuite pour installer toutes les dépendances :

```
composer install
```

### Migration

Pour les dev: 
> Pour éviter de ce prendre la tête et aller plus rapidement, on ne créer pas de nouveau fichier de migration pour modifier une entité.
On modifie directement le dossier déjà éxistant.
[La documentation Laravel](https://laravel.com/docs/8.x/migrations)

```
php artisan migrate
```
### Seeder

Pour avoir un jeux de fausses données.

```
php artisan db:seed
```

## Démarrage

```
php -S localhost:8000 -t public
```
