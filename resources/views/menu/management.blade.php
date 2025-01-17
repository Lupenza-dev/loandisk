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
                          <li class="breadcrumb-item active">Dashboard</li>
                      </ol>
                  </div>

              </div>
          </div>
      </div>
      <!-- end page title -->


      <div class="row">
        <div class="col-lg-6">
            <a href="{{ route('branches.index')}}">
                <div class="card border border-primary">
                    <div class="card-header bg-transparent border-primary">
                        <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Company Branches</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Branches of {{getCompanyName()}}</h5>
                        <p class="card-text">Add , Edit , Activate and Deactivate Branches of {{ getCompanyName()}}.</p>
                    </div>
                </div>
            </a>
            
        </div>
        <div class="col-lg-6">
            <a href="{{ route('users.index')}}">
            <div class="card border border-success">
                <div class="card-header bg-transparent border-success">
                    <h5 class="my-0 text-success"><i class="mdi mdi-check-all me-3"></i>Company Staff</h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Company Staff of {{getCompanyName()}}</h5>
                    <p class="card-text">Add , Edit , Activate and Deactivate Company Staff of {{ getCompanyName()}}</p>
                </div>
            </div>
            </a>
        </div>
    </div>
      <div class="row">
        <div class="col-lg-6">
            <a href="{{ route('workflows.index')}}">
                <div class="card border border-primary">
                    <div class="card-header bg-transparent border-primary">
                        <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>WorkFlow Level Setting</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">WorkFlow Level of {{getCompanyName()}}</h5>
                        <p class="card-text">Add , Edit , Activate and Deactivate WorkFlow Level {{ getCompanyName()}}.</p>
                    </div>
                </div>
            </a>
        </div>
        {{-- <div class="col-lg-6">
            <a href="{{ route('users.index')}}">
            <div class="card border border-success">
                <div class="card-header bg-transparent border-success">
                    <h5 class="my-0 text-success"><i class="mdi mdi-check-all me-3"></i>Company Staff</h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Company Staff of {{getCompanyName()}}</h5>
                    <p class="card-text">Add , Edit , Activate and Deactivate Company Staff of {{ getCompanyName()}}</p>
                </div>
            </div>
            </a>
        </div> --}}
    </div>
      
  </div>
  <!-- container-fluid -->
</div>
    
@endsection