<!-- Sidebar -->
<div class="sidebar">
    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar"><i class="fas fa-search fa-fw"></i></button>
            </div>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="/" class="nav-link"><i class="nav-icon fas fa-th"></i><p> HOME</p></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="nav-icon fas fa-tachometer-alt"></i><p>顧客管理<i class="right fas fa-angle-left"></i></p></a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item"><a href="/client_new" class="nav-link"><i class="far fa-circle nav-icon"></i><p>新規顧客登録</p></a></li>
                    <li class="nav-item"><a href="/client_list" class="nav-link"><i class="far fa-circle nav-icon"></i><p>顧客一覧</p></a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->