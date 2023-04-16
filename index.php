<?php session_start() ?>
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
    </head>
    <body>
        <div class="topbar">
            <div class="topbar-title">
                <h1><a href="./index.php#top">Cryptopow</a></h1>
            </div>
            <div class="topbar-menu">
                <!-- <a href="./index.php#top"><i class="fa-solid fa-house"></i></a> -->
                <a href="./about.html">About</a>
                <a href="./help.php">Help</a>
                <a href="./watchlist.php">Watchlist</a>
                <?php include './php/user.php'; ?>
            </div>
        </div>
        <img src="./img/banner.png" alt="banner" width="100%">
        <div class="navbar">
            <div class="navbar-menu">
                <a href="#equihash">Equihash</a>
                <a href="#ethash">Ethash</a>
                <a href="#kawpow">KawPow</a>
            </div>
        </div>
        <div id="equihash" style="height: 100px;"></div>
        <div class="contents">
        <br>
        <h1 class="link">Equihash</h1>
        <br><hr style="margin-left: 1.5%; margin-right: 1.5%; border: 1px solid #fabd2f;">
        <br>
        <table class="table-home">
            <tr class="table-coin-name">
                <td><h3>Aion</h3></td>
                <td><h3>Bitcoin Gold</h3></td>
                <td><h3>Flux</h3></td>
            </tr>
            <tr class="table-logo">
                <!-- AION -->
                <td><a href="./coins/aion.php"><img src="https://cryptologos.cc/logos/aion-aion-logo.png?v=023" alt="image of Aion" width="18%"></a></td>
                <!-- BTG -->
                <td><a href="./coins/btg.php"><img src="https://cryptologos.cc/logos/bitcoin-gold-btg-logo.png?v=023" alt="image of Bitcoin Gold" width="18%"></a></td>
                <!-- FLUX -->
                <td><a href="./coins/flux.php"><img src="https://cryptologos.cc/logos/zel-flux-logo.png?v=023" alt="image of Flux" width="18%"></a></td>
            </tr>
            <tr class="wish-box">
                <form action="./php/equihash.php" method="post">
                    <?php include './php/equihash-icon.php'; ?>
                </form>
            </tr>
        </table>
        <div id="ethash" style="height: 120px;"></div>
        <h1 class="link">Ethash</h1>
        <br><hr style="margin-left: 1.7%; margin-right: 1.7%; border: 1px solid #fabd2f;">
        <br>
        <table class="table-home">
            <tr class="table-coin-name">
                <td><h3>Ethereum Classic</h3></td>
                <td><h3>EthereumPoW</h3></td>
                <td><h3>Zilliqa</h3></td>
            </tr>
            <tr class="table-logo">
                <!-- ETC -->
                <td><a href="./coins/etc.php"><img src="https://cryptologos.cc/logos/ethereum-classic-etc-logo.png?v=023" alt="image of Ethereum Classic" width="18%"></a></td>
                <!-- ETHPOW -->
                <td><a href="./coins/ethw.php"><img src="https://s2.coinmarketcap.com/static/img/coins/200x200/21296.png" alt="image of EthereumPoW" width="18%"></a></td>
                <!-- ZIL -->
                <td><a href="./coins/zil.php"><img src="https://cryptologos.cc/logos/zilliqa-zil-logo.png?v=023" alt="image of Zilliqa" width="18%"></a></td>
            </tr>
            <tr class="wish-box">
                <form action="./php/ethash.php" method="post">
                    <?php include './php/ethash-icon.php'; ?>
                </form>
            </tr>
        </table>
        <div id="kawpow" style="height: 120px;"></div>
        <h1 class="link">KawPow</h1>
        <br><hr style="margin-left: 1.7%; margin-right: 1.7%; border: 1px solid #fabd2f;">
        <br>
        <table class="table-home">
            <tr class="table-coin-name">
                <td><h3>Neoxa</h3></td>
                <td><h3>Ravencoin</h3></td>
                <td><h3>Arielcoin</h3></td>
            </tr>
            <tr class="table-logo">
                <!-- NEOX -->
                <td><a href="./coins/neox.php"><img src="https://neoxa.net/wp-content/uploads/2022/10/Neoxa_Logo_1080p-1.png" alt="image of Neoxa" width="18%"></a></td>
                <!-- RVN -->
                <td><a href="./coins/rvn.php"><img src="https://cryptologos.cc/logos/ravencoin-rvn-logo.png?v=023" alt="image of Ravencoin" width="18%"></a></td>
                <!-- ARL -->
                <td><a href="./coins/arl.php"><img src="./img/arl.png" alt="image of Arielcoin" width="18%"></a></td>
            </tr>
            <tr class="wish-box">
                <form action="./php/kawpow.php" method="post">
                    <?php include './php/kawpow-icon.php'; ?>
                </form>
            </tr>
        </table>
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
    </body>
</html>