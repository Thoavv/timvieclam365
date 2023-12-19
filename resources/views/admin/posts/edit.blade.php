@extends('admin.master')
@section('title', 'Sửa posts')
@section('main-content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Sửa thông tin bài viết</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Danh sách posts</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sửa posts</li>
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
                    <form class="form-horizontal" method="post" action="{{ route('posts.update', ['post' => $posts->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <h4 class="card-title">Chỉnh sửa thông tin bài viết</h4>

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="title">Tiêu đề</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $posts->title }}" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="summary">Tóm tắt</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="summary" name="summary" rows="3">{{ $posts->summary }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="content">Nội dung</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="content" name="content" rows="5">{{ $posts->content }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="image">Đường Link ảnh</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="image" name="image" value="{{ $posts->image }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="address">Địa chỉ</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="address" name="address" value="{{ $posts->address }}" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="posting_date">Ngày bắt đầu</label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" id="posting_date" name="posting_date" value="{{ $posts->posting_date }}" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="closing_date">Ngày kết thúc</label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" id="closing_date" name="closing_date" value="{{ $posts->closing_date }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="end_date">Ngày hết hạn</label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $posts->end_date }}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="status">Trạng thái:</label>
                                <div class="col-md-9">
                                    <select class="form-select" id="status" name="status">
                                        <option value="2" {{ $posts->status == 2 ? 'selected' : '' }}>Đang chờ</option>
                                        <option value="1" {{ $posts->status == 1 ? 'selected' : '' }}>Phê duyệt</option>
                                        <option value="0" {{ $posts->status == 0 ? 'selected' : '' }}>Ẩn</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="status">Hiển thị trang chủ:</label>
                                <div class="col-md-9">
                                    <select class="form-select" id="homeflag" name="homeflag">
                                        <option value="1" {{ $posts->homeflag == 1 ? 'selected' : '' }}>Hiển thị</option>
                                        <option value="0" {{ $posts->homeflag == 0 ? 'selected' : '' }}>Ẩn</option>
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
