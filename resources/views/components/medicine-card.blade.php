@props(['medicine'])

<div class="pro">
    <a href="">
        <img src="{{ $medicine->image_path }}" alt="{{ $medicine['name'] }}">
    </a>
    <div class="des">
        <span>{{ $medicine->brand }}</span>
        <h4>{{ $medicine->name }}</h4>
        <h4 id="productPrice">₱{{ number_format($medicine->price, 2) }}</h4>
    </div>
    <div class="cart">
        <i class="fa-solid fa-cart-shopping"></i>
    </div>
</div>
