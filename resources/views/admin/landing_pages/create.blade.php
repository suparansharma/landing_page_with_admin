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

            <button type="submit" class="btn btn-success">Save Landing Page</button>
        </form>
    </div>
</div>
@endsection
