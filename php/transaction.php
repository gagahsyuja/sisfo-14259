<?php

session_start();

include_once '../conn.php';

$uname = $_SESSION['uname'];

$coin = $_POST['coin'];
$price = $_POST['price'];
$amount = $_POST['amount'];

$balance = $price * $amount;

$sql = "SELECT * FROM `wallet` WHERE `wallet_uname` = '$uname' AND `wallet_coin` = '$coin'";

$result = mysqli_query($conn, $sql);

$wallet = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) > 0)
{
    $currentBalance = $wallet['wallet_balance'];
    $balance += $currentBalance;

    $sql = "UPDATE `wallet` SET `wallet_balance` = '$balance' WHERE `wallet_uname` = '$uname' AND `wallet_coin` = '$coin'";

    mysqli_query($conn, $sql);
}

else
{
    $sql = "INSERT INTO `wallet` 
    (`wallet_uname`, `wallet_coin`, `wallet_balance`) 
    VALUES ('$uname', '$coin', '$balance')";

    mysqli_query($conn, $sql);
}

?>