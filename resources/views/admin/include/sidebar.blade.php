<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">   
    <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{ route('admin_dashboard') }}"><i class="fa fa-dashboard"></i> <span> Dashboard</span></a>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-table"></i><span>Classes</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ route('admin_classes') }}"><i class="fa fa-circle-o"></i> List Class</a></li>
                    <li><a href="{{ route('admin_add_class') }}"><i class="fa fa-circle-o"></i> Add Class</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Layout Options</span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">4</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Boxed</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Fixed</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>