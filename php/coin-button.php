<?php

include_once '../conn.php';
session_start();

$name = $_SESSION['uname'];
$coin = $_POST['coinShort'];

$sql = "SELECT * FROM `watchlist` WHERE `uname` = '$name' AND `coin_short_name` = '$coin'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{
    echo '<i class="fa-sharp fa-solid fa-eye fa-2x"></i>';
}

else
{
    echo '<i class="fa-regular fa-eye fa-2x"></i>';
}

?>