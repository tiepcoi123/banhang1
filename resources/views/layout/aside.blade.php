<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('image/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Tiệp Restaurant</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="" class="d-block">{{ Auth::user()->name }}</a>
            </div>

        </div>

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        @php
        $route = Request::route()->getName();
        @endphp
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ $route == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                {{-- Món ăn --}}
                <li class="nav-item {{ $route == 'list_dish' || $route == 'create_dish' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-utensils"></i>
                        <p>
                            Món ăn
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('list_dish') }}"
                                class="nav-link {{ $route == 'list_dish' ? 'active' : '' }}">
                                <i class="fab fa-app-store nav-icon"></i>
                                <p>Danh sách món ăn</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('create_dish') }}"
                                class="nav-link {{ $route == 'create_dish' ? 'active' : '' }}">
                                <i class="fab fa-app-store nav-icon"></i>
                                <p>Tạo món ăn</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Đầu bếp --}}
                <li class="nav-item {{ $route == 'list_chef' || $route == 'create_chef' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Đầu bếp
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('list_chef') }}"
                                class="nav-link {{ $route == 'list_chef' ? 'active' : '' }}">
                                <i class="fab fa-app-store nav-icon"></i>
                                <p>Danh sách đầu bếp</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('create_chef') }}"
                                class="nav-link {{ $route == 'create_chef' ? 'active' : '' }}">
                                <i class="fab fa-app-store nav-icon"></i>
                                <p>Thêm mới đầu bếp</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Khuyến mại --}}
                <li class="nav-item {{ $route == 'list_promotion' || $route == 'create_promotion' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-money-bill-alt"></i>
                        <p>
                            Khuyển mại
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('list_promotion') }}"
                                class="nav-link {{ $route == 'list_promotion' ? 'active' : '' }}">
                                <i class="fab fa-app-store nav-icon"></i>
                                <p>Danh sách khuyển mại</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('create_promotion') }}"
                                class="nav-link {{ $route == 'create_promotion' ? 'active' : '' }}">
                                <i class="fab fa-app-store nav-icon"></i>
                                <p>Thêm mới khuyến mại</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Danh mục Category --}}
                <li class="nav-item {{ $route == 'list_category' || $route == 'create_category' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-caret-square-down"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('list_category') }}"
                                class="nav-link {{ $route == 'list_category' ? 'active' : '' }}">
                                <i class="fab fa-app-store nav-icon"></i>
                                <p>Danh mục</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('create_category') }}"
                                class="nav-link {{ $route == 'create_category' ? 'active' : '' }}">
                                <i class="fab fa-app-store nav-icon"></i>
                                <p>Tạo danh mục</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Chấm công --}}
                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-stopwatch"></i>
                        <p>
                            Timekeeping
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('list_timekeep') }}" class="nav-link ">
                                <i class="fab fa-app-store nav-icon"></i>
                                <p>Danh mục</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('create_timekeep') }}" class="nav-link ">
                                <i class="fab fa-app-store nav-icon"></i>
                                <p>Tạo danh mục</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>

                {{-- Attribute Dish --}}
                <li class="nav-item {{ $route == 'list_attribute' || $route == 'create_attribute' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sort-numeric-down"></i>
                        <p>
                            Attribute
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('list_attribute') }}"
                                class="nav-link {{ $route == 'list_attribute' ? 'active' : '' }}">
                                <i class="fab fa-app-store nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('create_attribute') }}"
                                class="nav-link {{ $route == 'create_attribute' ? 'active' : '' }}">
                                <i class="fab fa-app-store nav-icon"></i>
                                <p>Tạo thuộc tính</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Value Dish --}}
                <li class="nav-item {{ $route == 'list_value' || $route == 'create_value' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-utensils"></i>
                        <p>
                            Value
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('list_value') }}"
                                class="nav-link {{ $route == 'list_value' ? 'active' : '' }}">
                                <i class="fab fa-app-store nav-icon"></i>
                                <p>List value</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('create_value') }}"
                                class="nav-link {{ $route == 'create_value' ? 'active' : '' }}">
                                <i class="fab fa-app-store nav-icon"></i>
                                <p>Tạo giá trị</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Nhân viên --}}
                <li class="nav-item {{ $route == 'list_staff' || $route == 'create_staff' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Nhân viên
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('list_staff') }}"
                                class="nav-link {{ $route == 'list_staff' ? 'active' : '' }}">
                                <i class="fab fa-app-store nav-icon"></i>
                                <p>Danh sách nhân viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('create_staff') }}"
                                class="nav-link {{ $route == 'create_staff' ? 'active' : '' }}">
                                <i class="fab fa-app-store nav-icon"></i>
                                <p>Thêm mới nhân viên</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Chuỗi cung ứng --}}
                <li class="nav-item {{ $route == 'list_provided' || $route == 'create_provided' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-ambulance"></i>
                        <p>
                            Nhà cung ứng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('list_provided') }}"
                                class="nav-link {{ $route == 'list_provided' ? 'active' : '' }}">
                                <i class="fab fa-app-store nav-icon"></i>
                                <p>Danh sách nhà cung ứng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('create_provided') }}"
                                class="nav-link {{ $route == 'create_provided' ? 'active' : '' }}">
                                <i class="fab fa-app-store nav-icon"></i>
                                <p>Thêm nhà cung ứng</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
