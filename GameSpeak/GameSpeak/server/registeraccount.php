<?php

/**
 *  Author: Ishkhan Terziand ID#001216827
 * 
 *  Date: November 25, 2021,  8:23:17 AM
 * 
 *  Description: Gather input from a user to create a new account using their credentials
 *               by inserting a new record into the specified database.
 */
session_start();

// Connect to the DB
include "connect.php";

// Validating the email parameter
$email = filter_input(INPUT_GET, "email", FILTER_VALIDATE_EMAIL);

// Validating the userid paramater
$userid = filter_input(INPUT_GET, "userid", FILTER_SANITIZE_SPECIAL_CHARS);

//Validating the password parameter
$password = filter_input(INPUT_GET, "password", FILTER_SANITIZE_SPECIAL_CHARS);

// Hashing the user's password to be inserted into the database
$pwd = password_hash($password, PASSWORD_DEFAULT);

// Boolean check to ensure proper paramaters are passed
$valid = true;

// Saves the email into the session 
$_SESSION["email"] = $email;

$command = "SELECT email FROM users_table";   // Prepare and execute DB query

$stmt = $dbh->prepare($command);
$stmt->execute();
while ($row = $stmt->fetch()) {
    if ($_SESSION["email"] === $row["email"]) {     // Checks to see if the saved session is already in use
        echo json_encode(4);
        $valid = false;
    }
}

$userid . trim(" ");

if ($valid) {
    if ($email === "" || $email === false) {    // Error checks
        echo json_encode(1);
    } else if ($userid === "" || $userid === false || $userid === null) {
        echo json_encode(2);
    } else if ($password === "" || $password === false) {
        echo json_encode(3);
    } else {
        $command = "INSERT INTO users_table(email, username, password) VALUES (?,?,?)";   // Prepare and execute DB query

        $stmt = $dbh->prepare($command);
        $params = [$email, $userid, $pwd];
        $stmt->execute($params);

        echo json_encode(0);
    }
}
