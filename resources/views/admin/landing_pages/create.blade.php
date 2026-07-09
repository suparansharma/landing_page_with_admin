@extends('admin.layout')

@section('content')
<div class="mb-4">
    <h2>Create Landing Page</h2>
    <a href="{{ route('admin.landing-pages.index') }}" class="btn btn-secondary btn-sm">Back</a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.landing-pages.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>URL Slug (e.g. ilish-achar)</label>
                    <input type="text" name="slug" class="form-control" required value="{{ old('slug') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Page Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', 'ইলিশ আচার - স্বাদ কি জানো') }}">
                </div>
            </div>

            <div class="mb-3">
                <label>Subtitle</label>
                <textarea name="subtitle" class="form-control" rows="2">{{ old('subtitle', 'ইলিশ মাছের টুকরো দিয়ে বানানো আচার, খেতে দারুণ স্বাদ, খিচুড়ি বা গরম ভাতের সাথে খেতে দারুণ লাগে') }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Phone Number (e.g. 01854-472049)</label>
                    <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', '01854-472049') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Features (One per line)</label>
                    <textarea name="features" class="form-control" rows="4">{{ old('features', "খাঁটি পদ্মার ইলিশ দিয়ে তৈরি - অতুলনীয় স্বাদ ও ঘ্রাণ সম্পন্ন\nকেমিক্যাল বা, ক্ষতিকারক প্রিজারভেটিভ মুক্ত শতভাগ ফ্রেশ দেশীয় মশলায়\nরোদে শুকানো খাঁটি সরিষার তেলে তৈরি, তাই দীর্ঘদিন সংরক্ষণ করা যায়\nনিজস্ব খামার ও কারখানায় অভিজ্ঞ কারিগর দ্বারা প্রস্তুত\nক্যাশ অন ডেলিভারি - পণ্য হাতে পেয়ে টাকা দিন") }}</textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Main Image</label>
                    <input type="file" name="main_image" class="form-control" accept="image/*">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Secondary Image</label>
                    <input type="file" name="secondary_image" class="form-control" accept="image/*">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Premium Text</label>
                    <input type="text" name="premium_text" class="form-control" value="{{ old('premium_text', 'প্রিমিয়াম কোয়ালিটি - স্বাদে গন্ধে অতুলনীয়') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Weight Text</label>
                    <input type="text" name="weight_text" class="form-control" value="{{ old('weight_text', '২০০ গ্রাম ইলিশ মাছের আচার') }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Old Price (e.g. 450)</label>
                    <input type="text" name="old_price" class="form-control" value="{{ old('old_price', '৪৫০ টাকা') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Current Price (e.g. 350)</label>
                    <input type="text" name="current_price" class="form-control" value="{{ old('current_price', '৩৫০') }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Delivery Text</label>
                    <input type="text" name="delivery_text" class="form-control" value="{{ old('delivery_text', 'ডেলিভারি চার্জ ১০০ টাকা যোগ হবে') }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Guarantee Text</label>
                    <input type="text" name="guarantee_text" class="form-control" value="{{ old('guarantee_text', 'বাংলাদেশের সেরা কোয়ালিটি এবং সেরা মূল্য গ্যারান্টি ।') }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Alert Text</label>
                    <input type="text" name="alert_text" class="form-control" value="{{ old('alert_text', 'যেকোনো জিজ্ঞাসায় কল করুন বা হোয়াটসঅ্যাপ করুন') }}">
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
                                <!-- Dynamic options rows will be added here -->
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
                            <input type="text" name="meta_pixel_id" class="form-control" placeholder="e.g. 123456789012345" value="{{ old('meta_pixel_id') }}">
                            <small class="text-muted">Enter Facebook/Meta Pixel ID only (not the whole code snippet).</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Google Tag Manager (GTM) Container ID</label>
                            <input type="text" name="gtm_id" class="form-control" placeholder="e.g. GTM-XXXXXX" value="{{ old('gtm_id') }}">
                            <small class="text-muted">Enter Google Tag Manager container ID.</small>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Google Analytics 4 (GA4) Measurement ID</label>
                            <input type="text" name="ga4_id" class="form-control" placeholder="e.g. G-XXXXXXXXXX" value="{{ old('ga4_id') }}">
                            <small class="text-muted">Enter GA4 measurement ID.</small>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Google Ads Conversion ID</label>
                            <input type="text" name="google_ads_id" class="form-control" placeholder="e.g. AW-XXXXXXXXXX" value="{{ old('google_ads_id') }}">
                            <small class="text-muted">Enter Google Ads conversion ID (AW-...).</small>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Google Ads Conversion Label</label>
                            <input type="text" name="google_ads_label" class="form-control" placeholder="e.g. ConversionLabelString" value="{{ old('google_ads_label') }}">
                            <small class="text-muted">Enter Google Ads conversion label string.</small>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Save Landing Page</button>
        </form>
    </div>
</div>

<script>
    let optionIndex = 0;
    
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
