@extends('theme.starlinknew.layouts.main')

{{-- Page Title & Meta --}}
@section('title', get_option('hero_header_title'))
@section('meta_description', get_option('hero_header_description'))


@section('main')
  <!--=== Modern Header Section ===-->
  <section id="header" class="section-py position-relative" style="background-color: #f8f9fa;">
    <div class="bg-holder position-absolute w-100 h-100"
         style="background-image:url({{ asset('assets/img/gallery/header-bg-light.png') }}); background-position:right top; background-size:cover;">
    </div>
    
    <div class="container">
      <div class="row align-items-center min-vh-75 min-vh-xl-100">
        <div class="col-md-6 text-md-start text-center mb-4 mb-md-0">
          <span class="badge bg-primary bg-opacity-10 text-primary mb-3 rounded-pill px-3 py-2">Welcome to Starlink Kenya</span>
          <h1 class="display-4 fw-bold text-dark mb-3">
            {{ get_option('hero_header_title') }}
            <span class="text-gradient">Kenya</span>
          </h1>
          <p class="lead text-secondary mb-4">{!! get_option('hero_header_description') !!}</p>
          <div class="pt-2">
            <a href="{{ url('shop') }}" class="btn btn-primary btn-modern me-3 shadow">Shop Now</a>
            <a href="{{ route('contacts') }}" class="btn btn-outline-primary btn-modern shadow">Talk to an Expert</a>
          </div>
          
          <div class="d-flex align-items-center mt-5">
            <div class="d-flex me-4">
              <div class="me-3">
                <i class="bi bi-check-circle-fill text-primary"></i>
              </div>
              <div>Fast Setup</div>
            </div>
            <div class="d-flex">
              <div class="me-3">
                <i class="bi bi-check-circle-fill text-primary"></i>
              </div>
              <div>24/7 Support</div>
            </div>
          </div>
        </div>
        <div class="col-md-6 text-center">
          <img src="{{ get_option('hero_image', asset('assets/img/default-placeholder.jpg')) }}"
               class="img-fluid rounded-4 shadow-lg floating" alt="Hero Image" style="max-width:90%;">
        </div>
      </div>
    </div>
  </section>

  <!--=== 1. Starlink Kenya Overview ===-->
  <section id="starlink-overview" class="section-py bg-light">
    <div class="container">
      <div class="row align-items-center gy-5">
        <div class="col-lg-6">
          <span class="badge bg-primary bg-opacity-10 text-primary mb-3 rounded-pill px-3 py-2">About Us</span>
          <h2 class="fw-bold mb-4">Discover <span class="text-gradient">Starlink Kenya</span></h2>
          <p class="fs-5 mb-4">
            Starlink Kenya brings you cutting-edge satellite internet, combining global coverage with local expertise.
            Whether you're streaming 4K video, running critical business apps, or connecting remote communities, enjoy
            reliable, low-latency performance across the country.
          </p>
          <ul class="list-unstyled mb-4">
            <li class="d-flex mb-3">
              <div class="icon-circle-sm bg-primary bg-opacity-10 text-primary me-3 flex-shrink-0">
                <i class="bi bi-check2"></i>
              </div>
              <div>Speeds up to 220 Mbps for seamless browsing</div>
            </li>
            <li class="d-flex mb-3">
              <div class="icon-circle-sm bg-primary bg-opacity-10 text-primary me-3 flex-shrink-0">
                <i class="bi bi-check2"></i>
              </div>
              <div>Global satellite network optimized for Kenyan terrain</div>
            </li>
            <li class="d-flex mb-3">
              <div class="icon-circle-sm bg-primary bg-opacity-10 text-primary me-3 flex-shrink-0">
                <i class="bi bi-check2"></i>
              </div>
              <div>DIY install or full pro setup by our certified team</div>
            </li>
          </ul>
          <div class="d-flex align-items-center">
            <a href="#contact" class="btn btn-primary btn-modern me-4">Get Started Today</a>
          
          </div>
        </div>
        
        <div class="col-lg-6">
          <div class="ratio ratio-16x9 rounded-4 shadow overflow-hidden">
            <iframe src="https://www.youtube.com/embed/ZBpsEnxmsG4"
                    title="Starlink Kenya Introduction"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen class="rounded-4"></iframe>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!--=== 2. Why Choose Starlink Kenya ===-->
  <section id="why-choose-starlink" class="section-py bg-white">
    <div class="container">
      <div class="text-center mb-5">
        <span class="badge bg-primary bg-opacity-10 text-primary mb-3 rounded-pill px-3 py-2">Why Choose Us</span>
        <h2 class="fw-bold mb-3">Why Choose <span class="text-gradient">Starlink Kenya</span>?</h2>
        <p class="lead text-muted mx-auto" style="max-width: 700px;">
          Starlink Kenya is the official authorized reseller—ensuring genuine equipment, local expertise,
          flexible financing, and dedicated support whenever you need it.
        </p>
      </div>
      <div class="row g-4">
        @foreach([
          ['icon'=>'award','title'=>'Official Reseller','text'=>'Authorized partner guaranteeing authentic Starlink hardware & service.'],
          ['icon'=>'truck','title'=>'Local Stock & Delivery','text'=>'Fast dispatch from Nairobi—online within days, not weeks.'],
          ['icon'=>'tools','title'=>'Expert Installation','text'=>'Certified technicians ensure perfect dish alignment & performance.'],
          ['icon'=>'wallet2','title'=>'Flexible Payments','text'=>'Monthly plans, business bundles, or custom financing to suit you.'],
          ['icon'=>'shield-check','title'=>'Warranty & Guarantee','text'=>'12-month warranty + uptime guarantee for peace of mind.'],
          ['icon'=>'headset','title'=>'24/7 Local Support','text'=>'Kenya-based team available via phone, email, or WhatsApp anytime.']
        ] as $item)
          <div class="col-sm-6 col-lg-4">
            <div class="card card-hover border-0 text-center p-4 h-100 shadow-sm highlight-box">
              <div class="icon-circle"><i class="bi bi-{{ $item['icon'] }}"></i></div>
              <h5 class="mb-3">{{ $item['title'] }}</h5>
              <p class="text-muted mb-0">{{ $item['text'] }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!--=== 3. Starlink Extensions ===-->
  <section id="starlink-extensions" class="section-py bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <span class="badge bg-primary bg-opacity-10 text-primary mb-3 rounded-pill px-3 py-2">Our Solutions</span>
        <h2 class="fw-bold mb-3">Starlink <span class="text-gradient">Extensions</span></h2>
        <p class="lead text-muted mx-auto" style="max-width: 700px;">
          Scale your Starlink footprint with official extension kits and network design—ideal for large estates,
          community networks, and challenging terrain.
        </p>
      </div>
      <div class="row g-4">
        @foreach([
          ['icon'=>'satellite','title'=>'Additional Dish Units','text'=>'Deploy secondary dishes to cover multiple buildings or zones.'],
          ['icon'=>'broadcast-pin','title'=>'Signal Boosters & Repeaters','text'=>'High-gain repeaters push connectivity deeper into valleys or indoors.'],
          ['icon'=>'diagram-3','title'=>'Mesh Network Integration','text'=>'Mesh Starlink feeds with Wi-Fi systems for seamless site-wide coverage.']
        ] as $item)
          <div class="col-sm-6 col-lg-4">
            <div class="card card-hover border-0 p-4 h-100 shadow-sm highlight-box">
              <div class="icon-circle"><i class="bi bi-{{ $item['icon'] }}"></i></div>
              <h5 class="mb-3">{{ $item['title'] }}</h5>
              <p class="text-muted mb-0">{{ $item['text'] }}</p>
              <a href="#" class="stretched-link"></a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!--=== Product Tabs ===-->
  <section class="product-tabs section-py position-relative">
    <div class="container">
      <div class="tab-header d-flex justify-content-between align-items-center mb-4">
        <ul class="nav nav-tabs" id="productTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="tab-one-btn" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">
              {{ get_option('products_section_title', 'Our Stationery Collection') }}
            </button>
          </li>
        </ul>
        <a href="{{ url('shop') }}" class="btn btn-link d-none d-md-inline text-primary">View More <i class="bi bi-chevron-right"></i></a>
      </div>
      <div class="tab-content" id="productTabContent">
        <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one-btn">
          <div class="row product-grid-4">
            @foreach($products as $product)
              <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card product-card h-100 border-0">
                  <div class="position-relative overflow-hidden">
                    <img src="{{ url('/') }}/storage/{{ $product->photo }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-img-overlay d-flex align-items-start justify-content-end p-3">
                      <a href="{{ route('product_details', $product->slug) }}" class="btn btn-sm btn-primary rounded-circle shadow">
                        <i class="bi bi-cart-plus"></i>
                      </a>
                    </div>
                  </div>
                  <div class="card-body text-center pt-3">
                    <div class="mb-1 text-muted small">
                      <a href="{{ route('view_product_category', ['slug'=>category($product->category_id)->slug]) }}" class="text-decoration-none">
                        {{ category($product->category_id)->name }}
                      </a>
                    </div>
                    <h6 class="card-title mb-2">
                      <a href="{{ route('product_details', $product->slug) }}" class="text-decoration-none text-dark">
                        {{ Str::limit($product->name, 40) }}
                      </a>
                    </h6>
                    @if($product->has_price)
                      <div class="fw-bold text-primary">{{ price($product) }}</div>
                    @endif
                  </div>
                </div>
              </div>
            @endforeach
          </div>
      </div>
      <div class="text-center mt-5">
        <a href="/shop" class="btn btn-primary btn-modern px-5">View All Products</a>
      </div>
    </div>
  </section>

  <!--=== Recent Installations (medias2) ===-->
  @if($medias2->count())
    <section id="installations" class="bg-white section-py">
      <div class="container">
        <div class="text-center mb-5">
          <span class="badge bg-primary bg-opacity-10 text-primary mb-3 rounded-pill px-3 py-2">Our Work</span>
          <h2 class="fw-bold mb-3">Recent <span class="text-gradient">Installations</span></h2>
          <p class="lead text-muted mx-auto" style="max-width: 700px;">
            See our latest Starlink installations across Kenya, from urban setups to remote locations.
          </p>
        </div>
        
        <div id="installationsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
          <div class="carousel-inner">
            @foreach($medias2->chunk(4) as $chunkIndex => $chunk)
              <div class="carousel-item @if($chunkIndex==0) active @endif">
                <div class="row g-4">
                  @foreach($chunk as $media)
                    <div class="col-md-3">
                      <div class="media-card2" data-bs-toggle="modal" data-bs-target="#imageModal1" onclick="showImagea('{{ $media->file_path }}')">
                        <img src="{{ $media->file_path }}" class="w-100 rounded-3" alt="Installation">
                        <div class="p-3">
                          <h6 class="mb-0">Installation #{{ $loop->iteration }}</h6>
                          <small class="text-muted">Nairobi, Kenya</small>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            @endforeach
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#installationsCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-primary rounded-circle p-3" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#installationsCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-primary rounded-circle p-3" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </section>
    <!-- Modal for installations -->
    <div class="modal fade" id="imageModal1" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0">
          <div class="modal-header border-0">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center p-0">
            <img id="modalImage2" src="" class="img-fluid rounded" alt="Full View">
          </div>
        </div>
      </div>
    </div>
  @endif

  <!--=== Testimonials ===-->
  <section id="testimonials" class="section-py bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <span class="badge bg-primary bg-opacity-10 text-primary mb-3 rounded-pill px-3 py-2">Testimonials</span>
        <h2 class="fw-bold mb-3">What Our <span class="text-gradient">Clients</span> Say</h2>
        <p class="lead text-muted mx-auto" style="max-width: 700px;">
          Don't just take our word for it - hear from our satisfied customers across Kenya.
        </p>
      </div>
      
      <div id="testimonialsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">
          @foreach($testimonials->chunk(3) as $i => $chunk)
            <div class="carousel-item @if($i==0) active @endif">
              <div class="row g-4">
                @foreach($chunk as $t)
                  <div class="col-md-4">
                    <div class="card testimonial-card h-100 border-0 p-4">
                      <div class="card-body text-center">
                        <div class="icon-circle-sm bg-primary bg-opacity-10 text-primary mb-4 mx-auto">
                          <i class="bi bi-quote"></i>
                        </div>
                        <p class="fst-italic mb-4">"{{ $t->description }}"</p>
                        <div class="d-flex align-items-center justify-content-center">
                          <div class="flex-shrink-0">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($t->name) }}&background=random" class="rounded-circle me-3" width="50" alt="{{ $t->name }}">
                          </div>
                          <div class="flex-grow-1 text-start">
                            <h6 class="mb-0">{{ $t->name }}</h6>
                            <small class="text-muted">Customer</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bg-primary rounded-circle p-3" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon bg-primary rounded-circle p-3" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </section>

  <!--=== Store Info ===-->
  <section id="store" class="section-py bg-white">
    <div class="container text-center">
      <span class="badge bg-primary bg-opacity-10 text-primary mb-3 rounded-pill px-3 py-2">Our Advantage</span>
      <h2 class="fw-bold mb-4">{{ get_option('why_choose_title', 'Why Choose Pepasa Stationers?') }}</h2>
      <p class="text-muted lead mb-5 mx-auto" style="max-width: 800px;">{{ get_option('why_choose_description') }}</p>
      
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card border-0 p-4 h-100">
            <div class="icon-circle bg-primary bg-opacity-10 text-primary mb-4 mx-auto">
              <i class="bi bi-star-fill"></i>
            </div>
            <h5>Quality Products</h5>
            <p class="text-muted mb-0">We source only the highest quality stationery from trusted suppliers.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 p-4 h-100">
            <div class="icon-circle bg-primary bg-opacity-10 text-primary mb-4 mx-auto">
              <i class="bi bi-truck"></i>
            </div>
            <h5>Fast Delivery</h5>
            <p class="text-muted mb-0">Quick and reliable delivery across Kenya within 1-3 business days.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 p-4 h-100">
            <div class="icon-circle bg-primary bg-opacity-10 text-primary mb-4 mx-auto">
              <i class="bi bi-headset"></i>
            </div>
            <h5>Customer Support</h5>
            <p class="text-muted mb-0">Our friendly team is always ready to assist with any inquiries.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--=== Recent Installations (medias) ===-->
  @if($medias->count())
    <section id="recent-installations" class="section-py bg-light">
      <div class="container">
        <div class="text-center mb-5">
          <span class="badge bg-primary bg-opacity-10 text-primary mb-3 rounded-pill px-3 py-2">Gallery</span>
          <h2 class="fw-bold mb-3">Our <span class="text-gradient">Projects</span></h2>
          <p class="lead text-muted mx-auto" style="max-width: 700px;">
            Browse through our portfolio of successful Starlink installations across various locations.
          </p>
        </div>
        
        <div id="mediaCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
          <div class="carousel-inner">
            @foreach($medias->chunk(4) as $i => $chunk)
              <div class="carousel-item @if($i==0) active @endif">
                <div class="row g-4">
                  @foreach($chunk as $m)
                    <div class="col-md-3">
                      <div class="media-card" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="showImage('{{ $m->file_path }}')">
                        <img src="{{ $m->file_path }}" class="w-100 rounded-3" alt="Installation">
                        <div class="p-3">
                          <h6 class="mb-0">Project #{{ $loop->iteration }}</h6>
                          <small class="text-muted">Kenya</small>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            @endforeach
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#mediaCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-primary rounded-circle p-3" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#mediaCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-primary rounded-circle p-3" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </section>
    <!-- Modal for recent installations -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0">
          <div class="modal-header border-0">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center p-0">
            <img id="modalImage" src="" class="img-fluid rounded" alt="Full View">
          </div>
        </div>
      </div>
    </div>
  @endif

  <!--=== Services Section ===-->
<section id="services" class="section-py bg-white">
  <div class="container">
    <div class="text-center mb-5">
      <span class="badge bg-primary bg-opacity-10 text-primary mb-3 rounded-pill px-3 py-2">Our Services</span>
      <h2 class="fw-bold mb-3">Explore Our <span class="text-gradient">Professional Solutions</span></h2>
      <p class="lead text-muted mx-auto" style="max-width: 700px;">
        From seamless Starlink installations to advanced networking and CCTV setups—our certified team delivers fast, reliable, and expert services tailored to your needs.
      </p>
    </div>

    <div class="row g-4">
      @foreach($services as $service)
        <div class="col-sm-6 col-md-4 d-flex">
          <div class="card card-hover border-0 shadow-sm flex-fill h-100 overflow-hidden">
            @if($service->image_url)
              <img src="{{ $service->image_url }}" alt="{{ $service->name }}" class="card-img-top" style="height: 220px; object-fit: cover;">
            @endif
            <div class="card-body p-4 d-flex flex-column">
              <h4 class="card-title mb-3 text-dark fw-semibold">{{ $service->name }}</h4>
              <p class="card-text text-muted mb-4 flex-grow-1">{!! $service->meta_description ?? 'Professional service tailored to your needs.' !!}</p>
              <a href="{{ route('service_single', ['slug'=>$service->slug ?? '0']) }}" class="btn btn-modern btn-sm w-100 mt-auto">Learn More</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>


  <!--=== Homepage Description ===-->
<section id="homepage-description" class="section-py bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 position-relative">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-5 description-frame sticky-description" id="scrollable-description">
                        {!! get_option('homepage_description') !!}
                    </div>
                </div>
                <!-- Gradient fade -->
                <div class="scroll-fade"></div>
                <!-- Clickable arrow -->
                <div class="scroll-arrow text-center" id="scroll-arrow">
                    <i class="bi bi-chevron-double-down"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .description-frame {
        max-height: 500px;
        overflow-y: auto;
        border-radius: 16px;
        border: 1px solid #eaeaea;
        background: #fff;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.05);
        padding: 2rem;
        scroll-behavior: smooth;
        position: relative;
    }

    .sticky-description {
        position: sticky;
        top: 100px;
    }

    .scroll-fade {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 60px;
        background: linear-gradient(to bottom, rgba(255,255,255,0) 0%, #ffffff 100%);
        border-radius: 0 0 16px 16px;
        pointer-events: none;
        z-index: 10;
    }

    .scroll-arrow {
        position: absolute;
        bottom: 15px;
        left: 50%;
        transform: translateX(-50%);
        font-size: 1.5rem;
        color: #003366;
        cursor: pointer;
        animation: bounce 2s infinite;
        z-index: 20;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {transform: translate(-50%, 0);}
        40% {transform: translate(-50%, -8px);}
        60% {transform: translate(-50%, -4px);}
    }

    .description-frame::-webkit-scrollbar {
        width: 8px;
    }

    .description-frame::-webkit-scrollbar-thumb {
        background: #003366;
        border-radius: 4px;
    }

    @media (max-width: 768px) {
        .description-frame {
            max-height: 400px;
            padding: 1.5rem;
        }

        .sticky-description {
            top: 60px;
        }

        .scroll-arrow {
            font-size: 1.2rem;
            bottom: 10px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const scrollArrow = document.getElementById('scroll-arrow');
        const scrollableContent = document.getElementById('scrollable-description');

        scrollArrow.addEventListener('click', function () {
            scrollableContent.scrollBy({
                top: 200, // scrolls 200px down
                behavior: 'smooth'
            });
        });
    });
</script>


@endsection

@push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script>
    function showImage(src) {
      document.getElementById('modalImage').src = src;
    }
    function showImagea(src) {
      document.getElementById('modalImage2').src = src;
    }
    
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
      });
      
      // Animate elements when they come into view
      const animateOnScroll = () => {
        const elements = document.querySelectorAll('.card-hover, .highlight-box');
        
        elements.forEach(element => {
          const elementPosition = element.getBoundingClientRect().top;
          const screenPosition = window.innerHeight / 1.2;
          
          if(elementPosition < screenPosition) {
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
          }
        });
      };
      
      // Set initial state
      document.querySelectorAll('.card-hover, .highlight-box').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.6s ease';
      });
      
      // Run on load and scroll
      window.addEventListener('load', animateOnScroll);
      window.addEventListener('scroll', animateOnScroll);
    });
  </script>
@endpush