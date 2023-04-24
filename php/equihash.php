<?php

session_start();

include_once '../conn.php';

$dbname = $_SESSION['uname'];

if (isset($_POST['submitAion']))
{
    $sql = "SELECT * FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '1'";
    $exist = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($exist) > 0)
    {
        $delete = "DELETE FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '1'";
        
        mysqli_query($conn, $delete);
        header("Location: ../index.php");
    }
    
    else
    {
        $add = "INSERT INTO `watchlist` (`uname`, `watchlist_id`) VALUES ('$dbname', '1')";
        
        mysqli_query($conn, $add);
        header("Location: ../index.php");
    }
}

elseif (isset($_POST['submitBtg']))
{
    $sql = "SELECT * FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '2'";
    $exist = mysqli_query($conn, $sql);
    $delete = "DELETE FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '2'";
    $add = "INSERT INTO `watchlist` (`uname`, `watchlist_id`) VALUES ('$dbname', '2')";

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

elseif (isset($_POST['submitFlux']))
{
    $sql = "SELECT * FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '3'";
    $exist = mysqli_query($conn, $sql);
    $delete = "DELETE FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '3'";
    $add = "INSERT INTO `watchlist` (`uname`, `watchlist_id`) VALUES ('$dbname', '3')";

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