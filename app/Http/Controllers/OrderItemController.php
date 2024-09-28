<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class OrderItemController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orderItems = $user->orderItems()->with('medicine')->get();
        return view('order-items.index', compact('orderItems'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'medicine_id' => 'required|exists:medicines,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = Auth::user();

        $existingOrderItem = OrderItem::where('user_id', $user->id)
            ->where('medicine_id', $request->medicine_id)
            ->first();

        if ($existingOrderItem) {
            $existingOrderItem->quantity += $request->quantity;
            $existingOrderItem->save();
        } else {
            OrderItem::create([
                'user_id' => $user->id,
                'medicine_id' => $request->medicine_id,
                'quantity' => $request->quantity,
                'price' => Medicine::find($request->medicine_id)->price,
            ]);
        }
        return Redirect::route('order-items.index')->with('success', 'Item added to cart successfully');
    }
}
