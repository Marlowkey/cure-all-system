<div class="container mt-4">
    <h3>Orders Table</h3>
    <table class="table table-striped">
        <thead>
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
                    <td>{{ $order->status }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm">View</a>
                        <a class="btn btn-secondary btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
