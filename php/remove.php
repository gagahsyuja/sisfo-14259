<?php

include_once '../conn.php';

session_start();

$name = $_SESSION['uname'];
$coin = $_POST['coin'];

$sql = "DELETE FROM `watchlist` WHERE `uname` = '$name' AND `coin_short_name` = '$coin'";

mysqli_query($conn, $sql);

?>