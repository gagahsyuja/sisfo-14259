<?php

$isLogged = FALSE;

if (isset($_SESSION['uname']))
{
    $isLogged = TRUE;
}

function user($isLogged)
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
        <li>' . user($isLogged) . '</li>
    </ul>
</header>
';

?>