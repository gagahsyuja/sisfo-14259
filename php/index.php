<?php

session_start();
include_once './conn.php';

$dbname = $_SESSION['uname'];

// function getAlgo()

$sql = "SELECT DISTINCT `coin_algo` FROM `coin`";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result))
{
    $getAlgo[] = $row;
}

// Navbar //

echo
'
    <div class="navbar">
        <div class="navbar-menu">
';

foreach ($getAlgo as $i)
{
    $algo = $i['coin_algo'];

    echo
    '
            <a href="#' . $algo . '">' . ucwords($algo) . '</a>
    ';            
}

echo
'
        </div>
    </div>
';

// End Navbar

$contents = TRUE;

foreach ($getAlgo as $algo)
{
    $algo = $algo['coin_algo'];

    if ($contents)
    {
        echo
        '
        <div id="' . $algo . '" style="height: 100px;"></div>
        <div class="contents">
        <br>
        ';
    }
    
    else
    {
        echo
        '
        <div id="' . $algo . '" style="height: 120px;"></div>
        ';
    }

    echo
    '
        <h1 class="link">' . ucwords($algo) . '</h1>
        <br><hr style="margin-left: 1.5%; margin-right: 1.5%; border: 1px solid #fabd2f;">
        <br>
        <table class="table-home">
            <tr class="table-coin-name">
    ';
    
    $sql = "SELECT * FROM `coin` WHERE `coin_algo` = '$algo'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result))
    {
        $getCoin[] = $row;
    }

    foreach ($getCoin as $coin)
    {
        $name = $coin['coin_name'];

        echo
        '
                <td><h3>' . $name . '</h3></td>
        ';
    }

    echo
    '
            </tr>
            <tr class="table-logo">
    ';

    foreach ($getCoin as $coin)
    {
        $name = $coin['coin_name'];
        $logo = $coin['coin_image'];
        $short = $coin['coin_short_name'];
        
        echo
        '
                <td><a href="./coins/' . $short . '.php"><img src="' . $logo . '" alt="image of ' . $name . '" width="18%"></a></td>
        ';
    }

    echo
    '
            </tr>
            <tr class="wish-box">
                <form action="./php/' . $algo . '.php" method="post">
    ';

    foreach ($getCoin as $coin)
    {
        $short = $coin['coin_short_name'];

        $sql = "SELECT `watchlist`.*, `coin`.`coin_id`, `coin`.`coin_short_name`
                FROM `watchlist`
                INNER JOIN `coin`
                ON `watchlist`.`watchlist_id` = `coin`.`coin_id`
                WHERE `uname` = '$dbname'
                AND `coin_short_name` = '$short'
                ";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0)
        {
            echo
            '
                        <td><button type="submit" name="submit' . ucfirst($short) . '"><i class="fa-sharp fa-solid fa-eye fa-2x"></i></button></td>
            ';
        }

        else
        {
            echo
            '
                        <td><button type="submit" name="submit' . ucfirst($short) . '"><i class="fa-regular fa-eye fa-2x"></i></button></td>
            ';
        }
    }

    echo
    '
                </form>
            </tr>
        </table>
    ';
        
    $contents = FALSE;
    unset($getCoin);
}

echo
'
    </div>
';

?>