<?php

include '../conn.php';
// $server = "localhost";
// $user = "root";
// $pass = "";
// $database = "cryptopow";

// $conn = mysqli_connect($server, $user, $pass, $database);

if (isset($_POST['submit']))
{
    $uname = $_POST['uname'];
    $passwd = $_POST['passwd'];

    $sql = "SELECT * FROM `accounts` WHERE `uname` = '$uname' AND `passwd` = '$passwd'";
    $count = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($count) > 0)
    {
        session_start();
        $_SESSION['uname'] = $uname;
        header('Location: ../index.php');
        // echo '<script>alert("Login Success")</script>';
    }
    else
    {
        // header('Location: login.php');
        echo '<script>alert("account not found")</script>';
    }
}

?>