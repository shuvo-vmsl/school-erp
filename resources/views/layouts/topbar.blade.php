<!-- Top Bar Start -->
<div class="topbar">

    <nav class="navbar-custom">


        <ul class="list-inline float-right mb-0">

            <!-- notification-->
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <i class="ion-ios7-bell noti-icon"></i>
                    <span class="badge badge-danger noti-icon-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5>Notification (3)</h5>
                    </div>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                        <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                        <p class="notify-details"><b>Your order is placed</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
                        <p class="notify-details"><b>New Message received</b><small class="text-muted">You have 87 unread messages</small></p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-info"><i class="mdi mdi-martini"></i></div>
                        <p class="notify-details"><b>Your item is shipped</b><small class="text-muted">It is a long established fact that a reader will</small></p>
                    </a>

                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        View All
                    </a>

                </div>
            </li>
            <!-- User-->
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('public/admin-asset') }}/assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> {{ _lang('Hi').", ".Auth::user()->name }}</a>
                    <a class="dropdown-item" href="{{ url('profile/my_profile')}}" data-title="{{ _lang('Profile') }}">{{ _lang('Profile') }}</a>
                    <a class="dropdown-item" href="{{ url('profile/edit')}}" data-title="{{ _lang('Edit Profile') }}">{{ _lang('Update Profile') }}</a>
                    <a class="dropdown-item" href="{{ url('profile/changepassword') }}" data-title="{{ _lang('Change Password') }}">{{ _lang('Change Password') }}</a>
                    <a class="dropdown-item" href="#"><i class="dripicons-lock text-muted"></i> Lock screen</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>

        <!-- Page title -->
        <ul class="list-inline menu-left mb-0">
            <li class="list-inline-item">
                <button type="button" class="button-menu-mobile open-left waves-effect">
                    <i class="ion-navicon"></i>
                </button>
            </li>
            <li class="hide-phone list-inline-item app-search">
                @if(Auth::user()->user_type == 'Admin')
                <li>
                    <select class="select_class" onchange="changeSession(this);" style="margin-top: 22px;">
                      @foreach(get_table('academic_years') as $session)
                          <option value="{{ $session->id }}" {{ $session->id==get_option('academic_year') ? "selected" : "" }}>{{ _lang('Session') }} ({{ $session->year }})</option>
                      @endforeach
                    </select>
                </li>
                @endif
            </li>
        </ul>

        <div class="clearfix"></div>
    </nav>

</div>
<!-- Top Bar End -->
