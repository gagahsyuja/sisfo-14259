var coin = document.getElementById("flux");

var liveprice = {
    "async": true,
    "scroosDomain": true,
    "url": "https://indodax.com/api/ticker/fluxidr",
    "method": "GET",
    "headers": {}
}

$.ajax(liveprice).done(function (response) {
    console.log(response);

    coin.innerHTML = response.ticker.buy;
})