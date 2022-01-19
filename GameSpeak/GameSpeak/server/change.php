<?php
/**
 *  Author: Ishkhan Terziand ID#001216827
 * 
 *  Date: November 29, 2021, 3:46:33 PM
 * 
 *  Description: Updating the current user's username and password
 *              which is updated in all the databases that have the username
 *              as a field
 */
session_start();

// Boolean to check if user exists in the session
$access = isset($_SESSION["userid"]);

// Connect to the DB
include "connect.php";

// Validating the new userid 
$userid = filter_input(INPUT_GET, "userid", FILTER_SANITIZE_SPECIAL_CHARS);

// Validating the new password
$password = filter_input(INPUT_GET, "password", FILTER_SANITIZE_SPECIAL_CHARS);

// Hashing the user's password to be insterted into the database
$pwd = password_hash($password, PASSWORD_DEFAULT);


if ($access) {
    if (($userid !== "" || $userid !== false) && ($password !== ""  || $password !== false)) {           // Error checks
        $cmd = "UPDATE users_table SET username = ?, password = ? WHERE user_id = ?";          // Prepare and execute DB query to update users table
        $stmt = $dbh->prepare($cmd);
        $params = [$userid, $pwd, $_SESSION["userUnique"]];
        $stmt->execute($params);

        session_destroy();                  // Destroy session after update
        echo json_encode(0);
    } else {
        echo "Invalid entry";
        echo json_encode(1);
    }
}
