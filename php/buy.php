<?php

session_start();

include_once '../conn.php';

$coin = $_POST['coin'];

$sql = "SELECT * FROM `coin` WHERE `coin_short_name` = '$coin'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

echo
'
<div class="buy-name">
    <h1>' . ucwords($row['coin_name']) . ' (' . strtoupper($row['coin_short_name']) . ')</h1>
</div>
<div class="buy-price">
    <h1>Rp<span id="coin-price"></span></h1>
</div>
<br><br>
<div class="buy-form">
    <form id="buy-form">
        <input type="text" id="buy-amount" name="amount">
        <button type="button" id="buy-button">Buy</button>
    </form>
    <div id="buy-preview"></div>
    <br><br>
    <button type="button" class="buy-close">Close</button>
</div>
';

echo
'
<script>


$(document).ready(function() {
    
    let price;

    $.ajax({
        async: true,
        scroosDomain: true,
        url: "https://indodax.com/api/ticker/' . $coin . 'idr/",
        method: "GET",
        headers: {},
        success: function(response) {
            price = response.ticker.last
        },
        async: false
    })

    $("#coin-price").html(price)

    $("#buy-amount").on("input", function() {
        let amount = $(this).val()
        let final = amount * price
        $("#buy-preview").html(amount + " ' . strtoupper($coin) . ' = Rp" + final)
    })

    $("#buy-button").click(function() {
        $.ajax({
            type: "POST",
            url: "./php/transaction.php",
            data: $("#buy-form").serialize() + "&coin=' . $coin . '&price=" + price + "",
            success: function() {
                $("#buy-popup").fadeIn()
            }
        })
    })
    
    $(".buy-close").click(function() {
        $("#buy").fadeOut()
    })

    $("#buy-popup-close").click(function() {
        $("#buy-popup").fadeOut()
    })
})



</script>
';

?>