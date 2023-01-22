# Fitnext - Projet BDR
Auteurs : Miguel Jalube, Paul Gillet, Leandro Saraiva Maia

Site web simple permettant de gérer une base de donnée pour une salle de fitness.  
Le framework utilisé est Laravel Lumen.

# Rapport
Le rapport au format pdf est disponible dans le dossier `/rapport/rapport.pdf`.  
Ce fichier `README.md` permet surtout d'expliquer comment installer le projet.

# Installation

## Prérequis
Pour installer ce projet, veuillez à avoir les éléments suivants :
 - Composer
 - php
 - docker

## Base de donnée
Se rendre dans le dossier `/docker` et lancer la commande `docker compose up -d`.  
Cela va créer/démarrer un container contenant la base de donnée avec les données à jour.

## Site php
Dans votre fichier `php.ini`, il faut décommenter les lignes `extension=pdo_pgsql` et `extension=pgsql` afin d'active les extensions postgres pour php.  
Sur linux, vérifier d'avoir le paquet nécessaire avec la commande `sudo apt install php-pgsql`;

Se rendre dans la racine du projet (`/`) et lancer `composer install`.

Faire une copie du fichier `/.env.exemple` et le renommer en `/.env`.

# Lancement de l'application
Se rendre dans la racine du projet (`/`) et lancer `php -S localhost:8000 public`.
