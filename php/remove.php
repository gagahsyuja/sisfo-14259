<?php

session_start();
include '../conn.php';

$dbname = $_SESSION['uname'];

$sql = "SELECT * FROM `watchlist` WHERE `uname` = '$dbname'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result))
{
    $short = $row['coin_short_name'];
    $remove = 'remove' . ucfirst($short);

    if (isset($_POST[$remove]))
    {
        $sql = "DELETE FROM `watchlist` WHERE `uname` = '$dbname' AND `coin_short_name` = '$short'";

        if (mysqli_query($conn, $sql))
        {
            header("Location: ../watchlist.php");
        }
    }
}

?>