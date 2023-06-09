<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/admin/img/favicon/albayan.svg') }}" width="60px" height="70px" alt="Nour albayan academy">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-3 text-capitalize">{{ __('Al Bayan') }}</span>
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
        {{-- <li class="menu-header small text-uppercase"><span class="menu-header-text">{{ __('Users') }}</span></li> --}}
        <li class="menu-item {{ str_contains(request()->url(), 'users') ? 'open active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
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
            </ul>
        </li>
        <!-- Paths -->
        {{-- <li class="menu-header small text-uppercase"><span class="menu-header-text">{{ __('Paths') }}</span></li> --}}
        <li class="menu-item {{ str_contains(request()->url(), 'paths') ? 'open active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Paths">{{ __('Paths') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('paths.index') ? 'active' : '' }}">
                    <a href="{{ route('paths.index') }}" class="menu-link">
                        <div data-i18n="Paths">{{ __('All Paths') }}</div>
                    </a>
                </li>
                <li class="menu-item">
                    @if (request()->routeIs('paths.index'))
                        <a href="javascript:void(0);" class="menu-link" data-bs-toggle="modal" data-bs-target="#addPath">
                    @else
                        <a href="{{ route('paths.index') }}" class="menu-link">
                    @endif
                        <div data-i18n="add-new-path">{{ __('Add New Path') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Courses -->
        {{-- <li class="menu-header small text-uppercase"><span class="menu-header-text">{{ __('Courses') }}</span></li> --}}
        <li class="menu-item {{ str_contains(request()->url(), 'courses') ? 'open active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Courses">{{ __('Courses') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('courses.index') ? 'active' : '' }}">
                    <a href="{{ route('courses.index') }}" class="menu-link">
                        <div data-i18n="Courses">{{ __('All Courses') }}</div>
                    </a>
                </li>
                <li class="menu-item">
                    @if (request()->routeIs('courses.index'))
                        <a href="javascript:void(0);" class="menu-link" data-bs-toggle="modal" data-bs-target="#addCourse">
                    @else
                        <a href="{{ route('courses.index') }}" class="menu-link">
                    @endif
                        <div data-i18n="add-new-course">{{ __('Add New Course') }}</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    
</aside>
