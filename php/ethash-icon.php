<?php

include_once './conn.php';

$dbname = $_SESSION['uname'];

$sql = "SELECT * FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '4'";

$exist = mysqli_query($conn, $sql);

if (mysqli_num_rows($exist) > 0)
{
    echo '<td><button type="submit" name="submitEtc"><i class="fa-sharp fa-solid fa-eye fa-2x"></i></button></td>';
}

else
{
    echo '<td><button type="submit" name="submitEtc"><i class="fa-regular fa-eye fa-2x"></i></button></td>';
}

$sql = "SELECT * FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '5'";
$exist = mysqli_query($conn, $sql);

if (mysqli_num_rows($exist) > 0)
{
    echo '<td><button type="submit" name="submitEthw"><i class="fa-sharp fa-solid fa-eye fa-2x"></i></button></td>';
}

else
{
    echo '<td><button type="submit" name="submitEthw"><i class="fa-regular fa-eye fa-2x"></i></button></td>';
}

$sql = "SELECT * FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '6'";
$exist = mysqli_query($conn, $sql);

if (mysqli_num_rows($exist) > 0)
{
    echo '<td><button type="submit" name="submitZil"><i class="fa-sharp fa-solid fa-eye fa-2x"></i></button></td>';
}

else
{
    echo '<td><button type="submit" name="submitZil"><i class="fa-regular fa-eye fa-2x"></i></button></td>';
}

?>