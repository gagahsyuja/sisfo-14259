<?php

session_start();

include_once '../conn.php';

$dbname = $_SESSION['uname'];

$sql = "DELETE FROM $dbname WHERE watchlist_id = 3";

if (mysqli_query($conn, $sql))
{
    echo '<script>alert("Removed from Watchlist")</script>';
}

?>