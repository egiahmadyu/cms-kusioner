
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>{{ env('APP_NAME') }} - {{$page_name ?? 'Login' }}</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/perfectscroll/perfect-scrollbar.css') }}" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/notify/css/notifIt.css') }}">
        <!-- Theme Styles -->
        <link href="{{ asset('assets/css/main.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style>
          .loader-view{position:fixed;height:100%;width:100%;background:#ffffffd1;z-index:9999;top:0;bottom:0;left:0;right:0;-webkit-transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;transition:all .2s ease-in-out}.loader-view .spinner-grow{top:50%;left:50%;margin:-20px 0 0 -20px;position:absolute;width:40px;height:40px}
        </style>
    </head>
    <body class="login-page">
        <div class='loader'>
          <div class='spinner-grow text-primary' role='status'>
            <span class='sr-only'>Loading...</span>
          </div>
        </div>
        <div class="loader-view" style="display: none;">
          <div class="spinner-grow text-primary" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </div>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-12 col-lg-4">
                    <div class="card login-box-container">
                        <div class="card-body">
                            <div class="authent-logo">
                                <img src="{{ asset('assets/images/logo@2x.png') }}" alt="">
                            </div>
                            <div class="authent-text">
                                {{-- <p>{{ env('APP_NAME')}}</p> --}}
                                <p>Please Sign-in to your account.</p>
                            </div>

                            <form class="validate-form needs-validation">
                              @csrf
                              <div class="mb-3">
                                  <div class="form-floating">
                                      <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username" required>
                                      <label for="floatingInput">Username</label>
                                    </div>
                              </div>
                              <div class="mb-3">
                                  <div class="form-floating">
                                      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass">
                                      <label for="floatingPassword">Password</label>
                                    </div>
                              </div>
                              <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-info m-b-xs">Sign In</button>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         
        
        <!-- Javascripts -->
        <script src="{{ asset('assets/plugins/jquery/jquery-3.4.1.min.js') }}"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="{{ asset('assets/plugins/perfectscroll/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/js/main.min.js') }}"></script>

        <script src="{{ asset('assets/plugins/notify/js/notifIt.js') }}"></script>
        <script src="{{asset('js/master.js')}}"></script>
        <script src="{{asset('js/auth/login.js')}}"></script>
    </body>
</html>