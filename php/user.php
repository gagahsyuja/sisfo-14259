<?php

session_start();

if (!isset($_SESSION['uname']))
{
    echo '<a href="./login.html"><i class="fa-solid fa-user-large"></i></a>';
}

else
{
    echo '<a href="./account.php"><i class="fa-solid fa-user-large"></i> ' . $_SESSION["uname"] . '</a>';
}

?>
