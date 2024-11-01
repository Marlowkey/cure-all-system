<style> 
    .table th, .table td {  
        vertical-align: middle;  
        font-size: 14px;  
    }  
  
    .order-item {    
        display: flex;     
        align-items: center;   
        gap: 10px;  
        margin-bottom: 5px;
    }

    .order-item img {
        width: 40px;
        height: auto;
    }

    .order-actions .btn-group {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .table-responsive {
            display: none; /* Hide the table on small screens */
        }

        .order-card {
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #f8f9fa;
        }

        .order-item {
            flex-direction: column;
            align-items: flex-start;
        }

        .order-item img {
            margin-bottom: 5px;
        }
    }
</style>

<div class="container mt-4">
    <div class="card shadow-sm"> 
        <div class="card-body"> 
            <!-- Heading for All Orders -->
            <h2 class="text-center mb-4">All Orders</h2> <!-- Added heading -->

            <!-- Table layout for medium and larger screens --> 
            <div class="table-responsive d-none d-md-block" id="mainTable">
                <table class="table table-bordered"> 
                    <thead class="table-primary"> 
                        <tr> 
                            <th>Order ID</th>
                            <th>Delivery Rider</th>
                            <th>Shipping Address</th>
                            <th>Items</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            @php
                                // Group items within the order
                                $orderItemsGrouped = $order->orderItems->groupBy('medicine.id')->map(fn($items) => [
                                    'medicine' => $items->first()->medicine,
                                    'quantity' => $items->sum('quantity'),
                                ]);
                            @endphp
                            <tr> 
                                <td>{{ $order->id }}</td> 
                                <td> 
                                    <strong>{{ $order->deliveryRider->name ?? 'N/A' }}</strong><br>
                                    Contact: {{ $order->deliveryRider->contact_number ?? 'N/A' }}
                                </td>
                                <td>
                                    <strong>{{ auth()->user()->name }}</strong><br>
                                    {{ auth()->user()->street }}, {{ auth()->user()->barangay }}, {{ auth()->user()->municipality }}<br>
                                    Contact: {{ auth()->user()->contact_num }}
                                </td>
                                <td>
                                    @foreach ($orderItemsGrouped as $groupedItem)
                                        <div class="order-item">
                                            <img src="{{ $groupedItem['medicine']->image_path }}" alt="Product Image" class="img-thumbnail" />
                                            <div>
                                                <strong>{{ $groupedItem['medicine']->brand }}</strong> - {{ $groupedItem['medicine']->name }}<br>
                                                Price: ₱{{ $groupedItem['medicine']->price }}<br>
                                                Quantity: {{ $groupedItem['quantity'] }}
                                            </div>
                                        </div>
                                    @endforeach 
                                </td> 
                                <td class="text-center order-actions"> 
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-secondary btn-sm">Change Address</a>
                                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-success btn-sm">View</a>
                                        <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST" class="d-inline">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="status" value="Canceled">
                                            <button type="submit" class="btn btn-danger btn-sm">Cancel Order</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No orders found.</td>
                            </tr>
                        @endforelse
                    </tbody> 
                </table> 
            </div> 

            <!-- Card layout for smaller screens -->
            <div class="d-block d-md-none">
                @forelse ($orders as $order)
                    @php
                        // Group items within the order for card view
                        $orderItemsGrouped = $order->orderItems->groupBy('medicine.id')->map(fn($items) => [
                            'medicine' => $items->first()->medicine,
                            'quantity' => $items->sum('quantity'),
                        ]);
                    @endphp
                    <div class="order-card mb-4 p-3 border rounded shadow-sm"> <!-- Added padding and shadow -->
                        <h5>Order ID: {{ $order->id }}</h5>
                        <p><strong>Delivery Rider:</strong> {{ $order->deliveryRider->name ?? 'N/A' }}</p>
                        <p><strong>Shipping Address:</strong></p>
                        <p>{{ auth()->user()->name }}, {{ auth()->user()->street }}, {{ auth()->user()->barangay }}, {{ auth()->user()->municipality }}</p>
                        <p><strong>Contact:</strong> {{ auth()->user()->contact_num }}</p>

                        <h6>Items:</h6>
                        @foreach ($orderItemsGrouped as $groupedItem)
                            <div class="order-item"> 
                                <img src="{{ $groupedItem['medicine']->image_path }}" alt="Product Image" class="img-thumbnail" /> 
                                <div> 
                                    <strong>{{ $groupedItem['medicine']->brand }}</strong> - {{ $groupedItem['medicine']->name }}<br>
                                    Price: ₱{{ $groupedItem['medicine']->price }}<br>
                                    Quantity: {{ $groupedItem['quantity'] }}
                                </div>
                            </div>
                        @endforeach

                        <div class="order-actions text-center">
                            <div class="btn-group">
                                <a href="#" class="btn btn-secondary btn-sm">Change Address</a>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-success btn-sm">View</a>
                                <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST" class="d-inline">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="status" value="Canceled">
                                    <button type="submit" class="btn btn-danger btn-sm">Cancel Order</button>
                                </form>
                            </div> 
                        </div>  
                    </div>  
                @empty  
                    <p class="text-center">No orders found.</p>
                @endforelse  
            </div> 
        </div>   
    </div>         
</div>


<script>
    // JavaScript to ensure only one layout shows at a time
    window.addEventListener('resize', function() {
        const mainTable = document.getElementById('mainTable');
        const orderCards = document.querySelector('.order-card');

        if (window.innerWidth >= 768) {
            mainTable.style.display = 'block';
            orderCards.style.display = 'none';
        } else {
            mainTable.style.display = 'none';
            orderCards.style.display = 'block';
        }
    });

    // Trigger the resize event on page load
    window.dispatchEvent(new Event('resize'));
</script>
