

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route("homepage") }}">Car<span>Rental</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ route("homepage") }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ route("about") }}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{ route("rentals") }}" class="nav-link">Rentals</a></li>
                <li class="nav-item"><a href="{{ route("contact") }}" class="nav-link">Contact</a></li>
            </ul>
            <ul class="navbar-nav ml-auto">

                {{-- if user login show his name with dorpdown dashbord, profile, sign out --}}

                @if(isset($customer))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ $customer->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="{{ route("customer.history") }}" class="dropdown-item" href="">History</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route("auth.sign-out") }}">Sign Out</a>
                    </div>
                </li>
                @else
                <li class="nav-item"><a href="{{ route("user.sign-in") }}" class="nav-link">Sign In</a></li>
                @endif

            </ul>
        </div>
    </div>
    {{-- Sign in button --}}

</nav>
<!-- END nav -->
