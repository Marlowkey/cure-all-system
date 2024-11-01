@extends('layouts.app')
@section('content')
    @if (auth()->user()->role == 'customer')
            @include('orders.partials.orders-customer', ['orders' => $orders]) 
        @endsection

    @elseif(auth()->user()->role == 'pharmacist') 
        @include('orders.partials.orders-pharmacist', ['orders' => $orders]) 
    @endsection
@endif 