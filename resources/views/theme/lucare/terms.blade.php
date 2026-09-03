
@extends('theme.lucare.layouts.main')
@section('title') Terms &amp; Conditions | {{ get_option('site_name') }} @endsection
@section('meta_description', 'Read the terms and conditions for buying networking equipment from '.get_option('site_name').' in Kenya.')
@section('main')

<section class="py-5" id="terms">
    <div class="container">
       {!! get_option('terms') !!}
    </div>
</section>
 @endsection