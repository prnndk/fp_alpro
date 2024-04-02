<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengembalian extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function sewa(): BelongsTo
    {
        return $this->belongsTo(Sewa::class);
    }
}
