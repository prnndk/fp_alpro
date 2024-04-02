<?php

namespace App\Enums;
enum RolesType: string
{
    case ADMIN = 'admin';
    case USER = 'user';
    case OWNER = 'owner';

    public static function getValues(): array
    {
        return [
            self::ADMIN,
            self::USER,
            self::OWNER
        ];
    }
}
