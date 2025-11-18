@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="page-title mb-0">Stock Management</h2>
            <p class="text-muted mb-0">Manage inventory across warehouses</p>
        </div>
        <a href="{{ route('stocks.create') }}" class="btn btn-primary">
            <i class="bi bi-arrow-repeat me-2"></i>Transfer Stock
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('stocks.index') }}">
                <div class="row">
                    <div class="col-md-4">
                        <label for="warehouse_id" class="form-label fw-semibold">Filter by Warehouse</label>
                        <select class="form-select" id="warehouse_id" name="warehouse_id">
                            <option value="">All Warehouses</option>
                            @foreach($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}" {{ $selectedWarehouseId == $warehouse->id ? 'selected' : '' }}>
                                {{ $warehouse->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <div>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-filter me-1"></i> Filter
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if($stocks->count() > 0)
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Warehouse</th>
                            <th>Quantity</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stocks as $stock)
                        <tr>
                            <td>{{ $stock->product->id }}</td>
                            <td>
                                <div class="fw-semibold">{{ $stock->product->name }}</div>
                                <small class="text-muted">{{ $stock->product->productDetail->size ?? 'N/A' }}</small>
                            </td>
                            <td>
                                @if($stock->product->category)
                                    <span class="badge bg-primary">{{ $stock->product->category->name }}</span>
                                @else
                                    <span class="text-muted fst-italic">No category</span>
                                @endif
                            </td>
                            <td>{{ $stock->warehouse->name }}</td>
                            <td>{{ $stock->quantity }}</td>
                            <td>
                                @if($stock->quantity > 10)
                                    <span class="badge bg-success">In Stock</span>
                                @elseif($stock->quantity > 0)
                                    <span class="badge bg-warning">Low Stock</span>
                                @else
                                    <span class="badge bg-danger">Out of Stock</span>
                                @endif
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
            <i class="bi bi-stack text-muted fs-1 mb-3"></i>
            <h5 class="text-muted">No stock records found</h5>
            <p class="text-muted">Get started by transferring some stock to a warehouse</p>
            <a href="{{ route('stocks.create') }}" class="btn btn-primary">
                <i class="bi bi-arrow-repeat me-2"></i>Transfer Stock
            </a>
        </div>
    </div>
    @endif
@endsection