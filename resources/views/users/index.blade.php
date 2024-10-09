@extends('layouts.app')
@section('content')
    <div class="container-fluid my-5">
        <h1 class="h2 mb-4">Overview</h1>
        <div class="row">
            <x-card
                title="User (Customer)"
                value="{{ $customerCount }}"
                borderColor="primary"
                textColor="primary"
                icon="fas fa-user"
            />

            <x-card
                title="User (Rider)"
                value="{{ $riderCount }}"
                borderColor="success"
                textColor="success"
                icon="fas fa-user"
            />

            <x-card
                title="User (Pharmacist)"
                value="{{ $pharmacistCount }}"
                borderColor="info"
                textColor="info"
                icon="fas fa-user"
            />
        </div>

        <h1 class="h3 my-4">
            <span class="text-muted">Users</span>
        </h1>

        <div class="card shadow mb-5">
            <div class="card-header py-4 d-flex justify-content-between align-items-center flex-wrap">
                <div class="flex-grow-1">
                    <form action="{{ route('users.index') }}" method="GET" class="row g-2">
                        <div class="col-8 col-md-4 col-lg-4">
                            <div class="input-group">
                                <input type="search" class="form-control form-control-sm" name="q" placeholder="Search for user..." value="{{ request('q') }}" />
                                <span class="input-group-text input-group-lg">
                                    <i class="fas fa-search fa-lg"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-4 col-md-2 col-lg-2">
                            <select name="role" class="form-select form-select-sm" aria-label="Filter by role">
                                <option value="">All Roles</option>
                                <option value="rider" {{ request('role') == 'rider' ? 'selected' : '' }}>Rider</option>
                                <option value="customer" {{ request('role') == 'customer' ? 'selected' : '' }}>Customer</option>
                                <option value="pharmacist" {{ request('role') == 'pharmacist' ? 'selected' : '' }}>Pharmacist</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                        </div>
                    </form>
                </div>
                <a href ="{{ route('users.create') }}" class="btn btn-primary btn-sm mt-2 mt-md-0">Add User</a> <!-- Responsive margin -->
            </div>
                <x-table-users :users="$users" />
        </div>
    </div>


@endsection
