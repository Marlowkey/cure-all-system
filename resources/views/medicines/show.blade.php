@extends('layouts.app')
@section('content')

@if (auth()->guest() || auth()->user()->role == 'customer')

<style>
    .medicine-container {
        border: 1px solid #dee2e6;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .medicine-image {
        width: 255px;
        height: 250px;
        object-fit: cover;
        border-radius: 10px;
        display: block;
        margin: 0 auto;
    }

    .price {
        font-size: 1.5em;
        color: #28a745;
    }

    .inventory {
        color: #6c757d;
    }

    .quantity-adjuster {
        display: flex;
        align-items: center;
        margin-top: 10px;
    }

    .quantity-adjuster input {
        width: 60px;
        text-align: center;
    }

    .cart-icon {
        font-size: 1.5em;
        margin-left: 10px;
        cursor: pointer;
    }
</style>

<div class="container p-5 mt-5 mb-5">
    <div class="row">
        <div class="col-md-6">
            <div class="medicine-container">
                <img src="{{ Str::startsWith($medicine->image_path, 'http') ? $medicine->image_path : asset('storage/' . $medicine->image_path) }}"
                     alt="{{ $medicine->name }}"
                     class="medicine-image">
            </div>
        </div>
        <div class="col-md-6">
            <h2 class="font-weight-bold">{{ $medicine->name }}</h2>
            <h5 class="text-muted">Brand: <span>{{ $medicine->brand }}</span></h5>
            <p class="text-muted">Description: {{ $medicine->description }}</p>
            <p class="price">₱{{ number_format($medicine->price, 2) }}</p>
            <p class="inventory">Available Quantity: <span>{{ $medicine->quantity }}</span></p>
            <div class="quantity-adjuster">
                <button class="btn btn-secondary btn-sm" onclick="adjustQuantity(-1)">-</button>
                <input type="number" id="quantity" value="1" min="1" max="{{ $medicine->quantity }}" readonly>
                <button class="btn btn-secondary btn-sm" onclick="adjustQuantity(1)">+</button>
                <form action="{{ route('cart.store') }}" method="POST" class="d-inline">
                    @csrf
                    <input type="hidden" name="medicine_id" value="{{ $medicine->id }}">
                    <input type="hidden" name="quantity" id="selectedQuantity" value="1">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-shopping-cart cart-icon" title="Add to Cart"></i> Add to Cart
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function adjustQuantity(change) {
        const quantityInput = document.getElementById('quantity');
        const selectedQuantity = document.getElementById('selectedQuantity');
        let currentQuantity = parseInt(quantityInput.value);
        currentQuantity = Math.max(1, Math.min({{ $medicine->quantity }}, currentQuantity + change));
        quantityInput.value = currentQuantity;
        selectedQuantity.value = currentQuantity;
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
@endif
