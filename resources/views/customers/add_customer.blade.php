@extends('layouts.main')
@section('content')
<div class="main-content">
    <div class="breadcrumb">
      <h1>{{ getCompanyName()}} Customers | </h1>
      <ul>
        {{-- <li><a href="">List</a></li> --}}
        <li>List of Company Customers</li>
      </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-body">
            <div class="card-title mb-3 text-center">Register New Customer</div>
            <form>
              <div class="row">
                <div class="col-md-6 form-group mb-3">
                  <label for="firstName1">First name</label>
                  <input class="form-control" id="firstName1" type="text" placeholder="Enter your first name"
                  />
                </div>
                <div class="col-md-6 form-group mb-3">
                  <label for="lastName1">Last name</label>
                  <input class="form-control" id="lastName1" type="text" placeholder="Enter your last name"
                  />
                </div>
                <div class="col-md-6 form-group mb-3">
                  <label for="exampleInputEmail1">Email address</label>
                  <input class="form-control" id="exampleInputEmail1" type="email" placeholder="Enter email"
                  />
                  <!--  < id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="col-md-6 form-group mb-3">
                  <label for="phone">Phone</label>
                  <input class="form-control" id="phone" placeholder="Enter phone"
                  />
                </div>
                <div class="col-md-6 form-group mb-3">
                  <label for="credit1">Cradit card number</label>
                  <input class="form-control" id="credit1" placeholder="Card"
                  />
                </div>
                <div class="col-md-6 form-group mb-3">
                  <label for="website">Website</label>
                  <input class="form-control" id="website" placeholder="Web address"
                  />
                </div>
                <div class="col-md-6 form-group mb-3">
                  <label for="picker2">Birth date</label>
                  <input class="form-control" id="picker2" placeholder="yyyy-mm-dd"
                    name="dp"
                  />
                </div>
                <div class="col-md-6 form-group mb-3">
                  <label for="picker1">Select</label>
                  <s class="form-control">
                    <option>Option 1</option>
                    <option>Option 1</option>
                    <option>Option 1</option>
                  </select>
                </div>
                <div class="col-md-12">
                  <button class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    
    </div>
   
@endsection
