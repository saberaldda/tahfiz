<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/admin/img/favicon/omar.png') }}" width="60px" height="70px" alt="مركز تحفيظ عمر بن الخطاب">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-3 text-capitalize">مركز تحفيظ <br>عمر بن الخطاب</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">{{ __('Dashboard') }}</div>
            </a>
        </li>
    
        <!-- Users -->
        <li class="menu-item {{ str_contains(request()->url(), 'users') ? 'open active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Users">{{ __('Users') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('users.index') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}" class="menu-link">
                        <div data-i18n="Users">{{ __('All Users') }}</div>
                    </a>
                </li>
                <li class="menu-item">
                    @if (request()->routeIs('users.index'))
                        <a href="javascript:void(0);" class="menu-link" data-bs-toggle="modal" data-bs-target="#addUser">
                    @else
                        <a href="{{ route('users.index') }}" class="menu-link">
                    @endif
                        <div data-i18n="add-new-user">{{ __('Add New User') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('users.evaluation') ? 'active' : '' }}">
                    <a href="{{ route('users.evaluation') }}" class="menu-link">
                        <div data-i18n="add-new-user">{{ __('اضافة تقييم') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('users.evaluation.edit') ? 'active' : '' }}">
                    <a href="{{ route('users.evaluation.edit') }}" class="menu-link">
                        <div data-i18n="add-new-user">{{ __('تعديل تقييم') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('users.points.show') ? 'active' : '' }}">
                    <a href="{{ route('users.points.show') }}" class="menu-link">
                        <div data-i18n="add-new-user">{{ __('جدول التقييمات') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Activities -->
        <li class="menu-item {{ str_contains(request()->url(), 'activities') ? 'open active' : '' }}">
            <a href="{{ route('activities.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar-check"></i>
                <div data-i18n="Activities">{{ __('Activities') }}</div>
            </a>
        </li>
        <!-- Settings -->
        <li class="menu-item {{ str_contains(request()->url(), 'settings') ? 'open active' : '' }}">
            <a href="{{ route('settings.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Settings">{{ __('Settings') }}</div>
            </a>
        </li>
    </ul>
    
</aside>
