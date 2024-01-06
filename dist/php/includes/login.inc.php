<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $fname = $_POST["fname"];

    try {
        require_once 'dbh.inc.php';
        require_once 'login.model.inc.php';
        require_once 'login.contr.inc.php';

        // ERROR HANDLERS

        $errors = [];


        if (is_input_empty($email, $pwd)) {
            $errors["empty_input"] = "Fill in all the fields!";
        }

        $result = get_email($pdo, $email);

        if (is_email_wrong($result)) {
            $errors["login_incorrect"] = "Incorrect login info!";
        }
        if (!is_email_wrong($result) && is_password_wrong($pwd, $result["pwd"])) {
            $errors["login_incorrect"] = "Incorrect login info!";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_login"] = $errors;

            header("Location: ../index.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_email"] = htmlspecialchars($result["email"]);
        $_SESSION["user_fname"] = htmlspecialchars($result["fname"]);

        $_SESSION["last_regenaration"] = time();

        header("Location: ../index.php?login=success");
        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
else {
    header("Location: ../index.php");
    die();
}