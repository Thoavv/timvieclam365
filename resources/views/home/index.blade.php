@extends('home.master')
@section('Tctitle', 'Trang chủ')
@section('main-content')
    <div class="header">
        <!-- Start intro section -->
        <section id="intro" class="section-intro">

            <!-- Header Section End -->

            <div class="search-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Tìm công việc phù hợp với cuộc sống của bạn</h1><br>
                            <h2>Hơn<strong>12,000</strong> việc làm đang chờ đợi để khởi đầu sự nghiệp của bạn!</h2>
                            <div class="content">
                                <form method="" action="">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" type="text"
                                                    placeholder="Chức danh/ Từ khoá/Tên công ty">
                                                <i class="ti-time"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <label class="styled-select">
                                                    <select class="dropdown-product selectpicker">
                                                        {{-- <input class="form-control" type="email"
                                                placeholder="city / province / zip code">
                                            <i class="ti-location-pin"></i> --}}
                                                        <option value="">Tất cả địa điểm</option>
                                                        <option value="1">Hà Nội</option>
                                                        <option value="2">Hồ Chí Minh</option>
                                                        <option value="3">Bình Dương</option>
                                                        <option value="4">Bắc Ninh</option>
                                                        <option value="5">Đồng Nai</option>
                                                        <option value="6">Hưng Yên</option>
                                                        <option value="7">Hải Dương</option>
                                                        <option value="8">Đà Nẵng</option>
                                                        <option value="9">Hải Phòng</option>
                                                        <option value="10">An Giang</option>
                                                        <option value="11">Bà Rịa-Vũng Tàu</option>
                                                        <option value="12">Bắc Giang</option>
                                                        <option value="13">Bắc Kạn</option>
                                                        <option value="14">Bạc Liêu</option>
                                                        <option value="15">Bến Tre</option>
                                                        <option value="16">Bình Định</option>
                                                        <option value="17">Bình Phước</option>
                                                        <option value="18">Bình Thuận</option>
                                                        <option value="19">Cà Mau</option>
                                                        <option value="20">Cần Thơ</option>
                                                        <option value="21">Cao Bằng</option>
                                                        <option value="22">Cửu Long</option>
                                                        <option value="23">Đắc Lắc</option>
                                                        <option value="24">Đắc Nông</option>
                                                        <option value="25">Điện Biên</option>
                                                        <option value="26">Đồng Tháp</option>
                                                        <option value="27">Gia Lai</option>
                                                        <option value="28">Hà Giang</option>
                                                        <option value="29">Hà Nam</option>
                                                        <option value="30">Hà Tĩnh</option>
                                                        <option value="31">Hậu Giang</option>
                                                        <option value="32">Hoà Bình</option>
                                                        <option value="33">Khánh Hoà</option>
                                                        <option value="34">Kiên Giang</option>
                                                        <option value="35">Kon Tum</option>
                                                        <option value="36">Lai Châu</option>
                                                        <option value="37">Lâm Đồng</option>
                                                        <option value="38">Lạng Sơn</option>
                                                        <option value="39">Lào Cai</option>
                                                        <option value="40">Long An</option>
                                                        <option value="41">Miền Bắc</option>
                                                        <option value="42">Miền Nam</option>
                                                        <option value="43">Miền Trung</option>
                                                        <option value="44">Nam Định</option>
                                                        <option value="45">Nghệ An</option>
                                                        <option value="46">Ninh Bình</option>
                                                        <option value="47">Ninh Thuận</option>
                                                        <option value="48">Phú Thọ</option>
                                                        <option value="49">Phú Yên</option>
                                                        <option value="50">Quảng Bình</option>
                                                        <option value="51">Quảng Nam</option>
                                                        <option value="52">Quảng Ngãi</option>
                                                        <option value="53">Quảng Ninh</option>
                                                        <option value="54">Quảng Trị</option>
                                                        <option value="55">Sóc Trăng</option>
                                                        <option value="56">Sơn La</option>
                                                        <option value="57">Tây Ninh</option>
                                                        <option value="58">Thái Bình</option>
                                                        <option value="59">Thái Nguyên</option>
                                                        <option value="60">Thanh Hoá</option>
                                                        <option value="61">Thừa Thiên Huế</option>
                                                        <option value="62">Tiền Giang</option>
                                                        <option value="63">Toàn Quốc</option>
                                                        <option value="64">Trà Vinh</option>
                                                        <option value="65">Tuyên Quang</option>
                                                        <option value="66">Vĩnh Long</option>
                                                        <option value="67">Vĩnh Phúc</option>
                                                        <option value="68">Yên Bái</option>
                                                        <option value="100">Nước Ngoài</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="search-category-container">
                                                <label class="styled-select">
                                                    <select class="dropdown-product selectpicker">
                                                        <option>Tất cả các danh mục</option>
                                                        <option>Tài chính</option>
                                                        <option>CNTT & Kỹ thuật</option>
                                                        <option>Giáo dục/Đào tạo</option>
                                                        <option>Thiết kế/Mỹ thuật</option>
                                                        <option>Bán hàng/Markting</option>
                                                        <option>Chăm sóc sức khoẻ</option>
                                                        <option>Khoa học</option>
                                                        <option>Dịch vụ ăn uống</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-sm-6">
                                            <button type="button" class="btn btn-search-icon"><i
                                                    class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="popular-jobs">
                                <b>Từ khóa phổ biến</b>
                                <a href="#">Thiết kế</a>
                                <a href="#">CNTT</a>
                                <a href="#">Phụ hồ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end intro section -->
    </div>
    <!-- Find Job Section Start -->
    <section class="find-job section">
        <div class="container">
            <h2 class="section-title">Việc làm hấp dẫn</h2>
            <div class="row">
                <div class="col-md-12">
                @foreach ($posts as $item )
                <div class="job-list col-md-6">
                    <div class="thumb">
                        <a href="job-details.html"><img src="{{ asset('fe-assets') }}/{{ $item ->image }}"
                                alt=""></a>
                    </div>
                    <div class="job-list-content">
                        <h4><a href="job-details.html">{{ $item->title }}
                        </a>@if ($item->job_type==1)
                            <span class="full-time">Full-Time</span>
                            @else
                            <span class="full-time">Part-Time</span>
                        @endif

                        </h4>
                        <p>{{ $item->summary }}</p>
                        <div class="job-tag">
                            <div class="pull-left">
                                <div class="meta-tag">
                                    <span><a href="browse-categories.html"><i
                                                class="ti-brush"></i>{{$item->category_id }}</a></span>
                                    <span><i class="ti-location-pin"></i>{{ $item->address }}</span>
                                    <span><i class="ti-time"></i>{{ $item->published_at }}</span>
                                </div>
                            </div>
                            <div class="pull-right">
                                {{-- <div class="icon">
                                    <i class="ti-heart"></i>
                                </div> --}}
                                <a href="job-details.html" class="btn btn-common btn-rm">More Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                    {{-- <div class="job-list">
                        <div class="thumb">
                            <a href="job-details.html"><img src="{{ asset('fe-assets') }}/assets/img/jobs/img-4.jpg"
                                    alt=""></a>
                        </div>
                        <div class="job-list-content">
                            <h4><a href="job-details.html">Fullstack web developer needed</a><span
                                    class="full-time">Full-Time</span></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quaerat aut veniam
                                molestiae atque dolorum omnis temporibus consequuntur saepe. Nemo atque consectetur
                                saepe corporis odit in dicta reprehenderit, officiis, praesentium?</p>
                            <div class="job-tag">
                                <div class="pull-left">
                                    <div class="meta-tag">
                                        <span><a href="browse-categories.html"><i
                                                    class="ti-desktop"></i>Technologies</a></span>
                                        <span><i class="ti-location-pin"></i>New York, USA</span>
                                        <span><i class="ti-time"></i>60/Hour</span>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <div class="icon">
                                        <i class="ti-heart"></i>
                                    </div>
                                    <a href="job-details.html" class="btn btn-common btn-rm">More Detail</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="col-md-12">
                    <div class="showing pull-left">
                        <a href="#">Showing <span>6-10</span> Of 24 Jobs</a>
                    </div>
                    <ul class="pagination pull-right">
                        <li class="active"><a href="#" class="btn btn-common"><i class="ti-angle-left"></i>
                                prev</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li class="active"><a href="#" class="btn btn-common">Next <i
                                    class="ti-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Find Job Section End -->
    <!-- Category Section Start -->
    {{-- <section class="section text-center">
        <div class="container">
            <!-- Start Animations Text -->
            <h1>
                Bạn đang đến với trang tìm kiếm việc làm 365<br> Tìm kiếm nhanh việc làm thôi nào còn chờ đợi gì nữa?
            </h1>
            <br>
            <!-- End Animations Text -->
            <!-- Start Buttons -->
            <a rel="nofollow" target="_blank" href="#"
                class="btn btn-common btn-large"><H4>Tìm kiếm</H4></a>
        </div>
        </div>
    </section>
    <!-- Category Section End -->
    <!-- Featured Jobs Section Start -->
    <section class="featured-jobs section">
        <div class="container">
            <h2 class="section-title">
                Việc làm nổi bật
            </h2>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="featured-wrap">
                            <div class="featured-inner">
                                <figure class="item-thumb">
                                    <a class="hover-effect" href="job-page.html">
                                        <img src="{{ asset('fe-assets') }}/assets/img/features/img-1.jpg" alt="">
                                    </a>
                                </figure>
                                <div class="item-body">
                                    <h3 class="job-title"><a href="job-page.html">Graphic Designer</a></h3>
                                    <div class="adderess"><i class="ti-location-pin"></i> Dallas, United States</div>
                                </div>
                            </div>
                        </div>
                        <div class="item-foot">
                            <span><i class="ti-calendar"></i> 4 months ago</span>
                            <span><i class="ti-time"></i> Full Time</span>
                            <div class="view-iocn">
                                <a href="job-page.html"><i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="featured-wrap">
                            <div class="featured-inner">
                                <figure class="item-thumb">
                                    <a class="hover-effect" href="job-page.html">
                                        <img src="{{ asset('fe-assets') }}/assets/img/features/img-2.jpg" alt="">
                                    </a>
                                </figure>
                                <div class="item-body">
                                    <h3 class="job-title"><a href="job-page.html">Software Engineer</a></h3>
                                    <div class="adderess"><i class="ti-location-pin"></i> Delaware, United States
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item-foot">
                            <span><i class="ti-calendar"></i> 5 months ago</span>
                            <span><i class="ti-time"></i> Part Time</span>
                            <div class="view-iocn">
                                <a href="job-page.html"><i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="featured-wrap">
                            <div class="featured-inner">
                                <figure class="item-thumb">
                                    <a class="hover-effect" href="job-page.html">
                                        <img src="{{ asset('fe-assets') }}/assets/img/features/img-3.jpg" alt="">
                                    </a>
                                </figure>
                                <div class="item-body">
                                    <h3 class="job-title"><a href="job-page.html">Managing Director</a></h3>
                                    <div class="adderess"><i class="ti-location-pin"></i> NY, United States</div>
                                </div>
                            </div>
                        </div>
                        <div class="item-foot">
                            <span><i class="ti-calendar"></i> 3 months ago</span>
                            <span><i class="ti-time"></i> Full Time</span>
                            <div class="view-iocn">
                                <a href="job-page.html"><i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="featured-wrap">
                            <div class="featured-inner">
                                <figure class="item-thumb">
                                    <a class="hover-effect" href="job-page.html">
                                        <img src="{{ asset('fe-assets') }}/assets/img/features/img-3.jpg" alt="">
                                    </a>
                                </figure>
                                <div class="item-body">
                                    <h3 class="job-title"><a href="job-page.html">Graphic Designer</a></h3>
                                    <div class="adderess"><i class="ti-location-pin"></i> Washington, United States
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item-foot">
                            <span><i class="ti-calendar"></i> 1 months ago</span>
                            <span><i class="ti-time"></i> Part Time</span>
                            <div class="view-iocn">
                                <a href="job-page.html"><i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="featured-wrap">
                            <div class="featured-inner">
                                <figure class="item-thumb">
                                    <a class="hover-effect" href="job-page.html">
                                        <img src="{{ asset('fe-assets') }}/assets/img/features/img-2.jpg" alt="">
                                    </a>
                                </figure>
                                <div class="item-body">
                                    <h3 class="job-title"><a href="job-page.html">Software Engineer</a></h3>
                                    <div class="adderess"><i class="ti-location-pin"></i> Dallas, United States</div>
                                </div>
                            </div>
                        </div>
                        <div class="item-foot">
                            <span><i class="ti-calendar"></i> 6 months ago</span>
                            <span><i class="ti-time"></i> Full Time</span>
                            <div class="view-iocn">
                                <a href="job-page.html"><i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="featured-wrap">
                            <div class="featured-inner">
                                <figure class="item-thumb">
                                    <a class="hover-effect" href="job-page.html">
                                        <img src="{{ asset('fe-assets') }}/assets/img/features/img-1.jpg" alt="">
                                    </a>
                                </figure>
                                <div class="item-body">
                                    <h3 class="job-title"><a href="job-page.html">Managing Director</a></h3>
                                    <div class="adderess"><i class="ti-location-pin"></i> NY, United States</div>
                                </div>
                            </div>
                        </div>
                        <div class="item-foot">
                            <span><i class="ti-calendar"></i> 7 months ago</span>
                            <span><i class="ti-time"></i> Part Time</span>
                            <div class="view-iocn">
                                <a href="job-page.html"><i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Jobs Section End -->
    <!-- Start Purchase Section -->
    <section class="section purchase" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="section-content text-center">
                    <h1 class="title-text">
                        Looking for a Job
                    </h1>
                    <p>Join thousand of employers and earn what you deserve!</p>
                    <a href="my-account.html" class="btn btn-common">Get Started Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Purchase Section -->
    <!-- Blog Section -->
    <section id="blog" class="section">
        <!-- Container Starts -->
        <div class="container">
            <h2 class="section-title">
                Latest News
            </h2>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 blog-item">
                    <!-- Blog Item Starts -->
                    <div class="blog-item-wrapper">
                        <div class="blog-item-img">
                            <a href="single-post.html">
                                <img src="{{ asset('fe-assets') }}/assets/img/blog/home-items/img1.jpg" alt="">
                            </a>
                        </div>
                        <div class="blog-item-text">
                            <div class="meta-tags">
                                <span class="date"><i class="ti-calendar"></i> Dec 20, 2017</span>
                                <span class="comments"><a href="#"><i class="ti-comment-alt"></i> 5
                                        Comments</a></span>
                            </div>
                            <a href="single-post.html">
                                <h3>
                                    Tips to write an impressive resume online for beginner
                                </h3>
                            </a>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore praesentium asperiores
                                ad vitae.
                            </p>
                            <a href="single-post.html" class="btn btn-common btn-rm">Read More</a>
                        </div>
                    </div>
                    <!-- Blog Item Wrapper Ends-->
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 blog-item">
                    <!-- Blog Item Starts -->
                    <div class="blog-item-wrapper">
                        <div class="blog-item-img">
                            <a href="single-post.html">
                                <img src="{{ asset('fe-assets') }}/assets/img/blog/home-items/img2.jpg" alt="">
                            </a>
                        </div>
                        <div class="blog-item-text">
                            <div class="meta-tags">
                                <span class="date"><i class="ti-calendar"></i> Jan 20, 2018</span>
                                <span class="comments"><a href="#"><i class="ti-comment-alt"></i> 5
                                        Comments</a></span>
                            </div>
                            <a href="single-post.html">
                                <h3>
                                    Let's explore 5 cool new features in JobBoard theme
                                </h3>
                            </a>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore praesentium asperiores
                                ad vitae.
                            </p>
                            <a href="single-post.html" class="btn btn-common btn-rm">Read More</a>
                        </div>
                    </div>
                    <!-- Blog Item Wrapper Ends-->
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 blog-item">
                    <!-- Blog Item Starts -->
                    <div class="blog-item-wrapper">
                        <div class="blog-item-img">
                            <a href="single-post.html">
                                <img src="{{ asset('fe-assets') }}/assets/img/blog/home-items/img3.jpg" alt="">
                            </a>
                        </div>
                        <div class="blog-item-text">
                            <div class="meta-tags">
                                <span class="date"><i class="ti-calendar"></i> Mar 20, 2018</span>
                                <span class="comments"><a href="#"><i class="ti-comment-alt"></i> 5
                                        Comments</a></span>
                            </div>
                            <a href="single-post.html">
                                <h3>
                                    How to convince recruiters and get your dream job
                                </h3>
                            </a>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore praesentium asperiores
                                ad vitae.
                            </p>
                            <a href="single-post.html" class="btn btn-common btn-rm">Read More</a>
                        </div>
                    </div>
                    <!-- Blog Item Wrapper Ends-->
                </div>
            </div>
        </div>
    </section>
    <!-- blog Section End -->
    <!-- Testimonial Section Start -->
    <section id="testimonial" class="section">
        <div class="container">
            <div class="row">
                <div class="touch-slider" class="owl-carousel owl-theme">
                    <div class="item active text-center">
                        <img class="img-member" src="{{ asset('fe-assets') }}/assets/img/testimonial/img1.jpg"
                            alt="">
                        <div class="client-info">
                            <h2 class="client-name">Jessica <span>(Senior Accountant)</span></h2>
                        </div>
                        <p><i class="fa fa-quote-left quote-left"></i> The team that was assigned to our project...
                            were extremely professional <i class="fa fa-quote-right quote-right"></i><br> throughout
                            the project and assured that the owner expectations were met and <br> often exceeded. </p>
                    </div>
                    <div class="item text-center">
                        <img class="img-member" src="{{ asset('fe-assets') }}/assets/img/testimonial/img2.jpg"
                            alt="">
                        <div class="client-info">
                            <h2 class="client-name">John Doe <span>(Project Menager)</span></h2>
                        </div>
                        <p><i class="fa fa-quote-left quote-left"></i> The team that was assigned to our project...
                            were extremely professional <i class="fa fa-quote-right quote-right"></i><br> throughout
                            the project and assured that the owner expectations were met and <br> often exceeded. </p>
                    </div>
                    <div class="item text-center">
                        <img class="img-member" src="{{ asset('fe-assets') }}/assets/img/testimonial/img3.jpg"
                            alt="">
                        <div class="client-info">
                            <h2 class="client-name">Helen <span>(Engineer)</span></h2>
                        </div>
                        <p><i class="fa fa-quote-left quote-left"></i> The team that was assigned to our project...
                            were extremely professional <i class="fa fa-quote-right quote-right"></i><br> throughout
                            the project and assured that the owner expectations were met and <br> often exceeded. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->
    <!-- Clients Section -->
    <section class="clients section">
        <div class="container">
            <h2 class="section-title">
                Clients & Partners
            </h2>
            <div class="row">
                <div id="clients-scroller">
                    <div class="items">
                        <img src="{{ asset('fe-assets') }}/assets/img/clients/img1.png" alt="">
                    </div>
                    <div class="items">
                        <img src="{{ asset('fe-assets') }}/assets/img/clients/img2.png" alt="">
                    </div>
                    <div class="items">
                        <img src="{{ asset('fe-assets') }}/assets/img/clients/img3.png" alt="">
                    </div>
                    <div class="items">
                        <img src="{{ asset('fe-assets') }}/assets/img/clients/img4.png" alt="">
                    </div>
                    <div class="items">
                        <img src="{{ asset('fe-assets') }}/assets/img/clients/img5.png" alt="">
                    </div>
                    <div class="items">
                        <img src="{{ asset('fe-assets') }}/assets/img/clients/img6.png" alt="">
                    </div>
                    <div class="items">
                        <img src="{{ asset('fe-assets') }}/assets/img/clients/img6.png" alt="">
                    </div>
                    <div class="items">
                        <img src="{{ asset('fe-assets') }}/assets/img/clients/img6.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Client Section End -->
    <!-- Counter Section Start -->
    <section id="counter">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="counting">
                        <div class="icon">
                            <i class="ti-briefcase"></i>
                        </div>
                        <div class="desc">
                            <h2>Jobs</h2>
                            <h1 class="counter">12050</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="counting">
                        <div class="icon">
                            <i class="ti-user"></i>
                        </div>
                        <div class="desc">
                            <h2>Members</h2>
                            <h1 class="counter">10890</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="counting">
                        <div class="icon">
                            <i class="ti-write"></i>
                        </div>
                        <div class="desc">
                            <h2>Resume</h2>
                            <h1 class="counter">700</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="counting">
                        <div class="icon">
                            <i class="ti-heart"></i>
                        </div>
                        <div class="desc">
                            <h2>Company</h2>
                            <h1 class="counter">9050</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Counter Section End -->
    <!-- Infobox Section Start -->
    <section class="infobox section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="info-text">
                        <h2>Don't Want To Miss a Thing?</h2>
                        <p>Just go to <a href="#">Google Play</a> to download JobBoard Mini</p>
                    </div>
                    <a href="#" class="btn btn-border">Google Play</a>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- iii --}}
    <!-- Infobox Section End -->
    <!-- Footer Section Start -->
@endsection
