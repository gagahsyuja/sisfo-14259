var coin = document.getElementById("flux");

var liveprice = {
    "async": true,
    "scroosDomain": true,
    "url": "https://api.coingecko.com/api/v3/simple/price?ids=aion%2Cbitcoin-gold%2Cflux%2Cethereum-classic%2Cethereum-pow-iou%2Czilliqa%2Cneoxa%2Cravencoin%2C&vs_currencies=idr",
    "method": "GET",
    "headers": {}
}

$.ajax(liveprice).done(function (response) {
    console.log(response);

    coin.innerHTML = response.flux.idr;
})