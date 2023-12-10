@extends('admin.master')
@section('title', 'Thêm mới menu')
@section('main-content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Thêm mới thanh menu</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="ds_menu.php">Home</a></li>
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form class="form-horizontal" method="post" action="{{ route('menu.store') }}">
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title">Nhập thông tin menu</h4>

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="IsActive">Trạng
                                    thái</label>
                                <div class="col-md-9">
                                    <select class="select2 form-select shadow-none" id="IsActive"
                                        style="width: 100%; height: 36px" name="IsActive">
                                        <option value="1">Hiển thị</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="MenuName">Tên
                                    Menu</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="MenuName" name="MenuName" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label"
                                    for="ControllerName">Controller Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="ControllerName" name="ControllerName" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="Levels">Cấp
                                    menu</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="Levels" name="Levels" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="ParentID">ID của Menu
                                    cha</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="ParentID" name="ParentID" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="MenuOrder">Thứ tự
                                    Menu</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="MenuOrder" name="MenuOrder" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="Position">Vị trí</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="Position" name="Position" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="Link">Đường
                                    Link</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="Link" name="Link" />
                                </div>
                            </div>
                        </div>

                        <div class="border-top">
                            <div class="card-body">
                                <input type="submit" name="them" class="btn btn-primary" value="Lưu lại">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
