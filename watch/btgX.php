<?php

session_start();

include_once '../conn.php';

$dbname = $_SESSION['uname'];

$sql = "DELETE FROM $dbname WHERE watchlist_id = 2";

if (mysqli_query($conn, $sql))
{
    header('Location: ../watchlist.php');
}

?>