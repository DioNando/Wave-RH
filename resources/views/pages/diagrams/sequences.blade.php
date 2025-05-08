<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Diagrammes de Séquence - Processus métier" />
    </x-slot>

    <div class="space-y-6">
        <!-- Diagramme de séquence pour demande de congé -->
        <x-card>
            <x-card.card-body>
                <h2 class="text-xl font-semibold mb-4">Processus de demande de congé</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Représentation du flux de traitement d'une demande de congé du collaborateur au responsable.
                </p>

                <x-diagram.mermaid caption="Diagramme de séquence pour une demande de congé">
sequenceDiagram
autonumber
actor Collaborateur
participant UI as Interface Utilisateur
participant Controller as CongeController
participant Model as HistoriqueConge
participant CollabModel as Collaborateur
participant DB as Base de Données
participant Notif as Service de Notification
actor Responsable

Collaborateur->>UI: Accède au formulaire de demande de congé
UI->>Collaborateur: Affiche le formulaire de demande
Collaborateur->>UI: Soumet demande (type, dates, motif)
UI->>Controller: Transmet les données du formulaire
Controller->>Model: Crée nouvelle demande
Model->>DB: INSERT historique_conges
DB-->>Model: Confirmation de l'insertion
Model-->>Controller: Retourne demande créée
Controller->>Notif: Envoie notification de nouvelle demande
Notif->>Responsable: Notifie d'une demande en attente
Controller-->>UI: Redirige vers la page de confirmation
UI-->>Collaborateur: Affiche la confirmation

Responsable->>UI: Accède à la liste des demandes en attente
UI->>Controller: Demande la liste des congés en attente
Controller->>Model: Récupère les demandes en attente
Model->>DB: SELECT * FROM historique_conges WHERE statut = 'en_attente'
DB-->>Model: Retourne les demandes en attente
Model-->>Controller: Transmet les demandes
Controller-->>UI: Affiche la liste des demandes
UI-->>Responsable: Présente les demandes en attente

Responsable->>UI: Approuve/Rejette la demande
UI->>Controller: Transmet la décision
Controller->>Model: Met à jour le statut de la demande
Model->>DB: UPDATE historique_conges SET statut = 'approuvé/refusé'
alt Demande approuvée
Controller->>CollabModel: Récupère collaborateur associé
CollabModel->>DB: SELECT * FROM collaborateurs WHERE id = collaborateur_id
DB-->>CollabModel: Retourne données collaborateur
Controller->>CollabModel: Met à jour le solde de congés
CollabModel->>DB: UPDATE collaborateurs SET solde_conge = solde_conge - duree_conge
end
DB-->>Model: Confirmation de la mise à jour
Model-->>Controller: Confirmation de la mise à jour
Controller->>Notif: Envoie notification de la décision
Notif->>Collaborateur: Notifie la décision (approuvé/refusé)
Controller-->>UI: Affiche confirmation
UI-->>Responsable: Affiche confirmation de la décision
                </x-diagram.mermaid>
            </x-card.card-body>
        </x-card>

        <!-- Diagramme de séquence pour l'onboarding d'un nouveau collaborateur -->
        <x-card>
            <x-card.card-body>
                <h2 class="text-xl font-semibold mb-4">Processus d'onboarding d'un nouveau collaborateur</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Flux de travail pour l'intégration d'un nouveau collaborateur dans le système.
                </p>

                <x-diagram.mermaid caption="Diagramme de séquence pour l'onboarding d'un nouveau collaborateur">
sequenceDiagram
autonumber
actor RH as RH Manager
participant UI as Interface Utilisateur
participant Controller as CollaborateurController
participant CollabModel as Collaborateur
participant UserModel as User
participant HistModel as HistoriquePoste
participant DB as Base de Données
participant Email as Service Email
actor Nouveau as Nouveau Collaborateur

RH->>UI: Accède au formulaire de création collaborateur
UI->>RH: Affiche le formulaire
RH->>UI: Remplit les informations collaborateur
UI->>Controller: Soumet les données du formulaire
Controller->>UserModel: Crée un compte utilisateur
UserModel->>DB: INSERT INTO users (nom, prenom, email, password, statut)
DB-->>UserModel: Confirmation user_id
Controller->>UserModel: Assigne le rôle approprié (via Spatie)
UserModel->>DB: INSERT INTO model_has_roles (role_id, model_id)
DB-->>UserModel: Confirmation rôle assigné
Controller->>CollabModel: Crée le profil collaborateur
CollabModel->>DB: INSERT INTO collaborateurs (user_id, nom, prenom, etc.)
DB-->>CollabModel: Confirmation collaborateur_id
Controller->>HistModel: Associe au département et poste
HistModel->>DB: INSERT INTO historique_postes (collaborateur_id, poste_id)
DB-->>HistModel: Confirmation historique_id
Controller->>Email: Demande envoi email d'accueil
Email->>Nouveau: Envoie email d'accueil avec credentials
Controller-->>UI: Retourne confirmation de création
UI-->>RH: Affiche confirmation et détails

Nouveau->>UI: Première connexion au système
UI->>Nouveau: Demande changement de mot de passe
Nouveau->>UI: Soumet nouveau mot de passe
UI->>Controller: Transmet le nouveau mot de passe
Controller->>UserModel: Met à jour le mot de passe
UserModel->>DB: UPDATE users SET password = ?
DB-->>UserModel: Confirmation mise à jour
UserModel-->>Controller: Confirmation mise à jour
Controller-->>UI: Redirige vers le tableau de bord
UI-->>Nouveau: Affiche le tableau de bord
                </x-diagram.mermaid>
            </x-card.card-body>
        </x-card>

        <!-- Diagramme de séquence pour la gestion des documents administratifs -->
        <x-card>
            <x-card.card-body>
                <h2 class="text-xl font-semibold mb-4">Gestion des documents administratifs</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Processus de téléversement, stockage et consultation des documents administratifs.
                </p>

                <x-diagram.mermaid caption="Diagramme de séquence pour la gestion des documents">
                    sequenceDiagram
                    autonumber
                    actor User as Utilisateur
                    participant UI as Interface Utilisateur
                    participant Controller as DocumentController
                    participant DocModel as DocumentAdministratif
                    participant TypeModel as TypeDocument
                    participant Storage as Système de Stockage
                    participant DB as Base de Données

                    User->>UI: Accède à la section documents
                    UI->>Controller: Demande liste documents
                    Controller->>DocModel: Récupère documents du collaborateur
                    DocModel->>DB: SELECT * FROM document_administratifs WHERE collaborateur_id = ?
                    DB-->>DocModel: Retourne les documents
                    Controller->>TypeModel: Récupère les types de documents
                    TypeModel->>DB: SELECT * FROM type_documents
                    DB-->>TypeModel: Retourne les types de documents
                    DocModel-->>Controller: Transmet documents avec leurs types
                    Controller-->>UI: Affiche liste documents regroupés par type
                    UI-->>User: Présente documents disponibles

                    User->>UI: Téléverse un nouveau document
                    UI->>Controller: Transmet le fichier et métadonnées
                    Controller->>Storage: Stocke le fichier
                    Storage-->>Controller: Retourne le chemin du fichier
                    Controller->>DocModel: Crée entrée document
                    DocModel->>DB: INSERT INTO document_administratifs (collaborateur_id, type_document_id, document_path, date_emission, date_expiration)
                    DB-->>DocModel: Confirmation insertion
                    DocModel-->>Controller: Confirme création document
                    Controller-->>UI: Confirme téléversement
                    UI-->>User: Affiche confirmation et mise à jour liste

                    User->>UI: Demande de visualiser un document
                    UI->>Controller: Demande le document spécifique
                    Controller->>Storage: Récupère le fichier
                    Storage-->>Controller: Retourne le contenu du fichier
                    Controller-->>UI: Affiche ou propose téléchargement
                    UI-->>User: Affiche le document au format approprié
                </x-diagram.mermaid>
            </x-card.card-body>
        </x-card>
    </div>
</x-app-layout>
