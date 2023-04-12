<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "cryptopow";

$conn = mysqli_connect($server, $user, $pass, $database);

if (isset($_POST['submit']))
{
    $uname = $_POST['uname'];
    $passwd = $_POST['passwd'];
    $confirm = $_POST['confirm'];

    $passwd_hashed = password_hash($passwd, PASSWORD_ARGON2I);

    $sql = "INSERT INTO `accounts` (`uname`, `passwd`) VALUES ('$uname', '$passwd_hashed')";
    $watch = "CREATE TABLE `cryptopow`.`$uname` (`watchlist_id` INT NOT NULL ) ENGINE = InnoDB;";
    $query = "SELECT * FROM accounts WHERE uname = '$uname'";
    $duplicate = mysqli_query($conn, $query);

    if (mysqli_num_rows($duplicate) > 0)
    {
        echo "<script>alert('Username has already taken')</script>";
    }

    elseif ($passwd != $confirm)
    {
        echo "<script>alert('Password does not match')</script>";
    }

    else
    {
        if (mysqli_query($conn, $sql) && mysqli_query($conn, $watch))
        {
            header('Location: ../login.html');
            echo "<script>alert('Register Success')</script>";
        }
    }
}

?>