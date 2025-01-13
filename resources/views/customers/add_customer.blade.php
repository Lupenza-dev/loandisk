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
                          <li class="breadcrumb-item"><a href="javascript: void(0);">Customers</a></li>
                          <li class="breadcrumb-item active">Add</li>
                      </ol>
                  </div>

              </div>
          </div>
      </div>
      <!-- end page title -->

      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title text-center">Register Customer</h4>

                    <form id="registration_form">
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" placeholder="Enter First name" name="first_name" required>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Middle Name</label>
                                <input type="text" class="form-control" placeholder="Enter Middle name" name="middle_name" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" placeholder="Enter Last name" name="last_name" required>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">DOB</label>
                                <input type="date" class="form-control"  name="dob" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Gender</label>
                                    <select class="form-control select2" name="gender_id" required>
                                        <option value="" selected>Select gender</option>
                                        @foreach ($genders as $gender)
                                         <option value="{{ $gender->id}}">{{ $gender->name }}</option>   
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Maritial Status</label>
                                    <select class="form-control select2" name="maritial_status_id" required>
                                        <option value="" selected>Select Maritial Status</option>
                                        @foreach ($maritial_status as $item)
                                         <option value="{{ $item->id}}">{{ $item->name }}</option>   
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label class="form-label">Phone Number</label>
                                <input type="number" class="form-control" placeholder="Enter Phone Number" name="phone_number" required>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" placeholder="Enter Email" name="email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">ID Type</label>
                                    <select class="form-control select2" name="id_type_id" required>
                                        <option value="" selected>Select ID Type</option>
                                        @foreach ($id_types as $item)
                                         <option value="{{ $item->id}}">{{ $item->name }}</option>   
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">ID Number</label>
                                <input type="text" class="form-control" placeholder="Enter ID Number" name="id_number" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Region</label>
                                    <select class="form-control select2" name="region_id" id="region" required>
                                        <option value="" selected>Select Region</option>
                                        @foreach ($regions as $region)
                                         <option value="{{ $region->id}}">{{ $region->name }}</option>   
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">District</label>
                                    <select class="form-control select2" name="district_id" id="district" required>
                                        <option value="" selected>Select District</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="form-label">Phyical Address</label>
                                <textarea name="location" class="form-control" required placeholder="Enter Customer Physical Address"></textarea>
                            </div>
                            <div class="col-lg-6">
                                <label for="form-label">Image</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mb-3" id="alert"></div>

                        </div>
                        <div class="row">
                            <div class="row-lg-12 text-center">
                                <button type="submit" id="reg_btn"  class="btn btn-primary btn-rounded waves-effect waves-light mb-2"><i class="mdi mdi-plus me-1"></i> New Customer</button>

                            </div>

                        </div>

                    </form>

                </div>
            </div>
            <!-- end select2 -->

        </div>


    </div>
    <!-- end row -->
      
  </div>
  <!-- container-fluid -->
</div>

    
@endsection
@push('scripts')
<script>
    $('#region').on('change',function(){
        var region_id =$(this).val();
        $.ajax({
    type:'Get',
    url:"{{ url('get-districts')}}" + "/" + region_id,
    success:function(response){
      console.log(response);
      $('#district').empty();
      $('#district').append('<option value="">Select District</option>');
        $.each(response, function(key, district) {
            $('#district').append('<option value="' + district.id + '">' + district.name + '</option>');
        });
    },
    error:function(response){
        console.log(response.responseText);
    },
    });
    })
</script>
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
      url:"{{ route('customers.store')}}",
      data : new FormData(this),
      contentType: false,
      cache: false,
      processData : false,
      success:function(response){
        console.log(response);
        $('#alert').html('<div class="alert alert-success">'+response.message+'</div>');
        setTimeout(function(){
            window.location.href ="{{ route('customers.index')}}";
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
                $('#reg_btn').html('<i class="fa fa-plus"></i> New Customer');
                $('#reg_btn').attr('disabled', false);
              }
      });
  });
  });
    </script> 
    
@endpush
