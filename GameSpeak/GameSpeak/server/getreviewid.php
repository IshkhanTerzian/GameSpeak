<?php

/**
 *  Author: Ishkhan Terziand ID#001216827
 * 
 *  Date: November 28, 2021, 3:42:34 PM
 * 
 *  Description: Get the specific identifier for the record,
 *               in order to delete the record if a user decides
 *               to delete it their review.
 */
session_start();

// Connect to the database
include "connect.php";

// Boolean to check if user is already logged in
$success = isset($_SESSION["userid"]);

// Initialize the array
$result = [];

if ($success) {
    $command = "SELECT review_id FROM review_table";  // Prepare and execute the DB query
    $stmt = $dbh->prepare($command);
    $stmt->execute();

    while ($row = $stmt->fetch()) {         // Get the unique specified id
        
        array_push($result, ["id" => $row["review_id"]]);
    }
    echo json_encode($result);    // Encode the array with json-encode
} else {
    echo "Invalid Entry";
}
