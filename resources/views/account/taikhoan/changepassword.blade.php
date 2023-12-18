@extends('account.master')
@section('titleaccount', 'Thay đổi mật khẩu')
@section('main-content')
    <div class="main-container">
        <div class="pd-ltr-20">
            <div class="card-box mb-30">
                <h2 class="h4 pd-20"></h2>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{ __('Thay đổi mật khẩu') }}</div>
                                <div class="card-body">
                                    @if (session('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    @if (session('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('change.password') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="current_password">{{ __('Mật khẩu cũ') }}</label>
                                            <input id="current_password" type="password" class="form-control"
                                                name="current_password" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">{{ __('Mật khẩu mới') }}</label>
                                            <input id="password" type="password" class="form-control" name="password"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label for="password_confirmation">{{ __('xác thực mật khẩu mới') }}</label>
                                            <input id="password_confirmation" type="password" class="form-control"
                                                name="password_confirmation" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Đội mật khẩu') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
