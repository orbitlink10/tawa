@extends('layouts.appbar')

@section('content')
    <div class="content-wrapper">
    <h1>Add Slider</h1>
    <form action="{{ route('sliders.store') }}" method="POST">
        @csrf
        @include('sliders.partials.form')
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
