@extends('admin.layout.admin_layout')
@section('content')
    <div class="row">

        <div class="col-lg-12">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4"> Product List</h5>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-hover display" id="myTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Hsn Code</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Category </th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Discount</th>
                                            <th scope="col">Mrp</th>
                                            <th scope="col">Stock</th>
                                            <th scope="col">Size</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Review</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productData as $element)
                                            <tr>
                                                <td>{{ $element->hsn_code }}</td>
                                                <td>{{ $element->title }}</td>
                                                <td>{{ $element->category_name }} </td>
                                                <td>{{ $element->price }}</td>
                                                <td>{{ $element->discount }}</td>
                                                <td>{{ $element->mrp }}</td>
                                                <td style="color: {{ $element->stock <= 10 ? 'red' : 'green' }}">
                                                    {{ $element->stock }}
                                                </td>
                                                <td>{{ $element->packing_size }}</td>

                                                <td
                                                    style="color: {{ $element->status == 1 ? 'green' : 'red' }}; font-weight: bold;">
                                                    {{ $element->status == 1 ? 'Active' : 'Inactive' }}
                                                </td>

                                                <td>
                                                    {{-- Add your action buttons, e.g., Edit and Delete --}}
                                                    <a href=" " class="btn btn-sm btn-primary">Edit</a>
                                                    <a href=" " class="btn btn-sm btn-danger">Delete</a>
                                                </td>
                                                <td>
                                                    @if ($element->reviews->count() > 0)
                                                        {{-- Display the average review --}}
                                                        {{ number_format($element->reviews->avg('review'), 2) }}
                                                    @else
                                                        No reviews yet
                                                    @endif
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
