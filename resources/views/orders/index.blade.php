{{-- This Blade template conditionally
includes views based on the user's role
(customer or pharmacist) --}}


 @extends('layouts.app')
    @section('content')


    @if (auth()->user()->role == 'customer')
            @foreach ($orders as $order)
                @include('orders.partials.orders-customer', ['order' => $order])
            @endforeach
        @endsection




        @elseif(auth()->user()->role == 'pharmacist')
        @include('orders.partials.orders-pharmacist', ['orders' => $orders])
    @endsection
@endif


