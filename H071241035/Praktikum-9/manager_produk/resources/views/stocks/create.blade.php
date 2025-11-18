@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="page-title mb-0">Transfer Stock</h2>
            <p class="text-muted mb-0">Move stock between warehouses</p>
        </div>
        <a href="{{ route('stocks.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Back to Stock List
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('stocks.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="warehouse_id" class="form-label fw-semibold">Warehouse <span class="text-danger">*</span></label>
                                    <select class="form-select form-select-lg" id="warehouse_id" name="warehouse_id" required>
                                        <option value="">Select Warehouse</option>
                                        @foreach($warehouses as $warehouse)
                                        <option value="{{ $warehouse->id }}">{{ $warehouse->name }} - {{ $warehouse->location ?? 'No location' }}</option>
                                        @endforeach
                                    </select>
                                    @error('warehouse_id')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-4">
                                    <label for="product_id" class="form-label fw-semibold">Product <span class="text-danger">*</span></label>
                                    <select class="form-select form-select-lg" id="product_id" name="product_id" required>
                                        <option value="">Select Product</option>
                                        @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }} ({{ $product->category ? $product->category->name : 'No category' }})</option>
                                        @endforeach
                                    </select>
                                    @error('product_id')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="quantity_change" class="form-label fw-semibold">Quantity Change <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control form-control-lg" id="quantity_change" name="quantity_change" value="{{ old('quantity_change') }}" required placeholder="Enter quantity to add/remove">
                                    @error('quantity_change')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text mt-2">
                                        <ul class="mb-0">
                                            <li>Enter positive number to add stock</li>
                                            <li>Enter negative number to remove stock</li>
                                            <li>Stock cannot go below zero</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('stocks.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-arrow-repeat me-2"></i>Transfer Stock
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection