@extends('account.master')
@section('titleaccount', 'Danh sách gói đăng của bạn')
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
                        <div class="weight-600 font-30 text-blue">Chào bạn</div>
                    </h4>
                    <p class="font-18 max-width-600">Chúng tôi tạo ra trang web này nhằm mục đích giúp bạn quản lý
                         linh hoạt trong việc tìm kiếm nhân lực cho công ty!</p>
                </div>
            </div>
        </div>
        <div class="card-box mb-30">
            <h2 class="h4 pd-20">Danh sách gói đăng tuyển dụng của bạn</h2>
            <div class="table-responsive">
                <table class="data-table table nowrap col-lg-8 col-xl-12">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort ">Tên gói</th>
                            <th>giá </th>
                            <th>Thời gian</th>
                            <th>Mô tả   </th>
                            <th>Trạng thái</th>
                            <th class="datatable-nosort">Công cụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $item)
                            <tr>
                                <td>{{ $item->package_name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->duration }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    @if ($item->status == 2)
                                        <p style="background-color: lightblue;" >Đang chờ</p>
                                    @elseif ($item->status == 1)
                                        <p style="background-color: lightgreen;" >Đã mua</p>
                                    {{-- @elseif ($item->status == 2)
                                        <p style="background-color: lightcoral;">Ẩn</p> --}}
                                    @endif
                                </td>
                                <td>
                                    {{-- <a style="background-color: lightgreen;" href="{{ route('dangtuyen.show', ['dangtuyen' => $item->id]) }}"
                                        class="btn icon-copy ion-social-octocat"></a> --}}
                                    <a href="dangtuyen/create"
                                        class="btn btn-info">
                                        <ion-icon name="eye-outline"></ion-icon> Sử dụng
                                    </a>
                                    {{-- <form action="{{ route('dangtuyen.destroy', ['dangtuyen' => $item->id]) }}"
                                        method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Bạn có chắc chắn muốn xoá bài viết này không?')">
                                            <ion-icon name="eye-outline"></ion-icon> Xoá
                                        </button>
                                    </form> --}}
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
