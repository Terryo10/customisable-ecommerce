<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-app-env="{{ env('APP_ENV') }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>SlimRiff</title>
  <link rel="shortcut icon" type="image/x-icon" href="/logo.png">

  {{-- @viteReactRefresh --}}

  @livewireStyles

  {{-- @vite("resources/app/index.tsx") --}}

  <!-- All CSS Files -->
  <!-- Bootstrap css -->
  <link rel="stylesheet" href="{{ asset('template/outside/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/outside/css/bootstrap.bundle.min.js') }}">
  {{-- <link rel="stylesheet" href="{{ asset('template/outside/css/bootstrap.min.css') }}"> --}}
  <!-- Icon Font -->
  <link rel="stylesheet" href="{{ asset('template/outside/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/outside/css/pe-icon-7-stroke.css') }}">
  <!-- Plugins css file -->
  <link rel="stylesheet" href="{{ asset('template/outside/css/plugins.css') }}">
  <!-- Theme main style -->
  <link rel="stylesheet" href="{{ asset('template/outside/style.css') }}">
  <!-- Responsive css -->
  <link rel="stylesheet" href="{{ asset('template/outside/css/responsive.css') }}">

  <!-- Modernizr JS -->
  <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
  <div class="wrapper">

    @yield('content')

    @livewireScripts

    {{-- <div id="root"></div> --}}
  </div>

   <!-- jQuery latest version -->
   <script src="{{ asset('template/outside/js/vendor/jquery-3.6.0.min.js') }}"></script>
   <script src="{{ asset('template/outside/js/vendor/jquery-migrate.min.js') }}"></script>
   <!-- Bootstrap js -->
   <script src="{{ asset('template/outside/js/bootstrap.bundle.min.js') }}"></script>
   <!-- Plugins js -->
   <script src="{{ asset('template/outside/js/plugins.js') }}"></script>
   <!-- Ajax Mail js -->
   <script src="{{ asset('template/outside/js/ajax-mail.js') }}"></script>
   <!-- Main js -->
   <script src="{{ asset('template/outside/js/main.js') }}"></script>
   <!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/6750c9eb2480f5b4f5a7dd47/1ie9p9gkj';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
  <!--End of Tawk.to Script-->

</body>

</html>