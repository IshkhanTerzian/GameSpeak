<?php

/**
 *  Author: Ishkhan Terziand ID#001216827
 * 
 *  Date: November 29, 2021, 3:35:01 PM
 * 
 *  Description: Update a user's username and password by updating
 *               their record in the database using their email as the unique
 *               identifier
 *               Passing the paramaters to changecredentials.js
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
    <script src="../js/changecredentials.js"></script>

</head>

<body>
    <div id="main">
        <?php
        if ($access) {
        ?>
            <div class="sidenav">
                <a href="currentreviews.php">Current Reviews</a>
                <a href="createreview.php">Leave a Review</a>
                <a href="userreview.php">See Your Reviews</a>
                <a href="main.php">Main Page</a>
                <a href="logout.php">Log Out</a>
            </div>
            <h1 id="topMsg">Enter your new username and password!</h1>
            <div id="changeForm">
                <label>Enter your new username <span id="nameMsg"></label>
                <input type="text" id="userid"><br>

                <label>Enter your new password <span id="pwMsg"></label>
                <input type="password" id="password"><br>

                <input type="button" id="changeButton" value="Change!">
            </div>

    </div>
<?php
        } else {
?>
    <div class="loggFail">
        <h1>Please Re-Log into GameSpeak!</h1>
        <a href="../index.html">Go back to Log in</a><br>
    </div>
<?php
        }
?>
<div class="loggOut" id="loggOut">
    <h1>You have sucessfully changed your credentials!</h1>
    <h1>Please Relog into GameSpeak</h1>

    <a href="../index.html">Log into GameSpeak</a>
</div>
</div>

</body>

</html>