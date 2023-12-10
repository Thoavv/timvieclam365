@extends('admin.master')
@section('title', 'Trang chủ')
@section('main-content')
    <!-- nôi dung trang lam việc-->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Trang quản trị</h4>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Xin chào Admin</h5>
                        {{-- <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><strong>Tên menu</strong></th>
                                        <th><strong>Vị trí</strong></th>
                                        <th><strong>Cấp menu</strong></th>
                                        <th><strong>Trạng thái</strong></th>
                                        <th><strong>Tác vụ</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Trang chủ</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>hiển thị</td>
                                        <td>
                                            <a href="" class="btn btn-info"> <ion-icon name="eye-outline"></ion-icon>
                                                Sủa</a>
                                            <a href="" class="btn btn-danger"> <ion-icon
                                                    name="eye-outline"></ion-icon> Xoá</a>
                                        </td>
                                    </tr>
                                    </tfoot>
                            </table>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
