@extends('theme.lucare.layouts.main')
@section('title', $brand->meta_title)
@section('meta_description', $brand->meta_description)
@section('robots', ($brand->noindex || request()->filled('category')) ? 'noindex, follow' : 'index, follow')

@push('meta')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "CollectionPage",
    "name": {{ json_encode($brand->name.' Products in Kenya') }},
    "url": {{ json_encode(url()->current()) }},
    "description": {{ json_encode($brand->meta_description) }}
}
</script>
@endpush

@section('main')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        @include('partials.breadcrumbs', ['items' => [['label' => 'Home', 'url' => url('/')], ['label' => 'Brands', 'url' => route('brands.index')], ['label' => $brand->name, 'url' => url()->current()]]])
    </div>
</div>

<section class="py-5" id="brand-intro">
    <div class="container">
        <h1 class="mb-3">{{ $brand->name }} Products in Kenya</h1>
        <div class="text-muted">
            {!! $brand->description ?: $brand->short_description !!}
        </div>
    </div>
</section>

<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="tab-header mb-4">
            <h2 class="mb-0 fs-4">{{ $brand->name }} Products</h2>
        </div>

        @if($categories->count() > 0)
        <div class="d-flex flex-wrap gap-2 mb-4">
            <a href="{{ route('brand.show', $brand->slug) }}" class="btn btn-sm {{ !request('category') ? 'btn-primary' : 'btn-outline-secondary' }}">All</a>
            @foreach($categories as $cat)
                <a href="{{ route('brand.show', ['slug' => $brand->slug, 'category' => $cat->slug]) }}" class="btn btn-sm {{ request('category') == $cat->slug ? 'btn-primary' : 'btn-outline-secondary' }}">{{ $cat->name }}</a>
            @endforeach
        </div>
        @endif

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
            <p class="text-muted">No products found for this brand yet. <a href="{{ route('contacts') }}">Contact us</a> for availability.</p>
        </div>
        @endif
    </div>
</section>
@endsection
