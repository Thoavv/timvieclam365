@extends('account.master')
@section('titleaccount', 'Quản hồ sơ tài khoản')
@section('main-content')
    <div class="main-container">
        <div class="pd-ltr-20">
            <div class="card-box pd-20 height-100-p mb-30">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <img src="{{ asset('vendors') }}/images/banner-img.png" alt="">
                    </div>
                    <div class="col-md-8">
                        <h4 class="font-20 weight-500 mb-10 text-capitalize">
                            <div class="weight-600 font-30 text-blue">Chào bạn {{ Auth::user()->name }}</div>
                        </h4>
                        <p class="font-18 max-width-600">Chúng tôi tạo ra trang web này nhằm mục đích giúp bạn quản lý linh
                            hoạt trong việc tìm kiếm nhân lực cho công ty
                            hoặc bạn là một người có khả năng sáng tạo trong công việc mà chưa được các công ty biết đến đây
                            là nơi bạn có thể tạo hồ sơ xin việc trực tuyến!</p>
                    </div>
                </div>
            </div>
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
            <div class="card-box mb-30">
                <h2 class="h4 pd-20">Danh sách các ứng viên</h2>
                <div class="table-responsive">
                    <table class="data-table table nowrap col-lg-8 col-xl-12">
                        <thead>
                            <tr>
                                <th>Tên bài đăng</th>
                                <th>Tên ứng viên</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Trạng thái</th>
                                <th>Xem CV</th>
                                <th class="datatable-nosort">Công cụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($candidates as $candidate)
                                <tr>
                                    <td>{{ $candidate->title }}</td>
                                    <td>{{ $candidate->full_name }}</td>
                                    <td>{{ $candidate->email }}</td>
                                    <td>
                                        {{ $candidate->phone_number }}
                                    </td>

                                    <form class="form-horizontal" method="post"
                                        action="{{ route('candidates.update_status', ['candidates' => $candidate->id]) }}"
                                        id="updateForm">
                                        @csrf
                                        @method('PUT')
                                        <td>
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        @if ($candidate->status == 2)
                                                            <input type="hidden" name="original_status"
                                                                value="{{ $candidate->status }}">
                                                            <select class="form-select status-select"
                                                                style="background-color: lightblue;" name="status"
                                                                id="statusSelect">
                                                                <option value="2"
                                                                    {{ $candidate->status == 2 ? 'selected' : '' }}>Đang
                                                                    chờ</option>
                                                                <option value="1"
                                                                    {{ $candidate->status == 1 ? 'selected' : '' }}>Được
                                                                    nhận</option>
                                                                <option value="0"
                                                                    {{ $candidate->status == 0 ? 'selected' : '' }}>Trượt
                                                                </option>
                                                            </select>
                                                        @elseif ($candidate->status == 1)
                                                            <input type="hidden" name="original_status"
                                                                value="{{ $candidate->status }}">
                                                            <select style="background-color: lightgreen;"
                                                                class="form-select status-select" name="status"
                                                                id="statusSelect">
                                                                <option value="2"
                                                                    {{ $candidate->status == 2 ? 'selected' : '' }}>Đang
                                                                    chờ</option>
                                                                <option value="1"
                                                                    {{ $candidate->status == 1 ? 'selected' : '' }}>Được
                                                                    nhận</option>
                                                                <option value="0"
                                                                    {{ $candidate->status == 0 ? 'selected' : '' }}>Trượt
                                                                </option>
                                                            </select>
                                                        @elseif ($candidate->status == 0)
                                                            {{-- Giá trị hiện tại của status --}}
                                                            <input type="hidden" name="original_status"
                                                                value="{{ $candidate->status }}">
                                                            <select style="background-color: lightcoral;"
                                                                class="form-select status-select" name="status"
                                                                id="statusSelect">
                                                                <option value="2"
                                                                    {{ $candidate->status == 2 ? 'selected' : '' }}>Đang
                                                                    chờ</option>
                                                                <option value="1"
                                                                    {{ $candidate->status == 1 ? 'selected' : '' }}>Được
                                                                    nhận</option>
                                                                <option
                                                                    value="0"{{ $candidate->status == 0 ? 'selected' : '' }}>
                                                                    Trượt</option>
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
                                            <a style="background-color: lightgreen;" href="{{ $candidate->link_cv }}"
                                                class="btn icon-copy ion-social-octocat"></a>
                                        </td>
                                    </form>


                                    <td>
                                        <a style="background-color: lightgreen;" href="{{ $candidate->link_cv }}"
                                            class="btn icon-copy ion-social-octocat"></a>
                                        <a href="{{ route('posts.edit', ['post' => $candidate->id]) }}"
                                            class="btn btn-info">
                                            <ion-icon name="eye-outline"></ion-icon> Sửa
                                        </a>
                                        <form action="{{ route('posts.destroy', ['post' => $candidate->id]) }}"
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
                                    <td colspan="6">Chưa có dữ liệu</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
