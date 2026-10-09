
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Paradise OnlineShop</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
          rel="stylesheet" />

    <!-- Bootstrap / Theme CSS -->
    <link href="{{ asset('front-asset/css/styles.css') }}" rel="stylesheet" />
</head>

<body>

<!-- =========================
     Navigation
========================= -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="container px-3 px-lg-5">

        <!-- Logo -->
        <a href="{{ route('shop') }}"
           class="navbar-brand p-0 me-lg-4">

            <img src="{{ asset('images/logobg.png') }}"
                 alt="Paradise Luxury Timepieces"
                 class="img-fluid"
                 style="max-width: 150px;">

        </a>


        <!-- Website Name -->
        <a class="navbar-brand fw-bolder
                  fs-5 fs-lg-3
                  me-lg-4"
           href="{{ route('shop') }}">

            PARADISE LUXURY TIMEPIECES

        </a>


        <!-- Mobile Button -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>


        <!-- Navbar Content -->
        <div class="collapse navbar-collapse"
             id="navbarSupportedContent">


            <!-- Left Menu -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">

                <!-- Home -->
                <li class="nav-item">

                    <a class="nav-link active fw-bolder"
                       href="{{ route('shop') }}">

                        Home

                    </a>

                </li>


                <!-- About -->
                <li class="nav-item">

                    <a class="nav-link fw-bolder"
                       href="{{ route('about') }}">

                        About

                    </a>

                </li>


                <!-- Shop -->
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle fw-bolder"
                       id="navbarDropdown"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">

                        Shop

                    </a>


                    <ul class="dropdown-menu"
                        aria-labelledby="navbarDropdown">

                        @php
                            $categories = \App\Models\Category::all();
                        @endphp


                        @foreach($categories as $category)

                            <li>

                                <a class="dropdown-item"
                                   href="{{ route('item.categories', $category->id) }}">

                                    {{ $category->name }}

                                </a>

                            </li>

                        @endforeach

                    </ul>

                </li>

            </ul>


            <!-- Right Side -->
            <div class="d-flex flex-column flex-lg-row
                        align-items-stretch align-items-lg-center
                        gap-2 mt-3 mt-lg-0">


                <!-- Cart -->
                <a href="{{ route('item-carts.carts') }}"
                   class="btn btn-outline-dark">

                    <i class="bi-cart-fill me-1"></i>

                    Cart

                    <span class="badge bg-dark text-white ms-1 rounded-pill"
                          id="item-count">

                        0

                    </span>

                </a>


                @guest

                    <!-- Login -->
                    <a href="/login"
                       class="btn">

                        Login

                    </a>


                    <!-- Register -->
                    <a href="/register"
                       class="btn btn-dark">

                        Register

                    </a>

                @else

                    <!-- User Dropdown -->
                    <div class="dropdown">

                        <a href="#"
                           class="text-decoration-none text-dark
                                  dropdown-toggle"
                           role="button"
                           id="userDropdown"
                           data-bs-toggle="dropdown"
                           aria-expanded="false">

                            {{ Auth::user()->name }}

                        </a>


                        <ul class="dropdown-menu dropdown-menu-lg-end">

                            @if(Auth::user()->role == "user")

                                <li>

                                    <a href="#"
                                       class="dropdown-item">

                                        Profile

                                    </a>

                                </li>

                            @else

                                <li>

                                    <a href="/backend"
                                       class="dropdown-item">

                                        Admin Panel

                                    </a>

                                </li>

                            @endif


                            <li>

                                <a class="dropdown-item"
                                   href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">

                                    {{ __('Logout') }}

                                </a>


                                <form id="logout-form"
                                      action="{{ route('logout') }}"
                                      method="POST"
                                      class="d-none">

                                    @csrf

                                </form>

                            </li>

                        </ul>

                    </div>

                @endif

            </div>

        </div>

    </div>

</nav>


<!-- Page Content -->

@yield('content')


<!-- Footer -->


<footer class="mt-5 pt-5 pb-3 text-light"
        style="background-color: #101820;">

    <div class="container">

        <div class="row g-4 pb-4">

            <!-- Brand Logo -->
            <div class="col-12 col-md-6 col-lg-4">

                <a href="{{ url('/') }}"
                   class="text-decoration-none d-inline-flex
                          align-items-center gap-2 mb-3">

                    <img src="{{ asset('images/logobg.png') }}"
                         alt="Paradise Logo"
                         width="48"
                         height="48"
                         class="rounded-circle"
                         style="object-fit: contain;">

                    <span class="fw-bold text-uppercase"
                          style="color: #C6A45C;">
                        Paradise<br>
                        <small class="text-light"
                               style="font-size: 11px;">
                            Luxury Timepieces
                        </small>
                    </span>

                </a>

                <p class="text-white-50 small">
                    Find the perfect timepiece for your
                    style and every special moment.
                </p>

                <div class="d-flex gap-3 mt-3">

                    <a href="https://www.facebook.com/share/19aMVqt9Qi/"
                       class="text-decoration-none"
                       style="color: #C6A45C;"
                       aria-label="Facebook">
                        <i class="bi bi-facebook fs-5"></i>
                    </a>

                    <a href="@black_walker77"
                       class="text-decoration-none"
                       style="color: #C6A45C;"
                       aria-label="Telegram">
                        <i class="bi bi-telegram fs-5"></i>
                    </a>

                    <a href="https://m.me/61556223669113"
                       class="text-decoration-none"
                       style="color: #C6A45C;"
                       aria-label="Messenger">
                        <i class="bi bi-messenger fs-5"></i>
                    </a>

                </div>

            </div>

            <!-- Shopping -->
            <div class="col-6 col-md-3 col-lg-2">

                <h6 class="fw-bold mb-3"
                    style="color: #C6A45C;">
                    SHOP
                </h6>

                <ul class="list-unstyled small">

                    <li class="mb-2">
                        <a href="{{ url('/') }}"
                           class="text-white-50 text-decoration-none">
                            All Watches
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ url('/') }}"
                           class="text-white-50 text-decoration-none">
                            New Arrivals
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ url('/') }}"
                           class="text-white-50 text-decoration-none">
                            Our Collection
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ url('/item-carts') }}"
                           class="text-white-50 text-decoration-none">
                            Shopping Cart
                        </a>
                    </li>

                </ul>

            </div>

            <!-- Customer Service -->
            <div class="col-6 col-md-3 col-lg-3">

                <h6 class="fw-bold mb-3"
                    style="color: #C6A45C;">
                    CUSTOMER CARE
                </h6>

                <ul class="list-unstyled small">

                    <li class="mb-2">
                        <span class="text-white-50">
                            Payment Guide
                        </span>
                    </li>

                    <li class="mb-2">
                        <span class="text-white-50">
                            Order Information
                        </span>
                    </li>

                    <li class="mb-2">
                        <span class="text-white-50">
                            Warranty Information
                        </span>
                    </li>

                    <li class="mb-2">
                        <span class="text-white-50">
                            Customer Support
                        </span>
                    </li>

                </ul>

            </div>

            <!-- Assistance -->
            <div class="col-12 col-lg-3">

                <h6 class="fw-bold mb-3"
                    style="color: #C6A45C;">
                    NEED ASSISTANCE?
                </h6>

                <p class="text-white-50 small">
                    Need help with your order or payment?
                    Get in touch with our team.
                </p>

                <a href="{{ url('/about') }}"
                   class="btn btn-outline-warning btn-sm mt-1">
                    Contact Our Team
                    <i class="bi bi-arrow-right ms-1"></i>
                </a>

            </div>

        </div>

        <hr style="border-color: #39434B;">

        <!-- Bottom Footer -->
        <div class="row align-items-center g-2 pt-2">

            <div class="col-12 col-md-6 text-center text-md-start">
                <small class="text-white-50">
                    &copy; {{ date('Y') }}
                    Paradise Luxury Timepieces.
                    All Rights Reserved.
                </small>
            </div>

            <div class="col-12 col-md-6 text-center text-md-end">
                <small class="text-white-50">
                    Crafted for Your Timeless Style
                </small>
            </div>

        </div>

    </div>

</footer>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous">
</script>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
</script>


<!-- Theme JS -->
<script src="{{ asset('front-asset/js/scripts.js') }}"></script>

<script src="{{ asset('front-asset/js/add_to_cart.js') }}"></script>

@yield('script')

</body>
</html>

