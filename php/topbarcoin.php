<?php

session_start();

$isLogged = FALSE;

if (isset($_SESSION['uname']))
{
    $isLogged = TRUE;
}

function user($isLogged)
{
    $notLogged = '<a class="topbar-account" href="../login.php"><button><i class="fa-solid fa-user-large"></i></button></a>';

    $logged = 
    '<a class="topbar-account" href="../account.php"><button><i class="fa-solid fa-user-large"></i> ' . $_SESSION["uname"] . '</button></a>

    <form action="" method="post">
        <a class="topbar-account" id="topbar-logout" href="#"><button name="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i></button></a>
    </form>
    ';

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
            <a href="../index.php#top"><h1>Cryptopow</h1></a>
        </li>
    </ul>
    <nav>
        <ul class="topbar-link">
            <li><a href="../about.php#top">About</a></li>
            <li><a href="../watchlist.php#top">Watchlist</a></li>
            <li><a href="../help.php#top">Help</a></li>
        </ul>
    </nav>' .
    
    user($isLogged) .

'</header>';

?>