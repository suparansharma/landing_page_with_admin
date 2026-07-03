@extends('admin.layout')

@section('content')
<div class="mb-4">
    <h2>Edit User: {{ $user->name }}</h2>
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-sm">Back</a>
</div>

<div class="card" style="max-width: 600px;">
    <div class="card-body">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name', $user->name) }}">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            
            <div class="mb-3">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" required value="{{ old('email', $user->email) }}">
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            
            <div class="mb-3 border-top pt-3 mt-4">
                <label class="text-muted">Leave password blank if you do not want to change it.</label>
            </div>

            <div class="mb-3">
                <label>New Password</label>
                <input type="password" name="password" class="form-control">
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            
            <div class="mb-3">
                <label>Confirm New Password</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>
</div>
@endsection
