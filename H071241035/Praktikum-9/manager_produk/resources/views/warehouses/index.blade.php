@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="page-title mb-0">Warehouses</h2>
            <p class="text-muted mb-0">Manage warehouse locations</p>
        </div>
        <a href="{{ route('warehouses.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Create Warehouse
        </a>
    </div>

    @if($warehouses->count() > 0)
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Products</th>
                            <th>Updated At</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($warehouses as $warehouse)
                        <tr>
                            <td>{{ $warehouse->id }}</td>
                            <td>
                                <div class="fw-semibold">{{ $warehouse->name }}</div>
                            </td>
                            <td>
                                @if($warehouse->location)
                                    <span class="text-muted">{{ Str::limit($warehouse->location, 50) }}</span>
                                @else
                                    <span class="text-muted fst-italic">No location</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-light text-dark">{{ $warehouse->productsWarehouses->count() }} items</span>
                            </td>
                            <td>{{ $warehouse->updated_at->format('M d, Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('warehouses.show', $warehouse) }}" class="btn btn-outline-primary btn-sm action-btn me-1" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('warehouses.edit', $warehouse) }}" class="btn btn-outline-warning btn-sm action-btn me-1" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger btn-sm action-btn" title="Delete" onclick="confirmDelete('{{ route('warehouses.destroy', $warehouse) }}', 'Delete Warehouse', 'Are you sure you want to delete this warehouse?')">
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
            <i class="bi bi-building text-muted fs-1 mb-3"></i>
            <h5 class="text-muted">No warehouses found</h5>
            <p class="text-muted">Get started by creating a new warehouse</p>
            <a href="{{ route('warehouses.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Create Warehouse
            </a>
        </div>
    </div>
    @endif
@endsection