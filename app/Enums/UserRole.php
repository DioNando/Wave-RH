<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'admin';
    case RH = 'rh';
    case MANAGER = 'manager';
    case EMPLOYE = 'employe';
    case AUTRE = 'autre';

    public static function all(): array
    {
        return [
            self::ADMIN,
            self::RH,
            self::MANAGER,
            self::EMPLOYE,
            self::AUTRE,
        ];
    }

    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'Administrateur',
            self::RH => 'Ressources Humaines',
            self::MANAGER => 'Manager',
            self::EMPLOYE => 'Employé',
            self::AUTRE => 'Autre',
        };
    }
}
