@extends('layouts.app') 

@section('content') 
    <div class="container mt-4">  
        <!-- Back Button -->
    <div class="mb-4">
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary  rounded-pill" style="padding: 0.25rem 0.5rem;">
        <i class="fa-solid fa-arrow-left me-1"></i>Back
        </a>
    </div>
        <h3 class="text-center mb-4">Order Details</h3>  
  
        <div class="d-flex flex-column flex-md-row justify-content-between mb-4"> 
            <!-- Order Information -->   
            <div class="card flex-fill me-md-2 w-100">   
                <div class="card-header bg-primary text-white">Order Information</div> 
                <div class="card-body">   
                    <h5>Order ID: {{ $order->id }}</h5>   
                    <p><strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d') }}</p>   
                    <p><strong>Total Price:</strong> ₱{{ $order->total }}</p>   
                    <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>   
                    <p><strong>Status:</strong> <span class="badge badge-{{ $order->status == 'completed' ? 'success' : 'warning' }}">{{ ucfirst($order->status) }}</span></p>  
                </div>   
            </div>   

            <!-- Customer Information -->   
            <div class="card flex-fill ms-md-2 w-100">  
                <div class="card-header bg-primary text-white">Customer Information</div> 
                <div class="card-body">  
                    <p><strong>Name:</strong> {{ $order->user->name }}</p>   
                    <p><strong>Contact Number:</strong> {{ $order->user->contact_num ?? 'N/A' }}</p>   
                    <p><strong>Address:</strong></p>   
                    <ul>  
                        <li>Street: {{ $order->user->street ?? 'N/A' }}</li>  
                        <li>Barangay: {{ $order->user->barangay ?? 'N/A' }}</li> 
                        <li>Municipality: {{ $order->user->municipality ?? 'N/A' }}</li> 
                    </ul> 

                    @if ($order->user->user_image) 
                        <p><strong>User Image:</strong></p>  
                        <img src="{{ asset('storage/' . $order->user->user_image) }}" alt="User Image" class="img-fluid" style="max-width: 150px;">  
                    @endif  

                    <p><strong>Valid ID Number:</strong> {{ $order->user->valid_id_num ?? 'N/A' }}</p> 
                    @if ($order->user->valid_id_image) 
                        <p><strong>Valid ID Image:</strong></p> 
                        <img src="{{ asset('storage/' . $order->user->valid_id_image) }}" alt="Valid ID Image" class="img-fluid" style="max-width: 150px;">
                    @endif 
                    <p><strong>Valid ID Type:</strong> {{ $order->user->valid_id_type ?? 'N/A' }}</p> 
                </div> 
            </div> 
        </div> 

        <!-- Order Items -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Order Items</div>
            <div class="card-body">
                @foreach ($order->orderItems as $item)
                    <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                        <div>
                            <strong>{{ $item->medicine->brand }}</strong><br>
                            <span>{{ $item->medicine->name }}</span><br>
                            <span>₱{{ $item->medicine->price }}</span><br>
                            <span>Quantity: {{ $item->quantity }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Prescription Image -->
        @if ($order->prescription_image)
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">Prescription Image</div>
                <div class="card-body text-center">
                    <img src="{{ asset('storage/' . $order->prescription_image) }}" alt="Prescription Image" class="img-fluid" style="max-width: 300px;">
                </div>
            </div>
        @else
            <div class="alert alert-warning">No prescription image uploaded for this order.</div>
        @endif

        <!-- Accept Order or Show Rider Status -->
        <div class="d-flex justify-content-end mt-3">
            @if (is_null($order->rider_id))
                <!-- Check if there is no rider assigned -->
                <form action="{{ route('orders.accept', $order->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Accept Order</button>  
                </form>  
            @else  
                <button class="btn btn-secondary" disabled>Rider Assigned</button>   
                <!-- Disabled button if a rider is assigned -->   
            @endif   
        </div>   
    </div>   
@endsection
