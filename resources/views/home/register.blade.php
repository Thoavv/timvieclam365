<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('lg-assets') }}/css/style.css">
</head>

<body class="img js-fullheight" style="background-color:aqua;">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h2 class="mb-4 text-center heading-section" >Đăng ký tài khoản !</h2>
                        <form action="{{ route('postRegister') }}" method="POST" class="signin-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Họ và tên" name="name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Mật khẩu" name="password"
                                    required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Xác nhận mật khẩu" name="password_confirmation" required>
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                    class="form-control btn btn-primary submit px-3">Đăng ký</button>
                            </div>
                        </form>
                        <p class="w-100 text-center">&mdash; Hoặc đăng ký bằng &mdash;</p>
                        <div class="social d-flex text-center">
                            <a href="#" class="px-2 py-2 mr-md-1 rounded"><span
                                    class="ion-logo-facebook mr-2"></span> Facebook</a>
                            <a href="#" class="px-2 py-2 ml-md-1 rounded"><span
                                    class="ion-logo-twitter mr-2"></span> Twitter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('lg-assets') }}/js/jquery.min.js"></script>
    <script src="{{ asset('fe-assets') }}/js/popper.js"></script>
    <script src="{{ asset('fe-assets') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('fe-assets') }}/js/main.js"></script>
</body>

</html>
