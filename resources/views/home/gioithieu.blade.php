@extends('home.master')

@section('Tctitle', 'Giới thiệu')

@section('main-content')
<div class="page-header" style="background: url({{ asset('fe-assets') }}/assets/img/banner1.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb-wrapper">
            <h2 class="product-title">Về chúng tôi</h2>
            <ol class="breadcrumb">
              <li><a href="#"><i class="ti-home"></i> Home</a></li>
              <li class="current">Giới thiệu</li>
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
          <img src="{{ asset('fe-assets') }}/assets/img/about/img1.jpg" alt="">
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="about-content">
            <h2 class="medium-title">GIỚI THIỆU VIỆC LÀM NGHỀ NGHIỆP</h2>
            <p class="desc">Chúng tôi là một đội ngũ nhiệt thành và giàu kinh nghiệm, luôn đề cao tinh thần tương thân tương ái không chỉ trong nội bộ công ty mà còn với cộng đồng toàn cầu, doanh nghiệp và các đối tác của chúng tôi. Chúng tôi luôn cố gắng vượt lên giới hạn của những nhiệm vụ trước mắt để nhìn nhận một bức tranh toàn cục hơn, đáp ứng các nhu cầu của khách hàng và cung cấp những giải pháp tạo nên sự khác biệt. Tinh thần sẵn sàng gánh vác trách nhiệm và thích nghi này chính là chìa khóa làm nên thành công của Kingston trên hành trình mở rộng khả năng tiếp cận các đối tác và khách hàng.</p>
            <a href="#" class="btn btn-common">Liện hệ</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Main container End -->

  <!-- Service  Section -->
  <section id="service-main" class="section">
    <!-- Container Starts -->
    <div class="container">
      <h1 class="section-title text-center">
        Nơi thông minh và dễ dàng dành cho Người tìm việc Poster & Người tuyển dụng
      </h1>
      <div class="row">
        <div class="col-sm-6 col-md-4">
          <div class="service-item">
            <div class="icon-wrapper">
              <i class="ti-search">
              </i>
            </div>
            <h2>
               TÌM KIẾM VIỆC LÀM NHANH
            </h2>
            <p>
                Nguồn ứng viên chất lượng
                Nhà tuyển dụng có thể tiếp cận nguồn ứng viên dồi dào với hơn 10 triệu hồ sơ và hơn 50 triệu lượt truy cập mỗi năm
            </p>
          </div>
          <!-- Service-Block-1 Item Ends -->
        </div>

        <div class="col-sm-6 col-md-4">
          <!-- Service-Block-1 Item Starts -->
          <div class="service-item">
            <div class="icon-wrapper">
              <i class="ti-world">
              </i>
            </div>
            <h2>
                TÌM KIẾM CƠ SỞ VỊ TRÍ
            </h2>
            <p>
                Nguồn ứng viên chất lượng
                Nhà tuyển dụng có thể tiếp cận nguồn ứng viên dồi dào với hơn 10 triệu hồ sơ và hơn 50 triệu lượt truy cập mỗi năm
            </p>
          </div>
        </div>

        <div class="col-sm-6 col-md-4">
          <div class="service-item">
            <div class="icon-wrapper">
              <i class="ti-stats-up">
              </i>
            </div>
            <h2>
                NGHỀ NGHIỆP HÀNG ĐẦU
            </h2>
            <p>
                Nguồn ứng viên chất lượng
                Nhà tuyển dụng có thể tiếp cận nguồn ứng viên dồi dào với hơn 10 triệu hồ sơ và hơn 50 triệu lượt truy cập mỗi năm.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection
