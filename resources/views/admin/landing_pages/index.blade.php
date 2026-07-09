@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Landing Pages</h2>
    <a href="{{ route('admin.landing-pages.create') }}" class="btn btn-primary">Create New</a>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Slug</th>
                    <th>Title</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                <tr>
                    <td>{{ $page->id }}</td>
                    <td>{{ $page->slug }}</td>
                    <td>{{ $page->title }}</td>
                    <td>{{ $page->created_at->format('M d, Y') }}</td>
                    <td>
                        <a href="{{ route('product.show', $page->slug) }}" target="_blank" class="btn btn-sm btn-success">View</a>
                        <a href="{{ route('admin.landing-pages.edit', $page->id) }}" class="btn btn-sm btn-info text-white">Edit</a>
                        <form action="{{ route('admin.landing-pages.destroy', $page->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if($pages->isEmpty())
                <tr><td colspan="5" class="text-center py-4">No landing pages found.</td></tr>
                @endif
            </tbody>
        </table>
        
        <div class="mt-3 px-3">
            {{ $pages->links() }}
        </div>
    </div>
</div>
@endsection
