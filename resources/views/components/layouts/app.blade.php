<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-app-env="{{ env('APP_ENV') }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>SlimRiff</title>

  {{-- @viteReactRefresh --}}

  @livewireStyles

  {{-- @vite("resources/app/index.tsx") --}}

  <!-- All CSS Files -->
  <!-- Bootstrap css -->
  <link rel="stylesheet" href="{{ asset('template/outside/css/bootstrap.min.css') }}">
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
  {{-- <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script> --}}
</head>

<body>
  <div class="wrapper">
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

</body>

</html>