<?php

session_start();

include_once '../conn.php';

if (isset($_POST['submit']))
{
    $dbname = $_SESSION["uname"];

    $sql = "INSERT INTO `watchlist` (`uname`, `watchlist_id`) VALUES ('$dbname', '4')";
    $query = "SELECT * FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = 4";
    $duplicate = mysqli_query($conn, $query);
    $remove = "DELETE FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = 4";

    if (mysqli_num_rows($duplicate) > 0)
    {
        mysqli_query($conn, $remove);
        header("Location: ../coins/etc.php");
    }

    else
    {
        if (mysqli_query($conn, $sql))
        {
            header("Location: ../coins/etc.php");
        }
    }
}

?>