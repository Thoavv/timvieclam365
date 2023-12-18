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
                    <p class="font-18 max-width-600">Chúng tôi tạo ra trang web này nhằm mục đích giúp bạn quản lý linh hoạt trong việc tìm kiếm nhân lực cho công ty
                        hoặc bạn là một người có khả năng sáng tạo trong công việc mà chưa được các công ty biết đến đây là nơi bạn có thể tạo hồ sơ xin việc trực tuyến!</p>
                </div>
            </div>
        </div>
        <div class="card-box mb-30">
            <h2 class="h4 pd-20">Danh sách bài đăng tuyển dụng của bạn</h2>
            <div class="table-responsive">
                <table class="data-table table nowrap col-lg-8 col-xl-12">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort ">Tiêu đề</th>
                            <th>Khu vực</th>
                            <th>Số lượng</th>
                            <th>Số ứng viên</th>
                            <th>Trạng thái</th>
                            <th class="datatable-nosort">Công cụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->vacancy_count }}</td>
                                <td>{{ $item->vacancy_count }}</td>
                                <td>
                                    @if ($item->status == 2)
                                        <p style="background-color: lightblue;" >Đang chờ</p>
                                    @elseif ($item->status == 1)
                                        <p style="background-color: lightgreen;" >Phê duyệt</p>
                                    @elseif ($item->status == 2)
                                        <p style="background-color: lightcoral;">Ẩn</p>
                                    @endif
                                </td>
                                <td>

                                    <a style="background-color: lightgreen;" href="{{ route('dangtuyen.show', ['dangtuyen' => $item->id]) }}"
                                        class="btn icon-copy ion-social-octocat"></a>
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

@endsection
