<?php

session_start();

if (!isset($_SESSION['uname']))
{
    echo '<a href="./login.html" style="margin-left: 0%; float: right;"><i class="fa-solid fa-user-large"></i></a>';
}

else
{
    echo '<a href="./account.php" style="margin-left: 0%; float: right; padding-top: 8px; padding-bottom: 8px;"><i class="fa-solid fa-user-large"></i> ' . $_SESSION["uname"] . '</a>';
}

?>
