<?php

session_start();

include_once '../conn.php';

$dbname = $_SESSION['uname'];

$sql = "SELECT * FROM $dbname WHERE watchlist_id = '3'";
$exist = mysqli_query($conn, $sql);

if (mysqli_num_rows($exist) > 0)
{
    echo '<br><button type="submit" name="submit"><i class="fa-sharp fa-solid fa-eye fa-2x"></i></button>';
}

else
{
    echo '<br><button type="submit" name="submit"><i class="fa-sharp fa-regular fa-eye fa-2x"></i></button>';
}

?>