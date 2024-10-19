<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderAuditTrail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'action',
        'old_status',
        'new_status',
        'old_total',
        'new_total',
        'user_id',
        'user_role',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
