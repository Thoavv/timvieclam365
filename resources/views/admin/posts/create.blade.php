@extends('admin.master')
@section('title', 'Thêm mới bài viết')
@section('main-content')
    <!-- resources/views/your/create.blade.php -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form class="form-horizontal" method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
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
                            <div style="display: none;">
                                <label for="display_order">vi trí hiện thị</label>
                                <input type="number" name="display_order" value="1" required>
                            </div>
                            <div style="display: none;">
                                <label for="post_typeid">vi trí</label>
                                <input type="number" name="post_typeid" value="1" required>
                            </div>
                            <div style="display: none;">
                                <label for="authorid">Tác giả</label>
                                <input type="number" name="authorid" value="{{ Auth::user()->id }}" required>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="phone_number">Số điện thoại liên hệ:</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="phone_number" name="phone_number"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="vacancy_count">Số lượng cần tuyển:</label>
                                <div class="col-md-9">
                                    <input type="number" name="vacancy_count" required min="1">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="address">Đại chỉ khu vực:</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="address" name="address"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="posting_date" class="col-sm-3 text-end control-label col-form-label">Ngày bắt đầu:</label>
                                <div class="col-md-9">
                                    <input  type="date" name="posting_date" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="closing_date">Ngày kết thúc:</label>
                                <div class="col-md-9">
                                    <input type="date" name="closing_date" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="end_date">Ngày hết hạn</label>
                                <div class="col-md-9">
                                    <input type="date" name="end_date" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="status">Trạng
                                    thái:</label>
                                <div class="col-md-9">
                                    <select class="select2 form-select shadow-none" id="status"
                                        style="width: 100%; height: 36px" name="status">
                                        <option value="1">Hiển thị</option>
                                        <option value="2">Chờ phê duyệt</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="homeflag">Hiện thị Trrang chủ:</label>
                                <div class="col-md-9">
                                    <select class="select2 form-select shadow-none" id="homeflag"
                                        style="width: 100%; height: 36px" name="homeflag">
                                        <option value="1">Hiển thị</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
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
@endsection


