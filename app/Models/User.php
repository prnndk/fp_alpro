<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\RolesType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'role'=>RolesType::class
    ];

    public function pelanggan(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Pelanggan::class);
    }
    public function pemilik(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Pemilik::class);
    }
    public function review(): HasMany
    {
        return $this->hasMany(Review::class);
    }
    public function sewa(): HasMany
    {
        return $this->hasMany(Sewa::class);
    }

    public function isAdmin(): bool
    {
        return $this->role == RolesType::ADMIN;
    }
    public function isUser(): bool
    {
        return $this->role == RolesType::USER;
    }
    public function isOwner(): bool
    {
        return $this->role == RolesType::OWNER;
    }
}
