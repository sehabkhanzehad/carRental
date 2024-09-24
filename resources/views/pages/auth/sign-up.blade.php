@extends('layouts.dashboard.admin.app')
@section('title', 'Sign Up')
@section('content')
    @include('components.auth.sign-up-form')
@endsection
@section('script')
    <script>
        async function signUp() {
            let name = document.getElementById('name').value;
            let email = document.getElementById('email').value;
            let password = document.getElementById("password").value;

            if (email == "" && name == "" && password == "") {
                errorToast("Please enter any information.");
            } else if (name == "") {
                errorToast("Please enter your name.");
            } else if (email == "") {
                errorToast("Please enter your email.");
            } else if (password == "") {
                errorToast("Please enter a password.");
            } else if(password.length < 8) {
                errorToast("Password should be at least 8 characters long.");
            } else {
                showLoader();
                const response = await axios.post("{{ route('auth.sign-up') }}", {
                    name: name,
                    email: email,
                    password: password
                });
                hideLoader();

                if (response.data.status == "success") {
                    successToast(response.data.message);
                    setTimeout(() => {
                        window.location.href = response.data.url;
                    }, 1000);
                } else {
                    errorToast(response.data.message);
                }
            }
        }
    </script>
@endsection
