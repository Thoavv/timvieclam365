<!doctype html>
<html lang="en">
  <head>
  	<title>Đăng nhập</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{asset('lg-assets')}}/css/style.css">

	</head>
	<body class="img js-fullheight" style="background-color:aqua;">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					{{-- <h2 class="heading-section">Trang đăng nhập</h2> --}}
				</div>
			</div>
			<div class="row justify-content-center">

				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
                <a href="{{ route('register') }}" style="color: #fff"><h2 class="mb-4 text-center" style="color: #fff">Đăng nhập</h2>
                </a>
                <div class="row">
                    <div class="col-12">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
                <form action="{{ route('postLogin') }}" method="POST" class="signin-form">
                    @csrf
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Tên tài khoản" name="name">
		      		</div>
	            <div class="form-group">
	              <input id="password-field" name="password" type="password" class="form-control" placeholder="Mật khẩu" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Đăng nhập</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Nhớ tài khoản
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Quên mật khẩu</a>
								</div>
	            </div>
	          </form>
	          <p class="w-100 text-center">&mdash; Đăng nhập bằng tài khoản  &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	<a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('lg-assets')}}/js/jquery.min.js"></script>
  <script src="{{asset('fe-assets')}}/js/popper.js"></script>
  <script src="{{asset('fe-assets')}}/js/bootstrap.min.js"></script>
  <script src="{{asset('fe-assets')}}/js/main.js"></script>

	</body>
</html>

