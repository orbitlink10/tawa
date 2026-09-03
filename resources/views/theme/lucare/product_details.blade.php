@extends('theme.lucare.layouts.main')
@section('title', $product->meta_title)
@section('meta_description', $product->meta_description)
@section('robots', $product->noindex ? 'noindex, follow' : 'index, follow')
@section('og_type', 'product')
@section('og_title', $product->meta_title)
@section('og_description', $product->meta_description)
@section('og_image', $product->image_src)
@section('twitter_title', $product->meta_title)
@section('twitter_description', $product->meta_description)
@section('twitter_image', $product->image_src)

@push('meta')
@php
    $productSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Product',
        '@id' => url()->current().'#product',
        'name' => $product->name,
        'url' => url()->current(),
        'image' => $product->image_src,
        'description' => Str::limit(strip_tags($product->short_description ?: $product->description), 300, ''),
    ];
    if ($product->sku) {
        $productSchema['sku'] = $product->sku;
    }
    if ($product->model) {
        $productSchema['mpn'] = $product->model;
    }
    if ($product->brand) {
        $productSchema['brand'] = ['@type' => 'Brand', 'name' => $product->brand->name];
    }
    if ($product->category) {
        $productSchema['category'] = $product->category->name;
    }
    if ($product->has_price && $product->price > 0) {
        $productSchema['offers'] = [
            '@type' => 'Offer',
            'url' => url()->current(),
            'priceCurrency' => 'KES',
            'price' => (string) $product->price,
            'priceValidUntil' => now()->addYear()->format('Y-m-d'),
            'availability' => $product->is_in_stock ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
            'itemCondition' => 'https://schema.org/NewCondition',
            'seller' => ['@id' => url('/').'#organization'],
        ];
    }
@endphp
<script type="application/ld+json">{!! json_encode($productSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endpush

@section('main')

@php
    $crumbs = [['label' => 'Home', 'url' => url('/')]];
    if ($product->category) {
        $crumbs[] = ['label' => $product->category->name, 'url' => route('view_product_category', ['slug' => $product->category->slug])];
        if ($product->subCategory) {
            $crumbs[] = ['label' => $product->subCategory->name, 'url' => route('view_product_sub_category', ['category' => $product->category->slug, 'subcategory' => $product->subCategory->slug])];
        }
    }
    if ($product->brand) {
        $crumbs[] = ['label' => $product->brand->name, 'url' => route('brand.show', ['slug' => $product->brand->slug])];
    }
    $crumbs[] = ['label' => $product->name, 'url' => url()->current()];
@endphp

<div class="page-header breadcrumb-wrap">
    <div class="container">
        @include('partials.breadcrumbs', ['items' => $crumbs])
    </div>
</div>

<section class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <!-- Product Image Section -->
            <div class="col-lg-6">
                <div class="detail-gallery">
                    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @if($mediafiles->count() > 0)
                                @foreach($mediafiles as $index => $media)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <img src="{{ $media->file_path }}" alt="{{ $product->image_alt }}" class="d-block w-100" width="600" height="450" style="height: 450px; object-fit: contain; background:#fff;">
                                    </div>
                                @endforeach
                            @else
                                <div class="carousel-item active">
                                    <img src="{{ $product->image_src }}" alt="{{ $product->image_alt }}" class="d-block w-100" width="600" height="450" fetchpriority="high" style="height: 450px; object-fit: contain; background:#fff;">
                                </div>
                            @endif
                        </div>
                        @if($mediafiles->count() > 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </button>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Product Details Section -->
            <div class="col-lg-6">
                <div class="detail-info">
                    <h1 class="title-detail fs-3 fw-bold text-dark">{{ $product->name }}</h1>

                    <div class="product-price-cover mt-3">
                        @if($product->has_price)
                            <div class="d-flex align-items-center">
                                <ins><span class="text-brand fs-3">{{ price($product) }}</span></ins>
                                @if($product->marked_price && $product->marked_price > $product->price)
                                    <ins><span class="old-price ms-3 text-decoration-line-through text-muted">KSh {{ number_format($product->marked_price) }}</span></ins>
                                    <span class="save-price ms-3 bg-light p-1 rounded-2 text-success">{{ discount($product->id) }}% Off</span>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="short-desc mt-3 mb-3">
                        <p class="text-muted">{!! $product->short_description ?: Str::words(strip_tags($product->description), 40, '...') !!}</p>
                    </div>

                    <ul class="product-meta font-xs text-muted mb-4">
                        <li class="d-flex justify-content-between align-items-center mb-1">
                            <span>Availability:</span>
                            <span class="{{ $product->is_in_stock ? 'text-success' : 'text-danger' }} ms-2">{{ $product->availability_label }}</span>
                        </li>
                        @if($product->sku)
                        <li class="d-flex justify-content-between align-items-center mb-1"><span>SKU:</span><span class="ms-2">{{ $product->sku }}</span></li>
                        @endif
                        @if($product->model)
                        <li class="d-flex justify-content-between align-items-center mb-1"><span>Model:</span><span class="ms-2">{{ $product->model }}</span></li>
                        @endif
                        @if($product->brand)
                        <li class="d-flex justify-content-between align-items-center mb-1">
                            <span>Brand:</span>
                            <span class="ms-2"><a href="{{ route('brand.show', $product->brand->slug) }}">{{ $product->brand->name }}</a></span>
                        </li>
                        @endif
                        @if($product->category)
                        <li class="d-flex justify-content-between align-items-center mb-1">
                            <span>Category:</span>
                            <span class="ms-2"><a href="{{ route('view_product_category', $product->category->slug) }}">{{ $product->category->name }}</a></span>
                        </li>
                        @endif
                    </ul>

                    <div class="detail-extralink">
                        @if($product->has_price)
                            <form action="{{ route('cart.add') }}" method="POST" class="d-flex align-items-center flex-wrap gap-2">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="d-flex align-items-center me-2">
                                    <label class="me-2 small text-muted">Qty</label>
                                    <input type="number" name="quantity" value="1" min="1" max="{{ max((int) $product->stock, 1) }}" class="form-control form-control-sm" style="width: 70px;">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg shadow-sm">Add to Cart</button>
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', get_option('contact_phone')) }}?text={{ urlencode('Hello, I am interested in '.$product->name) }}" target="_blank" rel="noopener" class="btn btn-success btn-lg shadow-sm">
                                    <i class="fab fa-whatsapp"></i> Buy via WhatsApp
                                </a>
                            </form>
                        @else
                            <a href="{{ route('contacts') }}" class="btn btn-dark btn-lg shadow-sm">Request a Quote</a>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', get_option('contact_phone')) }}?text={{ urlencode('Hello, I would like a quote for '.$product->name) }}" target="_blank" rel="noopener" class="btn btn-success btn-lg shadow-sm">
                                <i class="fab fa-whatsapp"></i> WhatsApp Enquiry
                            </a>
                        @endif

                        @include('theme.lucare.modals.notify')
                        @include('theme.lucare.modals.quote')
                    </div>

                    <div class="delivery-info mt-4 p-3 bg-light rounded">
                        <p class="mb-1 small"><strong>Delivery:</strong> Nairobi same-day to 1 day; nationwide 1–5 business days.</p>
                        <p class="mb-0 small"><strong>Warranty:</strong> Manufacturer warranty where applicable.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Description & Specifications -->
        <div class="tab-style3 mt-5">
            <ul class="nav nav-tabs text-uppercase">
                <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#Description">Description</a></li>
                @if($product->specifications)
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Specifications">Specifications</a></li>
                @endif
            </ul>
            <div class="tab-content mt-3">
                <div class="tab-pane fade show active" id="Description">
                    <div class="container">
                        <div id="homepage-description">{!! $product->description !!}</div>
                    </div>
                </div>
                @if($product->specifications)
                <div class="tab-pane fade" id="Specifications">
                    <div class="container">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                @foreach($product->specifications as $spec)
                                <tr>
                                    <th class="w-25">{{ $spec['name'] ?? '' }}</th>
                                    <td>{{ $spec['value'] ?? '' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Related Products -->
        @if($related->count() > 0)
        <section class="product-tabs section-padding position-relative">
            <div class="container">
                <div class="tab-header mb-4">
                    <h2 class="mb-0 fs-4">Related Products</h2>
                </div>
                <div class="row product-grid-4">
                    @foreach($related as $ad)
                    <div class="col-lg-3 col-md-4 col-6 mb-4">
                        @include('partials.product-card', ['cardProduct' => $ad])
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
    </div>
</section>
@endsection
