<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cryptopow - Arielcoin</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="icon" href="../img/logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    </head>
    <body>
        <?php include '../php/topbarcoin.php'; ?>
        <div class="recommend-outside" id="popup">
            <div class="recommend" id="popup-1">
                <?php include '../php/logout.php'; ?>
            </div>
        </div>
        <br><br>
        <div class="box">
            <br><br>
            <h3 class="title">Arielcoin<br>(ARL)</h3>
            <h3 class="title">
                <form action="../watch/arl.php" method="post">
                    <?php

                    $id = 9;
                    include '../php/icon.php';
                    
                    ?>
                </form>
            </h3>
            <img class="image" src="../img/arl.png" alt="image of Aion" width="18%">
            <br><br>
            <table class="details">
                <tr>
                    <td class="details-link-title"><h3>Algorithm</h3></td>
                    <td class="details-link">
                        <a href="https://minerstat.com/algorithm/kawpow" target="_blank">KawPow</a>
                    </td>
                </tr>
                <tr>
                    <td class="details-link-title"><h3>Pools</h3></td>
                    <td class="details-link">
                        <a href="https://pool.arielcoin.org/" target="_blank">Ariel-Nomp</a>
                        <a href="http://arielpool.shop/" target="_blank">ArielPool</a>
                        <a href="https://newpool.pw/arl/" target="_blank">Newpool</a>
                    </td>
                </tr>
                <tr>
                    <td class="details-link-title"><h3>Miners</h3></td>
                    <td class="details-link">
                        <a href="https://github.com/develsoftware/GMinerRelease" target="_blank">GMiner</a>
                        <a href="https://github.com/NebuTech/NBMiner" target="_blank">NBMiner</a>
                        <a href="https://github.com/trexminer/T-Rex" target="_blank">T-Rex</a>
                    </td>
                </tr>
                <tr>
                    <td class="details-link-title"><h3>Price</h3></td>
                    <td class="details-link">
                        Rp<span id="" style="color: #3c3836">-</span>
                    </td>
                </tr>
            </table>
        </div>
        <br><br><br><br>
        <div class="botbar">
            <h1><span>&#169;2022</span>Cryptopow</h1>
            <div class="botbar-img">
                <img src="../img/logo.png" alt="logo" width="15%">
            </div>
            <div class="botbar-social">
                <a href="https://github.com/Discipl4" target="_blank"><i class="fa-brands fa-github"></i></a>
                <a href="https://instagram.com/gagahsyuja__" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.facebook.com/gagah.s.abdullah" target="_blank"><i class="fa-brands fa-facebook"></i></a>
            </div>
        </div>
    </body>
    <script>
		
        let popup = document.getElementById("popup");
        let popup1 = document.getElementById("popup-1");

        function closePopup()
        {
            popup.style.display = 'none';
            popup1.style.display = 'none';
            window.location = './arl.php';
        }

    </script>
</html>