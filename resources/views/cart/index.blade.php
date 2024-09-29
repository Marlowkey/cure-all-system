@extends('layouts.app')
@section('content')
    @php
        $totalPrice = $orderItems->sum(function ($orderItem) {
            return $orderItem->medicine->price * $orderItem->quantity;
        });
    @endphp
    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card shopping-cart" style="border-radius: 15px;">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-8 px-5 py-4 ">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h3 class="fw-bold mb-0">Shopping Cart</h3>
                                    </div>
                                    @foreach ($orderItems as $orderItem)
                                        <x-order-items-card :orderItem="$orderItem" />
                                    @endforeach
                                </div>
                                <div class="col-lg-4 px-5 py-4">
                                    <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Payment</h3>
                                    <x-forms.payment :total="$totalPrice" />
                                    <h5 class="fw-bold mb-5 mt-5" style="position: absolute; bottom: 0;">
                                        <a href="{{ route('medicines.index') }}"><i class="fas fa-angle-left me-2"></i>Back
                                            to shopping </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
