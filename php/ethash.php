<?php

session_start();

include_once '../conn.php';

$dbname = $_SESSION['uname'];

if (isset($_POST['submitEtc']))
{
    $sql = "SELECT * FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '4'";
    $exist = mysqli_query($conn, $sql);
    $delete = "DELETE FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '4'";
    $add = "INSERT INTO `watchlist` (`uname`, `watchlist_id`) VALUES ('$dbname', '4')";

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

elseif (isset($_POST['submitEthw']))
{
    $sql = "SELECT * FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '5'";
    $exist = mysqli_query($conn, $sql);
    $delete = "DELETE FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '5'";
    $add = "INSERT INTO `watchlist` (`uname`, `watchlist_id`) VALUES ('$dbname', '5')";

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

elseif (isset($_POST['submitZil']))
{
    $sql = "SELECT * FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '6'";
    $exist = mysqli_query($conn, $sql);
    $delete = "DELETE FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '6'";
    $add = "INSERT INTO `watchlist` (`uname`, `watchlist_id`) VALUES ('$dbname', '6')";

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