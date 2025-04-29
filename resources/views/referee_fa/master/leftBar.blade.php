<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/images/{{$settings->where('setting','logo')->first()['value']}}" alt="Mazaarat Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Mazaarat</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->fname.' '.Auth::user()->lname}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="/referee" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard/داشبورد
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/referee/refereeing" class="nav-link">
                        <i class="nav-icon fas fa-media"></i>
                        <p>
                            Competition/رای گیری
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/referee/judged" class="nav-link">
                        <i class="nav-icon fas fa-media"></i>
                        <p>
                            Judged/داوری شده
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <form  action="{{ route('logout') }}" method="POST" >
                        {{csrf_field()}}
                        <button class="btn btn-primary">Exit</button>

                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
