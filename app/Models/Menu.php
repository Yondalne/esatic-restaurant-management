<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        "date",
        "period",  // Morning or evening (AM or PM)
    ];

    public function dishes() {
        return $this->belongsToMany(Dish::class)->withPivot('qty');
    }

    public function dishMenus()
    {
        return $this->hasMany(DishMenu::class);
    }
}
