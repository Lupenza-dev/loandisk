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
                          <li class="breadcrumb-item"><a href="javascript: void(0);">Loan Type</a></li>
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
                      <h4 class="card-title">Loan Type</h4>
                      <button type="button" data-bs-toggle="modal" data-bs-target="#newContactModal" class="btn btn-success btn-rounded waves-effect waves-light addContact-modal mb-2"><i class="mdi mdi-plus me-1"></i> Add Loan Type</button>
                    </div>

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Reg Date</th>
                            <th>Name</th>
                            <th>Plan</th>
                            <th>Maturity</th>
                            <th>Interest (%)</th>
                            <th>Grace Period</th>
                            <th>Loan Repayment Mode</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($loan_types as $loan_type)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $loan_type->created_at }}</td>
                                <td>{{ $loan_type->name }}</td>
                                <td>{{ $loan_type->plan }}</td>
                                <td>{{ $loan_type->maturity }}</td>
                                <td>{{ $loan_type->interest }}</td>
                                <td>{{ $loan_type->grace_period }}</td>
                                <td>{{ $loan_type->loan_calculation?->name }}</td>
                                <td>{!! $loan_type->status_label !!}</td>
                                <td>Actions</td>
                            </tr> 
                        @endforeach
                        </tbody>

                       
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
                <h5 class="modal-title" id="newContactModalLabel">Add Loan Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="registration_form">
                    <div class="row">
                        <div class="col-lg-12">
                            
                            <div class="mb-3">
                                <label for="username-input" class="form-label">Type Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Loan Type name" required />
                                <div class="invalid-feedback">Please enter a name.</div>
                            </div>
                            <div class="mb-3">
                                <label for="designation-input" class="form-label">Plan (Months)</label>
                                <input type="text" id="designation-input" name="plan" class="form-control" placeholder="Enter Plan in form of 2,4,6" required />
                                <div class="invalid-feedback" style="display: contents">Please enter plan separate by comma (,)</div>
                            </div>
                            <div class="mb-3">
                                <label for="email-input" class="form-label">Loan Maturity</label>
                                <input type="number" id="email-input" class="form-control" name="maturity" placeholder="Enter Loan Maturity" required />
                                <div class="invalid-feedback" style="display: contents">Total Months of Loan Cycle.</div>
                            </div>
                            <div class="mb-3">
                                <label for="designation-input" class="form-label">Interest (per year)</label>
                                <input type="text" id="designation-input" name="interest" class="form-control" placeholder="Enter Interest per Year Eg 12 or 3" required />
                                <div class="invalid-feedback">Please enter plan separate by comma (,)</div>
                            </div>
                            <div class="mb-3">
                                <label for="designation-input" class="form-label">Grace Period (days)</label>
                                <input type="number" id="designation-input" name="grace_period" class="form-control" placeholder="Enter Interest per Year Eg 12 or 3" required />
                                <div class="invalid-feedback" style="display: contents">Days which can be tolerable during late repayments</div>
                            </div>
                            <div class="mb-3">
                                <label for="email-input" class="form-label">Loan Calculation Method</label>
                                <select name="loan_repayment_id" class="form-control">
                                    <option value="" selected>Select Loan Calculation Method</option>
                                    @foreach ($repayments as $repayment)
                                        <option value="{{ $repayment->id}}">{{ $repayment->name }}</option>  
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3" id="alert"></div>
                            
                        </div>
                        <div class="col-lg-12">
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" id="reg_btn" class="btn btn-success">Add Type</button>
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
    url:"{{ route('loan.type.store')}}",
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
              $('#reg_btn').html('<i class="fa fa-plus"></i> Add Type');
              $('#reg_btn').attr('disabled', false);
            }
    });
});
});
  </script> 
@endpush