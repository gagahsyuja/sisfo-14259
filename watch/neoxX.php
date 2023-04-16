<?php

session_start();

include_once '../conn.php';

$dbname = $_SESSION['uname'];

$sql = "DELETE FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = 7";

if (mysqli_query($conn, $sql))
{
    header('Location: ../watchlist.php');
}

?>