<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="">
            <a href="/admin" class="logo text-center">MAROON</a>
            <!--<a href="index.html" class="logo"><img src="assets/images/logo-sm.png" height="36" alt="logo"></a>-->
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>

                <li class="menu-title">Main</li>
                <li>
                    <a href="widgets.html" class="waves-effect"><i class="mdi  mdi-view-dashboard"></i><span>Dashboard</span></a>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i> 
                        <span> 
                            Widgets 
                            <span class="badge badge-pill badge-primary pull-right">
                            20+
                            </span>
                        </span> 
                    </a>
                    <ul class="list-unstyled">
                        <li><a href="index.html">Dashboard One</a></li>
                        <li><a href="dashboard-2.html">Dashboard Two</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-email-outline"></i><span> Email <span class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="list-unstyled">
                        <li><a href="email-inbox.html">Inbox</a></li>
                        <li><a href="email-read.html">Email Read</a></li>
                        <li><a href="email-compose.html">Email Compose</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ url('UserManagement') }}" class="waves-effect"><i class="mdi mdi-account-multiple"></i><span>User Management</span></a>
                </li>
                <li>
                    <a href="{{ url('SchoolManagement') }}" class="waves-effect"><i class="mdi mdi-castle"></i><span>School Management</span></a>
                </li>
                <li>
                    <a href="{{ url('Class') }}" class="waves-effect"><i class="mdi mdi-polaroid"></i><span>Class</span></a>
                </li>
                <li>
                    <a href="{{ url('Section') }}" class="waves-effect"><i class="mdi mdi-polaroid"></i><span>Section</span></a>
                </li>
                <li>
                    <a href="{{ url('Period') }}" class="waves-effect"><i class="mdi mdi-polaroid"></i><span>Period</span></a>
                </li>

            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->