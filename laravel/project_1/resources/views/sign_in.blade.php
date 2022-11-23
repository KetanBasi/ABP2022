<!--
    =========================================================
    * Material Dashboard 2 - v3.0.4
    =========================================================

    * Product Page: https://www.creative-tim.com/product/material-dashboard
    * Copyright 2022 Creative Tim (https://www.creative-tim.com)
    * Licensed under MIT (https://www.creative-tim.com/license)
    * Coded by Creative Tim

    =========================================================

    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

{{-- TODO: Implement for modal before sending data: --}}
{{-- * Modal for user account details --}}
{{-- * Profile Picture Uploader / set default --}}
{{-- * Address Form --}}
{{-- * Phone Number --}}

{{-- SECTION: "Variables" --}}

@section('page_title'           , 'Sign In')
@section('nav_header__title'    , 'Gudank')
@section('nav_header__icon_name', 'inventory')
@section('card_title__name'     , 'Sign In')

{{-- !SECTION: "Variables" --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        @yield('page_title', 'Auth Page')
    </title>

    <!-- SECTION: Header Includes -->
    @section('header_includes')
        @include('shared.header_includes')

        @yield('custom_internal_css', '')
    @show
    {{-- @endsection --}}

</head>

<body class="bg-gray-200">

    @include('shared.hidden_svg')

    <!-- SECTION: Navbar -->
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- SECTION: Navbar tag -->
                <nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid ps-2 pe-0">

                        <!-- ANCHOR: Navbar / Page Title -->
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.html">
                            @yield('nav_header__title', 'Navigation Title')
                        </a>

                        <!-- ANCHOR: Navigation Button -->
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>

                        <!-- SECTION: Navigation List -->
                        <div class="collapse navbar-collapse" id="navigation">

                            <!-- SECTION: Navigation Items -->
                            <ul class="navbar-nav mx-auto">

                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="/">
                                        <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                                        Dashboard
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link me-2" href="/sign-up">
                                        <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                        Sign Up
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link me-2" href="/sign-in">
                                        <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                        Sign In
                                    </a>
                                </li>

                            </ul>
                            <!-- !SECTION: Navigation Items -->

                        </div>
                        <!-- !SECTION: Navigation List -->

                    </div>
                </nav>
                <!-- !SECTION: Navbar tag -->
            </div>
        </div>
    </div>
    <!-- !SECTION: Navbar -->

    <!-- SECTION: Main Content -->
    <main class="main-content  mt-0">

        @section('main_content')
            <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">

                <!-- ANCHOR: BG Mask -->
                <span class="mask bg-gradient-dark opacity-6"></span>

                <!-- SECTION: Main Sign-in -->
                <div class="container my-auto">
                    <div class="row">
                        <div class="col-lg-4 col-md-8 col-12 mx-auto">
                            <div class="card z-index-0 fadeIn3 fadeInBottom">

                                <!-- SECTION: Header & SSO / Social Login -->
                                @section('card_title')
                                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">

                                            <!-- ANCHOR: Header -->
                                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">@yield('card_title__name', 'Auth Form')</h4>

                                            <!-- SECTION: SSO / Social Login -->
                                            {{-- <div class="row mt-3">

                                                <div class="col-2 text-center ms-auto">
                                                    <a class="btn btn-link px-3" href="javascript:;" disabled>
                                                        <i class="fa fa-facebook text-white text-lg"></i>
                                                    </a>
                                                </div>

                                                <div class="col-2 text-center px-1">
                                                    <a class="btn btn-link px-3" href="javascript:;" disabled>
                                                        <i class="fa fa-github text-white text-lg"></i>
                                                    </a>
                                                </div>

                                                <div class="col-2 text-center me-auto">
                                                    <a class="btn btn-link px-3" href="javascript:;" disabled>
                                                        <i class="fa fa-google text-white text-lg"></i>
                                                    </a>
                                                </div>

                                            </div> --}}
                                            <!-- !SECTION: SSO / Social Login -->

                                        </div>
                                    </div>
                                @show
                                {{-- @endsection --}}
                                <!-- !SECTION: SSO / Social Login -->

                                <!-- SECTION: Login Form -->
                                <div class="card-body">

                                    <!-- ANCHOR: Alert -->
                                    <div class="container-fluid py-0">
                                        @include('shared.alert')
                                    </div>

                                    @section('card_form')
                                        <form action="/sign-in" method="POST" role="form" class="text-start">
                                            @csrf

                                            <!-- ANCHOR: Username -->
                                            <div class="input-group input-group-static my-3">
                                                <label class="">Username</label>
                                                <input type="text" name="username" class="form-control">
                                            </div>

                                            <!-- ANCHOR: Password -->
                                            <div class="input-group input-group-static mb-3">
                                                <label class="">Password</label>
                                                <input type="password" name="password" class="form-control">
                                            </div>

                                            <!-- ANCHOR: Remember Me Toggle Button -->
                                            <div class="form-check form-switch d-flex align-items-center mb-3">
                                                <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                                                <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                                            </div>

                                            <!-- ANCHOR: Sign-in Button -->
                                            <div class="text-center">
                                                <button type="button" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                                            </div>

                                            <!-- ANCHOR: Sign-up Text Button -->
                                            <p class="mt-4 text-sm text-center">
                                                Don't have an account?
                                                <a href="/sign-up" class="text-primary text-gradient font-weight-bold">Sign up</a>
                                            </p>

                                        </form>
                                    @show
                                    {{-- @endsection --}}
                                </div>
                                <!-- !SECTION: Login Form -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- !SECTION: Main Sign-in -->

                <!-- SECTION: Footer -->
                <footer class="footer position-absolute bottom-2 py-2 w-100">
                    <div class="container">
                        <div class="row align-items-center justify-content-lg-between">
                            <div class="col-12 col-md-6 my-auto">
                                <div class="copyright text-center text-sm text-white text-lg-start">
                                    © <script>
                                        document.write(new Date().getFullYear())
                                    </script>,
                                    made with <i class="fa fa-heart" aria-hidden="true"></i> by
                                    <a href="https://www.creative-tim.com" class="font-weight-bold text-white" target="_blank">Creative Tim</a>
                                    for a better web.
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com" class="nav-link text-white" target="_blank">Creative Tim</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com/presentation" class="nav-link text-white" target="_blank">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com/blog" class="nav-link text-white" target="_blank">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-white" target="_blank">License</a>
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
    </main>
    <!-- !SECTION: Main Content -->

    <!-- SECTION: Scripts -->
    @section('scripts')

        <!-- ANCHOR: Core JS Files -->
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
