@extends('admin.layout.admin_layout')
@section('content')
    <div class="row">

        <div class="col-lg-12">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">View Blog</h5>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col"> Title</th>
                                            <th scope="col"> Content</th>

                                            <th scope="col">Image</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $blog)
                                            <tr>
                                                <td>{{ $blog->title }}</td>
                                                <td>{{ Str::limit($blog->content, 50) }}</td>
                                                @if ($blog->image)
                                                    <td> <img src="{{ asset($blog->image) }}" alt="Blog Image"> </td>
                                                @else
                                                    <td> No Image </td>
                                                @endif
                                                <td>{{ $blog->created_at }}</td>
                                                <td>
                                                    <a href=" " class="btn btn-sm btn-primary">Edit</a>
                                                    {{-- {{ route('delete.blog', ['id' => $blog->id]) }} --}}
                                                    <a href="" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this blog?')">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
