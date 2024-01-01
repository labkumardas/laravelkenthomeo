@extends('admin.layout.admin_layout')
<style>
    /* Additional style for the Remove button */
    .removeInput {
        margin-top: 5px;
    }
</style>
@section('content')
    <div class="row">

        <div class="col-lg-10">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Create About us</h5>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <form action=" " method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="exampleInputtext1" class="form-label">Select Category <span
                                                        style="color: red;">*</span></label>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <div class="mb-3">
                                                    <label for="exampleInputtext1" class="form-label">Subcategory <span
                                                            style="color: red;">*</span></label>
                                                    <select class="form-control" name="subcategory_id" id="subcategory_id"
                                                        aria-describedby="textHelp" required>
                                                        <!-- Subcategories will be dynamically loaded here -->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="exampleInputtext1" class="form-label">Product Title <span
                                                        style="color: red;">*</span></label>
                                                <input type="text" name="title" class="form-control"
                                                    id="exampleInputtext1" required>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Add more image fields as needed -->

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
