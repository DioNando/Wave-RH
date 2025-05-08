<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Diagrammes de Classes" />
    </x-slot>

    <div class="space-y-6">
        <x-card>
            <x-card.card-body>
                <h2 class="text-xl font-semibold mb-4">Diagramme des entités principales</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Ce diagramme montre les relations entre les principales entités du système de gestion des ressources humaines.
                </p>

                <x-diagram.mermaid caption="Modèle de données principal">
                    classDiagram
                    class Collaborateur {
                        +string nom
                        +string prenom
                        +string photo_profil
                        +CollaborateurGenre genre
                        +date date_naissance
                        +CollaborateurStatutMarital statut_marital
                        +integer nombre_enfants
                        +string cin
                        +string cnss
                        +string email_professionnel
                        +date date_embauche
                        +integer solde_conge
                        +json langues
                        +json competences_techniques
                        +boolean statut
                    }

                    class HistoriquePoste {
                        +date date_debut
                        +date date_fin
                        +string commentaires
                        +string raison_fin
                        +boolean statut
                    }

                    class HistoriqueConge {
                        +TypeConge type_conge
                        +date date_debut
                        +date date_fin
                        +integer duree
                        +string motif
                        +string commentaires
                        +string document_path
                        +boolean statut
                    }

                    class HistoriquePrime {
                        +date date_prime
                        +TypePrime type_prime
                        +decimal montant
                        +Monnaie monnaie
                        +string motif
                        +string commentaires
                        +string document_path
                        +boolean statut
                    }

                    class HistoriqueFormation {
                        +string titre
                        +string organisme
                        +TypeFormation type_formation
                        +date date_debut
                        +date date_fin
                        +string resultat
                        +string commentaires
                        +string document_path
                        +boolean statut
                    }

                    class HistoriqueAugmentation {
                        +date date_augmentation
                        +decimal ancien_salaire
                        +decimal nouveau_salaire
                        +Monnaie monnaie
                        +decimal pourcentage
                        +string motif
                        +string commentaires
                        +boolean statut
                    }

                    class Diplome {
                        +string titre
                        +string etablissement
                        +date date_obtention
                        +DiplomeNiveau niveau
                        +string document_path
                        +boolean statut
                    }

                    class Certification {
                        +string titre
                        +string organisme
                        +date date_obtention
                        +date date_expiration
                        +string document_path
                        +boolean statut
                    }

                    class Poste {
                        +string nom
                        +string description
                        +boolean statut
                    }

                    class Departement {
                        +string nom
                        +string description
                        +boolean statut
                    }

                    class DocumentAdministratif {
                        +date date_emission
                        +date date_expiration
                        +string document_path
                        +boolean statut
                    }

                    class InformationBancaire {
                        +string nom_banque
                        +string iban
                        +string code_swift
                        +string titulaire_compte
                        +boolean statut
                    }

                    class Pays {
                        +string nom
                        +string code_iso
                        +string nationalite
                        +boolean statut
                    }

                    class Region {
                        +string nom
                        +boolean statut
                    }

                    class Ville {
                        +string nom
                        +boolean statut
                    }

                    class JourFerie {
                        +string nom
                        +string description
                        +date date
                        +boolean est_recurrent
                        +boolean est_confirme
                        +TypeJourFerie type
                        +boolean statut
                    }

                    Collaborateur "1" --> "*" HistoriquePoste
                    Collaborateur "1" --> "*" HistoriqueConge
                    Collaborateur "1" --> "*" HistoriquePrime
                    Collaborateur "1" --> "*" HistoriqueFormation
                    Collaborateur "1" --> "*" HistoriqueAugmentation
                    Collaborateur "1" --> "*" Diplome
                    Collaborateur "1" --> "*" Certification
                    Collaborateur "1" --> "*" DocumentAdministratif
                    Collaborateur "1" --> "*" InformationBancaire
                    Collaborateur "1" --> "1" Ville : habite dans
                    Collaborateur "1" --> "1" Ville : né dans
                    Collaborateur "1" --> "1" Pays : nationalité
                    Poste "1" --> "*" HistoriquePoste
                    Departement "1" --> "*" Poste
                    Pays "1" --> "*" Region
                    Region "1" --> "*" Ville
                    Pays "1" --> "*" Diplome
                    Pays "1" --> "*" Certification
                </x-diagram.mermaid>
            </x-card.card-body>
        </x-card>

        <x-card>
            <x-card.card-body>
                <h2 class="text-xl font-semibold mb-4">Hiérarchie des Enums</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Représentation des types énumérés utilisés dans le système.
                </p>

                <x-diagram.mermaid caption="Types énumérés du système">
                    classDiagram
                    class Enum {
                        <<interface>>
                    }

                    class CollaborateurGenre {
                        +MASCULIN
                        +FEMININ
                        +AUTRE
                    }

                    class CollaborateurStatutMarital {
                        +CELIBATAIRE
                        +MARIE
                        +DIVORCE
                        +VEUF
                        +PACS
                        +CONCUBINAGE
                    }

                    class TypeConge {
                        +CONGE_PAYE
                        +CONGE_SANS_SOLDE
                        +CONGE_MALADIE
                        +CONGE_MATERNITE
                        +CONGE_PATERNITE
                        +CONGE_PARENTAL
                        +RTT
                        +AUTRE
                    }

                    class TypeFormation {
                        +INTERNE
                        +EXTERNE
                        +E_LEARNING
                        +SEMINAIRE
                        +CONFERENCE
                        +AUTRE
                    }

                    class TypePrime {
                        +PERFORMANCE
                        +ANCIENNETE
                        +PROJET
                        +ANNUELLE
                        +EXCEPTIONNELLE
                        +AUTRE
                    }

                    class DiplomeNiveau {
                        +CAP_BEP
                        +BAC
                        +BAC_PLUS_2
                        +BAC_PLUS_3
                        +BAC_PLUS_4
                        +BAC_PLUS_5
                        +BAC_PLUS_8
                        +AUTRE
                    }

                    class Monnaie {
                        +EUR
                        +USD
                        +GBP
                        +JPY
                        +MGA
                        +AUTRE
                    }

                    class TypeJourFerie {
                        +LEGAL
                        +SPECIFIQUE
                        +RELIGIEUX
                        +AUTRE
                    }

                    class TypeContratTravail {
                        +CDI
                        +CDD
                        +ALTERNANCE
                        +STAGE
                        +INTERIM
                        +PRESTATAIRE
                        +AUTRE
                    }

                    class UserRole {
                        +ADMIN
                        +RH
                        +MANAGER
                        +EMPLOYE
                    }

                    Enum <|-- CollaborateurGenre
                    Enum <|-- CollaborateurStatutMarital
                    Enum <|-- TypeConge
                    Enum <|-- TypeFormation
                    Enum <|-- TypePrime
                    Enum <|-- DiplomeNiveau
                    Enum <|-- Monnaie
                    Enum <|-- TypeJourFerie
                    Enum <|-- TypeContratTravail
                    Enum <|-- UserRole
                </x-diagram.mermaid>
            </x-card.card-body>
        </x-card>

        <x-card>
            <x-card.card-body>
                <h2 class="text-xl font-semibold mb-4">Structure organisationnelle</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Vue organisationnelle des départements et postes.
                </p>

                <x-diagram.mermaid caption="Structure organisationnelle">
                    classDiagram
                    class Departement {
                        +string nom
                        +string description
                        +boolean statut
                    }

                    class Poste {
                        +string nom
                        +string description
                        +boolean statut
                    }

                    class HistoriquePoste {
                        +date date_debut
                        +date date_fin
                        +string commentaires
                        +string raison_fin
                        +boolean statut
                    }

                    class Collaborateur {
                        +string nom
                        +string prenom
                        +string matricule_interne
                        +date date_embauche
                    }

                    Departement "1" --> "*" Poste : contient
                    Poste "1" --> "*" HistoriquePoste : occupe par
                    Collaborateur "1" --> "*" HistoriquePoste : occupe
                </x-diagram.mermaid>
            </x-card.card-body>
        </x-card>
    </div>
</x-app-layout>
