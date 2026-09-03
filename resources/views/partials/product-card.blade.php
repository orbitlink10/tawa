@php
    $cardProduct = $cardProduct ?? $product ?? null;
    if (!$cardProduct) return;
@endphp
<div class="product-cart-wrap mb-30" style="height: 100%; display: flex; flex-direction: column; border-radius: 10px; overflow: hidden;">
    <div class="product-img-action-wrap position-relative" style="background:#fff;">
        <div class="product-img product-img-zoom" style="height: 220px;">
            <a href="{{ route('product_details', $cardProduct->slug) }}">
                <img class="default-img" src="{{ $cardProduct->image_src }}" alt="{{ $cardProduct->image_alt }}" loading="lazy" width="300" height="300" decoding="async" style="width:100%; height:100%; object-fit: contain; padding: 14px;">
            </a>
        </div>
        @if(!$cardProduct->is_in_stock)
            <span class="badge bg-danger position-absolute top-0 start-0 m-2">Out of Stock</span>
        @endif
    </div>
    <div class="product-content-wrap p-3" style="flex-grow: 1; display: flex; flex-direction: column; justify-content: space-between;">
        <div>
            @if($cardProduct->brand)
                <div class="product-category small text-muted mb-1">
                    <a href="{{ route('brand.show', $cardProduct->brand->slug) }}">{{ $cardProduct->brand->name }}</a>
                </div>
            @endif
            <h2 class="fs-6 mb-2" style="min-height: 2.5rem;"><a href="{{ route('product_details', $cardProduct->slug) }}">{{ Str::limit($cardProduct->name, 55) }}</a></h2>
        </div>
        <div>
            <div class="product-price mb-2">
                @if($cardProduct->has_price)
                    <span class="fw-bold">{{ price($cardProduct) }}</span>
                    @if($cardProduct->marked_price && $cardProduct->marked_price > $cardProduct->price)
                        <span class="old-price ms-2 text-muted text-decoration-line-through small">KSh {{ number_format($cardProduct->marked_price) }}</span>
                    @endif
                @endif
            </div>
            <div class="small mb-2">
                <span class="{{ $cardProduct->is_in_stock ? 'text-success' : 'text-danger' }}">{{ $cardProduct->availability_label }}</span>
            </div>
            <div class="d-flex gap-2">
                <form action="{{ route('cart.add') }}" method="POST" class="flex-grow-1">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $cardProduct->id }}">
                    <button type="submit" class="btn btn-primary btn-sm w-100"><i class="fi-rs-shopping-cart-add me-1"></i>Add to Cart</button>
                </form>
                <a href="{{ route('product_details', $cardProduct->slug) }}" class="btn btn-outline-secondary btn-sm">View</a>
            </div>
        </div>
    </div>
</div>
