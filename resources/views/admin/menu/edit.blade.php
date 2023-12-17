@extends('admin.master')
@section('title', 'Sửa menu')
@section('main-content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Sửa thông tin menu</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('menu.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('menu.index') }}">Danh sách menu</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sửa menu</li>
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
                    <form class="form-horizontal" method="post" action="{{ route('menu.update', ['menu' => $menu->id]) }}">
                        @csrf
                        {{-- sự dụng PUT--}}
                        @method('PUT')
                        <div class="card-body">
                            <h4 class="card-title">Chỉnh sửa thông tin menu</h4>

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="IsActive">Trạng thái</label>
                                <div class="col-md-9">
                                    <select class="select2 form-select shadow-none" id="IsActive" style="width: 100%; height: 36px" name="IsActive">
                                        <option value="1" {{ $menu->IsActive == 1 ? 'selected' : '' }}>Hiển thị</option>
                                        <option value="0" {{ $menu->IsActive == 0 ? 'selected' : '' }}>Ẩn</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="MenuName">Tên Menu</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="MenuName" name="MenuName" value="{{ $menu->MenuName }}" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="ControllerName">Controller Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="ControllerName" name="ControllerName" value="{{ $menu->ControllerName }}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="Levels">Cấp menu</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="Levels" name="Levels" value="{{ $menu->Levels }}" required min="0" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="ParentID">ID của Menu cha</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="ParentID" name="ParentID" value="{{ $menu->ParentID }}" required min="0" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label" for="MenuOrder">Vị trí Menu</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="MenuOrder" name="MenuOrder" value="{{ $menu->MenuOrder }}" required min="0" />
                                </div>
                            </div>
                        </div>

                        <div class="border-top">
                            <div class="card-body text-center">
                                <input type="submit" name="sua" class="btn btn-primary" value="Lưu lại">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
