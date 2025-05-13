<!-- TITRE -->

<!-- DESCRIPTION -->

<!-- FONCTIONNALITES -->

<!-- STACK TECHNIQUE -->

<!-- STRUCTURE DU PROJET -->

<!-- ENTITES BASES DE DONNEES ET RELATIONS -->

<!-- REGLES DE GESTION -->

<!-- WORKFLOW -->

<!-- AUTHENTIFICATION ET AUTHORIZATION -->

<!-- INTERFACE UTILISATEUR -->

<!-- INSTALLATION -->

<!-- INSTALLATION AVEC LARAVEL SAIL -->

<!-- COMMANDES UTILES -->

# Wave Human Resource

<!-- DESCRIPTION -->
## Description
**Wave Human Resource** est une application web de gestion des ressources humaines conçue pour simplifier et automatiser les processus RH au sein de Wave Inc. Elle offre une plateforme centralisée pour la gestion des collaborateurs, des contrats, des congés, des compétences, des départements, et bien plus encore.

<!-- FONCTIONNALITES -->
## Fonctionnalités Principales
*   Gestion complète des profils collaborateurs (informations personnelles, contacts d'urgence, parcours professionnel).
*   Administration des départements et des postes au sein de l'organisation.
*   Suivi des contrats de travail (création, avenants, archivage, types de contrat).
*   Système de gestion des congés (demandes, approbations, soldes, types de congés).
*   Répertoire des compétences techniques et des langues maîtrisées par les collaborateurs.
*   Gestion des diplômes et certifications.
*   Centralisation et gestion des documents administratifs des employés.
*   Historique des augmentations de salaire et suivi de la rémunération.
*   Planification et gestion des jours fériés.
*   Gestion des types de primes et attributions.
*   Système d'authentification sécurisé et gestion des rôles utilisateurs (Administrateur, Manager, Collaborateur).

<!-- STACK TECHNIQUE -->
## Stack Technique
*   **Backend**: PHP 8.1+ (Veuillez vérifier votre version exacte dans `composer.json`), Laravel Framework 10.x (Veuillez vérifier votre version exacte dans `composer.json`)
*   **Frontend**: Blade (moteur de template Laravel), Livewire, Tailwind CSS (probable), Alpine.js (probable)
*   **Base de données**: SQLite (utilisé par défaut pour le développement local, via `database/database.sqlite`). Compatible avec MySQL, PostgreSQL, SQL Server (configurable dans `.env`).
*   **Serveur Web**: Nginx ou Apache (généralement géré par Laravel Sail en développement).
*   **Environnement de développement**: Docker (via Laravel Sail), Vite pour la compilation des assets.
*   **Tests**: PHPUnit.
*   **Gestion des dépendances**: Composer (PHP), NPM ou Yarn (JavaScript).

<!-- STRUCTURE DU PROJET -->
## Structure du Projet
Le projet suit l'architecture standard de Laravel :
*   `app/`: Contient le cœur de l'application (Modèles, Contrôleurs HTTP, Composants Livewire, Enums, Exceptions, Providers, etc.).
*   `bootstrap/`: Scripts d'initialisation du framework et auto-chargement.
*   `config/`: Tous les fichiers de configuration de l'application.
*   `database/`: Migrations de la base de données, factories de modèles, et seeders. `database.sqlite` y est stocké pour le développement.
*   `lang/`: Fichiers de traduction (français disponible).
*   `public/`: Point d'entrée HTTP (`index.php`) et assets compilés (CSS, JS, images).
*   `resources/`: Vues (templates Blade), assets bruts (SCSS, JS), et fichiers de langue non compilés.
*   `routes/`: Définition de toutes les routes de l'application (`web.php`, `api.php`, `console.php`, `auth.php`).
*   `storage/`: Fichiers générés par le framework (logs, caches, fichiers uploadés, sessions).
*   `tests/`: Contient les tests automatisés (unitaires et fonctionnels).
*   `vendor/`: Dépendances gérées par Composer.
*   `docker-compose.yml`: Configuration pour Laravel Sail.
*   `vite.config.js`: Configuration pour Vite.

<!-- ENTITES BASES DE DONNEES ET RELATIONS -->
## Entités de la Base de Données et Relations (Principales)
*   **`User`**: Gère les comptes utilisateurs pour l'accès à l'application.
*   **`Collaborateur`**: Entité centrale représentant un employé.
    *   Lié à `User` (un utilisateur peut être un collaborateur).
    *   Possède plusieurs `ContactUrgence`, `ContratTravail`, `Diplome`, `Certification`, `DocumentAdministratif`, `HistoriqueAugmentation`.
    *   Est associé à un `Poste` et indirectement à un `Departement`.
    *   Relation Plusieurs-à-Plusieurs avec `CompetenceTechnique` (via `CollaborateurCompetenceTechnique`).
    *   Relation Plusieurs-à-Plusieurs avec `Langue` (via `CollaborateurLangue`).
*   **`Departement`**: Représente un département de l'entreprise.
    *   Peut avoir plusieurs `Poste`s ou `Collaborateur`s.
*   **`Poste`**: Définit un rôle ou une position dans un `Departement`.
    *   Plusieurs `Collaborateur`s peuvent occuper le même type de poste.
*   **`ContratTravail`**: Détails des contrats des collaborateurs.
    *   Associé à un `Collaborateur` et un `TypeContratTravail` (Enum).
*   **`CompetenceTechnique`, `Langue`, `Diplome`, `Certification`**: Attributs professionnels des collaborateurs.
*   **`DocumentAdministratif`**: Stockage des documents relatifs aux collaborateurs, lié à `TypeDocument`.
*   **`TypeConge`, `TypeContratTravail`, `TypeFormation`, `TypeJourFerie`, `TypePrime`, `UserRole`**: Enums définissant des types et statuts spécifiques.
*   **`Pays`, `Region`, `Ville`**: Données géographiques pour les adresses.
*(Cette section peut être affinée en consultant le fichier `check_relations.php` ou les définitions des modèles Eloquent.)*

<!-- REGLES DE GESTION -->
## Règles de Gestion (Exemples)
*   Un collaborateur doit être associé à un contrat de travail actif pour être considéré comme employé.
*   Les demandes de congé sont soumises à un workflow d'approbation (par exemple, par le manager du département).
*   L'accès aux différentes fonctionnalités de l'application est contrôlé par des rôles et permissions (Admin, Manager, Collaborateur).
*   La création d'un nouveau collaborateur déclenche la création d'un compte utilisateur associé.
*(Cette section est à compléter avec les règles métier spécifiques à Wave Inc.)*

<!-- WORKFLOW -->
## Workflows Utilisateur (Exemples)
*   **Intégration (Onboarding) d'un nouveau collaborateur**:
    1.  Création du profil du collaborateur par un administrateur RH.
    2.  Assignation d'un contrat de travail.
    3.  Configuration des accès et informations initiales.
*   **Demande et approbation de congé**:
    1.  Le collaborateur soumet une demande de congé via son interface.
    2.  Le manager reçoit une notification et examine la demande.
    3.  Le manager approuve ou rejette la demande.
    4.  Le solde de congés du collaborateur est mis à jour.
*   **Gestion des départs (Offboarding)**:
    1.  Enregistrement de la date de départ.
    2.  Calcul du solde de tout compte.
    3.  Archivage des documents et désactivation du compte.
*(Cette section est à compléter avec les workflows spécifiques à Wave Inc.)*

<!-- AUTHENTIFICATION ET AUTHORIZATION -->
## Authentification et Autorisation
*   **Authentification**: Gérée par le système d'authentification intégré de Laravel (probablement Laravel Breeze, Jetstream, ou UI).
*   **Autorisation**: Basée sur les rôles et permissions, utilisant le package `spatie/laravel-permission` (visible dans le dossier `vendor/`).
    *   Les rôles sont définis dans l'Enum `App\Enums\UserRole.php` (ex: `ADMIN`, `MANAGER`, `COLLABORATEUR`).
    *   Des permissions spécifiques peuvent être assignées aux rôles pour un contrôle d'accès granulaire.

<!-- INTERFACE UTILISATEUR -->
## Interface Utilisateur
*   L'application propose une interface web moderne et responsive.
*   Développée avec les templates Laravel Blade et enrichie avec des composants dynamiques Livewire.
*   Le style est probablement géré par Tailwind CSS, offrant une grande flexibilité et un design épuré.
*   L'interactivité côté client est assurée par Livewire et potentiellement Alpine.js pour des améliorations légères.

<!-- PREREQUIS -->
## Prérequis
*   PHP >= 8.1 (vérifiez `composer.json` pour la version exacte)
*   Composer 2.x
*   Node.js (dernière version LTS recommandée) & NPM ou Yarn
*   Docker Desktop (si vous utilisez Laravel Sail)
*   Une base de données relationnelle (MySQL, PostgreSQL, ou SQLite pour le développement).

<!-- INSTALLATION -->
## Installation Standard (Sans Sail)
1.  **Cloner le dépôt Git :**
    ```bash
    git clone <URL_DU_REPOSITORY>
    cd Wave-Human-Resource
    ```
2.  **Copier le fichier d'environnement :**
    Pour PowerShell (Windows) :
    ```powershell
    Copy-Item .env.example .env
    ```
    Pour Bash (Linux/macOS) :
    ```bash
    cp .env.example .env
    ```
3.  **Installer les dépendances PHP :**
    ```bash
    composer install --no-dev # Pour la production, omettre --no-dev pour le développement
    ```
4.  **Installer les dépendances JavaScript :**
    ```bash
    npm install
    # ou
    # yarn install
    ```
5.  **Compiler les assets frontend :**
    ```bash
    npm run build # Pour la production
    # ou
    # npm run dev # Pour le développement
    ```
6.  **Générer la clé d'application Laravel :**
    ```bash
    php artisan key:generate
    ```
7.  **Configurer la base de données :**
    Modifiez le fichier `.env` avec les informations de connexion à votre base de données (MySQL, PostgreSQL, etc.). Pour SQLite, la configuration par défaut peut suffire si le fichier `database/database.sqlite` est utilisé.
    ```ini
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=wave_hr
    DB_USERNAME=root
    DB_PASSWORD=
    ```
8.  **Exécuter les migrations et les seeders (optionnel) :**
    ```bash
    php artisan migrate --seed
    ```
9.  **Lier le dossier de stockage :**
    ```bash
    php artisan storage:link
    ```
10. **Démarrer le serveur de développement PHP intégré :**
    ```bash
    php artisan serve
    ```
    L'application sera accessible à `http://localhost:8000`.

<!-- INSTALLATION AVEC LARAVEL SAIL -->
## Installation avec Laravel Sail (Recommandé pour le développement)
Laravel Sail fournit un environnement de développement Docker local.
1.  **Cloner le dépôt Git :**
    ```bash
    git clone <URL_DU_REPOSITORY>
    cd Wave-Human-Resource
    ```
2.  **Copier le fichier d'environnement :**
    Pour PowerShell (Windows) :
    ```powershell
    Copy-Item .env.example .env
    ```
    Pour Bash (Linux/macOS) :
    ```bash
    cp .env.example .env
    ```
    *Note : Le fichier `docker-compose.yml` est configuré pour Sail. Par défaut, Sail utilise MySQL. Si vous souhaitez continuer avec `database.sqlite`, vous devrez ajuster la configuration de la base de données dans `.env` pour que l'application Laravel l'utilise, et potentiellement commenter ou ajuster la section du service de base de données dans `docker-compose.yml` si vous ne voulez pas que Sail gère un conteneur de base de données séparé.*
    Pour utiliser SQLite avec Sail (où Sail gère PHP/Nginx mais pas la DB) :
    Dans `.env`, assurez-vous que `DB_CONNECTION=sqlite` et que `DB_DATABASE` pointe vers le chemin absolu du fichier `database.sqlite` *à l'intérieur du conteneur Docker* (généralement `/var/www/html/database/database.sqlite`).
3.  **Démarrer les conteneurs Sail :**
    (Assurez-vous que Docker Desktop est en cours d'exécution)
    ```bash
    ./vendor/bin/sail up -d
    ```
4.  **Installer les dépendances Composer (via Sail) :**
    ```bash
    ./vendor/bin/sail composer install
    ```
5.  **Installer les dépendances NPM (via Sail) :**
    ```bash
    ./vendor/bin/sail npm install
    ```
6.  **Compiler les assets (via Sail) :**
    ```bash
    ./vendor/bin/sail npm run dev # ou npm run build pour la production
    ```
7.  **Générer la clé d'application (via Sail) :**
    ```bash
    ./vendor/bin/sail artisan key:generate
    ```
8.  **Exécuter les migrations (et les seeders, via Sail) :**
    ```bash
    ./vendor/bin/sail artisan migrate --seed
    ```
    Si vous utilisez SQLite, assurez-vous que le fichier `database/database.sqlite` existe. Vous pouvez le créer avec :
    ```bash
    ./vendor/bin/sail artisan tinker --execute="touch(database_path('database.sqlite'));"
    ```
    avant de lancer les migrations.
9.  **Lier le dossier de stockage (via Sail) :**
    ```bash
    ./vendor/bin/sail artisan storage:link
    ```
10. **Accéder à l'application :**
    Ouvrez votre navigateur et allez à `http://localhost` (ou le port défini dans `APP_PORT` de votre `.env`).

<!-- COMMANDES UTILES -->
## Commandes Utiles (avec Sail)
*   Démarrer les services en arrière-plan : `./vendor/bin/sail up -d`
*   Arrêter les services : `./vendor/bin/sail down`
*   Afficher les logs : `./vendor/bin/sail logs -f <nom-du-service>` (ex: `laravel.test`, `mysql`)
*   Exécuter une commande Artisan : `./vendor/bin/sail artisan <commande>`
*   Exécuter les tests : `./vendor/bin/sail test` ou `./vendor/bin/sail artisan test`
*   Ouvrir un shell dans le conteneur de l'application : `./vendor/bin/sail shell`
*   Exécuter une commande Composer : `./vendor/bin/sail composer <commande>`
*   Exécuter une commande NPM : `./vendor/bin/sail npm <commande>` (ex: `npm run watch`)
*   Forcer la reconstruction des images Docker (si `docker-compose.yml` a changé) : `./vendor/bin/sail build --no-cache`
*   Nettoyer les volumes Docker (attention, supprime les données de la base de données si gérée par Sail) : `./vendor/bin/sail down -v`

---
N'hésitez pas à compléter ou modifier ce README avec des informations plus spécifiques à votre projet !
