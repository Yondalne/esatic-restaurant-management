<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'status'
    ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function dishes() {
        return $this->belongsToMany(Dish::class);
    }

    public function dishOrders() {
        return $this->hasMany(DishOrder::class);
    }


}
