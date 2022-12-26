<?php

$name = $_POST['name'];

if (isset($_POST['two']))
{
    $vram = $_POST['two'];

    echo '<h2>Hi ' . $name . ',</h2>';
    echo '<h2>With ' . $vram . ' VRAM of yours,</h2>';
    echo '<h2>I recommend you <a href="./index.html#equihash">Equihash</a></h2>';

    echo '<button onclick="closePopup()" class="close">Close</button>';
}

if (isset($_POST['four']))
{
    $vram = $_POST['four'];

    echo '<h2>Hi ' . $name . ',</h2>';
    echo '<h2>With ' . $vram . ' VRAM of yours,</h2>';
    echo '<h2>I recommend you <a href="./index.html#equihash">Equihash</a>, <a href="./index.html#kawpow">KawPow</a></h2>';

    echo '<button onclick="closePopup()" class="close">Close</button>';
}

if (isset($_POST['six']))
{
    $vram = $_POST['six'];

    echo '<h2>Hi ' . $name . ',</h2>';
    echo '<h2>With ' . $vram . ' VRAM of yours,</h2>';
    echo '<h2>I recommend you <a href="./index.html#kawpow">KawPow</a>, <a href="./index.html#ethash">Ethash</a></h2>';

    echo '<button onclick="closePopup()" class="close">Close</button>';
}

if (isset($_POST['eight']))
{
    $vram = $_POST['eight'];

    echo '<h2>Hi ' . $name . ',</h2>';
    echo '<h2>With ' . $vram . ' VRAM of yours,</h2>';
    echo '<h2>I recommend you <a href="./index.html#ethash">Ethash</a></h2>';

    echo '<button onclick="closePopup()" class="close">Close</button>';
}

?>