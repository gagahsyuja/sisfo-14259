<?php

session_start();

include_once '../conn.php';

if (isset($_POST['submit']))
{
    $dbname = $_SESSION["uname"];

    $sql = "INSERT INTO `watchlist` (`uname`, `watchlist_id`) VALUES ('$dbname', '9')";
    $query = "SELECT * FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = 9";
    $duplicate = mysqli_query($conn, $query);
    $remove = "DELETE FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = 9";

    if (mysqli_num_rows($duplicate) > 0)
    {
        mysqli_query($conn, $remove);
        header("Location: ../coins/arl.php");
    }

    else
    {
        if (mysqli_query($conn, $sql))
        {
            header("Location: ../coins/arl.php");
        }
    }
}

?>