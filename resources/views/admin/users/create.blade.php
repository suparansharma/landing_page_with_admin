@extends('admin.layout')

@section('content')
<div class="mb-4">
    <h2>Create New User</h2>
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-sm">Back</a>
</div>

<div class="card" style="max-width: 600px;">
    <div class="card-body">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            
            <div class="mb-3">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            
            <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-success">Create User</button>
        </form>
    </div>
</div>
@endsection
