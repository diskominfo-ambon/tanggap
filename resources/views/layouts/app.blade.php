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
    <link rel="stylesheet" href="{{ asset(env('ASSET_PATH_VENDOR')) . '/css/theme.css' }}">
    @yield('head')
</head>

<body class="nk-body npc-invest bg-lighter">
  <div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- wrap @s -->
        <div class="nk-wrap ">
          <x-navbar/>
          <!-- content @s -->
          <div class="nk-content ">
              <div class="container wide-xl">
                  <div class="nk-content-inner">
                      <x-content>
                        @yield('content')
                      </x-content>
                  </div>
              </div>
          </div>
          <!-- content @e -->
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
  </div>

  <script src="{{ asset(env('ASSET_PATH_VENDOR')). '/js/bundle.js?ver=2.2.0' }}"></script>
  <script src="{{ asset(env('ASSET_PATH_VENDOR')). '/js/scripts.js?ver=2.2.0' }}"></script>
  <script src="{{ asset(env('ASSET_PATH_VENDOR')). '/js/charts/gd-default.js?ver=2.2.0' }}"></script>
  @yield('script')
</body>
</html>
