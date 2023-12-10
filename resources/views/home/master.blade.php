<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="Jobboard">

    <title>@yield('Tctitle')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('fe-assets') }}/assets/img/logo9.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('fe-assets') }}/assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('fe-assets') }}/assets/css/jasny-bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('fe-assets') }}/assets/css/bootstrap-select.min.css" type="text/css">
    <!-- Material CSS -->
    <link rel="stylesheet" href="{{ asset('fe-assets') }}/assets/css/material-kit.css" type="text/css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('fe-assets') }}/assets/fonts/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('fe-assets') }}/assets/fonts/themify-icons.css">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('fe-assets') }}/assets/extras/animate.css" type="text/css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('fe-assets') }}/assets/extras/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('fe-assets') }}/assets/extras/owl.theme.css" type="text/css">
    <!-- Rev Slider CSS -->
    <link rel="stylesheet" href="{{ asset('fe-assets') }}/assets/extras/settings.css" type="text/css">
    <!-- Slicknav js -->
    <link rel="stylesheet" href="{{ asset('fe-assets') }}/assets/css/slicknav.css" type="text/css">
    <!-- Main Styles -->
    <link rel="stylesheet" href="{{ asset('fe-assets') }}/assets/css/main.css" type="text/css">
    <!-- Responsive CSS Styles -->
    <link rel="stylesheet" href="{{ asset('fe-assets') }}/assets/css/responsive.css" type="text/css">

    <!-- Color CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('fe-assets') }}/assets/css/colors/red.css" media="screen" />

</head>

<body>
    <!-- Header Section Start -->
    @include('home.layouts.header')

    @yield('main-content')

    <!-- Footer Section Start -->

    <!-- Footer Section End -->

    <!-- Go To Top Link -->
    @include('home.layouts.footer')

    <!-- Main JS  -->
    <script type="text/javascript" src="{{ asset('fe-assets') }}/assets/js/jquery-min.js"></script>
    <script type="text/javascript" src="{{ asset('fe-assets') }}/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('fe-assets') }}/assets/js/material.min.js"></script>
    <script type="text/javascript" src="{{ asset('fe-assets') }}/assets/js/material-kit.js"></script>
    <script type="text/javascript" src="{{ asset('fe-assets') }}/assets/js/jquery.parallax.js"></script>
    <script type="text/javascript" src="{{ asset('fe-assets') }}/assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="{{ asset('fe-assets') }}/assets/js/jquery.slicknav.js"></script>
    <script type="text/javascript" src="{{ asset('fe-assets') }}/assets/js/main.js"></script>
    <script type="text/javascript" src="{{ asset('fe-assets') }}/assets/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="{{ asset('fe-assets') }}/assets/js/waypoints.min.js"></script>
    <script type="text/javascript" src="{{ asset('fe-assets') }}/assets/js/jasny-bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('fe-assets') }}/assets/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="{{ asset('fe-assets') }}/assets/js/form-validator.min.js"></script>
    <script type="text/javascript" src="{{ asset('fe-assets') }}/assets/js/contact-form-script.js"></script>
    <script type="text/javascript" src="{{ asset('fe-assets') }}/assets/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="{{ asset('fe-assets') }}/assets/js/jquery.themepunch.tools.min.js"></script>

</body>

</html>
