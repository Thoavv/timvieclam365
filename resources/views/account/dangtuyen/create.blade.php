@extends('account.master')
@section('titleaccount', 'Thêm mới bài đăng tuyển dụng')
@section('main-content')
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="{{ asset('vendors') }}/images/banner-img.png" alt="">
                </div>
                <div class="col-md-8">
                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                        <div class="weight-600 font-30 text-blue">Bạn {{ Auth::user()->name }} <p>hãy điền thông tin vào bài đăng tuyển dụng của bạn!</p> </div>

                    </h4>
                </div>
            </div>
        </div>
        <div class="card-box mb-30">
            <h2 class="h4 pd-20">Thông tin bài viết của bản của bạn</h2>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" method="post" action="{{ route('dangtuyen.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <h4 class="card-title">Nhập thông tin bài viết</h4>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label" for="title">Tiêu đề:</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="title" name="title" required />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label" for="summary">Nội dung tóm tắt:</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="summary" name="summary"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label" for="content">Nội dung chi tiết:</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="content" name="content"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label" for="image">Ảnh đại diện:
                                            </label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control" id="image" name="image" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label" for="images">Các hình ảnh khác:
                                            </label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control" id="images" name="images[]" multiple />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label" for="job_typeid">Thời gian làm việc:</label>
                                        <div class="col-md-9">
                                            <select class="select2 form-select shadow-none" id="job_typeid"
                                                style="width: 100%; height: 36px" name="job_typeid">
                                                <option value="1">Full-Time</option>
                                                <option value="2">Part-Time</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label" for="detail_link">Link bài viết:</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="detail_link" name="detail_link"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label" for="phone_number">Số điện thoại liên hệ:</label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" id="phone_number" name="phone_number"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label" for="address">Đại chỉ khu vực:</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="address" name="address"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label" for="vacancy_count" required min="1">Số lượng cần tuyển:</label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" id="vacancy_count" name="vacancy_count"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="posting_date" class="col-sm-3 text-end control-label col-form-label">Ngày bắt đầu:</label>
                                        <div class="col-md-3">
                                            <input type="date" name="posting_date" required>
                                        </div>

                                        <label class="col-sm-3 text-end control-label col-form-label" for="closing_date">Ngày kết thúc:</label>
                                        <div class="col-md-3">
                                            <input type="date" name="closing_date" required>
                                        </div>
                                    </div>

                                    <div style="display: none;">
                                        <label for="display_order">vi trí hiện thị</label>
                                        <input type="number" name="display_order" value="1" required>
                                    </div>
                                    <div style="display: none;">
                                        <label for="post_typeid">vi trí</label>
                                        <input type="number" name="post_typeid" value="1" required>
                                    </div>
                                    <div style="display: none;">
                                        <label for="status">T</label>
                                        <input type="number" name="authorid" value="{{ Auth::user()->id }}" required>
                                    </div>
                                    <div style="display: none;">
                                        <label for="status">trạng thái</label>
                                        <input type="number" name="status" value="2" required>
                                    </div>
                                    <div style="display: none;">
                                        <label for="homeflag">Hiện thị Trrang chủ:</label>
                                        <input type="number" name="homeflag" value="0" required>
                                    </div>

                                    <div class="card-body text-center">
                                        <input type="submit" name="them" class="btn btn-primary" value="Lưu lại">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- resources/views/your/create.blade.php -->

@endsection


