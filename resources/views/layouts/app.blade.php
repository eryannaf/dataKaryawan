<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Data Karyawan</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets2/images/favicon.png') }}">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->

    {{-- Dashboard --}}
    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />
    <!-- Pignose Calender -->
    <link href="{{ asset('/assets2/plugins/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ asset('assets2/plugins/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('/assets2/css/style.css') }}" rel="stylesheet">
    @stack('style')
</head>

<body class="h-100">
    {{-- <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div> --}}
    <div class="wrapper">
        <div id="main-wrapper">
            @include('components.template.navbar')
                <!-- Navbar -->
                <!-- /.navbar -->
                <!-- Main Sidebar Container -->
            @include('components.template.sidebar')
                <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>
                <!-- /.content-wrapper -->
            <div class="footer">
                <div class="copyright">
                    <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
                </div>
            </div>
                <!-- Control Sidebar -->
                {{-- <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
                </aside> --}}
                <!-- /.control-sidebar -->
        </div>
    </div>

    <!-- Chartjs -->
    <script src="{{ asset('/assets2/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Circle progress -->
    {{-- <script src="{{ asset('/assets2/plugins/circle-progress/circle-progress.min.js') }}"></script> --}}
    <!-- Datamap -->
    <script src="{{ asset('/assets2/plugins/d3v3/index.js') }}"></script>
    <script src="{{ asset('/assets2/plugins/topojson/topojson.min.js') }}"></script>
    <script src="{{ asset('/assets2/plugins/datamaps/datamaps.world.min.js') }}"></script>
    <!-- Morrisjs -->
    <script src="{{ asset('/assets2/plugins/raphael/raphael.min.js') }}"></script>
    {{-- <script src="{{ asset('/assets2/plugins/morris/morris.min.js') }}"></script> --}}
    <!-- Pignose Calender -->
    <script src="{{ asset('/assets2/plugins/moment/moment.min.js') }}"></script>
    {{-- <script src="{{ asset('/assets2/plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script> --}}
    <!-- ChartistJS -->
    {{-- <script src="{{ asset('/assets2/plugins/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('/assets2/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}"></script> --}}

    {{-- <script src=".{{ asset('/assets2/js/dashboard/dashboard-1.js') }}"></script> --}}

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset('/assets2/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('/assets2/js/custom.min.js') }}"></script>
    <script src="{{ asset('/assets2/js/settings.js') }}"></script>
    <script src="{{ asset('/assets2/js/gleek.js') }}"></script>
    <script src="{{ asset('/assets2/js/styleSwitcher.js') }}"></script>
    @stack('script')
</body>
</html>
