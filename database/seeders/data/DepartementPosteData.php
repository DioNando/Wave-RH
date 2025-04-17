<?php

namespace Database\Seeders\Data;

class DepartementPosteData
{
    public static function getData(): array
    {
        return [
            [
                'departement' => [
                    'nom' => 'Ressources Humaines',
                    'description' => 'Gestion du personnel et des ressources humaines',
                    'statut' => true,
                ],
                'postes' => [
                    [
                        'nom' => 'Directeur des Ressources Humaines',
                        'description' => 'Supervise toutes les activités RH et élabore la stratégie RH',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Gestionnaire de Paie',
                        'description' => 'Responsable du traitement des salaires et avantages sociaux',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Chargé de Recrutement',
                        'description' => 'Gère le processus de recrutement et de sélection des candidats',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Responsable Formation',
                        'description' => 'Planifie et supervise les programmes de formation',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Responsable Santé et Sécurité',
                        'description' => 'Gère la prévention des risques professionnels',
                        'statut' => true,
                    ],
                ]
            ],
            [
                'departement' => [
                    'nom' => 'Informatique',
                    'description' => 'Développement et maintenance des systèmes informatiques',
                    'statut' => true,
                ],
                'postes' => [
                    [
                        'nom' => 'Directeur des Systèmes d\'Information',
                        'description' => 'Supervise la stratégie IT et la gestion des systèmes d\'information',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Développeur Backend',
                        'description' => 'Développement et maintenance des applications côté serveur',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Développeur Frontend',
                        'description' => 'Développement et maintenance des interfaces utilisateur',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Administrateur Système',
                        'description' => 'Gestion et maintenance de l\'infrastructure IT',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'DevOps Engineer',
                        'description' => 'Automatisation et déploiement continu',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Architecte Logiciel',
                        'description' => 'Conception des architectures techniques',
                        'statut' => true,
                    ],
                ]
            ],
            [
                'departement' => [
                    'nom' => 'Finance',
                    'description' => 'Gestion financière et comptable de l\'entreprise',
                    'statut' => true,
                ],
                'postes' => [
                    [
                        'nom' => 'Directeur Financier',
                        'description' => 'Supervise toutes les activités financières et comptables',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Comptable',
                        'description' => 'Gestion de la comptabilité générale',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Analyste Financier',
                        'description' => 'Analyse des données financières et reporting',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Contrôleur de Gestion',
                        'description' => 'Analyse et contrôle des coûts',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Trésorier',
                        'description' => 'Gestion de la trésorerie et des investissements',
                        'statut' => true,
                    ],
                ]
            ],
            [
                'departement' => [
                    'nom' => 'Marketing',
                    'description' => 'Stratégie marketing et communication',
                    'statut' => true,
                ],
                'postes' => [
                    [
                        'nom' => 'Directeur Marketing',
                        'description' => 'Définit et supervise la stratégie marketing',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Responsable Communication',
                        'description' => 'Gère la communication interne et externe',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Chargé de Marketing Digital',
                        'description' => 'Responsable des campagnes marketing en ligne',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Responsable Produit',
                        'description' => 'Gestion du cycle de vie des produits',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Analyste Marketing',
                        'description' => 'Analyse des données marketing et études de marché',
                        'statut' => true,
                    ],
                ]
            ],
            [
                'departement' => [
                    'nom' => 'Commercial',
                    'description' => 'Ventes et développement commercial',
                    'statut' => true,
                ],
                'postes' => [
                    [
                        'nom' => 'Directeur Commercial',
                        'description' => 'Supervise la stratégie de vente et les équipes commerciales',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Commercial Terrain',
                        'description' => 'Prospection et vente sur le terrain',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Responsable Grands Comptes',
                        'description' => 'Gestion des relations avec les clients stratégiques',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Responsable Export',
                        'description' => 'Développement des ventes à l\'international',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Chargé d\'Affaires',
                        'description' => 'Gestion des dossiers clients et suivi des ventes',
                        'statut' => true,
                    ],
                ]
            ],
            [
                'departement' => [
                    'nom' => 'Juridique',
                    'description' => 'Conseil juridique et conformité',
                    'statut' => true,
                ],
                'postes' => [
                    [
                        'nom' => 'Directeur Juridique',
                        'description' => 'Supervise tous les aspects juridiques de l\'entreprise',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Juriste d\'Entreprise',
                        'description' => 'Conseil juridique interne',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Responsable Conformité',
                        'description' => 'Veille à la conformité réglementaire',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Responsable Propriété Intellectuelle',
                        'description' => 'Protection des actifs immatériels',
                        'statut' => true,
                    ],
                ]
            ],
            [
                'departement' => [
                    'nom' => 'Production',
                    'description' => 'Gestion de la production et des opérations',
                    'statut' => true,
                ],
                'postes' => [
                    [
                        'nom' => 'Directeur de Production',
                        'description' => 'Supervise les activités de production',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Responsable Qualité',
                        'description' => 'Contrôle et assurance qualité',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Responsable Maintenance',
                        'description' => 'Gestion de la maintenance des équipements',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Responsable Logistique',
                        'description' => 'Gestion des flux et de la chaîne logistique',
                        'statut' => true,
                    ],
                ]
            ],
            [
                'departement' => [
                    'nom' => 'Recherche et Développement',
                    'description' => 'Innovation et développement de nouveaux produits',
                    'statut' => true,
                ],
                'postes' => [
                    [
                        'nom' => 'Directeur R&D',
                        'description' => 'Supervise les activités de recherche et développement',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Chercheur',
                        'description' => 'Conduit des recherches et développe des solutions',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Ingénieur R&D',
                        'description' => 'Développe et teste de nouveaux produits',
                        'statut' => true,
                    ],
                    [
                        'nom' => 'Responsable Innovation',
                        'description' => 'Identifie et développe les opportunités d\'innovation',
                        'statut' => true,
                    ],
                ]
            ],
        ];
    }
}
