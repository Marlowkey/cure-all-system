@extends('layouts.guest')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div>
                <div class="login-box">
                    <div class="login-snip">
                        <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
                        <label for="tab-1" class="tab">Login</label>
                        <input id="tab-2" type="radio" name="tab" class="sign-up">
                        <label for="tab-2" class="tab">Sign Up</label>
                        <div class="login-space">
                            <!-- Login Form -->
                            <div class="login">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="group">
                                        <label for="email" class="label">Email</label>
                                        <input id="email" type="email"
                                            class="input @error('email') is-invalid @enderror" name="email"
                                            placeholder="Enter your email" value="{{ old('email') }}" required autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="group">
                                        <label for="password" class="label">Password</label>
                                        <input id="password" type="password"
                                            class="input @error('password') is-invalid @enderror" name="password" required
                                            placeholder="Enter your password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="group">
                                        <input id="remember" type="checkbox" class="check" name="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember"><span class="icon"></span> Keep me Signed in</label>
                                    </div>
                                    <div class="group">
                                        <button type="submit" class="button">Sign In</button>
                                    </div>
                                    <br>
                                    <div class="hr"></div>
                                    <div class="foot">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                                        @endif
                                    </div>
                                </form>
                            </div>
                            <!-- Sign Up Form -->
                            <div class="sign-up-form">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="group">
                                        <label for="username" class="label">Username</label>
                                        <input id="username" type="text"
                                            class="input @error('name') is-invalid @enderror" name="name"
                                            placeholder="Create your Username" value="{{ old('name') }}" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="group">
                                        <label for="email" class="label">Email</label>
                                        <input id="email" type="email"
                                            class="input @error('email') is-invalid @enderror" name="email"
                                            placeholder="Enter your Email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="group">
                                        <label for="password" class="label">Password</label>
                                        <input id="password" type="password"
                                            class="input @error('password') is-invalid @enderror" name="password"
                                            placeholder="Create your password" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="group">
                                        <label for="password-confirm" class="label">Repeat Password</label>
                                        <input id="password-confirm" type="password" class="input"
                                            name="password_confirmation" placeholder="Repeat your password" required>
                                    </div>
                                    <div class="group">
                                        <button type="submit" class="button">Sign Up</button>
                                    </div>
                                    <div class="hr"></div>
                                    <div class="foot">
                                        <label for="tab-1">Already Member?</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
