@extends('layouts.homepage.master')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{ asset('assets') }}/home-page/images/bg_3.jpg);"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Checkout <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Checkout</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section">
        <div class="container">
            <div class="row d-flex mb-5 contact-info justify-content-center">
                <div class="col-md-4">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h4 class="">Rental Information:</h4>
                            <div class="border car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end"
                                    style="background-image: url({{ $car->image }});">
                                </div>
                                <div style="padding: 20px 30px 0px;" class="text">
                                    <h2 class="mb-0 d-inline-block"><a href="">{{ $car->name }}</a></h2>
                                    <div class="mb-0">
                                        <span class="cat">{{ $car->car_type }}</span>
                                        <p class="price">Tk {{ $car->daily_rent_price }} <span
                                                class="d-inline-block">/day</span></p>
                                    </div>
                                </div>
                                <hr>
                                <div style="padding: 10px 30px 0px;" class="w-100 rounded mb-2 d-flex">
                                    <p><span>Pick up
                                            date:</span>{{ \Carbon\Carbon::parse($data->pick_date)->format('d/m/Y') }}</p>
                                    <p class="ml-auto"><span>Drop off
                                            date:</span>{{ \Carbon\Carbon::parse($data->drop_date)->format('d/m/Y') }}</p>
                                </div>
                                <div style="padding: 0px 30px 20px;" class="w-100">
                                    <p style="font-size: 25px; color:#1089ff">Total Bill: <a style="color: #1089ff"
                                            class="float-right">{{ $data->total_cost }} Tk</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 block-9 mb-md-5">
                    <h4 class="">Billing Information:</h4>
                    @if (isset($customer))
                        <form action="#" class="bg-light p-5 contact-form">
                            <div class="form-group">
                                <input type="text" value="{{ $customer->name }}" class="form-control"
                                    placeholder="Your Name" readonly>
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{ $customer->email }}" readonly class="form-control"
                                    placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                <input type="text" id="address" class="form-control" placeholder="Pickup Address">
                            </div>
                            {{-- show radio button Payment options cash on delivery or online payment --}}
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                        value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Cash on delivery
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                                        value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Online Payment
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <a onclick="checkout()" class="btn btn-primary py-3 px-5">Checkout</a>
                            </div>

                        </form>
                    @else
                        {{-- show please sign in here --}}
                        <form class="bg-light p-5 contact-form">
                            <div class="form-group">
                                <input type="text" id="email" class="form-control" placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" class="form-control" placeholder="Your Password">
                            </div>
                            <div class="form-group">
                                <a onclick="signIn()" class="btn btn-primary py-3 px-5">Sign In</a>
                            </div>
                            <div class="form-group text-center">
                                <p>Not an account? <a style="color: #1089ff" href="{{ route('user.sign-up') }}">Sign Up
                                        here</a></p>
                            </div>
                        </form>
                        {{-- show not an account sign up here --}}
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        async function signIn() {
            let email = document.getElementById('email').value;
            let password = document.getElementById("password").value;

            if (email == "" && password == "") {
                errorToast("Please enter any information.");
            } else if (email == "") {
                errorToast("Please enter your email.");
            } else if (password == "") {
                errorToast("Please enter a password.");
            } else {
                showLoader();
                const response = await axios.post("{{ route('auth.sign-in') }}", {
                    email: email,
                    password: password
                });
                hideLoader();
                if (response.data.status == "success") {
                    successToast(response.data.message);
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    errorToast(response.data.message);
                }
            }
        }


        async function checkout() {
            let address = document.getElementById('address').value;

            if (address == "") {
                errorToast("Please enter your address.");
            } else {
                showLoader();
                const response = await axios.post("{{ route('rentals.store') }}");
                hideLoader();
                if (response.data.status == "success") {
                    successToast(response.data.message);
                    setTimeout(() => {
                        window.location.href = "{{ route('homepage') }}";
                    }, 1000);
                } else if (response.data.status == "failed") {
                    errorToast(response.data.message);
                    setTimeout(() => {
                        window.history.back();
                    }, 1000);
                } else {
                    errorToast(response.data.message);
                }
            }
        }
    </script>
@endsection
