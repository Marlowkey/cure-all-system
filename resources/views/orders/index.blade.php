{{-- This Blade template conditionally includes views based on the user's role (customer or pharmacist) --}}

@extends('layouts.app')
@section('content')

    @if (auth()->user()->role == 'customer')
        @if ($orders->isEmpty())
            <div class="no-orders-message d-flex justify-content-center align-items-center" style="height: 50vh;">
                <div class="text-center" style="max-width: 400px; padding: 20px; border: 2px solid #007bff; border-radius: 10px; background-color: #f8f9fa;">
                    <p style="font-size: 18px; color: #495057; font-weight: 500;">There are no orders placed.</p>
                </div>
            </div>
        @else
            @foreach ($orders as $order)
                @include('orders.partials.orders-customer', ['order' => $order])
            @endforeach
        @endif

    @elseif(auth()->user()->role == 'pharmacist')
        @if ($orders->isEmpty())
            <div class="no-orders-message d-flex justify-content-center align-items-center" style="height: 50vh;">
                <div class="text-center" style="max-width: 400px; padding: 20px; border: 2px solid #007bff; border-radius: 10px; background-color: #f8f9fa;">
                    <p style="font-size: 18px; color: #495057; font-weight: 500;">There are no orders placed.</p>
                </div>
            </div>
        @else
            @include('orders.partials.orders-pharmacist', ['orders' => $orders])
        @endif
    @endif

@endsection
