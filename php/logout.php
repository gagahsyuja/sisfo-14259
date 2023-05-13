<?php

if (isset($_POST['logout']))
{
    session_destroy();

    echo '<style>.recommend{display: block;} .recommend-outside{display: block;}</style>';
    echo '<h2><span style="color: #fabd2f;">Logged Out Successfully</span></h2>';
    echo '<button onclick="closePopup()" class="close">Close</button>';
}

if (isset($_POST['user']))
{
    header("Location: ./account.php");
}

if (isset($_POST['coin']))
{
    header("Location: ../account.php");
}

?>