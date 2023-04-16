<?php

session_start();

include_once '../conn.php';

$dbname = $_SESSION['uname'];

if (isset($_POST['submitNeox']))
{
    $sql = "SELECT * FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '7'";
    $exist = mysqli_query($conn, $sql);
    $delete = "DELETE FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '7'";
    $add = "INSERT INTO `watchlist` (`uname`, `watchlist_id`) VALUES ('$dbname', '7')";

    if (mysqli_num_rows($exist) > 0)
    {
        mysqli_query($conn, $delete);
        header("Location: ../index.php");
    }
    
    else
    {
        mysqli_query($conn, $add);
        header("Location: ../index.php");
    }
}

elseif (isset($_POST['submitRvn']))
{
    $sql = "SELECT * FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '8'";
    $exist = mysqli_query($conn, $sql);
    $delete = "DELETE FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '8'";
    $add = "INSERT INTO `watchlist` (`uname`, `watchlist_id`) VALUES ('$dbname', '8')";

    if (mysqli_num_rows($exist) > 0)
    {
        mysqli_query($conn, $delete);
        header("Location: ../index.php");
    }
    
    else
    {
        mysqli_query($conn, $add);
        header("Location: ../index.php");
    }
}

elseif (isset($_POST['submitArl']))
{
    $sql = "SELECT * FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '9'";
    $exist = mysqli_query($conn, $sql);
    $delete = "DELETE FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '9'";
    $add = "INSERT INTO `watchlist` (`uname`, `watchlist_id`) VALUES ('$dbname', '9')";

    if (mysqli_num_rows($exist) > 0)
    {
        mysqli_query($conn, $delete);
        header("Location: ../index.php");
    }
    
    else
    {
        mysqli_query($conn, $add);
        header("Location: ../index.php");
    }
}

?>