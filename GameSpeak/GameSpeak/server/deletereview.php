<?php
/**
 *  Author: Ishkhan Terziand ID#001216827
 * 
 *  Date: November 28, 2021, 3:28:51 PM
 * 
 *  Description: Delete a user's review, by deleting the record from the database.
 *               
 */
session_start();

// Connect to the database
include "connect.php";

// Boolean to check if user is already logged in
$access = isset($_SESSION["userid"]);

// Validating user's primary id for the record
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if ($access) {
    if ($id !== null || $id !== false) {    // Error checks
        $command = "DELETE FROM review_table WHERE review_id= ? ";  // Prepare and execute DB query
        $stmt = $dbh->prepare($command);
        $params = [$id];
        $stmt->execute($params);
    }
} else {
    echo "Invalid Entry";
}
