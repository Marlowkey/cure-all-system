@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h2>Orders</h2>
    @foreach($orders as $order)
        <div class="order mb-5">
            <h3>Order Reference: {{ $order->reference_num }}</h3>
            <p><strong>Total:</strong> {{ $order->total }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>

            <h4>Items:</h4>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Medicine Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->orderItems as $item)
                        <tr>
                            <td>{{ $item->medicine->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</div>
@endsection
