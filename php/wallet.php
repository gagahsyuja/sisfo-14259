<?php

function isEmpty()
{
    include './conn.php';

    $dbname = $_SESSION['uname'];

    $sql = "SELECT * FROM `wallet` WHERE `wallet_uname` = '$dbname'";
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

function getBalance($fav)
{
    include './conn.php';

    $uname = $_SESSION['uname'];

    $sql = "SELECT `wallet_balance` FROM `wallet` WHERE `wallet_uname` = '$uname' AND `wallet_coin` = '$fav'";

    $result = mysqli_query($conn, $sql);

    $balance = mysqli_fetch_assoc($result);

    return $balance['wallet_balance'];
}

function getWatchlist()
{
    include './conn.php';

    $dbname = $_SESSION['uname'];
    $sql = "SELECT * FROM `wallet` WHERE `wallet_uname` = '$dbname'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result))
    {
        $fav = $row['wallet_coin'];
        $name = getName($fav);
        $logo = getLogo($fav);
        $short = getShort($fav);
        $balance = getBalance($fav);

        echo 
        '
        <div id="' . $short . '">
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
                            <h3>Rp' . $balance . '</h3>
                        <td>
                            <div class="watchlist-button">
                                <form id="form-remove">
                                    <button type="button" class="remove" coin="' . $short . '"><i class="fa-solid fa-trash fa-2x"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <br><br>
        </div>
        
        ';
    }
}

function getScript()
{
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
            var ' . $short . 'Percent = document.getElementById("' . $short . 'Percent");
            var ' . $short . 'Price = document.getElementById("' . $short . 'Price");
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

                ' . $short . 'Price.innerHTML = last;
            
                if (percent > 100)
                {
                    percent -= 100;
                    
                    ' . $short . 'Percent.innerHTML = "<span style=\'color: #b8bb26;\'><i class=\'fa-solid fa-caret-up\'></i> " + percent.toFixed(2) + "%</span>";
                }
            
                else
                {
                    percent = 100 - percent;

                    ' . $short . 'Percent.innerHTML = "<span style=\'color: #fb4934;\'><i class=\'fa-solid fa-caret-down\'></i> " + percent.toFixed(2) + "%</span>";
                }
            
            })
        ';
    }

    echo '</script>';
}

function getAjax()
{
    echo
    '
    <script>

    $(document).ready(function() {
            $(".remove").click(function() {
                var coin = $(this).attr("coin")
                $.ajax({
                    type: "post",
                    url: "./php/remove.php",
                    data: $(".form-remove").serialize() + "&coin=" + coin + "",
                    success: function() {
                        $("#" + coin + "").remove()
                    }
                })
            })
        })

    </script>
    ';
}

if (isset($_SESSION['uname']))
{
    if (isEmpty() == FALSE)
    {
        echo
        '
        <h1><strong>Wallet</strong></h1>
        <br><br>
        ';
        getWatchlist();
        getScript();
        getAjax();
    }
    
    else
    {
        echo
        '
        <h1>Wallet is Empty</h1>
        <h1>Add coin to watchlist using the <i class="fa-regular fa-eye"></i> button</h1>
        ';
    }
}

else
{
    echo '<h1>You have to be logged in in order to use this feature</h1>';
}

?>