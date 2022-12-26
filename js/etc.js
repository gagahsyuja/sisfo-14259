var coin = document.getElementById("etc");

var liveprice = {
    "async": true,
    "scroosDomain": true,
    "url": "https://indodax.com/api/ticker/etcidr",
    "method": "GET",
    "headers": {}
}

$.ajax(liveprice).done(function (response) {
    console.log(response);

    coin.innerHTML = response.ticker.buy;
})