<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            {{--<li class="header"></li>--}}
            @can('system')
                <li class="<?php  if (in_array(request()->route()->uri(), ['admin/permissions', 'admin/users', 'admin/roles'])) {
                    echo 'active';
                } ?> treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>系统管理</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/permissions"><i class="fa fa-circle-o"></i> 权限管理</a></li>
                        <li><a href="/admin/users"><i class="fa fa-circle-o"></i> 用户管理</a></li>
                        <li><a href="/admin/roles"><i class="fa fa-circle-o"></i> 角色管理</a></li>
                    </ul>
                </li>
            @endcan
            @can('post')
                <li class="<?php  if (mb_substr(request()->route()->uri(), 0, 11) == 'admin/posts') {
                    echo 'active';
                } ?> treeview">
                    <a href="/admin/posts">
                        <i class="fa fa-dashboard"></i> <span>文章管理</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/posts"><i class="fa fa-circle-o"></i>文章列表</a></li>
                    </ul>
                </li>
            @endcan
            @can('topic')
                <li class="treeview">
                    <a href="/admin/topics">
                        <i class="fa fa-dashboard"></i> <span>专题管理</span>
                    </a>
                </li>
            @endcan
            @can('notice')
                <li class="treeview">
                    <a href="/admin/notices">
                        <i class="fa fa-dashboard"></i> <span>通知管理</span>
                    </a>
                </li>
            @endcan


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>