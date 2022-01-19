<?php

/**
 *  Author: Ishkhan Terziand ID#001216827
 * 
 *  Date: November 25, 2021, 10:08:55 PM
 * 
 *  Description: Retrieve the logged in user's reviews that they have
 *               entered into GameSpeak.
 */
session_start();

// Connect to the DB
include "connect.php";

// Boolean to check if user is already logged in
$access = isset($_SESSION["userid"]);

$result = [];   // Initialize the array


if ($access) {
    $command = "SELECT username, game_title, genre_type, review_text, rate_game FROM review_table r JOIN users_table u ON r.user_id = u.user_id";  // Prepare and execute DB query

    $stmt = $dbh->prepare($command);
    $stmt->execute();

    while ($row = $stmt->fetch()) {         // Gather review records, insert into the array
        array_push($result, ["username" => $row["username"], "title" => $row["game_title"], "genre" => $row["genre_type"], "rtext" => $row["review_text"], "rategame" => $row["rate_game"]]);
    }

    echo json_encode($result);      // json_encode the array
} else {
    echo "Invalid Entry";
    echo json_encode(0);
}
