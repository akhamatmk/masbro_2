<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Admin Masbro</title>
      <!-- plugins:css -->
      <link rel="stylesheet" href="{{ asset('backend_asset/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
      <link rel="stylesheet" href="{{ asset('backend_asset/vendors/css/vendor.bundle.base.css') }}">
      <link rel="stylesheet" href="{{ asset('backend_asset/vendors/css/vendor.bundle.addons.css') }}">
      <!-- endinject -->
      <!-- plugin css for this page -->
      <!-- End plugin css for this page -->
      <!-- inject:css -->
      <link rel="stylesheet" href="{{ asset('backend_asset/css/style.css') }}">
      <!-- endinject -->
      <link rel="shortcut icon" href="{{ asset('backend_asset/images/favicon.png') }}" />
   </head>
   <body>

      @yield('content')
      <!-- container-scroller -->
      <!-- plugins:js -->
      <script src="{{ asset('backend_asset/vendors/js/vendor.bundle.base.js') }}"></script>
      <script src="{{ asset('backend_asset/vendors/js/vendor.bundle.addons.js') }}"></script>
      <!-- endinject -->
      <!-- Plugin js for this page-->
      <!-- End plugin js for this page-->
      <!-- inject:js -->
      <script src="{{ asset('backend_asset/js/off-canvas.js') }}"></script>
      <script src="{{ asset('backend_asset/js/misc.js') }}"></script>
      <!-- endinject -->
      <!-- Custom js for this page-->
      <script src="{{ asset('backend_asset/js/dashboard.js') }}"></script>
      <!-- End custom js for this page-->

      @yield('js')
   </body>
</html>