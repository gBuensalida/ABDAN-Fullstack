<?php

declare(strict_types=1);

function is_input_empty($email, $pwd, $fname, $lname, $addr, $pnumber) {

    if (empty($email) || empty($pwd) || empty($fname) || empty($lname) || empty($addr) || empty($pnumber)) {
        return true;
    } else {
        return false;
    }
    
}

function is_email_invalid(string $email) {

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true; 
    } else {
        return false;
    }
    
}

function is_email_registred(object $pdo, string $email) {

    if (get_email($pdo, $email)) {
        return true; 
    } else {
        return false;
    }
    
}

function create_user(object $pdo, string $email, string $pwd, string $fname, string $lname, string $addr, string $pnumber) {

set_user($pdo, $email, $pwd, $fname, $lname, $addr, $pnumber);
    
}