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

function getName($fav)
{
    include './conn.php';

    $sql = "SELECT * FROM `coin` WHERE `coin_short_name` = '$fav'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['coin_name'];
    
    return $name;
}

function getLogo($fav)
{
    include './conn.php';

    $sql = "SELECT * FROM `coin` WHERE `coin_short_name` = '$fav'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $logo = $row['coin_image'];
    
    return $logo;
}

function getShort($fav)
{
    include './conn.php';

    $sql = "SELECT * FROM `coin` WHERE `coin_short_name` = '$fav'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $short = $row['coin_short_name'];
    
    return $short;
}

function getPrice($fav)
{
    include './conn.php';

    $sql = "SELECT * FROM `coin` WHERE `coin_short_name` = '$fav'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $price = $row['coin_price'];
    
    return $price;
}

function getRemove()
{
    session_start();
    include './conn.php';

    $dbname = $_SESSION['uname'];

    $sql = "SELECT * FROM `watchlist` WHERE `uname` = '$dbname'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result))
    {
        $short = $row['coin_short_name'];
        $remove = 'remove' . ucfirst($short);

        if (isset($_POST[$remove]))
        {
            $sql = "DELETE FROM `watchlist` WHERE `uname` = '$dbname' AND `coin_short_name` = '$short'";

            if (mysqli_query($conn, $sql))
            {
                header("Location: ./watchlist.php");
            }
        }
    }
}

function getWatchlist()
{
    session_start();

    include './conn.php';

    $dbname = $_SESSION['uname'];
    $sql = "SELECT * FROM `watchlist` WHERE `uname` = '$dbname'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result))
    {
        $fav = $row['coin_short_name'];
        $name = getName($fav);
        $logo = getLogo($fav);
        $short = getShort($fav);
        $price = getPrice($fav);

        echo 
        '
        <div class="watchlist-outside">
            <table>
                <tr>
                    <td class="watchlist-outside-image">
                        <img class="watchlist-image" src="' . $logo . '" width="50%" alt="">
                    </td>
                    <td>
                        <a href="./coins/' . $short . '.php" target="_blank"><h2>' . $name . '</h2></a>
                    </td>
                    <td>
                        <h3>Rp<span id="'. $short . '"></span></h3>
                    </td>
                    <td>
                        <div class="watchlist-button">
                            <form action="./php/remove.php" method="post">
                                <button name="remove' . ucfirst($short) . '"><i class="fa-solid fa-trash fa-2x"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <br><br>
        
        ';
    }
}

function getScript()
{
    session_start();

    include './conn.php';

    $dbname = $_SESSION['uname'];
    $sql = "SELECT * FROM `watchlist` WHERE `uname` = '$dbname'";
    $result = mysqli_query($conn, $sql);

    echo '<script>';

    while ($row = mysqli_fetch_assoc($result))
    {
        $fav = $row['coin_short_name'];
        $name = getName($fav);
        $logo = getLogo($fav);
        $short = getShort($fav);
        $price = getPrice($fav);

        echo '

            var ' . $short . ' = document.getElementById("' . $short . '");

            var ' . $short . 'Price = {
                "async": true,
                "scroosDomain": true,
                "url": "' . $price . '",
                "method": "GET",
                "headers": {}
            }
            
            $.ajax(' . $short . 'Price).done(function (response) {
                console.log(response);
            
                ' . $short . '.innerHTML = response.ticker.buy;
            })

        ';
    }

    echo '</script';
}

session_start();

if (isset($_SESSION['uname']))
{
    if (isEmpty() == FALSE)
    {
        echo
        '
        <h1><strong>Watchlist</strong></h1>
        <br><br>
        ';
        getWatchlist();
        getScript();
        // getRemove();
    }
    
    else
    {
        echo
        '
        <h1>Watchlist is Empty</h1>
        <h1>Add coin to watchlist using the <i class="fa-regular fa-eye"></i> button</h1>
        ';
    }
}

else
{
    echo '<h1>You have to be logged in in order to use this feature</h1>';
}

?>