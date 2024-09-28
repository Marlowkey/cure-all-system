<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
