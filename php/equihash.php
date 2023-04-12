<?php

session_start();

include_once '../conn.php';

if (isset($_POST['submitAion']))
{
    $sql = "SELECT * FROM $dbname WHERE watchlist_id = '1'";
    $exist = mysqli_query($conn, $sql);
    $delete = "DELETE FROM $dbname WHERE watchlist_id = '1'";
    $add = "INSERT INTO `$dbname` (`watchlist_id`) VALUES ('1')";

    if (mysqli_num_rows($exist) > 0)
    {
        mysqli_query($conn, $delete);
    }
    
    else
    {

    }
}

?>