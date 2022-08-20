<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/logo.png') }}">
  <!-- Template CSS -->
  <link href="{{ asset('backend/assets/css/main.css') }}" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <style>

    /*============================================
    CUSTOM TOASTER STYLE
    ============================================*/

    .toast {
      background-color: #030303 !important;
    }
    .toast-info {
      background-color: #3276b1 !important;
    }
    .toast-info2 {
      background-color: #2f96b4 !important;
    }
    .toast-error {
      background-color: #bd362f !important;
    }
    .toast-success {
      background-color: #51a351 !important;
    }
    .toast-warning {
      background-color: #f89406 !important;
    }

  </style>
    
</head>

<body>

  <div class="screen-overlay"></div>

  <!--=========================================
  DASHBOARD SIDEBAR
  ==========================================-->

  @include('admin.body.sidebar')

  <!--=========================================
  DASHBOARD MAIN 
  ==========================================-->

  <main class="main-wrap">

    <!--=========================================
    DASHBOARD HEADER
    ==========================================-->

      @include('admin.body.header')

      <!--=========================================
      DASHBOARD DINAMIC CONTENT
      ==========================================-->
      <div>
      @yield('admin')
      </div>

      <!--=========================================
      DASHBOARD FOOTER
      ==========================================-->
      @include('admin.body.footer')

  </main>

<!--=========================================
JS PLUGINS
==========================================-->

<script src="{{ asset('backend/assets/js/vendors/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/vendors/select2.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/vendors/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('backend/assets/js/vendors/jquery.fullscreen.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/vendors/chart.js') }}"></script>

<!--=========================================
JS MAIN SCRIPTS
==========================================-->

<script src="{{ asset('backend/assets/js/main.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/js/custom-chart.js') }}" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--=========================================
JS TOASTER SCRIPTS
==========================================-->
<script>

  @if(Session::has('message'))
    
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch (type) {
      case 'info':
        toastr.info(" {{ Session::get('message') }} ")
        break;
    
      case 'success':
        toastr.success(" {{ Session::get('message') }} ")
        break;

      case 'warning':
        toastr.warning(" {{ Session::get('message') }} ")
        break;

      case 'error':
        toastr.error(" {{ Session::get('message') }} ")
        break;
    }

  @endif

</script>


<!--=========================================
JS SWEET-ALERT CONFIRM ACTION
==========================================-->
<script type="text/javascript">
  $(function(){
    $(document).on('click','#delete',function(e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
        title: 'Are you sure?',
        text: "Delete This Data?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link 
          Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
          )
        }
      }); //end sweet alert script
    }); 
  }); //end script
</script>

@stack('scripts')
</body>
</html>

