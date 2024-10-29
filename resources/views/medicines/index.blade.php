
@extends('layouts.app')
@section('content')


@if (auth()->guest() || auth()->user()->role == 'customer')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<section id="page-header" class="about-header">
    <h2>Medicine Section</h2>
    <div id="para">
        <p>Your go-to for online shopping excellence!</p>
    </div>
</section>

<section id="product" class="section-p1">
      <!-- Sticky Prescription Notice (Large Screens Only) -->
    <div class="alert alert-warning text-center sticky-top fs-3 d-none d-lg-block" role="alert" style="top: 115px;">
        <strong>Notice:</strong> All RX medications require a valid prescription to be uploaded.
    </div>
    <!-- Product Availability Section -->
    <p>Available</p>
    <div class="pro-container">
        @foreach ($medicines as $medicine)
            <x-medicine-card :medicine="$medicine" />
        @endforeach
    </div>
</section>





<nav class="d-flex justify-content-center">
    <ul class="pagination">
        {{ $medicines->links() }}
    </ul>
</nav>
@endsection
    @elseif(auth()->user()->role == 'pharmacist')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
<section id="page-header" class="about-header">
    <h2>Medicine Inventory</h2>
</section>

<x-table-medicine-pharmacist :medicines="$medicines" />

@endsection
@endif

