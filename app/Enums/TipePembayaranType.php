<?php
namespace App\Enums;

enum TipePembayaranType: String
{
    case DP = 'dp';
    case PELUNASAN = 'pelunasan';
    case DENDA = 'denda';
}
