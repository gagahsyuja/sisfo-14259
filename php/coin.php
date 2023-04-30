<?php

include '../conn.php';

function getName($name)
{
    include '../conn.php';

    $sql = "SELECT `coin_name` FROM `coin` WHERE `coin_short_name` = '$name'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result))
    {
        $name = $row['coin_name'];
    }

    return $name;
}

function getLogo($name)
{
    include '../conn.php';

    $sql = "SELECT `coin_image` FROM `coin` WHERE `coin_short_name` = '$name'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result))
    {
        $logo = $row['coin_image'];
    }

    return $logo;
}

function getAlgo($name)
{
    include '../conn.php';

    $sql = "SELECT `coin_algo` FROM `coin` WHERE `coin_short_name` = '$name'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result))
    {
        $algo = $row['coin_algo'];
    }

    return $algo;
}

function getAlgoAbout($name)
{
    include '../conn.php';

    $sql = "SELECT `algo`.*, `coin`.`coin_algo`
            FROM `algo`
            INNER JOIN `coin`
            ON `algo`.`algo_name` = `coin`.`coin_algo`
            WHERE `coin`.`coin_algo` = '$name'
            ";
    
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result))
    {
        $algo = $row['algo_about'];
    }

    return $algo;
}

function getPool($name)
{
    include '../conn.php';

    $sql = "SELECT `coin`.*, `coin-pool`.*, `pool`.*
            FROM `coin`
            INNER JOIN `coin-pool`
            ON `coin`.`coin_short_name` = `coin-pool`.`coin_short_name`
            INNER JOIN `pool`
            ON `coin-pool`.`pool_short_name` = `pool`.`pool_short_name`
            WHERE `coin`.`coin_short_name` = '$name'";

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result))
    {
        $pools[] = $row;
    }

    return $pools;
}

function getMiner($name)
{
    include '../conn.php';

    $sql = "SELECT `algo`.`algo_name`, `miner`.*
            FROM `algo`
            INNER JOIN `miner`
            ON `algo`.`algo_name` = `miner`.`miner_algo`
            WHERE `algo`.`algo_name` = '$name'
            ";
    
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result))
    {
        $miners[] = $row;
    }

    return $miners;
}

function getPrice($name)
{
    include '../conn.php';

    $sql = "SELECT `coin_price` FROM `coin` WHERE `coin_short_name` = '$name'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result))
    {
        $price = $row['coin_price'];
    }

    return $price;
}

if (isset($_GET['coin']))
{
    $short = $_GET['coin'];
    $name = getName($short);
    $logo = getLogo($short);
    $price = getPrice($short);
    $algo = getAlgo($short);
    $algoAbout = getAlgoAbout($algo);

    echo 
    '
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Cryptopow - ' . $name . '</title>
            <link rel="stylesheet" href="../css/style.css">
            <link rel="icon" href="../img/logo.png">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
            <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
        </head>
        <body>
        ';

        include "../php/topbarcoin.php";
        
        echo
        '
            <div class="recommend-outside" id="popup">
                <div class="recommend" id="popup-1">
                    <?php include "../php/logout.php"; ?>
                </div>
            </div>
            <br><br>
            <div class="box">
                <br><br>
                <h3 class="title">' . $name . '<br>(' . strtoupper($short) . ')</h3>
                <h3 class="title">
                    <form action="../watch/aion.php" method="post">
                        <?php

                        $id = 1;
                        include "../php/icon.php";
                        
                        ?>
                    </form>
                </h3>
                <img class="image" src="' . $logo . '" alt="image of ' . $name . '" width="18%">
                <br>
                <table class="details">
                    <tr>
                        <td class="details-link-title"><h3>Algorithm</h3></td>
                        <td class="details-link">
                            <a href="' . $algoAbout . '" target="_blank">' . ucwords($algo) . '</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="details-link-title"><h3>Pools</h3></td>
                        <td class="details-link">';

                        foreach (getPool($short) as $pool)
                        {
                            $site = $pool['pool_site'];
                            $name = $pool['pool_name'];

                            echo
                            '
                            <a href="' . $site . '" target="_blank">' . $name . '</a>
                            ';
                        }
        echo
        '
                        </td>
                    </tr>
                    <tr>
                        <td class="details-link-title"><h3>Miners</h3></td>
                        <td class="details-link">
        ';

                        foreach (getMiner($algo) as $miner)
                        {
                            $name = $miner['miner_name'];
                            $source = $miner['miner_source'];

                            echo
                            '
                            <a href="' . $source . '" target="_blank">' . $name . '</a>
                            ';
                        }
        echo
        '
                        </td>
                    </tr>
                    <tr>
                        <td class="details-link-title"><h3>Price</h3></td>
                        <td class="details-link">
                            Rp<span id="' . $short . '" style="color: #3c3836"></span>
                        </td>
                    </tr>
                </table>
            </div>
            <br><br><br><br>
            <div class="botbar">
                <h1><span>&#169;2022</span>Cryptopow</h1>
                <div class="botbar-img">
                    <img src="../img/logo.png" alt="logo" width="15%">
                </div>
                <div class="botbar-social">
                    <a href="https://github.com/gagahsyuja" target="_blank"><i class="fa-brands fa-github"></i></a>
                    <a href="https://instagram.com/gagahsyuja__" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.facebook.com/gagah.s.abdullah" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                </div>
            </div>
        </body>
        <script>
            
            let popup = document.getElementById("popup");
            let popup1 = document.getElementById("popup-1");

            function closePopup()
            {
                popup.style.display = "none";
                popup1.style.display = "none";
            }

        </script>
        <script>

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

        </script>
    </html>
    ';
}

?>