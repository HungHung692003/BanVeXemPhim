<div class="nav-container primary-menu">
    <div class="mobile-topbar-header">
        <div>
            <img src="/assets_admin/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rukada</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <nav class="navbar navbar-expand-xl w-100">
        <ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
            <li class="nav-item dropdown">
                <a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                    data-bs-toggle="dropdown">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
                <ul class="dropdown-menu">
                    <li> <a class="dropdown-item" href="index.html"><i class="bx bx-right-arrow-alt"></i>Default</a>
                    </li>
                </ul>
            </li>
            <a class="nav-link" href="/admin/phim/vue">
                <div class="parent-icon"><i class="fa-solid fa-film"></i>
                </div>
                <div class="menu-title">Phim</div>
            </a>
            <a class="nav-link" href="/admin/phong-chieu/vue">
                <div class="parent-icon"><i class="fa-brands fa-chromecast"></i>
                </div>
                <div class="menu-title">Phòng Chiếu</div>
            </a>
            <a class="nav-link" href="/admin/don-vi">
                <div class="parent-icon"><i class="fa-solid fa-thermometer"></i>
                </div>
                <div class="menu-title">Đơn Vị</div>
            </a>
            <a class="nav-link" href="/admin/danh-sach-tai-khoan/vue">
                <div class="parent-icon"><i class="fa-regular fa-address-book"></i>
                </div>
                <div class="menu-title">Danh Sách Tài Khoản</div>
            </a>
            <a class="nav-link" href="/admin">
                <div class="parent-icon"><i class="fa-solid fa-user"></i>
                </div>
                <div class="menu-title">Admin</div>
            </a>
            {{-- <a class="nav-link" href="/admin/ghe-chieu/vue">
                <div class="parent-icon"><i class="fa-solid fa-couch"></i>
                </div>
                <div class="menu-title">Ghế Chiếu</div>
            </a> --}}
            <a class="nav-link" href="/admin/dich-vu">
                <div class="parent-icon"><i class="fa-solid fa-bell"></i>
                </div>
                <div class="menu-title">Dịch Vụ</div>
            </a>
            <li class="nav-item dropdown">
                <a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                    data-bs-toggle="dropdown">
                    <div class="parent-icon"><i class="fa-regular fa-calendar-days"></i>
                    </div>
                    <div class="menu-title">Lịch Chiếu</div>
                </a>
                <ul class="dropdown-menu">
                    <li> <a class="dropdown-item" href="/admin/lich-chieu/sap-chieu"><i class="bx bx-right-arrow-alt"></i>Lịch Sắp Chiếu</a>
                    </li>
                    <li> <a class="dropdown-item" href="/admin/lich-chieu/da-chieu"><i class="bx bx-right-arrow-alt"></i>Lịch Đã Chiếu</a>
                    </li>
                </ul>
            </li>
            @php
                $admin = Auth::guard('admin')->user();
                $id_chuc_nang = 44;
                $user_login = Auth::guard('admin')->user();

                $check = \App\Models\QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                                ->where('id_chuc_nang', $id_chuc_nang)
                                                ->first();
            @endphp
            @if ($check)
                <a class="nav-link" href="/admin/quyen">
                    <div class="parent-icon"><i class="fa-solid fa-user-shield"></i></div>
                    <div class="menu-title">Phân Quyền</div>
                </a>
            @endif
            <a class="nav-link" href="/admin/don-hang">
                <div class="parent-icon"><i class="fa-regular fa-newspaper"></i>
                </div>
                <div class="menu-title">Đơn Hàng</div>
            </a>
            <li class="nav-item dropdown">
                <a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                    data-bs-toggle="dropdown">
                    <div class="parent-icon"><i class="fa-solid fa-chart-line"></i>
                    </div>
                    <div class="menu-title">Thống Kê</div>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="/admin/thong-ke/bt-1">
                            <i class="bx bx-right-arrow-alt"></i>
                            Phim nào có lượt mua nhiều nhất
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/admin/thong-ke/bt-2">
                            <i class="bx bx-right-arrow-alt"></i>
                            Doanh thu từ ngày đến ngày
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/admin/thong-ke/bt-2">
                            <i class="bx bx-right-arrow-alt"></i>
                            5 khách hàng mua vé nhiều
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/admin/thong-ke/bt-2">
                            <i class="bx bx-right-arrow-alt"></i>
                            Các suất chiếu của phim
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/admin/thong-ke/bt-2">
                            <i class="bx bx-right-arrow-alt"></i>
                            Công suất hoạt động của các phòng chiếu
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

</div>
