<style>
    .thead-blue {
        background-color: #007bff;
        /* Bootstrap primary color */
        color: white;
        /* Ensure text is visible */
    }

    .card-table {
        margin-bottom: 1.5rem; /* Space between cards */
    }

    .card-table {
        margin-bottom: 1.5rem; /* Space between cards */
    }
</style>


@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<div class="card mb-4">

    <div class="card-body">
        <h3>Orders Table</h3>

        <!-- Responsive Table for larger screens -->
        <div class="table-responsive d-none d-md-block">
            <table class="table table-hover">
                <thead class="table-primary">
                    <tr class="text-white">
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
                                <a href="{{  route('orders.show', $order->id)  }}" class="btn btn-primary btn-sm">View</a>

                            @if ($order->status === \App\Models\Order::STATUS_PENDING)
                                <form action="{{ route('orders.accept', $order->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Accept</button>
                                </form>
                                <form action="{{ route('orders.decline', $order->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Decline</button>
                                </form>
                            @endif
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Card layout for smaller screens -->
        <div class="d-block d-md-none">
            @foreach ($orders as $order)
                <div class="card card-table">
                    <div class="card-body">
                        <h5 class="card-title">Order ID: {{ $order->id }}</h5>
                        <p><strong>Customer Name:</strong> {{ $order->user->name }}</p>
                        <p><strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d') }}</p>
                        <p><strong>Order Items:</strong></p>
                        @foreach ($order->orderItems as $item)
                            <div class="mb-2">
                                <strong>{{ $item->medicine->brand }}</strong><br>
                                <span>{{ $item->medicine->name }}</span><br>
                                <span>₱{{ $item->medicine->price }}</span>
                            </div>
                        @endforeach
                        <p><strong>Total Price:</strong> ₱{{ $order->total }}</p>
                        <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
                        <p><strong>Status:</strong> {{ $order->status }}</p>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary btn-sm">View</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
