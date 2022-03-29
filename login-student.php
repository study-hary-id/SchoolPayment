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
        <form action="#" method="post" class="form-signin">
            <div class="text-center mb-5">
                <h3 class="display-5">🎓</h3>
                <h1 class="h2 font-weight-bolder mt-4 mb-0">
                    Welcome student
                </h1>
                <p class="mt-2 text-secondary">
                    Fill in your credentials to check your payments.
                </p>
            </div>
            <div>
                <div class="form-group">
                    <label class="form-label" for="email">
                        NISN/NIS/Email
                    </label>
                    <input
                        type="text"
                        name="credential"
                        placeholder="Your NISN/NIS/Email"
                        class="form-control"
                    >
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="keep-logged-in" class="form-check-input">
                    <label class="form-label m-0" for="keep-logged-in">
                        Keep me logged in
                    </label>
                </div>
                <div class="form-group">
                    <input
                        type="submit"
                        value="Sign in"
                        class="btn btn-primary form-control"
                    >
                </div>
            </div>
            <div class="text-center my-3">
                <p class="text-secondary">
                    Can't sign in? Register your data
                    <a href="#" class="text-warning font-weight-bold">
                        here
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
</body>
</html>
