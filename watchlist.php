<?php

session_start();

include_once './conn.php';

$dbname = $_SESSION['uname'];

$sql = "SELECT * FROM $dbname";

$result = mysqli_query($conn, $sql);

$check = mysqli_num_rows($result);

function getAllWatchlist($fav)
{
    switch ($fav)
    {
        case 1:
            echo '<p>Aion</p>';
            break;
            
        case 2:
            echo '<p>Bitcoin Gold</p';
            break;
        
        case 3:
            echo '<p>FLUX</p>';
            break;
    }
}

if ($check > 0)
{
    while ($row = mysqli_fetch_assoc($result))
    {
        $fav = $row['watchlist_id'];
        getAllWatchlist($fav);
    }
}

?>