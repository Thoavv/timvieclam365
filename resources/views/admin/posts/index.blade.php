@extends('admin.master')
@section('title', 'Quản lý bài viết')
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
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-2"><i class="fas fa-table"></i> Thêm mới</a>
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
                                        <th><strong>Địa chỉ</strong></th>
                                        <th><strong>Số lượng tuyển</strong></th>
                                        <th><strong class="col-sm-3">Trạng thái</strong></th>
                                        <th><strong>Tác vụ</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($posts as $item)
                                        <tr>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->vacancy_count }}</td>
                                            <td><form class="form-horizontal" method="post" action="{{ route('posts.update_status', ['post' => $item->id]) }}" id="updateForm">
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
                                                                        <option value="0"  {{ $item->status == 0 ? 'selected' : '' }}>Ẩn</option>
                                                                    </select>
                                                                @elseif ($item->status == 1)
                                                                    <input type="hidden" name="original_status" value="{{ $item->status }}">
                                                                    <select style="background-color: lightgreen;" class="form-select status-select" name="status" id="statusSelect">
                                                                        <option value="2" {{ $item->status == 2 ? 'selected' : '' }}>Đang chờ</option>
                                                                        <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>Phê duyệt</option>
                                                                        <option value="0"  {{ $item->status == 0 ? 'selected' : '' }}>Ẩn</option>
                                                                    </select>
                                                                @elseif ($item->status == 0)
                                                                    {{-- Giá trị hiện tại của status --}}
                                                                    <input type="hidden" name="original_status" value="{{ $item->status }}">
                                                                    <select style="background-color: lightcoral;" class="form-select status-select" name="status" id="statusSelect">
                                                                        <option value="2" {{ $item->status == 2 ? 'selected' : '' }}>Đang chờ</option>
                                                                        <option value="1"  {{ $item->status == 1 ? 'selected' : '' }}>Phê duyệt</option>
                                                                        <option value="0"{{ $item->status == 0 ? 'selected' : '' }}>Ẩn</option>
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
                                                <a href="{{ route('posts.show', ['post' => $item->id]) }}"
                                                    class="btn btn-success mdi mdi-face"></a>
                                                <a href="{{ route('posts.edit', ['post' => $item->id]) }}"
                                                    class="btn btn-info">
                                                    <ion-icon name="eye-outline"></ion-icon> Sửa
                                                </a>
                                                <form action="{{ route('posts.destroy', ['post' => $item->id]) }}"
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
