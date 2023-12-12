
@extends('home.master')

@section('Tctitle', 'Việc làm chi tiết')

@section('main-content')


  <!-- Page Header Start -->
  <div class="page-header" style="background: url({{ asset('fe-assets') }}/assets/img/banner1.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb-wrapper">
            <h2 class="product-title">Chào bạn đã đến với chúng tôi</h2>
            <ol class="breadcrumb">
              <li><a href="/"><i class="ti-home"></i> Trang chủ</a></li>
              <li class="current">Bài viết</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Header End -->

  <!-- Main container Start -->
  <div class="about section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <img src="{{ asset('fe-assets') }}{{ $posts->image }}" alt="">
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="about-content">
            <h2 class="medium-title">{{ $posts->title }}</h2>
            <p class="desc">{{ $posts->content }}</p>

            <a href="#" class="btn btn-common">Liên hệ ngay</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Main container End -->
  @endsection
