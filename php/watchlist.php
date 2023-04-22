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
    $logo = $row['coin_image'];
    
    return $logo;
}

function getShort(int $fav)
{
    include './conn.php';

    $sql = "SELECT * FROM `coin` WHERE coin_id = $fav";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $short = $row['coin_short_name'];
    
    return $short;
}

function getPrice(int $fav)
{
    include './conn.php';

    $sql = "SELECT * FROM `coin` WHERE coin_id = $fav";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $price = $row['coin_price'];
    
    return $price;
}

function getRemove(int $fav)
{   
    include_once "./conn.php";
    $del = array("aionX", "btgX", "fluxX", "etcX", "ethwX", "zilX", "neoxX", "rvnX", "arlX");
    $dbname = $_SESSION['uname'];

    $sql = "DELETE FROM `watchlist` WHERE uname = $dbname AND watchlist_id = $fav";

    if (isset($_POST[$del[$fav - 1]]))
    {
        if (mysqli_query($conn, $sql))
        {
            header("Location: ./watchlist.php");
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
        $id = $row['watchlist_id'];
        $name = getName($id);
        $logo = getLogo($id);
        $short = getShort($id);
        $price = getPrice($id);

        echo '

        <div class="watchlist-outside">
            <table>
                <tr>
                    <td>
                        <img src="' . $logo . '" width="50%" alt="">
                    </td>
                    <td>
                        <a href="./coins/' . $short . '.php" target="_blank"><h2>' . $name . '</h2></a>
                    </td>
                    <td>
                        <h3>Rp<span id="'. $short . '"></span></h3>
                    </td>
                    <td>
                        <div class="watchlist-button">
                            <form action="./watch/' . $short . 'X.php" method="post">
                                <button name="submit"><i class="fa-solid fa-trash fa-2x"></i></button>
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
        $id = $row['watchlist_id'];
        $name = getName($id);
        $logo = getLogo($id);
        $short = getShort($id);
        $price = getPrice($id);

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
        getWatchlist();
        getScript();
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