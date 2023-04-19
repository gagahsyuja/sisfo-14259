<?php

include_once './conn.php';

$dbname = $_SESSION['uname'];

$submit = array('submitAion', 'submitBtg', 'submitFlux', 'submitEtc', 'submitEthw', 'submitZil', 'submitNeox', 'submitRvn', 'submitArl');

for ($i = 7; $i < 10; $i++)
{
    $sql = "SELECT * FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '$i'";
    $exist = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($exist) > 0)
    {
        echo '<td><button type="submit" name="' . $submit[$i - 1] . '"><i class="fa-sharp fa-solid fa-eye fa-2x"></i></button></td>';
    }
    
    else
    {
        echo '<td><button type="submit" name="' . $submit[$i - 1] . '"><i class="fa-regular fa-eye fa-2x"></i></button></td>';
    }
}

?>