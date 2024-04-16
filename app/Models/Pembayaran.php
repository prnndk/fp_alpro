<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pembayaran extends Model
{
    use HasFactory, Uuid;

    protected $guarded = ['id'];

    public function sewa(): BelongsTo
    {
        return $this->belongsTo(Sewa::class);
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}
