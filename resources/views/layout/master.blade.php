
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>{{ env('APP_NAME') }} - {{$page_name ?? 'Dashboard' }}</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/perfectscroll/perfect-scrollbar.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/DataTables/datatables.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2-bootstrap-5-theme.css')}}" />
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" /> --}}
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" /> --}}

      
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
		<!-- TITLE -->
    <body>
      <div class='loader'>
        <div class='spinner-grow text-primary' role='status'>
          <span class='sr-only'>Loading...</span>
        </div>
      </div>
      <div class="loader-view" style="display: none;">
        <div class="spinner-grow text-primary" role="status">
        </div>
        <span class="sr-only">Loading...</span>
      </div>
      <div class="page-container">
					@include('layout.header')

					@include('layout.sidebar')
          
          @yield('content')
      </div>
      
      <!-- Javascripts -->
      <script src="{{ asset('assets/plugins/jquery/jquery-3.4.1.min.js') }}"></script>
      <script src="https://unpkg.com/@popperjs/core@2"></script>
      <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
      <script src="https://unpkg.com/feather-icons"></script>
      <script src="{{ asset('assets/plugins/perfectscroll/perfect-scrollbar.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
      <script src="{{ asset('assets/js/main.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/notify/js/notifIt.js') }}"></script>

      <!-- SELECT2 JS -->
      <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
      <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
      </script>
      @stack('script')
  </body>
</html>
