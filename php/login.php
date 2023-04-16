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
            session_start();
            $_SESSION['uname'] = $uname;
            header('Location: ./index.php');
        }

        else
        {
            // echo '<script>alert("password is incorrect")</script>';
            echo '<style>.recommend{display: block;} .recommend-outside{display: block;}</style>';
            echo '<h2>Password is Incorrect</h2>';
            echo '<button onclick="closePopup()" class="close">Close</button>';
        }
        // echo '<script>alert("Login Success")</script>';
    }
    else
    {
        // header('Location: login.php');
        // echo '<script>alert("account not found")</script>';
        echo '<style>.recommend{display: block;} .recommend-outside{display: block;}</style>';
        echo '<h2>Account not Found</h2>';
        echo '<button onclick="closePopup()" class="close">Close</button>';
    }
}

?>