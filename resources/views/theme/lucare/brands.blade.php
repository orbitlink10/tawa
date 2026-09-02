@extends('theme.lucare.layouts.main')
@section('title', 'Networking Brands in Kenya | Tawa')
@section('meta_description', 'Shop networking equipment in Kenya by brand — MikroTik, Ubiquiti, TP-Link, D-Link, Huawei, V-SOL, Dahua and more. Genuine products with nationwide delivery from Tawa.')

@section('main')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        @include('partials.breadcrumbs', ['items' => [['label' => 'Home', 'url' => url('/')], ['label' => 'Brands', 'url' => url('/brands')]]])
    </div>
</div>

<section class="py-5">
    <div class="container">
        <h1 class="mb-3">Networking Brands in Kenya</h1>
        <p class="text-muted mb-5">Browse our range of genuine networking equipment from the brands that Kenyan installers, ISPs and businesses trust.</p>

        <div class="row g-4">
            @foreach($brands as $brand)
            <div class="col-6 col-md-4 col-lg-3">
                <a href="{{ route('brand.show', $brand->slug) }}" class="text-decoration-none text-dark">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-1">{{ $brand->name }}</h5>
                            <p class="card-text text-muted small mb-0">{{ $brand->products_count }} {{ Str::plural('product', $brand->products_count) }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
