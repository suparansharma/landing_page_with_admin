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
            transition: background-color 0.3s;
        }
        
        .btn-submit:hover {
            background-color: #ff8080;
        }
        
        .btn-submit.active {
            background-color: #dc3545; /* Dark red */
        }
        
        .btn-submit.active:hover {
            background-color: #c82333;
        }
        
        .footer {
            background-color: black;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 12px;
        }

        /* Product Options Styles */
        .options-section {
            padding: 20px 20px 0 20px;
            border-bottom: 1px solid #eee;
        }
        
        .options-title {
            color: #28a745;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: left;
        }

        .options-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .option-card {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 6px;
            display: flex;
            align-items: flex-start;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            background: white;
            transition: all 0.3s ease;
        }
        
        .option-card.active {
            border-color: #28a745;
            background-color: #f8fff8;
            box-shadow: 0 2px 8px rgba(40, 167, 69, 0.08);
        }
        
        .option-card input {
            margin-top: 5px;
            margin-right: 12px;
        }
        
        .option-card .ribbon {
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
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics / Google Ads -->
    @if($page->ga4_id || $page->google_ads_id)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $page->ga4_id ?? $page->google_ads_id }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            @if($page->ga4_id)
                gtag('config', '{{ $page->ga4_id }}');
            @endif

            @if($page->google_ads_id)
                gtag('config', '{{ $page->google_ads_id }}');
            @endif
        </script>
    @endif

    <!-- Meta Pixel Code -->
    @if($page->meta_pixel_id)
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '{{ $page->meta_pixel_id }}');
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id={{ $page->meta_pixel_id }}&ev=PageView&noscript=1"
        /></noscript>
    @endif

    <!-- Google Tag Manager -->
    @if($page->gtm_id)
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','{{ $page->gtm_id }}');</script>
    @endif
</head>
<body>
    @if($page->gtm_id)
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $page->gtm_id }}"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    @endif

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
        <form action="{{ route('product.order', $page->slug) }}" method="POST">
            @csrf

            @if($page->product_options && count($page->product_options) > 0)
            <div class="options-section">
                <h4 class="options-title">কোয়ালিটি বিবেচনা করে যেকোনো একটি অপশন সিলেক্ট করুন</h4>
                <div class="options-grid">
                    @foreach($page->product_options as $index => $option)
                    <label class="option-card @if($index === 0) active @endif">
                        @if(!empty($option['badge']))
                            <div class="ribbon">{{ $option['badge'] }}</div>
                        @endif
                        <input type="radio" name="product_option_index" value="{{ $index }}" @if($index === 0) checked @endif onchange="updateTotal()">
                        <div>
                            <b style="font-size: 15px; color: #333;">{{ $option['name'] }}</b>
                            <div style="font-size: 13px; color: #666; margin-top: 5px; line-height: 1.4;">{{ $option['description'] }}</div>
                            <div style="color: #dc3545; font-weight: bold; margin-top: 8px; font-size: 16px;">৳ {{ number_format($option['price']) }}</div>
                        </div>
                    </label>
                    @endforeach
                </div>
            </div>
            @endif

        <div class="checkout-body">
            <div class="checkout-left">
                <div class="section-title">Billing details</div>
                
                <div class="form-group">
                    <label>আপনার নাম লিখুন *</label>
                    <input type="text" name="name" required placeholder="আপনার নাম লিখুন">
                </div>
                
                <div class="form-group">
                    <label>মোবাইল নাম্বার লিখুন *</label>
                    <input type="tel" name="phone" required placeholder="মোবাইল নাম্বার লিখুন">
                </div>
                
                <div class="form-group">
                    <label>আপনার ঠিকানা লিখুন (গ্রাম, থানা, জেলা) *</label>
                    <input type="text" name="address" required placeholder="আপনার ঠিকানা লিখুন">
                </div>
                

                
                <div class="form-group" style="margin-top: 15px;">
                    <label style="margin-bottom: 2px;">Country / Region *</label>
                    <div style="font-weight: bold; color: #28a745; font-size: 14px;">Bangladesh</div>
                </div>
            </div>
            
            <div class="checkout-right">
                <div class="section-title">Your order</div>
                
                <div style="margin-bottom: 20px; padding: 15px; background: #fff9e6; border: 1px solid #ffc107; border-radius: 4px; font-size: 14px; text-align: left;">
                    <b>বিকাশ/নগদ পেমেন্ট করতে চাইলে এই নাম্বারে সেন্ড মানি করুন:</b>
                    <p style="color: #dc3545; font-weight: bold; margin-top: 5px; font-size: 16px; margin-bottom: 0;">{{ $page->phone_number ?? '01854-472049' }}</p>
                </div>
                
                <div class="order-summary">
                    <div class="summary-row" style="border-bottom: 1px solid #eee; padding-bottom: 8px; font-weight: bold;">
                        <span>Product</span>
                        <span>Quantity & Price</span>
                    </div>
                    <div class="summary-row" style="padding-top: 8px; align-items: center;">
                        <span style="color: #28a745; display: flex; align-items: center; gap: 10px;">
                            <span id="summary-product-name">{{ $page->weight_text ?? 'ইলিশ মাছের আচার (২০০ গ্রাম)' }}</span>
                        </span>
                        <div style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 4px; overflow: hidden; height: 28px;">
                            <button type="button" onclick="changeQty(-1)" style="border: none; background: #f8f9fa; padding: 0 10px; cursor: pointer; height: 100%; font-weight: bold; font-size: 16px;">-</button>
                            <input type="number" name="quantity" id="quantity" value="1" min="1" style="width: 40px; border: none; text-align: center; font-weight: bold; border-left: 1px solid #ddd; border-right: 1px solid #ddd; padding: 0; height: 100%; -moz-appearance: textfield;" onchange="updateTotal()" readonly>
                            <button type="button" onclick="changeQty(1)" style="border: none; background: #f8f9fa; padding: 0 10px; cursor: pointer; height: 100%; font-weight: bold; font-size: 16px;">+</button>
                        </div>
                    </div>
                    <div class="summary-row" style="padding-top: 8px;">
                        <span>Unit Price</span>
                        <span style="color: #28a745;" id="summary-product-price">৳ {{ $page->current_price ?? '৩৫০' }}</span>
                    </div>
                    <div class="summary-row" style="border-bottom: 1px solid #eee; padding-bottom: 8px;">
                        <span>Subtotal</span>
                        <span id="summary-subtotal">৳ {{ $page->current_price ?? '৩৫০' }}</span>
                    </div>
                    <div class="summary-row" style="padding-top: 8px;">
                        <span>Shipping</span>
                        <span id="shipping-cost">৳ ১০০</span>
                    </div>
                    <div class="summary-row total" style="border-top: 1px solid #ddd; padding-top: 10px; font-weight: bold; font-size: 16px;">
                        <span>Total</span>
                        <span id="total-cost">৳ ৪৫০</span>
                    </div>
                    
                    <div style="margin: 15px 0; padding: 15px; background: #f8f9fa; border: 1px solid #ddd; font-size: 13px; border-radius: 4px;">
                        ক্যাশ অন ডেলিভারি
                        <p style="color: #666; margin-top: 5px; margin-bottom: 0;">পণ্য হাতে পেয়ে পেমেন্ট করুন।</p>
                    </div>
                    
                    <button type="submit" class="btn-submit">🔒 Place Order ৳ <span id="btn-total">450</span></button>
                </div>
            </div>
        </div>
        </form>
    </div>

    <div class="footer">
        © 2024 Ilish Achar. All rights reserved.
    </div>

    <script>
        const productOptions = @json($page->product_options ?? []);

        function changeQty(change) {
            const qtyInput = document.getElementById('quantity');
            let currentVal = parseInt(qtyInput.value) || 1;
            let newVal = currentVal + change;
            if (newVal < 1) newVal = 1;
            qtyInput.value = newVal;
            updateTotal();
        }

        function checkFields() {
            const name = document.querySelector('input[name="name"]').value;
            const phone = document.querySelector('input[name="phone"]').value;
            const address = document.querySelector('input[name="address"]').value;
            const btn = document.querySelector('.btn-submit');
            if(name.trim() !== '' && phone.trim() !== '' && address.trim() !== '') {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.checkout-left input[required]');
            inputs.forEach(input => {
                input.addEventListener('input', checkFields);
            });
            // Initial check in case browser auto-fills
            checkFields();
        });

        function updateTotal() {
            let shippingCost = 100;
            
            function parseBnNum(str) {
                if (!str) return 0;
                const bnNumbers = {'০': '0', '১': '1', '২': '2', '৩': '3', '৪': '4', '৫': '5', '৬': '6', '৭': '7', '৮': '8', '৯': '9'};
                let enStr = str.toString().replace(/[০-৯]/g, match => bnNumbers[match]);
                return parseFloat(enStr.replace(/[^\d.-]/g, '')) || 0;
            }
            
            let productCost = 0;
            let productName = '';
            
            if (productOptions && productOptions.length > 0) {
                const optionRadios = document.getElementsByName('product_option_index');
                let selectedIndex = 0;
                for (let i = 0; i < optionRadios.length; i++) {
                    const parent = optionRadios[i].closest('.option-card');
                    if (optionRadios[i].checked) {
                        selectedIndex = i;
                        parent.classList.add('active');
                    } else {
                        parent.classList.remove('active');
                    }
                }
                const selectedOption = productOptions[selectedIndex];
                productCost = parseFloat(selectedOption.price);
                productName = selectedOption.name;
            } else {
                productCost = parseBnNum('{{ $page->current_price ?? "350" }}');
                productName = '{{ $page->weight_text ?? "ইলিশ মাছের আচার (২০০ গ্রাম)" }}';
            }
            
            let quantity = parseInt(document.getElementById('quantity').value) || 1;
            let totalProductCost = productCost * quantity;
            const total = totalProductCost + shippingCost;
            
            // Convert to Bengali numerals
            const bnShippingCost = convertToBn(shippingCost);
            const bnProductCost = convertToBn(productCost);
            const bnTotalProductCost = convertToBn(totalProductCost);
            const bnTotal = convertToBn(total);
            const bnQuantity = convertToBn(quantity);
            
            document.getElementById('shipping-cost').innerText = '৳ ' + bnShippingCost;
            document.getElementById('total-cost').innerText = '৳ ' + bnTotal;
            document.getElementById('btn-total').innerText = total;

            const summaryNameEl = document.getElementById('summary-product-name');
            const summaryPriceEl = document.getElementById('summary-product-price');
            const summarySubtotalEl = document.getElementById('summary-subtotal');
            
            if (summaryNameEl) {
                summaryNameEl.innerText = productName;
            }
            if (summaryPriceEl) {
                summaryPriceEl.innerText = '৳ ' + bnProductCost;
            }
            if (summarySubtotalEl) {
                summarySubtotalEl.innerText = '৳ ' + bnTotalProductCost;
            }
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

            // Track Facebook Pixel Purchase
            @if($page->meta_pixel_id)
                fbq('track', 'Purchase', {
                    value: {{ session('order_total') ?? 0 }},
                    currency: 'BDT'
                });
            @endif

            // Track GA4 Purchase
            @if($page->ga4_id)
                gtag('event', 'purchase', {
                    transaction_id: '{{ session('order_id') }}',
                    value: {{ session('order_total') ?? 0 }},
                    currency: 'BDT'
                });
            @endif

            // Track Google Ads Conversion
            @if($page->google_ads_id && $page->google_ads_label)
                gtag('event', 'conversion', {
                    'send_to': '{{ $page->google_ads_id }}/{{ $page->google_ads_label }}',
                    'value': {{ session('order_total') ?? 0 }},
                    'currency': 'BDT',
                    'transaction_id': '{{ session('order_id') }}'
                });
            @endif
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

        // Incomplete Order Tracking
        let incompleteOrderTimeout = null;
        let isSubmitting = false;

        function saveIncompleteOrder() {
            if (isSubmitting) return;

            const name = document.querySelector('input[name="name"]').value;
            const phone = document.querySelector('input[name="phone"]').value;
            const address = document.querySelector('input[name="address"]').value;
            
            // Only send if at least one field has some data
            if (name.trim() !== '' || phone.trim() !== '' || address.trim() !== '') {
                const token = document.querySelector('input[name="_token"]').value;
                
                fetch('{{ route("product.incomplete-order", $page->slug) }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify({
                        name: name,
                        phone: phone,
                        address: address
                    })
                }).catch(err => console.error('Incomplete order tracking failed', err));
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form[action="{{ route('product.order', $page->slug) }}"]');
            if (form) {
                form.addEventListener('submit', function() {
                    isSubmitting = true;
                    clearTimeout(incompleteOrderTimeout);
                });
            }

            const inputs = document.querySelectorAll('.checkout-left input[required]');
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    checkFields();
                    // Debounce tracking
                    clearTimeout(incompleteOrderTimeout);
                    incompleteOrderTimeout = setTimeout(saveIncompleteOrder, 1000);
                });
                
                input.addEventListener('blur', function() {
                    setTimeout(saveIncompleteOrder, 200);
                });
            });
            // Initial check in case browser auto-fills
            checkFields();
        });
    </script>
</body>
</html>
