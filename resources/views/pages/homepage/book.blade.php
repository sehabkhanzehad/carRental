@extends('layouts.homepage.master')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight"
        style="background-image: url({{ asset('assets/home-page/images/bg_3.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Booking <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Booking</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-car-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="car-details">
                        <div class="img rounded" style="background-image: url({{ $car->image }});"></div>
                        {{-- <div class="text text-center">
                            <span class="subheading">{{ $car->brand }}</span>
                            <h2>{{ $car->name }}</h2>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="row no-gutters">
                <div class="col-md-12	featured-top">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex align-items-center m-auto">
                            <span class="request-form ftco-animate bg-primary">
                                {{-- @csrf --}}

                                <h2>Make your trip</h2>
                                {{-- <div class="form-group">
                                    <label for="" class="label">Pick-up location</label>
                                    <input type="text" class="form-control" placeholder="City, Airport, Station, etc">
                                </div>
                                <div class="form-group">
                                    <label for="" class="label">Drop-off location</label>
                                    <input type="text" class="form-control" placeholder="City, Airport, Station, etc">
                                </div> --}}
                                {{-- Show total cost --}}
                                <div class="form-group">
                                    <label for="" class="label">Total Cost</label>
                                    <input type="text" class="form-control" style="font-weight: bold; font-size: 20px"
                                        value="{{ $car->daily_rent_price }}" id="total_cost" readonly>
                                </div>
                                <div class="d-flex">
                                    <div class="form-group mr-2">
                                        <label for="" class="label">Pick-up date</label>
                                        <input type="hidden" id="daily_rent" value="{{ $car->daily_rent_price }}">
                                        <input type="hidden" id="car_id" value="{{ $car->id }}">
                                        <input type="date" class="form-control" name="pick_date"
                                            value="{{ date('Y-m-d') }}" id="pick_date">
                                    </div>
                                    <div class="form-group ml-2">
                                        <label for="" class="label">Drop-off date</label>
                                        {{-- set value tomorrow --}}
                                        <input type="date" class="form-control" name="drop_date" id="drop_date"
                                            value="{{ date('Y-m-d', strtotime('+1 day')) }}">
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="" class="label">Pick-up time</label>
                                    <input type="text" class="form-control" id="time_pick" placeholder="Time">
                                </div> --}}
                                <div class="form-group">
                                    <button onclick="rentCar()" value="Rent A Car Now"
                                        class="btn btn-secondary py-3 px-4">Book
                                        Now</button>
                                </div>
                            </span>
                        </div>

                        {{-- <div class="col-md-8 d-flex align-items-center">
                            <div class="services-wrap rounded-right w-100">


                                <h3 class="heading-section mb-4 ">Tk {{ $car->daily_rent_price }} <span>/day</span></h3>


                            </div>
                            <p><a href="#" class="btn btn-primary py-3 px-4">Reserve Your Perfect Car</a>
                            </p>
                        </div> --}}
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-dashboard"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Mileage
                                    <span>40,000</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-pistons"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Transmission
                                    <span>Manual</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-car-seat"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Seats
                                    <span>4 Adults</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-backpack"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Luggage
                                    <span>2 Bags</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-diesel"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Fuel
                                    <span>Petrol</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 pills">
                <div class="bd-example bd-example-tabs">
                    <div class="d-flex justify-content-center">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="pills-description-tab" data-toggle="pill"
                                    href="#pills-description" role="tab" aria-controls="pills-description"
                                    aria-expanded="true">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill"
                                    href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer"
                                    aria-expanded="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review"
                                    role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-description" role="tabpanel"
                            aria-labelledby="pills-description-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <ul class="features">
                                        <li class="check"><span class="ion-ios-checkmark"></span>Airconditions</li>
                                        <li class="check"><span class="ion-ios-checkmark"></span>Child Seat</li>
                                        <li class="check"><span class="ion-ios-checkmark"></span>GPS</li>
                                        <li class="check"><span class="ion-ios-checkmark"></span>Luggage</li>
                                        <li class="check"><span class="ion-ios-checkmark"></span>Music</li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="features">
                                        <li class="check"><span class="ion-ios-checkmark"></span>Seat Belt</li>
                                        <li class="remove"><span class="ion-ios-close"></span>Sleeping Bed</li>
                                        <li class="check"><span class="ion-ios-checkmark"></span>Water</li>
                                        <li class="check"><span class="ion-ios-checkmark"></span>Bluetooth</li>
                                        <li class="remove"><span class="ion-ios-close"></span>Onboard computer</li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="features">
                                        <li class="check"><span class="ion-ios-checkmark"></span>Audio input</li>
                                        <li class="check"><span class="ion-ios-checkmark"></span>Long Term Trips</li>
                                        <li class="check"><span class="ion-ios-checkmark"></span>Car Kit</li>
                                        <li class="check"><span class="ion-ios-checkmark"></span>Remote central
                                            locking</li>
                                        <li class="check"><span class="ion-ios-checkmark"></span>Climate control</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel"
                            aria-labelledby="pills-manufacturer-tab">
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                                unorthographic life One day however a small line of blind text by the name of Lorem
                                Ipsum decided to leave for the far World of Grammar.</p>
                            <p>When she reached the first hills of the Italic Mountains, she had a last view back on the
                                skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline
                                of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she
                                continued her way.</p>
                        </div>

                        <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                            <div class="row">
                                <div class="col-md-7">
                                    <h3 class="head">23 Reviews</h3>
                                    <div class="review d-flex">
                                        <div class="user-img" style="background-image: url(images/person_1.jpg)">
                                        </div>
                                        <div class="desc">
                                            <h4>
                                                <span class="text-left">Jacob Webb</span>
                                                <span class="text-right">14 March 2018</span>
                                            </h4>
                                            <p class="star">
                                                <span>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                </span>
                                                <span class="text-right"><a href="#" class="reply"><i
                                                            class="icon-reply"></i></a></span>
                                            </p>
                                            <p>When she reached the first hills of the Italic Mountains, she had a last
                                                view back on the skyline of her hometown Bookmarksgrov</p>
                                        </div>
                                    </div>
                                    <div class="review d-flex">
                                        <div class="user-img" style="background-image: url(images/person_2.jpg)">
                                        </div>
                                        <div class="desc">
                                            <h4>
                                                <span class="text-left">Jacob Webb</span>
                                                <span class="text-right">14 March 2018</span>
                                            </h4>
                                            <p class="star">
                                                <span>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                </span>
                                                <span class="text-right"><a href="#" class="reply"><i
                                                            class="icon-reply"></i></a></span>
                                            </p>
                                            <p>When she reached the first hills of the Italic Mountains, she had a last
                                                view back on the skyline of her hometown Bookmarksgrov</p>
                                        </div>
                                    </div>
                                    <div class="review d-flex">
                                        <div class="user-img" style="background-image: url(images/person_3.jpg)">
                                        </div>
                                        <div class="desc">
                                            <h4>
                                                <span class="text-left">Jacob Webb</span>
                                                <span class="text-right">14 March 2018</span>
                                            </h4>
                                            <p class="star">
                                                <span>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                </span>
                                                <span class="text-right"><a href="#" class="reply"><i
                                                            class="icon-reply"></i></a></span>
                                            </p>
                                            <p>When she reached the first hills of the Italic Mountains, she had a last
                                                view back on the skyline of her hometown Bookmarksgrov</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="rating-wrap">
                                        <h3 class="head">Give a Review</h3>
                                        <div class="wrap">
                                            <p class="star">
                                                <span>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    (98%)
                                                </span>
                                                <span>20 Reviews</span>
                                            </p>
                                            <p class="star">
                                                <span>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    (85%)
                                                </span>
                                                <span>10 Reviews</span>
                                            </p>
                                            <p class="star">
                                                <span>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    (70%)
                                                </span>
                                                <span>5 Reviews</span>
                                            </p>
                                            <p class="star">
                                                <span>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    (10%)
                                                </span>
                                                <span>0 Reviews</span>
                                            </p>
                                            <p class="star">
                                                <span>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    (0%)
                                                </span>
                                                <span>0 Reviews</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        // function setTotalCost() {
        //     const pickDate = new Date(pickDateInput.value);
        //     const dropDate = new Date(dropDateInput.value);

        //     // Calculate the difference in milliseconds
        //     const diffTime = dropDate - pickDate;

        //     // Calculate the difference in days
        //     const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));

        //     // return diffDays;
        //      const totalCost = diffDays * document.getElementById('daily_rent').value;
        //      return totalCost
        // }

        // const pickDateInput = document.getElementById('pick_date');
        // const dropDateInput = document.getElementById('drop_date');

        // pickDateInput.addEventListener('change', function() {
        //     const selectedDate = new Date(pickDateInput.value);
        //     selectedDate.setDate(selectedDate.getDate() + 1);

        //     // Format the date back to YYYY-MM-DDF
        //     const nextDay = selectedDate.toISOString().split('T')[0];
        //     dropDateInput.value = nextDay;

        //     document.getElementById("total_cost").value = setTotalCost();
        // });

        const pickDateInput = document.getElementById('pick_date');
        const dropDateInput = document.getElementById('drop_date');

        function setTotalCost() {
            const pickDate = new Date(pickDateInput.value);
            const dropDate = new Date(dropDateInput.value);

            // Calculate the difference in milliseconds
            const diffTime = dropDate - pickDate;

            // Calculate the difference in days
            const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));

            // Get the daily rent value
            const dailyRent = parseFloat(document.getElementById('daily_rent').value);

            // Calculate total cost
            // const totalCost = diffDays >= 0 ? diffDays * dailyRent : 0; // Avoid negative costs
            const totalCost = diffDays * dailyRent;
            // return with two precision
            return totalCost.toFixed(2);
            // return totalCost;
        }

        // Update the total cost when pick date changes
        pickDateInput.addEventListener('change', function() {
            const selectedDate = new Date(pickDateInput.value);
            selectedDate.setDate(selectedDate.getDate() + 1);

            // Format the date back to YYYY-MM-DD
            const nextDay = selectedDate.toISOString().split('T')[0];
            dropDateInput.value = nextDay;

            // Update total cost
            document.getElementById("total_cost").value = setTotalCost();
        });

        // Update the total cost when drop date changes
        dropDateInput.addEventListener('change', function() {
            document.getElementById("total_cost").value = setTotalCost();
        });



      async function rentCar() {
            let pickDate = document.getElementById('pick_date').value;
            let dropDate = document.getElementById('drop_date').value;
            let id = document.getElementById('car_id').value;
            let totalCost = document.getElementById('total_cost').value;

            if (pickDate == "" && dropDate == "") {
                alert('Please select pick-up and drop-off date');
            } else if (pickDate == "") {
                alert('Please select pick-up date');
            } else if (dropDate == "") {
                alert('Please select drop-off date');
            } else if (pickDate > dropDate) {
                alert('Pick-up date cannot be greater than drop-off date');
            } else if (pickDate < new Date().toISOString().split('T')[0]) {
                alert('Pick-up date cannot be past date');
                let pickDate = document.getElementById('pick_date');
                pickDate.value = new Date().toISOString().split('T')[0];

                let dropDate = document.getElementById('drop_date');
                dropDate.value = new Date(new Date().setDate(new Date().getDate() + 1)).toISOString().split('T')[0];
            } else {
                //  alert(document.getElementById('daily_rent').value);
                // alert(setTotalCost());
                showLoader();
                const response = await axios.post(`/cars/${id}/rent`, {
                    pick_date: pickDate,
                    drop_date: dropDate,
                    total_cost: totalCost,
                    car_id: id,
                });
                hideLoader();
                if (response.data.status == "success") {
                    window.location.href = response.data.url;
                } else {
                    errorToast(response.data.message);
                }

            }

        }

        // // check selected is how many days
        // pickDate.addEventListener('change', function () {
        //     dropDate.value = new Date(pickDate).setDate(pickDate.getDate() + 1);
        // });

        // let dailyRent = document.getElementById('daily_rent');
    </script>
@endsection
