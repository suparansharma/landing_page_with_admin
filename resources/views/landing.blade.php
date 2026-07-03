<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page->title ?? 'ইলিশ আচার - স্বাদ কি জানো' }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'SolaimanLipi', Arial, sans-serif; background-color: #f8f9fa; }
        
        .header-section {
            background-color: #0b2e13; /* Dark green */
            color: white;
            text-align: center;
            padding: 30px 10px;
        }
        
        .header-title {
            color: #ffc107;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        
        .header-subtitle {
            font-size: 14px;
            margin-bottom: 20px;
            line-height: 1.5;
        }
        
        .btn-order {
            background-color: #ffc107;
            color: black;
            font-weight: bold;
            padding: 10px 30px;
            border: none;
            cursor: pointer;
            font-size: 18px;
            margin: 5px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            border-radius: 3px;
        }
        
        .btn-order i { margin-right: 5px; }
        
        .header-image-container {
            max-width: 500px;
            margin: 20px auto 0;
            border: 2px solid #0000ff;
            padding: 5px;
        }
        
        .header-image-container img {
            width: 100%;
            display: block;
        }
        
        .triangle-down {
            width: 0;
            height: 0;
            border-left: 50vw solid transparent;
            border-right: 50vw solid transparent;
            border-top: 60px solid #0b2e13;
            margin: 0 auto;
        }

        .main-content {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .features-box {
            border: 2px dashed #555;
            padding: 20px;
            margin: 30px 0;
            background: white;
            text-align: center;
        }
        
        .features-box h2 {
            font-size: 20px;
            margin-bottom: 20px;
            color: #222;
        }
        
        .features-list {
            list-style: none;
            text-align: left;
            max-width: 500px;
            margin: 0 auto;
        }
        
        .features-list li {
            margin-bottom: 10px;
            font-size: 15px;
            color: #333;
            position: relative;
            padding-left: 20px;
        }
        
        .features-list li::before {
            content: '■';
            color: #dc3545;
            position: absolute;
            left: 0;
            top: 2px;
            font-size: 10px;
        }

        .product-card {
            border: 2px dashed #dc3545;
            padding: 20px;
            margin: 20px 0;
            background: white;
            text-align: center;
        }
        
        .product-card img {
            max-width: 100%;
            width: 300px;
            margin: 0 auto 20px auto;
            display: block;
        }
        
        .premium-text {
            color: #28a745;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        
        .weight-text {
            color: #a71d2a;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        
        .price-strike {
            text-decoration: line-through;
            color: #333;
            font-size: 22px;
            margin-bottom: 10px;
        }
        
        .price-strike span { color: #dc3545; }
        
        .price-current {
            color: #a71d2a;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        
        .delivery-text {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 15px;
        }
        
        .guarantee-box {
            background-color: black;
            color: #ffc107;
            padding: 10px;
            font-weight: bold;
            font-size: 16px;
            margin-top: 20px;
        }
        
        .action-box {
            border: 1px solid #ffc107;
            padding: 20px;
            text-align: center;
            background: #fff9e6;
            margin-bottom: 30px;
        }

        .alert-section {
            background-color: #1a1a1a;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 14px;
        }
        
        .alert-title {
            color: #ffc107;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .alert-text { color: #ffc107; }

        .checkout-area {
            max-width: 800px;
            margin: 30px auto;
            background: white;
            border: 1px solid #ddd;
        }
        
        .checkout-header {
            text-align: center;
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
        
        .checkout-header h3 {
            color: #dc3545;
            font-size: 16px;
        }
        
        .checkout-body {
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }
        
        .checkout-left, .checkout-right {
            flex: 1;
            min-width: 300px;
        }
        
        .section-title {
            color: #28a745;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        
        .shipping-card {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }
        
        .shipping-card.active {
            border-color: #28a745;
            background-color: #f8fff8;
        }
        
        .shipping-card input {
            margin-right: 10px;
        }
        
        .shipping-card .ribbon {
            position: absolute;
            top: 12px;
            right: -28px;
            background: #dc3545;
            color: white;
            font-size: 10px;
            font-weight: bold;
            padding: 2px 30px;
            transform: rotate(45deg);
        }
        
        .form-group { margin-bottom: 15px; }
        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        .order-summary {
            margin-top: 30px;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 14px;
            color: #555;
        }
        
        .summary-row.total {
            font-weight: bold;
            font-size: 16px;
            color: #000;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        
        .btn-submit {
            background-color: #ff9999;
            color: white;
            width: 100%;
            padding: 15px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 15px;
        }
        
        .btn-submit:hover {
            background-color: #ff8080;
        }
        
        .footer {
            background-color: black;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 12px;
        }
    </style>
</head>
<body>

    <div class="header-section">
        <div class="header-title">{{ $page->title }}</div>
        <div class="header-subtitle">{{ $page->subtitle }}</div>
        
        <div>
            <a href="#checkout" class="btn-order">অর্ডার দিন</a>
            <a href="tel:{{ $page->phone_number }}" class="btn-order">📞 {{ $page->phone_number }}</a>
        </div>
        
        <div class="header-image-container">
            @if($page->main_image)
            <img src="{{ asset('storage/' . $page->main_image) }}" alt="Product Image">
            @else
            <img src="{{ asset('image/1.png') }}" alt="Ilish Achar">
            @endif
        </div>
    </div>
    
    <div class="triangle-down"></div>

    <div class="main-content">
        <div class="features-box">
            <h2>কেন সেরা আমাদের এই ইলিশ আচার?</h2>
            <ul class="features-list">
                @php $features = json_decode($page->features, true) ?? []; @endphp
                @foreach($features as $feature)
                    <li>{{ $feature }}</li>
                @endforeach
                @if(empty($features))
                <li>খাঁটি পদ্মার ইলিশ দিয়ে তৈরি - অতুলনীয় স্বাদ ও ঘ্রাণ সম্পন্ন</li>
                <li>কেমিক্যাল বা, ক্ষতিকারক প্রিজারভেটিভ মুক্ত শতভাগ ফ্রেশ দেশীয় মশলায়</li>
                <li>রোদে শুকানো খাঁটি সরিষার তেলে তৈরি, তাই দীর্ঘদিন সংরক্ষণ করা যায়</li>
                <li>নিজস্ব খামার ও কারখানায় অভিজ্ঞ কারিগর দ্বারা প্রস্তুত</li>
                <li>ক্যাশ অন ডেলিভারি - পণ্য হাতে পেয়ে টাকা দিন</li>
                @endif
            </ul>
        </div>
        
        <div class="product-card">
            @if($page->secondary_image)
            <img src="{{ asset('storage/' . $page->secondary_image) }}" alt="Product Image 2">
            @else
            <img src="{{ asset('image/2.png') }}" alt="Ilish Achar with rice">
            @endif
            
            <div class="premium-text">{{ $page->premium_text ?? 'প্রিমিয়াম কোয়ালিটি - স্বাদে গন্ধে অতুলনীয়' }}</div>
            <div class="weight-text">{{ $page->weight_text ?? '২০০ গ্রাম ইলিশ মাছের আচার' }}</div>
            
            <div class="price-strike"><span>{{ $page->old_price ?? '৪৫০ টাকা' }}</span></div>
            <div class="price-current">ইলিশের আচার - {{ $page->current_price ?? '৩৫০' }} টাকা</div>
            
            <div class="delivery-text">{{ $page->delivery_text ?? 'ডেলিভারি চার্জ ১০০ টাকা যোগ হবে' }}</div>
            
            <div class="guarantee-box">{{ $page->guarantee_text ?? 'বাংলাদেশের সেরা কোয়ালিটি এবং সেরা মূল্য গ্যারান্টি ।' }}</div>
        </div>
        
        <div class="action-box">
            <a href="#checkout" class="btn-order">অর্ডার দিন</a>
            <a href="tel:{{ $page->phone_number ?? '01854-472049' }}" class="btn-order">📞 {{ $page->phone_number ?? '01854-472049' }}</a>
        </div>
    </div>

    <div class="alert-section">
        <div class="alert-title">⚠️ Important ⚠️</div>
        <div class="alert-text">{{ $page->alert_text ?? 'যেকোনো জিজ্ঞাসায় কল করুন বা হোয়াটসঅ্যাপ করুন: +8801854-472049' }}</div>
    </div>

    <div class="checkout-area" id="checkout">
        <div class="checkout-header">
            <h3>"অর্ডার করতে ফর্মটি পূরণ করে নিচে Order place বাটনে ক্লিক করুন"</h3>


        </div>
        <form action="{{ route('landing.order', $page->slug) }}" method="POST">
            @csrf
        <div class="checkout-body">
            <div class="checkout-left">
                <div class="section-title">বিকাশ/নগদ পেমেন্ট করতে চাইলে এই নাম্বারে সেন্ড মানি করুন</div>
                
                <label class="shipping-card">
                    <div>
                        <input type="radio" name="shipping" value="60" checked onchange="updateTotal()">
                        <b>ঢাকার ভিতরে ডেলিভারি</b>
                        <div style="font-size: 12px; color: #666; margin-top: 5px;">ঢাকা শহরের মধ্যে হোম ডেলিভারি - ডেলিভারি চার্জ ৬০ টাকা</div>
                        <div style="color: #dc3545; font-weight: bold; margin-top: 5px;">৳ ৬০</div>
                    </div>
                </label>
                
                <label class="shipping-card">
                    <div class="ribbon">জনপ্রিয়</div>
                    <div>
                        <input type="radio" name="shipping" value="100" onchange="updateTotal()">
                        <b>ঢাকার বাইরে ডেলিভারি</b>
                        <div style="font-size: 12px; color: #666; margin-top: 5px;">ঢাকার বাইরে যেকোনো স্থানে হোম ডেলিভারি - ডেলিভারি চার্জ ১০০ টাকা</div>
                        <div style="color: #dc3545; font-weight: bold; margin-top: 5px;">৳ ১০০</div>
                    </div>
                </label>
            </div>
            
            <div class="checkout-right">
                <div class="section-title">Billing details</div>
                
                <div class="form-group">
                        <label>আপনার নাম *</label>
                        <input type="text" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label>মোবাইল নাম্বার *</label>
                        <input type="tel" name="phone" required>
                    </div>
                    
                    <div class="form-group">
                        <label>আপনার ঠিকানা *</label>
                        <input type="text" name="address" required>
                    </div>
                    
                    <div class="order-summary">
                        <div class="summary-row">
                            <span>Product</span>
                            <span>Subtotal</span>
                        </div>
                        <div class="summary-row">
                            <span style="color: #28a745;">{{ $page->weight_text ?? 'ইলিশ মাছের আচার (২০০ গ্রাম)' }} x 1</span>
                            <span style="color: #28a745;">৳ {{ $page->current_price ?? '৩৫০' }}</span>
                        </div>
                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span>৳ {{ $page->current_price ?? '৩৫০' }}</span>
                        </div>
                        <div class="summary-row">
                            <span>Shipping</span>
                            <span id="shipping-cost">৳ ৬০</span>
                        </div>
                        <div class="summary-row total">
                            <span>Total</span>
                            <span id="total-cost">৳ ৪১০</span>
                        </div>
                        
                        <div style="margin: 15px 0; padding: 15px; background: #f8f9fa; border: 1px solid #ddd; font-size: 13px;">
                            ক্যাশ অন ডেলিভারি
                            <p style="color: #666; margin-top: 5px;">পণ্য হাতে পেয়ে পেমেন্ট করুন।</p>
                        </div>
                        
                        <button type="submit" class="btn-submit">🔒 Place Order ৳ <span id="btn-total">410</span></button>
                    </div>
            </div>
        </div>
        </form>
    </div>

    <div class="footer">
        © 2024 Ilish Achar. All rights reserved.
    </div>

    <script>
        function updateTotal() {
            const shippingOptions = document.getElementsByName('shipping');
            let shippingCost = 60;
            
            for (let i = 0; i < shippingOptions.length; i++) {
                const parent = shippingOptions[i].closest('.shipping-card');
                if (shippingOptions[i].checked) {
                    shippingCost = parseInt(shippingOptions[i].value);
                    parent.classList.add('active');
                } else {
                    parent.classList.remove('active');
                }
            }
            
            function parseBnNum(str) {
                if (!str) return 0;
                const bnNumbers = {'০': '0', '১': '1', '২': '2', '৩': '3', '৪': '4', '৫': '5', '৬': '6', '৭': '7', '৮': '8', '৯': '9'};
                let enStr = str.toString().replace(/[০-৯]/g, match => bnNumbers[match]);
                return parseFloat(enStr.replace(/[^\d.-]/g, '')) || 0;
            }
            
            const productCost = parseBnNum('{{ $page->current_price ?? "350" }}');
            const total = productCost + shippingCost;
            
            // Convert to Bengali numerals
            const bnShippingCost = convertToBn(shippingCost);
            const bnTotal = convertToBn(total);
            
            document.getElementById('shipping-cost').innerText = '৳ ' + bnShippingCost;
            document.getElementById('total-cost').innerText = '৳ ' + bnTotal;
            document.getElementById('btn-total').innerText = total;
        }
        
        function convertToBn(num) {
            const bnNumbers = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
            return num.toString().split('').map(digit => bnNumbers[digit]).join('');
        }
        
        // Initialize
        updateTotal();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session('success'))
            Swal.fire({
                title: 'অভিনন্দন!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'ঠিক আছে',
                confirmButtonColor: '#28a745'
            });
        @endif
        
        @if($errors->any())
            Swal.fire({
                title: 'দুঃখিত!',
                html: '<ul style="text-align:left;">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
                icon: 'error',
                confirmButtonText: 'ঠিক আছে',
                confirmButtonColor: '#dc3545'
            });
        @endif
    </script>
</body>
</html>
