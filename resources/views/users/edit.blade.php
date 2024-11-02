@extends('layouts.app')
@section('content')


<div class="container my-4">
    <!-- Back Button -->
    <div class="mb-4">
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary  rounded-pill" style="padding: 0.25rem 0.5rem;">
        <i class="fa-solid fa-arrow-left me-1"></i>Back
        </a>
    </div>
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h2>Edit User</h2>
        </div>
        <div class="border rounded p-4 shadow-sm"> <!-- Border container -->
            <form class="row g-3" method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="col-md-6">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputName" name="name" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="col-md-6">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="col-md-6">
                    <label for="password" class="form-label">Password (leave blank to keep current)</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="col-md-6">
                    <label for="inputContactNum" class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="inputContactNum" name="contact_num" value="{{ old('contact_num', $user->contact_num) }}">
                </div>

                <div class="col-md-6">
                    <label for="inputAddress" class="form-label">Street Address</label>
                    <input type="text" class="form-control" id="inputAddress" name="street" value="{{ old('street', $user->street) }}" placeholder="1234 Main St">
                </div>

                <div class="col-md-6">
                    <label for="inputBarangay" class="form-label">Barangay</label>
                    <input type="text" class="form-control" id="inputBarangay" name="barangay" value="{{ old('barangay', $user->barangay) }}" placeholder="Barangay">
                </div>

                <div class="col-md-6">
                    <label for="inputMunicipality" class="form-label">Municipality</label>
                    <input type="text" class="form-control" id="inputMunicipality" name="municipality" value="{{ old('municipality', $user->municipality) }}">
                </div>

                <div class="col-md-6">
                    <label for="inputRole" class="form-label">Role</label>
                    <select id="inputRole" class="form-select" name="role" required>
                        <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>Customer</option>
                        <option value="pharmacist" {{ $user->role == 'pharmacist' ? 'selected' : '' }}>Pharmacist</option>
                        <option value="rider" {{ $user->role == 'rider' ? 'selected' : '' }}>Rider</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <div class="col-12 d-flex justify-content-end my-4">
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                    <button type="reset" class="btn btn-danger">Cancel</button>
                </div>

            </form>
        </div>
    </div>
</div>



@endsection