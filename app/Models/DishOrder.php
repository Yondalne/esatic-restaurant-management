<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DishOrder extends Pivot
{
    use HasFactory;

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function dish() {
        return $this->belongsTo(Dish::class);
    }
}
