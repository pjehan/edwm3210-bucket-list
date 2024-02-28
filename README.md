# Bucket List EDWM3210

## Étapes d'installation

1. Cloner le projet
2. Installer les dépendances
```shell
composer install
php bin/console importmap:install
```
3. Démarrer le serveur de développement (si vous n'avez pas de serveur local (ex: Apache))
```shell
php -S localhost:8000 -t public
```
Ou avec le CLI de Symfony (obligatoire pour la gestion des assets avec importmap)
```shell
symfony serve
```

## Étapes de création du projet

1. Créer un nouveau projet Symfony
```shell
composer create-project symfony/skeleton bucket-list
cd bucket-list
composer require webapp # Optionnel (pour installer Doctrine, Twig, etc.)
```
Ou avec le CLI de Symfony
```shell
symfony new bucket-list # ou symfony new --webapp bucket-list
```

2. Créer un controller
```shell
php bin/console make:controller
```
