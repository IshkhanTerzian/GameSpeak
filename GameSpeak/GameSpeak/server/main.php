<?php
/**
 *  Author: Ishkhan Terziand ID#001216827
 * 
 *  Date: November 24, 2021,  2:31:13 PM
 * 
 *  Description: This is the main forum after successful entry into GameSpeak
 *               Where a valid user has access to all the contents.
 */
session_start();

// Connect to the DB
include "connect.php";

// Boolean checker to ensure proper loggin
$valid = false;

// Validating a user's userid
$userid = filter_input(INPUT_POST, "userid", FILTER_SANITIZE_SPECIAL_CHARS);

// Validating a user's password
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

// Hashing the password to be compared to the database
$pwd = password_hash($password, PASSWORD_DEFAULT);

if ($userid !== null and $password !== null) {  // Error checks
    $command = "SELECT user_id, email, username, password FROM users_table";  // Prepare and execute DB query
    
    $stmt = $dbh->prepare($command);
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        if ($userid === $row["username"] && password_verify($password, $row["password"])) {   // Comparing userid & password exist in the database
            $_SESSION["userid"] = $userid;          // Set the session to this user
            $_SESSION["userUnique"] = $row["user_id"];
            $valid = true;
        }
    }
} else if (isset($_SESSION["userid"])) {        // Checks if user already is logged in
    $valid = true;
} else {
    session_unset();
    session_destroy();          // Destroy the session
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>GameSpeak Main</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">

</head>

<body>
    <div id="main">
        <?php
        if ($valid) {
        ?>
            <div class="sidenav">
                <a href="currentreviews.php">Current Reviews</a>
                <a href="createreview.php">Leave a Review</a>
                <a href="userreview.php">See Your Reviews</a>
                <a href="changecredentials.php">Change credentials</a>
                <a href="logout.php">Log Out</a>
            </div>
            <h1>Welcome <?= $_SESSION["userid"] ?>!</h1>
            <p>Navigate GameSpeak by choosing an option!</p>
        <?php
        } else {
        ?>
            <div class="loggFail">
                <h1>No registered account with those credentials</h1>
                <a href="../index.html">Press to try again!</a><br>
                <a href="createaccount.php">Register an Account!</a>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>