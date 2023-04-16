<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cryptopow - Help</title>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="icon" href="./img/logo.png">
        <link rel="stylesheet" href="https://use.typekit.net/vub1dne.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
    </head>
    <body>
        <div class="topbar">
            <div class="topbar-title">
                <h1 class="topbar-title"><a href="./index.php">Cryptopow</a></h1>
            </div>
            <div class="topbar-menu">
                <a href="./index.php">Home</a>
                <a href="./help.php#top">Help</a>
                <a href="./about.html">About</a>
            </div>
        </div>
        <br><br><br>
        <!-- <img src="./img/banner.png" alt="banner" width=100%> -->
        <div class="vram-box">
            <div class="vram">
                <br><br><br>
                <h2>What should we call you?</h2>
                <form action="" method="post">
                    <br>
                    <input type="text" name="name" placeholder=" Your name here...">
                    <br><br><br>
                    <h2>Choose Your VRAM</h2><br>
                    <div class="vram-input">
                        <input type="radio" value="2GB" name="two">
                        <label for="two">2GB</label>
                        <input type="radio" value="4GB" name="four">
                        <label for="four">4GB</label>
                        <input type="radio" value="6GB" name="six">
                        <label for="six">6GB</label>
                        <input type="radio" value="8GB" name="eight">
                        <label for="eight">8GB</label>
                    </div>
                    <!-- <input type="text" name="text"> -->
                    <br><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
            <br><br>
			<div class="recommend-outside" id="popup-1">
				<div class="recommend" id="popup">
					<?php include './php/help.php'; ?>
				</div>
			</div>
            <br><br>
        </div>
        
        <br><br><br><br>
        <div class="botbar">
            <h1><span>&#169;2022</span>Cryptopow</h1>
            <div class="botbar-img">
                <img src="./img/logo.png" alt="logo" width="15%">
            </div>
            <div class="botbar-social">
                <a href="https://github.com/Discipl4" target="_blank"><i class="fa-brands fa-github"></i></a>
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
            }

        </script>
    </body>
</html>