<?php
/**
 *  Author: Ishkhan Terziand ID#001216827
 * 
 *  Date: November 25, 2021,  8:04:23 AM
 * 
 *  Description: Loggs out the user from GameSpeak
 */
session_start();

// Boolean to check if user is already logged in
$access = isset($_SESSION["userid"]);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Logged Out</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">

</head>

<body>
    <?php
    if ($access) {
    ?>
        <div class="loggOut">
            <h1>You have logged out from GameSpeak</h1>
            <br>
            <br>
            <a href="../index.html">Log into GameSpeak</a>
        </div>
    <?php
        session_unset();
        session_destroy();
    } else {
    ?>
        <div class="loggOut">
            <h1>Account was never logged in</h1>
            <a href="../index.html">Log into GameSpeak</a>
        </div>
    <?php
    }
    ?>
</body>

</html>