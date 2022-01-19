<?php
/**
 *  Author: Ishkhan Terziand ID#001216827
 * 
 *  Date: November 24, 2021,   3:20:43 PM
 * 
 *  Description: Holds the HTML content for the user's review page
 *               Implements getuserreviews.js
 */
session_start();

// Boolean to check if user is already logged in
$access = isset($_SESSION["userid"]);

?>
<!DOCTYPE html>
<html>

<head>
    <title>GameSpeak Main</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/getuserreviews.js"></script>

</head>

<body>
    <div id="main">
        <?php
        if ($access) {
        ?>
            <div class="sidenav">
                <a href="currentreviews.php">Current Reviews</a>
                <a href="createreview.php">Leave a Review</a>
                <a href="main.php">Main Page</a>
                <a href="changecredentials.php">Change credentials</a>
                <a href="logout.php">Log Out</a>
            </div>
            <h1>Your Review's <?= $_SESSION["userid"] ?></h1>
            <input type="button" id="getReviews" value="Click here to see your Reviews">
            <div class="content" id="content">

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