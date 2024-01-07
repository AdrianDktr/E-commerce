@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: white;">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    @endif

                    <form action="{{ route('edit_profile') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="text-center">
                            <img src="{{ asset('assets/profile_picture/' . $user->profile_picture) }}" class="rounded img-fluid" alt="User Profile Picture" style="max-width: 200px; max-height: 200px;">
                        </div>

                        <div class="form-group">
                            <label>Profile Picture</label>
                            <input type="file" class="form-control" name="profile_picture" placeholder="Profile Picture" >
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $user->name }}">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Role</label>
                            <input type="role" class="form-control" name="role" placeholder="Role" value="{{ $user->is_admin? 'Admin' : 'member' }}">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" >
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Password Confirmation</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation" >
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary mt-3">Change Profile Detail</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
