<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\OrderItemPlaced;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Order\StoreOrderRequest;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders()
            ->with(['orderItems.medicine'])
            ->latest()
            ->get();
        return view('orders.index', compact('orders'));
    }
    public function store(StoreOrderRequest $request)
    {
        $user = Auth::user();

        $orderItems = $user->orderItems()->with('medicine')->get();

        if ($orderItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $referenceNum = $this->generateReferenceNumber();

        $prescriptionImagePath = null;
        if ($request->hasFile('prescription_image')) {
            $prescriptionImagePath = $request->file('prescription_image')->store('prescriptions', 'public');
        }

        $order = Order::create([
            'reference_num' => $referenceNum,
            'user_id' => $user->id,
            'payment_method' => 'Cash on Delivery',
            'total' => $request->total,
            'status' => 'Pending',
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'prescription_image' => $prescriptionImagePath,
        ]);

        foreach ($orderItems as $orderItem) {
            OrderItemPlaced::create([
                'order_id' => $order->id,
                'user_id' => $user->id,
                'medicine_id' => $orderItem->medicine->id,
                'quantity' => $orderItem->quantity,
                'price' => $orderItem->price,
            ]);
        }

        $user->orderItems()->delete();
        return redirect()->route('cart.index')->with('success', 'Order placed successfully!');
    }
    private function generateReferenceNumber($length = 10)
    {
        return strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, $length));
    }
}
