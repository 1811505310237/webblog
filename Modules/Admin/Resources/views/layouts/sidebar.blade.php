<!--Active Sidebar-->
@php
$module_active = session('module_active');
@endphp
<!--End Active Sidebar-->

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset(get_data_user('web', 'avatar')) }}" class="img-circle" alt="User Image" width="45px">
            </div>
            <div class="pull-left info">
                <p>{{ get_data_user('web', 'name') }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Trực tuyến</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            
            <li class="{{ ($module_active == 'dashboard')?'active':''}}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Tổng quan</span>
                </a>
            </li>
            <li class="{{ ($module_active == 'danhmuc')?'active':''}}">
                <a href="{{ route('admin.danhmuc.index') }}">
                    <i class="fa fa-th"></i> <span>Danh mục</span>
                </a>
            </li>
            <li class="{{ ($module_active == 'baiviet')?'active':''}}">
                <a href="{{ route('admin.baiviet.index') }}">
                    <i class="fa fa-th"></i> <span>Bài viết</span>
                </a>
            </li> 
            <li class="{{ ($module_active == 'comment')?'active':''}}">
                <a href="{{ route('admin.comment.index') }}">
                    <i class="fa fa-th"></i> <span>Bình luận</span>
                </a>
            </li> 
            <li class="{{ ($module_active == 'staticpage')?'active':''}}">
                <a href="{{ route('admin.static.index') }}">
                    <i class="fa fa-th"></i> <span>Trang tĩnh</span>
                </a>
            </li> 
            <li class="{{ ($module_active == 'ip')?'active':''}}">
                <a href="{{ route('admin.ip.index') }}">
                    <i class="fa fa-th"></i> <span>Quản lý IP truy cập</span>
                </a>
            </li> 

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>