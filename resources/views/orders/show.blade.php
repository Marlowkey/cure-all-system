{{-- This Blade template conditionally
includes views based on the user's role
(customer or pharmacist) --}}


@extends('layouts.app')
@section('content')


    @if (auth()->user()->role == 'customer')
        @include('orders.partials.orders-customer-view', ['order' => $order])
    @endsection



    @elseif(auth()->user()->role == 'pharmacist')
    @include('orders.partials.orders-pharmacist-view', ['order' => $order])
@endsection
@endif
