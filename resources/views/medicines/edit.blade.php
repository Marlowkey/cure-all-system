@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Back Button -->
    <div class="mb-4"> 
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary rounded-pill" style="padding: 0.3rem 1rem;"> 
            <i class="fa-solid fa-arrow-left me-1"></i> Back 
        </a> 
    </div> 
    <h1 class="text-center mb-4">Edit Medicine</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="d-flex justify-content-center align-items-center flex-column mb-4">
        @if ($medicine->image_path)
            <div class="mb-3">
                <img src="{{ Str::startsWith($medicine->image_path, 'http') ? $medicine->image_path : asset('storage/' . $medicine->image_path) }}" 
                     alt="{{ $medicine->name }}" class="img-thumbnail" style="width: 150px; height: 150px;"> 
            </div>
        @endif

        <form action="{{ route('medicines.update-image', $medicine->id) }}" method="POST" enctype="multipart/form-data" class="w-50">
            @csrf
            <div class="form-group mb-3">
                <label for="image_path" class="form-label">Update Image</label>
                <input type="file" name="image_path" id="image_path" class="form-control" accept="image/*">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success mt-3">Upload</button>
            </div>
        </form>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('medicines.update', $medicine->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $medicine->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="code" class="form-label">Code</label>
                    <input type="text" name="code" id="code" class="form-control" value="{{ $medicine->code }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="3">{{ $medicine->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="brand" class="form-label">Brand</label>
                    <input type="text" name="brand" id="brand" class="form-control" value="{{ $medicine->brand }}" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ $medicine->price }}" required min="0" step="0.01">
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $medicine->quantity }}" required min="0">
                </div>

                <div class="d-flex justify-content-end my-4">
                    <button type="submit" class="btn btn-primary">Update Medicine</button>
                </div> 
            </form>
        </div>
    </div>
</div>
@endsection
