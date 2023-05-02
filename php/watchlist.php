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
    $fav .= 'idr';
    $url = 'https://indodax.com/api/ticker/' . $fav;

    $json = file_get_contents($url);
    $json = json_decode($json);

    $price = $json -> ticker -> last;

    return $price;
}

function getPercentage($fav)
{
    $today = getPrice($fav);
    $url = 'https://indodax.com/api/summaries/';

    $json = file_get_contents($url);
    $json = json_decode($json);

    $fav .= 'idr';
    $yesterday = $json -> prices_24h -> $fav;

    $percentage = $today * 100 / $yesterday;
    $percentage = number_format($percentage, 2);

    return $percentage;
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
        // $percentage = getPercentage($fav);

        echo 
        '
        <div class="watchlist-outside">
            <table>
                <tr>
                    <td class="watchlist-outside-image">
                        <img class="watchlist-image" src="' . $logo . '" width="50%" alt="">
                    </td>
                    <td>
                        <a href="./php/coin.php?coin=' . $short . '" target="_blank"><h2>' . $name . '</h2></a>
                    </td>
                    <td>
                        <h3>Rp' . $price . '<br><span id="' . $short . '"></span></h3>
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
        $coins[] = $row;
    }

    foreach ($coins as $coin)
    {
        $short = $coin['coin_short_name'];

        echo
        '
            var ' . $short . ' = document.getElementById("' . $short . '");
        ';
    }

    echo
    '
            const liveprice = {
                "async": true,
                "scroosDomain": true,
                "url": "https://indodax.com/api/summaries/",
                "method": "GET",
                "headers": {}
            }
    ';

    foreach ($coins as $coin)
    {
        $short = $coin['coin_short_name'];

        echo
        '
            $.ajax(liveprice).done(function (response) {
            
                var last = response.tickers.' . $short . '_idr.last;
                var yest = response.prices_24h.' . $short . 'idr;
                var percent = last * 100 / yest;
            
                if (percent == 100)
                {
                    percent -= 100;
                    
                    ' . $short . '.innerHTML = "<span style=\'color: #b8bb26;\'><i class=\'fa-solid fa-caret-up\'></i> " + percent.toFixed(2) + "%</span>";
                }
                else if (percent > 100)
                {
                    percent -= 100;
                    
                    ' . $short . '.innerHTML = "<span style=\'color: #b8bb26;\'><i class=\'fa-solid fa-caret-up\'></i> " + percent.toFixed(2) + "%</span>";
                }
            
                else
                {
                    percent = 100 - percent;

                    ' . $short . '.innerHTML = "<span style=\'color: #fb4934;\'><i class=\'fa-solid fa-caret-down\'></i> " + percent.toFixed(2) + "%</span>";
                }
            
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