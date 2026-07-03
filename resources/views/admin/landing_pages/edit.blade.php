@extends('admin.layout')

@section('content')
<div class="mb-4">
    <h2>Edit Landing Page</h2>
    <a href="{{ route('admin.landing-pages.index') }}" class="btn btn-secondary btn-sm">Back</a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.landing-pages.update', $landingPage->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>URL Slug</label>
                    <input type="text" name="slug" class="form-control" required value="{{ old('slug', $landingPage->slug) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Page Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $landingPage->title) }}">
                </div>
            </div>

            <div class="mb-3">
                <label>Subtitle</label>
                <textarea name="subtitle" class="form-control" rows="2">{{ old('subtitle', $landingPage->subtitle) }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $landingPage->phone_number) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Features (One per line)</label>
                    @php
                        $features = json_decode($landingPage->features, true) ?? [];
                    @endphp
                    <textarea name="features" class="form-control" rows="4">{{ old('features', implode("\n", $features)) }}</textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Main Image</label>
                    <input type="file" name="main_image" class="form-control" accept="image/*">
                    @if($landingPage->main_image)
                        <img src="{{ asset('storage/' . $landingPage->main_image) }}" height="50" class="mt-2">
                    @endif
                </div>
                <div class="col-md-6 mb-3">
                    <label>Secondary Image</label>
                    <input type="file" name="secondary_image" class="form-control" accept="image/*">
                    @if($landingPage->secondary_image)
                        <img src="{{ asset('storage/' . $landingPage->secondary_image) }}" height="50" class="mt-2">
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Premium Text</label>
                    <input type="text" name="premium_text" class="form-control" value="{{ old('premium_text', $landingPage->premium_text) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Weight Text</label>
                    <input type="text" name="weight_text" class="form-control" value="{{ old('weight_text', $landingPage->weight_text) }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Old Price</label>
                    <input type="text" name="old_price" class="form-control" value="{{ old('old_price', $landingPage->old_price) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Current Price</label>
                    <input type="text" name="current_price" class="form-control" value="{{ old('current_price', $landingPage->current_price) }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Delivery Text</label>
                    <input type="text" name="delivery_text" class="form-control" value="{{ old('delivery_text', $landingPage->delivery_text) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Guarantee Text</label>
                    <input type="text" name="guarantee_text" class="form-control" value="{{ old('guarantee_text', $landingPage->guarantee_text) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Alert Text</label>
                    <input type="text" name="alert_text" class="form-control" value="{{ old('alert_text', $landingPage->alert_text) }}">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Landing Page</button>
        </form>
    </div>
</div>
@endsection
