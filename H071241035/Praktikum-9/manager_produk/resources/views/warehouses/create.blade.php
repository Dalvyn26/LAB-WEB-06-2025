@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="page-title mb-0">Create Warehouse</h2>
            <p class="text-muted mb-0">Add a new warehouse location</p>
        </div>
        <a href="{{ route('warehouses.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Back to List
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('warehouses.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">Warehouse Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ old('name') }}" required placeholder="Enter warehouse name">
                            @error('name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="location" class="form-label fw-semibold">Location</label>
                            <textarea class="form-control" id="location" name="location" rows="4" placeholder="Enter warehouse location">{{ old('location') }}</textarea>
                            @error('location')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('warehouses.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-2"></i>Create Warehouse
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection