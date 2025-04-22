<?php

namespace Database\Seeders\Data;

class InformationBancaireData
{
    public static function getData(): array
    {
        return [
            // Banques malgaches
            [
                'nom_banque' => 'BNI Madagascar',
                'iban' => 'MG1234567890123456789012345',
                'code_swift' => 'BNIMGMGX',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],
            [
                'nom_banque' => 'Bank of Africa',
                'iban' => 'MG9876543210987654321098765',
                'code_swift' => 'BOFAMGMG',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],
            [
                'nom_banque' => 'BFV-Société Générale',
                'iban' => 'MG4567890123456789012345678',
                'code_swift' => 'SOGEMGMG',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],

            // Banques marocaines
            [
                'nom_banque' => 'Attijariwafa Bank',
                'iban' => 'MA1234567890123456789012345',
                'code_swift' => 'BCMAMAM1',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],
            [
                'nom_banque' => 'Banque Populaire',
                'iban' => 'MA9876543210987654321098765',
                'code_swift' => 'BCMAMAM2',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],
            [
                'nom_banque' => 'BMCE Bank',
                'iban' => 'MA4567890123456789012345678',
                'code_swift' => 'BCMAMAM3',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],
            [
                'nom_banque' => 'Société Générale Maroc',
                'iban' => 'MA7890123456789012345678901',
                'code_swift' => 'SGMBMAM1',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],
            [
                'nom_banque' => 'Crédit Agricole Maroc',
                'iban' => 'MA2345678901234567890123456',
                'code_swift' => 'BCMAMAM4',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],
            [
                'nom_banque' => 'CIH Bank',
                'iban' => 'MA3456789012345678901234567',
                'code_swift' => 'CIHBMAM1',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],
            [
                'nom_banque' => 'Crédit du Maroc',
                'iban' => 'MA4567890123456789012345678',
                'code_swift' => 'CDMAMAM1',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],
            [
                'nom_banque' => 'Banque Centrale Populaire',
                'iban' => 'MA5678901234567890123456789',
                'code_swift' => 'BCMAMAM5',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],
            [
                'nom_banque' => 'BMCI',
                'iban' => 'MA6789012345678901234567890',
                'code_swift' => 'BMCIMMAM',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],
            [
                'nom_banque' => 'Al Barid Bank',
                'iban' => 'MA7890123456789012345678901',
                'code_swift' => 'BCMAMAM6',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],

            // Banques internationales
            [
                'nom_banque' => 'BNP Paribas',
                'iban' => 'FR7630006000011234567890189',
                'code_swift' => 'BNPAFRPP',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],
            [
                'nom_banque' => 'HSBC Bank',
                'iban' => 'GB29NWBK60161331926819',
                'code_swift' => 'HSBCGB2L',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],
            [
                'nom_banque' => 'Deutsche Bank',
                'iban' => 'DE89370400440532013000',
                'code_swift' => 'DEUTDEFF',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],
            [
                'nom_banque' => 'Santander',
                'iban' => 'ES9121000418450200051332',
                'code_swift' => 'BSCHESMM',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],
            [
                'nom_banque' => 'UniCredit Bank',
                'iban' => 'IT60X0542811101000000123456',
                'code_swift' => 'UNCRITMM',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],

            // Banques africaines
            [
                'nom_banque' => 'Ecobank',
                'iban' => 'CI1234567890123456789012345',
                'code_swift' => 'ECOCICIX',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],
            [
                'nom_banque' => 'Standard Bank',
                'iban' => 'ZA1234567890123456789012345',
                'code_swift' => 'SBZAZAJX',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],
            [
                'nom_banque' => 'UBA Bank',
                'iban' => 'NG1234567890123456789012345',
                'code_swift' => 'UNAFNGLA',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],
            [
                'nom_banque' => 'Access Bank',
                'iban' => 'NG9876543210987654321098765',
                'code_swift' => 'ACBANGLA',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],

            // Banques asiatiques
            [
                'nom_banque' => 'Bank of China',
                'iban' => 'CN1234567890123456789012345',
                'code_swift' => 'BKCHCNBJ',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],
            [
                'nom_banque' => 'HDFC Bank',
                'iban' => 'IN1234567890123456789012345',
                'code_swift' => 'HDFCINBB',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],
            [
                'nom_banque' => 'DBS Bank',
                'iban' => 'SG1234567890123456789012345',
                'code_swift' => 'DBSSSGSG',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],
            [
                'nom_banque' => 'Mizuho Bank',
                'iban' => 'JP1234567890123456789012345',
                'code_swift' => 'MHCBJPJT',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ],
            [
                'nom_banque' => 'KB Bank',
                'iban' => 'KR1234567890123456789012345',
                'code_swift' => 'KBNKKRSE',
                'titulaire_compte' => 'Wave Inc',
                'statut' => true
            ]
        ];
    }
}
