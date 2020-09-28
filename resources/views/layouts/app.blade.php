<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Nao Spirits Dashboard') }}</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('images') }}/favicon.png">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <!-- <link href="{{ asset('material') }}/demo/demo.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/css/bootstrap-select.min.css">
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.page_templates.auth')
        @endauth
        @guest()
            @include('layouts.page_templates.guest')
        @endguest
    
        <!--   Core JS Files   -->
        <script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
        <script src="{{ asset('material') }}/js/core/popper.min.js"></script>
        <script src="{{ asset('material') }}/js/core/bootstrap-material-design.min.js"></script>
        <!-- <script src="{{ asset('material') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script> -->
       
          <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/bootstrap-select.min.js"></script>
         <script src="{{ asset('js/admin.js') }}"></script>
            <script src="https://cdn.ckeditor.com/4.15.0/basic/ckeditor.js"></script>
            @if(Route::currentRouteName() === 'addRecipe' || Route::currentRouteName() === 'recipes')
              <script>
                    CKEDITOR.replace( 'summary-ckeditor' );
                    
                </script>
            @endif
        @stack('js')
    </body>
</html>