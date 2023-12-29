@extends('admin.master')
@section('title', 'Thêm mới gói đăng')
@section('main-content')
    <!-- resources/views/your/create.blade.php -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form class="form-horizontal" method="post" action="{{ route('packagestorage.store') }}">
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title">Nhập thông tin gói đăng</h4>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="package_name">Tên gói:</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="package_name" name="package_name" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="description">Nội dung tóm tắt:</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="description" name="description"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="price">Giá gói đăng:</label>
                                <div class="col-md-9">
                                    <input type="number" name="price" required min="1">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="duration">Thời gian sử dụng:</label>
                                <div class="col-md-9">
                                    <input type="number" name="duration" required min="1">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="status">Trạng
                                    thái:</label>
                                <div class="col-md-9">
                                    <select class="select2 form-select shadow-none" id="status"
                                        style="width: 100%; height: 36px" name="status">
                                        <option value="1">Hiển thị</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="homeflag">Vị trí hiển thị:</label>
                                <div class="col-md-9">
                                    <select class="select2 form-select shadow-none" id="homeflag"
                                        style="width: 100%; height: 36px" name="homeflag">
                                        <option value="2">Việc làm nổi bật </option>
                                        <option value="1">Việc làm hấp dẫn </option>
                                        <option value="0">Không hiển thị trang chủ</option>
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


