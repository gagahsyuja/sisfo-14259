<?php

if (isset($_POST['logout']))
{
    session_start();
    session_destroy();

    // header("Location: ../index.php");
    echo '<style>.recommend{display: block;} .recommend-outside{display: block;}</style>';
    echo '<h2><span style="color: #fabd2f;">Logged Out Successfully</span></h2>';
    echo '<button onclick="closePopup()" class="close">Close</button>';
}

?>