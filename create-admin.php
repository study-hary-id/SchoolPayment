<?php

require_once 'config.php';

/*
 * Check if administrator account has created previously.
 */
$sql = "SELECT id FROM employees WHERE email = ?";

if ($stmt = mysqli_prepare($conn, $sql)) {
    // Bind variables to the prepared statement as parameters.
    mysqli_stmt_bind_param($stmt, "s", $param_email);

    // Set parameters.
    $param_email = 'admin@example.com';

    // Attempt to execute the prepared statement.
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt); /* store result */

        if (mysqli_stmt_num_rows($stmt) == 1) {
            echo 'Administrator account has already exist.';
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            exit;
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }

    // Close statement.
    mysqli_stmt_close($stmt);
}

/*
 * If administrator account hasn't created, create one account.
 */
$sql = "INSERT INTO employees (
            email, name, password, phone_number, level
        )
        VALUES (
             ?, ?, ?, ?, ?
        );";

if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param(
        $stmt,
        'sssss',
        $param_email,
        $param_name,
        $param_password,
        $param_phone_number,
        $param_level
    );

    $param_email = 'admin@example.com';
    $param_name = 'Administrator';
    $param_password = password_hash('testpass', PASSWORD_DEFAULT);
    $param_phone_number = '088888888888';
    $param_level = 'admin';

    if (mysqli_stmt_execute($stmt)) {
        echo 'Administrator account successfully created';
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
