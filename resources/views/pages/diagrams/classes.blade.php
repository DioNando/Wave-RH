<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Diagrammes de Classes" />
    </x-slot>

    <div class="space-y-6">
        <x-card>
            <x-card.card-body>
                <h2 class="text-xl font-semibold mb-4">Diagramme des entités principales</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Ce diagramme montre les relations entre les principales entités du système de gestion des ressources
                    humaines.
                </p>

                <x-diagram.mermaid caption="Modèle de données principal">
                    classDiagram
                    class User {
                    +string name
                    +string email
                    +timestamp email_verified_at
                    +string password
                    +string remember_token
                    +UserRole role
                    }

                    class Role {
                    +string name
                    +string guard_name
                    +timestamp created_at
                    +timestamp updated_at
                    }

                    class Permission {
                    +string name
                    +string guard_name
                    +timestamp created_at
                    +timestamp updated_at
                    }

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

                    class TypeDocument {
                    +string libelle
                    +string description
                    +string couleur
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

                    User "1" --> "1" Collaborateur
                    User "1" --> "*" Role : appartient à
                    Role "*" --> "*" Permission : possède
                    User "*" --> "*" Permission : possède directement

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
                    TypeDocument "1" --> "*" DocumentAdministratif
                    Poste "1" --> "*" HistoriquePoste
                    Departement "1" --> "*" Poste
                    Pays "1" --> "*" Region
                    Region "1" --> "*" Ville
                    Pays "1" --> "*" Diplome
                    Pays "1" --> "*" Certification
                </x-diagram.mermaid>
            </x-card.card-body>
        </x-card>

        <!-- Structure RH -->
        <x-card>
            <x-card.card-body>
                <h2 class="text-xl font-semibold mb-4">Structure de Gestion RH</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Visualisation complète du modèle collaborateur et des entités associées à la gestion RH.
                </p>

                <x-diagram.mermaid caption="Structure de gestion RH">
                    classDiagram
                    class User {
                    +string name
                    +string email
                    +timestamp email_verified_at
                    +string password
                    +string remember_token
                    +UserRole role
                    }

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
                    +string email_personnel
                    +string telephone_professionnel
                    +string telephone_personnel
                    +string adresse_complete
                    +date date_embauche
                    +string matricule_interne
                    +integer solde_conge
                    +json langues
                    +json competences_techniques
                    +string situation_medicale
                    +string notes_diverses
                    +boolean statut
                    }

                    class ContactUrgence {
                    +string nom
                    +string prenom
                    +string relation
                    +string telephone
                    +string email
                    +string adresse
                    +boolean statut
                    }

                    class ContratTravail {
                    +TypeContratTravail type_contrat
                    +date date_debut
                    +date date_fin
                    +decimal salaire
                    +Monnaie monnaie
                    +string document_path
                    +string conditions_particulieres
                    +boolean statut
                    }

                    class HistoriquePoste {
                    +date date_debut
                    +date date_fin
                    +string commentaires
                    +string raison_fin
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

                    class TypeDocument {
                    +string nom
                    +string description
                    +boolean est_obligatoire
                    +integer duree_validite
                    +boolean statut
                    }

                    class DocumentAdministratif {
                    +integer type_document_id
                    +date date_emission
                    +date date_expiration
                    +string document_path
                    +boolean statut
                    }

                    User "1" --> "1" Collaborateur
                    Collaborateur "1" --> "*" ContactUrgence
                    Collaborateur "1" --> "*" ContratTravail
                    Collaborateur "1" --> "*" HistoriquePoste
                    Collaborateur "1" --> "*" DocumentAdministratif
                    TypeDocument "1" --> "*" DocumentAdministratif
                    Poste "1" --> "*" HistoriquePoste
                    Departement "1" --> "*" Poste
                </x-diagram.mermaid>
            </x-card.card-body>
        </x-card>

        <!-- Gestion des Congés et Absences -->
        <x-card>
            <x-card.card-body>
                <h2 class="text-xl font-semibold mb-4">Gestion des Congés et Absences</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Modélisation du système de gestion des absences, congés et jours fériés.
                </p>

                <x-diagram.mermaid caption="Structure de gestion des congés">
                    classDiagram
                    class Collaborateur {
                    +string nom
                    +string prenom
                    +integer solde_conge
                    +string email_professionnel
                    }

                    class HistoriqueConge {
                    +TypeConge type_conge
                    +date date_debut
                    +date date_fin
                    +integer duree
                    +string motif
                    +string commentaires
                    +string document_path
                    +string statut_approbation
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

                    class User {
                    +string name
                    +string email
                    +UserRole role
                    }

                    class TypeConge {
                    <<enumeration>>
                        CONGE_PAYE
                        CONGE_SANS_SOLDE
                        CONGE_MALADIE
                        CONGE_MATERNITE
                        CONGE_PATERNITE
                        CONGE_PARENTAL
                        RTT
                        AUTRE
                        }

                        class TypeJourFerie {
                        <<enumeration>>
                            LEGAL
                            SPECIFIQUE
                            RELIGIEUX
                            AUTRE
                            }

                            class UserRole {
                            <<enumeration>>
                                ADMIN
                                RH
                                MANAGER
                                EMPLOYE
                                }

                                User "1" --> "1" Collaborateur
                                Collaborateur "1" --> "*" HistoriqueConge
                                HistoriqueConge ..> TypeConge : uses
                                JourFerie ..> TypeJourFerie : uses
                                User ..> UserRole : uses
                </x-diagram.mermaid>
            </x-card.card-body>
        </x-card>

        <!-- Gestion Formation et Développement -->
        <x-card>
            <x-card.card-body>
                <h2 class="text-xl font-semibold mb-4">Formation et Développement professionnel</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Structure des entités liées à la formation et au développement des collaborateurs.
                </p>

                <x-diagram.mermaid caption="Structure de gestion des formations et compétences">
                    classDiagram
                    class Collaborateur {
                    +string nom
                    +string prenom
                    +json langues
                    +json competences_techniques
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

                    class Pays {
                    +string nom
                    +string code_iso
                    }

                    class TypeFormation {
                    <<enumeration>>
                        INTERNE
                        EXTERNE
                        E_LEARNING
                        SEMINAIRE
                        CONFERENCE
                        AUTRE
                        }

                        class DiplomeNiveau {
                        <<enumeration>>
                            CAP_BEP
                            BAC
                            BAC_PLUS_2
                            BAC_PLUS_3
                            BAC_PLUS_4
                            BAC_PLUS_5
                            BAC_PLUS_8
                            AUTRE
                            }

                            Collaborateur "1" --> "*" HistoriqueFormation
                            Collaborateur "1" --> "*" Diplome
                            Collaborateur "1" --> "*" Certification
                            Pays "1" --> "*" Diplome
                            Pays "1" --> "*" Certification
                            HistoriqueFormation ..> TypeFormation : uses
                            Diplome ..> DiplomeNiveau : uses
                </x-diagram.mermaid>
            </x-card.card-body>
        </x-card>

        <!-- Gestion de la Rémunération -->
        <x-card>
            <x-card.card-body>
                <h2 class="text-xl font-semibold mb-4">Gestion de la Rémunération</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Structure des entités liées à la rémunération, aux primes et aux augmentations.
                </p>

                <x-diagram.mermaid caption="Structure de gestion des rémunérations">
                    classDiagram
                    class Collaborateur {
                    +string nom
                    +string prenom
                    }

                    class ContratTravail {
                    +TypeContratTravail type_contrat
                    +date date_debut
                    +date date_fin
                    +decimal salaire
                    +Monnaie monnaie
                    +string document_path
                    +string conditions_particulieres
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

                    class InformationBancaire {
                    +string nom_banque
                    +string iban
                    +string code_swift
                    +string titulaire_compte
                    +boolean statut
                    }

                    class Monnaie {
                    <<enumeration>>
                        EUR
                        USD
                        GBP
                        JPY
                        MGA
                        AUTRE
                        }

                        class TypePrime {
                        <<enumeration>>
                            PERFORMANCE
                            ANCIENNETE
                            PROJET
                            ANNUELLE
                            EXCEPTIONNELLE
                            AUTRE
                            }

                            class TypeContratTravail {
                            <<enumeration>>
                                CDI
                                CDD
                                ALTERNANCE
                                STAGE
                                INTERIM
                                PRESTATAIRE
                                AUTRE
                                }

                                Collaborateur "1" --> "*" ContratTravail
                                Collaborateur "1" --> "*" HistoriquePrime
                                Collaborateur "1" --> "*" HistoriqueAugmentation
                                Collaborateur "1" --> "*" InformationBancaire
                                ContratTravail ..> Monnaie : uses
                                HistoriquePrime ..> Monnaie : uses
                                HistoriqueAugmentation ..> Monnaie : uses
                                HistoriquePrime ..> TypePrime : uses
                                ContratTravail ..> TypeContratTravail : uses
                </x-diagram.mermaid>
            </x-card.card-body>
        </x-card>

        <!-- Gestion géographique -->
        <x-card>
            <x-card.card-body>
                <h2 class="text-xl font-semibold mb-4">Gestion Géographique</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Structure des entités géographiques et leur relation avec les collaborateurs.
                </p>

                <x-diagram.mermaid caption="Structure géographique">
                    classDiagram
                    class Pays {
                    +string nom
                    +string code_iso
                    +string nationalite
                    +boolean statut
                    }

                    class Region {
                    +string nom
                    +integer pays_id
                    +boolean statut
                    }

                    class Ville {
                    +string nom
                    +integer region_id
                    +boolean statut
                    }

                    class Collaborateur {
                    +string nom
                    +string prenom
                    +integer ville_id
                    +integer lieu_naissance_id
                    +integer pays_id
                    +string adresse_complete
                    }

                    class ContactUrgence {
                    +string nom
                    +string prenom
                    +string relation
                    +string telephone
                    +string email
                    +string adresse
                    +integer ville_id
                    +boolean statut
                    }

                    Pays "1" --> "*" Region
                    Region "1" --> "*" Ville
                    Pays "1" --> "*" Collaborateur : nationalité
                    Ville "1" --> "*" Collaborateur : habite dans
                    Ville "1" --> "*" Collaborateur : né dans
                    Ville "1" --> "*" ContactUrgence : habite dans
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
                        MASCULIN
                        FEMININ
                        AUTRE
                        }

                        class CollaborateurStatutMarital {
                        CELIBATAIRE
                        MARIE
                        DIVORCE
                        VEUF
                        PACS
                        CONCUBINAGE
                        }

                        class TypeConge {
                        CONGE_PAYE
                        CONGE_SANS_SOLDE
                        CONGE_MALADIE
                        CONGE_MATERNITE
                        CONGE_PATERNITE
                        CONGE_PARENTAL
                        RTT
                        AUTRE
                        }

                        class TypeFormation {
                        INTERNE
                        EXTERNE
                        E_LEARNING
                        SEMINAIRE
                        CONFERENCE
                        AUTRE
                        }

                        class TypePrime {
                        PERFORMANCE
                        ANCIENNETE
                        PROJET
                        ANNUELLE
                        EXCEPTIONNELLE
                        AUTRE
                        }

                        class DiplomeNiveau {
                        CAP_BEP
                        BAC
                        BAC_PLUS_2
                        BAC_PLUS_3
                        BAC_PLUS_4
                        BAC_PLUS_5
                        BAC_PLUS_8
                        AUTRE
                        }

                        class Monnaie {
                        EUR
                        USD
                        GBP
                        JPY
                        MGA
                        AUTRE
                        }

                        class TypeJourFerie {
                        LEGAL
                        SPECIFIQUE
                        RELIGIEUX
                        AUTRE
                        }

                        class TypeContratTravail {
                        CDI
                        CDD
                        ALTERNANCE
                        STAGE
                        INTERIM
                        PRESTATAIRE
                        AUTRE
                        }

                        class UserRole {
                        ADMIN
                        RH
                        MANAGER
                        EMPLOYE
                        }

                        Enum <|-- CollaborateurGenre Enum <|-- CollaborateurStatutMarital Enum <|-- TypeConge Enum <|--
                            TypeFormation Enum <|-- TypePrime Enum <|-- DiplomeNiveau Enum <|-- Monnaie Enum <|--
                            TypeJourFerie Enum <|-- TypeContratTravail Enum <|-- UserRole </x-diagram.mermaid>
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
