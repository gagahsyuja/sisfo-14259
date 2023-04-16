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
        $id = $row['watchlist_id'];
        $name = getName($id);
        $logo = getLogo($id);

        echo '<div class="aboutme">
        <div class="user">
            <i class="fa-solid fa-user"></i><p>' . $name . '</p>
        </div>
        <img class="about-watchlist-img" src="' . $logo . '" width="18%">
        <br><br>
        <form action="./watch/' . $del[$id - 1] . '.php" method="post">
            <input class="about-watchlist-input" type="submit" value="Remove" name="input">
        </form>
        </div>
        <br><br><br><br>';
    }
}

session_start();

if (isset($_SESSION['uname']))
{
    if (isEmpty() == FALSE)
    {
        getWatchlist();
    }
    
    else
    {
        echo '<h1>Empty</h1>';
    }
}

else
{
    echo '<h2>You have to be logged in in order to use this feature</h2>';
}


?>