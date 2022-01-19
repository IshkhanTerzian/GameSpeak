<?php
/**
 *  Author: Ishkhan Terziand ID#001216827
 * 
 *  Date: November 24, 2021, 3:20:43 PM
 * 
 *  Description: Create a new review by insterting a new record into the database, using
 *               information that is entered by the user.
 *               Parameters are passed to createreview.js
 */
session_start();

// Boolean to check if user is already logged in
$access = isset($_SESSION["userid"]);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Leave a Review!</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/createreview.js"></script>


</head>

<body>

    <div id="main">
        <?php
        if ($access) {
        ?>
            <div class="sidenav">
                <a href="currentreviews.php">Current Reviews</a>
                <a href="userreview.php">See Your Reviews</a>
                <a href="main.php">Main Page</a>
                <a href="logout.php">Log Out</a>
            </div>

            <h1 id="topMsg">Leave a PlayStation 5 Review</h1>
            
            <div id="createReviewForm">
                <label>Rate the game between 1 and 5:</label>
                <input type="number" id="rateGame" min="1" max="5"  required>

                <label>Title of the Game:</label>
                <input type="text" id="psTitle" required>

                <label>Genre:</label>
                <input type="text" id="gameGenre" required>

                <label>Leave a Review:</label>
                <textarea id="reviewText" rows="4" cols="50" required></textarea><br>

                <input type="button" id="submitReview" value="Submit your Review!">
            </div>
        <?php
        } else {
        ?>
            <div class="loggFail">
                <h1>Must be logged in to Access this content</h1>
                <a href="../index.html">Go back to Log in</a><br>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>