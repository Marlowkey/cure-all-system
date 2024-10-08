@extends('layouts.app-dashboard')
@section('sidebar')
    @include('layouts.partials.sidebar-pharmacist')
@endsection
@section('content')
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Cards</h1>
                    </div>

                    <div class="row">
                        <!-- Earnings (Monthly) Card -->
                        <x-card title="Earnings (Monthly)" value="$40,000" borderColor="primary" textColor="primary" icon="fas fa-calendar" />

                        <!-- Earnings (Annual) Card -->
                        <x-card title="Earnings (Annual)" value="$215,000" borderColor="success" textColor="success" icon="fas fa-dollar-sign" />

                        <!-- Tasks Card -->
                        <x-card title="Tasks" value="50%" borderColor="info" textColor="info" icon="fas fa-clipboard-list" />

                        <!-- Pending Requests Card -->
                        <x-card title="Pending Requests" value="18" borderColor="warning" textColor="warning" icon="fas fa-comments" />
                    </div>
                </div>
@endsection
