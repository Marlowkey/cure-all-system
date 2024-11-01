@extends('layouts.app')

@section('content')
<div class="container my-4">
    <!-- Back Button -->
    <div class="mb-4"> 
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary rounded-pill" style="padding: 0.3rem 1rem;"> 
            <i class="fa-solid fa-arrow-left me-1"></i> Back 
        </a> 
    </div> 
    
    <!-- Card Wrapper for the form -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h2>Create Medicine</h2>
        </div>
        <div class="card-body p-4">
            @if ($errors->any()) 
                <div class="alert alert-danger"> 
                    <ul class="mb-0"> 
                        @foreach ($errors->all() as $error) 
                            <li>{{ $error }}</li> 
                        @endforeach 
                    </ul> 
                </div> 
            @endif 

            <form action="{{ route('medicines.store') }}" method="POST" enctype="multipart/form-data"> 
                @csrf 

                <div class="mb-3"> 
                    <label for="name" class="form-label fw-semibold">Name</label> 
                    <input type="text" name="name" id="name" class="form-control shadow-sm rounded" required> 
                </div> 

                <div class="mb-3">
                    <label for="code" class="form-label fw-semibold">Code</label>
                    <input type="text" name="code" id="code" class="form-control shadow-sm rounded" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea name="description" id="description" class="form-control shadow-sm rounded" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="brand" class="form-label fw-semibold">Brand</label>
                    <input type="text" name="brand" id="brand" class="form-control shadow-sm rounded" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="price" class="form-label fw-semibold">Price (₱)</label>
                        <input type="number" name="price" id="price" class="form-control shadow-sm rounded" required min="0" step="0.01">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="quantity" class="form-label fw-semibold">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control shadow-sm rounded" required min="0">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="image_path" class="form-label fw-semibold">Image</label>
                    <input type="file" name="image_path" id="image_path" class="form-control shadow-sm rounded" accept="image/*">
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill px-4 shadow-sm">Create Medicine</button>
                </div>
            </form> 
        </div>
    </div>
</div> 
@endsection
