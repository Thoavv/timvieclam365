<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
        <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
        <div class="header-search">
            <form>
                <div class="form-group mb-0">
                    <i class="dw dw-search2 search-icon"></i>
                    <input type="text" class="form-control search-input" placeholder="Search Here">
                    <div class="dropdown">
                        <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                            <i class="ion-arrow-down-c"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">From</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control form-control-sm form-control-line" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">To</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control form-control-sm form-control-line" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Subject</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control form-control-sm form-control-line" type="text">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if (Auth::check())
    <div class="header-right">
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div>
        <div class="user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                    <i class="icon-copy dw dw-notification"></i>
                    <span style="color: #ff0000;" class="badge">
                        @php
                            $notificationCount = 0; // Biến đếm thông báo
                        @endphp

                        @foreach ($Notifications_Data as $ntf)
                            @if ($ntf->receiver_id == Auth::id())
                                @php
                                    $notificationCount++;
                                @endphp
                            @endif
                        @endforeach

                        {{ $notificationCount > 0 ? $notificationCount : '' }}
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="notification-list mx-h-350 customscroll">
                        <ul>
                            <li>
                                @php
                                        $notificationCount = 0;
                                    @endphp
                                @foreach ($Notifications_Data as $ntf)
                                    @if ($ntf->receiver_id == Auth::id())
                                        @if ($notificationCount < 5)
                                            <a href="{{ route('thongbao.show', ['thongbao' => $ntf->id]) }}">
                                                <h3>{{ $ntf->title }}</h3>
                                                <p></p>
                                            </a>
                                            @php
                                                    $notificationCount++;
                                                @endphp
                                        @endif
                                    @endif
                                @endforeach

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="{{ asset('vendors') }}/images/photo1.jpg" alt="">
                    </span>
                    <span class="user-name">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="/profile"><i class="dw dw-user1"></i>Thông tin tài khoản</a>
                    <a class="dropdown-item" href="/change-password"><i class="dw dw-settings2"></i>Thay đổi mật khẩu</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"><i class="dw dw-logout"></i>Đăng xuất</a>
                </div>
            </div>
        </div>
        <div class="github-link">
            <a href="https://github.com/dropways/deskapp" target="_blank"><img
                    src="{{ asset('vendors') }}/images/github.svg" alt=""></a>
        </div>
    </div>
    @else
    <div class="user-notification">
        <div class="dropdown">
            <a class="btn btn-light" href="{{ route('login') }}"  >
                Đăng nhập
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="notification-list mx-h-350 customscroll">
                    <ul>
                        <li>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif
</div>
