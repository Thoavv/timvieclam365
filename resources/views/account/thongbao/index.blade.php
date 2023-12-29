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
                    <p class="font-18 max-width-600">            <ul>
                        <li><strong></strong> {{ $notification->title }}</li>
                        <li><strong></strong> {{ $notification->message }}</li>
                        {{-- Add more fields as needed --}}
                    </ul></p>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
