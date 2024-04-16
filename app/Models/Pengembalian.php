<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengembalian extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $dates = [
        'tanggal_kembali'
    ];
    protected $casts = [
        'is_telat' => 'boolean',
        'tanggal_kembali' => 'date'
    ];

    public function sewa(): BelongsTo
    {
        return $this->belongsTo(Sewa::class);
    }

    public function formatDenda(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => "Rp " . number_format($attributes['denda'],0,',','.')
        );
    }
}
