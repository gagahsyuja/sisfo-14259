<?php

include_once './conn.php';

$dbname = $_SESSION['uname'];

$sql = "SELECT * FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '7'";

$exist = mysqli_query($conn, $sql);

if (mysqli_num_rows($exist) > 0)
{
    echo '<td><button type="submit" name="submitNeox"><i class="fa-sharp fa-solid fa-eye fa-2x"></i></button></td>';
}

else
{
    echo '<td><button type="submit" name="submitNeox"><i class="fa-regular fa-eye fa-2x"></i></button></td>';
}

$sql = "SELECT * FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '8'";
$exist = mysqli_query($conn, $sql);

if (mysqli_num_rows($exist) > 0)
{
    echo '<td><button type="submit" name="submitRvn"><i class="fa-sharp fa-solid fa-eye fa-2x"></i></button></td>';
}

else
{
    echo '<td><button type="submit" name="submitRvn"><i class="fa-regular fa-eye fa-2x"></i></button></td>';
}

$sql = "SELECT * FROM `watchlist` WHERE uname = '$dbname' AND watchlist_id = '9'";
$exist = mysqli_query($conn, $sql);

if (mysqli_num_rows($exist) > 0)
{
    echo '<td><button type="submit" name="submitArl"><i class="fa-sharp fa-solid fa-eye fa-2x"></i></button></td>';
}

else
{
    echo '<td><button type="submit" name="submitArl"><i class="fa-regular fa-eye fa-2x"></i></button></td>';
}

?>