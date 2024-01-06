<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $addr = $_POST["addr"];
    $pnumber = $_POST["pnumber"];

    try {
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        // ERROR HANDLERS

        $errors = [];


        if (is_input_empty($email, $pwd, $fname, $lname, $addr, $pnumber)) {
            $errors["empty_input"] = "Fill in all the fields!";
        }

        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email!";
        }

        if (is_email_registred($pdo, $email)) {
            $errors["email_registered"] = "Email is already registered!";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../index.php");
            die();
        }

        create_user($pdo, $email, $pwd, $fname, $lname, $addr, $pnumber);

        header("Location: ../index.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
    die();
}