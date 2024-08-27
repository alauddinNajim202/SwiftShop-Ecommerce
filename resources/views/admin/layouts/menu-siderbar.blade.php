<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('assets/images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <strong class="brand-text font-weight-bold">Swift Shop</strong>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.profile') }}" class="d-block">{{ Auth::user() ? Auth::user()->name : 'Swift Shop' }}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link @if (Request::segment(2) == 'dashboard') active @endif ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>


                <li class="nav-item @if (Request::routeIs('admin.index') || Request::is('*')) menu-open @endif">
                    <a href="#" class="nav-link @if (Request::routeIs('admin.index') || Request::is('*')) active @endif">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Admin
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.index') }}" class="nav-link @if (Request::routeIs('admin.index')) active @endif">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.create') }}" class="nav-link @if (Request::routeIs('admin.create')) active @endif">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>New</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item @if (Request::routeIs('category.index') || Request::is('*')) menu-open @endif">
                    <a href="#" class="nav-link @if (Request::routeIs('category.index') || Request::is('*')) active @endif">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                             Category
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}" class="nav-link @if (Request::routeIs('category.index')) active @endif">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('category.create') }}" class="nav-link @if (Request::routeIs('category.create')) active @endif">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if (Request::routeIs('sub_category.index') || Request::is('*')) menu-open @endif">
                    <a href="#" class="nav-link @if (Request::routeIs('sub_category.index') || Request::is('*')) active @endif">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Sub Category
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('sub_category.index') }}" class="nav-link @if (Request::routeIs('sub_category.index')) active @endif">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sub_category.create') }}" class="nav-link @if (Request::routeIs('sub_category.create')) active @endif">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>New</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Forms
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/forms/general.html" class="nav-link">
                                <i class="nav-icon far fa-circle text-warning"></i>

                                <p>General Elements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/advanced.html" class="nav-link">
                                <i class="nav-icon far fa-circle text-warning"></i>

                                <p>Advanced Elements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/editors.html" class="nav-link">
                                <i class="nav-icon far fa-circle text-warning"></i>

                                <p>Editors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/validation.html" class="nav-link">
                                <i class="nav-icon far fa-circle text-warning"></i>

                                <p>Validation</p>
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
