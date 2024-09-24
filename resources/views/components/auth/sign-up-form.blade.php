<div class="main-wrapper">
    <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">

            <div class="container">
                <div class="col-md-4 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <a href="#" class="noble-ui-logo d-block mb-2 text-center">CAR<span>RENTAL</span></a>
                            <h5 class="text-muted font-weight-normal mb-4 text-center">Welcome! Sign up to continue.</h5>
                            <form class="forms-sample">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="name" class="form-control" id="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="password"
                                        autocomplete="current-password" placeholder="Password">
                                </div>

                                <div class="mt-3">
                                    <button class="btn btn-primary btn-block mr-2 mb-2 mb-md-0 text-white" onclick="signUp()" id="signInBtn" type="button">Sign Up</button>
                                </div>
                                {{-- <a href="" class="d-block mt-3 text-primary text-center">Forgotten
                                    password?</a> --}}
                                    <p class="d-block mt-3 text-center">Already have an account? <a href="{{ route("user.sign-in") }}">Sign In</a></p>

                            </form>

                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
