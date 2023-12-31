@extends('admin.layout.admin_layout')
@section('content')

    <div class="row">
    
    <div class="col-lg-10">
       <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Create Blog</h5>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card">
              <div class="card-body">
                <form action="{{ route('admin.storeBlog') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" aria-describedby="emailHelp" required>
                   </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label" required>Image</label>
                    <input type="file" name="image" class="form-control" id="file">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label" required >Content</label>
                    <textarea  class="form-control" name="content" ></textarea>
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