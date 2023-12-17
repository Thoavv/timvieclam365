@extends('admin.master')
@section('title', 'Chi tiết menu')
@section('main-content')
    <!-- nôi dung trang lam việc-->
    <!-- ============================================================== -->
    <!-- resources/views/admin/menu/detail.blade.php -->
    <div class="container mt-4">
        <h2>Menu Details</h2>

        <div class="row">
            <div class="col-md-6">
                <dl class="row">
                    <dt class="col-sm-4">ID:</dt>
                    <dd class="col-sm-8">{{ $menu->id }}</dd>

                    <dt class="col-sm-4">Menu Name:</dt>
                    <dd class="col-sm-8">{{ $menu->MenuName }}</dd>

                    <dt class="col-sm-4">Controller Name:</dt>
                    <dd class="col-sm-8">{{ $menu->ControllerName }}</dd>

                    <dt class="col-sm-4">Levels:</dt>
                    <dd class="col-sm-8">{{ $menu->Levels }}</dd>

                    <dt class="col-sm-4">Parent ID:</dt>
                    <dd class="col-sm-8">{{ $menu->ParentID }}</dd>

                    <dt class="col-sm-4">Menu Order:</dt>
                    <dd class="col-sm-8">{{ $menu->MenuOrder }}</dd>

                    <dt class="col-sm-4">Is Active:</dt>
                    <dd class="col-sm-8">{{ $menu->IsActive ? 'Yes' : 'No' }}</dd>

                    <dt class="col-sm-4">Created At:</dt>
                    <dd class="col-sm-8">{{ $menu->created_at }}</dd>

                    <dt class="col-sm-4">Updated At:</dt>
                    <dd class="col-sm-8">{{ $menu->updated_at }}</dd>
                </dl>
                <a href="{{ route('menu.edit', ['menu' => $menu->id]) }}" class="btn btn-info"> <ion-icon name="eye-outline"></ion-icon>
                    Sửa</a>
                    <form action="{{ route('menu.destroy', ['menu' => $menu->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xoá menu này không?')">
                            <ion-icon name="eye-outline"></ion-icon> Xoá
                        </button>
                    </form>
            </div>
        </div>
    </div>
@endsection
