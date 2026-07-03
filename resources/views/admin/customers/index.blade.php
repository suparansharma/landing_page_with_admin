@extends('admin.layout')

@section('content')
<div class="mb-4">
    <h2>Customers</h2>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Date Added</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
                @if($customers->isEmpty())
                <tr><td colspan="5" class="text-center py-4">No customers found.</td></tr>
                @endif
            </tbody>
        </table>
        
        <div class="mt-3 px-3">
            {{ $customers->links() }}
        </div>
    </div>
</div>
@endsection
