@extends('admin.master')
@section('title', 'Chi tiết gói đăng')
@section('main-content')
    <div class="main-container">
        <div class="pd-ltr-20">
            <div class="card-box mb-30">
                <div class="container mt-4">
                    <h2>Chi tiết gói đăng</h2>

                    <div class="row">
                        <div class="col-md-6">
                            <dl class="row">

                                <dt class="col-sm-4">Tên gói</dt>
                                <dd class="col-sm-8">{{ $pk->package_name }}</dd>
                                <dt class="col-sm-4">Trạng thái:</dt>
                                <dd class="col-sm-8">{{ $pk->status ? 'Hiển thị' : 'Ẩn' }}</dd>
                                <dt class="col-sm-4">Vị trí hiển thị:</dt>
                                <dd class="col-sm-8">
                                    @if ($pk->homeflag == 2)
                                        <p style="">Việc làm nổi bật</p>
                                    @elseif ($pk->homeflag == 1)
                                        <p style="">Việc làm hấp dẫn</p>
                                    @elseif ($pk->homeflag == 0)
                                        <p style="">Ẩn trang chủ</p>
                                    @endif
                                </dd>
                                <dt class="col-sm-4">Mô tả:</dt>
                                <dd class="col-sm-8">{{ $pk->description }}</dd>
                                <dt class="col-sm-4">Giá:</dt>
                                <dd class="col-sm-8">{{ $pk->price }}</dd>

                                <dt class="col-sm-4">Thời gian</dt>
                                <dd class="col-sm-8">{{ $pk->duration }}</dd>


                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
