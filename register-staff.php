<?php

session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('location: info.php');
    exit;
}

require_once 'config.php';
require_once 'header.php';
?>
<body>
<div class="container">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form action="#" method="post" class="form-register">
            <div class="text-center mb-5">
                <h1 class="h2 font-weight-bolder m-0">
                    Create your account
                </h1>
                <p class="mt-2 text-secondary">
                    Please fill this form to create an account.
                </p>
            </div>
            <div>
                <div class="form-row">
                    <div class="col-sm form-group">
                        <label class="form-label" for="email">Email</label>
                        <input
                            type="text"
                            name="email"
                            placeholder="Your email address"
                            class="form-control"
                        >
                    </div>
                    <div class="col-sm form-group">
                        <label class="form-label" for="name">Name</label>
                        <input
                            type="text"
                            name="name"
                            placeholder="Enter your name"
                            class="form-control"
                        >
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm form-group">
                        <label class="form-label" for="password">Password</label>
                        <input
                            type="password"
                            name="password"
                            placeholder="Enter your password"
                            class="form-control"
                        >
                    </div>
                    <div class="col-sm form-group">
                        <label class="form-label" for="confirm-password">
                            Confirm Password
                        </label>
                        <input
                            type="password"
                            name="confirm-password"
                            placeholder="Confirm your password"
                            class="form-control"
                        >
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm form-group">
                        <label class="form-label" for="phone-number">Phone Number</label>
                        <input
                            type="text"
                            name="phone-number"
                            placeholder="Your phone number"
                            class="form-control"
                        >
                    </div>
                    <div class="col-sm form-group align-self-end">
                        <input
                            type="submit"
                            value="Register"
                            class="btn btn-primary form-control"
                        >
                    </div>
                </div>
            </div>
            <div class="text-center my-3">
                <p class="text-secondary">
                    Already have an account?
                    <a href="#" class="text-warning font-weight-bold">
                        Sign in
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
</body>
</html>
