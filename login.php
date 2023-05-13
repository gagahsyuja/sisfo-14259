<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cryptopow - Login</title>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="icon" href="./img/logo.png">
        <link rel="stylesheet" href="https://use.typekit.net/vub1dne.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
    </head>
    <body>
        <!-- <div class="topbar">
            <div class="topbar-title">
                <h1 class="topbar-title"><a href="./index.php">Cryptopow</a></h1>
            </div>
            <div class="topbar-menu">
                <a href="./index.php">Home</a>
                <a href="./help.php">Help</a>
                <a href="./about.html#top">About</a>
            </div>
        </div> -->
        <?php include './php/topbar.php'; ?>
        <br><br><br>
        <div class="login-box">
            <div class="login">
                <br>
                <form action="" method="POST">
                    <label for="uname">Username</label><br>
                    <input type="text" name="uname"><br><br>
                    <label for="passwd">Password</label><br>
                    <input type="password" name="passwd"><br><br>
                    <input type="submit" value="Login" name="submit"><br><br>
                    <a href="./regist.php">Create an Account</a>
                </form>
                <div class="recommend-outside" id="popup">
                    <div class="recommend" id="popup-1">
                        <?php include './php/login.php'; ?>
                    </div>
                </div>
                <br><br>
            </div>
        </div>
        <br><br><br><br>
        <div class="botbar">
            <h1><span>&#169;2023</span>Cryptopow</h1>
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