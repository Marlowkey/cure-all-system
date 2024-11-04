<div class="container mt-5">
    <!-- Back Button -->
    <div class="mb-4">
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary  rounded-pill" style="padding: 0.25rem 0.5rem;">
        <i class="fa-solid fa-arrow-left me-1"></i>Back
        </a>
    </div>

    <h3 class="text-primary mb-4">Order Details</h3>
    <!-- Order Information -->
    <div class="row mb-4">
        <div class="col-12">
            <h5 class="text-muted mb-3">Order Information</h5>
            <div class="bg-light p-3 rounded shadow-sm">
                <div class="d-flex flex-column flex-md-row align-items-start">
                    <div class="mb-2 mb-md-0 me-md-4">
                        <strong>Order ID:</strong> <span>{{ $order->id }}</span>
                    </div>
                    <div class="mb-2 mb-md-0 me-md-4">
                        <strong>Order Date:</strong> <span>{{ $order->created_at->format('Y-m-d') }}</span>
                    </div>
                    <div class="mb-2 mb-md-0 me-md-4">
                        <strong>Total Price:</strong> <span>₱{{ $order->total }}</span>
                    </div>
                    <div class="mb-2 mb-md-0 me-md-4">
                        <strong>Payment Method:</strong> <span>{{ $order->payment_method }}</span>
                    </div>
                    <div>
                        <strong>Status:</strong> 
                        <span class="badge bg-info text-dark">{{ ucfirst($order->status) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Items -->
    <h5 class="text-muted mb-3">Order Items</h5>
    <div class="row">
        @foreach ($order->orderItems as $item)
            <div class="col-md-6 col-lg-4">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <p class="fw-bold mb-1">{{ $item->medicine->brand }}</p>
                            <p class="mb-0">{{ $item->medicine->name }}</p>
                            <p class="text-muted mb-0">₱{{ $item->medicine->price }}</p>
                        </div>
                        <div class="text-end">
                            <p class="fw-bold">Qty: {{ $item->quantity }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Prescription Image -->
    @if ($order->prescription_image)
        <h5 class="text-muted mb-3">Prescription Image Uploaded</h5>
        <div class="mb-4">
            <img src="{{ asset('storage/' . $order->prescription_image) }}" class="img-fluid rounded" alt="Prescription Image" style="max-width: 100%; height: auto;">
        </div>
    @else
        <p class="text-danger">No prescription image uploaded for this order.</p>
    @endif

    <!-- Customer Information -->
    <h5 class="text-muted mb-3">Delivery Address</h5>
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <p><strong>Contact Number:</strong> {{ $order->user->contact_num ?? 'N/A' }}</p>
            <p><strong>Address:</strong></p>
            <ul class="list-unstyled">
                <li>Street: {{ $order->user->street ?? 'N/A' }}</li>
                <li>Barangay: {{ $order->user->barangay ?? 'N/A' }}</li>
                <li>Municipality: {{ $order->user->municipality ?? 'N/A' }}</li>
            </ul>
        </div>
    </div>

    <!-- Map -->
    <h5 class="text-muted mb-3">Delivery Tracking</h5>
    <div class="map-container mb-4">
        <div id="map" style="height: 400px; border: 2px solid #004d00; background-color: #f8f9fa;" class="w-100 rounded shadow-sm"></div>
        <!-- Map will render here -->
    </div>

</div>

