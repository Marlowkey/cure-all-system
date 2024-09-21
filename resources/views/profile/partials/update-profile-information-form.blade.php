
<div class="container mt-2">
    <div class="outer-container">
        <div class="row row-space justify-content-center">
            <!-- Profile Information Container -->
            <div class="col-md-5 bordered-container profile-container">
                <h2 class="text-black">Profile Information</h2>
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    <div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}"  autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $user->username) }}"  autofocus>
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

