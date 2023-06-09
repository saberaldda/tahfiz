<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="{{ __('Search...') }}"
                    aria-label="{{ __('Search...') }}" />
            </div>
        </div>
        <!-- /Search -->        

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Place this tag where you want the button to render. -->
            <!-- Lang -->
            <div>
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                        data-bs-toggle="dropdown">
                        <div class="avatar">
                            @if (app()->getlocale()== 'ar')
                                <img src="{{ asset('assets/admin/svg/ar.svg') }}" alt class="w-px-30 h-px-30 rounded-circle" />
                            @else
                                <img src="{{ asset('assets/admin/svg/en.svg') }}" alt class="w-px-30 h-px-30 rounded-circle" />
                            @endif
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        @if (app()->getlocale()== 'en')
                            <li>
                                <a class="dropdown-item" href="{{ route('ar') }}">
                                    <img src="{{ asset('assets/admin/svg/ar.svg') }}" alt="" class="w-px-30 h-auto ">
                                    <span class="align-middle">العربية </span>
                                </a>
                            </li>
                        @endif
                        @if (app()->getlocale()== 'ar')
                            <li>
                                <a class="dropdown-item" href="{{ route('en') }}">
                                    <img src="{{ asset('assets/admin/svg/en.svg') }}" alt="" class="w-px-30 h-auto ">
                                    <span class="align-middle">English </span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            </div>                    
            <!--/ Lang -->
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ auth()->user()->FullPhotoPath }}" alt class="rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{ auth()->user()->FullPhotoPath }}" alt class="rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                                    <small class="text-muted">{{ __(auth()->user()->type) }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">{{ __('My Profile') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bx bx-cog me-2"></i>
                            <span class="align-middle">{{ __('Settings') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <span class="d-flex align-items-center align-middle">
                                <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                                <span class="flex-grow-1 align-middle">Billing</span>
                                <span
                                    class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                            </span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a wire:click.prevent='logout' class="dropdown-item" href="{{ route('logout') }}">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">{{ __('Log Out') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
</nav>
