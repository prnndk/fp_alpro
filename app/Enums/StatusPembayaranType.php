<?php
namespace App\Enums;

enum StatusPembayaranType: String
{
    case REVISI = 'revisi';
    case DITERIMA = 'diterima';
    case DITOLAK = 'ditolak';
    case MENUNGGU = 'menunggu';

    public static function getAll(): array
    {
        return [
            self::REVISI,
            self::DITERIMA,
            self::DITOLAK,
            self::MENUNGGU
        ];
    }
}
