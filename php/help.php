<?php

if (isset($_POST['two']))
{
	$name = $_POST['name'];
    $vram = $_POST['two'];

	echo '<style>.recommend{display: block;} .recommend-outside{display: block;}</style>';
    echo '<h2>Hi <span style="color: #fabd2f;">' . $name . '</span>,</h2>';
    echo '<h2>With <span style="color: #fabd2f;">' . $vram . '</span> VRAM of yours,</h2>';
    echo '<h2>We recommend you <a href="./index.php#equihash" target="_blank">Equihash</a></h2>';

    echo '<button onclick="closePopup()" class="close">Close</button>';
}

if (isset($_POST['four']))
{
	$name = $_POST['name'];
    $vram = $_POST['four'];

    echo '<h2>Hi <span style="color: #fabd2f;">' . $name . '</span>,</h2>';
    echo '<h2>With <span style="color: #fabd2f;">' . $vram . '</span> VRAM of yours,</h2>';
    echo '<h2>We recommend you <a href="./index.php#equihash" target="_blank">Equihash</a> or <a href="./index.php#kawpow" target="_blank">KawPow</a></h2>';

    echo '<button onclick="closePopup()" class="close">Close</button>';
	echo '<style>.recommend{display: block;} .recommend-outside{display: block;}</style>';
}

if (isset($_POST['six']))
{
	$name = $_POST['name'];
    $vram = $_POST['six'];

    echo '<h2>Hi <span style="color: #fabd2f;">' . $name . '</span>,</h2>';
    echo '<h2>With <span style="color: #fabd2f;">' . $vram . '</span> VRAM of yours,</h2>';
    echo '<h2>We recommend you <a href="./index.php#kawpow" target="_blank">KawPow</a> or <a href="./index.php#ethash" target="_blank">Ethash</a></h2>';

    echo '<button onclick="closePopup()" class="close">Close</button>';
	echo '<style>.recommend{display: block;} .recommend-outside{display: block;}</style>';
}

if (isset($_POST['eight']))
{
	$name = $_POST['name'];
    $vram = $_POST['eight'];

    echo '<h2>Hi <span style="color: #fabd2f;">' . $name . '</span>,</h2>';
    echo '<h2>With <span style="color: #fabd2f;">' . $vram . '</span> VRAM of yours,</h2>';
    echo '<h2>We recommend you <a href="./index.php#ethash" target="_blank">Ethash</a></h2>';

    echo '<button onclick="closePopup()" class="close">Close</button>';
	echo '<style>.recommend{display: block;} .recommend-outside{display: block;}</style>';
}

?>