<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="">
            <a href="/admin" class="logo text-center">{{ get_option('school_name')}}</a>
            <!--<a href="index.html" class="logo"><img src="assets/images/logo-sm.png" height="36" alt="logo"></a>-->
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            @include('layouts.menus.'.Auth::user()->user_type)
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->
