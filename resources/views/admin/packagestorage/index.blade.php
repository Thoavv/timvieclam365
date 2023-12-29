@extends('admin.master')
@section('title', 'Quản lý gói đăng')
@section('main-content')
    <div class="row">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Quản lý gói đăng</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh sách gói đăng</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <a href="{{ route('packagestorage.create') }}" class="btn btn-primary mb-2"><i class="fas fa-table"></i> Thêm
            mới</a>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách bài viết</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><strong>Tiên gói</strong></th>
                                        <th><strong>Giá tiền</strong></th>
                                        <th><strong>Thời gian</strong></th>
                                        <th><strong class="col-sm-3">Trạng thái</strong></th>
                                        <th><strong class="col-sm-3">Nơi hiển thị</strong></th>
                                        <th><strong>Tác vụ</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($packages as $item)
                                        <tr>
                                            <td>{{ $item->package_name }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->duration }}</td>
                                            <td>
                                                @if ($item->status == 0)
                                                    <p>Ẩn</p>
                                                @elseif ($item->status == 1)
                                                    <p>Hiển thị</p>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->homeflag == 2)
                                                    <p style="">Việc làm nổi bật</p>
                                                @elseif ($item->homeflag == 1)
                                                    <p style="">Việc làm hấp dẫn</p>
                                                @elseif ($item->homeflag == 0)
                                                    <p style="">Ẩn trang chủ</p>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('packagestorage.show', ['packagestorage' => $item->id]) }}"
                                                    class="btn btn-success mdi mdi-face"></a>
                                                <a href="{{ route('packagestorage.edit', ['packagestorage' => $item->id]) }}"
                                                    class="btn btn-info">
                                                    <ion-icon name="eye-outline"></ion-icon> Sửa
                                                </a>
                                                <form
                                                    action="{{ route('packagestorage.destroy', ['packagestorage' => $item->id]) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xoá bài viết này không?')">
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
