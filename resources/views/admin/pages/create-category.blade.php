@extends('admin.layout.admin_layout')
@section('content')
    <div class="row">

        <div class="col-lg-6">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Create Category</h5>
                        @if (session('category_success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('category_success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('category_error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('category_error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.storeCategory') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Category Title</label>
                                        <input type="text" class="form-control" name="title"
                                            aria-describedby="emailHelp" required>
                                    </div>


                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Create Sub Category</h5>
                        @if (session('subcategory_success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('subcategory_success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('subcategory_success_error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('subcategory_success_error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.storeSubCategory') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Select Category </label>
                                        <select class="form-control" name="category_id" aria-describedby="emailHelp"
                                            required>
                                            @foreach ($categories as $element)
                                                <option value="{{ $element->id }}">{{ $element->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Sub Category Title</label>
                                        <input type="text" class="form-control" name="title"
                                            aria-describedby="emailHelp" required>
                                    </div>



                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
