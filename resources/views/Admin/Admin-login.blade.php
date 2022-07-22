<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link href="/Theme_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- <link href="{{asset('Theme_admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css"> -->
  
 
  <!-- Custom styles for this template-->
  <!-- <link href="{{asset('Theme_admin/css/sb-admin-2.min.css')}}" rel="stylesheet"> -->
  <link href="/Theme_admin/css/sb-admin-2.min.css" rel="stylesheet">
  <script src="public/js/jquery-3.3.1.min.js"></script>

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
              <div class="col-lg-8">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Đăng nhập</h1>
                    </div>
                    <div style="color: red; margin-bottom:20px;">
                        <?php 
                          $message=Session::get('message');
                          if($message){
                            echo $message;
                            Session::put('message',null);
                          }
                        ?>
                    </div>
                    <form  action="{{URL::to('/Admin-dashboard')}}" method="post">
                    {{ csrf_field() }}
                        <div class="form-group">
                        <input type="text" class="form-control form-control-user"  name="admin_email" placeholder="Enter Email Address...">
                        </div>
                        <div class="form-group">
                        <input type="password" class="form-control form-control-user"  name="admin_password" placeholder="Password">
                        </div>
                        <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label">Remember Me</label>
                        </div>
                        </div>
                        <input type="submit" name="Login" value="Login" class="btn btn-primary btn-user btn-block">
                        

                        <hr>
                        <a href="" class="btn btn-google btn-user btn-block">
                        <i class="fab fa-google fa-fw"></i> Login with Google
                        </a>
                        <a href="" class="btn btn-facebook btn-user btn-block">
                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                        </a>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="register.html">Create an Account!</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script type="text/javascript" src="/Theme_admin/vendor/jquery/jquery.min.js"></script>
  <!-- <script type="text/javascript" src="{{asset('/Theme_admin/vendor/jquery/jquery.min.js')}}"></script>
  <script  type="text/javascript" src="{{asset('/Theme_admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> -->
  <script  type="text/javascript" src="/Theme_admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  <!-- Core plugin JavaScript-->
  <!-- <script  type="text/javascript" src="{{asset('/Theme_admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script> -->
  <script  type="text/javascript" src="/Theme_admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <!-- <script  type="text/javascript" src="{{asset('/Theme_admin/js/sb-admin-2.min.js')}}"></script> -->
  <script  type="text/javascript" src="/Theme_admin/js/sb-admin-2.min.js"></script>


</body>

</html>
