<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kendaraan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function tipe_kendaraan() : BelongsTo
    {
        return $this->belongsTo(TipeKendaraan::class);
    }
    public function sewa(): HasMany
    {
        return $this->hasMany(Sewa::class);
    }
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
    public function lokasi_kendaraan(): HasOne
    {
        return $this->hasOne(LokasiKendaraan::class);
    }
}
