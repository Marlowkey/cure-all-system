@extends('layouts.app')
@section('content')

@if (auth()->guest() || auth()->user()->role == 'customer')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<!-- Inline CSS for Sticky Prescription Notice -->
<style>
    /* Prescription Notice Styles */
    .sticky-prescription {
        background-color: #28a745; /* Green background */
        color: #fff; /* White text color */
        padding: 15px 20px; /* Increased padding for better spacing */
        text-align: center;
        font-weight: bold;
        font-size: 1.2rem; /* Slightly larger font size for better readability */
        border-radius: 40px 0 40px 0; /* Rounded corners: upper left and bottom right */
        position: sticky; /* Ensure it remains sticky */
        top: 60px; /* Adjust this to the height of your navbar */
        z-index: 10; /* Ensure it stays above other content */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 4px 4px 8px rgba(0, 0, 0, 0.3); /* Added shadow for depth */
        transition: all 0.3s ease; /* Smooth transition for hover effect */
    }

    /* Add hover effect */
    .sticky-prescription:hover {
        background-color: #218838; /* Darker green on hover */
        transform: translateY(-2px); /* Lift effect on hover */
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .sticky-prescription {
            font-size: 1rem; /* Adjusted font size for smaller screens */
            top: 95px; /* Ensure it remains below the navbar on smaller screens */
        }
    }
</style>

<section id="page-header" class="about-header"> 
    <h2>Medicine Section</h2> 
    <div id="para"> 
        <p>Your go-to for online shopping excellence!</p>
    </div>
</section>

<section id="product" class="section-p1">
    <div class="sticky-prescription">
        <strong>Notice:</strong> All RX medications require a valid prescription to be uploaded.
    </div>

    <!-- Product Availability Section -->
    <p class="mt-5 text-center">Available</p> <!-- Enhanced styling -->
    <div class="pro-container mt-3"> <!-- Added Bootstrap margin-top class here -->
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
