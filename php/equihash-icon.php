<?php

include_once './conn.php';

$dbname = $_SESSION['uname'];

$sql = "SELECT * FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '1'";

$exist = mysqli_query($conn, $sql);

if (mysqli_num_rows($exist) > 0)
{
    echo '<td><button type="submit" name="submitAion"><i class="fa-sharp fa-solid fa-eye fa-2x"></i></button></td>';
}

else
{
    echo '<td><button type="submit" name="submitAion"><i class="fa-regular fa-eye fa-2x"></i></button></td>';
}

$sql = "SELECT * FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '2'";
$exist = mysqli_query($conn, $sql);

if (mysqli_num_rows($exist) > 0)
{
    echo '<td><button type="submit" name="submitBtg"><i class="fa-sharp fa-solid fa-eye fa-2x"></i></button></td>';
}

else
{
    echo '<td><button type="submit" name="submitBtg"><i class="fa-regular fa-eye fa-2x"></i></button></td>';
}

$sql = "SELECT * FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '3'";
$exist = mysqli_query($conn, $sql);

if (mysqli_num_rows($exist) > 0)
{
    echo '<td><button type="submit" name="submitFlux"><i class="fa-sharp fa-solid fa-eye fa-2x"></i></button></td>';
}

else
{
    echo '<td><button type="submit" name="submitFlux"><i class="fa-regular fa-eye fa-2x"></i></button></td>';
}

?>