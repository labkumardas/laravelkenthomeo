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
                        <th scope="col">#</th>
                        <th scope="col">  Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td><button type="button" class="btn btn-warning m-1">Warning</button></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td><button type="button" class="btn btn-warning m-1">Warning</button></td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td><button type="button" class="btn btn-warning m-1">Warning</button></td>
                      </tr>
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