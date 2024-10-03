@extends('layouts.app-dashboard')
@section('content')
    <div class="container-fluid my-5">
        <h1 class="h1 mb-4">Overview</h1>
        <div class="row">
            <x-card title="User (Customer)" value="$40,000" borderColor="primary" textColor="primary" icon="fas fa-user" />

            <x-card title="User (Rider)" value="$215,000" borderColor="success" textColor="success" icon="fas fa-user" />

            <x-card title="User (Pharmacist)" value="50%" borderColor="info" textColor="info" icon="fas fa-user" />
        </div>

        <h1 class="h2 my-4">
            <span class="text-muted">Users</span>
        </h1>

        <div class="card shadow mb-5">
            <div class="card-header py-4 d-flex justify-content-between align-items-center flex-wrap">
                <div class="flex-grow-1">
                    <form action="/serach" method="GET" class="row g-2">
                        <div class="col-8 col-md-4 col-lg-4">
                            <div class="input-group">
                                <input type="search" class="form-control form-control-lg" name="q" placeholder="Search for user..." style="font-size: 1.2rem;" />
                                <span class="input-group-text input-group-lg">
                                    <i class="fas fa-search fa-lg"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-4 col-md-2 col-lg-2">
                            <select name="role" class="form-select form-select-lg" aria-label="Filter by role">
                                <option value="">All Roles</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                                <option value="editor">Editor</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary btn-lg">Filter</button>
                        </div>
                    </form>
                </div>
                <a href="#" class="btn btn-primary btn-lg mt-2 mt-md-0">Add User</a> <!-- Responsive margin -->
            </div>
                <x-table-users :users="$users" />
        </div>
    </div>
@endsection
