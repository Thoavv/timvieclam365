@extends('admin.master')
@section('title', 'Quản lý bài viết')
@section('main-content')
    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Quản lý bài viết</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-2" ><i class="fas fa-table" ></i> Thêm mới</a>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách bài viết</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><strong>Tiêu đề</strong></th>
                                        <th><strong>Trạng thái</strong></th>
                                        {{-- <th><strong>Tác giả</strong></th>
                                        <th><strong>Thể loại</strong></th> --}}
                                        {{-- <th><strong>Loại công việc</strong></th> --}}
                                        <th><strong>Địa chỉ</strong></th>
                                        {{-- <th><strong>Số điện thoại</strong></th> --}}
                                        {{-- <th><strong>Ảnh</strong></th> --}}
                                        <th><strong>Số lượng tuyển</strong></th>
                                        <th><strong>Vị trí</strong></th>
                                        {{-- <th><strong>Số lượng tuyển dụng</strong></th> --}}
                                        {{-- <th><strong>Ngày xuất bản</strong></th> --}}
                                        <th><strong>Tác vụ</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($posts as $item)
                                        <tr>
                                            <td>{{ $item->title }}</td>
                                            <td>
                                                @if($item->IsActive == 1)
                                                    Hiển thị
                                                @else
                                                    Ẩn
                                                @endif
                                            </td>
                                            {{-- <td>{{ optional($item->author)->name }}</td>
                                            <td>{{ optional($item->category)->name }}</td> --}}
                                            {{-- <td>{{ $item->job_type == 1 ? 'Full-Time' : 'Part-Time' }}</td> --}}
                                            <td>{{ $item->address }}</td>
                                            {{-- <td>{{ $item->phone }}</td> --}}
                                            {{-- <td><img src="{{ asset('fe-assets') }}/{{ $item->img }}" alt=""></td> --}}
                                            <td>{{ $item->vacancy_count}}</td>
                                            <td>{{ $item->position }}</td>
                                            {{-- <td>{{ $item->vacancies }}</td> --}}
                                            {{-- <td>{{ $item->published_at }}</td> --}}
                                            <td>
                                                <a href="{{ route('posts.show', ['post' => $item->id]) }}" class="btn btn-success mdi mdi-face"></a>
                                                <a href="{{ route('posts.edit', ['post' => $item->id]) }}" class="btn btn-info">
                                                    <ion-icon name="eye-outline"></ion-icon> Sửa
                                                </a>
                                                <form action="{{ route('posts.destroy', ['post' => $item->id]) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xoá bài viết này không?')">
                                                        <ion-icon name="eye-outline"></ion-icon> Xoá
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="14">Chưa có dữ liệu</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
