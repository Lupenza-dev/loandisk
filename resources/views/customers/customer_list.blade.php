@extends('layouts.main')
@section('content')
<div class="main-content">
    <div class="breadcrumb">
      <h1>{{ getCompanyName()}} Customers</h1>
      <ul>
        {{-- <li><a href="">List</a></li> --}}
        <li>List of Company Customers</li>
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
                     <h4 class="card-title mb-3">Customers</h4>
                     <a href="{{ route('customers.create')}}">
                        <button class="btn btn-primary btn-sm"  type="button"> <i class="fa fa-plus"></i> Add Customer</button>
                     </a>
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
                    <th>Branch</th>
                    <th>Roles</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($users as $user)
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
                    @endforeach --}}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
   
@endsection
