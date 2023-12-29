
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Quản lý danh mục </span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('menu.index') }}" class="sidebar-link"><i class="mdi mdi-note-outline">
                                </i><span class="hide-menu"> Quản lý memu</span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('users.index') }}"
                        aria-expanded="false"><i class="mdi mdi-face"></i>
                        <span class="hide-menu">Quản lý tài khoản</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('order.index') }}"
                        aria-expanded="false"><i class="mdi mdi-relative-scale"></i>
                        <span class="hide-menu">Đơn hàng đăng tuyển</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="mdi mdi-receipt"></i>
                        <span class="hide-menu">Quản lý bài tuyển dụng </span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link"><i class="mdi mdi-emoticon"></i>
                                <span class="hide-menu"> Bài đăng chờ phê duyệt </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('posts.index') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i>
                                <span class="hide-menu"> Danh sách bài đăng </span>

                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('posts.create') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i>
                                <span class="hide-menu"> Thêm mới bài đăng</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="mdi mdi-calendar-check"></i>
                        <span class="hide-menu">Quản lý gói đăng</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('packagestorage.index') }}" class="sidebar-link"><i class="mdi mdi-view-dashboard"></i>
                                <span class="hide-menu"> Danh sách gói đăng </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('packagestorage.create') }}" class="sidebar-link"><i class="mdi mdi-multiplication-box"></i>
                                <span class="hide-menu"> Thêm mới gói đăng </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="mdi mdi-account-key"></i>
                        <span class="hide-menu">{{ Auth::user()->name }} </span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('singout') }}" class="sidebar-link"><i
                                    class="mdi mdi-all-inclusive"></i>
                                <span class="hide-menu"> Đăng xuất </span>
                            </a>
                        </li>
                        {{-- <li class="sidebar-item">
                            <a href="authentication-register.html" class="sidebar-link"><i
                                    class="mdi mdi-all-inclusive"></i>
                                <span class="hide-menu"> Register </span>
                            </a>
                        </li> --}}
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->

</aside>

