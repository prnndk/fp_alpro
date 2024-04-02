<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipeKendaraan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function kendaraan(): HasMany
    {
        return $this->hasMany(Kendaraan::class);
    }
}
