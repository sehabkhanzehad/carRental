@extends('layouts.dashboard.admin.app')
@section('title', 'Sign In')
@section('content')
    @include('components.auth.sign-in-form')
@endsection
@section('script')
    <script>
        // Get the sign in button element
        const signInBtn = document.getElementById('signInBtn');

        // Add an event listener to the document to listen for key presses
        document.addEventListener('keypress', function(event) {
            // Check if the pressed key is the Enter key
            if (event.key === 'Enter') {
                // Click the sign in button programmatically
                signInBtn.click();
            }
        });

        async function signIn() {
            let email = document.getElementById('email').value;
            let password = document.getElementById("password").value;

            if (email == "" && password == "") {
                errorToast("Please enter your email and password.");
            } else if (email == "") {
                errorToast("Please enter your email.");
            } else if (password == "") {
                errorToast("Please enter your password.");
            } else {
                const re =
                    /^(?:(?:[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+)*")|(?:[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+)*))@(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)|[a-zA-Z0-9-]*[a-zA-Z0-9]:(?:(?:[ -~]|\\[^\r\n])*)\])$/;
                if (!re.test(email)) {
                    errorToast("Please enter a valid email.");
                } else {
                    // alert("Email: " + email + "\nPassword: " + password);

                    showLoader();
                    const response = await axios.post("{{ route('auth.sign-in') }}", {
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
                        // errorToast(response.data.message);
                        errorToast(response.data['message']);
                    }
                }
            }
        }
    </script>
@endsection
