<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    {{-- <!-- Membuat sintaks css --> --}}
    <link rel="stylesheet" href="{{ url('frontend') }}/libraries/bootstrap/css/bootstrap.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;600;700;800&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('frontend') }}/styles/main.css" />
    </head>

    <body>
    <!-- Navbar -->
    @include('includes.navbar')
    {{-- Header dan Main --}}
    @yield('content')
    
    <!-- Footer -->
    <footer class="section-footer mt-5 mb-4 border-top">
        <div class="container pt-5 pb-5">
        <div class="row justify-content-center">
            <div class="col-12">
            <div class="row text">
                <div class="col-12 col-lg-3">
                <h5>FEATURES</h5>
                <ul class="list-unstyled">
                    <li><a href="">Reviews</a></li>
                    <li><a href="">Community</a></li>
                    <li><a href="">Social Media Kit</a></li>
                    <li><a href="">Affiliate</a></li>
                </ul>
                </div>
                <div class="col-12 col-lg-3">
                <h5>ACCOUNT</h5>
                <ul class="list-unstyled">
                    <li><a href="">Refund</a></li>
                    <li><a href="">Security</a></li>
                    <li><a href="">Rewards</a></li>
                </ul>
                </div>
                <div class="col-12 col-lg-3">
                <h5>COMPANY</h5>
                <ul class="list-unstyled">
                    <li><a href="">Career</a></li>
                    <li><a href="">Help Center</a></li>
                    <li><a href="">Media</a></li>
                </ul>
                </div>
                <div class="col-12 col-lg-3">
                <h5>GET CONNECTED</h5>
                <ul class="list-unstyled">
                    <li><a href="">Bekasi Timur</a></li>
                    <li><a href="">Indonesia</a></li>
                    <li><a href="">0877-8883-6644</a></li>
                    <li><a href="">rizkyptr.h@gmail.com</a></li>
                </ul>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="container-fluid">
        <div class="row border-top justify-content-center align-items-center pt-4">
            <div class="col-auto">
            2020 Copyright Nomads - All rights reserved - Made in Bekasi
            </div>
        </div>
        </div>
    </footer>

    <script src="{{ url('frontend') }}}/libraries/jquery/jquery-3.4.1.slim.min.js"></script>
    <script src="{{ url('frontend') }}}/libraries/bootstrap/js/bootstrap.js"></script>
</body>

</html>