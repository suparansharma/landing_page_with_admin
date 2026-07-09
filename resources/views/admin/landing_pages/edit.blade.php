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

            <div class="card mt-4 mb-4">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Product Options / Qualities (Optional)</h5>
                    <button type="button" class="btn btn-sm btn-success" id="add-option-btn">+ Add Option</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Option Name *</th>
                                    <th>Price (numeric) *</th>
                                    <th>Description (optional)</th>
                                    <th>Badge Text (optional)</th>
                                    <th style="width: 80px;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="options-container">
                                @if($landingPage->product_options && is_array($landingPage->product_options))
                                    @foreach($landingPage->product_options as $index => $option)
                                        <tr class="option-row" id="option-row-{{ $index }}">
                                            <td>
                                                <input type="text" name="product_options[{{ $index }}][name]" class="form-control form-control-sm" required value="{{ $option['name'] }}">
                                            </td>
                                            <td>
                                                <input type="number" name="product_options[{{ $index }}][price]" class="form-control form-control-sm" required value="{{ $option['price'] }}" min="0">
                                            </td>
                                            <td>
                                                <input type="text" name="product_options[{{ $index }}][description]" class="form-control form-control-sm" value="{{ $option['description'] ?? '' }}">
                                            </td>
                                            <td>
                                                <input type="text" name="product_options[{{ $index }}][badge]" class="form-control form-control-sm" value="{{ $option['badge'] ?? '' }}">
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-danger" onclick="removeOptionRow({{ $index }})">Remove</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <small class="text-muted">If product options are added, the customer will see these options and the price will change accordingly. If no options are added, the default Old Price and Current Price fields above will be used.</small>
                </div>
            </div>

            <div class="card mt-4 mb-4 shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Analytics & Tracking Codes (Meta Pixel, GTM, GA4, Google Ads)</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Meta Pixel ID (Facebook Pixel)</label>
                            <input type="text" name="meta_pixel_id" class="form-control" placeholder="e.g. 123456789012345" value="{{ old('meta_pixel_id', $landingPage->meta_pixel_id) }}">
                            <small class="text-muted">Enter Facebook/Meta Pixel ID only (not the whole code snippet).</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Google Tag Manager (GTM) Container ID</label>
                            <input type="text" name="gtm_id" class="form-control" placeholder="e.g. GTM-XXXXXX" value="{{ old('gtm_id', $landingPage->gtm_id) }}">
                            <small class="text-muted">Enter Google Tag Manager container ID.</small>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Google Analytics 4 (GA4) Measurement ID</label>
                            <input type="text" name="ga4_id" class="form-control" placeholder="e.g. G-XXXXXXXXXX" value="{{ old('ga4_id', $landingPage->ga4_id) }}">
                            <small class="text-muted">Enter GA4 measurement ID.</small>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Google Ads Conversion ID</label>
                            <input type="text" name="google_ads_id" class="form-control" placeholder="e.g. AW-XXXXXXXXXX" value="{{ old('google_ads_id', $landingPage->google_ads_id) }}">
                            <small class="text-muted">Enter Google Ads conversion ID (AW-...).</small>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Google Ads Conversion Label</label>
                            <input type="text" name="google_ads_label" class="form-control" placeholder="e.g. ConversionLabelString" value="{{ old('google_ads_label', $landingPage->google_ads_label) }}">
                            <small class="text-muted">Enter Google Ads conversion label string.</small>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Landing Page</button>
        </form>
    </div>
</div>

<script>
    let optionIndex = {{ $landingPage->product_options && is_array($landingPage->product_options) ? count($landingPage->product_options) : 0 }};
    
    document.getElementById('add-option-btn').addEventListener('click', function() {
        const container = document.getElementById('options-container');
        const html = `
            <tr class="option-row" id="option-row-${optionIndex}">
                <td>
                    <input type="text" name="product_options[${optionIndex}][name]" class="form-control form-control-sm" required placeholder="e.g. ইলিশের আচার ২০০ গ্রাম">
                </td>
                <td>
                    <input type="number" name="product_options[${optionIndex}][price]" class="form-control form-control-sm" required placeholder="e.g. 750" min="0">
                </td>
                <td>
                    <input type="text" name="product_options[${optionIndex}][description]" class="form-control form-control-sm" placeholder="e.g. ডেলিভারি চার্জ ১০০ টাকা যোগ হবে">
                </td>
                <td>
                    <input type="text" name="product_options[${optionIndex}][badge]" class="form-control form-control-sm" placeholder="e.g. চাহিদা বেশি">
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-danger" onclick="removeOptionRow(${optionIndex})">Remove</button>
                </td>
            </tr>
        `;
        container.insertAdjacentHTML('beforeend', html);
        optionIndex++;
    });

    function removeOptionRow(index) {
        const row = document.getElementById(`option-row-${index}`);
        if (row) {
            row.remove();
        }
    }
</script>
@endsection
