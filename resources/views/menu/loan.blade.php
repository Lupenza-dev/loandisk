@extends('layouts.main')
@section('contents')
<div class="page-content">
  <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                  <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                          <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                          <li class="breadcrumb-item active">Loan</li>
                      </ol>
                  </div>

              </div>
          </div>
      </div>
      <!-- end page title -->


      <div class="row">
        <div class="col-lg-6">
            <a href="{{ route('loan.types.index')}}">
                <div class="card border border-primary">
                    <div class="card-header bg-transparent border-primary">
                        <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Loan Types</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Loan Types Offered By {{getCompanyName()}}</h5>
                        <p class="card-text">Add , Edit , Activate and Deactivate Loan Types Offered by {{ getCompanyName()}}.</p>
                    </div>
                </div>
            </a>
            
        </div>
        <div class="col-lg-6">
            <a href="{{ route('users.index')}}">
            <div class="card border border-success">
                <div class="card-header bg-transparent border-success">
                    <h5 class="my-0 text-success"><i class="mdi mdi-check-all me-3"></i>Loan Repayment</h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Loan Repayment of {{getCompanyName()}}</h5>
                    <p class="card-text">Add , Edit , Activate and Deactivate Loan Repayments of {{ getCompanyName()}}</p>
                </div>
            </div>
            </a>
        </div>
    </div>
      <div class="row">
        <div class="col-lg-6">
            <a href="{{ route('loan.index')}}">
                <div class="card border border-primary">
                    <div class="card-header bg-transparent border-primary">
                        <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Customer Loans</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Customer Loans Of {{getCompanyName()}}</h5>
                        <p class="card-text">Manage Customer Loans Offered by {{ getCompanyName()}}.</p>
                    </div>
                </div>
            </a>
            
        </div>
        <div class="col-lg-6">
            <a href="{{ route('loan.index')}}">
            <div class="card border border-success">
                <div class="card-header bg-transparent border-success">
                    <h5 class="my-0 text-success"><i class="mdi mdi-check-all me-3"></i>Loan Repayment</h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Loan Repayment of {{getCompanyName()}}</h5>
                    <p class="card-text">Add , Edit , Activate and Deactivate Loan Repayments of {{ getCompanyName()}}</p>
                </div>
            </div>
            </a>
        </div>
    </div>
      
  </div>
  <!-- container-fluid -->
</div>
    
@endsection