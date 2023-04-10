<?php

session_start();

include_once '../conn.php';

if (isset($_POST['submit']))
{
    $dbname = $_SESSION["uname"];

    $sql = "INSERT INTO `$dbname` (`watchlist_id`) VALUES ('1')";
    $query = "SELECT * FROM $dbname WHERE watchlist_id = '1'";
    $duplicate = mysqli_query($conn, $query);

    if (mysqli_num_rows($duplicate) > 0)
    {
        echo '<script>alert("It\'s Already There")</script>';
    }

    else
    {
        if (mysqli_query($conn, $sql))
        {
            echo '<script>alert("Added to wishlist")</script>';
        }
    }
}

?>