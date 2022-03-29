<?php

session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // Target location to redirect if logged_in.
    header('location: info.php');
    exit;
}

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
            <div class="core-form">
                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input
                        type="text"
                        name="email"
                        placeholder="Your email address"
                        class="form-control"
                        id="email"
                    >
                    <span class="invalid-feedback letter-spacing-normal"></span>
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
                        id="password"
                    >
                    <span class="invalid-feedback letter-spacing-normal"></span>
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
                        id="submit"
                        disabled
                    >
                </div>
            </div>
            <div class="text-center my-3">
                <p class="text-secondary">
                    Don't have an account?
                    <a href="register-staff.php" class="text-warning font-weight-bold">
                        Sign up
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
        const validate = { email: false, password: false };

        /*
         * Validate email using RegExp every time it change.
         */
         $("#email").keyup(function (e) {
            const regex = /^[a-z1-9.]+@+[a-z]+[.]+[a-z]+$/;
            if (!regex.test(e.target.value)) {
                toggleError(
                    $(this),
                    "Must contain letters, numbers, dot, and @.",
                    function () { validate.email = false }
                );
            } else {
                togglePass($(this), "", function () { validate.email = true });
            }
        });

        /*
         * Validate password by lenght every time it change.
         */
        $("#password").keyup(function (e) {
            // /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/
            // Regex pattern for registering a password.
            // Must contain numbers, lowercase & uppercase letters.
            if (e.target.value.length < 8) {
                toggleError(
                    $(this),
                    "Password at least 8 long characters.",
                    function () { validate.password = false }
                );
            } else {
                togglePass($(this), "", function () { validate.password = true });
            }
        });

        /*
         * Submit handler for sign in form using AJAX jQuery.
         */
        $(".form-signin").submit(function (e) {
           e.preventDefault();

           if ($(this).find('.alert-danger').length > 0 )
               $(this).find('.alert-danger').remove();

           $.ajax({
               url: "ajax.php?action=login",
               method: "POST",
               data: $(this).serialize(),
               err: function (err) {
                   console.log(err);
               },
               success: function (res) {
                   if (res == 1) {
                       location.href = "info.php";
                       return;
                   }
                   $(".form-signin .core-form").before(
                       '<div class="alert alert-danger text-center">' +
                       '    Username or password is incorrect.' +
                       '</div>'
                   );
               }
           });
        });

        function togglePass(element, message, callback) {
            callback();
            element.removeClass("is-invalid");
            element.next().text(message);
            validateCredentials();
        }

        function toggleError(element, message, callback) {
            callback();
            element.addClass("is-invalid");
            element.next().text(message);
            validateCredentials();
        }

        function validateCredentials() {
            if (validate.email && validate.password) {
                $("#submit").removeAttr("disabled");
            } else {
                $("#submit").attr("disabled", "");
            }
        }
    });
</script>
</body>
</html>
