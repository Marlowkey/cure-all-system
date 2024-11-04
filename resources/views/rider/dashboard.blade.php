@extends('layouts.app')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Orders</h1>
    </div>

    <div class="row">
        <!-- Orders To Ship Card -->
        <x-card title="Orders To Ship" value="{{ number_format($orders->count()) }}" borderColor="primary"
            textColor="primary" icon="fas fa-calendar" />
    </div>

    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="text-center mb-4">All Orders</h2>

                <!-- Table layout for medium and larger screens -->
                <div class="table-responsive" id="mainTable">
                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Order Date</th>
                                <th>Items</th>
                                <th>Total Price</th>
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
                                    @foreach ($order->orderItems as $item)
                                    <div>{{ $item->medicine->brand }} - {{ $item->medicine->name }}</div>
                                    @endforeach
                                </td>
                                <td>₱{{ $order->total }}</td>
                                <td>{{ $order->status }}</td>
                                <td><a href="{{ route('orders.show', $order->id) }}"
                                        class="btn btn-primary btn-sm">View</a>
                                    @if ($order->status === \App\Models\Order::STATUS_TO_BE_SHIPPED)
                                    <form action="{{ route('orders.rider.accept', $order->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Accept</button>
                                    </form>
                                    <form action="{{ route('orders.rider.decline', $order->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Decline</button>
                                    </form>
                                    @else
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Card layout for smaller screens -->
                <div class="d-md-none" id="orderCards">
                    @foreach ($orders as $order)
                    <div class="order-card p-3 mb-4 border rounded shadow-sm">
                        <h5>Order ID: {{ $order->id }}</h5>
                        <p><strong>Customer:</strong> {{ $order->user->name }}</p>
                        <p><strong>Date:</strong> {{ $order->created_at->format('Y-m-d') }}</p>
                        <p><strong>Total:</strong> ₱{{ $order->total }}</p>
                        <p><strong>Status:</strong> {{ $order->status }}</p>

                        <!-- Flex container for buttons -->
                        <div class="d-flex flex-wrap gap-2 mt-3">
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary btn-sm">View</a>

                            <!-- Show Accept/Decline buttons if status is 'TO_BE_SHIPPED' -->
                            @if ($order->status === \App\Models\Order::STATUS_TO_BE_SHIPPED)
                            <form action="{{ route('orders.rider.accept', $order->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Accept</button>
                            </form>
                            <form action="{{ route('orders.rider.decline', $order->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Decline</button>
                            </form>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <script>
        function toggleLayout() {
            const mainTable = document.getElementById('mainTable');
            const orderCards = document.getElementById('orderCards');

            if (window.innerWidth >= 768) {
                mainTable.style.display = 'block';
                orderCards.style.display = 'none';
            } else {
                mainTable.style.display = 'none';
                orderCards.style.display = 'block';
            }
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', toggleLayout);

        // Re-run on resize
        window.addEventListener('resize', toggleLayout);
    </script>
</div>
@endsection