@extends('layouts.appbar')

@section('content')
    <div class="content-wrapper">
    <h1>Sliders</h1>
    <a href="{{ route('sliders.create') }}" class="btn btn-primary">Add Slider</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>H1 Title</th>
                <th>H2 Title</th>
                <th>H4 Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sliders as $slider)
            <tr>
                <td>{{ $slider->id }}</td>
                <td>{{ $slider->h1_title }}</td>
                <td>{{ $slider->h2_title }}</td>
                <td>{{ $slider->h4_title }}</td>
                <td>
                    <a href="{{ route('sliders.edit', $slider) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('sliders.destroy', $slider) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
