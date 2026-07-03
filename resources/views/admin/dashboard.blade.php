@extends('admin.layout')

@section('content')
<div class="mb-4">
    <h2>Dashboard Overview</h2>
    <p class="text-muted">Welcome back, {{ Auth::user()->name }}! Here's what's happening today.</p>
</div>

<h5 class="mb-3 text-secondary">Order Statuses</h5>
<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="card bg-warning text-dark h-100 shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-clock"></i> Pending</h5>
                <h2 class="mb-0">{{ $pendingOrders }}</h2>
                <small class="text-dark-50">Awaiting confirmation</small>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-3">
        <div class="card bg-primary text-white h-100 shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-check-circle"></i> Confirmed</h5>
                <h2 class="mb-0">{{ $confirmOrders }}</h2>
                <small class="text-white-50">Ready to deliver</small>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-3">
        <div class="card bg-info text-dark h-100 shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-truck"></i> Delivered</h5>
                <h2 class="mb-0">{{ $deliverOrders }}</h2>
                <small class="text-dark-50">On the way</small>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-3">
        <div class="card bg-success text-white h-100 shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-box-open"></i> Success</h5>
                <h2 class="mb-0">{{ $successOrders }}</h2>
                <small class="text-white-50">Completed orders</small>
            </div>
        </div>
    </div>
</div>

<h5 class="mb-3 text-secondary">Overall Statistics</h5>
<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="card bg-white h-100 shadow-sm border-left-success" style="border-left: 4px solid #198754;">
            <div class="card-body">
                <h5 class="card-title text-success">Total Revenue</h5>
                <h2 class="mb-0 text-dark">৳ {{ number_format($totalRevenue, 2) }}</h2>
                <small class="text-muted">From delivered & successful orders</small>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-3">
        <div class="card bg-white h-100 shadow-sm border-left-info" style="border-left: 4px solid #0dcaf0;">
            <div class="card-body">
                <h5 class="card-title text-info">Total Customers</h5>
                <h2 class="mb-0 text-dark">{{ $totalCustomers }}</h2>
                <small class="text-muted">Registered buyers</small>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-3">
        <div class="card bg-white h-100 shadow-sm border-left-primary" style="border-left: 4px solid #0d6efd;">
            <div class="card-body">
                <h5 class="card-title text-primary">Landing Pages</h5>
                <h2 class="mb-0 text-dark">{{ $totalLandingPages }}</h2>
                <small class="text-muted">Active product pages</small>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-3">
        <div class="card bg-white h-100 shadow-sm border-left-danger" style="border-left: 4px solid #dc3545;">
            <div class="card-body">
                <h5 class="card-title text-danger">Canceled</h5>
                <h2 class="mb-0 text-dark">{{ $cancelOrders }}</h2>
                <small class="text-muted">Canceled orders</small>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-white fw-bold">
        Recent Orders
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Phone</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentOrders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('M d, Y h:i A') }}</td>
                        <td>{{ $order->customer->name ?? 'N/A' }}</td>
                        <td>{{ $order->customer->phone ?? 'N/A' }}</td>
                        <td>৳ {{ number_format($order->total_amount, 2) }}</td>
                        <td>
                            @if($order->status == 'Success')
                                <span class="badge bg-success">Success</span>
                            @elseif($order->status == 'Confirm')
                                <span class="badge bg-primary">Confirm</span>
                            @elseif($order->status == 'Deliver')
                                <span class="badge bg-info text-dark">Deliver</span>
                            @elseif($order->status == 'Cancel')
                                <span class="badge bg-danger">Cancel</span>
                            @else
                                <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">No recent orders found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white text-end">
        <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-outline-primary">View All Orders</a>
    </div>
</div>
@endsection
