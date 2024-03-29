@extends('admin.master')
@section('title', 'Quản đơn hàng đăng tuyển')
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
                <h4 class="page-title">Quản lý đơn hàng đăng tuyển</h4>
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
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-2"><i class="fas fa-table"></i> Thêm mới</a>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách đơn hàng đăng tuyển</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><strong>Tên gói</strong></th>
                                        <th><strong>Người mua</strong></th>
                                        <th><strong>Đã sự dụng</strong></th>
                                        <th><strong class="col-sm-3">Trạng thái</strong></th>
                                        <th><strong>Tác vụ</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($order as $item)
                                        <tr>
                                            <td>{{ $item->package_id }}</td>
                                            <td>{{ $item->user_name }}</td>
                                            <td>{{ $item->post_id }}</td>
                                            <td><form class="form-horizontal" method="post" action="{{ route('order.update_status', ['order' => $item->id]) }}" id="updateForm">
                                                @csrf
                                                @method('PUT')

                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-8">
                                                                @if ($item->status == 2)
                                                                    <input type="hidden" name="original_status" value="{{ $item->status }}">
                                                                    <select class="form-select status-select" style="background-color: lightblue;" name="status" id="statusSelect">
                                                                        <option value="2"  {{ $item->status == 2 ? 'selected' : '' }}>Đang chờ</option>
                                                                        <option value="1"  {{ $item->status == 1 ? 'selected' : '' }}>Phê duyệt</option>
                                                                        <option value="0"  {{ $item->status == 0 ? 'selected' : '' }}>Đã dùng</option>
                                                                    </select>
                                                                @elseif ($item->status == 1)
                                                                    <input type="hidden" name="original_status" value="{{ $item->status }}">
                                                                    <select style="background-color: lightgreen;" class="form-select status-select" name="status" id="statusSelect">
                                                                        <option value="2" {{ $item->status == 2 ? 'selected' : '' }}>Đang chờ</option>
                                                                        <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>Phê duyệt</option>
                                                                        <option value="0"  {{ $item->status == 0 ? 'selected' : '' }}>Đã dùng</option>
                                                                    </select>
                                                                @elseif ($item->status == 0)
                                                                    {{-- Giá trị hiện tại của status --}}
                                                                    <input type="hidden" name="original_status" value="{{ $item->status }}">
                                                                    <select style="background-color: lightcoral;" class="form-select status-select" name="status" id="statusSelect">
                                                                        <option value="2" {{ $item->status == 2 ? 'selected' : '' }}>Đang chờ</option>
                                                                        <option value="1"  {{ $item->status == 1 ? 'selected' : '' }}>Phê duyệt</option>
                                                                        <option value="0"{{ $item->status == 0 ? 'selected' : '' }}>Đã dùng</option>
                                                                    </select>
                                                                @endif
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <button type="submit" class="btn btn-primary" id="updateButton">
                                                                    <i class="fa fa-save"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    </form>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{ route('order.show', ['order' => $item->id]) }}"
                                                    class="btn btn-success mdi mdi-face"></a>
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
