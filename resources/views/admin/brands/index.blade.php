@extends('layouts.appbar')

@section('content')
<div class="content-wrapper">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3 mb-0">Brands</h1>
            <a href="{{ route('admin.brands.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Create New Brand
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" style="width: 60px;">ID</th>
                        <th scope="col" style="width: 100px;">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col" style="width: 90px;">Products</th>
                        <th scope="col" style="width: 100px;">Status</th>
                        <th scope="col" style="width: 240px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>
                                @if($brand->logo)
                                    <img src="{{ $brand->logo }}" alt="{{ $brand->name }}"
                                         class="img-thumbnail"
                                         style="max-width: 80px; max-height: 55px; object-fit: contain;">
                                @else
                                    <span class="text-muted small">No image</span>
                                @endif
                            </td>
                            <td>{{ $brand->name }}</td>
                            <td><code>{{ $brand->slug }}</code></td>
                            <td>{{ $brand->products_count }}</td>
                            <td>
                                @if($brand->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Hidden</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group text-nowrap" role="group">
                                    @if($brand->slug)
                                        <a href="{{ route('brand.show', $brand->slug) }}"
                                           target="_blank" rel="noopener noreferrer"
                                           class="btn btn-sm btn-outline-primary"
                                           title="Preview {{ $brand->name }} on the website">
                                            <i class="fas fa-external-link-alt"></i> Preview
                                        </a>
                                    @endif

                                    <a href="{{ route('admin.brands.edit', $brand->id) }}"
                                       class="btn btn-sm btn-warning">
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </a>

                                    <form action="{{ route('admin.brands.destroy', $brand->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this brand?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <strong>No brands found.</strong>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
