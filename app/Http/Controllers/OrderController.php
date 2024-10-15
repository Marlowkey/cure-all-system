<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrderItemPlaced;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Order\StoreOrderRequest;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('customer')) {
            $orders = $user->orders()
                ->with(['orderItems.medicine'])
                ->latest()
                ->get();
        } elseif ($user->hasRole('pharmacist')) {
            $orders = Order::with(['orderItems.medicine'])
                ->latest()
                ->get();
        } else {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        $user = Auth::user();
        $order = Order::with(['orderItems.medicine'])
            ->where('id', $id)
            ->firstOrFail();

        return view('orders.show', compact('order'));
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


        session([
            'order_id' => $order->id,
            'order_total' => $order->total,
            'estimated_delivery' => 'Aug 28 – Aug 30', // Example date, adjust accordingly
        ]);

        // Redirect to the tracking page with the order ID
        return redirect()->route('tracking.show')->with('success', 'Order placed successfully!');

    }

    private function generateReferenceNumber($length = 10)
    {
        return strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, $length));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:Pending,Processing,Completed,Canceled',
        ]);

        $order = Order::findOrFail($id);

        $order->status = $request->input('status');
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    }

}
