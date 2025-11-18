@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="page-title mb-0">Create Product</h2>
            <p class="text-muted mb-0">Add a new product to your inventory</p>
        </div>
        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Back to List
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="name" class="form-label fw-semibold">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ old('name') }}" required placeholder="Enter product name">
                                    @error('name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-4">
                                    <label for="price" class="form-label fw-semibold">Price (Rp) <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" class="form-control form-control-lg" id="price" name="price" value="{{ old('price') }}" required placeholder="Enter product price">
                                    @error('price')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-4">
                                    <label for="category_id" class="form-label fw-semibold">Category</label>
                                    <select class="form-select form-select-lg" id="category_id" name="category_id">
                                        <option value="">Select Category (Optional)</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="description" class="form-label fw-semibold">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter product description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-4">
                                    <label for="weight" class="form-label fw-semibold">Weight (kg) <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" class="form-control form-control-lg" id="weight" name="weight" value="{{ old('weight') }}" required placeholder="Enter product weight in kg">
                                    @error('weight')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-4">
                                    <label for="size" class="form-label fw-semibold">Size</label>
                                    <input type="text" class="form-control form-control-lg" id="size" name="size" value="{{ old('size') }}" placeholder="Enter product size (e.g. 15 inch, L, 200gr)">
                                    @error('size')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-2"></i>Create Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection