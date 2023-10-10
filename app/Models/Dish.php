<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "price" // 200f or 500f but will be registered by the user
    ];

    public function menus () {
        return $this->belongsToMany(Menu::class)->withPivot('qty');
    }

    public function users() {
        return $this->belongsToMany(User::class)->withPivot('created_at', 'qty');
    }
}
