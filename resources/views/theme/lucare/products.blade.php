@extends('theme.lucare.layouts.main')

@section('title', 'Shop Networking Equipment in Kenya | Tawa')
@section('meta_description', 'Shop networking equipment in Kenya from Tawa — MikroTik, Ubiquiti and TP-Link routers, switches, access points, CPE, fibre optic equipment and CCTV products.')
@section('robots', (request()->filled('q') || request()->filled('brand') || request()->filled('category')) ? 'noindex, follow' : 'index, follow')

@section('main')

<section class="py-4" id="collections" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row h-100">
            <div class="col-lg-12 py-3 text-center text-lg-start">
                <h1 class="fs-3 fs-lg-4 lh-sm mb-2 text-black">{{ request('q') ? 'Search Results' : 'Networking Equipment' }}</h1>
                <p class="text-muted mb-0">
                    @if(request('q'))
                        Showing results for "{{ request('q') }}"
                    @else
                        Routers, switches, access points, fibre optic and structured cabling equipment in Kenya.
                    @endif
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
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
            <h2 class="fs-5 mb-2">No products found</h2>
            <p class="text-muted">Try searching by model number (e.g. RB4011, CPE510) or browse our <a href="{{ route('brands.index') }}">brands</a> and <a href="{{ url('shop') }}">categories</a>.</p>
        </div>
        @endif
    </div>
</section>
@endsection
