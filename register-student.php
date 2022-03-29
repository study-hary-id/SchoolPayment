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
                    Please fill this form to register your data.
                </p>
            </div>
            <div>
                <div class="form-row">
                    <div class="col-sm form-group">
                        <label class="form-label" for="nisn">NISN</label>
                        <input
                            type="text"
                            name="nisn"
                            placeholder="Your NISN number"
                            class="form-control"
                        >
                    </div>
                    <div class="col-sm form-group">
                        <label class="form-label" for="nis">NIS</label>
                        <input
                            type="text"
                            name="nis"
                            placeholder="Your NIS number"
                            class="form-control"
                        >
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm form-group">
                        <label class="form-label" for="email">Email</label>
                        <input
                            type="text"
                            name="email"
                            placeholder="Enter your email"
                            class="form-control"
                        >
                    </div>
                    <div class="col-sm form-group">
                        <label class="form-label" for="name">Name</label>
                        <input
                            type="text"
                            name="naem"
                            placeholder="Enter your name"
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
                    <div class="col-sm form-group">
                        <label class="form-label" for="student-class">Classroom</label>
                        <input
                            type="text"
                            name="student-class"
                            placeholder="Enter your classroom"
                            class="form-control"
                        >
                    </div>
                </div>
            </div>

            <!-- Address textarea column -->
            <div class="form-group">
                <label class="form-label" for="address">Address</label>
                <textarea name="address" class="form-control"></textarea>
            </div>

            <!-- Submit button for student data -->
            <div class="form-row">
                <div class="col-sm-6 form-group">
                    <input
                        type="submit"
                        value="Submit"
                        class="btn btn-primary form-control "
                    >
                </div>
            </div>
            <div class="text-center my-3">
                <p class="text-secondary">
                    Check your payment history
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
