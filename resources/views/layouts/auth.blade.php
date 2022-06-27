<!DOCTYPE html>
<html lang="en" class="js">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <!-- Page Title  -->
    <title>@yield('title')</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset(env('ASSET_PATH_VENDOR')) . '/css/dashlite.css?ver=2.2.0' }}">
    @yield('head')
</head>

<body class="nk-body bg-white npc-default has-aside">
  <div class="mt-5">
    @yield('content')
  </div>

  <script src="{{ asset(env('ASSET_PATH_VENDOR')). '/js/bundle.js?ver=2.2.0' }}"></script>
  <script src="{{ asset(env('ASSET_PATH_VENDOR')). '/js/scripts.js?ver=2.2.0' }}"></script>
  <script src="{{ asset(env('ASSET_PATH_VENDOR')). '/js/charts/gd-default.js?ver=2.2.0' }}"></script>
  @yield('script')
</body>
</html>
