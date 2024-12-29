@extends('layouts.main')
@section('content')
<div class="main-content">
    <div class="breadcrumb">
      <h1>{{ getCompanyName()}} Branches</h1>
      <ul>
        {{-- <li><a href="">List</a></li> --}}
        <li>List of Branches</li>
      </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    {{-- <div class="row mb-4">
      <div class="col-md-12">
        <h4>Datatables</h4>
        <p>
          DataTables is a plug-in for the jQuery Javascript library. It is
          a highly flexible tool, build upon the foundations of
          progressive enhancement, that adds all of these advanced
          features to any HTML table.
        </p>
      </div>
    </div> --}}
    <!-- end of row-->
    <div class="row mb-4">
      <div class="col-md-12 mb-4">
        <div class="card text-start">
          <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-12" style="display: flex; flex-direction:row; justify-content: space-between">
                    <div></div>
                     <h4 class="card-title mb-3">Company Branches</h4>
                        <button class="btn btn-primary btn-sm"  type="button"
                        data-bs-toggle="modal"
                        data-target="#verifyModalContent"
                        data-whatever="@mdo"> <i class="fa fa-plus"></i> Add Branch</button>
                </div>

            </div>
            <div class="table-responsive">
              <table
                class="display table table-striped table-bordered"
                id="zero_configuration_table"
                style="width: 100%"
              >
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Reg Date</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($branches as $branch)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $branch->created_at }}</td>
                            <td>{{ ucwords($branch->name )}}</td>
                            <td>{{ $branch->email}}</td>
                            <td>{{ $branch->phone_number}}</td>
                            <td>{{ $branch->address}}</td>
                            <td>{!! $branch->status_label !!}</td>
                            <td>Actions</td>
                        </tr> 
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- end of col-->

      <div
      class="modal fade"
      id="verifyModalContent"
      tabindex="-1"
      role="dialog"
      aria-labelledby="verifyModalContent"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <form id="registration_form">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="verifyModalContent_title">
              New Branch
            </h5>
            <button
              class="btn btn-close"
              type="button"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label class="col-form-label" for="recipient-name-2"
                  >Name:</label
                >
                <input
                  class="form-control"
                  id="recipient-name-2"
                  type="text"
                  name="name"
                  required
                />
              </div>
              <div class="form-group">
                <label class="col-form-label" for="recipient-name-2"
                  >Email:</label
                >
                <input
                  class="form-control"
                  id="recipient-name-2"
                  type="email"
                  name="email"
                  required
                />
              </div>
              <div class="form-group">
                <label class="col-form-label" for="recipient-name-2"
                  >Phone Number:</label
                >
                <input
                  class="form-control"
                  id="recipient-name-2"
                  type="number"
                  name="phone_number"
                  required
                />
              </div>
              <div class="form-group">
                <label class="col-form-label" for="message-text-1"
                  >Location:</label
                >
                <textarea
                  class="form-control"
                  id="message-text-1"
                  name="location"
                  required
                ></textarea>
              </div>
              <div class="mt-1" id="alert">

              </div>
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button class="btn btn-primary" id="reg_btn" type="submit">
              Submit
            </button>
          </div>
        </div>
        </form>
      </div>
    </div>
   
@endsection
@push('scripts')
    <script>
    $(document).ready(function(){
      $('#registration_form').on('submit',function(e){ 
          e.preventDefault();

      $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
          });
      $.ajax({
      type:'POST',
      url:"{{ route('branches.store')}}",
      data : new FormData(this),
      contentType: false,
      cache: false,
      processData : false,
      success:function(response){
        console.log(response);
        $('#alert').html('<div class="alert alert-success">'+response.message+'</div>');
        setTimeout(function(){
         window.location.href ="{{ route('branches.index')}}";
      },500);
      },
      error:function(response){
          console.log(response.responseText);
          if (jQuery.type(response.responseJSON.errors) == "object") {
            $('#alert').html('');
          $.each(response.responseJSON.errors,function(key,value){
              $('#alert').append('<div class="alert alert-danger">'+value+'</div>');
          });
          } else {
             $('#alert').html('<div class="alert alert-danger">'+response.responseJSON.errors+'</div>');
          }
      },
      beforeSend : function(){
                   $('#reg_btn').html('<i class="fa fa-spinner fa-pulse fa-spin"></i> loading..........');
                   $('#reg_btn').attr('disabled', true);
              },
              complete : function(){
                $('#reg_btn').html('<i class="fa fa-save"></i> Register');
                $('#reg_btn').attr('disabled', false);
              }
      });
  });
  });
    </script>
@endpush