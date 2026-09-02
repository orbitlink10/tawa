@extends('layouts.appbar')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-sm-6 d-flex align-items-center">
                    <h1 class="h3 font-weight-bold">Pages</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Card -->
                    <div class="card shadow-lg rounded-lg border-0">
                        <div class="card-header   d-flex justify-content-between align-items-center">
                            <h3 class="card-title mb-0">Post List</h3>
                            <a class="btn btn-light btn-sm text-primary font-weight-bold" href="{{ route('new_post') }}">
                                <i class="fas fa-plus"></i> Add Page
                            </a>
                        </div>

                        <!-- Card Body (Table) -->
                        <div class="card-body">
                            <table class="table table-hover table-striped table-responsive-md">
                                @include('flash_msg')
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="width: 50px;">#</th>
                                         <th>Image</th>
                                        <th>Title</th>
                                        <th>Alt Text</th>
                                        <th>Type</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                @if ($pages->count() > 0)
                                <tbody>
                                    @foreach ($pages as $key => $page)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                     <td>


  @if($page->photo)

             <img class="default-img" src="{{ url('/') }}/storage/{{ $page->photo }}" style="width: 150px;" alt="">
                     @else

                     <img class="default-img"
                     src="{{ get_option('hero_image', 'assets/img/default-placeholder.jpg') }}" style="width: 150px;" alt="">
 
                     @endif
                                                </td>
                                        <td>{{ $page->title }}</td>
                                        <td>{{ $page->alter_text }}</td>
                                        <td>{{ $page->type }}</td>
                                        <td class="text-center">
                                            <a href="{{ post_path($page->id) }}" target="_blank" class="btn btn-outline-info btn-sm">
                                                <i class="fas fa-eye"></i> Preview
                                            </a>
                                            <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-outline-warning btn-sm">
                                                <i class="fas fa-edit"></i> Update
                                            </a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete-page{{ $page->id }}">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </a>
                                        </td>
                                    </tr>

                                    {{-- Delete Modal --}}
                                    <div class="modal fade" id="delete-page{{ $page->id }}">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content rounded-lg shadow-lg">
                                                <div class="modal-header bg-danger text-white">
                                                    <h4 class="modal-title">Delete Page</h4>
                                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this page?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <form action="{{ route('delete-page', $page->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End of Delete Modal --}}

                                    @endforeach
                                </tbody>
                                @else
                                <tbody>
                                    <tr>
                                        <td colspan="5" class="text-center">No Product Found</td>
                                    </tr>
                                </tbody>
                                @endif
                            </table>
                        </div>
                        <!-- Card Footer -->
                        <div class="card-footer clearfix">
                            <nav aria-label="Page navigation">
                                <ul class="pagination pagination-sm justify-content-end">
                                    {{ $pages->links('pagination::bootstrap-4') }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- End of Card -->

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
