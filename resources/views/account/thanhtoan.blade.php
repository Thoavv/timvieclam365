@extends('account.master')
@section('titleaccount', 'Mua gói đăng')
@section('main-content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div style="display: flex; flex-direction: column; align-items: center; height: 100vh;">
                    <div class="col-md-4 mb-30">
                        <h2 style="text-align: center;">Quét Mã QR Code</h2>
                        <div class="card-box pricing-card mt-30 mb-30" style="text-align: center;">
                            <div class="pricing-icon">
                                <!-- (Có thể thêm biểu tượng hoặc hình ảnh khác nếu cần) -->
                            </div>
                            <div class="price-title">
                                {{ $pk->package_name }}
                            </div>
                            <div id="qrcode" style="display: flex; justify-content: center; align-items: center;"></div>
                            <div class="pricing-price">
                                <sup>$</sup>{{ $pk->price }}<sub></sub>
                                <div class="cta">
                                    <a href="{{ route('thanhtoanok', [$pk->id]) }}"
                                        class="btn btn-primary btn-rounded btn-lg">Tiếp tục </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Thêm các liên kết JavaScript cho Bootstrap và thư viện mã QR code -->
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                <!-- Thư viện mã QR code -->
                <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
                <!-- Tạo mã QR code và điều hướng đến trang thanh toán của Stripe -->
                <script>
                    var qrcode = new QRCode(document.getElementById("qrcode"), {
                        text: "https://checkout.stripe.com/pay/cs_test_xxxxxxxxxxxxxxx", // URL thanh toán Stripe
                        width: 128,
                        height: 128
                    });
                </script>
            </div>
        </div>
    </div>
@endsection
