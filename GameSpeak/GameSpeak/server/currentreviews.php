<?php

/**
 *  Author: Ishkhan Terziand ID#001216827
 * 
 *  Date: November 24, 2021, 3:19:58 PM
 * 
 *  Description: Gather all the reviews from the database
 *               and display it all on the page using
 *               currentreviews.js and jQuery
 *               
 */
session_start();

// Connect to the DB
include "connect.php";

// Boolean to check if user is already logged in
$access = isset($_SESSION["userid"]);


?>
<!DOCTYPE html>
<html>

<head>
    <title>Current Reviews</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/currentreviews.js"></script>

</head>

<body>

    <div id="main">
        <?php
        if ($access) {
        ?>
            <div class="sidenav">
                <a href="createreview.php">Leave a Review</a>
                <a href="userreview.php">See Your Reviews</a>
                <a href="main.php">Main Page</a>
                <a href="logout.php">Log Out</a>
            </div>
            <h1>PlayStation 5 Game Review's</h1>
            <input type="button" id="currentReviewButton" value="Load Current Reviews">
            <div class="content" id="content">
            </div>
        <?php
        } else {
        ?>
            <div class="loggFail">
                <h1>Must be logged in to access this content</h1>
                <a href="../index.html">Go back to Log in</a><br>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>