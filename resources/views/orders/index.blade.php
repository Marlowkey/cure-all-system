{{-- @extends('layouts.app')
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
@endsection --}}


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
    color: #28a745; /* Green for completed steps */
}

.step.active span.icon {
    color: #007bff; /* Blue for active step */
}

.step p {
    margin: 0;
}
</style>
@foreach($orders as $order)
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title text-center">Order Placed</h3>
                    <p class="text-center text-muted">Estimated delivery: {{ session('estimated_delivery') }}</p>

                    <!-- Progress indicator for delivery -->
                    <div class="progress-tracker mb-4">
                        <ul class="progress-indicator d-flex justify-content-between list-unstyled">
                            <li class="step completed">
                                <span class="icon">📦</span>
                                <p>Order Placed</p>
                            </li>
                            <li class="step active">
                                <span class="icon">🚚</span>
                                <p>In Transit</p>
                            </li>
                            <li class="step">
                                <span class="icon">🏠</span>
                                <p>Out for Delivery</p>
                            </li>
                            <li class="step">
                                <span class="icon">✅</span>
                                <p>Delivered</p>
                            </li>
                        </ul>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5>Delivery Rider</h5>
                            <p><strong>Kenny Renz A. Caputol</strong></p>
                            <p>Contact: +63 93******24</p>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5>Shipping Address</h5>
                            <p><strong>{{ auth()->user()->name }}</strong></p>
                            <p>{{ auth()->user()->address }}</p>
                            <p>Contact: {{ auth()->user()->contact }}</p>
                        </div>
                    </div>

                    @foreach($order->orderItems as $item)
                    <div class="card mb-4">
                        <div class="card-body d-flex">
                            <img src="{{ $item->medicine->image_path }}" alt="Product Image" style="width: 100px; height: auto;" class="img-thumbnail me-3"/>
                            <div>
                                <span>{{ $item->medicine->brand }}</span>
                                <h4>{{  $item->medicine->name }}</h4>
                                <h4 id="productPrice">₱{{ session('order_total') }}</h4>
                            </div>
                        </div>
                    </div>
                    @endforeach


                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <a href="#" class="btn btn-secondary w-100">Change Address</a>
                        </div>
                        <div class="col-sm-6">
                            <a href="#" class="btn btn-danger w-100">Cancel Order</a>
                        </div>
                    </div>

                    <div class="map-container mb-4">
                        <div id="map" style="height: 400px;" class="w-100"></div> <!-- Map will render here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
