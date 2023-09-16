<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="icon" type="image/png" href="assets/images/logo/favicon.svg">
  <link rel="stylesheet" href="{{ asset('assets/css/app.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/rt-plugins.css')}}">
    <!-- Scripts -->
  
</head>

<body class=" font-gilroy font-medium text-gray text-lg leading-[27px]">
  <!-- [if IE]> <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
    </p> <![endif] -->

    @include('site-pages.first-page')
    
  <div class="rt-mobile-menu-overlay"></div>
  <!-- scripts -->
  <script src="{{ asset('assets/js/popper.min.js')}}"></script>
  <script src="{{ asset('assets/js/jquery-3.6.0.min.js')}}"></script>
  <script src="{{ asset('assets/js/rt-plugins.js')}}"></script>
  <script src="https://unpkg.com/phosphor-icons"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
  <script src="{{ asset('assets/js/app.js')}}"></script>
</body>
</html>