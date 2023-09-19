<div class="app-sidebar">
    <div class="logo">
        <a href="index.html" class="logo-icon"><span class="logo-text">Panel</span></a>
        <div class="sidebar-user-switcher user-activity-online">
            <a href="#">
                <img src="{{ asset('dist/rgpanel/assets') }}/images/avatars/avatar.png">
                <span class="activity-indicator"></span>
                <span class="user-info-text">Chloe<br><span class="user-state-info">@lang('menu.active')</span></span>
            </a>
        </div>
    </div>
    <div class="app-menu">
        <ul class="accordion-menu">

            @can('read dashboard')
                <li class="{{ request()->routeIs('rgpanel.index') ? 'active-page' : '' }}">
                    <a href="{{ route('rgpanel.index', ['locale' => app()->getLocale()]) }}"><i
                            class="material-icons-two-tone">dashboard</i>@lang('menu.dashboard')</a>
                </li>
            @endcan

            <li><a href=""><i class="material-icons-two-tone">collections_bookmark</i>@lang('menu.banners')</a></li>
            <li> <a href="#"><i class="material-icons-two-tone">home_repair_service</i>@lang('menu.services')</a></li>
            <li><a href="#"><i class="material-icons-two-tone">inventory</i>@lang('menu.projects')</a></li>
            <li> <a href="#"><i class="material-icons-two-tone">feedback</i>@lang('menu.feedbacks')</a></li>
            @can('read user')
                <li class="{{ request()->routeIs('rgpanel.users.*') ? 'active-page' : '' }}">
                    <a href="{{ route('rgpanel.users.index', ['locale' => app()->getLocale()]) }}"><i
                            class="material-icons-two-tone">manage_accounts</i>@lang('menu.users')</a>
                </li>
            @endcan
            <li> <a href="#"><i class="material-icons-two-tone">group</i>@lang('menu.teams')</a></li>
            <li> <a href="#"><i class="material-icons-two-tone">settings</i>@lang('menu.apps_settings')</a></li>
            <li>
                <a href="#"><i class="material-icons-two-tone">pages</i>@lang('menu.pages')<i
                        class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                <ul class="sub-menu">
                    <li><a class="active" href="menu-off-canvas.html">@lang('menu.home_page')</a></li>
                    <li><a href="menu-off-canvas.html">@lang('menu.about_page')</a></li>
                    <li><a href="menu-off-canvas.html">@lang('menu.contact_page')</a></li>
                    <li><a href="menu-off-canvas.html">@lang('menu.service_page')</a></li>
                    <li><a href="menu-off-canvas.html">@lang('menu.project_page')</a></li>
                </ul>
            </li>
            <li> <a href="#"><i class="material-icons-two-tone">logout</i>@lang('menu.log_out')</a></li>

        </ul>
    </div>
</div>
