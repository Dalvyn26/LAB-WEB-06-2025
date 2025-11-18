@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="page-title mb-0">{{ $product->name }}</h2>
            <p class="text-muted mb-0">Product details</p>
        </div>
        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Back to List
        </a>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white border-0">
                    <h5 class="mb-0">Product Information</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-3 fw-semibold">ID:</div>
                        <div class="col-sm-9">{{ $product->id }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 fw-semibold">Name:</div>
                        <div class="col-sm-9">{{ $product->name }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 fw-semibold">Category:</div>
                        <div class="col-sm-9">
                            @if($product->category)
                                <span class="badge bg-primary">{{ $product->category->name }}</span>
                            @else
                                <span class="text-muted fst-italic">No category</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 fw-semibold">Price:</div>
                        <div class="col-sm-9">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 fw-semibold">Description:</div>
                        <div class="col-sm-9">{{ $product->productDetail->description ?? 'N/A' }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 fw-semibold">Weight:</div>
                        <div class="col-sm-9">{{ $product->productDetail->weight ?? 'N/A' }} kg</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 fw-semibold">Size:</div>
                        <div class="col-sm-9">{{ $product->productDetail->size ?? 'N/A' }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 fw-semibold">Updated At:</div>
                        <div class="col-sm-9">{{ $product->updated_at->format('M d, Y H:i:s') }}</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-white border-0">
                    <h5 class="mb-0">Actions</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">
                            <i class="bi bi-pencil me-2"></i> Edit Product
                        </a>
                        <button type="button" class="btn btn-danger w-100" onclick="confirmDelete('{{ route('products.destroy', $product) }}', 'Delete Product', 'Are you sure you want to delete this product?')">
                            <i class="bi bi-trash me-2"></i> Delete Product
                        </button>
                    </div>
                </div>
            
            <div class="card mt-4">
                <div class="card-header bg-white border-0">
                    <h5 class="mb-0">Warehouse Stock Levels</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @forelse($product->productsWarehouses as $pw)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="fw-semibold">{{ $pw->warehouse->name }}</div>
                                    <small class="text-muted">{{ $pw->warehouse->location ?? 'No location' }}</small>
                                </div>
                                <span class="badge bg-primary rounded-pill">{{ $pw->quantity }}</span>
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted">No stock in any warehouse</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection