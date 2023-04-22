<?php

session_start();

include './conn.php';

$name = $_SESSION['uname'];

if (isset($_POST['change']))
{
    // $uname = $_POST['uname'];
    $passwd = $_POST['passwd'];
    $confirm = $_POST['confirm'];
    $passwd_hashed = password_hash($passwd, PASSWORD_ARGON2I);

    if ($passwd != $confirm)
    {
        echo '<style>.recommend{display: block;} .recommend-outside{display: block;}</style>';
        echo '<h2><span style="color: #fabd2f;">Password Does Not Match</span></h2>';
        echo '<button onclick="closePopupOnly()" class="close">Close</button>';
    }

    else
    {
        $sql = "UPDATE `account` SET `passwd` = '$passwd_hashed' WHERE `uname` = '$name'";
        if (mysqli_query($conn, $sql))
        {
            session_destroy();

            echo '<style>.recommend{display: block;} .recommend-outside{display: block;}</style>';
            echo '<h2><span style="color: #fabd2f;">Password Changed Successfully.</span></h2>';
            echo '<h2><span style="color: #fabd2f;">Now You Need to Log Back In</span></h2>';
            echo '<button onclick="closePopupLogin()" class="close">Login</button>';
        }
    }

}

?>