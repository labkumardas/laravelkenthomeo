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
                        <h5 class="card-title fw-semibold mb-4">Create Product</h5>
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
                                <form action="{{ route('admin.storeProduct') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="exampleInputtext1" class="form-label">Select Category <span
                                                        style="color: red;">*</span></label>
                                                <select class="form-control" name="category_id" required>
                                                    <option>Select One</option>
                                                    @foreach ($data as $element)
                                                        <option value="{{ $element->id }}">{{ $element->title }}</option>
                                                    @endforeach
                                                </select>
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
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="exampleInputtext1" class="form-label">Product Stock <span
                                                        style="color: red;">*</span></label>
                                                <input type="number" name="stock" class="form-control"
                                                    id="exampleInputtext1" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="exampleInputtext1" class="form-label">Packing Size(ml)
                                                    <span style="color: red;">*</span></label>
                                                <input type="text" name="packing_size" class="form-control"
                                                    id="exampleInputtext1" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="exampleInputtext1" class="form-label">Select Status <span
                                                        style="color: red;">*</span></label>
                                                <select class="form-control" name="status" required>

                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>


                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- Add similar row/column structure for other fields -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="exampleInputtext1" class="form-label">Diseases Curable <span
                                                        style="color: red;">*</span></label>
                                                <input type="text" name="diseases_curable" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="exampleInputtext1" class="form-label">MRP <span
                                                        style="color: red;">*</span></label>
                                                <input type="text" class="form-control" name="mrp" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="exampleInputtext1" class="form-label">Price <span
                                                        style="color: red;">*</span></label>
                                                <input type="text" class="form-control" name="price" required>
                                            </div>
                                        </div>


                                        <!-- Add similar row/column structure for other fields -->


                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="exampleInputtext1" class="form-label">Discount <span
                                                        style="color: red;">*</span></label>
                                                <input type="text" name="discount" class="form-control" required>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="exampleInputtext1" class="form-label">Hsn Code <span
                                                        style="color: red;">*</span></label>
                                                <input type="text" class="form-control" name="hsn_code" required>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="exampleInputtext1" class="form-label">Gst rate <span
                                                        style="color: red;">*</span></label>
                                                <input type="text" class="form-control" name="gst_rate" required>
                                            </div>
                                        </div>


                                    </div>
                                    <hr>
                                    <!-- Add similar row/column structure for other fields -->

                                    <div class="row">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <!-- Initial image upload option -->
                                                <div class="mb-3">
                                                    <label for="exampleInputtext1" class="form-label">Image 1 <span
                                                            style="color: red;">*</span></label>
                                                    <input type="file" class="form-control" name="images[]"
                                                        accept="image/*">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Add more images container -->
                                        <div class="row image-container"></div>

                                        <!-- Add More button -->
                                        <button type="button" id="addMoreImages" class="btn btn-primary"
                                            style="width: 18%;">Add More Images</button>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8"></div>
                                    </div>
                                    <!-- Add similar row/column structure for other fields -->
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                                <label for="exampleInputtext1" class="form-label">short_description
                                                    <span style="color: red;">*</span></label>
                                                <textarea name="short_description" id="productDescription" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                                <label for="exampleInputtext1" class="form-label">Description <span
                                                        style="color: red;">*</span></label>
                                                <textarea class="form-control" id="productDescription" name="long_description" required> </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/dynamic_subcategory.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Counter to keep track of added image fields
            var imageCounter = 1;

            // Add more images dynamically
            $('#addMoreImages').click(function() {
                var newInput = '<div class="col-md-4" id="imageField' + imageCounter + '">' +
                    '<div class="mb-3"><label for="exampleInputtext1" class="form-label">Image ' +
                    (imageCounter + 1) + '<span style="color: red;">*</span></label>' +
                    '<input type="file" class="form-control" name="images[]" accept="image/*">' +
                    '<button type="button" class="btn btn-danger removeInput" onclick="removeImageField(' +
                    imageCounter + ')">Remove</button>' +
                    '</div></div>';

                // Append the new input field
                $('.image-container').append(newInput);

                // Increment the counter
                imageCounter++;
            });

            // Remove image field
            window.removeImageField = function(counter) {
                $('#imageField' + counter).remove();
            };
        });
    </script>
@endsection
