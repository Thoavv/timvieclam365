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
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <form id="applicationForm" action="{{ route('naphoso') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Thêm các trường nhập liệu cho hồ sơ -->
                        <div class="form-group">
                            <label for="full_name">Họ và tên:</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Số điện thoại:</label>
                            <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
                        </div>
                        <div class="form-group">
                            <label for="link_cv">Link CV:</label>
                            <input type="text" class="form-control" id="link_cv" name="link_cv" required>
                        </div>
                        <div class="form-group" style="display: none">
                            <label for="post_id">ID Bài đăng:</label>
                            <input type="number" class="form-control" id="post_id" name="post_id"
                                value="{{ $post->id }}" required>
                        </div>
                        <div class="form-group" style="display: none">
                            <label for="status"> status:</label>
                            <input type="number" class="form-control" id="status" name="status" value="2"
                                required>
                        </div>
                        <div class="form-group" style="display: none">
                            <label for="user_id">ID uer:</label>
                            <input type="number" class="form-control" id="user_id" name="user_id"
                                value="{{ Auth::user()->id }}" required>
                        </div>
                        <div class="form-group" style="display: none">
                            <label for="receiver_id">ID user pos:</label>
                            <input type="number" class="form-control" id="receiver_id" name="receiver_id"
                                value="{{ $post->authorid }}" required>
                        </div>
                        <div class="modal-footer">
                            <!-- Thêm nút đóng và nút submit cùng kích thước -->
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Quay lại</button>
                            <button type="submit" form="applicationForm" class="btn btn-primary">Nạp hồ sơ</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
