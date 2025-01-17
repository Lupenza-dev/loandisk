@extends('layouts.main')
@section('contents')
<div class="page-content">
  <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0 font-size-18">{{ getCompanyName()}}</h4>

                  <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                          <li class="breadcrumb-item"><a href="javascript: void(0);">Work Flow Level</a></li>
                          <li class="breadcrumb-item active">List</li>
                      </ol>
                  </div>

              </div>
          </div>
      </div>
      <!-- end page title -->

      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div style="display: flex; flex-direction: row; justify-content:space-between">
                      <div></div>
                      <h4 class="card-title">Company Work Flow Level</h4>
                      <button type="button" data-bs-toggle="modal" data-bs-target="#newContactModal" class="btn btn-success btn-rounded waves-effect waves-light addContact-modal mb-2"><i class="mdi mdi-plus me-1"></i> New Level</button>
                    </div>

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Reg Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Branch</th>
                            <th>Roles</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        {{-- <tbody>
                          @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ ucwords($user->user?->name )}}</td>
                                <td>{{ $user->user?->email}}</td>
                                <td>{{ $user->user?->phone_number}}</td>
                                <td>{{ $user->branch?->name }}</td>
                                <td>{{ $user->user->getRoleNames()}}</td>
                                <td>{!! $user->user?->status_label !!}</td>
                                <td>Actions</td>
                            </tr> 
                        @endforeach
                        </tbody> --}}

                       
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
      
  </div>
  <!-- container-fluid -->
</div>
  <!-- Modal -->
  <div class="modal fade" id="newContactModal" tabindex="-1" aria-labelledby="newContactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newContactModalLabel">Add WorkFlow Level</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="registration_form">
                    <div class="row">
                        <div class="col-lg-12">
                            
                            <div class="mb-3">
                                <label for="username-input" class="form-label">Description</label>
                                <input type="text" name="description" class="form-control" placeholder="Enter Description" required />
                                <div class="invalid-feedback">Please enter a name.</div>
                            </div>
                            <div class="mb-3">
                              <label  class="form-label">Company Branch:</label>
                            <select name="branch_id" class="form-control" required >
                                <option value="" selected>Please choose Company Branch</option>
                                @foreach ($branches as $branch)
                                   <option value="{{ $branch->id}}">{{$branch->name }}</option> 
                                @endforeach
                            </select>
                            </div>
                            <div class="mb-3">
                              <label  class="form-label">Staff Role:</label>
                            <select name="role_id" class="form-control" required >
                                <option value="" selected>Please choose Staff Role</option>
                                @foreach ($roles as $role)
                                   <option value="{{ $role->name}}">{{$role->name }}</option> 
                                @endforeach
                            </select>
                            </div>
                            <div class="mb-3">
                                <label for="form-label">Level</label>
                                <input type="number" class="form-control" name="level" placeholder="Enter Level" required>
                                <div class="invalid-feedback" style="display: contents">Level should be a sequence of number</div>
                            </div>
                            <div class="mb-3" id="alert"></div>
                            
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" id="reg_btn" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end modal body -->
        </div>
        <!-- end modal-content -->
    </div>
    <!-- end modal-dialog -->   
</div>
<!-- end newContactModal -->
    
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
    url:"{{ route('level.store')}}",
    data : new FormData(this),
    contentType: false,
    cache: false,
    processData : false,
    success:function(response){
      console.log(response);
      $('#alert').html('<div class="alert alert-success">'+response.message+'</div>');
      setTimeout(function(){
       location.reload();
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