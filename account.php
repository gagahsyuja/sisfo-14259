<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cryptopow - Account</title>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="icon" href="./img/logo.png">
        <link rel="stylesheet" href="https://use.typekit.net/vub1dne.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
    </head>
    <body>
        <!-- <div class="topbar">
            <div class="topbar-title">
                <h1 class="topbar-title"><a href="./index.html">Cryptopow</a></h1>
            </div>
            <div class="topbar-menu">
                <a href="./index.php">Home</a>
                <a href="./help.php">Help</a>
                <a href="./about.html#top">About</a>
            </div>
        </div> -->
        <?php include './php/topbar.php'; ?>
        <div class="about">
            <br><br>
            <h1><strong>Hi there, <?php session_start(); echo $_SESSION['uname']; ?></strong></h1>
            <form action="" method="post">
                <input type="submit" value="Logout" name="submit">
            </form>
            <div class="recommend-outside" id="popup">
                <div class="recommend" id="popup-1">
                    <?php include './php/logout.php' ?>
                </div>
            </div>
            <!-- <p>I use linux btw</p> -->
            <br><br>
            <div class="aboutme">
                <div class="user">
                    <i class="fa-solid fa-user"></i><p>Gagah Syuja</p>
                </div>
                <br><br>
                <div class="nim">
                    <i class="fa-solid fa-id-card-clip"></i><p>A11.2022.14259</p>
                </div>
                <br><br>
                <div class="group">
                    <i class="fa-solid fa-people-group"></i><p>A11.4107</p>
                </div>
            </div>
            <br><br>
            <div class="social">
                <a href="https://github.com/gagahsyuja" target="_blank"><i class="fa-brands fa-square-github"></i></a>
                <a href="https://instagram.com/gagahsyuja__" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>
                <a href="https://www.facebook.com/gagah.s.abdullah" target="_blank"><i class="fa-brands fa-square-facebook"></i></a>
            </div>
        </div>
        <br><br><br><br>
        <div class="botbar">
            <h1><span>&#169;2022</span>Cryptopow</h1>
            <div class="botbar-img">
                <img src="./img/logo.png" alt="logo" width="15%">
            </div>
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