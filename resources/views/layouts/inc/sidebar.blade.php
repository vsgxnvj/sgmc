<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <a href="/" class="brand-link">
            <img src="{{ asset('dist/assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light">TEAM HAYAHAY</span>
        </a>
    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation" data-accordion="false" id="navigation">

                <!-- Dashboard Group -->
                @php
                    $dashboardRoutes = ['dashboard*', 'mop*', 'cards*', 'payouts*', 'posts*', 'faq*', 'testimonies*'];
                @endphp

                <li class="nav-item {{ Request::is($dashboardRoutes) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is($dashboardRoutes) ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/mop') }}" class="nav-link {{ Request::is('mop*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Mode of Payment</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/cards') }}" class="nav-link {{ Request::is('cards*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Add Site</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/payouts') }}" class="nav-link {{ Request::is('payouts*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Upload Payouts</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/posts') }}" class="nav-link {{ Request::is('posts*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Posts</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/faq') }}" class="nav-link {{ Request::is('faq*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>FAQs</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/testimonies') }}" class="nav-link {{ Request::is('testimonies*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Testimonies</p>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>
    </div>

    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
