<?php
namespace App\Enums;

enum TipePembayaranType: String
{
    case DP = 'dp';
    case PELUNASAN = 'pelunasan';
    case DENDA = 'denda';

    public static function getAll(): array
    {
        return [
            self::DP,
            self::PELUNASAN,
            self::DENDA
        ];
    }
}
