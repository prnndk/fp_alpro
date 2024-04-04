<?php

namespace App\Models;

use App\Enums\StatusSewaType;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sewa extends Model
{
    use HasFactory,Uuid;

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal_sewa'=>'date',
        'tanggal_perkiraan_kembali'=>'date',
        'status_sewa'=>StatusSewaType::class
    ];
    protected $dates = [
        'tanggal_sewa',
        'tanggal_perkiraan_kembali'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'users_id');
    }
    public function kendaraan(): BelongsTo
    {
        return $this->belongsTo(Kendaraan::class);
    }
    public function pengembalian(): HasOne
    {
        return $this->hasOne(Pengembalian::class);
    }
    public function pembayaran(): HasMany
    {
        return $this->hasMany(Pembayaran::class);
    }

    public static function formatToRupiah(int $value): string
    {
        return "Rp " . number_format($value,0,',','.');
    }
}
