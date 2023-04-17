<?php

if (!isset($_SESSION['uname']))
{
    echo '<a class="topbar-account" href="./login.php"><button><i class="fa-solid fa-user-large"></i></button></a>';
}

else
{
    echo '<a class="topbar-account" href="./account.php"><button><i class="fa-solid fa-user-large"></i></button> ' . $_SESSION["uname"] . '</a>';
}

?>
