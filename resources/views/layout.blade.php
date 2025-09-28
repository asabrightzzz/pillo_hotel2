<!DOCTYPE html>

<html lang="en" class="layout-menu-fixed layout-compact" data-assets-path="/assets/vendor/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>
        Pillo Kaliana
    </title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-xicon" href="{{ asset('assets/img/logo/images.jpeg') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/iconify-icons.css') }}" />

    <!-- iocns -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/smooth_toggle.css') }}" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- endbuild -->

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="{{ asset('assets/vendor/js/config.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <script src="{{ asset('assets/js/toggle.js') }}"></script>


    <style>
        .menu-item .menu-link i {
            margin-right: 10px;
            padding: 4px;
        }
        
        /* 1. HOVER State (Applies to all links on hover) */
        .layout-menu.bg-dark .menu-link:hover {
            /* Ungu transparan */
            background-color: rgba(173, 105, 255, 0.2) !important;
        }

        .layout-menu.bg-dark .menu-item.active > .menu-link.menu-toggle {
            background-color: rgba(173, 105, 255, 0.2) !important;
        }

        .layout-menu.bg-dark .menu-item.active > .menu-link:not(.menu-toggle) {
            background-color: #9858e5 !important;
            color: #fff !important;
        }

        .layout-menu.bg-dark .menu-item.active > .menu-link:not(.menu-toggle) .menu-icon {
            color: #fff !important;
        }
    </style>

</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme bg-dark">
                <div class="app-brand demo pt-2">
                    <a href="/app" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="{{ asset('assets/img/logo/pilloanjay.png') }}" alt="Logo Pillo" width="70" />
                        </span>
                        <span class="app-brand-text demo menu-text fw-bold ms-2 text-white">Pillo Hotel</span>
                    </a>

                    <a href="javascript:void(0);" class="menu-link text-large ms-auto">
                        <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
                    </a>
                </div>

                <div class="menu-divider mt-3"></div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <li class="menu-item{{ set_active(['/app']) }}">
                        <a href="/app" class="menu-link text-white">
                            <i class="menu-icon tf-icons bx bx-home"></i>
                            <div data-i18n="Dashboard">Dashboard</div>
                        </a>
                    </li>

                    <li class="menu-item {{ set_active(['app/room_category*']) }} {{ set_open(['app/room_category*', 'app/room_category_facility*']) }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
                            <i class="menu-icon tf-icons bx bx-building-house "></i>
                            <div data-i18n="Room Category">Room Category</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item {{ set_active(['app/room_category*']) }}">
                                <a href="/app/room_category" class="menu-link text-white">
                                    <div data-i18n="Room Category">Room Category</div>
                                </a>
                            </li>
                            <li class="menu-item {{ set_active(['app/room_category_facility*']) }}">
                                <a href="/app/room_category_facility" class="menu-link text-white">
                                    <div data-i18n="Room Category Facility">Room Category Facility</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Apps & Pages -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Apps &amp; Pages</span>
                    </li>
                    <li class="menu-item {{ set_active(['app/room*']) }}">
                        <a href="/app/room" class="menu-link text-white">
                            <i class="menu-icon tf-icons bx bx-door-open"></i>
                            <div data-i18n="Room">Room</div>
                        </a>
                    </li>
                    <li class="menu-item {{ set_active(['app/facility*']) }}">
                        <a href="/app/facility" class="menu-link text-white">
                            <i class="menu-icon tf-icons bx bx-book-alt"></i>
                            <div class="text-truncate" data-i18n="Facility">Facility</div>
                        </a>
                    </li>

                    <li class="menu-item {{ set_active(['app/guest*']) }}">
                        <a href="/app/guest" class="menu-link text-white">
                            <i class="fas fa-user"></i>
                            <div data-i18n="Guest">Guest</div>
                        </a>
                    </li>

                    <li class="menu-item {{ set_active(['app/reservation*']) }}">
                        <a href="/app/reservation" class="menu-link text-white">
                            <i class="menu-icon tf-icons bx bx-book-bookmark"></i>
                            <div data-i18n="Reservation">Reservation</div>
                        </a>
                    </li>

                    <li class="menu-item {{ set_active(['app/employee*']) }}">
                        <a href="/app/employee" class="menu-link text-white">
                            <i class="fas fa-user-tie"></i>
                            <div data-i18n="Employee">Employee</div>
                        </a>

                    </li>

                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav
                    class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                            <i class="icon-base bx bx-menu icon-md"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center w-100" id="navbar-collapse">
                        <div class="flex-grow-1"></div>
                        
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt
                                                            class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">John Doe</h6>
                                                    <small class="text-body-secondary">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider my-1"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="icon-base bx bx-user icon-md me-3"></i><span>My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="icon-base bx bx-cog icon-md me-3"></i><span>Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider my-1"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            <i class="icon-base bx bx-power-off icon-md me-3"></i><span>Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                    <!-- / Content -->


                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div
                                class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                                <div class="mb-2 mb-md-0">
                                    &#169;
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>
                                    , made with ❤️ by
                                    <a href="" target="_blank" class="footer-link">Metschoo PPLG</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->

    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->

    <script src="{{ asset('assets/vendor/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/vendor/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag before closing body tag for github widget button. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
