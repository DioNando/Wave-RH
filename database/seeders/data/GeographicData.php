<?php

namespace Database\Seeders\Data;

class GeographicData
{
    public static function getData(): array
    {
        return [
            [
                'pays' => [
                    'nom' => 'France',
                    'code_iso' => 'FR',
                    'nationalite' => 'Française',
                    'statut' => true,
                ],
                'regions' => [
                    [
                        'nom' => 'Île-de-France',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Paris', 'statut' => true],
                            ['nom' => 'Versailles', 'statut' => true],
                            ['nom' => 'Saint-Denis', 'statut' => true],
                        ]
                    ],
                    [
                        'nom' => 'Provence-Alpes-Côte d\'Azur',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Marseille', 'statut' => true],
                            ['nom' => 'Nice', 'statut' => true],
                            ['nom' => 'Cannes', 'statut' => true],
                        ]
                    ],
                    [
                        'nom' => 'Auvergne-Rhône-Alpes',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Lyon', 'statut' => true],
                            ['nom' => 'Grenoble', 'statut' => true],
                            ['nom' => 'Saint-Étienne', 'statut' => true],
                        ]
                    ],
                ]
            ],
            [
                'pays' => [
                    'nom' => 'Allemagne',
                    'code_iso' => 'DE',
                    'nationalite' => 'Allemande',
                    'statut' => true,
                ],
                'regions' => [
                    [
                        'nom' => 'Bavière',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Munich', 'statut' => true],
                            ['nom' => 'Nuremberg', 'statut' => true],
                            ['nom' => 'Augsbourg', 'statut' => true],
                        ]
                    ],
                    [
                        'nom' => 'Bade-Wurtemberg',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Stuttgart', 'statut' => true],
                            ['nom' => 'Karlsruhe', 'statut' => true],
                            ['nom' => 'Fribourg', 'statut' => true],
                        ]
                    ],
                ]
            ],
            [
                'pays' => [
                    'nom' => 'Espagne',
                    'code_iso' => 'ES',
                    'nationalite' => 'Espagnole',
                    'statut' => true,
                ],
                'regions' => [
                    [
                        'nom' => 'Catalogne',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Barcelone', 'statut' => true],
                            ['nom' => 'Gérone', 'statut' => true],
                            ['nom' => 'Tarragone', 'statut' => true],
                        ]
                    ],
                    [
                        'nom' => 'Andalousie',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Séville', 'statut' => true],
                            ['nom' => 'Malaga', 'statut' => true],
                            ['nom' => 'Grenade', 'statut' => true],
                        ]
                    ],
                    [
                        'nom' => 'Madrid',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Madrid', 'statut' => true],
                            ['nom' => 'Alcalá de Henares', 'statut' => true],
                        ]
                    ],
                ]
            ],
            [
                'pays' => [
                    'nom' => 'Royaume-Uni',
                    'code_iso' => 'GB',
                    'nationalite' => 'Britannique',
                    'statut' => true,
                ],
                'regions' => [
                    [
                        'nom' => 'Angleterre',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Londres', 'statut' => true],
                            ['nom' => 'Manchester', 'statut' => true],
                            ['nom' => 'Liverpool', 'statut' => true],
                            ['nom' => 'Birmingham', 'statut' => true],
                        ]
                    ],
                    [
                        'nom' => 'Écosse',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Édimbourg', 'statut' => true],
                            ['nom' => 'Glasgow', 'statut' => true],
                            ['nom' => 'Aberdeen', 'statut' => true],
                        ]
                    ],
                ]
            ],
            [
                'pays' => [
                    'nom' => 'Italie',
                    'code_iso' => 'IT',
                    'nationalite' => 'Italienne',
                    'statut' => true,
                ],
                'regions' => [
                    [
                        'nom' => 'Lombardie',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Milan', 'statut' => true],
                            ['nom' => 'Bergame', 'statut' => true],
                            ['nom' => 'Brescia', 'statut' => true],
                        ]
                    ],
                    [
                        'nom' => 'Latium',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Rome', 'statut' => true],
                            ['nom' => 'Viterbe', 'statut' => true],
                        ]
                    ],
                    [
                        'nom' => 'Toscane',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Florence', 'statut' => true],
                            ['nom' => 'Pise', 'statut' => true],
                            ['nom' => 'Sienne', 'statut' => true],
                        ]
                    ],
                ]
            ],
            [
                'pays' => [
                    'nom' => 'Madagascar',
                    'code_iso' => 'MG',
                    'nationalite' => 'Malgache',
                    'statut' => true,
                ],
                'regions' => [
                    [
                        'nom' => 'Analamanga',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Antananarivo', 'statut' => true],
                            ['nom' => 'Ambohidratrimo', 'statut' => true],
                            ['nom' => 'Ankazobe', 'statut' => true],
                        ]
                    ],
                    [
                        'nom' => 'Vakinankaratra',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Antsirabe', 'statut' => true],
                            ['nom' => 'Ambatolampy', 'statut' => true],
                            ['nom' => 'Faratsiho', 'statut' => true],
                        ]
                    ],
                    [
                        'nom' => 'Atsinanana',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Toamasina', 'statut' => true],
                            ['nom' => 'Brickaville', 'statut' => true],
                            ['nom' => 'Vatomandry', 'statut' => true],
                        ]
                    ],
                ]
            ],
            [
                'pays' => [
                    'nom' => 'Maroc',
                    'code_iso' => 'MA',
                    'nationalite' => 'Marocaine',
                    'statut' => true,
                ],
                'regions' => [
                    [
                        'nom' => 'Casablanca-Settat',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Casablanca', 'statut' => true],
                            ['nom' => 'Mohammedia', 'statut' => true],
                            ['nom' => 'El Jadida', 'statut' => true],
                        ]
                    ],
                    [
                        'nom' => 'Rabat-Salé-Kénitra',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Rabat', 'statut' => true],
                            ['nom' => 'Salé', 'statut' => true],
                            ['nom' => 'Kénitra', 'statut' => true],
                        ]
                    ],
                    [
                        'nom' => 'Marrakech-Safi',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Marrakech', 'statut' => true],
                            ['nom' => 'Essaouira', 'statut' => true],
                            ['nom' => 'Safi', 'statut' => true],
                        ]
                    ],
                ]
            ],
            [
                'pays' => [
                    'nom' => 'Portugal',
                    'code_iso' => 'PT',
                    'nationalite' => 'Portugaise',
                    'statut' => true,
                ],
                'regions' => [
                    [
                        'nom' => 'Lisbonne',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Lisbonne', 'statut' => true],
                            ['nom' => 'Cascais', 'statut' => true],
                            ['nom' => 'Sintra', 'statut' => true],
                        ]
                    ],
                    [
                        'nom' => 'Porto',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Porto', 'statut' => true],
                            ['nom' => 'Vila Nova de Gaia', 'statut' => true],
                            ['nom' => 'Matosinhos', 'statut' => true],
                        ]
                    ],
                    [
                        'nom' => 'Faro',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Faro', 'statut' => true],
                            ['nom' => 'Albufeira', 'statut' => true],
                            ['nom' => 'Lagos', 'statut' => true],
                        ]
                    ],
                ]
            ],
            [
                'pays' => [
                    'nom' => 'Chine',
                    'code_iso' => 'CN',
                    'nationalite' => 'Chinoise',
                    'statut' => true,
                ],
                'regions' => [
                    [
                        'nom' => 'Shanghai',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Shanghai', 'statut' => true],
                            ['nom' => 'Pudong', 'statut' => true],
                            ['nom' => 'Hongqiao', 'statut' => true],
                        ]
                    ],
                    [
                        'nom' => 'Pékin',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Pékin', 'statut' => true],
                            ['nom' => 'Chaoyang', 'statut' => true],
                            ['nom' => 'Haidian', 'statut' => true],
                        ]
                    ],
                    [
                        'nom' => 'Guangdong',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Guangzhou', 'statut' => true],
                            ['nom' => 'Shenzhen', 'statut' => true],
                            ['nom' => 'Dongguan', 'statut' => true],
                        ]
                    ],
                ]
            ],
            [
                'pays' => [
                    'nom' => 'Inde',
                    'code_iso' => 'IN',
                    'nationalite' => 'Indienne',
                    'statut' => true,
                ],
                'regions' => [
                    [
                        'nom' => 'Karnataka',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Bangalore', 'statut' => true],
                            ['nom' => 'Mysore', 'statut' => true],
                            ['nom' => 'Hubli', 'statut' => true],
                        ]
                    ],
                    [
                        'nom' => 'Maharashtra',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'Mumbai', 'statut' => true],
                            ['nom' => 'Pune', 'statut' => true],
                            ['nom' => 'Nagpur', 'statut' => true],
                        ]
                    ],
                    [
                        'nom' => 'Delhi',
                        'statut' => true,
                        'villes' => [
                            ['nom' => 'New Delhi', 'statut' => true],
                            ['nom' => 'Gurgaon', 'statut' => true],
                            ['nom' => 'Noida', 'statut' => true],
                        ]
                    ],
                ]
            ],
        ];
    }
}
