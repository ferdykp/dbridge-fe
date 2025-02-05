@extends('layouts.master')

@section('content')
    <div class="main-content position-relative max-height-vh-100 h-100">
        <div class="card shadow-lg mx-4 card-profile-bottom">
            <div class="card-body p-3">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="../assets/img/profile.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ auth()->user()->name }}
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                {{ str_replace('_', ' ', auth()->user()->role) ?? 'Marketing Administrator' }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            @if (Auth::user()->role == 'sm')
                                <div class="d-flex align-items-center">
                                    <p class="mb-0">Edit Profile</p>
                                    <a href="{{ route('users.index', 1) }}" class="btn btn-primary btn-sm ms-auto">Manage
                                        All
                                        Accounts</a>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">User Information</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="username" class="form-control-label">Username</label>
                                        <p class="form-control-plaintext">{{ auth()->user()->name }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email" class="form-control-label">Email address</label>
                                        <p class="form-control-plaintext">{{ auth()->user()->email }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="role" class="form-control-label">Role</label>
                                        <p class="form-control-plaintext">{{ auth()->user()->role }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
