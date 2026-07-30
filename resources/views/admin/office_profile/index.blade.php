@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Office Profile</h2>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.office-profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Company Name *</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $profile->name) }}" required>
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Phone Number</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone', $profile->phone) }}">
                            @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Email Address</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $profile->email) }}">
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Office Address</label>
                        <textarea name="address" class="form-control" rows="3">{{ old('address', $profile->address) }}</textarea>
                        @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Facebook Link</label>
                            <input type="url" name="facebook" class="form-control" placeholder="https://facebook.com/..." value="{{ old('facebook', $profile->facebook) }}">
                            @error('facebook') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">YouTube Link</label>
                            <input type="url" name="youtube" class="form-control" placeholder="https://youtube.com/..." value="{{ old('youtube', $profile->youtube) }}">
                            @error('youtube') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3 text-center">
                        <label class="form-label fw-bold d-block">Company Logo</label>
                        
                        <div class="border rounded p-3 mb-3 d-flex justify-content-center align-items-center" style="min-height: 150px; background-color: #f8f9fa;">
                            @if($profile->logo)
                                <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo" class="img-fluid" style="max-height: 130px;">
                            @else
                                <span class="text-muted">No Logo Uploaded</span>
                            @endif
                        </div>
                        
                        <input type="file" name="logo" class="form-control" accept="image/*">
                        <small class="text-muted d-block mt-1">Recommended size: 200x50px. Max size: 2MB.</small>
                        @error('logo') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>

            <div class="text-end mt-4 border-top pt-3">
                <button type="submit" class="btn btn-primary px-4">Save Profile</button>
            </div>
        </form>
    </div>
</div>
@endsection
