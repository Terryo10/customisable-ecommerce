<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-app-env="{{ env('APP_ENV') }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>SlimRiff</title>
  <link rel="shortcut icon" type="image/x-icon" href="/logo.png">
  <meta name="description"
    content="Slim Riff offers premium customized graduation garments, including gowns, scarfs, and hats. Design your graduation outfit online with ease and get it delivered in Zimbabwe or internationally.">
  <meta name="keywords"
    content="graduation garments, customized graduation gowns, custom scarfs, graduation hats, design your own clothes, online graduation garments Zimbabwe, graduation attire delivery, Slim Riff">
  <meta name="author" content="Slim Riff">
  <meta name="robots" content="index, follow">
  <meta name="googlebot" content="index, follow">
  <meta name="og:title" content="Slim Riff - Customized Graduation Garments">
  <meta name="og:description"
    content="Create your perfect graduation look with Slim Riff. We offer custom gowns, scarfs, and hats for delivery in Zimbabwe and globally.">
  <meta name="og:url" content="https://www.slimriff.com">
  <meta name="og:image" content="https://www.slimriff.com/images/graduation-outfits.jpg">
  <meta name="og:type" content="website">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Slim Riff - Customized Graduation Garments">
  <meta name="twitter:description"
    content="Design and order customized graduation outfits with Slim Riff. Delivered to your door locally or internationally.">
  <meta name="twitter:image" content="https://www.slimriff.com/images/graduation-outfits.jpg">
  <title>Slim Riff | Customized Graduation Garments in Zimbabwe & Worldwide</title>

  {{-- @viteReactRefresh --}}

  @livewireStyles

  {{-- @vite("resources/app/index.tsx") --}}

  <!-- All CSS Files -->
  <!-- Bootstrap css -->
  <link rel="stylesheet" href="{{ asset('template/outside/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/outside/css/bootstrap.bundle.min.js') }}">
  {{--
  <link rel="stylesheet" href="{{ asset('template/outside/css/bootstrap.min.css') }}"> --}}
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