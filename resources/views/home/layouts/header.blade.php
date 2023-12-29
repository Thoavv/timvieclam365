<div class="header">
    <!-- Start intro section -->
    <section id="intro" class="section-intro">
        <div class="logo-menu">
            <nav class="navbar navbar-default" role="navigation" data-spy="affix" data-offset-top="50">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand logo" href="/"><img style="width: 250px"
                                src="{{ asset('fe-assets') }}/assets/img/logo3.png" alt=""></a>
                    </div>

                    <div class="collapse navbar-collapse" id="navbar">
                        <!-- Start Navigation List -->
                        <ul class="nav navbar-nav">
                            @foreach ($headerData as $menuItem)
                                <li><a class="active" href="/{{ $menuItem->ControllerName }}">
                                        {{ $menuItem->MenuName }}<i class="fa fa-angle"></i>
                                    </a>
                                </li>
                            @endforeach
                            {{-- thông báo --}}


                        </ul>
                        <ul class="nav navbar-nav navbar-right float-right">
                            {{-- <li class="left"><a href="post-job.html"><i class="ti-pencil-alt"></i> </a></li> --}}
                            @if (Auth::check())
                                @if (count($Notifications_Data->where('receiver_id', Auth::id())) > 0)
                                    <li style="margin-left: 100px ">
                                        <a class="notification-icon"  href="#">
                                            🔔<span style="background: #ff0000;" class="badge">
                                                @php
                                                    $notificationCount = 0;
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
                                        <ul>
                                            @php
                                                $notificationCount = 0;
                                            @endphp
                                            @foreach ($Notifications_Data as $ntf)
                                                @if ($ntf->receiver_id == Auth::id())
                                                    @if ($notificationCount < 5)
                                                        <li><a  style="background: rgb(238, 88, 88)"
                                                                href="{{ route('thongbao.show', ['thongbao' => $ntf->id]) }}">{{ $ntf->title }}</a>
                                                        </li>
                                                        @php
                                                            $notificationCount++;
                                                        @endphp
                                                    @endif
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                                <li>
                                    <a>

                                        {{ Auth::user()->name }}<i class="fa fa-angle-down"></i>
                                    </a>
                                    {{-- <a>
                                        {{ Auth::user()->id }}<i class="fa fa-angle-down"></i>
                                    </a> --}}
                                    <ul class="dropdown" style="background: #4caf50; ">
                                        <li>
                                            <a class="text-center" href="/account">
                                                Hồ sơ tài khoản
                                            </a>
                                        </li>
                                        <li><a class="text-center" href="/goidang">Mua gói đăng</a></li>
                                        <li>
                                            <a class="text-center" href="{{ route('logout') }}"
                                                style="background: rgb(238, 88, 88)">
                                                Đăng xuất
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li class="right"><a href="{{ route('login') }}"><i class="ti-lock"></i> Đăng nhập
                                    </a>
                                </li>
                            @endif
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Mobile Menu Start -->
                <ul class="wpb-mobile-menu">
                    @foreach ($headerData as $menuItem)
                        <li>
                            <a class="active" href="/{{ $menuItem->ControllerName }}">{{ $menuItem->MenuName }}</a>
                        </li>
                    @endforeach
                    {{-- logohay --}}
                    {{-- <li class="btn-m"><a href="post-job.html"><i class="ti-pencil-alt"></i> Post A Job</a></li> --}}
                    @if (Auth::check())
                        <li>
                            <a href="">{{ Auth::user()->name }}</a>
                            <ul>
                                <li><a href="/account">Hồ sơ tài khoản</a></li>
                                <li><a href="/goidang">Mua gói đăng</a></li>
                                <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="btn-m"><a href="{{ route('login') }}"><i class="ti-lock"></i>Đăng nhập</a></li>
                    @endif
                </ul>
                <!-- Mobile Menu End -->
            </nav>
        </div>
        <!-- Header Section End -->
    </section>
    <!-- end intro section -->
</div>
