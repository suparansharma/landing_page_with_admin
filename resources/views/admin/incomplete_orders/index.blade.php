@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Incomplete Orders</h2>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Page</th>
                        <th>Customer Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Started At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>
                            @if($order->landingPage)
                                <a href="{{ route('product.show', $order->landingPage->slug) }}" target="_blank">
                                    {{ $order->landingPage->title }}
                                </a>
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $order->name ?? 'N/A' }}</td>
                        <td>{{ $order->phone ?? 'N/A' }}</td>
                        <td>{{ $order->address ?? 'N/A' }}</td>
                        <td>{{ $order->created_at->format('d M Y, h:i A') }}</td>
                        <td>
                            <form action="{{ route('admin.incomplete-orders.destroy', $order->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this incomplete order?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No incomplete orders found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-3">
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection
