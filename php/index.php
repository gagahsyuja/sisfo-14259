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
    $amount = mysqli_num_rows($result);
    
    $loop = 0;
    $even = 3;
    for (; $even < $amount; $even += 3)
    {
        if ($even < $amount)
        {
            $loop += 1;
        }

        else
        {
            break;
        }
    }

    $notEven = $even - $amount;

    while ($row = mysqli_fetch_assoc($result))
    {
        $coin[] = $row;
    }

    for ($i = 0; $i <= $loop; $i++)
    {
        $count = 3 * ($i + 1);
        $init = ($count - 3);

        for ($j = $init; $j < $count AND $j < $amount; $j++)
        {
            $name = $coin[$j]['coin_name'];

            echo
            '
                    <td><h3>' . $name . '</h3></td>
            ';
        }
        
        // Filling up the rest of the table
        // if the coin amount modulus by 3 is not equal to 0

        for ($x = 0; $x < $notEven; $x++)
        {
            if ($i == $loop)
            {
                echo
                '
                    <td></td>
                ';
            }
        }

        echo
        '
                </tr>
                <tr class="table-logo">
        ';
        
        for ($k = $init; $k < $count AND $k < $amount; $k++)
        {
            $name = $coin[$k]['coin_name'];
            $logo = $coin[$k]['coin_image'];
            $short = $coin[$k]['coin_short_name'];
            
            echo
            '
                    <form method="post" action="./php/coin.php">
                        <td><a href="#"><button class="button-home" name="' . $short . '"><img src="' . $logo . '" alt="image of ' . $name . '" width="18%"></button></a></td>
                    </form>
            ';
        }
    
        echo
        '
                </tr>
                <tr class="wish-box">
                    <form action="./php/' . $algo . '.php" method="post">
        ';
    
        for ($l = $init; $l < $count AND $l < $amount; $l++)
        {
            $short = $coin[$l]['coin_short_name'];
    
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

        if ($loop != 0 AND $i != $loop)
        echo
        '   
            <br>
            <table class="table-home">
                <tr class="table-coin-name">
        ';
    }

    $contents = FALSE;
    
    unset($coin);
}

echo
'
    </div>
';

?>