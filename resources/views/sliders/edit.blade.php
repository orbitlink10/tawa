@extends('layouts.appbar')

@section('content')
    <div class="content-wrapper">
    <h1>Edit Slider</h1>
    <form action="{{ route('sliders.update', $slider) }}" method="POST">
        @csrf
        @method('PUT')
        @include('sliders.partials.form', ['slider' => $slider])
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
