<?php
/**
 *  Author: Ishkhan Terziand ID#001216827
 * 
 *  Date: November 25, 2021, 6:37:13 PM
 * 
 *  Description: Insert a new record into the database, using
 *               information that is gathered by a user.
 */
session_start();

// Boolean to check if user exists in the session
$access = isset($_SESSION["userid"]);

// Connect to the database
include "connect.php";

// Validating the parameters the user has entered
$psTitle = filter_input(INPUT_GET, "psTitle", FILTER_SANITIZE_SPECIAL_CHARS);
$rateGame = filter_input(INPUT_GET, "rateGame", FILTER_VALIDATE_INT);
$genreType = filter_input(INPUT_GET, "gameGenre", FILTER_SANITIZE_SPECIAL_CHARS);
$review = filter_input(INPUT_GET, "reviewText", FILTER_SANITIZE_SPECIAL_CHARS);

// Trim the parameters to check 
$psTitle = trim($psTitle);
$genreType = trim($genreType);
$review = trim($review);


if ($access) {      // Error checks
    if (($psTitle !== "" && $psTitle !== false) && ($rateGame >= 1 && $rateGame <= 5) && ($genreType !== "" && $genreType !== false) && ($review !== "" && $review !== false)) {
        $command = "INSERT INTO review_table(user_id, game_title, genre_type, review_text, rate_game) VALUES(?,?,?,?,?)";   // Prepare and execute DB query
        
        $stmt = $dbh->prepare($command);
        $param = [$_SESSION["userUnique"], $psTitle, $genreType, $review, $rateGame];
        $stmt->execute($param);
        echo json_encode(0);
    } else {
        echo json_encode(1);
    }
} else {
    echo "Invalid Entry";
    echo json_encode(1);
}
