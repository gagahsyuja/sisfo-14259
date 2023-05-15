<?php

$isLogged = FALSE;

if (isset($_SESSION['uname']))
{
    $isLogged = TRUE;
    $uname = $_SESSION['uname'];

    include_once './conn.php';
    
    $balance = 0;
    
    $sql = "SELECT `wallet_balance` FROM `wallet` WHERE `wallet_uname` = '$uname'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            $balance += $row['wallet_balance'];
        }
    }
}


function user($isLogged, $balance)
{   
    if ($isLogged == FALSE)
    {
        $notLogged = '<a href="./login.php"><button><i class="fa-solid fa-user-large"></i></button></a>';

        return $notLogged;
    }

    else
    {
        $logged =
        '
        <form action="" method="post">
            <a href="#"><button name="wallet"><p>Rp' . $balance . '</p></button></a>
            <a href="#"><button name="user"><i class="fa-solid fa-user-large"></i> ' . $_SESSION["uname"] . '</button></a>
            <a id="topbar-logout" href="#"><button name="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i></button></a>
        </form>
        ';

        return $logged;
    }
}

echo 
'
<script src="./js/required.js"></script>
<div class="loader">
    <img src="./img/logo.png">
</div>
<header>
    <ul class="topbar-title">
        <li>
            <a href="./index.php#top"><h1>Cryptopow</h1></a>
        </li>
    </ul>
    <nav>
        <ul class="topbar-link">
            <li><a href="./about.php#top">About</a></li>
            <li><a href="./watchlist.php#top">Watchlist</a></li>
            <li><a href="./help.php#top">Help</a></li>
        </ul>
    </nav>
    <ul class="topbar-account">
        <li>' . user($isLogged, $balance) . '</li>
    </ul>
</header>
';

?>