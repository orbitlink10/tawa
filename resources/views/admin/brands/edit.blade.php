@extends('layouts.appbar')

@section('content')
<div class="content-wrapper">
    <div class="container py-4">
        <h1 class="h3 mb-4">Edit Brand</h1>

        @include('admin.brands._form', [
            'brand' => $brand,
            'action' => route('admin.brands.update', $brand->id),
            'method' => 'PUT',
            'submitLabel' => 'Update Brand',
        ])
    </div>
</div>
@endsection
