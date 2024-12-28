<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Sign-up </title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link href="{{ asset('assets/css/themes/lite-purple.min.css')}}" rel="stylesheet">
</head>
<div class="auth-layout-wrap" style="background-image: url({{ asset('assets/images/photo-wide-4.jpg')}})">
    <div class="auth-content">
        <div class="card o-hidden">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-4">
                        <h1 class="mb-3 text-18 text-center">Sign Up</h1>
                        <form action="" id="registration_form">
                            <div>
                                <h6 class="text-center" style="margin-top: 20px">Company Details</h6>
                            </div>
                            <div class="form-group">
                                <label for="username">Company name</label>
                                <input class="form-control form-control-rounded" id="company" type="text" name="company_name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Company Email address</label>
                                <input class="form-control form-control-rounded"  type="email" name="company_email" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Company address</label>
                                <input class="form-control form-control-rounded" type="text" name="company_address" required>
                            </div>
                            <div>
                                <h6 class="text-center" style="margin-top: 20px">Company Representative Details</h6>
                            </div>
                            <div class="form-group">
                                <label for="email">Fullname</label>
                                <input class="form-control form-control-rounded" type="text" name="fullname">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control form-control-rounded" type="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Phone Number</label>
                                <input class="form-control form-control-rounded"  type="number" name="phone_number" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control form-control-rounded" id="password" type="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="repassword">Retype password</label>
                                <input class="form-control form-control-rounded" id="repassword" type="password" name="password_confirmation" required>
                            </div>
                            <div id="alert">

                            </div>
                            <button id="reg_btn" class="btn btn-primary w-100 btn-rounded mt-3" type="submit">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
      url:"{{ route('sign.up')}}",
      data : new FormData(this),
      contentType: false,
      cache: false,
      processData : false,
      success:function(response){
        console.log(response);
        $('#alert').html('<div class="alert alert-success">'+response.message+'</div>');
        setTimeout(function(){
         window.location.href ="{{ route('home')}}";
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