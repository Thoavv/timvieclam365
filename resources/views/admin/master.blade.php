<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
    <meta name="description"
        content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
    <meta name="robots" content="noindex,nofollow" />
    <title>@yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets') }}/assets/images/logo9.png" />
    <link rel="stylesheet" href="{{ asset('assets') }}/assets/extra-libs/multicheck/multicheck.css" />
    <link href="{{ asset('assets') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/dist/css/style.min.css" rel="stylesheet" />
</head>
<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @include('admin.layouts.header')
        <!-- ============================================================== -->
        <!-- mebu bên trái -->
        @include('admin.layouts.menu')
        <!-- ============================================================== -->
        <div class="page-wrapper">
            @yield('main-content')
            <!-- ============================================================== -->
            <!-- footer -->
            @include('admin.layouts.footer')
            <!-- End footer -->
        </div>
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets') }}/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets') }}/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets') }}/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="{{ asset('assets') }}/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="{{ asset('assets') }}/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('assets') }}/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('assets') }}/dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="{{ asset('assets') }}/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="{{ asset('assets') }}/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="{{ asset('assets') }}/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        $("#zero_config").DataTable();
    </script>
</body>

</html>
