<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta12
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <title>Compro CMS - Admin Panel</title>
    <!-- CSS files -->
    <link href="{{asset('admin/css/tabler.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('admin/css/tabler-vendors.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('admin/css/demo.min.css')}}" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
    </style>
    @stack('style')
  </head>
  <body >
    <script src="./dist/js/demo-theme.min.js"></script>
    <div class="page">
      <!-- Sidebar -->
        @include('admin.views.sidebar')
      <!-- Navbar -->
        @include('admin.views.navbar')
      
      <div class="page-wrapper">
        <!-- Page header -->
        @include('admin.views.header')
        
        <!-- Page body -->
        <div class="page-body">
          @yield('content')
        </div>

        @include('admin.views.footer')
        
      </div>
    </div>
    
    <!-- Libs JS -->
    <script src="{{asset('admin/js/demo-theme.min.js')}}" defer></script>
    <script src="{{asset('admin/js/tabler.min.js')}}" defer></script>
    <script src="{{asset('admin/js/demo.min.js')}}" defer></script>
    @stack('script')

  </body>
</html>