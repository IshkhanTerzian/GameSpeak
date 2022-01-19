<?php
/**
 *  Author: Ishkhan Terziand ID#001216827
 * 
 *  Date: November 26, 2021,  3:03:08 PM
 * 
 *  Description: Gather all the reviews associated with this user
 *               and display it on the page.
 */
session_start();

// Connect to the DB
include "connect.php";

// Boolean to check if user is already logged in
$access = isset($_SESSION["userid"]);

$result = [];   // Initialize the array

if ($access) {
    $command = "SELECT game_title, genre_type, review_text, rate_game  FROM review_table WHERE user_id= ?";         // Prepare and execute DB query
    $stmt = $dbh->prepare($command);
    $params = [$_SESSION["userUnique"]];
    $stmt->execute($params);

    while ($row = $stmt->fetch()) {     // Gather review records, insert into the array
        array_push($result, ["title" => $row["game_title"], "genre" => $row["genre_type"], "rtext" => $row["review_text"], "rategame" => $row["rate_game"]]);
    }
    echo json_encode($result);      // json_encode the array
} else {
    echo "Invalid Entry";
    echo json_encode(1);
}
