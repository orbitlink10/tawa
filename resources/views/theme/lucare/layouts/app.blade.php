<!DOCTYPE html>
<html class="no-js" lang="en-KE">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#0b6efd">

    {{-- Local (Kenya) SEO signals --}}
    <meta name="geo.region" content="KE">
    <meta name="geo.placename" content="Nairobi, Kenya">
    <meta name="geo.position" content="-1.292066;36.821946">
    <meta name="ICBM" content="-1.292066, 36.821946">

    <title>
        @section('title')
        {{ get_option('site_name') }} — Networking Equipment in Kenya
        @show
    </title>

    <meta name="description" content="@yield('meta_description', get_option('hero_header_description'))">
    <meta name="robots" content="@yield('robots', 'index, follow')">

    <link rel="canonical" href="@yield('canonical', canonical_url())" />

    @section('social-meta')
    <!-- Open Graph Meta Tags -->
    <meta property="og:locale" content="en_KE" />
    <meta property="og:site_name" content="{{ get_option('site_name') }}" />
    <meta property="og:type" content="@yield('og_type', 'website')" />
    <meta property="og:title" content="@yield('og_title', get_option('hero_header_title'))" />
    <meta property="og:description" content="@yield('og_description', get_option('hero_header_description'))" />
    <meta property="og:url" content="@yield('og_url', canonical_url())" />
    <meta property="og:image" content="@yield('og_image', url('/').'/lucare/assets/imgs/theme/og-default.png')" />

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@yield('twitter_title', get_option('hero_header_title'))" />
    <meta name="twitter:description" content="@yield('twitter_description', get_option('hero_header_description'))" />
    <meta name="twitter:image" content="@yield('twitter_image', url('/').'/lucare/assets/imgs/theme/og-default.png')" />
    @show

    <!-- Favicons -->
    @php $favicon = get_option('favicon'); @endphp
    <link rel="apple-touch-icon" sizes="180x180" href="{{ (!empty($favicon) && $favicon !== 'favicon') ? $favicon : '/favicon.ico' }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ (!empty($favicon) && $favicon !== 'favicon') ? $favicon : '/favicon.ico' }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ (!empty($favicon) && $favicon !== 'favicon') ? $favicon : '/favicon.ico' }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ (!empty($favicon) && $favicon !== 'favicon') ? $favicon : '/favicon.ico' }}">
    <meta name="msapplication-TileImage" content="{{ (!empty($favicon) && $favicon !== 'favicon') ? $favicon : '/favicon.ico' }}">

    <!-- Preload Critical CSS -->
    <link rel="preload" href="{{ url('/') }}/lucare/assets/css/main.css?v=3.4" as="style">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" as="style">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/lucare/assets/css/main.css?v=3.4">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/') }}/lucare/assets/css/style.css">

    <style>
        .tawa-header { background: #fff; border-bottom: 1px solid #eceff4; position: sticky; top: 0; z-index: 1020; }
        .tawa-header .container { max-width: 1400px; }
        .tawa-header-row { height: 62px; gap: 20px; }
        .tawa-logo { flex-shrink: 0; text-decoration: none; }
        .tawa-logo .brand-logo { font-size: 1.35rem; }

        .tawa-nav ul { display: flex; list-style: none; margin: 0; padding: 0; align-items: center; gap: 2px; }
        .tawa-nav > ul > li > a { display: block; padding: 8px 11px; font-weight: 600; font-size: 13.5px; color: #253d4e; text-decoration: none; white-space: nowrap; border-radius: 8px; transition: color .15s ease, background .15s ease; }
        .tawa-nav > ul > li > a:hover { color: #088178; background: #f4f6f9; }

        @media (min-width: 992px) {
            .tawa-nav .dropdown { position: relative; }
            .tawa-nav .dropdown-menu {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                margin-top: 0;
                min-width: 210px;
                padding: 6px 0;
                border: 0;
                border-radius: 8px;
                box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
                list-style: none;
                z-index: 1000;
                background: #fff;
            }
            .tawa-nav .dropdown:hover > .dropdown-menu,
            .tawa-nav .dropdown.open > .dropdown-menu { display: block; }
            .tawa-nav .dropdown-item { display: block; padding: 7px 16px; font-size: 13.5px; color: #253d4e; text-decoration: none; transition: background .15s ease, color .15s ease; }
            .tawa-nav .dropdown-item:hover { background: #f4f6f9; color: #088178; }
        }

        .tawa-search { flex: 1; max-width: 340px; min-width: 180px; }
        .tawa-search form { display: flex; align-items: center; border: 1px solid #e2e6ec; border-radius: 999px; overflow: hidden; background: #f7f8fa; }
        .tawa-search input { flex: 1; border: 0; padding: 9px 16px; font-size: 13.5px; background: transparent; outline: none; color: #253d4e; }
        .tawa-search button { border: 0; background: #0b6efd; color: #fff; padding: 0 15px; height: 36px; cursor: pointer; }

        .tawa-actions { display: flex; align-items: center; gap: 14px; }
        .tawa-action { position: relative; color: #253d4e; font-size: 20px; line-height: 1; text-decoration: none; }
        .tawa-action:hover { color: #088178; }
        .tawa-count { position: absolute; top: -8px; right: -10px; background: #0b6efd; color: #fff; font-size: 10.5px; border-radius: 999px; min-width: 18px; height: 18px; line-height: 18px; text-align: center; padding: 0 4px; font-weight: 700; }
        .tawa-account { background: #253d4e; color: #fff; padding: 8px 16px; border-radius: 999px; font-size: 13.5px; font-weight: 600; text-decoration: none; white-space: nowrap; }
        .tawa-account:hover { background: #088178; color: #fff; }

        .burger-icon { cursor: pointer; width: 26px; }

        /* Bootstrap modal support (theme only ships .custom-modal, not .modal) */
        .modal { display: none; }
        .modal.show { display: block; position: fixed; top: 0; left: 0; z-index: 1055; width: 100%; height: 100%; overflow-x: hidden; overflow-y: auto; outline: 0; }
        .modal-dialog { position: relative; width: auto; margin: 1.75rem auto; max-width: 500px; }
        .modal-content { position: relative; display: flex; flex-direction: column; width: 100%; background-color: #fff; border-radius: 0.3rem; box-shadow: 0 0.25rem 0.75rem rgba(0,0,0,0.15); }
        .modal-header { display: flex; align-items: center; justify-content: space-between; padding: 1rem; border-bottom: 1px solid #dee2e6; }
        .modal-body { padding: 1rem; }
        .modal-backdrop { position: fixed; top: 0; left: 0; z-index: 1050; width: 100vw; height: 100vh; background-color: #000; opacity: 0.5; }
    </style>

    <!-- Site-wide JSON-LD: Organization + WebSite -->
    @php
        $siteLogo = get_option('logo');
        $hasLogo = !empty($siteLogo) && $siteLogo !== 'logo';
    @endphp
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [
            {
                "@type": "Organization",
                "@id": "{{ url('/') }}#organization",
                "name": "{{ get_option('site_name') }}",
                "url": "{{ url('/') }}",
                @if($hasLogo)"logo": "{{ $siteLogo }}",@endif
                "description": "{{ get_option('hero_header_description') }}",
                "email": "{{ get_option('contact_email') }}",
                "telephone": "{{ get_option('contact_phone') }}",
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "{{ get_option('address') }}",
                    "addressLocality": "Nairobi",
                    "addressCountry": "KE"
                },
                "contactPoint": {
                    "@type": "ContactPoint",
                    "telephone": "{{ get_option('contact_phone') }}",
                    "contactType": "sales",
                    "email": "{{ get_option('contact_email') }}",
                    "areaServed": "KE"
                },
                "sameAs": [
                    "{{ get_option('facebook') }}",
                    "{{ get_option('twitter') }}",
                    "{{ get_option('instagram') }}",
                    "{{ get_option('linkedin') }}"
                ]
            },
            {
                "@type": "WebSite",
                "@id": "{{ url('/') }}#website",
                "url": "{{ url('/') }}",
                "name": "{{ get_option('site_name') }}",
                "publisher": { "@id": "{{ url('/') }}#organization" },
                "potentialAction": {
                    "@type": "SearchAction",
                    "target": { "@type": "EntryPoint", "urlTemplate": "{{ url('/shop') }}?q={search_term_string}" },
                    "query-input": "required name=search_term_string"
                }
            }
        ]
    }
    </script>

    @stack('meta')
    @yield('styles')
</head>


<body>
    <header class="header-area header-style-1 tawa-header">
        @php
            $menuCategories = \App\Models\Category::with('subCategories')->orderBy('id')->get();
            $menuBrands = \App\Models\Brand::where('is_active', true)->orderBy('name')->get();
            $cartCount = count(session()->get('cart', []));
        @endphp

        <div class="container">
            <div class="tawa-header-row d-none d-lg-flex align-items-center justify-content-between">
                <a href="{{ url('/') }}" class="tawa-logo">@include('partials.logo')</a>

                <nav class="tawa-nav">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        @foreach($menuCategories as $mc)
                        <li class="dropdown">
                            <a href="{{ route('view_product_category', $mc->slug) }}" class="dropdown-toggle">{{ $mc->name }}</a>
                            @if($mc->subCategories->count() > 0)
                            <ul class="dropdown-menu">
                                @foreach($mc->subCategories as $msc)
                                <li><a class="dropdown-item" href="{{ route('view_product_sub_category', ['category' => $mc->slug, 'subcategory' => $msc->slug]) }}">{{ $msc->name }}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                        <li class="dropdown">
                            <a href="{{ route('brands.index') }}" class="dropdown-toggle">Brands</a>
                            <ul class="dropdown-menu">
                                @foreach($menuBrands as $mb)
                                <li><a class="dropdown-item" href="{{ route('brand.show', $mb->slug) }}">{{ $mb->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{ route('blogs') }}">Blog</a></li>
                        <li><a href="{{ route('contacts') }}">Contact</a></li>
                    </ul>
                </nav>

                <div class="tawa-search">
                    <form action="{{ url('shop') }}" method="get">
                        <input type="text" name="q" placeholder="Search products, models (e.g. RB4011, CPE510)..." required>
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>

                <div class="tawa-actions">
                    <a href="{{ route('wishlist.index') }}" class="tawa-action" title="Wishlist"><i class="fa fa-heart"></i></a>
                    <a href="{{ route('cart.view') }}" class="tawa-action" title="Cart"><i class="fa fa-shopping-cart"></i><span class="tawa-count">{{ $cartCount }}</span></a>
                    <a href="{{ route('login') }}" class="tawa-account" title="Account"><i class="fa fa-user"></i> Account</a>
                </div>
            </div>

            <div class="tawa-header-row d-lg-none align-items-center justify-content-between">
                <a href="{{ url('/') }}" class="tawa-logo">@include('partials.logo')</a>
                <div class="d-flex align-items-center">
                    <a href="{{ route('cart.view') }}" class="tawa-action me-3"><i class="fa fa-shopping-cart"></i><span class="tawa-count">{{ $cartCount }}</span></a>
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="{{ url('/') }}">@include('partials.logo')</a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                   <form action="{{ url('shop') }}" method="get">
                    <input type="text" name="q" placeholder="Search products, models (e.g. RB4011, CPE510)...">
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">

                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu">

                        @foreach($menuCategories as $mc)
                        <li class="menu-item-has-children">
                            <a href="{{ route('view_product_category', $mc->slug) }}">{{ $mc->name }}</a>
                            @if($mc->subCategories->count() > 0)
                            <ul class="dropdown">
                                @foreach($mc->subCategories as $msc)
                                <li><a href="{{ route('view_product_sub_category', ['category' => $mc->slug, 'subcategory' => $msc->slug]) }}">{{ $msc->name }}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach

                        <li class="menu-item-has-children">
                            <a href="{{ route('brands.index') }}">Brands</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('blogs') }}">Blog</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('contacts') }}">Contact</a>
                        </li>

                        
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap mobile-header-border">
                <div class="single-mobile-header-info mt-30">
                    <a href="page-contact.html"> Our location </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="{{ url('login') }}">Log In / Sign Up </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="#">{{ get_option('contact_phone') }} </a>
                </div>
            </div>
            <div class="mobile-social-icon">
                <h5 class="mb-15 text-grey-4">Follow Us</h5>
                <a href="#"><img src="{{ url('/') }}/lucare/assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                <a href="#"><img src="{{ url('/') }}/lucare/assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                <a href="#"><img src="{{ url('/') }}/lucare/assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                <a href="#"><img src="{{ url('/') }}/lucare/assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                <a href="#"><img src="{{ url('/') }}/lucare/assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
            </div>
        </div>
    </div>
</div>
<main class="main">


   @include('flash_msg')
