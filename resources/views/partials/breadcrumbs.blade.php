@php
    $items = $items ?? [];
@endphp
@if(!empty($items))
<nav aria-label="breadcrumb" class="breadcrumb-wrap">
    <ol class="breadcrumb bg-transparent px-0 mb-0">
        @foreach($items as $i => $item)
            @if($loop->last)
                <li class="breadcrumb-item active" aria-current="page">{{ $item['label'] }}</li>
            @else
                <li class="breadcrumb-item"><a href="{{ $item['url'] }}">{{ $item['label'] }}</a></li>
            @endif
        @endforeach
    </ol>
</nav>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        @foreach($items as $i => $item)
        {
            "@type": "ListItem",
            "position": {{ $i + 1 }},
            "name": {{ json_encode($item['label']) }},
            "item": {{ json_encode($item['url']) }}
        }@if(!$loop->last),@endif
        @endforeach
    ]
}
</script>
@endif
