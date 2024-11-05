@extends('layouts.app')
@section('content')
@if (session('error'))
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="alert alert-danger text-center">
                    <h4>Error</h4>
                    <p>{{ session('error') }}</p>
                </div>
            </div>
        </div>
    </div>
@endif
    <div class="container mt-5 mb-5 p-2 ">
        <div class="row justify-content-center">
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">

                        <x-avatar :user_image="Auth::user()->user_image" />

                        <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="user_image">Update Profile Image</label>
                                <input type="file" id="user_image" name="user_image" class="form-control"
                                    accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-success mt-3">Upload</button>
                        </form>
                    </div>
                </div>
            </div>

            <div>
                <div>
                    @include('profile.partials.update-profile-information-form')
                </div>
                <div>
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
@endsection
