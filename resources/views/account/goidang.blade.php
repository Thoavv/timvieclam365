@extends('account.master')
@section('titleaccount', 'Mua gói đăng')
@section('main-content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
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
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Gói đăng tuyển dụng</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Gói đăng tuyển dụng</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="container px-0">
                <h4 class="mb-30 text-blue h4">Pricing Table Style 1</h4>
                <div class="row">
                    @foreach($ps as $package)
                    <div class="col-md-4 mb-30">
                        <div class="card-box pricing-card mt-30 mb-30">
                            <div class="pricing-icon">
                                <img src="vendors/images/icon-Cash.png" alt="">
                            </div>
                            <div class="price-title">
                                {{ $package->package_name }}
                            </div>
                            <div class="pricing-price">
                                <sup>$</sup>{{ $package->price }}<sub>/tháng</sub>
                            </div>
                            <div class="text">
                                {{ $package->description }}
                            </div>
                            <div class="cta">
                                <a href="{{ route('thanhtoan', [$package->id]) }}" class="btn btn-primary btn-rounded btn-lg">Mua luôn</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
