<!DOCTYPE html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>Login</title>
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900"
    rel="stylesheet"
  />
  <link
    href="{{ asset('assets/css/themes/lite-purple.min.css')}}"
    rel="stylesheet"
  />
</head>
<div
  class="auth-layout-wrap"
  style="background-image: url({{ asset('assets/images/photo-wide-4.jpg')}})"
>
  <div class="auth-content">
    <div class="card o-hidden">
      <div class="row">
        <div class="col-md-6">
          <div class="p-4">
            <div class="auth-logo text-center mb-4">
              <img src="{{ asset('assets/images/logo.png')}}" alt="" />
            </div>
            <h1 class="mb-3 text-18">Sign In</h1>
            <form id="user_auth">
              <div class="form-group">
                <label for="email">Email address</label>
                <input
                  class="form-control form-control-rounded"
                  id="email"
                  type="email" name="email"
                />
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input
                  class="form-control form-control-rounded"
                  id="password"
                  type="password"
                  name="password"
                />
              </div>
              <div id="user_auth_alert">
                
              </div>
              <button class="btn btn-rounded btn-primary w-100 mt-2" id="user_btn" type="submit">
                Sign In
              </button>
            </form>
            <div class="mt-3 text-center">
              <a class="text-muted" href="forgot.html">
                <u>Forgot Password?</u></a
              >
            </div>
             <a
              class="btn btn-rounded btn-outline-primary btn-outline-email w-100 btn-icon-text mt-2"
              href="{{ route('sign.up')}}"
              ><i class="i-Mail-with-At-Sign"></i> Sign up</a
            >
          </div>
        </div>
        <div
          class="col-md-6 text-center"
          style="
            background-size: cover;
            background-image: url({{ asset('assets/images/photo-long-3.jpg')}});
          "
        >
          <div class="pe-3 auth-right">
            {{-- <a
              class="btn btn-rounded btn-outline-primary btn-outline-email w-100 btn-icon-text"
              href="signup.html"
              ><i class="i-Mail-with-At-Sign"></i> Sign up with Email</a
            >
            <a class="btn btn-rounded btn-outline-google w-100 btn-icon-text"
              ><i class="i-Google-Plus"></i> Sign up with Google</a
            ><a class="btn btn-rounded w-100 btn-icon-text btn-outline-facebook"
              ><i class="i-Facebook-2"></i> Sign up with Facebook</a
            > --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function(){
      $('#user_auth').on('submit',function(e){
          e.preventDefault();
       var dataz =$(this).serialize();
          $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
          });

      $.ajax({
      type:'POST',
      url:"{{ route('authenticate.user')}}",
      data:dataz,
      success:function(response){
          console.log(response);
          // $.notify(response.message, "success");
        setTimeout(function(){
          window.location.href=response.url;
        },500);
       
      },
      error:function(response){
          console.log(response.responseText);
          if (jQuery.type(response.responseJSON.errors) == "object") {
            $('#user_auth_alert').html('');
          $.each(response.responseJSON.errors,function(key,value){
              $('#user_auth_alert').append('<div class="alert alert-danger">'+value+'</div>');
          });
          } else {
             $('#user_auth_alert').html('<div class="alert alert-danger">'+response.responseJSON.errors+'</div>');
          }
      },
      beforeSend : function(){
          $('#user_btn').html('<span class="fas fa-spinner fas-pulse fas-spin"></span> Authenticating ---');
          $('#user_btn').attr('disabled', true);
      },
     complete : function(){
          $('#user_btn').html('<span class="fas fa-sign-in-alt"></span> Sign In');
          $('#user_btn').attr('disabled', false);
      }
      });
  });
  });
</script>  
