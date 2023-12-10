@extends('admin.master')
@section('title', 'Quản lý menu')
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
    <!-- nôi dung trang lam việc-->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Quản lý menu trang</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Library
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <a href="{{ route('menu.create') }}" class="btn btn-primary mb-2" ><i class="fas fa-table" ></i> Thêm mới</a>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách menu</h5>
                        <div class="table-responsive">
                            {{-- zero_config mã js dùng sx theo tên --}}
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><strong>Tên menu</strong></th>
                                        <th><strong>Trạng thái</strong></th>
                                        <th><strong>Vị trí</strong></th>
                                        <th><strong>Cấp menu</strong></th>
                                        <th><strong>Link</strong></th>
                                        <th><strong>Tác vụ</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @forelse ( $menus->sortBy('id') as $item ) sắp xếp tăng dần
                                    @forelse ($menus->sortByDesc('MenuName') as $item) giảm dần--}}
                                    @forelse ( $menus as $item )
                                    <tr>
                                        <td>{{ $item->MenuName }}</td>
                                        <td>
                                            @if($item->IsActive == 1)
                                                Hiển thị
                                            @else
                                                Ẩn
                                            @endif
                                        </td>
                                        <td>{{ $item->Position }}</td>
                                        <td>{{ $item->MenuOrder }}</td>
                                        <td>{{ $item->Link }}</td>
                                        <td>
                                            <a href="{{ route('menu.show', ['menu' => $item->id]) }}" class="btn btn-success mdi mdi-face"></a>
                                            <a href="{{ route('menu.edit', ['menu' => $item->id]) }}" class="btn btn-info"> <ion-icon name="eye-outline"></ion-icon>
                                                Sửa</a>
                                                <form action="{{ route('menu.destroy', ['menu' => $item->id]) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xoá menu này không?')">
                                                        <ion-icon name="eye-outline"></ion-icon> Xoá
                                                    </button>
                                                </form>
                                        </td>
                                    </tr>
                                    @empty
                                        <samp>chưa có dữ liệu</samp>
                                    @endforelse


                                    </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        function confirmDelete(menuId) {
            // Hiển thị hộp thoại xác nhận xoá
            var isConfirmed = confirm('Bạn có chắc chắn muốn xoá menu này không?');

            // Nếu người dùng chọn "OK", chuyển hướng đến route xoá với ID menu
            if (isConfirmed) {
                window.location.href = '/menu/delete/' + menuId;
            }
        }
    </script> --}}
@endsection
