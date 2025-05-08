<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Diagrammes de Cas d'Utilisation" />
    </x-slot>
        <div class="space-y-6">
            <!-- Diagramme de cas d'utilisation principal -->
            <x-card>
                <x-card.card-body>
                    <h2 class="text-xl font-semibold mb-4">Vue d'ensemble des cas d'utilisation</h2>

                    <x-diagram.mermaid caption="Cas d'utilisation principaux de Wave HR">
                        flowchart TB
                        subgraph Utilisateurs["Acteurs"]
                        Admin["Administrateur"]
                        RH["Responsable RH"]
                        Manager["Manager"]
                        Collab["Collaborateur"]
                        end

                        subgraph UC["Cas d'utilisation"]
                        subgraph GestionCollaborateurs["Gestion des Collaborateurs"]
                        UC1["Ajouter un collaborateur"]
                        UC2["Modifier un collaborateur"]
                        UC3["Consulter un collaborateur"]
                        UC4["Désactiver un collaborateur"]
                        UC5["Gérer les documents administratifs"]
                        UC6["Gérer les certifications"]
                        UC7["Gérer les diplômes"]
                        UC8["Gérer les contacts d'urgence"]
                        end

                        subgraph GestionContrats["Gestion des Contrats"]
                        UC9["Créer un contrat"]
                        UC10["Modifier un contrat"]
                        UC11["Consulter un contrat"]
                        UC12["Clôturer un contrat"]
                        end

                        subgraph GestionConges["Gestion des Congés"]
                        UC13["Demander un congé"]
                        UC14["Approuver/Refuser un congé"]
                        UC15["Consulter les congés"]
                        UC16["Modifier/Annuler un congé"]
                        UC17["Gérer les jours fériés"]
                        end

                        subgraph GestionOrganisation["Gestion de l'Organisation"]
                        UC18["Gérer les départements"]
                        UC19["Gérer les postes"]
                        UC20["Gérer l'historique des postes"]
                        end

                        subgraph GestionFinanciere["Gestion Financière"]
                        UC21["Gérer les augmentations"]
                        UC22["Gérer les primes"]
                        end

                        subgraph GestionFormations["Gestion des Formations"]
                        UC23["Créer une formation"]
                        UC24["Assigner une formation"]
                        UC25["Suivre les formations"]
                        end

                        subgraph GestionSysteme["Administration Système"]
                        UC26["Gérer les utilisateurs"]
                        UC27["Gérer les rôles"]
                        UC28["Gérer les permissions"]
                        UC29["Gérer les données de référence"]
                        end
                        end

                        Admin --> GestionSysteme
                        Admin --> GestionOrganisation

                        RH --> GestionCollaborateurs
                        RH --> GestionContrats
                        RH --> GestionConges
                        RH --> GestionOrganisation
                        RH --> GestionFinanciere
                        RH --> GestionFormations

                        Manager --> UC3
                        Manager --> UC14
                        Manager --> UC15
                        Manager --> UC25

                        Collab --> UC3
                        Collab --> UC13
                        Collab --> UC15
                        Collab --> UC16
                        Collab --> UC25

                        classDef actorStyle fill:#f9f,stroke:#333,stroke-width:2px;
                        classDef ucGroup fill:#e4f7fb,stroke:#333,stroke-width:1px;
                        classDef ucStyle fill:#bbf,stroke:#333,stroke-width:1px;

                        class Admin,RH,Manager,Collab actorStyle;
                        class GestionCollaborateurs,GestionContrats,GestionConges,GestionOrganisation,GestionFinanciere,GestionFormations,GestionSysteme ucGroup;
                        class UC1,UC2,UC3,UC4,UC5,UC6,UC7,UC8,UC9,UC10,UC11,UC12,UC13,UC14,UC15,UC16,UC17,UC18,UC19,UC20,UC21,UC22,UC23,UC24,UC25,UC26,UC27,UC28,UC29 ucStyle;
                    </x-diagram.mermaid>
                </x-card.card-body>
            </x-card>

            <!-- Diagramme de cas d'utilisation détaillé pour la gestion des collaborateurs -->
            <x-card>
                <x-card.card-body>
                    <h2 class="text-xl font-semibold mb-4">Cas d'utilisation détaillés - Gestion des Collaborateurs</h2>

                    <x-diagram.mermaid caption="Cas d'utilisation pour la gestion des collaborateurs">
flowchart LR
%% Acteurs
RH(["Responsable RH"])
Manager(["Manager"])
Collab(["Collaborateur"])

%% Cas d'utilisation
UC1["Créer un profil collaborateur"]
UC2["Modifier un profil collaborateur"]
UC3["Consulter un profil collaborateur"]
UC4["Désactiver un collaborateur"]
UC5["Ajouter un document administratif"]
UC6["Renouveler un document administratif"]
UC7["Enregistrer un diplôme"]
UC8["Enregistrer une certification"]
UC9["Gérer les contacts d'urgence"]
UC10["Définir les compétences techniques"]
UC11["Définir les langues maîtrisées"]
UC12["Afficher les alertes d'expiration de document"]
UC13["Afficher les statistiques des collaborateurs"]
UC14["Exporter les données collaborateur"]

%% Relations acteurs-cas d'utilisation
RH --> UC1
RH --> UC2
RH --> UC3
RH --> UC4
RH --> UC5
RH --> UC6
RH --> UC7
RH --> UC8
RH --> UC9
RH --> UC10
RH --> UC11
RH --> UC12
RH --> UC13
RH --> UC14

Manager --> UC3
Manager --> UC12
Manager --> UC13

Collab --> UC3
Collab --> UC9

%% Relations entre cas d'utilisation (extensions, inclusions)
UC2 -.-> UC3
UC5 -.-> UC12
UC6 -.-> UC12

%% Styles
classDef actor fill:#f9f,stroke:#333,stroke-width:2px;
classDef usecase fill:#bbf,stroke:#333,stroke-width:1px;

class RH,Manager,Collab actor;
class UC1,UC2,UC3,UC4,UC5,UC6,UC7,UC8,UC9,UC10,UC11,UC12,UC13,UC14 usecase;
                    </x-diagram.mermaid>
                </x-card.card-body>
            </x-card>

            <!-- Diagramme de cas d'utilisation détaillé pour la gestion des congés -->
            <x-card>
                <x-card.card-body>
                    <h2 class="text-xl font-semibold mb-4">Cas d'utilisation détaillés - Gestion des Congés</h2>

                    <x-diagram.mermaid caption="Cas d'utilisation pour la gestion des congés">
flowchart LR
%% Acteurs
Collab(["Collaborateur"])
Manager(["Manager"])
RH(["Responsable RH"])

%% Cas d'utilisation
UC1["Demander un congé"]
UC2["Consulter le solde de congés"]
UC3["Consulter l'historique des congés"]
UC4["Annuler une demande de congé"]
UC5["Approuver une demande de congé"]
UC6["Refuser une demande de congé"]
UC7["Consulter les demandes en attente"]
UC8["Consulter le calendrier des absences"]
UC9["Définir les jours fériés"]
UC10["Générer un rapport de congés"]
UC11["Ajuster manuellement un solde de congés"]
UC12["Configurer les types de congés"]

%% Relations acteurs-cas d'utilisation
Collab --> UC1
Collab --> UC2
Collab --> UC3
Collab --> UC4
Collab --> UC8

Manager --> UC5
Manager --> UC6
Manager --> UC7
Manager --> UC8

RH --> UC5
RH --> UC6
RH --> UC7
RH --> UC8
RH --> UC9
RH --> UC10
RH --> UC11
RH --> UC12

%% Relations entre cas d'utilisation (extensions, inclusions)
UC1 -.-> UC2
UC5 -.-> UC11
UC6 -.-> UC11

%% Styles
classDef actor fill:#f9f,stroke:#333,stroke-width:2px;
classDef usecase fill:#bbf,stroke:#333,stroke-width:1px;

class Collab,Manager,RH actor;
class UC1,UC2,UC3,UC4,UC5,UC6,UC7,UC8,UC9,UC10,UC11,UC12 usecase;
                    </x-diagram.mermaid>
                </x-card.card-body>
            </x-card>

            <!-- Diagramme de cas d'utilisation détaillé pour l'administration système -->
            <x-card>
                <x-card.card-body>
                    <h2 class="text-xl font-semibold mb-4">Cas d'utilisation détaillés - Administration Système</h2>

                    <x-diagram.mermaid caption="Cas d'utilisation pour l'administration du système">
flowchart LR
%% Acteurs
Admin(["Administrateur"])
RH(["Responsable RH"])

%% Cas d'utilisation
UC1["Créer un compte utilisateur"]
UC2["Modifier un compte utilisateur"]
UC3["Désactiver un compte utilisateur"]
UC4["Réinitialiser un mot de passe"]
UC5["Attribuer des rôles"]
UC6["Gérer les permissions"]
UC7["Configurer les pays"]
UC8["Configurer les régions"]
UC9["Configurer les villes"]
UC10["Configurer les types de document"]
UC11["Gérer les notifications système"]
UC12["Consulter les logs du système"]
UC13["Sauvegarder la base de données"]
UC14["Configurer les paramètres système"]

%% Relations acteurs-cas d'utilisation
Admin --> UC1
Admin --> UC2
Admin --> UC3
Admin --> UC4
Admin --> UC5
Admin --> UC6
Admin --> UC11
Admin --> UC12
Admin --> UC13
Admin --> UC14

RH --> UC1
RH --> UC2
RH --> UC4
RH --> UC5
RH --> UC7
RH --> UC8
RH --> UC9
RH --> UC10

%% Relations entre cas d'utilisation (extensions, inclusions)
UC1 -.-> UC5

%% Styles
classDef actor fill:#f9f,stroke:#333,stroke-width:2px;
classDef usecase fill:#bbf,stroke:#333,stroke-width:1px;

class Admin,RH actor;
class UC1,UC2,UC3,UC4,UC5,UC6,UC7,UC8,UC9,UC10,UC11,UC12,UC13,UC14 usecase;
                    </x-diagram.mermaid>
                </x-card.card-body>
            </x-card>
        </div>
</x-app-layout>
