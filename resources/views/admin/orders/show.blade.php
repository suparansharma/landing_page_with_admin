@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Order #{{ $order->id }} Details</h2>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary btn-sm">Back to Orders</a>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Customer Information</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered mb-0">
                    <tr>
                        <th style="width: 150px;">Name</th>
                        <td>{{ $order->customer->name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $order->customer->phone ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $order->customer->address ?? 'N/A' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Order Information</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered mb-0">
                    <tr>
                        <th style="width: 150px;">Order Date</th>
                        <td>{{ $order->created_at->format('M d, Y h:i A') }}</td>
                    </tr>
                    <tr>
                        <th>Landing Page</th>
                        <td>
                            @if($order->landingPage)
                                <a href="{{ route('product.show', $order->landingPage->slug) }}" target="_blank">{{ $order->landingPage->title }}</a>
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <span class="badge {{ $order->status == 'Pending' ? 'bg-warning text-dark' : ($order->status == 'Confirm' ? 'bg-primary text-white' : ($order->status == 'Deliver' ? 'bg-info text-dark' : ($order->status == 'Cancel' ? 'bg-danger text-white' : 'bg-success text-white'))) }} fs-6">
                                {{ $order->status }}
                            </span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">Payment & Product Details</h5>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>Product Option</th>
                    <th class="text-end">Product Cost</th>
                    <th class="text-end">Shipping Area</th>
                    <th class="text-end">Shipping Cost</th>
                    <th class="text-end">Total Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->product_option ?? 'N/A' }}</td>
                    <td class="text-end">৳ {{ number_format($order->product_cost, 2) }}</td>
                    <td class="text-end">{{ $order->shipping_area ?? 'Flat Shipping' }}</td>
                    <td class="text-end">৳ {{ number_format($order->shipping_cost, 2) }}</td>
                    <td class="text-end fw-bold">৳ {{ number_format($order->total_amount, 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
