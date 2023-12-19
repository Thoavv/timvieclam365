
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
                        {{-- <li class="sidebar-item">
                            <a href="#" class="sidebar-link"><i class="mdi mdi-note-plus"></i>
                                <span class="hide-menu"> Quản lý banner </span>
                            </a>
                        </li> --}}
                        <li class="sidebar-item">
                            <a href="{{ route('posts.index') }}" class="sidebar-link"><i class="mdi mdi-note-plus"></i>
                                <span class="hide-menu"> quản lý bài viết </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
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
                            <a href="#" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i>
                                <span class="hide-menu"> Danh sách bài đăng </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                        aria-expanded="false"><i class="mdi mdi-pencil"></i>
                        <span class="hide-menu">Quản lý ngành nghề</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                        aria-expanded="false"><i class="mdi mdi-pencil"></i>
                        <span class="hide-menu">Quản lý ứng viên</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                        aria-expanded="false"><i class="mdi mdi-pencil"></i>
                        <span class="hide-menu">Quản lý nhà tuyển dụng</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="mdi mdi-move-resize-variant"></i>
                        <span class="hide-menu">Addons </span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link"><i class="mdi mdi-view-dashboard"></i>
                                <span class="hide-menu"> Dashboard-2 </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link"><i class="mdi mdi-multiplication-box"></i>
                                <span class="hide-menu"> Gallery </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link"><i class="mdi mdi-calendar-check"></i>
                                <span class="hide-menu"> Calendar </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link"><i class="mdi mdi-bulletin-board"></i>
                                <span class="hide-menu"> Invoice </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link"><i class="mdi mdi-message-outline"></i>
                                <span class="hide-menu"> Chat Option </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="mdi mdi-account-key"></i>
                        <span class="hide-menu">Authentication </span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="authentication-login.html" class="sidebar-link"><i
                                    class="mdi mdi-all-inclusive"></i>
                                <span class="hide-menu"> Login </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="authentication-register.html" class="sidebar-link"><i
                                    class="mdi mdi-all-inclusive"></i>
                                <span class="hide-menu"> Register </span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->

</aside>

