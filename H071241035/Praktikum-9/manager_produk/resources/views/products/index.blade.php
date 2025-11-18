@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="page-title mb-0">Products</h2>
            <p class="text-muted mb-0">Manage your product inventory</p>
        </div>
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Create Product
        </a>
    </div>

    @if($products->count() > 0)
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Updated At</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                <div class="fw-semibold">{{ $product->name }}</div>
                                <small class="text-muted">{{ $product->productDetail->size ?? 'N/A' }}</small>
                            </td>
                            <td>
                                @if($product->category)
                                    <span class="badge bg-primary">{{ $product->category->name }}</span>
                                @else
                                    <span class="text-muted fst-italic">No category</span>
                                @endif
                            </td>
                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>
                                @php
                                    $totalStock = $product->productsWarehouses->sum('quantity');
                                @endphp
                                <span class="badge {{ $totalStock > 10 ? 'bg-success' : ($totalStock > 0 ? 'bg-warning' : 'bg-danger') }}">
                                    {{ $totalStock }} in stock
                                </span>
                            </td>
                            <td>{{ $product->updated_at->format('M d, Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('products.show', $product) }}" class="btn btn-outline-primary btn-sm action-btn me-1" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-outline-warning btn-sm action-btn me-1" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger btn-sm action-btn" title="Delete" onclick="confirmDelete('{{ route('products.destroy', $product) }}', 'Delete Product', 'Are you sure you want to delete this product?')">
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
            <i class="bi bi-box text-muted fs-1 mb-3"></i>
            <h5 class="text-muted">No products found</h5>
            <p class="text-muted">Get started by creating a new product</p>
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Create Product
            </a>
        </div>
    </div>
    @endif
@endsection