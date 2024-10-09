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
        /* Green for completed steps */
    }

    .step.active span.icon {
        color: #007bff;
        /* Blue for active step */
    }

    .step p {
        margin: 0;
    }
</style>
@foreach ($orders as $order)
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
                                <p>
                                    {{ auth()->user()->street }}<br>
                                    {{ auth()->user()->barangay }}<br>
                                    {{ auth()->user()->municipality }}
                                </p>
                                <p>Contact: {{ auth()->user()->contact_num }}</p>
                            </div>
                        </div>

                        @foreach ($order->orderItems as $item)
                            <div class="card mb-4">
                                <div class="card-body d-flex">
                                    <img src="{{ $item->medicine->image_path }}" alt="Product Image"
                                        style="width: 100px; height: auto;" class="img-thumbnail me-3" />
                                    <div>
                                        <span>{{ $item->medicine->brand }}</span>
                                        <h4>{{ $item->medicine->name }}</h4>
                                        <h4 id="productPrice">₱{{ $item->medicine->price }}</h4>
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
                            <div id="map" style="height: 400px;" class="w-100"></div>
                            <!-- Map will render here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
