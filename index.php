<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cryptopow - Home</title>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="icon" href="./img/logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
        <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    </head>
    <body>
        <?php include './php/topbar.php'; ?>
        <br>
        <!-- <img src="./img/banner.png" alt="banner" width="100%"> -->
        <?php include './php/index.php'; ?>
    <br><br><br><br>
    <div class="botbar">
        <h1><span>&#169;2024</span><i>SISFO<span style="font-size: 20px; padding-left: 2px">14259</span></i></h1>
        <!-- <div class="botbar-img">
            <img src="./img/logo.png" alt="logo" width="15%">
        </div> -->
        <div class="botbar-social">
            <a href="https://github.com/gagahsyuja" target="_blank"><i class="fa-brands fa-github"></i></a>
            <a href="https://instagram.com/gagahsyuja__" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://www.facebook.com/gagah.s.abdullah" target="_blank"><i class="fa-brands fa-facebook"></i></a>
        </div>
    </div>
    <script>
		
        let popup = document.getElementById("popup");
        let popup1 = document.getElementById("popup-1");

        function closePopup()
        {
            popup.style.display = 'none';
            popup1.style.display = 'none';
            window.location = './index.php';
        }

    </script>
    </body>
</html>