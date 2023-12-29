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
    <!-- Start Comments Us Section -->
    <section id="content">
        <div class="about section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="container col-md-10">
                            <div class="row">
                                <div class="touch-slider" style="">
                                    <div class="item text-center">
                                        <img class="" style="width:550px; height:auto; margin: 0 auto;"
                                            src="{{ asset('storage') }}/{{ $posts->image }}" alt="">
                                    </div>
                                    @foreach ($pimg as $item)
                                        <div class="item text-center">
                                            <img class="" style="width:550px; height:auto; margin: 0 auto;"
                                                src="{{ asset('storage') }}/{{ $item->image_name }}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <span><i class="ti-location-pin"></i>{{ $posts->address }}</span>
                        @if ($posts->job_typeid == 1)
                            <span class="full-time">Full-Time</span>
                        @else
                            <span class="full-time">Part-Time</span>
                        @endif
                        <div class="about-content">
                            <h2 class="medium-title">{{ $posts->title }}</h2>
                            <p class="desc">{{ $posts->content }}</p>
                            <p class="desc">Số lượng tuyển: {{ $posts->vacancy_count }}</p>
                            <div class="like-section">
                                <div class="icon" style="width: 90px; background-color: rgba(255, 255, 255, 0.5);">
                                    <span class="like-count" id="like-count"
                                        style="font-size: 23px; color: red;">{{ $posts->like_pt }}</span>
                                    <i class="ti-heart like-btn" id="like-btn" data-post-id="{{ $posts->id }}"
                                        style="font-size: 19px; color: red; cursor: pointer;"></i>
                                </div>
                            </div>
                            <a href="#" class="btn btn-common">Liên hệ ngay</a>
                            <a href="{{ route('vieclam.themhoso', $posts->id) }}" class="btn btn-common">Nạp hồ sơ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="medium-title">
                        Bình luận
                    </h2>


                    <div class="information">
                        @foreach ($comments as $comment)
                            <div class="contact-datails" data-comment-id="{{ $comment->id }}">
                                <div class="icon">
                                    <i class="ti-mobile"></i>
                                </div>
                                <div class="info">
                                    <h3>{{ $comment->user_name }}</h3>
                                    <span class="detail">Email: {{ $comment->user_email }}</span>
                                    <span class="detail">{{ $comment->comment }}</span>
                                    <div>
                                        <span class="like-count" style="font-size: 15px; color: red;" id="like-count-comment-{{ $comment->id }}">
                                            {{ $comment->like_count }}
                                        </span>
                                        <i class="ti-heart like-btn" data-comment-id="{{ $comment->id }}" style="font-size: 15px; color: red; cursor: pointer;"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- Form -->
                    <form action="{{ route('comments.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="comment" class="form-control" placeholder="Bình luận" rows="12" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="hidden" name="post_id" value="{{ $posts->id }}">
                                        <button type="submit" class="btn btn-common">Gửi bình luận</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <!-- Thêm đoạn mã JavaScript vào trang của bạn -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('like-btn').addEventListener('click', function() {
                axios.post('/like/{{ $posts->id }}')
                    .then(function(response) {
                        console.log(response);
                        if (response.data.success) {
                            document.getElementById('like-count').innerText = response.data.likes;
                        }
                    })
                    .catch(function(error) {
                        console.error('Error:', error);
                    });
            });

            var likeButtons = document.querySelectorAll('.like-btn');

            likeButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var commentId = this.getAttribute('data-comment-id');

                    axios.post('/like-comment/' + commentId)
                        .then(function(response) {
                            console.log(response);
                            if (response.data.success) {
                                var likeCount = document.querySelector('[data-comment-id="' + commentId + '"] .like-count');
                                likeCount.innerText = response.data.likes;
                            }
                        })
                        .catch(function(error) {
                            console.error('Error:', error);
                        });
                });
            });
        });
    </script>



@endsection
