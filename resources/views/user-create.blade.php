@extends('layouts.master')

@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-control-label">Nama:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                                required>
                            @error('name')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
    
                        <div>
                            <label for="email" class="form-control-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                                required>
                            @error('email')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
    
                        <div>
                            <label for="password" class="form-control-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            @error('password')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
    
                        <div>
                            <label for="password_confirmation" class="form-control-label">Konfirmasi Password:</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                required>
                        </div>
    
                        <div>
                            <label for="role" class="form-control-label">Role:</label>
                            <select id="role" class="form-control mb-3" name="role" required>
                                <option value="" disabled hidden selected>--- Select Role ---</option>
                                <option value="sm">Admin</option>
                                <option value="user">User</option>
                                <option value="supplier">Supplier</option>
                            </select>
                            @error('role')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
    
                        <button type="submit" class="btn btn-primary">Tambah User</button>
                    </form>
                </div>
            </div>
            </div>
    </div>
  @endsection
