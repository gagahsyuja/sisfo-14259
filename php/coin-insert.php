<?php

include_once '../conn.php';

session_start();

$name = $_SESSION['uname'];
$coin = $_POST['coin'];

$sql = "SELECT * FROM `watchlist` WHERE `uname` = '$name' AND `coin_short_name` = '$coin'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{
    $sql = "DELETE FROM `watchlist` WHERE `uname` = '$name' AND `coin_short_name` = '$coin'";
    mysqli_query($conn, $sql);
}

else
{
    $sql = "INSERT INTO `watchlist` (`coin_short_name`, `uname`) VALUES ('$coin', '$name')";
    mysqli_query($conn, $sql);
}

?>