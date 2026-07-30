@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Orders</h2>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary btn-sm">Clear Filters</a>
</div>

<div class="card mb-4 shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.orders.index') }}" method="GET" class="row gx-2 gy-2 align-items-center">
            <div class="col-md-3">
                <input type="text" name="search" class="form-control" placeholder="Search ID, name or phone..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">All Statuses</option>
                    <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Confirm" {{ request('status') == 'Confirm' ? 'selected' : '' }}>Confirm</option>
                    <option value="Deliver" {{ request('status') == 'Deliver' ? 'selected' : '' }}>Deliver</option>
                    <option value="Success" {{ request('status') == 'Success' ? 'selected' : '' }}>Success</option>
                    <option value="Cancel" {{ request('status') == 'Cancel' ? 'selected' : '' }}>Cancel</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="date" name="date_from" class="form-control" title="From Date" value="{{ request('date_from') }}">
            </div>
            <div class="col-md-2">
                <input type="date" name="date_to" class="form-control" title="To Date" value="{{ request('date_to') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Landing Page</th>
                    <th>Customer</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('M d, Y h:i A') }}</td>
                    <td>
                        @if($order->landingPage)
                            <a href="{{ route('product.show', $order->landingPage->slug) }}" target="_blank">{{ $order->landingPage->title }}</a>
                        @else
                            N/A
                        @endif
                        @if($order->product_option)
                            <div class="small text-muted fw-semibold mt-1">Option: {{ $order->product_option }}</div>
                        @endif
                    </td>
                    <td>{{ $order->customer->name ?? 'N/A' }}</td>
                    <td>{{ $order->customer->phone ?? 'N/A' }}</td>
                    <td>{{ $order->customer->address ?? 'N/A' }}</td>
                    <td>৳ {{ number_format($order->total_amount, 2) }}</td>
                    <td>
                        <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="form-select form-select-sm fw-bold {{ $order->status == 'Pending' ? 'bg-warning text-dark' : ($order->status == 'Confirm' ? 'bg-primary text-white' : ($order->status == 'Deliver' ? 'bg-info text-dark' : ($order->status == 'Cancel' ? 'bg-danger text-white' : 'bg-success text-white'))) }}" onchange="this.form.submit()">
                                <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Confirm" {{ $order->status == 'Confirm' ? 'selected' : '' }}>Confirm</option>
                                <option value="Deliver" {{ $order->status == 'Deliver' ? 'selected' : '' }}>Deliver</option>
                                <option value="Success" {{ $order->status == 'Success' ? 'selected' : '' }}>Success</option>
                                <option value="Cancel" {{ $order->status == 'Cancel' ? 'selected' : '' }}>Cancel</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-info text-white" title="View">👁️</a>
                            <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-sm btn-primary" title="Edit">✏️</a>
                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this order?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">🗑️</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                @if($orders->isEmpty())
                <tr><td colspan="8" class="text-center py-4">No orders found.</td></tr>
                @endif
            </tbody>
        </table>
        
        <div class="mt-3 px-3">
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection
