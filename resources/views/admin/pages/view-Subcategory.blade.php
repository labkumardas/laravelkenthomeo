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
                                            <th scope="col">Subcategory</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $element)
                                            <tr>
                                                <td> {{ $element->category->title }}</td>
                                                <td>{{ $element->title }}</td>

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
