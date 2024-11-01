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
            <h2>Create User</h2>
        </div>
        <div class="card-body p-4"> <!-- Border container -->
            <form class="row g-3" method="POST" action="{{ route('users.store') }}"> <!-- Set the action to your user creation endpoint -->
                @csrf <!-- Include CSRF token for Laravel -->

                <div class="col-md-6">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputName" name="name" required>
                </div>

                <div class="col-md-6">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" required>
                </div>

                <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password">
                </div>

                <div class="col-md-6">
                    <label for="inputContactNum" class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="inputContactNum" name="contact_num">
                </div>

                <div class="col-md-6">
                    <label for="inputAddress" class="form-label">Street Address</label>
                    <input type="text" class="form-control" id="inputAddress" name="street" placeholder="1234 Main St">
                </div>

                <div class="col-md-6">
                    <label for="inputBarangay" class="form-label">Barangay</label>
                    <input type="text" class="form-control" id="inputBarangay" name="barangay" placeholder="Barangay">
                </div>

                <div class="col-md-6">
                    <label for="inputMunicipality" class="form-label">Municipality</label>
                    <input type="text" class="form-control" id="inputMunicipality" name="municipality">
                </div>

                <div class="col-md-6">
                    <label for="inputState" class="form-label">Role</label>
                    <select id="inputRole" class="form-select" name="role" required>
                        <option value="customer" selected>Customer</option>
                        <option value="pharmacist">Pharmacist</option>
                        <option value="rider">Rider</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <div class="col-12 d-flex justify-content-end my-4 ">
                    <button type="submit" class="btn btn-primary me-2">Create User</button>
                    <button type="reset" class="btn btn-danger">Cancel</button>
                </div>

            </form>
        </div>
    </div>
</div>


@endsection