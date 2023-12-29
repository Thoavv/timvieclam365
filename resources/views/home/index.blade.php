@extends('home.master')
@section('Tctitle', 'Trang chủ')
@section('main-content')
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
    <div class="header">
        <!-- Start intro section -->
        <section id="intro" class="section-intro">

            <!-- Header Section End -->

            <div class="search-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Tìm công việc phù hợp với cuộc sống của bạn</h1><br>
                            <h2>Hơn<strong>9,000</strong> việc làm đang chờ đợi để khởi đầu sự nghiệp của bạn!</h2>
                            <div class="content" style="background-color: gainsboro;">
                                <form method="" action="">
                                    <div class="row" style="margin-right: 0px; margin-left: -15px;">
                                        <div class="col-md-11 col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control input-search-ajax" type="text"
                                                    placeholder="Công việc/Từ khoá/Tên công ty/địa chỉ">
                                                <div class="search-ajax-results"></div>
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
    <section class="find-job section">
        <div class="container">
            <h2 class="section-title">Việc làm hấp dẫn</h2>
            <div class="row" id="job-list-container">
                @foreach ($posts as $post)
                    {{-- @if ($post->display_order == 1) --}}
                        <div class="job-list col-md-12">
                            <div class="thumb">
                                <a href="{{ route('vieclam.show', [$post->id]) }}">
                                    <img style="width: 120px" src="{{ asset('storage') }}/{{ $post->image }}">
                                </a>
                            </div>
                            <div class="job-list-content">
                                <h4>

                                    <a href="{{ route('vieclam.show', [$post->id]) }}">{{ $post->title }}</a>

                                    @if ($post->job_typeid == 1)
                                        <span class="full-time">Full-Time</span>
                                    @else
                                        <span class="full-time">Part-Time</span>
                                    @endif
                                </h4>
                                <p>{{ $post->summary }}</p>
                                <div class="job-tag">
                                    <div class="pull-left">
                                        <div class="meta-tag">
                                            <span>
                                                <a href="browse-categories.html">
                                                    <i class="ti-brush"></i>{{ $post->title }}
                                                </a>
                                            </span>
                                            <span><i class="ti-location-pin"></i>{{ $post->address }}</span>
                                            <span><i class="ti-time"></i></span>
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <div class="icon" style="width: 90px; background-color: rgba(255, 255, 255, 0.5);">
                                            <span class="like-count">{{ $post->like_pt }}</span>
                                            <i class="ti-heart" style="cursor: pointer;"></i>
                                        </div>
                                        <a href="{{ route('vieclam.show', [$post->id]) }}" class="btn btn-common btn-rm">xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- @endif --}}
                @endforeach

            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="{{ asset('fe-assets') }}/assets/js/material-kit.js"></script>
    <script>
        // JavaScript in your Blade view

        // Sự kiện khi người dùng nhấn một phím trong ô tìm kiếm
        $('.input-search-ajax').keyup(function() {
            // Lấy giá trị từ ô tìm kiếm
            var keyword = $(this).val();

            // Kiểm tra xem giá trị nhập vào có trắng không
            if (keyword.trim() !== '') {
                // Nếu có giá trị, thực hiện AJAX request
                $.ajax({
                    // Đường dẫn đến route 'search' được đặt trong file Blade
                    url: '{{ route('search') }}',
                    method: 'GET',
                    data: {
                        keyword: keyword
                    }, // Truyền tham số 'keyword' vào request
                    success: function(data) {
                        // Khi request thành công, hiển thị kết quả
                        displayResults(data);
                    }
                });
            } else {
                // Nếu giá trị trắng, làm trống container kết quả
                $('.search-ajax-results').empty();
            }
        });

        // Hàm để hiển thị kết quả từ server
        function displayResults(results) {
            // Lấy đối tượng container kết quả
            let resultsContainer = $('.search-ajax-results');
            // Làm trống container để chuẩn bị hiển thị kết quả mới
            resultsContainer.empty();

            // Duyệt qua kết quả trả về từ server và tạo HTML để hiển thị
            $.each(results, function(index, result) {
                // Tạo một container mới cho mỗi kết quả
                let resultContainer = $('<div class="search-ajax-result" style="padding: 10px;"></div>');

                // Thêm nội dung HTML cho kết quả
                resultContainer.append(
                    '<div class="media">' +
                    '<a class="pull-left" href="/vieclam/' + result.id + '">' +
                    '<img class="media-object" style="width: 60px;" src="{{ asset('storage') }}/' + result
                    .image + '" alt="image">' +
                    '</a>' +
                    '<div class="media-body">' +
                    '<div style="display: flex; justify-content: space-between;">' +
                    '<div style="margin-right: 10px;">' +
                    '<h6 class="media-heading" style="margin-top: 3px;"><a style="" href="/vieclam/' + result
                    .id + '">' + result.title +
                    '</a></h6>' +
                    '<p style="color: #ff4f57;" >' + result.summary + '</p>' + '<p style="color: #000;" >' +
                    result.address + '</p>' +
                    '</div>' +
                    '<span style="width: 100px;" class="full-time">' + (result.job_type === 1 ? 'Full-Time' :
                        'Part-Time') + '</span>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                );

                // Thêm container kết quả vào container chính
                resultsContainer.append(resultContainer);
            });

        }

        // Sự kiện khi người dùng nhấn nút tìm kiếm hoặc chọn kết quả
        function performSearch(keyword) {
            if (keyword.trim() !== '') {
                $.ajax({
                    url: '{{ route('search') }}',
                    method: 'GET',
                    data: {
                        keyword: keyword
                    },
                    success: function(data) {
                        displayResults(data);
                    }
                });
            } else {
                $('.search-ajax-results').empty();
            }
        }

        // Sự kiện khi người dùng nhấn nút tìm kiếm
        $('.btn-search-icon').click(function() {
            var keyword = $('.input-search-ajax').val();
            performSearch(keyword);
        });

        // Sự kiện khi người dùng chọn kết quả từ ô tìm kiếm
        $('.search-ajax-results').on('click', '.search-ajax-result', function() {
            var keyword = $(this).find('.media-heading a').text();
            $('.input-search-ajax').val(keyword);
            $('.search-ajax-results').empty();
            performSearch(keyword);
        });
    </script>
    <!-- Featured Jobs Section Start -->
    <section class="featured-jobs section" style="margin-top: -75px;">
        <div class="container">
            <h2 class="section-title">Việc làm nổi bật</h2>
            <div class="row">
                @foreach ($posts2 as $post)
                    {{-- @if ($post->display_order == 2) --}}
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="featured-item">
                                <div class="featured-wrap">
                                    <div class="featured-inner">
                                        <figure class="item-thumb">
                                            <a class="hover-effect" href="{{ route('vieclam.show', [$post->id]) }}">
                                                <img src="{{ asset('storage') }}/{{ $post->image }}" alt="">
                                            </a>
                                        </figure>
                                        <div class="item-body">
                                            <h3 class="job-title"><a
                                                    href="{{ route('vieclam.show', [$post->id]) }}">{{ $post->title }}</a>
                                            </h3>
                                            <div class="adderess"><i class="ti-location-pin"></i> {{ $post->address }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-foot">
                                    <span><i class="ti-calendar"></i> </span>
                                    <span><i class="ti-time"></i>
                                        {{ $post->job_typeid == 1 ? 'Full Time' : 'Part Time' }}</span>
                                    <div class="view-iocn">
                                        <a href="{{ route('vieclam.show', [$post->id]) }}"><i
                                                class="ti-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- @endif --}}
                @endforeach
            </div>
        </div>
    </section>

@endsection
