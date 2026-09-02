@extends('theme.lucare.layouts.main')
@section('title', 'Networking Guides & Blog | Tawa')
@section('meta_description', 'Networking guides and buying advice for Kenya — router comparisons, MikroTik and Ubiquiti prices, fibre optic and CCTV guides from Tawa.')

@section('main')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        @include('partials.breadcrumbs', ['items' => [['label' => 'Home', 'url' => url('/')], ['label' => 'Blog', 'url' => url('/blogs')]]])
    </div>
</div>

<section class="py-5">
    <div class="container">
        <h1 class="mb-4">Networking Guides &amp; Blog</h1>

        @if($posts->count() > 0)
        <div class="row g-4">
            @foreach($posts as $post)
            <div class="col-md-6 col-lg-4">
                <a href="{{ url('/'.$post->slug) }}" class="text-decoration-none text-dark">
                    <div class="card border-0 shadow-sm h-100">
                        @if($post->photo)
                        <img src="{{ asset('storage/'.$post->photo) }}" class="card-img-top" alt="{{ $post->title }}">
                        @endif
                        <div class="card-body">
                            <h2 class="fs-5 mb-2">{{ $post->title }}</h2>
                            <p class="text-muted small mb-0">{{ Str::limit(strip_tags($post->meta_description ?: $post->description), 120) }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $posts->links('pagination::bootstrap-4') }}
        </div>
        @else
        <p class="text-muted">New guides are on the way. Check back soon or <a href="{{ route('contacts') }}">contact us</a>.</p>
        @endif
    </div>
</section>
@endsection
