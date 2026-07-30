@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Order #{{ $order->id }}</h2>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary btn-sm">Back to Orders</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <h5 class="mb-3 text-primary border-bottom pb-2">Customer Information</h5>
            <div class="row mb-4">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Customer Name</label>
                    <input type="text" name="customer_name" class="form-control" value="{{ old('customer_name', $order->customer->name ?? '') }}" required>
                    @error('customer_name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Customer Phone</label>
                    <input type="text" name="customer_phone" class="form-control" value="{{ old('customer_phone', $order->customer->phone ?? '') }}" required>
                    @error('customer_phone') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Customer Address</label>
                    <input type="text" name="customer_address" class="form-control" value="{{ old('customer_address', $order->customer->address ?? '') }}" required>
                    @error('customer_address') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <h5 class="mb-3 text-success border-bottom pb-2">Order Information</h5>
            <div class="row mb-4">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Product Option / Details</label>
                    <input type="text" name="product_option" class="form-control" value="{{ old('product_option', $order->product_option) }}">
                    @error('product_option') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="Pending" {{ old('status', $order->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Confirm" {{ old('status', $order->status) == 'Confirm' ? 'selected' : '' }}>Confirm</option>
                        <option value="Deliver" {{ old('status', $order->status) == 'Deliver' ? 'selected' : '' }}>Deliver</option>
                        <option value="Success" {{ old('status', $order->status) == 'Success' ? 'selected' : '' }}>Success</option>
                        <option value="Cancel" {{ old('status', $order->status) == 'Cancel' ? 'selected' : '' }}>Cancel</option>
                    </select>
                    @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Product Cost (৳)</label>
                    <input type="number" step="0.01" name="product_cost" class="form-control" value="{{ old('product_cost', $order->product_cost) }}" required>
                    @error('product_cost') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Shipping Cost (৳)</label>
                    <input type="number" step="0.01" name="shipping_cost" class="form-control" value="{{ old('shipping_cost', $order->shipping_cost) }}" required>
                    @error('shipping_cost') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary px-4">Update Order</button>
            </div>
        </form>
    </div>
</div>
@endsection
