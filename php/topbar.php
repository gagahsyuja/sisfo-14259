<?php

$isLogged = FALSE;

if (isset($_SESSION['uname']))
{
    $isLogged = TRUE;
}

function user($isLogged)
{
    $notLogged = '<a class="topbar-account" href="./login.php"><button><i class="fa-solid fa-user-large"></i></button></a>';

    $logged = '<a class="topbar-account" href="./account.php"><button><i class="fa-solid fa-user-large"></i> ' . $_SESSION["uname"] . '</button></a>';

    if ($isLogged == FALSE)
    {
        return $notLogged;
    }

    else
    {
        return $logged;
    }
}

echo '

<header>
    <ul class="topbar-title">
        <li>
            <a href="./index.php"><h1>Cryptopow</h1></a>
        </li>
    </ul>
    <nav>
        <ul class="topbar-link">
            <li><a href="./about.php">About</a></li>
            <li><a href="./watchlist.php">Watchlist</a></li>
            <li><a href="./help.php">Help</a></li>
        </ul>
    </nav>' .
    
    user($isLogged) .

'</header>';

?>