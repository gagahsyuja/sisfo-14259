<?php

session_start();

include_once '../conn.php';

$dbname = $_SESSION['uname'];

$sql = "DELETE FROM $dbname WHERE watchlist_id = 1";

if (mysqli_query($conn, $sql))
{
    header("Location: ./aionX.php");
}

?>