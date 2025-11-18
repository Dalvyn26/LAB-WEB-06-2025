@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="page-title mb-0">{{ $warehouse->name }}</h2>
            <p class="text-muted mb-0">Warehouse details</p>
        </div>
        <a href="{{ route('warehouses.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Back to List
        </a>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white border-0">
                    <h5 class="mb-0">Warehouse Information</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-3 fw-semibold">ID:</div>
                        <div class="col-sm-9">{{ $warehouse->id }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 fw-semibold">Name:</div>
                        <div class="col-sm-9">{{ $warehouse->name }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 fw-semibold">Location:</div>
                        <div class="col-sm-9">{{ $warehouse->location ?? 'N/A' }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 fw-semibold">Updated At:</div>
                        <div class="col-sm-9">{{ $warehouse->updated_at->format('M d, Y H:i:s') }}</div>
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
                        <a href="{{ route('warehouses.edit', $warehouse) }}" class="btn btn-primary">
                            <i class="bi bi-pencil me-2"></i> Edit Warehouse
                        </a>
                        <button type="button" class="btn btn-danger w-100" onclick="confirmDelete('{{ route('warehouses.destroy', $warehouse) }}', 'Delete Warehouse', 'Are you sure you want to delete this warehouse?')">
                            <i class="bi bi-trash me-2"></i> Delete Warehouse
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="card mt-4">
                <div class="card-header bg-white border-0">
                    <h5 class="mb-0">Products in Warehouse</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @forelse($warehouse->productsWarehouses as $pw)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>{{ $pw->product->name }}</span>
                                <span class="badge bg-primary rounded-pill">{{ $pw->quantity }}</span>
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted">No products in this warehouse</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection