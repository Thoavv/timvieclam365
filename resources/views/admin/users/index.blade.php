@extends('admin.master')
@section('title', 'Quản lý tài khoản')
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
                <h4 class="page-title">Quản lý tài khoản</h4>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách tài khoản</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><strong>Tên tài khoản</strong></th>
                                        <th><strong>Địa chỉ Email</strong></th>
                                        <th><strong class="col-sm-3">Trạng thái</strong></th>
                                        <th><strong>Tác vụ</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($user as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <form class="form-horizontal" method="post"
                                                action="{{ route('users.update_status', ['users' => $item->id]) }}"
                                                id="updateForm">
                                                @csrf
                                                @method('PUT')
                                                <td>
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-8">
                                                                @if ($item->role_id == 2)
                                                                    <input type="hidden" name="original_status"
                                                                        value="{{ $item->role_id }}">
                                                                    <select class="form-select role_id-select"
                                                                        style="background-color: lightblue;" name="role_id"
                                                                        id="statusSelect">
                                                                        <option value="2"
                                                                            {{ $item->role_id == 2 ? 'selected' : '' }}>
                                                                            Dừng hoạt động </option>
                                                                        <option value="1"
                                                                            {{ $item->role_id == 1 ? 'selected' : '' }}>
                                                                            Đang hoạt động</option>
                                                                    </select>
                                                                @elseif ($item->role_id == 1)
                                                                    <input type="hidden" name="original_status"
                                                                        value="{{ $item->role_id }}">
                                                                    <select style="background-color: lightgreen;"
                                                                        class="form-select role_id-select" name="role_id"
                                                                        id="statusSelect">
                                                                        <option value="2"
                                                                            {{ $item->role_id == 2 ? 'selected' : '' }}>
                                                                            Dừng hoạt động</option>
                                                                        <option value="1"
                                                                            {{ $item->role_id == 1 ? 'selected' : '' }}>
                                                                            Đang hoạt động</option>
                                                                    </select>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-primary" id="updateButton">
                                                        <i class="fa fa-save"></i>
                                                    </button>
                                                </td>
                                            </form>

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
