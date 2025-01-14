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
                          <li class="breadcrumb-item"><a href="javascript: void(0);">Loans</a></li>
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
                      <h4 class="card-title">Customer Loans</h4>
                      <a href="{{ route('create.loan')}}">
                        <button type="button" class="btn btn-success btn-rounded waves-effect waves-light addContact-modal mb-2"><i class="mdi mdi-plus me-1"></i> New Loan</button>
                      </a>
                    </div>

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Reg Date</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Phone Number</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        {{-- <tbody>
                          @foreach ($customer_companies as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ ucwords($user->customer?->customer_name )}}</td>
                                <td>{{ $user->customer?->gender?->name}}</td>
                                <td>{{ $user->customer?->phone_number}}</td>
                                <td>{{ $user->customer?->location }}</td>
                                <td>{!! $user->customer?->status_label !!}</td>
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

    
@endsection
