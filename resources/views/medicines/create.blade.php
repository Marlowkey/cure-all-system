@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Back Button -->
   <div class="mb-4">
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary  rounded-pill" style="padding: 0.25rem 0.5rem;">
        <i class="fa-solid fa-arrow-left me-1"></i>Back
        </a>
    </div>
    <h1>Create Medicine</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('medicines.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="text" name="code" id="code" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" name="brand" id="brand" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" required min="0" step="0.01">
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required min="0">
        </div>

        <div class="mb-3">
            <label for="image_path" class="form-label">Image</label>
            <input type="file" name="image_path" id="image_path" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Create Medicine</button>
    </form>
</div>
@endsection
