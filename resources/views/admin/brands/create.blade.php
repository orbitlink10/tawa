@extends('layouts.appbar')

@section('content')
<div class="content-wrapper">
    <div class="container py-4">
        <h1 class="h3 mb-4">Create Brand</h1>

        @include('admin.brands._form', [
            'brand' => null,
            'action' => route('admin.brands.store'),
            'method' => 'POST',
            'submitLabel' => 'Create Brand',
        ])
    </div>
</div>
@endsection
