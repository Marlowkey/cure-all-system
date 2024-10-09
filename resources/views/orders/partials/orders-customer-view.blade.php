<div class="container mt-4">
    <h3>Order Details</h3>

    <!-- Order Information -->
    <div class="mb-4">
        <h5>Order ID: {{ $order->id }}</h5>
        <p>Order Date: {{ $order->created_at->format('Y-m-d') }}</p>
        <p>Total Price: ₱{{ $order->total }}</p>
        <p>Payment Method: {{ $order->payment_method }}</p>
        <p>Status: <strong>{{ ucfirst($order->status) }}</strong></p>
    </div>

    <!-- Customer Information -->
    <h5>Address</h5>
    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Contact Number:</strong> {{ $order->user->contact_num ?? 'N/A' }}</p>
            <p><strong>Address:</strong></p>
            <ul>
                <li>Street: {{ $order->user->street ?? 'N/A' }}</li>
                <li>Barangay: {{ $order->user->barangay ?? 'N/A' }}</li>
                <li>Municipality: {{ $order->user->municipality ?? 'N/A' }}</li>
            </ul>
        </div>
    </div>
    <!-- Prescription Image -->
    @if ($order->prescription_image)
        <h5>Prescription Image Uploaded</h5>
        <div class="mb-3">
            <img src="{{ asset('storage/' . $order->prescription_image) }}" alt="Prescription Image"
                style="max-width: 300px;">
        </div>
    @else
        <p>No prescription image uploaded for this order.</p>
    @endif

    <!-- Order Items -->
    <h5>Order Items</h5>
    <div>
        @foreach ($order->orderItems as $item)
            <div class="card mb-2">
                <div class="card-body d-flex">
                    <div>
                        <span>{{ $item->medicine->brand }}</span><br>
                        <span>{{ $item->medicine->name }}</span><br>
                        <span>₱{{ $item->medicine->price }}</span><br>
                        <span>Quantity: {{ $item->quantity }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
