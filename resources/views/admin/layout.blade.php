<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; }
        .sidebar { min-height: 100vh; background-color: #343a40; color: white; }
        .sidebar a { color: #c2c7d0; text-decoration: none; padding: 10px 15px; display: block; border-radius: 4px; margin-bottom: 5px; }
        .sidebar a:hover, .sidebar a.active { background-color: #007bff; color: white; }
        .content { padding: 20px; }
        .card { box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2); margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar p-3" style="width: 250px;">
            <h4 class="text-center mb-4 text-white">Admin Panel</h4>
            
            <div class="mb-3 text-center text-muted small">Logged in as: {{ Auth::user()->name ?? 'Admin' }}</div>
            
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('admin.landing-pages.index') }}" class="{{ request()->routeIs('admin.landing-pages.*') ? 'active' : '' }}">Landing Pages</a>
            <a href="{{ route('admin.orders.index') }}" class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">Orders</a>
            <a href="{{ route('admin.customers.index') }}" class="{{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">Customers</a>
            <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">Users (Admins)</a>
            
            <a href="/" target="_blank" class="mt-4 bg-success text-white text-center">Visit Site</a>
            
            <form action="{{ route('logout') }}" method="POST" class="mt-2">
                @csrf
                <button type="submit" class="btn btn-danger w-100">Logout</button>
            </form>
        </div>
        
        <div class="content flex-grow-1">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
