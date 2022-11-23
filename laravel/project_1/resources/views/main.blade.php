{{-- SECTION: "Variables" --}}

@section('page_title', 'Gudank')
@section('nav_header__title', 'Gudank')
@section('nav_header__icon_name', 'inventory')
@section('breadcrumb_current_location', 'Dashboard')

{{-- !SECTION: "Variables" --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title', 'Document Title')</title>

    <!-- SECTION: Header Includes -->
    @section('header_includes')
        @include('shared.header_includes')

        @yield('custom_internal_css', '')
    @show
    {{-- @endsection --}}
    <!-- !SECTION: Header Includes -->

</head>

<body class="g-sidenav-show  bg-gray-200">

    @include('shared.hidden_svg')

    <!-- SECTION: Sidebar -->
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
        id="sidenav-main">

        <!-- SECTION: Nav Header -->
        @section('nav_header')
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand m-0 text-white" href="/">
                    <i class="material-icons opacity-10" style="transform: translateY(25%);">@yield('nav_header__icon_name', '')</i>
                    {{-- <img src="{{ asset('img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo"> --}}
                    <span class="ms-1 font-weight-bold text-white">@yield('nav_header__title', 'Navigation Title')</span>
                </a>
            </div>
        @show
        {{-- @endsection --}}
        <!-- !SECTION: Nav Header -->

        <hr class="horizontal light mt-0 mb-2">

        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">

            <!-- SECTION: Navigation List -->
            <!-- NOTE: Active marked with classes: "active bg-gradient-primary" -->
            @section('nav_list')
                {{-- <ul class="navbar-nav">

                    <!-- ANCHOR: Nav Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link text-white active bg-gradient-primary" href="./dashboard.html">

                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">dashboard</i>
                            </div>

                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>
                    @include('base.components.nav_item')

                    <!-- ANCHOR: Tables -->
                    <li class="nav-item">
                        <a class="nav-link text-white " href="./tables.html">

                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">table_view</i>
                            </div>

                            <span class="nav-link-text ms-1">Tables</span>
                        </a>
                    </li>

                    <!-- ANCHOR: Billing -->
                    <li class="nav-item">
                        <a class="nav-link text-white " href="./billing.html">

                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">receipt_long</i>
                            </div>

                            <span class="nav-link-text ms-1">Billing</span>
                        </a>
                    </li>

                    <!-- ANCHOR: VR -->
                    <li class="nav-item">
                        <a class="nav-link text-white " href="./virtual-reality.html">

                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">view_in_ar</i>
                            </div>

                            <span class="nav-link-text ms-1">Virtual Reality</span>
                        </a>
                    </li>

                    <!-- ANCHOR: RTL -->
                    <li class="nav-item">
                        <a class="nav-link text-white " href="./rtl.html">

                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
                            </div>

                            <span class="nav-link-text ms-1">RTL</span>
                        </a>
                    </li>

                    <!-- ANCHOR: Notifications -->
                    <li class="nav-item">
                        <a class="nav-link text-white " href="./notifications.html">

                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">notifications</i>
                            </div>

                            <span class="nav-link-text ms-1">Notifications</span>
                        </a>
                    </li>

                    <!-- ANCHOR: Account Pages Divider -->
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
                    </li>

                    <!-- ANCHOR: Profile -->
                    <li class="nav-item">
                        <a class="nav-link text-white " href="./profile.html">

                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">person</i>
                            </div>

                            <span class="nav-link-text ms-1">Profile</span>
                        </a>
                    </li>

                    <!-- ANCHOR: Sign In -->
                    <li class="nav-item">
                        <a class="nav-link text-white " href="./sign-in.html">

                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">login</i>
                            </div>

                            <span class="nav-link-text ms-1">Sign In</span>
                        </a>
                    </li>

                    <!-- ANCHOR: Sign Up -->
                    <li class="nav-item">
                        <a class="nav-link text-white " href="./sign-up.html">

                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">assignment</i>
                            </div>

                            <span class="nav-link-text ms-1">Sign Up</span>
                        </a>
                    </li>

                </ul> --}}
                @include('base.components.nav_list', ['active' => 'dashboard'])
            @show
            {{-- @endsection --}}
            <!-- !SECTION: Navigation List -->

        </div>


    </aside>
    <!-- !SECTION: Sidebar-->


    <!-- SECTION: Main Window -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <!-- SECTION: Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">

                <!-- ANCHOR: Breadcrumb / Location -->
                @section('breadcrumb')
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                            @section('breadcrumb_list_items')
                                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="/">@yield('nav_header__title', 'Dashboard')</a></li>
                                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">@yield('breadcrumb_current_location', 'Current Page')</li>
                            @show
                            {{-- @endsection --}}
                        </ol>
                        <h6 class="font-weight-bolder mb-0">@yield('breadcrumb_current_location', 'Current Page')</h6>
                    </nav>
                @show
                {{-- @endsection --}}

                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">

                    <!-- ANCHOR: Search -->
                    {{-- <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Type here...</label>
                            <input type="text" class="form-control">
                        </div>
                    </div> --}}

                    <!-- SECTION: Right navbar -->
                    <ul class="ms-md-auto navbar-nav  justify-content-end">

                        <!-- ANCHOR: Btn Sign In -->
                        <li class="nav-item d-flex align-items-center">
                            <a href="/sign-in" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">Sign In</span>
                            </a>
                        </li>

                        <!-- ANCHOR: Sidebar Toggler on Smaller Screen -->
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>

                        <!-- ANCHOR: Settings -->
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0">
                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                            </a>
                        </li>

                    </ul>
                    <!-- !SECTION: Right navbar -->

                </div>

            </div>
        </nav>
        <!-- !SECTION: Navbar -->

        <!-- SECTION: Main Content -->
        @section('main_content')
            <div class="container-fluid py-4">

                <!-- ANCHOR: Alert -->
                <div class="container-fluid py-0">
                    @include('shared.alert')
                </div>

                <!-- SECTION: First Row (Inventory Summary) -->
                <div class="row mb-5">

                    <!-- ANCHOR: Products -->
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">inventory_2</i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Total Items</p>
                                    <h4 class="mb-0">{{ $data->produk->count ?? '??' }}</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
                            </div>
                        </div>
                    </div>

                    <!-- ANCHOR: Brands -->
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">label</i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Total Brands</p>
                                    <h4 class="mb-0">{{ $data->brand_count ?? '??' }}</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than last month</p>
                            </div>
                        </div>
                    </div>

                    <!-- ANCHOR: Warehouse -->
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">warehouse</i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Total Warehouse</p>
                                    <h4 class="mb-0">{{ $data->gudang_count ?? '??' }}</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>
                            </div>
                        </div>
                    </div>

                    <!-- ANCHOR: Sales -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">payments</i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Total Assets</p>
                                    <h4 class="mb-0">${{ $data->total_asset ?? '??' }}</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- !SECTION: First Row (Inventory Summary) -->

                <!-- SECTION: Second Row (Selling Summary) -->
                {{-- <div class="row mb-5">

                    <!-- ANCHOR: Products -->
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">inventory_2</i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Total Items</p>
                                    <h4 class="mb-0">$53k</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
                            </div>
                        </div>
                    </div>

                    <!-- ANCHOR: Users -->
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">person</i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Today's Users</p>
                                    <h4 class="mb-0">2,300</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than last month</p>
                            </div>
                        </div>
                    </div>

                    <!-- ANCHOR: Clients -->
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">person</i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">New Clients</p>
                                    <h4 class="mb-0">3,462</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>
                            </div>
                        </div>
                    </div>

                    <!-- ANCHOR: Sales -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">weekend</i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Sales</p>
                                    <h4 class="mb-0">$103,430</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p>
                            </div>
                        </div>
                    </div>

                </div> --}}
                <!-- !SECTION: Second Row (Selling Summary) -->

                <!-- SECTION: Footer -->
                <footer class="footer py-4">
                    <div class="container-fluid">
                        <div class="row align-items-center justify-content-lg-between">

                            <!-- ANCHOR: Left Footer -->
                            <div class="col-lg-6 mb-lg-0 mb-4">
                                <div class="copyright text-center text-sm text-muted text-lg-start">
                                    © <script>
                                        document.write(new Date().getFullYear())
                                    </script>,
                                    made with <i class="fa fa-heart"></i> by
                                    <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                                    for a better web.
                                </div>
                            </div>

                            <!-- ANCHOR: Right Footer -->
                            <div class="col-lg-6">
                                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com/license" class="nav-link text-muted" target="_blank">License</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </footer>
                <!-- !SECTION: Footer -->

            </div>
        @show
        {{-- @endsection --}}
        <!-- !SECTION: Main Content -->

    </main>
    <!-- !SECTION: Main Window -->

    <!-- SECTION: Settings -->
    <div class="fixed-plugin">

        <!-- ANCHOR: Floating Button -->
        <!-- <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="material-icons py-2">settings</i>
        </a> -->

        <div class="card shadow-lg">

            <div class="card-header pb-0 pt-3">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Material UI Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>

            <hr class="horizontal dark my-1">

            <div class="card-body pt-sm-3 pt-0">

                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>

                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                    </div>
                </a>

                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>

                <div class="d-flex">
                    <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
                </div>

                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>

                <!-- Navbar Fixed -->
                <div class="mt-3 d-flex">
                    <h6 class="mb-0">Navbar Fixed</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                    </div>
                </div>

                <hr class="horizontal dark my-3">

                <div class="mt-2 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                    </div>
                </div>

                <hr class="horizontal dark my-sm-4">

                <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard-pro">Free Download</a>
                <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>

                <div class="w-100 text-center">
                    <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
                    <h6 class="mt-3">Thank you for sharing!</h6>
                    <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
                </div>

            </div>

        </div>

    </div>
    <!-- !SECTION: Settings -->


    <!-- SECTION: Scripts -->
    @section('scripts')

        <!-- ANCHOR: Core JS -->
        @include('shared.script_core')

        <!-- ANCHOR: SweetAlert2 -->
        @include('shared.js_sweetalert2')

        <!-- ANCHOR: Custom JS -->
        @yield('custom_js')

    @show
    {{-- @endsection --}}
    <!-- !SECTION: Scripts -->

</body>

</html>
