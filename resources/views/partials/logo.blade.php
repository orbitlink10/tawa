@php
    $siteLogo = get_option('logo');
    $siteName = get_option('site_name');
@endphp
@if(!empty($siteLogo) && $siteLogo !== 'logo')
    <img src="{{ $siteLogo }}" alt="{{ $siteName }}" style="max-height: 46px; width: auto;">
@else
    <span class="brand-logo" style="display:inline-flex; align-items:center; gap:8px; font-weight:800; font-size:1.6rem; line-height:1; color:#0b2b4a;">
        <svg width="34" height="34" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <rect width="24" height="24" rx="6" fill="#0b6efd"/>
            <circle cx="7" cy="7" r="2.4" fill="#fff"/>
            <circle cx="17" cy="7" r="2.4" fill="#fff"/>
            <circle cx="12" cy="16" r="2.4" fill="#fff"/>
            <path d="M7 7h3M14 7h3M8 8.6l2.2 5M16 8.6l-2.2 5M9.4 7.4l1 6M13.6 7.4l-1 6" stroke="#fff" stroke-width="1.3" stroke-linecap="round"/>
        </svg>
        {{ $siteName }}
    </span>
@endif
