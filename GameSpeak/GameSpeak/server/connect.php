<?php
/**
 *  Author: Ishkhan Terziand ID#001216827
 * 
 *  Date: November 24, 2021, 1:11:38 PM
 * 
 *  Description: Connecting to the database
 */
try {
    $dbh = new PDO(
        "mysql:host=localhost;dbname=",
        "root",
        ""
    );
} catch (Exception $e) {
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}
