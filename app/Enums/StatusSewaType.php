<?php

namespace App\Enums;
enum StatusSewaType: String
{
    case DITOLAK = 'ditolak';
    case DISETUJUI = 'disetujui';
    case SELESAI = 'selesai';
    case MENUNGGU = 'menunggu';

    public static function getStatuses(): array
    {
        return [
            self::DITOLAK,
            self::DISETUJUI,
            self::SELESAI,
            self::MENUNGGU
        ];
    }
}

