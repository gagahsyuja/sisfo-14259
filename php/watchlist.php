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
            echo '<div class="aboutme">
                <div class="user">
                    <i class="fa-solid fa-user"></i><p>Aion</p>
                </div>
                </div>
                <form action="./watch/aionX.php" method="post">
                    <input type="submit" value="Remove" name="input">
                </form>';
            break;
            
        case 2:
            echo '<div class="aboutme">
                <div class="user">
                    <i class="fa-solid fa-user"></i><p>Bitcoin Gold</p>
                </div>
                </div>
                <form action="./watch/btgX.php" method="post">
                    <input type="submit" value="Remove" name="input">
                </form>';
            break;
        
        case 3:
            echo '<div class="aboutme">
                <div class="user">
                    <i class="fa-solid fa-user"></i><p>Flux</p>
                </div>
                </div>
                <form action="./watch/fluxX.php" method="post">
                    <input type="submit" value="Remove" name="input">
                </form>';
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