var coin = document.getElementById("rvn");

var liveprice = {
    "async": true,
    "scroosDomain": true,
    "url": "https://indodax.com/api/ticker/rvnidr",
    "method": "GET",
    "headers": {}
}

$.ajax(liveprice).done(function (response) {
    console.log(response);

    coin.innerHTML = response.ticker.buy;
})