<?php

session_start();

include_once '../conn.php';

if (isset($_POST['submit']))
{
    $dbname = $_SESSION["uname"];

    $sql = "INSERT INTO `$dbname` (`watchlist_id`) VALUES ('2')";
    $query = "SELECT * FROM $dbname WHERE watchlist_id = 2";
    $duplicate = mysqli_query($conn, $query);
    $remove = "DELETE FROM $dbname WHERE watchlist_id = 2";

    if (mysqli_num_rows($duplicate) > 0)
    {
        mysqli_query($conn, $remove);
        header("Location: ../coins/btg.php");
    }

    else
    {
        if (mysqli_query($conn, $sql))
        {
            // echo '<script>alert("Added to wishlist")</script>';
            header("Location: ../coins/btg.php");
        }
    }
}

?>