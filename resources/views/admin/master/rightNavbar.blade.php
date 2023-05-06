<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="https://www.gravatar.com/avatar/52f0fbcbedee04a121cba8dad1174462?s=200&d=mm&r=g" class="img-circle elevation-2" alt="User Image">
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
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                جشنواره ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/festival" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست جشنواره ها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/festival/create" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>تعریف جشنواره</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                کاربرها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/user" class="nav-link ">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>همه کاربرها</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                ارکان
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/pillar" class="nav-link ">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>همه ارکان</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/pillar/create" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد رکن</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-newspaper-o"></i>
                            <p>
                                اخبار
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/news" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>همه اخبار</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/news/create" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>درج خبر</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fa fa-image"></i>
                            <p>
                                گالری
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/gallery" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>همه گالری</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/gallery/create" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>اضافه کردن عکس</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link ">
                                    <i class="nav-icon fa fa-file"></i>
                                    <p>
                                        دسته بندی گالری
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="/admin/gallery_category" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>دسته بندی ها</p>
                                        </a>
                                        <a href="/admin/gallery_category/create" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>ایجاد دسته بندی</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
