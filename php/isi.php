<?php

include_once '../conn.php';
include '../Parsedown.php';

function getTitle($id)
{
    include '../conn.php';

    $sql = "SELECT `judul` FROM `ringkasan` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result))
    {
        $title = $row['judul'];
    }

    return $title;
}

if (isset($_GET['id']))
{
    $id = $_GET['id'];
    $title = getTitle($id);

    $file = file_get_contents('../markdown/' . $id . '.md');
    $parsedown = new Parsedown();

    echo
    '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cryptopow - Home</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="icon" href="../img/logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
        <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    </head>
    <body>
        <script src="../js/required.js"></script>
        <div class="loader">
            <img src="../img/logo.png">
        </div>
    ';

    include '../php/topbarcoin.php';

    echo
    '
        <br>
        <div class="box">
            <h1 class="title">
    ';

    echo $id . '. ' . $title;

    echo
    '
            </h1>
            <div class="md">
    ';

    // echo $content;

    echo $parsedown -> text($file);

    echo
    '
            </div>
        </div>
        <br><br><br><br>
        <div class="botbar">
            <h1><span>&#169;2022</span>Cryptopow</h1>
            <div class="botbar-img">
                <img src="../img/logo.png" alt="logo" width="15%">
            </div>
            <div class="botbar-social">
                <a href="https://github.com/gagahsyuja" target="_blank"><i class="fa-brands fa-github"></i></a>
                <a href="https://instagram.com/gagahsyuja__" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.facebook.com/gagah.s.abdullah" target="_blank"><i class="fa-brands fa-facebook"></i></a>
            </div>
        </div>
    </body>
    </html>
    ';
}

?>