<?php

namespace App\Enums;
enum StatusSewaType: String
{
    case DITOLAK = 'ditolak';
    case DISETUJUI = 'disetujui';
    case SELESAI = 'selesai';
    case MENUNGGU = 'menunggu';
}
