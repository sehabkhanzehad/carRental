@extends('layouts.homepage.master')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight"
        style="background-image: url({{ asset('assets') }}/home-page/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>History <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Yor Rental History</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="car-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th class="bg-primary heading">Rental Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($rentals as $rental)
                                    <tr class="">
                                        <td class="car-image">
                                            <div class="img" style="background-image:url({{ $rental->car->image }});">
                                            </div>
                                        </td>
                                        <td class="product-name">
                                            <h3>{{ $rental->car->name }}</h3>
                                            <h6>{{ $rental->car->brand }}</h6>
                                        </td>
                                        @php
                                        $startDate = new DateTime($rental->start_date);
                                        $endDate = new DateTime($rental->end_date);
                                        $today = new DateTime();
                                       if ($startDate > $today) {
                                           $status = 'Upcoming';
                                           $btnName = 'Cancel';
                                           $badgeClass = 'info'; // Future status
                                       } elseif ($endDate >= $today) {
                                           $status = 'Ongoing';
                                           $btnName = 'Cancel';
                                           $badgeClass = 'success'; // Current status
                                       } else{
                                           $status = 'Expired';
                                           $btnName = 'Delete';
                                           $badgeClass = 'danger'; // Past status
                                       }
                                    @endphp
                                        <td class="price">
                                            <p class="btn-custom"><a style="cursor: pointer" data-id="{{ $rental->id }}" class="cancelBtn">{{ $btnName }}</a></p>
                                            <div class="price-rate">
                                                <h3>

                                                    <span class="num">Tk {{ $rental->total_cost }}</span>
                                                </h3>

                                                <span class="subheading float-left ml-5">Start Time:
                                                    {{ $rental->start_date }}</span><br>
                                                <span class="subheading float-left ml-5">End Time:
                                                    {{ $rental->end_date }}</span><br>
                                                <span class="subheading float-left ml-5">Status: <a class="badge badge-{{ $badgeClass }}">{{ $status }}</a></span><br>


                                        </td>
                                    </tr><!-- END TR-->
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No Record Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section("script")
    <script>
        $(".cancelBtn").on("click", async function() {
            let id = $(this).data("id");
            showLoader();
            const response = await axios.delete(`/admin/rentals/${id}`);
            hideLoader();
            if (response.data.status == "success") {
                successToast(response.data.message);
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            } else {
                errorToast(response.data.message);
            }
        });

    </script>
@endsection
