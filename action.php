<?php

session_start();

/**
 * Class Action provide callable action used by ajax.
 */
class Action {
    private $db;

    public function __construct() {
        require_once 'config.php';
        $this->db = $conn;
    }

    public function __destruct() {
        $this->db->close();
    }

    /**
     * Login to system and set SESSION.
     *
     * Checks whether provided email and password match with the database,
     * if the email or password doesn't match return the errors.
     * Returns 1 if otherwise.
     *
     * @return int|string
     */
    public function login() {
        extract($_POST);
        $email = clean_input($email);
        $password = clean_input($password);

        if (!empty($email) && !empty($password)) {
            $sql = "SELECT id, email, password
                    FROM employees
                    WHERE email = ?";
            if ($stmt = mysqli_prepare($this->db, $sql)) {
                mysqli_stmt_bind_param($stmt, 's', $param_email);
                $param_email = $email;

                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        mysqli_stmt_bind_result(
                            $stmt,
                            $id,
                            $username,
                            $hashed_password
                        );

                        if (mysqli_stmt_fetch($stmt)) {
                            if (password_verify($password, $hashed_password)) {
                                $_SESSION['logged_in'] = true;
                                $_SESSION['login_id'] = $id;
                                $_SESSION['login_email'] = $email;
                                return 1;
                            } else {
                                return "Invalid email or password";
                            }
                        }
                    } else {
                        return "Invalid email or password";
                    }
                } else {
                    return "Oops! Something went wrong. Please try again later.";
                }
                mysqli_stmt_close($stmt);
            }
        }
    }
}
