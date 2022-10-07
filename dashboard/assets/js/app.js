$(document).ready(function () {
  bitcoinPriceConvert();
  ethPriceConvert();
  ltcPriceConvert();
  dogePriceConvert();
  bchPriceConvert();
  totalbalance()
});

function bitcoinPriceConvert() {
  var bitcoinValue = parseFloat($("#btc_earnings").text()||0);
  var btc_Deposits = parseFloat($("#btc_Deposits").text()||0);
  console.log("bitcoinValusse", btc_Deposits);
  if ((bitcoinValue && bitcoinValue > 0) || (btc_Deposits && btc_Deposits>0) ) {
    $.get(
      "https://min-api.cryptocompare.com/data/price?fsym=BTC&tsyms=BTC,USD,EUR",
      function (data, status) {
        console.log("convertedusd", data);
        var unitusd = data.USD;
        $("#usd_btc_amount").val(data);
        var amt_usd = (parseFloat(bitcoinValue) * unitusd).toFixed(3);
        var amt_usd_depo = (parseFloat(btc_Deposits) * unitusd).toFixed(3);
        console.log("amt_usd_depo",amt_usd_depo)

        $("#earningUsd").text(amt_usd);
        $("#depositUsd").text(amt_usd_depo);
      }
    );
  }else{
    $("#depositUsd").text("0");
    $("#earningUsd").text("0");
  }
}



function ethPriceConvert() {
    var bitcoinValue = parseFloat($("#eth_earnings").text()||0);
    var eth_deposit = parseFloat($("#eth_deposit").text()||0);
    if ((bitcoinValue && bitcoinValue > 0)|| (eth_deposit && eth_deposit>0)) {
      $.get(
        "https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=ETH,USD,EUR",
        function (data, status) {
          console.log("convertedusd", data);
          var unitusd = data.USD;
        //   $("#usd_btc_amount").val(data);
          var amt_usd = (parseFloat(bitcoinValue) * unitusd).toFixed(3);
          var amt_usd_depo = (parseFloat(eth_deposit) * unitusd).toFixed(3);
  
          $("#earningEthUsd").text(amt_usd);
          $("#depositEthUsd").text(amt_usd_depo);
        }
      );
    }
  }


  function ltcPriceConvert() {
    var bitcoinValue = parseFloat($("#ltc_earnings").text()||0);
    var ltc_deposit = parseFloat($("#ltc_deposit").text()||0);

    console.log("bitcoinValue", bitcoinValue);
    if ((bitcoinValue && bitcoinValue > 0) || (ltc_deposit && ltc_deposit>0)) {
      $.get(
        "https://min-api.cryptocompare.com/data/price?fsym=LTC&tsyms=LTC,USD,EUR",
        function (data, status) {
          console.log("convertedusd", data);
          var unitusd = data.USD;
        //   $("#usd_btc_amount").val(data);
          var amt_usd = (parseFloat(bitcoinValue) * unitusd).toFixed(3);
          var amt_usd_depo = (parseFloat(ltc_deposit) * unitusd).toFixed(3);

  
          $("#earningLtcUsd").text(amt_usd);
          $("#depositLtcUsd").text(amt_usd_depo);
        }
      );
    }
  }


  function dogePriceConvert() {
    var bitcoinValue = parseFloat($("#doge_earnings").text()||0);
    var doge_deposit = parseFloat($("#doge_deposit").text()||0);

    console.log("bitcoinValue", bitcoinValue);
    if ((bitcoinValue && bitcoinValue > 0) ||(doge_deposit && doge_deposit > 0)) {
      $.get(
        "https://min-api.cryptocompare.com/data/price?fsym=DOGE&tsyms=DOGE,USD,EUR",
        function (data, status) {
          console.log("convertedusd", data);
          var unitusd = data.USD;
        //   $("#usd_btc_amount").val(data);
          var amt_usd = (parseFloat(bitcoinValue) * unitusd).toFixed(3);
          var amt_usd_depo = (parseFloat(doge_deposit) * unitusd).toFixed(3);

  
          $("#earningDogeUsd").text(amt_usd);
          $("#depositDogeUsd").text(amt_usd_depo);
        }
      );
    }
  }


  function bchPriceConvert() {
    var bitcoinValue = parseFloat($("#bch_earnings").text()||0);
    var bch_deposit = parseFloat($("#bch_deposit").text()||0);

    console.log("bitcoinValue", bitcoinValue);
    if ((bitcoinValue && bitcoinValue > 0) || (bch_deposit && bch_deposit>0)) {
      $.get(
        "https://min-api.cryptocompare.com/data/price?fsym=BCH&tsyms=BCH,USD,EUR",
        function (data, status) {
          console.log("convertedusd", data);
          var unitusd = data.USD;
        //   $("#usd_btc_amount").val(data);
          var amt_usd = (parseFloat(bitcoinValue) * unitusd).toFixed(3);
          var amt_usd_depo = (parseFloat(bch_deposit) * unitusd).toFixed(3);

  
          $("#earningBchUsd").text(amt_usd);
          $("#depositBchUsd").text(amt_usd_depo);
        }
      );
    }
  }

  
  function totalbalance() {
    setTimeout(() => {
      var bitcoinEarningUsd = parseFloat($("#earningUsd").text()||0);
    var bitcoinDepositUsd = parseFloat($("#depositUsd").text()||0);

    var EthEarningUsd = parseFloat($("#earningEthUsd").text()||0);
    var EthDepositUsd = parseFloat($("#depositEthUsd").text()||0);

  

    var LtcEarningUsd = parseFloat($("#earningLtcUsd").text()||0);
    var LtcDepositUsd = parseFloat($("#depositLtcUsd").text()||0);


    var DogeEarnUsd = parseFloat($("#earningDogeUsd").text()||0);
    var DogeDepositUsd = parseFloat($("#depositDogeUsd").text()||0);



    var bchEarningtUsd = parseFloat($("#earningBchUsd").text()||0);
    var bchDepositUsd = parseFloat($("#depositBchUsd").text()||0);


    var total=(bitcoinEarningUsd+bitcoinDepositUsd+EthDepositUsd+EthEarningUsd+LtcDepositUsd+LtcEarningUsd+DogeDepositUsd+DogeEarnUsd+bchDepositUsd+bchEarningtUsd).toFixed(3);
    $("#totalBalance").text("$"+total);
    }, 3000);
    
    
   

   
  }