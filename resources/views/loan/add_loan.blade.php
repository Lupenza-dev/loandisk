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
                          <li class="breadcrumb-item"><a href="javascript: void(0);">Customer Loan</a></li>
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

                    <h4 class="card-title text-center">Add Loan</h4>

                    <form id="registration_form">
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <label class="form-label">Customer Name</label>
                                <select name="customer_id" class="form-control select2">
                                    <option value="" selected>Please search Customer</option>
                                    @foreach ($customers as $customer)
                                      <option value="{{ $customer->customer_id}}">{{ $customer->customer?->customer_name}} {{ $customer->customer?->phone_number}}</option>  
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label class="form-label">Amount</label>
                                <input type="number" class="form-control" placeholder="Enter Amount Requested" name="amount" required>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Type of Loan</label>
                                <select name="loan_type_id" class="form-control" id="loan_type" required>
                                    <option value="" selected>Please select Type Of Loan</option>
                                    @foreach ($loan_types as $loan_type)
                                        <option value="{{ $loan_type->id}}">{{ $loan_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                      
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label class="form-label">Plan</label>
                                <select name="loan_type_id" class="form-control" id="plan" required>
                                    <option value="" selected>Please select Plan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <div class="col-md-12">
                                <h4 class="card-title text-center">Guarantors Details</h4>
                            </div>
                        </div>
                        <div class="guarantor-container">
                            <div class="row-to-repeat-guarantor">
                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <label for="form-label">Fullname</label>
                                        <input type="text" name="fullname[]" class="form-control" placeholder="Enter Guarantor Fullname">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="form-label">Phone Number</label>
                                        <input type="number" name="phone_number[]" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <label for="form-label">Relation</label>
                                        <input type="text" name="relationship[]" class="form-control" placeholder="Enter Guarantor Relationship">
                                    </div>
                                    <div class="col-lg-5">
                                        <label for="form-label">Location</label>
                                        <input type="text" name="location[]" class="form-control" placeholder="Enter Guarantor Physical Address">
                                    </div>
                                    <div class="col-lg-1">
                                        <button type="button"  class="btn btn-primary mt-4 guarantor-btn"><i class="bx bx-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="row mb-3 mt-4">
                            <div class="col-md-12">
                                <h4 class="card-title text-center">Loan Attachment</h4>
                            </div>
                        </div>
                        <div class="attachment-container">
                            <div class="attachment-row">
                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <label for="">Attachment Name</label>
                                        <input type="text" class="form-control" name="attachment_name[]" placeholder="Enter Attachment Name">
                                    </div>
                                    <div class="col-lg-5">
                                        <label for="form-label">Attachment</label>
                                        <input type="file" name="location[]" class="form-control">
                                    </div>
                                    <div class="col-lg-1">
                                        <button type="button"  class="btn btn-primary mt-4 attachment-btn"><i class="bx bx-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12 mb-3" id="alert"></div>

                        </div>
                        <div class="row">
                            <div class="row-lg-12 text-center">
                                <button type="submit" id="reg_btn"  class="btn btn-primary btn-rounded waves-effect waves-light mb-2"><i class="mdi mdi-plus me-1"></i> New Loan</button>

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
    $('#loan_type').on('change',function(){
        var loan_type_id =$(this).val();
        $.ajax({
    type:'Get',
    url:"{{ url('get-plan')}}" + "/" + loan_type_id,
    success:function(response){
      console.log(response);
      $('#plan').empty();
      $('#plan').append('<option value="">Select plan</option>');
        $.each(response, function(key, plan) {
            $('#plan').append('<option value="' + plan.id + '">' + plan.name + '</option>');
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
    <script>
        $('.guarantor-btn').on('click',function(){
            const clonedDiv = $(this).closest('.row-to-repeat-guarantor').clone(); 
             // Clear the inputs in the cloned div
            clonedDiv.find('input').val('');
            clonedDiv.find('.guarantor-btn')
            // .text('Remove')
            .html('<i class="bx bx-minus"></i>')
            .removeClass('guarantor-btn')
            .removeClass('btn-primary')
            .addClass('remove-btn')
            .addClass('btn-danger');

            // Append the cloned div to the container
            $('.guarantor-container').append(clonedDiv);

        });

        $('.guarantor-container').on('click', '.remove-btn', function () {
            // Remove the parent div of the button
            $(this).closest('.row-to-repeat-guarantor').remove();
        });
    </script>
    <script>
        $('.attachment-btn').on('click',function(){
            const clonedDiv = $(this).closest('.attachment-row').clone(); 
             // Clear the inputs in the cloned div
            clonedDiv.find('input').val('');
            clonedDiv.find('.attachment-btn')
            // .text('Remove')
            .html('<i class="bx bx-minus"></i>')
            .removeClass('attachment-btn')
            .removeClass('btn-primary')
            .addClass('remove-attachment-btn')
            .addClass('btn-danger');

            // Append the cloned div to the container
            $('.attachment-container').append(clonedDiv);

        });

        $('.attachment-container').on('click', '.remove-attachment-btn', function () {
            // Remove the parent div of the button
            $(this).closest('.attachment-row').remove();
        });
    </script>
   
    
@endpush
