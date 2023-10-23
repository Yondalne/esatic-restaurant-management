<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        "username",
        "password",
        "name",
        "tel",
        "email"
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function dishes () {
        return $this->belongsToMany(Dish::class)->withPivot('created_at', 'qty');
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
