<style>
    .navbar-vertical .nav-link {
        color: #ffffff;
    }

    .navbar .nav-link:hover {
        color: #FAA921;
    }

    .navbar .active > .nav-link, .navbar .nav-link.active, .navbar .nav-link.show, .navbar .show > .nav-link {
        color: #FAA921;
    }

    .navbar-vertical .active .nav-indicator-icon, .navbar-vertical .nav-link:hover .nav-indicator-icon, .navbar-vertical .show > .nav-link > .nav-indicator-icon {
        color: #FAA921;
    }

    .nav-subtitle {
        display: block;
        /* color: #ffffff; */
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: .03125rem;
    }

    .nav-indicator-icon {
        margin-left: {{Session::get('direction') === "rtl" ? '6px' : ''}};
    }
</style>

<div id="sidebarMain" class="d-none">
    <aside
        style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
        class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered ">
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset pb-0">
                <div class="navbar-brand-wrapper justify-content-between side-logo">
                    <!-- Logo -->
                    <a class="navbar-brand" href="{{route('panel.dashboard')}}" aria-label="Front">
                    TEST PROPERTY
                    </a>
                    <!-- Navbar Vertical Toggle -->
                    <button type="button"
                            class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
                        <i class="tio-clear tio-lg"></i>
                    </button>
                    <!-- End Navbar Vertical Toggle -->
                </div>

                <!-- Content -->
                <div class="navbar-vertical-content mt-2">
                    <ul class="navbar-nav navbar-nav-lg nav-tabs">
                        <!-- Dashboards -->

                        <li class="navbar-vertical-aside-has-menu {{Request::is('panel')?'show':''}}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="{{route('panel.dashboard')}}">
                                <i class="tio-home-vs-1-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    {{('Dashboard')}}
                                </span>
                            </a>
                        </li>

                        <!-- End Dashboards -->
                        <!-- POS -->

                        <!-- End POS -->

                            <li class="navbar-vertical-aside-has-menu {{Request::is('panel/Company/list*')?'active':''}}">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                href="{{route('panel.Company.list')}}">
                                    <i class="tio-filter-list nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{('Companies')}}</span>
                                </a>
                            </li>

                            <li class="navbar-vertical-aside-has-menu {{Request::is('panel/Employee/list*')?'active':''}}">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                href="{{route('panel.Employee.list')}}">
                                    <i class="tio-filter-list nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{('Employees')}}</span>
                                </a>
                            </li>



                    </ul>
                </div>
                <!-- End Content -->
            </div>
        </div>
    </aside>
</div>

<div id="sidebarCompact" class="d-none">

</div>
