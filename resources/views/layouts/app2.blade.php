<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Exindo media</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('template/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('template/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  @include('layouts.partials.vendor-css')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('layouts.partials.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('layouts.partials.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">
    @yield('content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('layouts.partials.footer')
  <!-- End Footer -->

  <a href="" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  @include('layouts.partials.vendor-js')
</body>

</html>