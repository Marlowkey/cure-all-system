<?php

namespace App\Models;

use App\Models\User;
use App\Models\OrderItemPlaced;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function orderItems()
    {
        return $this->hasMany(OrderItemPlaced::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
