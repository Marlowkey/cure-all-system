@extends('layouts.app')
@section('content')
    <style>
        .progress-tracker {
            position: relative;
        }

        .progress-indicator {
            display: flex;
            justify-content: space-between;
            position: relative;
            width: 100%;
        }

        .progress-indicator li {
            position: relative;
            text-align: center;
            flex-grow: 1;
            flex-basis: 0;
        }

        .progress-indicator li:not(:first-child)::before {
            content: '';
            position: absolute;
            top: 50%;
            left: -50%;
            width: 100%;
            height: 4px;
            background-color: #ccc;
            z-index: -1;
            transform: translateY(-50%);
        }

        .progress-indicator li.completed:not(:first-child)::before {
            background-color: #28a745;
        }

        .progress-indicator li span.icon {
            display: block;
            margin-bottom: 5px;
            font-size: 24px;
        }

        .step.completed span.icon {
            color: #28a745;
        }

        .step.active span.icon {
            color: #007bff;
        }

        .step p {
            margin: 0;
        }
    </style>

    @if($orders->isEmpty())
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-sm-12">
                    <div class="alert alert-info text-center">
                        <h4>No orders found</h4>
                        <p>It seems like you haven't accept any orders yet.</p>
                    </div>
                </div>
            </div>
        </div>
    @else
    <div class="container mt-4">
        <h3>Assigned Orders</h3>
        <table class="table table-striped">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Order Date</th>
                    <th>Order Items</th>
                    <th>Total Price</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->created_at->format('Y-m-d') }}</td>
                        <td>
                            <!-- Loop through each order item -->
                            @foreach ($order->orderItems as $item)
                                <div class="card mb-2">
                                    <div class="card-body d-flex">
                                        <div>
                                            <span>{{ $item->medicine->brand }}</span><br>
                                            <span>{{ $item->medicine->name }}</span><br>
                                            <span>₱{{ $item->medicine->price }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </td>
                        <td>₱{{ $order->total }}</td>
                        <td>{{ $order->payment_method }}</td>
                        <td>{{ $order->formatted_status }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary btn-sm">View</a>
                            @if ($order->status === \App\Models\Order::STATUS_ON_THE_WAY)
                            <form action="{{ route('orders.rider.complete', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Complete</button>
                            </form>
                        @else
                        @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    @if(!$completedOrders->isEmpty())
    <div class="container mt-4">
        <h3>Completed Orders</h3>
        <table class="table table-striped">
            <thead class="bg-success text-white">
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Order Date</th>
                    <th>Order Items</th>
                    <th>Total Price</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($completedOrders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->created_at->format('Y-m-d') }}</td>
                        <td>
                            <!-- Loop through each completed order item -->
                            @foreach ($order->orderItems as $item)
                                <div class="card mb-2">
                                    <div class="card-body d-flex">
                                        <div>
                                            <span>{{ $item->medicine->brand }}</span><br>
                                            <span>{{ $item->medicine->name }}</span><br>
                                            <span>₱{{ $item->medicine->price }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </td>
                        <td>₱{{ $order->total }}</td>
                        <td>{{ $order->payment_method }}</td>
                        <td>{{ $order->formatted_status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection
