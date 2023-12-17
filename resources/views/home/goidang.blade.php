@extends('home.master')

@section('Tctitle', 'Mua gói đăng')

@section('main-content')

 {{-- gói đăng --}}
    <!-- Page Header Start -->
    <div class="page-header" style="background: url({{ asset('fe-assets') }}/assets/img/banner1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">Gói đăng</h2>
                        <ol class="breadcrumb">
                            <li><a href="#"><i class="ti-home"></i> Home</a></li>
                            <li class="current">Gói đăng</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Pricing Table Section -->
    <section id="pricing-table" class="section">
        <div class="container">
            <div class="row">
                @foreach($ps as $package)
                    <div class="col-sm-4">
                        <div class="table">
                            <div class="title">
                                <h3>{{ $package->package_name }}</h3>
                            </div>
                            <div class="pricing-header">
                                <p class="price-value"> <sup>$</sup>{{ $package->price }}</p>
                                <p class="price-quality">{{ $package->duration }} ngày</p>
                            </div>
                            <ul class="description">
                                <li>{{ $package->description }}</li>
                                <li>{{ $package->status ? 'Việc làm nổi bật' : 'Không có việc làm nổi bật' }}</li>
                                <li>Chỉnh sửa danh sách công việc của bạn</li>
                                <li>Quản lý ứng dụng</li>
                                <li>{{ $package->duration }} ngày đã hết hạn</li>
                            </ul>
                            <button class="btn btn-common" type="submit">Mua ngay</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
