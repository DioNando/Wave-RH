<?php

namespace Database\Seeders\Data;

class TypesDocumentData
{
    public static function getData(): array
    {
        return [
            [
                'libelle' => 'CV',
                'description' => 'Curriculum Vitae du collaborateur',
                'statut' => true,
                'couleur' => 'blue'
            ],
            [
                'libelle' => 'CIN',
                'description' => 'Carte d\'Identité Nationale',
                'statut' => true,
                'couleur' => 'green'
            ],
            [
                'libelle' => 'CNSS',
                'description' => 'Carte de la Caisse Nationale de Sécurité Sociale',
                'statut' => true,
                'couleur' => 'purple'
            ],
            [
                'libelle' => 'Diplôme',
                'description' => 'Diplôme ou certificat de formation',
                'statut' => true,
                'couleur' => 'yellow'
            ],
            [
                'libelle' => 'Certification',
                'description' => 'Certification professionnelle',
                'statut' => true,
                'couleur' => 'orange'
            ],
            [
                'libelle' => 'Contrat de travail',
                'description' => 'Contrat de travail signé',
                'statut' => true,
                'couleur' => 'red'
            ],
            [
                'libelle' => 'Attestation de travail',
                'description' => 'Attestation de travail ou de service',
                'statut' => true,
                'couleur' => 'indigo'
            ],
            [
                'libelle' => 'Bulletin de paie',
                'description' => 'Bulletin de paie mensuel',
                'statut' => true,
                'couleur' => 'pink'
            ],
            [
                'libelle' => 'Document médical',
                'description' => 'Document médical ou certificat de santé',
                'statut' => true,
                'couleur' => 'rose'
            ],
            [
                'libelle' => 'Autre',
                'description' => 'Autres documents non catégorisés',
                'statut' => true,
                'couleur' => 'gray'
            ],
            [
                'libelle' => 'Passeport',
                'description' => 'Passeport ou document de voyage international',
                'statut' => true,
                'couleur' => 'cyan'
            ],
            [
                'libelle' => 'Permis de conduire',
                'description' => 'Permis de conduire valide',
                'statut' => true,
                'couleur' => 'emerald'
            ],
            [
                'libelle' => 'RIB',
                'description' => 'Relevé d\'Identité Bancaire pour les paiements',
                'statut' => true,
                'couleur' => 'sky'
            ],
            [
                'libelle' => 'Attestation de formation',
                'description' => 'Attestation de suivi ou réussite d\'une formation interne/externe',
                'statut' => true,
                'couleur' => 'amber'
            ],
            [
                'libelle' => 'Note de frais',
                'description' => 'Justificatif de dépenses professionnelles',
                'statut' => true,
                'couleur' => 'lime'
            ],
            [
                'libelle' => 'Carte de séjour',
                'description' => 'Carte de séjour ou titre de résidence pour collaborateurs étrangers',
                'statut' => true,
                'couleur' => 'violet'
            ],
            [
                'libelle' => 'Convention de stage',
                'description' => 'Convention signée pour les stagiaires (RH/Département formation)',
                'statut' => true,
                'couleur' => 'fuchsia'
            ],
            [
                'libelle' => 'Rapport d\'audit',
                'description' => 'Rapport d\'audit interne ou externe (Département financier/juridique)',
                'statut' => true,
                'couleur' => 'slate'
            ],
            [
                'libelle' => 'Licence logicielle',
                'description' => 'Preuve d\'achat ou d\'utilisation de licences logicielles (Département IT)',
                'statut' => true,
                'couleur' => 'zinc'
            ],
            [
                'libelle' => 'Contrat de confidentialité',
                'description' => 'Accord de non-divulgation signé (Département juridique/RH)',
                'statut' => true,
                'couleur' => 'neutral'
            ]
        ];
    }
}
