var coin = document.getElementById("zil");

var liveprice = {
    "async": true,
    "scroosDomain": true,
    "url": "https://indodax.com/api/ticker/zilidr",
    "method": "GET",
    "headers": {}
}

$.ajax(liveprice).done(function (response) {
    console.log(response);

    coin.innerHTML = response.ticker.buy;
})