<div class="container mt-2">
    <div class="outer-container">
        <div class="row row-space justify-content-center">
            <!-- Profile Information Container -->
            <div class="col-md-5 bordered-container profile-container">
                <h2 class="text-black">Profile Information</h2>
                <form id="locationForm" method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    <div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $user->username) }}" autofocus>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div class="mt-2">
                            <p class="mb-0">
                                {{ __('Your email address is unverified.') }}
                                <button form="send-verification" class="btn btn-link p-0">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>
                            @if (session('status') === 'verification-link-sent')
                            <div class="alert alert-success mt-3 mb-0" role="alert">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </div>
                            @endif
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="contact_num">Contact Number</label>
                        <input type="text" class="form-control @error('contact_num') is-invalid @enderror" id="contact_num" name="contact_num" value="{{ old('contact_num', $user->contact_num) }}" placeholder="Enter your contact number">
                        @error('contact_num')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
            </div>

            <!-- Address Information Container -->
            <div class="col-md-5 bordered-container address-container">
                <h2 class="text-black">Address Information</h2>
                <div class="form-group">
                    <label for="street">Street</label>
                    <input type="text" class="form-control @error('street') is-invalid @enderror" id="street" name="street" value="{{ old('street', $user->street) }}" placeholder="Enter your street">
                    @error('street')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="barangay">Barangay</label>
                    <input type="text" class="form-control @error('barangay') is-invalid @enderror" id="barangay" name="barangay" value="{{ old('barangay', $user->barangay) }}" placeholder="Enter your barangay">
                    @error('barangay')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="municipality">Municipality</label>
                    <input type="text" class="form-control @error('municipality') is-invalid @enderror" id="municipality" name="municipality" value="{{ old('municipality', $user->municipality) }}" placeholder="Enter your municipality">
                    @error('municipality')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Mapbox Map Container -->
                <!-- <div class="card mt-4">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">User Location</h6>
                        <div id="map" style="width: 100%; height: 250px; border-radius: 8px;"></div>
                    </div>
                </div> -->

                <div class="card mt-4">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Map Location</h6>
                        <div id="map" style="width: 100%; height: 250px; border-radius: 8px;"></div>
                        <button id="locateButton" class="btn btn-primary mt-2">Find my Location</button>
                    </div>
                </div>

                <!-- Add hidden inputs for latitude and longitude -->
                <input type="text" id="longitude" name="longitude" value="{{ old('longitude', $user->longitude) }}" hidden>
                <input type="text" id="latitude" name="latitude" value="{{ old('latitude', $user->latitude) }}" hidden>


            </div>
        </div>
        <div class="form-buttons text-center mt-3">
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('profile.edit') }}" class="btn btn-secondary">Cancel</a>
            @if (session('status') === 'profile-updated')
            <span class="m-1 text-success">{{ __('Profile updated successfully.') }}</span>
            @endif
        </div>
        </form>
    </div>
</div>


<!-- Mapbox JS and Initialization Script -->
<!-- <link href="https://api.mapbox.com/mapbox-gl-js/v3.7.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v3.7.0/mapbox-gl.js"></script> -->
<!-- caputol -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        mapboxgl.accessToken = '{{ env("MAPBOX_PUBLIC_TOKEN") }}';

        const userLatitude = "{{ $user->latitude ?? '0' }}";
        const userLongitude = "{{ $user->longitude ?? '0' }}";


        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v12',
            center: [userLongitude, userLatitude],
            zoom: 14.5
        });

        // Add a marker for the user's current location
        if (userLatitude && userLongitude) {
            new mapboxgl.Marker()
                .setLngLat([userLongitude, userLatitude])
                .addTo(map);
        }

        // Initialize the Geolocate Control
        const geolocateControl = new mapboxgl.GeolocateControl({
            positionOptions: {
                enableHighAccuracy: true
            },
            trackUserLocation: true,
            showUserHeading: true
        });

        map.addControl(geolocateControl);

        window.addEventListener('resize', () => {
            map.resize();

        });
        // Load event for the map
        map.on('load', function() {
            // Example GeoJSON data
            const geojson = {
                type: 'FeatureCollection',
                features: []
            };

            // Add the GeoJSON source for user location
            map.addSource('user-location', {
                type: 'geojson',
                data: geojson
            });

            // Add a layer to display the points
            map.addLayer({
                id: 'user-location',
                type: 'circle',
                source: 'user-location',
                paint: {
                    'circle-radius': 10,
                    'circle-color': '#007cbf'
                }
            });
        });

        // Locate button click event
        document.getElementById('locateButton').addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default button behavior
            // Check if geolocation is available
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    // Get latitude and longitude from the position object
                    const longitude = position.coords.longitude;
                    const latitude = position.coords.latitude;

                    // Log the values to check if they're being set correctly
                    console.log('Longitude:', longitude);
                    console.log('Latitude:', latitude);

                    // Update hidden inputs
                    document.getElementById('longitude').value = longitude;
                    document.getElementById('latitude').value = latitude;

                    //Console log hidden input
                    console.log('Hidden Longitude:', document.getElementById('longitude').value);
                    console.log('Hidden Latitude:', document.getElementById('latitude').value);

                    // Optional: Center the map on the user's location
                    map.setCenter([longitude, latitude]);
                    map.setZoom(15); // Zoom in for better view

                    // Optional: Add a marker on the map
                    new mapboxgl.Marker()
                        .setLngLat([longitude, latitude])
                        .addTo(map);

                    // Update GeoJSON data for the user's location
                    const geojson = {
                        type: 'FeatureCollection',
                        features: [{
                            type: 'Feature',
                            geometry: {
                                type: 'Point',
                                coordinates: [longitude, latitude]
                            },
                            properties: {
                                title: 'User Location',
                                description: 'User has submitted their location.'
                            }
                        }]
                    };

                    // Update the GeoJSON source with the new data
                    map.getSource('user-location').setData(geojson);
                }, function(error) {
                    console.error("Geolocation error: ", error);
                    alert("Unable to retrieve your location. Please ensure location services are enabled.");
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        });

        document.getElementById('locationForm').addEventListener('submit', function(e) {
            // Prevent default form submission if values are not set
            if (!document.getElementById('longitude').value || !document.getElementById('latitude').value) {
                alert("Please get your location first!");
                e.preventDefault(); // Prevent form submission
                return;
            }

            // Submit the form
            this.submit();
        });
    });
</script>