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
        // if the amount of coin modulus by 3 is not equal to 0

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
                    <form method="get" action="./php/coin.php">
                        <td><button class="button-home" name="coin" value="' . $short . '"><img src="' . $logo . '" alt="image of ' . $name . '" width="18%"></button></td>
                    </form>
            ';
        }
    
        echo
        '
                </tr>
                <tr class="wish-box">
                <form class="submitForm">
        ';

        for ($l = $init; $l < $count AND $l < $amount; $l++)
        {
            $short = $coin[$l]['coin_short_name'];

            echo
            '
                    <td><button type="button" id="' . $short . 'Button"><span id="' . $short . '"></span></button></td>
            ';
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
        <br>
    </div>
    <script>
';

$sql = "SELECT `coin_short_name` FROM `coin`";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result))
{
    $short = $row['coin_short_name'];

    echo
    '
        $(document).ready(function()
        {
            var short = "' . $short . '"
            
            $("#' . $short . '").load("./php/coin-button.php",
            {
                coinShort: short
            })
    
            $("#' . $short . 'Button").on("click", function(event)
            {
                $.ajax(
                {
                    type: "post",
                    url: "./php/coin-insert.php",
                    data: $(".submitForm").serialize() + "&coin=' . $short . '",
    
                    success: function()
                    {
                        $("#' . $short . '").load("./php/coin-button.php",
                        {
                            coinShort: short
                        })
                    }
                })
            })
        })
    ';
}

echo
'
    </script>
';


?>