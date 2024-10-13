@props(['medicine'])

<div class="pro">
    <a>
        <img src="{{ Str::startsWith($medicine->image_path, 'http') ? $medicine->image_path : asset('storage/' . $medicine->image_path) }}"
             alt="{{ $medicine['name'] }}"
             class="w-100 h-60 img-fluid">
    </a>
    <div class="des">
        <span>{{ $medicine->brand }}</span>
        <h4>{{ $medicine->name }}</h4>
        <h4 id="productPrice">₱{{ number_format($medicine->price, 2) }}</h4>
    </div>
    <div class="cart">
        <form action="{{ route('cart.store') }}" method="POST" class="d-flex flex-column align-items-start mr-4">
            @csrf
            <input type="hidden" name="medicine_id" value="{{ $medicine->id }}">
            <input type="hidden" name="quantity" value="1">
            <button type="submit" class="btn-sm btn-primary ">
                <i class="fa-solid fa-cart-shopping me-1"></i>
            </button>
        </form>
    </div>
</div>
