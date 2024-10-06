<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItemPlaced extends Model
{
    use HasFactory;

    protected $table = 'order_items_placed';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
