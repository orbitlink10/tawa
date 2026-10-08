@extends('theme.lucare.layouts.main')
@section('title', 'Networking Equipment Kenya | Routers, Switches & Fibre | Tawa')
@section('meta_description', 'Shop networking equipment in Kenya from Tawa, including MikroTik routers, Ubiquiti access points, TP-Link devices, switches, fibre optic equipment, network cabinets and structured cabling.')

@section('styles')
<style>
    /* ===== Homepage first part — Teams purple theme ===== */
    .tawa-header { background: #e9e8fb; border-bottom-color: transparent; }
    .tawa-nav > ul > li > a:hover { color: #5b5fc7; background: #ffffff; }
    .tawa-nav .dropdown-item:hover { color: #5b5fc7; }
    .tawa-search form { background: #ffffff; border-color: #d7d5ee; }
    .tawa-search button { background: #5b5fc7; }
    .tawa-action:hover { color: #5b5fc7; }
    .tawa-account { background: #5b5fc7; }
    .tawa-account:hover { background: #4f52b2; color: #fff; }
    .tawa-count { background: #5b5fc7; }

    .home-slider.tawa-home-hero {
        background: linear-gradient(180deg, #e9e8fb 0%, #d8d6f5 100%);
        padding-top: 34px;
        padding-bottom: 54px;
        overflow: hidden;
    }
    .home-slider.tawa-home-hero .single-hero-slider { padding: 10px 0; }
    .home-slider.tawa-home-hero .hero-slider-content-2 h4 {
        display: inline-block;
        font-size: 13.5px;
        font-weight: 700;
        letter-spacing: .2px;
        color: #4f52b2;
        background: rgba(255, 255, 255, .72);
        border: 1px solid rgba(91, 95, 199, .20);
        border-radius: 999px;
        padding: 7px 15px;
        margin: 0 0 18px;
    }
    .home-slider.tawa-home-hero .hero-slider-content-2 h2 {
        color: #242424;
        font-weight: 700;
        font-size: clamp(34px, 3.4vw, 54px);
        line-height: 1.08;
        letter-spacing: -1px;
        margin: 0 0 16px;
    }
    .home-slider.tawa-home-hero .hero-slider-content-2 p {
        color: #5b5b66;
        width: 92%;
        font-size: 17px;
        line-height: 1.7;
    }
    .home-slider.tawa-home-hero .hero-slider-content-2 p.text-brand {
        color: #5b5fc7 !important;
        font-size: 22px !important;
        font-weight: 700 !important;
        line-height: 1.35 !important;
        margin: 0 0 16px !important;
        width: 100% !important;
    }
    .home-slider.tawa-home-hero .hero-cta {
        display: flex;
        align-items: center;
        gap: 14px;
        flex-wrap: wrap;
        margin-top: 22px;
    }
    .home-slider.tawa-home-hero .btn-brush-3,
    .home-slider.tawa-home-hero .btn-brush-3:hover {
        background-image: none !important;
        background-color: #5b5fc7 !important;
        border: 1px solid #5b5fc7 !important;
        border-radius: 999px !important;
        padding: 14px 30px !important;
        color: #fff !important;
        font-family: inherit !important;
        font-weight: 700 !important;
        box-shadow: 0 12px 28px rgba(91, 95, 199, .36);
    }
    .home-slider.tawa-home-hero .btn-brush-3:hover {
        background-color: #4f52b2 !important;
        border-color: #4f52b2 !important;
    }
    .home-slider.tawa-home-hero .hero-cta-secondary {
        background: #fff;
        color: #242424;
        border: 1px solid #c9c7e6;
        border-radius: 999px;
        padding: 14px 28px;
        font-weight: 700;
    }
    .home-slider.tawa-home-hero .hero-cta-secondary:hover {
        background: #fff;
        border-color: #5b5fc7;
        color: #4f52b2;
    }
    .home-slider.tawa-home-hero .dot-style-1 ul li.slick-active button {
        background: #5b5fc7;
        border-color: #5b5fc7;
    }
    .home-slider.tawa-home-hero .slider-btn { color: #4f52b2; }
    .home-slider.tawa-home-hero .single-slider-img img {
        filter: drop-shadow(0 30px 40px rgba(52, 48, 120, .18));
        max-width: 100%;
    }

    /* ===== Shop by Brand — bordered image grid ===== */
    .tawa-brand-section { background: #fff; }
    .tawa-brand-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        border-top: 1px solid #e7e7e7;
        border-left: 1px solid #e7e7e7;
    }
    .tawa-brand-tile {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 28px;
        min-height: 340px;
        padding: 40px 24px;
        background: #fff;
        border-right: 1px solid #e7e7e7;
        border-bottom: 1px solid #e7e7e7;
        text-decoration: none;
        transition: background .2s ease;
    }
    .tawa-brand-tile:hover { background: #faf9ff; }
    .tawa-brand-tile-img {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 200px;
        width: 100%;
    }
    .tawa-brand-tile-img img {
        max-height: 200px;
        max-width: 100%;
        object-fit: contain;
        transition: transform .25s ease;
    }
    .tawa-brand-tile:hover .tawa-brand-tile-img img { transform: scale(1.05); }
    .tawa-brand-tile-name {
        font-size: 21px;
        font-weight: 700;
        color: #3d3d3d;
        letter-spacing: -.2px;
    }
    @media (max-width: 991px) {
        .tawa-brand-grid { grid-template-columns: repeat(2, 1fr); }
        .tawa-brand-tile { min-height: 280px; gap: 20px; }
        .tawa-brand-tile-img { height: 160px; }
        .tawa-brand-tile-img img { max-height: 160px; }
        .tawa-brand-tile-name { font-size: 18px; }
    }
    @media (max-width: 575px) {
        .tawa-brand-grid { grid-template-columns: 1fr; }
        .tawa-brand-tile { min-height: 240px; }
    }
</style>
@endsection

@section('main')



 <section class="home-slider tawa-home-hero position-relative pt-50">
            <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
@foreach($sliders as $slider)
                <div class="single-hero-slider single-animation-wrap">
                    <div class="container">
                        <div class="row align-items-center slider-animated-1">
                            <div class="col-lg-5 col-md-6">
                                <div class="hero-slider-content-2">
                                    <h4 class="animated">{{ $slider->h4_title }}</h4>
                                    <h2 class="animated fw-900">{{ $slider->h2_title }}</h2>
                                    <p class="animated fw-900 text-brand fs-3">{{ $slider->h1_title }}</p>
                                    <p class="animated">{{ $slider->description }}</p>
                                    <div class="animated hero-cta">
                                        <a class="btn btn-brush btn-brush-3" href="{{ $slider->button_url }}"> {{ $slider->button_text }} </a>
                                        <a class="btn hero-cta-secondary" href="{{ url('shop') }}">Shop All Products</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="single-slider-img single-slider-img-1">
                                    <img class="animated slider-1-1" src="{{ $slider->img_url }}" alt="{{ $slider->h2_title }}" width="600" height="600" {{ $loop->first ? 'fetchpriority="high"' : 'loading="lazy"' }} decoding="async">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

@endforeach
               
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </section>


<section class="py-4" id="hero-intro">
    <div class="container">
        <div class="text-center">
            <h1 class="fs-2 fw-bold mb-3">Networking Equipment in Kenya</h1>
            <p class="text-muted mx-auto mb-4" style="max-width: 720px;">Shop routers, switches, wireless access points, fibre optic equipment, structured cabling and CCTV products from leading networking brands.</p>
            <div class="d-flex justify-content-center gap-2 flex-wrap">
                <a href="{{ url('shop') }}" class="btn btn-primary btn-lg rounded-pill px-4">Shop Networking Equipment</a>
                <a href="{{ route('brands.index') }}" class="btn btn-outline-dark btn-lg rounded-pill px-4">Browse Brands</a>
            </div>
        </div>
    </div>
</section>


<section class="featured position-relative py-5">
    <div class="container">
        <div class="row g-4">
            @foreach($categories->take(18) as $category)
                <div class="col-6 col-md-4 col-lg-2">
                    <a href="{{ route('view_product_category', ['slug' => $category->slug]) }}" class="text-decoration-none text-dark">
                        <div class="card category-card border-0 shadow-sm h-100">
                            <div class="card-img-top position-relative overflow-hidden" style="height: 130px; background:#fff;">
                                <img src="{{ $category->image_src }}"
                                     alt="{{ $category->name }}"
                                     loading="lazy" decoding="async"
                                     class="img-fluid w-100 h-100" style="object-fit: contain; padding: 10px;">
                                <div class="overlay d-flex align-items-center justify-content-center">
                                    <h5 class="text-white fw-bold m-0">{{ $category->name }}</h5>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <h6 class="card-title mb-0">{{ $category->name }}</h6>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <!-- View All Categories Button -->
        <div class="text-center mt-4">
            <a href="{{ route('allcategories') }}" class="btn btn-primary">View All Categories</a>
        </div>
    </div>
</section>


<section class="tawa-brand-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="mb-2">Shop by Brand</h2>
            <p class="text-muted mb-0">Genuine networking equipment from the brands Kenyan installers trust.</p>
        </div>
        <div class="tawa-brand-grid">
            @foreach($brands as $brand)
            <a href="{{ route('brand.show', $brand->slug) }}" class="tawa-brand-tile">
                <div class="tawa-brand-tile-img">
                    <img src="{{ $brand->image_src }}" alt="{{ $brand->name }}" loading="lazy" decoding="async">
                </div>
                <span class="tawa-brand-tile-name">{{ $brand->name }}</span>
            </a>
            @endforeach
        </div>
    </div>
</section>



        <section class="product-tabs section-padding position-relative wow fadeIn animated">
            <div class="container">
                <div class="tab-header d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0 fs-3">{{ get_option('products_section_title', 'Featured Networking Equipment') }}</h2>
                    <a href="{{ url('shop') }}" class="view-more d-none d-md-flex">View More<i class="fi-rs-angle-double-small-right"></i></a>
                </div>

                <div class="row product-grid-4">
                    @foreach($products as $ad)
                    <div class="col-lg-3 col-md-4 col-6 mb-4">
                        @include('partials.product-card', ['cardProduct' => $ad])
                    </div>
                    @endforeach
                </div>

                <div class="text-center mt-3">
                    <a href="/shop" class="btn btn-dark btn-lg rounded-pill px-4">View All Products</a>
                </div>
            </div>
        </section>

        {{-- Brand sections --}}
        @if($mikrotikProducts->count() > 0)
        <section class="py-5 bg-light">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0 fs-3">MikroTik Products</h2>
                    <a href="{{ route('brand.show', 'mikrotik') }}" class="btn btn-sm btn-outline-primary rounded-pill">View MikroTik</a>
                </div>
                <div class="row">
                    @foreach($mikrotikProducts as $ad)
                    <div class="col-lg-3 col-md-4 col-6 mb-4">@include('partials.product-card', ['cardProduct' => $ad])</div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        @if($ubiquitiProducts->count() > 0)
        <section class="py-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0 fs-3">Ubiquiti Networking Products</h2>
                    <a href="{{ route('brand.show', 'ubiquiti') }}" class="btn btn-sm btn-outline-primary rounded-pill">View Ubiquiti</a>
                </div>
                <div class="row">
                    @foreach($ubiquitiProducts as $ad)
                    <div class="col-lg-3 col-md-4 col-6 mb-4">@include('partials.product-card', ['cardProduct' => $ad])</div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        @if($tpLinkProducts->count() > 0)
        <section class="py-5 bg-light">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0 fs-3">TP-Link Products</h2>
                    <a href="{{ route('brand.show', 'tp-link') }}" class="btn btn-sm btn-outline-primary rounded-pill">View TP-Link</a>
                </div>
                <div class="row">
                    @foreach($tpLinkProducts as $ad)
                    <div class="col-lg-3 col-md-4 col-6 mb-4">@include('partials.product-card', ['cardProduct' => $ad])</div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        {{-- Category sections --}}
        @if($switchProducts->count() > 0)
        <section class="py-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0 fs-3">Network Switches</h2>
                    <a href="{{ route('view_product_sub_category', ['category' => 'wireless-devices', 'subcategory' => 'network-switches']) }}" class="btn btn-sm btn-outline-primary rounded-pill">View Switches</a>
                </div>
                <div class="row">
                    @foreach($switchProducts as $ad)
                    <div class="col-lg-3 col-md-4 col-6 mb-4">@include('partials.product-card', ['cardProduct' => $ad])</div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        @if($fibreProducts->count() > 0)
        <section class="py-5 bg-light">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0 fs-3">Fibre Optic Equipment</h2>
                    <a href="{{ route('view_product_category', 'fibre-optic-solutions') }}" class="btn btn-sm btn-outline-primary rounded-pill">View Fibre</a>
                </div>
                <div class="row">
                    @foreach($fibreProducts as $ad)
                    <div class="col-lg-3 col-md-4 col-6 mb-4">@include('partials.product-card', ['cardProduct' => $ad])</div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        {{-- Latest articles --}}
        @if($latestPosts->count() > 0)
        <section class="py-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0 fs-3">Latest Networking Articles</h2>
                    <a href="{{ route('blogs') }}" class="btn btn-sm btn-outline-primary rounded-pill">View Blog</a>
                </div>
                <div class="row g-4">
                    @foreach($latestPosts as $post)
                    <div class="col-md-4">
                        <a href="{{ url('/'.$post->slug) }}" class="text-decoration-none text-dark">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body">
                                    <h3 class="fs-6 mb-2">{{ $post->title }}</h3>
                                    <p class="text-muted small mb-0">{{ Str::limit(strip_tags($post->meta_description ?: $post->description), 110) }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif





<!-- Services Section -->

@if($medias2->count()>0)
<section class="bg-light py-5" id="medias">
    <div class="container">
  

        <!-- Carousel -->
        <div id="mediaCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">
                @foreach($medias2->chunk(4) as $key => $mediaChunk)
                    <div class="carousel-item @if($key == 0) active @endif">
                        <div class="row">
                            @foreach($mediaChunk as $media)
                                <div class="col-md-3">
                                    <div class="media-card2" data-bs-toggle="modal" data-bs-target="#imageModal1" onclick="showImagea('{{ $media->file_path }}')">
                                        <img class="d-block w-100" src="{{ $media->file_path }}" alt="Installation">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#mediaCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mediaCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
@endif
<!-- Modal -->
<div class="modal fade" id="imageModal1" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Full View</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage2" src="" alt="Full View" class="img-fluid">
            </div>
        </div>
    </div>
</div>


<!-- JavaScript -->
<script>
    function showImagea(imagePath) {
        const modalImage = document.getElementById('modalImage2');
        modalImage.src = imagePath;
    }
</script>

<section class="py-5 bg-light" id="testimonials">
    <div class="container">
        <h2 class="text-center mb-5">What Our Clients Say</h2>

        <!-- Testimonials Carousel -->
        <div id="testimonialsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">
                @foreach($testimonials->chunk(3) as $key => $testimonialChunk)
                    <div class="carousel-item @if($key == 0) active @endif">
                        <div class="row">
                            @foreach($testimonialChunk as $testimonial)
                                <div class="col-md-4">
                                    <div class="card shadow-sm border-light h-100 rounded-lg p-3">
                                        <div class="card-body text-center">
                                            <blockquote class="blockquote mb-0">
                                                <p class="font-italic">"{{ $testimonial->description }}"</p>
                                                <footer class="blockquote-footer mt-3">{{ $testimonial->name }}</footer>
                                            </blockquote>
                                            <p class="text-warning mt-2">⭐⭐⭐⭐⭐</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>



<!-- Store Information Section -->
<section class="bg-light py-8 pt-0" id="store">
    <div class="container-lg">
        <div class="row flex-center">
            <div class="col-sm-12 col-md-12 text-center">
                <h2 class="text-dark mb-4">{{ get_option('why_choose_title', 'Why Choose Pepasa Stationers?') }}</h2>
                <p class="text-dark mb-4">
                    {{ get_option('why_choose_description', 'At Pepasa Stationers, we offer a wide range of high-quality stationery products for individuals, businesses, and educational institutions.') }}
                </p>
            </div>
        </div>
    </div>
</section>




@if($medias->count()>0)
<!-- Services Section -->
<section class="bg-light py-5" id="medias">
    <div class="container">
        <h2 class="text-center mb-5">Our Recent Installations</h2>

        <!-- Carousel -->
        <div id="mediaCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">
                @foreach($medias->chunk(4) as $key => $mediaChunk)
                    <div class="carousel-item @if($key == 0) active @endif">
                        <div class="row">
                            @foreach($mediaChunk as $media)
                                <div class="col-md-3">
                                    <div class="media-card" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="showImage('{{ $media->file_path }}')">
                                        <img class="d-block w-100" src="{{ $media->file_path }}" alt="Installation">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#mediaCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mediaCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
@endif

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Full View</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="Full View" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<!-- CSS for hover and enlarge effect -->
<style>
    .media-card {
        overflow: hidden;
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }

    .media-card img {
        transition: transform 0.3s ease;
        object-fit: cover;
        height: 500px;
    }

        .media-card2 img {
        transition: transform 0.3s ease;
        object-fit: cover;
        height: 300px;
    }

    .media-card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }

    .media-card:hover img {
        transform: scale(1.1);
    }
</style>

<!-- JavaScript -->
<script>
    function showImage(imagePath) {
        const modalImage = document.getElementById('modalImage');
        modalImage.src = imagePath;
    }
</script>







<!-- Services Section -->
<section class="bg-light py-5" id="services">
    <div class="container">
        <h2 class="text-center mb-5">Our Services</h2>
        <div class="row">

@foreach($services as $service)

            <!-- Networking Service -->
            <div class="col-sm-6 col-md-4 mb-4">
                <div class="card shadow-sm border-light text-center h-100 rounded-lg">
                    <div class="card-body">
                        <h4 class="card-title text-dark">{{ $service->name }}</h4>
                        <p class="card-text">{!! $service->meta_description !!}</p>


                          <a href="{{ route('service_single', ['slug' =>$service->slug ?? '0' ]) }}">View more</a>


                    </div>
                </div>
            </div>



            @endforeach

  
        </div>
    </div>
</section>

<!-- Homepage Description Section -->
<section class="py-5" id="homepage-description">
    <div class="container">
       {!! get_option('homepage_description') !!}
    </div>
</section>

<style type="text/css">
    #homepage-description {
    overflow: hidden; /* Prevent content from overflowing the container */
    word-wrap: break-word; /* Handle long words or links */
    max-width: 100%; /* Ensure content does not exceed the container width */
    padding: 1rem; /* Add padding for better readability */
    box-sizing: border-box; /* Include padding and borders in width/height calculations */
}

#homepage-description .container {
    margin: 0 auto; /* Center the content horizontally */
    max-width: 1200px; /* Restrict the maximum width for better readability */
}

@media (max-width: 768px) {
    #homepage-description .container {
        padding: 0 1rem; /* Add padding for smaller screens */
    }
}

</style>

@endsection
