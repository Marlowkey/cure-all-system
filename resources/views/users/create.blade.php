@extends('layouts.app-dashboard')
@section('content')
<div class="container-fluid my-5">
    <h1 class="h2 mb-4">Create User</h1>
    <div class="border rounded p-4 shadow-sm"> <!-- Border container -->
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

        <div class="col-12">
            <label for="inputAddress" class="form-label">Street Address</label>
            <input type="text" class="form-control" id="inputAddress" name="street" placeholder="1234 Main St">
        </div>

        <div class="col-12">
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


@endsection
