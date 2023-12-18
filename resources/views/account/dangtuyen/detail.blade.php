@extends('account.master')
@section('titleaccount', 'Chi tiết bài đăng tuyển dụng')
@section('main-content')
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="card-box mb-30">
            <h2 class="h4 pd-20">Danh sách bài đăng tuyển dụng của bạn</h2>
            <div class="container mt-4">
                <h2>Chi tiết bài viết</h2>

                <div class="row">
                    <div class="col-md-6">
                        <dl class="row">
                            {{-- <dt class="col-sm-4">ID:</dt>
                            <dd class="col-sm-8">{{ $posts->id }}</dd> --}}

                            <dt class="col-sm-4">Tiêu đề:</dt>
                            <dd class="col-sm-8">{{ $posts->title }}</dd>

                            <dt class="col-sm-4">Trạng thái:</dt>
                            <dd class="col-sm-8">{{ $posts->IsActive ? 'Hiển thị' : 'Ẩn' }}</dd>

                            <dt class="col-sm-4">Nội dung:</dt>
                            <dd class="col-sm-8">{{ $posts->content }}</dd>

                            <dt class="col-sm-4">Tác giả:</dt>
                            <dd class="col-sm-8">{{ optional($posts->authorid)->name }}</dd>

                            <dt class="col-sm-4">Thể loại:</dt>
                            <dd class="col-sm-8">{{ optional($posts->category)->name }}</dd>

                            <dt class="col-sm-4">Loại công việc:</dt>
                            <dd class="col-sm-8">{{ $posts->job_type == 1 ? 'Full-Time' : 'Part-Time' }}</dd>

                            <dt class="col-sm-4">Địa chỉ:</dt>
                            <dd class="col-sm-8">{{ $posts->address }}</dd>

                            <dt class="col-sm-4">Số điện thoại:</dt>
                            <dd class="col-sm-8">{{ $posts->phone }}</dd>

                            <dt class="col-sm-4">Ảnh:</dt>
                            <dd class="col-sm-8">
                                @if($posts->img)
                                    <img src="{{ asset('fe-assets') }}/{{ $posts->image}}" alt="">
                                @else
                                    No Image
                                @endif
                            </dd>

                            {{-- <dt class="col-sm-4">Lượt thích:</dt>
                            <dd class="col-sm-8">{{ $posts->likes }}</dd> --}}

                            {{-- <dt class="col-sm-4">Vị trí:</dt>
                            <dd class="col-sm-8">{{ $posts-> }}</dd> --}}

                            <dt class="col-sm-4">Số lượng tuyển dụng:</dt>
                            <dd class="col-sm-8">{{ $posts->vacancy_count }}</dd>

                            <dt class="col-sm-4">Ngày xuất bản:</dt>
                            <dd class="col-sm-8">{{ $posts->published_at }}</dd>

                            <dt class="col-sm-4">Ngày tạo:</dt>
                            <dd class="col-sm-8">{{ $posts->created_at }}</dd>

                            <dt class="col-sm-4">Ngày cập nhật:</dt>
                            <dd class="col-sm-8">{{ $posts->updated_at }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
