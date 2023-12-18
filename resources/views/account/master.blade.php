<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>@yield('titleaccount')</title>
	<!-- Site favicon -->
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('vendors') }}/images/logo9.png">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors') }}/styles/core.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors') }}/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors') }}/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors') }}/src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors') }}/styles/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics  -->
</head>
<body>
    @include('account.layouts.header')
    @include('account.layouts.menuleft')
	<div class="mobile-menu-overlay"></div>
    @yield('main-content')
	@include('account.layouts.footer')
	<!-- js -->
	<script src="{{ asset('vendors') }}/scripts/core.js"></script>
	<script src="{{ asset('vendors') }}/scripts/script.min.js"></script>
	<script src="{{ asset('vendors') }}/scripts/process.js"></script>
	<script src="{{ asset('vendors') }}/scripts/layout-settings.js"></script>
	<script src="{{ asset('vendors') }}/src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="{{ asset('vendors') }}/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="{{ asset('vendors') }}/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="{{ asset('vendors') }}/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="{{ asset('vendors') }}/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="{{ asset('vendors') }}/scripts/dashboard.js"></script>
    <script>
        $(document).ready(function () {
          // Add click event to the close button
          $('.close-sidebar').on('click', function () {
            // Toggle the class that controls the sidebar visibility
            $('.left-side-bar').toggleClass('closed');
          });
        });
      </script>
</body>
</html>
	{{-- <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="{{ asset('vendors') }}/images/logo-icon.png" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div> --}}
