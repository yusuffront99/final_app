<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PowerPlant | webriter</title>

    <meta name="description" content="" />

    @include('includes.style')

    <style>
      trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
      }
    </style>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        
        @include('includes.sidebar')

        <!-- Layout container -->
        <div class="layout-page bg-base">
        <!-- Navbar -->
            <!-- / Navbar -->
            @yield('content')
    <!-- / Layout wrapper -->

    <div class="buy-now">
        <a
            href="https://github.com/yusuffront99"
            target="_blank"
            class="btn btn-danger btn-buy-now"
            ><i class='bx bxl-github'></i> webriter</a>
    </div>

    @include('includes.script')
    @stack('add-script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </body>
</html>
