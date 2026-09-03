@extends('theme.lucare.layouts.main')

@php
    $seoTitle = isset($subcategory)
        ? $subcategory->name.' Price in Kenya | Tawa'
        : $category->meta_title;
    $seoDescription = isset($subcategory)
        ? ($subcategory->meta_description ?? 'Buy '.$subcategory->name.' in Kenya from Tawa. View prices and order with nationwide delivery.')
        : $category->meta_description;
    $h1 = isset($subcategory)
        ? $subcategory->name.' Price in Kenya'
        : $category->name.' in Kenya';
@endphp

@section('title', $seoTitle)
@section('meta_description', $seoDescription)
@section('robots', ($category->noindex || request()->filled('brand')) ? 'noindex, follow' : 'index, follow')

@push('meta')
<script type="application/ld+json">{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => $h1,
    'url' => url()->current(),
    'description' => $seoDescription,
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endpush

@section('main')

@php
    $crumbs = [['label' => 'Home', 'url' => url('/')]];
    if (isset($subcategory)) {
        $crumbs[] = ['label' => $category->name, 'url' => route('view_product_category', ['slug' => $category->slug])];
        $crumbs[] = ['label' => $subcategory->name, 'url' => url()->current()];
    } else {
        $crumbs[] = ['label' => $category->name, 'url' => url()->current()];
    }
@endphp

<div class="page-header breadcrumb-wrap">
    <div class="container">
        @include('partials.breadcrumbs', ['items' => $crumbs])
    </div>
</div>

<section class="py-0 pb-6" id="collections" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row h-100">
            <div class="col-lg-12 py-4 text-center text-lg-start">
                <h1 class="fs-3 fs-lg-5 lh-sm mb-3 text-black">{{ $h1 }}</h1>
                <p class="text-muted mb-3">{{ $seoDescription }}</p>

                @if(!empty($subcategories) && $subcategories->count() > 0)
                <div class="d-flex flex-wrap gap-2">
                    @foreach($subcategories as $sc)
                        <a href="{{ route('view_product_sub_category', ['category' => $category->slug, 'subcategory' => $sc->slug]) }}"
                           class="btn btn-sm {{ (isset($subcategory) && $subcategory->id === $sc->id) ? 'btn-primary' : 'btn-outline-secondary' }}">
                            {{ $sc->name }}
                        </a>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="product-tabs section-padding position-relative wow fadeIn animated">
    <div class="container">
        @if($products->count() > 0)
        <div class="row product-grid-4">
            @foreach($products as $ad)
            <div class="col-lg-3 col-md-4 col-6 mb-4">
                @include('partials.product-card', ['cardProduct' => $ad])
            </div>
            @endforeach

            <div class="col-12 mt-4">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
        @else
        <div class="text-center py-5">
            <p class="text-muted">No products found in this category yet. <a href="{{ route('contacts') }}">Contact us</a> for availability.</p>
        </div>
        @endif
    </div>
</section>

<section class="py-5" id="category-seo-content">
    <div class="container">
        {!! $category->seo_content ?: $category->description !!}
    </div>
</section>
@endsection
