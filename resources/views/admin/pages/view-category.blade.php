@extends('admin.layout.admin_layout')
@section('content')
    <div class="row">

        <div class="col-lg-12">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">View Category</h5>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-hover display" id="myTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Category Name</th>
                                            <th scope="col">Slug</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">View SubCategory</th>
                                            <th scope="col">Total Product</th>
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $element)
                                            <tr>
                                                <td>{{ $element->title }}</td>
                                                <td>{{ $element->slug }}</td>
                                                <td>
                                                    @if ($element->status == 1)
                                                        <button type="button" class="btn btn-success m-1"> Active </button>
                                                    @else
                                                        <button type="button" class="btn btn-danger m-1"> Inactive
                                                        </button>
                                                    @endif
                                                <td>
                                                    <a href="{{ route('admin.viewSubcategory', ['id' => $element->id]) }}"
                                                        class="btn btn-info m-1">View</a>
                                                </td>
                                                <td> 5</td>
                                                <td> <a href="" class="btn btn-secondary m-1">Edit</a></td>
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
