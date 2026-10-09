
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



<div class="container py-5">

    <!-- Hero Section -->
    <div class="row align-items-center mb-5">

        <div class="col-lg-6">
            <h1 class="display-4 fw-bold">
                About <span class="text-warning">LUXE WATCH</span>
            </h1>

            <p class="lead text-muted mt-3">
                Timeless elegance. Exceptional craftsmanship.
                Discover luxury watches designed for those who
                appreciate perfection.
            </p>

            <p class="text-muted">
                LUXE WATCH is an online luxury watch store offering
                carefully selected timepieces from world-renowned
                watch brands. We believe that a watch is more than
                just an accessory — it represents your personality,
                style and timeless moments.
            </p>

            <a href="{{ route('shop') }}" class="btn btn-dark px-4 py-2">
                Explore Watches
            </a>
        </div>

        <div class="col-lg-6 text-center mt-4 mt-lg-0">
            <img src="{{ asset('images/shopwt.jpg') }}"
                 class="img-fluid rounded shadow"
                 alt="Luxury Watch">
        </div>

    </div>


    <!-- Why Choose Us -->
    <div class="text-center mb-5">

        <h2 class="fw-bold">Why Choose Us?</h2>

        <p class="text-muted">
            Experience luxury, quality and trusted service.
        </p>

    </div>


    <div class="row g-4 mb-5">

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 text-center p-4">

                <div class="fs-1 mb-3">⌚</div>

                <h4 class="fw-bold">Premium Watches</h4>

                <p class="text-muted">
                    We offer carefully selected luxury watches
                    with premium quality and elegant designs.
                </p>

            </div>
        </div>


        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 text-center p-4">

                <div class="fs-1 mb-3">✓</div>

                <h4 class="fw-bold">Quality Guaranteed</h4>

                <p class="text-muted">
                    Every product is carefully checked to provide
                    our customers with reliable and quality watches.
                </p>

            </div>
        </div>


        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 text-center p-4">

                <div class="fs-1 mb-3">♥</div>

                <h4 class="fw-bold">Customer Service</h4>

                <p class="text-muted">
                    We are committed to providing a smooth and
                    enjoyable shopping experience for every customer.
                </p>

            </div>
        </div>

    </div>


    <!-- Our Mission -->
    <div class="row align-items-center bg-light rounded p-4 p-lg-5">

        <div class="col-lg-6">

            <h2 class="fw-bold mb-3">
                Our Mission
            </h2>

            <p class="text-muted">
                Our mission is to make luxury watches accessible
                through a simple, secure and enjoyable online
                shopping experience.
            </p>

            <p class="text-muted">
                From classic designs to modern timepieces,
                we aim to help every customer find a watch
                that perfectly matches their style.
            </p>

        </div>

        <div class="col-lg-6 text-center">

            <div class="p-5">
                <h1 class="display-1 fw-bold text-warning">
                    TIME
                </h1>

                <p class="fs-4">
                    Your Time. Your Style.
                </p>
            </div>

        </div>

    </div>

</div>

<!-- Contact Section -->
<section class="container-fluid py-5"
         style="background-color: #f5f5f0;">

    <div class="container">

        <!-- Brand Logo -->
        <div class="text-center mb-5">
            <div style="font-size: 30px; color: #b49a58;">
               <img src="{{ asset('images/logobg.png') }}"
                alt="Logo"
                 style="width: 100px; height: auto;">
            </div>

            <h3 class="fw-bold"
                style="font-family: Georgia, serif;
                       letter-spacing: 3px;
                       color: #174638;">
                Paradise
            </h3>

            <p class="text-secondary">
                Contact & Connect With Us
            </p>
        </div>

        <!-- Contact Information -->
        <div class="row justify-content-center text-center">

            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Our Location</h5>
                <p class="text-secondary">
                    Yangon, Myanmar
                </p>
            </div>

            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Email Us</h5>
                <p class="text-secondary">
                    paradise345@gmail.com
                </p>
            </div>

            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Call Us</h5>
                <p class="text-secondary">
                    +95 9 683 543 790
                </p>
            </div>

        </div>

        <hr class="my-4">

        <!-- Social Share -->
        <div class="d-flex flex-wrap
                    justify-content-center
                    align-items-center gap-4">

            <span class="fw-bold">Share</span>

            <a href="https://www.facebook.com/"
               target="_blank"
               class="text-decoration-none text-dark">
                Facebook
            </a>

            <a href="https://www.instagram.com/"
               target="_blank"
               class="text-decoration-none text-dark">
                Instagram
            </a>

            <a href="https://x.com/"
               target="_blank"
               class="text-decoration-none text-dark">
                X
            </a>

        </div>

        <div class="text-center mt-4">
            <small class="text-secondary">
                © {{ date('Y') }} Watches Collection.
                All Rights Reserved.
            </small>
        </div>

    </div>

</section>








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

