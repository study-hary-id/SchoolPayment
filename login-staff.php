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
                <h3 class="display-5">👋</h3>
                <h1 class="h2 font-weight-bolder mt-4 mb-0">
                    Welcome back
                </h1>
                <p class="mt-2 text-secondary">
                    Please fill in your credentials to login.
                </p>
            </div>
            <div>
                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input
                        type="text"
                        name="email"
                        placeholder="Your email address"
                        class="form-control"
                    >
                </div>
                <div class="form-group">
                    <div class="d-flex align-items-center justify-content-between">
                        <label class="form-label" for="password">Password</label>
                        <a
                            href="#"
                            class="text-muted text-primary-hover text-underline mb-2">
                            Forgot password?
                        </a>
                    </div>
                    <input
                        type="password"
                        name="password"
                        placeholder="Enter your password"
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
                    Don't have an account?
                    <a href="#" class="text-warning font-weight-bold">
                        Sign up
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
</body>
</html>
