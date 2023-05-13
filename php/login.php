<?php

include './conn.php';

if (isset($_POST['submit']))
{
    $uname = $_POST['uname'];
    $passwd = $_POST['passwd'];

    $sql = "SELECT * FROM `account` WHERE `uname` = '$uname'";
    $count = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($count) > 0)
    {
        $row = mysqli_fetch_assoc($count);
        $passwd_hashed = $row['passwd'];

        if (password_verify($passwd, $passwd_hashed))
        {
            $_SESSION['uname'] = $uname;
            header('Location: ./index.php');
        }

        else
        {
            echo '<style>.recommend{display: block;} .recommend-outside{display: block;}</style>';
            echo '<h2><span style="color: #fabd2f;">Incorrect Password</span></h2>';
            echo '<button onclick="closePopup()" class="close">Close</button>';
        }
    }
    else
    {
        echo '<style>.recommend{display: block;} .recommend-outside{display: block;}</style>';
        echo '<h2><span style="color: #fabd2f;">Account not Found</span></h2>';
        echo '<button onclick="closePopup()" class="close">Close</button>';
    }
}

?>