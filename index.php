<?php

session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('location: login-staff.php');
    exit;
}

$_SESSION = array();

session_destroy();

header('location: login-staff.php');
exit;
