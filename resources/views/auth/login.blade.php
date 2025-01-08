<!doctype html>
<html lang="en">

@include('layouts.head')

    <body class="auth-body-bg">
        
        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    
                    <div class="col-xl-9">
                        <div class="auth-full-bg pt-lg-5 p-4">
                            <div class="w-100">
                                <div class="bg-overlay"></div>
                                <div class="d-flex h-100 flex-column">
    
                                    <div class="p-4 mt-auto">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-7">
                                                <div class="text-center">
                                                    
                                                    <h4 class="mb-3"><i class="bx bxs-quote-alt-left text-primary h1 align-middle me-3"></i><span class="text-primary">5k</span>+ Satisfied clients</h4>
                                                    
                                                    <div dir="ltr">
                                                        <div class="owl-carousel owl-theme auth-review-carousel" id="auth-review-carousel">
                                                            <div class="item">
                                                                <div class="py-3">
                                                                    <p class="font-size-16 mb-4">" Fantastic theme with a ton of options. If you just want the HTML to integrate with your project, then this is the package. You can find the files in the 'dist' folder...no need to install git and all the other stuff the documentation talks about. "</p>
    
                                                                    <div>
                                                                        <h4 class="font-size-16 text-primary">Abs1981</h4>
                                                                        <p class="font-size-14 mb-0">- Skote User</p>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
    
                                                            <div class="item">
                                                                <div class="py-3">
                                                                    <p class="font-size-16 mb-4">" If Every Vendor on Envato are as supportive as Themesbrand, Development with be a nice experience. You guys are Wonderful. Keep us the good work. "</p>
    
                                                                    <div>
                                                                        <h4 class="font-size-16 text-primary">nezerious</h4>
                                                                        <p class="font-size-14 mb-0">- Skote User</p>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3">
                        <div class="auth-full-page-content p-md-5 p-4">
                            <div class="w-100">

                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 mb-md-5">
                                        <a href="index.html" class="d-block card-logo">
                                            <img src="{{ asset('assets/images/logo-dark.png')}}" alt="" height="18" class="card-logo-dark">
                                            <img src="{{ asset('assets/images/logo-light.png')}}" alt="" height="18" class="card-logo-light">
                                        </a>
                                    </div>
                                    <div class="my-auto">
                                        
                                        <div>
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p class="text-muted">Sign in to continue to LoanSphere</p>
                                        </div>
            
                                        <div class="mt-4">
                                            <form id="user_auth">
                
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="email" class="form-control" id="username" placeholder="Enter username" name="email" required>
                                                </div>
                        
                                                <div class="mb-3">
                                                    <div class="float-end">
                                                        <a href="#" class="text-muted">Forgot password?</a>
                                                    </div>
                                                    <label class="form-label">Password</label>
                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input type="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" name="password" required>
                                                        <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                    </div>
                                                </div>
                        
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="remember-check">
                                                    <label class="form-check-label" for="remember-check">
                                                        Remember me
                                                    </label>
                                                </div>

                                                <div class="mb-3 mt-2" id="user_auth_alert">
                                                </div>
                                                
                                                <div class="mt-3 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light" id="user_btn" type="submit">Log In</button>
                                                </div>

                                            </form>
                                            <div class="mt-5 text-center">
                                                <p>Don't have an account ? <a href="{{ route('sign.up')}}" class="fw-medium text-primary"> Signup now </a> </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4 mt-md-5 text-center">
                                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> LoanSphere. Design and developed by LoanSphere</p>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </div>

        <!-- JAVASCRIPT -->
       @include('layouts.script')
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
    </body>
</html>
