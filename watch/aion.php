<?php

session_start();

include_once '../conn.php';

$dbname = $_SESSION['uname'];

$sql = "SELECT * FROM $dbname WHERE watchlist_id = '1'";
$exist = mysqli_query($conn, $sql);

if (mysqli_num_rows($exist) > 0)
{
    echo '
    <td><button type="submit" name="submitAion"><i class="fa-regular fa-eye fa-2x"></i></button></td>
    <td><button type="submit" name="submitBtg"><i class="fa-regular fa-eye fa-2x"></i></button></td>
    <td><button type="submit" name="submitFlux"><i class="fa-regular fa-eye fa-2x"></i></button></td>';
    
}

else
{
    
    echo '
    <td><button type="submit" name="submitAion"><i class="fa-regular fa-eye fa-2x"></i></button></td>
    <td><button type="submit" name="submitBtg"><i class="fa-regular fa-eye fa-2x"></i></button></td>
    <td><button type="submit" name="submitFlux"><i class="fa-regular fa-eye fa-2x"></i></button></td>';
}

?>