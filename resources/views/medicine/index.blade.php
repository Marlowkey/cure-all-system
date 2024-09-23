@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <section id="page-header" class="about-header">
        <h2>Medicine Section</h2>
        <div id="para">
            <p>Your go-to for online shopping excellence!</p>
        </div>
    </section>

    <section id="product" class="section-p1">
        <p>Available</p>
        <div class="pro-container">

            @foreach ($medicines as $medicine)
                <x-medicine-card :medicine="$medicine" />
            @endforeach
    </section>


    <nav class="d-flex justify-content-center">
        <ul class="pagination">
            {{ $medicines->links() }}
        </ul>
    </nav>
@endsection
