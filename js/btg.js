var coin = document.getElementById("btg");

var liveprice = {
    "async": true,
    "scroosDomain": true,
    "url": "https://indodax.com/api/ticker/btgidr",
    "method": "GET",
    "headers": {}
}

$.ajax(liveprice).done(function (response) {
    console.log(response);

    coin.innerHTML = response.ticker.buy;
})