@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="page-title mb-0">Categories</h2>
            <p class="text-muted mb-0">Manage product categories</p>
        </div>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Create Category
        </a>
    </div>

    @if($categories->count() > 0)
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Products</th>
                            <th>Updated At</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>
                                <div class="fw-semibold">{{ $category->name }}</div>
                            </td>
                            <td>
                                @if($category->description)
                                    <span class="text-muted">{{ Str::limit($category->description, 50) }}</span>
                                @else
                                    <span class="text-muted fst-italic">No description</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-light text-dark">{{ $category->products->count() }} products</span>
                            </td>
                            <td>{{ $category->updated_at->format('M d, Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('categories.show', $category) }}" class="btn btn-outline-primary btn-sm action-btn me-1" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('categories.edit', $category) }}" class="btn btn-outline-warning btn-sm action-btn me-1" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger btn-sm action-btn" title="Delete" onclick="confirmDelete('{{ route('categories.destroy', $category) }}', 'Delete Category', 'Are you sure you want to delete this category?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
    <div class="card text-center py-5">
        <div class="card-body">
            <i class="bi bi-tags text-muted fs-1 mb-3"></i>
            <h5 class="text-muted">No categories found</h5>
            <p class="text-muted">Get started by creating a new category</p>
            <a href="{{ route('categories.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Create Category
            </a>
        </div>
    </div>
    @endif
@endsection