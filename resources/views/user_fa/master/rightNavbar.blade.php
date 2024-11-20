<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/images/{{$settings->where('setting','logo')->first()['value']}}"   class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    @if(is_null(Auth::user()->image))
                        <img src="/admin/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
                    @else
                        <img src="/images/users/{{Auth::user()->image}}" class="img-circle elevation-2" alt="User Image">
                    @endif
                </div>
                <div class="info">
                    <a href="#" class="d-block"></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="/admin/panel" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                داشبورد
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/panel/competiton/create" class="nav-link">
                            <i class="nav-icon fa fa-album"></i>
                            <p>
                                ارسال عکس
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/panel/competiton" class="nav-link">
                            <i class="nav-icon fa fa-album"></i>
                            <p>
                                 عکس ارسال شده
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/panel/english" class="nav-link">
                            <i class="nav-icon fas fa-media"></i>
                            <p>
                                English
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/panel/competiton" class="nav-link">
                            <i class="nav-icon fa fa-album"></i>
                            <form  action="{{ route('logout') }}" method="POST" >
                                {{csrf_field()}}
                                <button class="btn btn-primary">خروج</button>

                            </form>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
