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

    const STATUS_PENDING = 'pending';
    const STATUS_TO_BE_SHIPPED = 'to_be_shipped';
    const STATUS_ON_THE_WAY = 'on_the_way';
    const STATUS_COMPLETED = 'completed';
    const STATUS_COMPLETED_CONFIRMED = 'completed_confirmed';
    const STATUS_DECLINED = 'declined';
    const STATUS_CANCELED = 'canceled';


    public function getFormattedStatusAttribute()
    {
        return ucfirst(str_replace('_', ' ', $this->status));
    }
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

    public function rider()
    {
        return $this->belongsTo(User::class, 'rider_id')->where('role', 'rider');
    }
}
