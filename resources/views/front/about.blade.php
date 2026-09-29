@extends('layouts.front')

@section('content')

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
@endsection

