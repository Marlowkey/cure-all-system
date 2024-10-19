<?php

namespace App\Models;

use App\Models\User;
use App\Models\OrderItemPlaced;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    use HasFactory;

    protected static function booted()
    {
        static::created(function ($order) {
            OrderAuditTrail::create([
                'order_id' => $order->id,
                'action' => 'created',
                'user_id' => Auth::id(),
                'user_role' => Auth::user()->role,
            ]);
        });

        static::updating(function ($order) {
            OrderAuditTrail::create([
                'order_id' => $order->id,
                'action' => 'updated',
                'old_status' => $order->getOriginal('status'),
                'new_status' => $order->status,
                'user_id' => Auth::id(),
                'user_role' => Auth::user()->role,
            ]);
        });

        static::deleted(function ($order) {
            OrderAuditTrail::create([
                'order_id' => $order->id,
                'action' => 'deleted',
                'old_status' => $order->status,
                'user_id' => Auth::id(),
                'user_role' => Auth::user()->role,
            ]);
        });
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItemPlaced::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
