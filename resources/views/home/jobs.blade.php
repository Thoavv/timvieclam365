@extends('home.master')

@section('Tctitle', 'Viêc làm')

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
                            <div class="content" style="background-color: gainsboro;">
                                <form method="" action="">
                                    <div class="row" style="margin-right: 0px; margin-left: -15px;">
                                        <div class="col-md-11 col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control input-search-ajax" type="text"
                                                    placeholder="Công việc/Từ khoá/Tên công ty">
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
                <!-- Danh sách việc làm sẽ được hiển thị ở đây bằng JavaScript -->
            </div>
            <div class="col-md-12">
                <div class="showing pull-left">
                    <span id="showing-info">Loading...</span>
                </div>
                <ul class="pagination pull-right" id="pagination">
                    <!-- Các nút phân trang sẽ được thêm ở đây bằng JavaScript -->
                </ul>
            </div>
        </div>

        <script>
            const posts = {!! json_encode($posts) !!};
            const jobsPerPage = 6;
            let currentPage = 1;

            function displayJobs() {
                const jobListContainer = document.getElementById('job-list-container');
                const paginationContainer = document.getElementById('pagination');
                const showingInfo = document.getElementById('showing-info');

                const startIndex = (currentPage - 1) * jobsPerPage;
                const endIndex = startIndex + jobsPerPage;
                const currentJobs = posts.slice(startIndex, endIndex);

                jobListContainer.innerHTML = '';
                currentJobs.forEach(post => {
                    jobListContainer.innerHTML += `<div class="job-list col-md-6">
                        <div class="thumb">
                            <a href="/vieclam/${post.id}"><img style="width: 100px" src="{{asset('storage') }}/${post.image}" alt=""></a>
                        </div>
                        <div class="job-list-content">
                            <h4><a href="/vieclam/${post.id}">${post.title}</a>
                                ${post.job_type == 1 ? '<span class="full-time">Full-Time</span>' : '<span class="full-time">Part-Time</span>'}
                            </h4>
                            <p>${post.summary}</p>
                            <div class="job-tag">
                                <div class="pull-left">
                                    <div class="meta-tag">
                                        <span><a href="/vieclam/${post.id}"><i class="ti-brush"></i>${post.category_id}</a></span>
                                        <span><i class="ti-location-pin"></i>${post.address}</span>
                                        <span><i class="ti-time"></i>${post.published_at}</span>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <a href="/vieclam/${post.id}" class="btn btn-common btn-rm">xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>`;
                });

                const totalJobs = posts.length;
                const startJob = startIndex + 1;
                const endJob = Math.min(endIndex, totalJobs);

                showingInfo.innerHTML = `Showing ${startJob} - ${endJob} of ${totalJobs} Jobs`;

                const totalPages = Math.ceil(totalJobs / jobsPerPage);
                paginationContainer.innerHTML = '';
                for (let i = 1; i <= totalPages; i++) {
                    paginationContainer.innerHTML += `<li class="${currentPage === i ? 'active' : ''}"><a href="#" onclick="changePage(${i})">${i}</a></li>`;
                }
            }

            function changePage(pageNumber) {
                currentPage = pageNumber;
                displayJobs();
            }

            // Hiển thị trang đầu tiên khi trang web được tải
            displayJobs();
        </script>
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
                    '<h6 class="media-heading" style="margin-top: 3px;"><a style="" href="/vieclam/' + result.id + '">' + result.title +
                    '</a></h6>' +
                    '<p style="color: #ff4f57;" >' + result.summary + '</p>' +
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
@endsection
