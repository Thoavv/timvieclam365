@extends('admin.master')
@section('title', 'Sửa gói đăng')
@section('main-content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Sửa thông tin gói đăng</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('packagestorage.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('packagestorage.index') }}">Danh sách gói đăng</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sửa gói đăng</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form class="form-horizontal" method="post" action="{{ route('packagestorage.update', ['packagestorage' => $pk->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <h4 class="card-title">Nhập thông tin gói đăng</h4>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="package_name">Tên gói:</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="package_name" name="package_name" required value="{{ $pk ->package_name}}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="description">Nội dung tóm tắt:</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="description" name="description" value="{{ $pk ->description }}"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="price">Giá gói đăng:</label>
                                <div class="col-md-9">
                                    <input type="number" name="price" required min="1" value="{{ $pk ->price }}">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="duration">Thời gian sử dụng:</label>
                                <div class="col-md-9">
                                    <input type="number" name="duration" required min="1" value="{{ $pk ->duration }}">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="status">Trạng thái:</label>
                                <div class="col-md-9">
                                    <select class="form-select" id="status" name="status">
                                        <option value="1" {{ $pk->status == 1 ? 'selected' : '' }}>Hiển thị</option>
                                        <option value="0" {{ $pk->status == 0 ? 'selected' : '' }}>Ẩn</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="status">Hiển thị trang chủ:</label>
                                <div class="col-md-9">
                                    <select class="form-select" id="homeflag" name="homeflag">
                                        <option value="2" {{ $pk->homeflag == 2 ? 'selected' : '' }}>Việc làm nổi bật</option>
                                        <option value="1" {{ $pk->homeflag == 1 ? 'selected' : '' }}>Việc làm hấp dẫn</option>
                                        <option value="0" {{ $pk->homeflag == 0 ? 'selected' : '' }}>Không hiển thị trang chủ</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="border-top text-center">
                            <div class="card-body">
                                <input type="submit" name="sua" class="btn btn-primary" value="Lưu lại">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
