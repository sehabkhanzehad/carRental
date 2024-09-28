<!DOCTYPE html>
<html lang="en">

<head>
    <title>CarRental</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/home-page/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home-page/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/home-page/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets') }}/home-page/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/home-page/css/magnific-popup.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/home-page/css/aos.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/home-page/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/home-page/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/home-page/css/jquery.timepicker.css">


    <link rel="stylesheet" href="{{ asset('assets') }}/home-page/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/home-page/css/icomoon.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/home-page/css/style.css">

    <link rel="stylesheet" href="{{ asset("assets/home-page/css/include/progress.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/home-page/css/include/toastify.min.css") }}">
</head>

<body>
     <!-- progress bar -->
     <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
    </div>

    @include('components.homepage.nav')

    @yield('content')

    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2"><a href="{{ route("homepage") }}" class="logo">Car<span>rental</span></a></h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Information</h2>
                        <ul class="list-unstyled">
                            <li><a href="{{ route("homepage") }}" class="py-2 d-block">Home</a></li>
                            <li><a href="{{ route("about") }}" class="py-2 d-block">About</a></li>
                            <li><a href="{{ route("rentals") }}" class="py-2 d-block">Rentals</a></li>
                            <li><a href="{{ route("contact") }}" class="py-2 d-block">Contact</a></li>

                        </ul>
                    </div>
                </div>
                {{-- <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Customer Support</h2>
                        <ul class="list-unstyled">
                            <li><a class="py-2 d-block">FAQ</a></li>
                            <li><a class="py-2 d-block">Payment Option</a></li>
                            <li><a class="py-2 d-block">Booking Tips</a></li>
                            <li><a class="py-2 d-block">How it works</a></li>
                            <li><a class="py-2 d-block">Contact Us</a></li>
                        </ul>
                    </div>
                </div> --}}
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">000, Dhaka, Bangladesh</span></li>
                                <li><a><span class="icon icon-phone"></span><span class="text">+880 123 456 789</span></a></li>
                                <li><a><span class="icon icon-envelope"></span><span
                                            class="text">info@carrental.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>

        <script src="{{ asset("assets/home-page/js/include/axios.min.js") }}"></script>
        <script src="{{ asset("assets/home-page/js/include/config.js") }}"></script>
        <script src="{{ asset("assets/home-page/js/include/toastify-js.js") }}"></script>

    <script src="{{ asset('assets') }}/home-page/js/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/home-page/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="{{ asset('assets') }}/home-page/js/popper.min.js"></script>
    <script src="{{ asset('assets') }}/home-page/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/home-page/js/jquery.easing.1.3.js"></script>
    <script src="{{ asset('assets') }}/home-page/js/jquery.waypoints.min.js"></script>
    <script src="{{ asset('assets') }}/home-page/js/jquery.stellar.min.js"></script>
    <script src="{{ asset('assets') }}/home-page/js/owl.carousel.min.js"></script>
    <script src="{{ asset('assets') }}/home-page/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('assets') }}/home-page/js/aos.js"></script>
    <script src="{{ asset('assets') }}/home-page/js/jquery.animateNumber.min.js"></script>
    <script src="{{ asset('assets') }}/home-page/js/bootstrap-datepicker.js"></script>
    <script src="{{ asset('assets') }}/home-page/js/jquery.timepicker.min.js"></script>
    <script src="{{ asset('assets') }}/home-page/js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('assets') }}/home-page/js/google-map.js"></script>
    <script src="{{ asset('assets') }}/home-page/js/main.js"></script>



    @yield('script')

</body>

</html>
