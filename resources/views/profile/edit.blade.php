@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-5 p-2 ">

    <div class="row justify-content-center">
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <img src="{{ Auth::user()->user_image ?  asset('storage/' . Auth::user()->user_image) : 'https://mdbcdn.b-cdn.net/img/new/avatars/2.webp' }}"
                         class="rounded-circle mb-3"
                         style="width: 215px;"
                         alt="Avatar" />

                    <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="user_image">Update Profile Image</label>
                            <input type="file" id="user_image" name="user_image" class="form-control" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Upload</button>
                    </form>
                </div>
            </div>
        </div>

        <div>
            <div >
                @include('profile.partials.update-profile-information-form')
            </div>
            <div>
                @include('profile.partials.update-password-form')
            </div>
        </div>
    </div>
</div>
@endsection
