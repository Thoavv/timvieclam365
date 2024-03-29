<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <!-- logo -->
        <div class="navbar-header" data-logobg="skin5">
            <a class="navbar-brand" href="{{ route('admin.index') }}">
                <!-- Logo icon -->
                <b class="logo-icon ps-2">
                    <img src="{{ asset('assets') }}/assets/images/logo3.png" alt="homepage" class="light-logo"
                        width="230" />
                </b>
                <!-- Logo text -->
                {{-- <span class="logo-text ms-2">
                    <!-- dark Logo text -->
                    <img src="{{ asset('assets') }}/assets/images/log-text.png" alt="homepage"
                        class="light-logo" />
                </span> --}}
            </a>
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
        </div>
        <!-- End Logo -->

        <!-- menu ngang -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav float-start me-auto">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                        data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
                </li>
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item search-box">
                    <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i
                            class="mdi mdi-magnify fs-4"></i></a>
                    <form class="app-search position-absolute">
                        <input type="text" class="form-control" placeholder="Tìm kiếm" />
                        <a class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                    </form>
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="2"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-bell font-24"></i>
                        <span style="background: #ff0000;" class="badge">
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
                    <ul class="dropdown-menu dropdown-menu-end mailbox animated bounceInDown" aria-labelledby="2">
                        <ul class="list-style-none">
                            <li>
                                <div class="">
                                    <!-- thông báo  -->
                                    @php
                                        $notificationCount = 0;
                                    @endphp

                                    @foreach ($Notifications_Data as $ntf)
                                        @if ($ntf->receiver_id == Auth::id())
                                            @if ($notificationCount < 5)
                                                <a href="{{ route('notification.show', ['notification' => $ntf->id]) }}"
                                                    class="link border-top">
                                                    <div class="d-flex no-block align-items-center p-10">
                                                        <span
                                                            class="btn btn-danger btn-circle d-flex align-items-center justify-content-center"><i
                                                                class="mdi mdi-link fs-4"></i></span>
                                                        <div class="ms-2">
                                                            <h5 class="mb-0">{{ $ntf->title }}</h5>
                                                            <span class="mail-desc"></span>
                                                        </div>
                                                    </div>
                                                </a>
                                                @php
                                                    $notificationCount++;
                                                @endphp
                                            @endif
                                        @endif
                                    @endforeach

                                </div>
                            </li>
                        </ul>
                    </ul>
                </li>
                <!-- thông tin tài khoản -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#"
                        id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}<i class="fa fa-angle-down"></i>
                        <img src="{{ asset('assets') }}/assets/images/users/1.jpg" alt="user" class="rounded-circle"
                            width="31" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('singout') }}"><i
                                class="fa fa-power-off me-1 ms-1"></i> Đăng xuất</a>
                        <div class="dropdown-divider"></div>
                    </ul>
                </li>
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>
