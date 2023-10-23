<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DishMenu extends Pivot
{
    use HasFactory;

    public function menu() {
        return $this->belongsTo(Menu::class);
    }

    public function dish() {
        return $this->belongsTo(Dish::class);
    }
}
