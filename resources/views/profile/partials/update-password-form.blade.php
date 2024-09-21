<div class="container mt-2">
    <div class="outer-container">
        <div class="row row-space justify-content-center">
            <!-- Password Update Container -->
            <div class="col-md-5 bordered-container">
                <h2 class="text-black">Update Password</h2>
                <div class="mb-3">
                    <p>{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
                </div>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input id="current_password" type="password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" name="current_password" required autocomplete="current-password">
                        @error('current_password', 'updatePassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input id="password" type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password', 'updatePassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" type="password" class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror" name="password_confirmation" required>
                        @error('password_confirmation', 'updatePassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-buttons text-center mt-3">
                        <button type="submit" class="btn btn-success">Save</button>
                        @if (session('status') === 'password-updated')
                            <span class="m-1 text-success">{{ __('Saved.') }}</span>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
