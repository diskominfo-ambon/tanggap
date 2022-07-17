<!DOCTYPE html>
<html lang="en" class="js">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(auth()->check() && auth()->user()->roles->count() > 0)
    <meta name="auth-role" content="{{ auth()->user()->roles[0]?->name }}">
    @endif
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
          @if (session('flash_message'))
          <div class="alert alert-icon alert-primary" role="alert">
              <em class="icon ni ni-alert-circle"></em>
              {{ session('flash_message') }}
          </div>
          @endif
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
  <script>
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    window._CurrentRole = $('meta[name="auth-role"]').attr('content') ||  "";
  </script>
  @yield('script')
</body>
</html>
