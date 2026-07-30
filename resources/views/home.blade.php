<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .product-card {
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
            color: inherit;
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Products</a>
            <div class="ms-auto text-white fw-bold d-flex align-items-center">
                @if($officeProfile && $officeProfile->logo)
                    <img src="{{ asset('storage/' . $officeProfile->logo) }}" alt="Logo" height="30" class="d-inline-block align-text-top me-2">
                @endif
                {{ $officeProfile->name ?? 'Our Company' }}
            </div>
        </div>
    </nav>

    <div class="container">
        <h2 class="text-center mb-4">Available Products</h2>
        
        <div class="row">
            @foreach($pages as $page)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('product.show', $page->slug) }}" class="card shadow-sm h-100 product-card d-block">
                        @if($page->main_image)
                            <img src="{{ asset('storage/' . $page->main_image) }}" class="card-img-top" alt="{{ $page->title }}">
                        @else
                            <img src="{{ asset('image/1.png') }}" class="card-img-top" alt="{{ $page->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $page->title }}</h5>
                            <p class="card-text text-muted small">{{ Str::limit($page->subtitle, 80) }}</p>
                            
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold text-danger fs-5">৳ {{ $page->current_price ?? '৩৫০' }}</span>
                                <span class="text-decoration-line-through text-muted small">৳ {{ $page->old_price ?? '৪৫০' }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            
            @if($pages->isEmpty())
                <div class="col-12 text-center py-5">
                    <p class="text-muted fs-4">No products available at the moment.</p>
                </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
