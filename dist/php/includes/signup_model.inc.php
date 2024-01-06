<?php

declare(strict_types=1);

function get_email(object $pdo, string $email) {
    $query = "SELECT email FROM tbl_users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $email, string $pwd, string $fname, string $lname, string $addr, string $pnumber) {
    $query = "INSERT INTO tbl_users (email, pwd, fname, lname, addr, pnumber) VALUES (:email, :pwd, :fname, :lname, :addr, :pnumber)";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];

    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":pwd", $hashedPwd);
    $stmt->bindParam(":fname", $fname);
    $stmt->bindParam(":lname", $lname);
    $stmt->bindParam(":addr", $addr);
    $stmt->bindParam(":pnumber", $pnumber);
    $stmt->execute();
}