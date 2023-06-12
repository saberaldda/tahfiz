<!DOCTYPE html>
<!-- beautify ignore:start -->
<html lang="{{ App::currentLocale() }}" dir="{{ App::currentLocale() == 'ar'? 'rtl' : 'ltr' }}"
    class="light-style layout-menu-fixed" data-theme="theme-default" data-assets-path="{{ asset('assets/admin/') }}" 
    data-template="vertical-menu-template-free">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

        <title>@yield('title',__('مركز تحفيظ عمر بن الخطاب'))</title>

        <meta name="description" content="" />

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/admin/img/favicon/albayan.png') }}" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
            <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('assets/admin/vendor/libs/fontawesome-free/css/all.min.css') }}">
        {{-- @if (App::currentLocale() == 'ar')
            <!-- Icons. Uncomment required icon fonts -->
            <link rel="stylesheet" href="{{ asset('assets/admin/vendor/fonts/boxicons.rtl.css') }}" />
            <!-- Core CSS -->
            <link rel="stylesheet" href="{{ asset('assets/admin/vendor/css/core.rtl.css') }}" class="template-customizer-core-css" />
            <link rel="stylesheet" href="{{ asset('assets/admin/vendor/css/theme-default.rtl.css') }}" class="template-customizer-theme-css" />
            <link rel="stylesheet" href="{{ asset('assets/admin/css/demo.rtl.css') }}" />
            <!-- Vendors CSS -->
            <link rel="stylesheet" href="{{ asset('assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.rtl.css') }}" />
            <link rel="stylesheet" href="{{ asset('assets/admin/vendor/libs/apex-charts/apex-charts.rtl.css') }}" />
        @else
            <!-- Icons. Uncomment required icon fonts -->
            <link rel="stylesheet" href="{{ asset('assets/admin/vendor/fonts/boxicons.css') }}" />
            <!-- Core CSS -->
            <link rel="stylesheet" href="{{ asset('assets/admin/vendor/css/core.css') }}" class="template-customizer-core-css" />
            <link rel="stylesheet" href="{{ asset('assets/admin/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
            <link rel="stylesheet" href="{{ asset('assets/admin/css/demo.css') }}" />
            <!-- Vendors CSS -->
            <link rel="stylesheet" href="{{ asset('assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
            <link rel="stylesheet" href="{{ asset('assets/admin/vendor/libs/apex-charts/apex-charts.css') }}" />
        @endif --}}
        <style>
            .clickable-tr {
            cursor: pointer;
            }

            .clickable-tr:hover {
            background-color: #f5f5f5;
            }
        </style>

<script src="https://cdn.tailwindcss.com"></script>
<style>
  @font-face {
    font-family: "Barada";
    src: url({{ asset('assets/117-Barada-Reqa.ttf') }});
  }

  body {
    font-family: "Barada";
    -ms-overflow-style: none;
    /* IE and Edge */
    scrollbar-width: none;
    /* Firefox */
  }

  body::-webkit-scrollbar {
    display: none;
  }

  @keyframes rotateme {
    0% {
      transform: rotate(0deg);
    }

    to {
      transform: rotate(360deg);
    }
  }

  .rotateme {
    animation-name: rotateme;
    animation-duration: 40s;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
  }
</style>

        <!-- Page CSS -->

        <!-- Helpers -->
        <script src="{{ asset('assets/admin/vendor/js/helpers.js') }}"></script>

        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="{{ asset('assets/admin/js/config.js') }}"></script>
        @livewireStyles
    </head>

    <body>

        <!-- Layout wrapper -->
        {{-- <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                    <x-navbar/>
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->
                    <x-header/>
                    <!-- / Navbar -->

                    <!-- Content wrapper -->
                    <div class="content-wrapper">

                        <!-- Content -->

                        @yield('content')

                        <!-- / Content -->
                        <!-- Footer -->
                        <footer class="content-footer footer bg-footer-theme">
                            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                                <div class="mb-2 mb-md-0">
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>
                                    , made with ❤️ by
                                    <a href="https://github.com/saberaldda" target="_blank"
                                        class="footer-link fw-bolder">Saber Al-Dada</a>
                                </div>
                                <div>
                                    <a href="" class="footer-link me-4"
                                        target="_blank">License</a>
                                    <a href="https://github.com/saberaldda"
                                        target="_blank" class="footer-link me-4">Support</a>
                                </div>
                            </div>
                        </footer>
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div> --}}

        
                        <!-- Content -->

                        @yield('content')

                        <!-- / Content -->

        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="{{ asset('assets/admin/vendor/libs/jquery/jquery.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/libs/popper/popper.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/js/bootstrap.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

        <script src="{{ asset('assets/admin/vendor/js/menu.js') }}"></script>
        <!-- endbuild -->

        <!-- Vendors JS -->
        <script src="{{ asset('assets/admin/vendor/libs/apex-charts/apexcharts.js') }}"></script>

        <!-- Main JS -->
        <script src="{{ asset('assets/admin/js/main.js') }}"></script>

        <!-- Page JS -->
        <script src="{{ asset('assets/admin/js/dashboards-analytics.js') }}"></script>

        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        @yield('scripts')
        @livewireScripts
    </body>
</html>
