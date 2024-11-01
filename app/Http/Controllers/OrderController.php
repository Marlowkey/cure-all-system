<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrderItemPlaced;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Order\StoreOrderRequest;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $canceledOrders = null;
        $completedOrders = null;

        if ($user->hasRole('customer')) {

            $orders = $user->orders()
                ->where('status', '!=', Order::STATUS_CANCELED)
                ->with(['orderItems.medicine', 'rider'])
                ->latest()
                ->get();

            $canceledOrders = $user->orders()
                ->where('status', Order::STATUS_CANCELED)
                ->with(['orderItems.medicine', 'rider'])
                ->latest()
                ->get();

            $completedOrders = $user->orders()
                ->where('status', Order::STATUS_COMPLETED_CONFIRMED)
                ->with(['orderItems.medicine', 'rider'])
                ->latest()
                ->get();

        } elseif ($user->hasRole('pharmacist')) {
            $orders = Order::with(['orderItems.medicine'])
                ->latest()
                ->get();

        } elseif ($user->hasRole('rider')) {

            $orders = Order::with(['orderItems.medicine', 'user'])
                ->where('rider_id', $user->id)
                ->where('status', Order::STATUS_ON_THE_WAY)
                ->latest()
                ->get();

            $completedOrders = Order::with(['orderItems.medicine', 'user'])
                ->where('rider_id', $user->id)
                ->whereIn('status', [Order::STATUS_COMPLETED, Order::STATUS_COMPLETED_CONFIRMED])->latest()
                ->get();


        } else {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        if ($user->role === 'rider') {
            return view('rider.orders-rider', compact('orders', 'completedOrders')); // Return the rider view
        }

        return view('orders.index', data: compact('orders', 'canceledOrders', 'completedOrders'));
    }

    public function show($id)
    {
        $user = Auth::user();
        $order = Order::with(['orderItems.medicine'])
            ->where('id', $id)
            ->firstOrFail();

        if ($user->role === 'rider') {
            return view('rider.orders-rider-view', compact('order')); // Return the rider view
        }

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
            'status' => Order::STATUS_PENDING,
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

        session([
            'order_id' => $order->id,
            'order_total' => $order->total,
            'estimated_delivery' => 'Aug 28 – Aug 30',
        ]);

        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }

    private function generateReferenceNumber($length = 10)
    {
        return strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, $length));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => [
                'required',
                'string',
                Rule::in([
                    Order::STATUS_COMPLETED_CONFIRMED,
                    Order::STATUS_CANCELED,
                ]),
            ],
        ]);

        $order = Order::findOrFail($id);

        $order->status = $request->input('status');
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    }


    public function acceptOrder(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);

        if ($order->status === Order::STATUS_PENDING) {
            $order->status = Order::STATUS_TO_BE_SHIPPED;
            $order->save();
            return redirect()->back()->with('success', 'Order accepted successfully.');
        }

        return redirect()->back()->with('error', 'Order cannot be accepted.');
    }

    public function declineOrder(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);

        if ($order->status === Order::STATUS_PENDING) {
            $order->status = Order::STATUS_DECLINED;
            $order->save();
            return redirect()->back()->with('success', 'Order declined successfully.');
        }

        return redirect()->back()->with('error', 'Order cannot be declined.');
    }


    public function acceptRiderOrder(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        $user = Auth::user();

        if ($order->status === Order::STATUS_TO_BE_SHIPPED) {
            if (is_null($order->rider_id)) {
                $order->rider_id = $user->id;
                $order->status = Order::STATUS_ON_THE_WAY;
                $order->save();

                return redirect()->back()->with('success', 'Order accepted successfully and assigned to you.');
            } else {
                return redirect()->back()->with('error', 'This order is already assigned to another rider.');
            }
        }

        return redirect()->back()->with('error', 'Order cannot be accepted at this time.');
    }

    public function declineRiderOrder(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);

        if ($order->status === Order::STATUS_TO_BE_SHIPPED) {
            $order->status = Order::STATUS_TO_BE_SHIPPED;
            $order->save();
            return redirect()->back()->with('success', 'Order declined and is available for other riders.');
        }
        return redirect()->back()->with('error', 'Order cannot be declined at this time.');
    }

    public function completeRiderOrder(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        $user = Auth::user();

        if ($order->rider_id === $user->id && $order->status === Order::STATUS_ON_THE_WAY) {
            $order->status = Order::STATUS_COMPLETED;
            foreach ($order->orderItems as $item) {
                $medicine = $item->medicine;
                if ($medicine->quantity >= $item->quantity) {
                    $medicine->quantity -= $item->quantity;
                    $medicine->save();
                } else {
                    return redirect()->back()->with('error', 'Insufficient stock for item: ' . $medicine->name);
                }
            }
            $order->save();
            return redirect()->back()->with('success', 'Order marked as completed successfully.');
        }
        return redirect()->back()->with('error', 'Unable to complete the order.');
    }
}
