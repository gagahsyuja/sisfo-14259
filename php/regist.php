<?php

include_once './conn.php';

if (isset($_POST['submit']))
{
    $uname = $_POST['uname'];
    $passwd = $_POST['passwd'];
    $confirm = $_POST['confirm'];

    $passwd_hashed = password_hash($passwd, PASSWORD_ARGON2I);

    $sql = "SELECT * FROM `account` WHERE uname = '$uname'";
    $duplicate = mysqli_query($conn, $sql);

    if (mysqli_num_rows($duplicate) > 0)
    {
        echo '<style>.recommend{display: block;} .recommend-outside{display: block;}</style>';
        echo '<h2>Username <span style="color: #fabd2f;">' . $uname . '</span> has already taken</h2>';
        echo '<button onclick="closePopupNotLogin()" class="close">Close</button>';
    }
    
    elseif ($passwd != $confirm)
    {
        echo '<style>.recommend{display: block;} .recommend-outside{display: block;}</style>';
        echo '<h2><span style="color: #fabd2f;">Password does not match</span></h2>';
        echo '<button onclick="closePopupNotLogin()" class="close">Close</button>';
    }

    else
    {
        $sql = "INSERT INTO `account` (`uname`, `passwd`) VALUES ('$uname', '$passwd_hashed')";
    
        if (mysqli_query($conn, $sql))
        {
            echo '<style>.recommend{display: block;} .recommend-outside{display: block;}</style>';
            echo '<h2>User <span style="color: #fabd2f;">' . $uname . '</span> created successfully</h2>';
            echo '<button onclick="closePopup()" class="close">Login Now</button>';
        }
    }
}

?>