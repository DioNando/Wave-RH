<?php

namespace App\Enums;

enum LangueNiveau: string
{
    case DEBUTANT = 'debutant';
    case INTERMEDIAIRE = 'intermediaire';
    case AVANCE = 'avance';
    case COURANT = 'courant';
    case NATIF = 'natif';

    public static function all(): array
    {
        return [
            self::DEBUTANT,
            self::INTERMEDIAIRE,
            self::AVANCE,
            self::COURANT,
            self::NATIF,
        ];
    }

    public function label(): string
    {
        return match ($this) {
            self::DEBUTANT => 'Débutant',
            self::INTERMEDIAIRE => 'Intermédiaire',
            self::AVANCE => 'Avancé',
            self::COURANT => 'Courant',
            self::NATIF => 'Natif',
        };
    }
}
