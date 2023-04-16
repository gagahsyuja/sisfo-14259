<?php

function isEmpty()
{
    session_start();
    include './conn.php';

    $dbname = $_SESSION['uname'];

    $sql = "SELECT * FROM `watchlist` WHERE `uname` = '$dbname'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0)
    {
        return FALSE;
    }

    else
    {
        return TRUE;
    }
}

function getName(int $fav)
{
    include './conn.php';

    $sql = "SELECT * FROM `coin` WHERE coin_id = $fav";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['coin_name'];
    
    return $name;
}

function getLogo(int $fav)
{
    include './conn.php';

    $sql = "SELECT * FROM `coin` WHERE coin_id = $fav";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['coin_image'];
    
    return $name;
}

function getWatchlist()
{
    session_start();

    include './conn.php';

    $dbname = $_SESSION['uname'];
    $sql = "SELECT * FROM `watchlist` WHERE `uname` = '$dbname'";
    $result = mysqli_query($conn, $sql);

    $del = array('aionX', 'btgX', 'fluxX', 'etcX', 'ethwX', 'zilX', 'neoxX', 'rvnX', 'arlX');

    while ($row = mysqli_fetch_assoc($result))
    {
        $watch = $row['watchlist_id'];
        $name = getName($watch);
        $logo = getLogo($watch);

        echo '<div class="aboutme">
        <div class="user">
            <i class="fa-solid fa-user"></i><p>' . $name . '</p>
        </div>
        <img src="' . $logo . '" width="18%">
        <form action="./watch/' . $del[$watch - 1] . '.php" method="post">
            <input type="submit" value="Remove" name="input">
        </form>
        </div>';
    }
}

if (isEmpty() == FALSE)
{
    getWatchlist();
}

else
{
    echo '<h1>Empty</h1>';
}

?>