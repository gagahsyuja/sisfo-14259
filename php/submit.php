<?php

session_start();

include_once '../conn.php';

$dbname = $_SESSION['uname'];

if (isset($_POST['submitIndex']))
{
    $short = $_POST['submitIndex'];

    $sql = "SELECT * FROM `watchlist` WHERE `uname` = '$dbname' AND `coin_short_name` = '$short'";
    $exist = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($exist) > 0)
    {
        $delete = "DELETE FROM `watchlist` WHERE `uname` = '$dbname' AND `coin_short_name` = '$short'";
        
        mysqli_query($conn, $delete);
        // header("Location: ../index.php");

        echo '<script>window.location = "../index.php"</script>';
    }
    
    else
    {
        $add = "INSERT INTO `watchlist` (`uname`, `coin_short_name`) VALUES ('$dbname', '$short')";
        
        mysqli_query($conn, $add);
        // header("Location: ../index.php");

        echo '<script>window.location = "../index.php"</script>';
    }
}

if (isset($_POST['submitCoin']))
{
    $short = $_POST['submitCoin'];

    $sql = "SELECT * FROM `watchlist` WHERE `uname` = '$dbname' AND `coin_short_name` = '$short'";
    $exist = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($exist) > 0)
    {
        $delete = "DELETE FROM `watchlist` WHERE `uname` = '$dbname' AND `coin_short_name` = '$short'";
        
        mysqli_query($conn, $delete);
        // header("Location: ../index.php");

        echo '<script>window.location = "./coin.php?coin=' . $short . '"</script>';
    }
    
    else
    {
        $add = "INSERT INTO `watchlist` (`uname`, `coin_short_name`) VALUES ('$dbname', '$short')";
        
        mysqli_query($conn, $add);
        // header("Location: ../index.php");

        echo '<script>window.location = "./coin.php?coin=' . $short . '"</script>';
    }
}

?>