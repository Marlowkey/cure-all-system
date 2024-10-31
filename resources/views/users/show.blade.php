@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="h3 mb-4">User Details</h1>
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title text-primary">{{ $user->name }}</h5>
            <div class="mb-3">
                <span class="badge bg-info text-dark">Role: {{ ucfirst($user->role) }}</span>
            </div>
            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="card-text"><strong>Username:</strong> {{ $user->username }}</p>
            <p class="card-text"><strong>Contact Number:</strong> {{ $user->contact_num }}</p>
            <p class="card-text"><strong>Street Address:</strong> {{ $user->street ?? '-' }}</p>
            <p class="card-text"><strong>Barangay:</strong> {{ $user->barangay ?? '-' }}</p>
            <p class="card-text"><strong>Municipality:</strong> {{ $user->municipality ?? '-' }}</p>

            <!-- Mapbox Map Container -->
            <div class="card mt-4">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">User Location</h6>
                    <div id="map" style="width: 100%; height: 250px; border-radius: 8px;"></div>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning me-2">Edit User</a>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to Users List</a>
            </div>
        </div>
    </div>
</div>

<!-- Mapbox JS and Initialization Script -->
<!-- <link href="https://api.mapbox.com/mapbox-gl-js/v3.7.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v3.7.0/mapbox-gl.js"></script> -->
<!-- caputol -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        mapboxgl.accessToken = '{{ env("MAPBOX_PUBLIC_TOKEN") }}';
        
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v12',
            center: [-24, 42], // Customize this based on user data
            zoom: 10
        });

        map.addControl(new mapboxgl.GeolocateControl({
            positionOptions: { enableHighAccuracy: true },
            trackUserLocation: true,
            showUserHeading: true
        }));
    });
</script>
@endsection
