<?php
session_start();
if(!isset($_SESSION['user_id'])){
  echo ("<script>location.href='../login.html'</script>");
}
?>
<?php include '../access/db.php';



$id=$_SESSION['user_id'];


$qrx=mysqli_query($db,"select * from users where id=$id") or die(mysqli_error($db));
$user=mysqli_fetch_array($qrx);





$queryEarnings=mysqli_query($db,"select * from earnings where user_id=$id limit 1") or die(mysqli_error($db));
$row= mysqli_fetch_array($queryEarnings);
$bitcoinEarning= $row["bitcoin"];
$ethereumEarning= $row["etherium"];
$ltcEarning= $row["litecoin"];
$dogecoinEarning= $row["dogecoin"];
$bchEarning= $row["bch"];



$queryDeposit=mysqli_query($db,"select * from deposits where user_id=$id limit 1") or die(mysqli_error($db));
$rowDeposit= mysqli_fetch_array($queryDeposit);
$bitcoinDeposit= $rowDeposit["bitcoin"];
$ethereumDeposit= $rowDeposit["etherium"];
$ltcDeposit= $rowDeposit["litecoin"];
$dogecoinDeposit= $rowDeposit["dogecoin"];
$bchDeposit= $rowDeposit["bch"];

//  var_dump($ethereumEarning);

//  exit;

// $queryEthereum=mysqli_query($db,"select sum(etherium) as amount from earnings where user_id=$id") or die(mysqli_error($db));
// $ethereumEarning= mysqli_fetch_array($queryEthereum)['amount'];

// $queryLtc=mysqli_query($db,"select sum(litecoin) as amount from earnings where user_id=$id") or die(mysqli_error($db));
// $ltcEarning= mysqli_fetch_array($queryLtc)['amount'];

// $queryDogecoin=mysqli_query($db,"select sum(dogecoin) as amount from earnings where user_id=$id") or die(mysqli_error($db));
// $dogecoinEarning= mysqli_fetch_array($queryBitcoin)['amount'];

// $queryBch=mysqli_query($db,"select sum(bch) as amount from earnings where user_id=$id") or die(mysqli_error($db));
// $bitcoinEarning= mysqli_fetch_array($queryBch)['amount'];

// $queryBitcoin=mysqli_query($db,"select sum(bitcoin) as amount from earnings where user_id=$id") or die(mysqli_error($db));
// $bitcoinEarning= mysqli_fetch_array($queryBitcoin)['amount'];

// $queryBitcoin=mysqli_query($db,"select sum(bitcoin) as amount from earnings where user_id=$id") or die(mysqli_error($db));
// $bitcoinEarning= mysqli_fetch_array($queryBitcoin)['amount'];

// $queryBitcoin=mysqli_query($db,"select sum(bitcoin) as amount from earnings where user_id=$id") or die(mysqli_error($db));
// $bitcoinEarning= mysqli_fetch_array($queryBitcoin)['amount'];

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="Description" content="Digital assets trading and investments platform" />
  <meta name="Author" content="Mirror Trading Inc" />
  <meta name="Keywords"
    content="Mining, Trading, Investment " />

  <!-- Title -->
  <title>Trading - Mirror Trading</title>

  <!-- Bootstrap css -->
  <link id="style" href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/x-icon" />

  <!-- Icons css -->
  <link href="assets/css/icons.css" rel="stylesheet" />

  <!--  Animations css -->
  <link href="assets/css/animate.css" rel="stylesheet" />

  <!-- style css-->
  <link href="assets/css/style.css" rel="stylesheet" />

  <!-- plugin css-->
  <link href="assets/css/plugins.css" rel="stylesheet" />
  <style>
    select option {
  /* background: white !important; */
  color: white !important;
}
</style>
</head>

<body class="ltr main-body app sidebar-mini light-mode">
  <!-- Loader -->
  <div id="global-loader" class="light-loader">
    <img src="assets/img/loaders/loader.svg" class="loader-img" alt="Loader" />
  </div>
  <!-- /Loader -->

  <!-- Page -->
  <div class="page">
  <?php require_once 'menu.php'; ?>

    <!-- main-content -->
    <div class="main-content app-content">
      <!-- container -->
      <div class="main-container container-fluid">
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
          <div class="left-content">
            <h3 class="content-title mb-2">Welcome, <?= $user["name"] ?> !</h3>
            <div class="d-flex p-0">
              <i class="mdi mdi-home text-muted hover-cursor"></i>
              <p class="text-muted mb-0 hover-cursor">
                &nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;
              </p>
              <p class="text-primary mb-0 hover-cursor">Trading</p>
            </div>
          </div>

        </div>
        <!-- /breadcrumb -->

        <!-- row  -->

        <!-- /row -->

        <!-- row -->
        <div class="row row-sm row-deck start-flexing ">
          <div class="col-xl-4 col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="clearfix">
                  <div class="float-end">
                    <i class="mdi mdi-cube text-warning icon-size"></i>
                  </div>
                  <div class="float-start">
                    <p class="mb-0 text-start">Total Trading Balance</p>
                    <div class="">
                      <span id="totalEarningUsd"></span>
                      <h3 class="font-weight-semibold text-start mb-0 text-success"> <span id="totalBalance">Loading...</span></h3>
                    </div>
                  </div>
                </div>
                <p class="text-muted mb-0">
                  <i class="mdi mdi-arrow-up-drop-circle me-1 text-success" aria-hidden="true"></i>
                  80% higher growth
                </p>
              </div>
              <div class="card-body">
                <div class="btn-list btn-stretch">

                  <a href="traders.php" class="btn btn-outline-secondary stretch-grow">Copy Experts</a>
                  <a href="trading-withdrawal.php" class="btn btn-outline-success stretch-grow">Withdraw</a>

                </div>



							</div>
              <div class="card-body">
                <div class="btn-list btn-stretch">

                  <a href="#trading-contracts" class="btn btn-outline-warning stretch-grow">My Contracts</a>


                </div>



							</div>




            </div>
          </div>


          <!-- /row -->






          <div class="col-xl-8 col-lg-12">
            <div class="card card-bitcoin">
              <div class="card-minimal-two">
                <div class="card-header">
                  <h4 class="card-title mb-0">&nbsp</h4>
                  <div class="">
                    <nav class="nav nav-pills">
                      <a class="nav-link active" data-bs-toggle="tab" href="#tab7">BTH</a>
                      <a class="nav-link" data-bs-toggle="tab" href="#tab8">ETH</a>
                      <a class="nav-link" data-bs-toggle="tab" href="#tab9">LTC</a>
                      <a class="nav-link" data-bs-toggle="tab" href="#tab10">DOGE</a>
                      <a class="nav-link" data-bs-toggle="tab" href="#tab11">BCH</a>
                    </nav>

                  </div>
                  <!-- card-header-right -->
                </div>
              </div>

              <div class="card-body">
                <div class="main-profile-body p-0">
                  <div class="row row-sm">
                    <div class="col-12">
                      <div class="panel-body tabs-menu-body p-0 border-0">
                        <div class="tab-content">
                          <div class="tab-pane active" id="tab7">

                            <div class="media">
                              <div class="media-icon"><img src="assets/img/crypto-currencies/round-icons/btc.png" alt="BCH" class="float-end text-muted" width="6%"></div>
                              <div class="media-body">
                                <div class="row row-sm">
                                  <div class="col">
                                    <label>Symbol</label>
                                    <p>BTC</p>
                                  </div>
                                  <div class="col-3">
                                    <label>Total Balance</label>
                                    <p><span id="btc_Deposits"><?= $bitcoinDeposit ?></span> BTC</p>
                                  </div>
                                  <div class="col">
                                    <label>Total Balance (USD)</label>
                                    <p >$ <span id="depositUsd">0.00</span></p>
                                  </div>
                                  <div class="col">
                                    <label>Profit</label>
                                    <p ><span id="btc_earnings"><?= $bitcoinEarning ?> </span>BTC</p>
                                  </div>
                                  <div class="col">
                                    <label>Profit (USD)</label>
                                    <p> $ <span id="earningUsd">0.0</span></p>
                                  </div>
                                </div>
                                <!-- row -->
                              </div>
                            </div>
                            <!-- media-body -->
                            <div class="flot-wrapper flot-wrapper-height">
                              <!-- TradingView Widget BEGIN -->
                              <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/BTCUSD/?exchange=BITSTAMP" rel="noopener" target="_blank"><span class="blue-text">BTCUSD Rates</span></a> by TradingView</div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                                  {
                                    "symbol": "BITSTAMP:BTCUSD",
                                    "width": "100%",
                                    "height": "100%",
                                    "locale": "en",
                                    "dateRange": "12M",
                                    "colorTheme": "dark",
                                    "trendLineColor": "rgba(41, 98, 255, 1)",
                                    "underLineColor": "rgba(41, 98, 255, 0.3)",
                                    "underLineBottomColor": "rgba(41, 98, 255, 0)",
                                    "isTransparent": true,
                                    "autosize": true,
                                    "largeChartUrl": ""
                                  }
                                </script>
                              </div>
                              <!-- TradingView Widget END -->
                            </div>

                          </div>
                          <div class="tab-pane" id="tab8">
                            <div class="media">
                              <div class="media-icon"><img src="assets/img/crypto-currencies/round-icons/eth.png" alt="BCH" class="float-end text-muted" width="6%"></div>
                              <div class="media-body">
                                <div class="row row-sm">
                                  <div class="col">
                                    <label>Symbol</label>
                                    <p>ETH</p>
                                  </div>
                                  <div class="col-3">
                                    <label>Total Balance</label>
                                    <p> <span id="eth_deposit"> <?= $ethereumDeposit ?></span> ETH</p>
                                  </div>
                                  <div class="col">
                                    <label>Total Balance (USD)</label>
                                    <p>$<span id="depositEthUsd">0.00</span></p>
                                  </div>
                                  <div class="col">
                                    <label>Profit</label>
                                    <p id="eth_earnings"> <span><?= $ethereumEarning ?></span> ETH</p>
                                  </div>
                                  <div class="col">
                                    <label>Profit (USD)</label>
                                    <p >$<span id="earningEthUsd">0.00</span></p>
                                  </div>
                                </div>
                                <!-- row -->
                              </div>
                            </div>
                            <!-- media-body -->
                            <div class="flot-wrapper flot-wrapper-height">
                              <!-- TradingView Widget BEGIN -->
                              <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/ETHUSD/?exchange=BITSTAMP" rel="noopener" target="_blank"><span class="blue-text">ETHUSD Rates</span></a> by TradingView</div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                                  {
                                    "symbol": "BITSTAMP:ETHUSD",
                                    "width": "100%",
                                    "height": "100%",
                                    "locale": "en",
                                    "dateRange": "12M",
                                    "colorTheme": "dark",
                                    "trendLineColor": "rgba(41, 98, 255, 1)",
                                    "underLineColor": "rgba(41, 98, 255, 0.3)",
                                    "underLineBottomColor": "rgba(41, 98, 255, 0)",
                                    "isTransparent": true,
                                    "autosize": true,
                                    "largeChartUrl": ""
                                  }
                                </script>
                              </div>
                              <!-- TradingView Widget END -->
                            </div>
                          </div>
                          <div class="tab-pane" id="tab9">
                            <div class="media">
                              <div class="media-icon"><img src="assets/img/crypto-currencies/round-icons/ltc.png" alt="BCH" class="float-end text-muted" width="6%"></div>
                              <div class="media-body">
                                <div class="row row-sm">
                                  <div class="col">
                                    <label>Symbol</label>
                                    <p>LTC</p>
                                  </div>
                                  <div class="col-3">
                                    <label>Total Balance</label>
                                    <p><span id="ltc_deposit"><?= $ltcDeposit ?> </span>LTC</p>
                                  </div>
                                  <div class="col">
                                    <label>Total Balance (USD)</label>
                                    <p>$<span id="depositLtcUsd">0.0</span></p>
                                  </div>
                                  <div class="col">
                                    <label>Profit</label>
                                    <p ><span id="ltc_earnings"><?= $ltcEarning ?></span> LTC</p>
                                  </div>
                                  <div class="col">
                                    <label>Profit (USD)</label>
                                    <p>$ <span id="earningLtcUsd">0.0</span></p>
                                  </div>
                                </div>
                                <!-- row -->
                              </div>
                            </div>
                            <!-- media-body -->
                            <div class="flot-wrapper flot-wrapper-height">
                              <!-- TradingView Widget BEGIN -->
                              <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/LTCUSD/?exchange=COINBASE" rel="noopener" target="_blank"><span class="blue-text">LTCUSD Rates</span></a> by TradingView</div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                                  {
                                    "symbol": "COINBASE:LTCUSD",
                                    "width": "100%",
                                    "height": "100%",
                                    "locale": "en",
                                    "dateRange": "12M",
                                    "colorTheme": "dark",
                                    "trendLineColor": "rgba(41, 98, 255, 1)",
                                    "underLineColor": "rgba(41, 98, 255, 0.3)",
                                    "underLineBottomColor": "rgba(41, 98, 255, 0)",
                                    "isTransparent": true,
                                    "autosize": true,
                                    "largeChartUrl": ""
                                  }
                                </script>
                              </div>
                              <!-- TradingView Widget END -->
                            </div>
                          </div>
                          <div class="tab-pane" id="tab10">
                            <div class="media">
                              <div class="media-icon"><img src="assets/img/crypto-currencies/round-icons/doge.png" alt="BCH" class="float-end text-muted" width="6%"></div>
                              <div class="media-body">
                                <div class="row row-sm">
                                  <div class="col">
                                    <label>Symbol</label>
                                    <p>DOGE</p>
                                  </div>
                                  <div class="col-3">
                                    <label>Total Balance</label>
                                    <p><span id="doge_deposit"><?= $dogecoinDeposit ?></span> DOGE</p>
                                  </div>
                                  <div class="col">
                                    <label>Total Balance (USD)</label>
                                    <p>$<span id="depositDogeUsd">0.00</span></p>
                                  </div>
                                  <div class="col">
                                    <label>Profit</label>
                                    <p> <span id="doge_earnings"> <?= $dogecoinEarning ?></span> DOGE</p>
                                  </div>
                                  <div class="col">
                                    <label>Profit (USD)</label>
                                    <p>$<span id="earningDogeUsd">0.0</span></p>
                                  </div>
                                </div>
                                <!-- row -->
                              </div>
                            </div>
                            <!-- media-body -->
                            <div class="flot-wrapper flot-wrapper-height">
                              <!-- TradingView Widget BEGIN -->
                              <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/DOGEUSD/?exchange=BINANCE" rel="noopener" target="_blank"><span class="blue-text">DOGEUSD Rates</span></a> by TradingView</div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                                  {
                                    "symbol": "BINANCE:DOGEUSD",
                                    "width": "100%",
                                    "height": "100%",
                                    "locale": "en",
                                    "dateRange": "12M",
                                    "colorTheme": "dark",
                                    "trendLineColor": "rgba(41, 98, 255, 1)",
                                    "underLineColor": "rgba(41, 98, 255, 0.3)",
                                    "underLineBottomColor": "rgba(41, 98, 255, 0)",
                                    "isTransparent": true,
                                    "autosize": true,
                                    "largeChartUrl": ""
                                  }
                                </script>
                              </div>
                              <!-- TradingView Widget END -->
                            </div>
                          </div>
                          <div class="tab-pane" id="tab11">
                            <div class="media">
                              <div class="media-icon"><img src="assets/img/crypto-currencies/round-icons/bch.png" alt="BCH" class="float-end text-muted" width="6%"></div>
                              <div class="media-body">
                                <div class="row row-sm">
                                  <div class="col">
                                    <label>Symbol</label>
                                    <p>BCH</p>
                                  </div>
                                  <div class="col-3">
                                    <label>Total Balance</label>
                                    <p><span id="bch_deposit"> <?= $bchDeposit ?></span> BCH</p>
                                  </div>
                                  <div class="col">
                                    <label>Total Balance (USD)</label>
                                    <p>$ <span id="depositBchUsd">0.00</span></p>
                                  </div>
                                  <div class="col">
                                    <label>Profit</label>
                                    <p><span id="bch_earnings"> <?= $bchEarning ?></span> BCH</p>
                                  </div>
                                  <div class="col">
                                    <label>Profit (USD)</label>
                                    <p id="">$ <span id="earningBchUsd">0.00</span></p>
                                  </div>
                                </div>
                                <!-- row -->
                              </div>
                            </div>
                            <!-- media-body -->
                            <div class="flot-wrapper flot-wrapper-height">
                              <!-- TradingView Widget BEGIN -->
                              <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/BCHUSD/?exchange=BITTREX" rel="noopener" target="_blank"><span class="blue-text">BCHUSD Rates</span></a> by TradingView</div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                                  {
                                    "symbol": "BITTREX:BCHUSD",
                                    "width": "100%",
                                    "height": "100%",
                                    "locale": "en",
                                    "dateRange": "12M",
                                    "colorTheme": "dark",
                                    "trendLineColor": "rgba(41, 98, 255, 1)",
                                    "underLineColor": "rgba(41, 98, 255, 0.3)",
                                    "underLineBottomColor": "rgba(41, 98, 255, 0)",
                                    "isTransparent": true,
                                    "autosize": true,
                                    "largeChartUrl": ""
                                  }
                                </script>
                              </div>
                              <!-- TradingView Widget END -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- main-profile-body -->

              </div>



            </div>
          </div>



        </div>
        <!-- /row  -->

        <div class="row row-mg-bottom">
          <div class="col-md-12">
            <div class="card overflow-hidden">
              <div class="card-body">
                <div class="">
                  <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-10" id="trading-contracts">
                      My Contracts
                    </h4>
                  </div>
                  <p class="tx-12 text-muted mb-2">
                    You can view all your active investments and recent transactions here.
                  </p>
                </div>
                <div class="table-responsive market-values">
                  <table
                    class="table table-bordered table-hover table-striped text-nowrap mb-0 tx-13"
                  >
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Traders</th>
                        <th>Amount</th>
                        <!-- <th>% 24h</th> -->
                        <th>Profit(%)</th>
                        <th>Plan</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                      $qr1=mysqli_query($db,"select d.*,t.name from deposit_histories d left join traders t on d.copied_trader=t.id where user_id={$id}  order by id desc ");
                          while ($row=mysqli_fetch_array($qr1)) {
                            ?>
                      <tr class="border-bottom">
                        <td>

                        <?php 
                          if ($row['wallet']=="Bitcoin") {
                            echo "Bitcoin";
                          }elseif ($row['wallet']=="Etherium") {
                            echo "Ethereum";
                          }elseif ($row['wallet']=="Litecoin") {
                            echo "Litecoin";
                          }elseif ($row['wallet']=="Dogecoin") {
                            echo "Dogecoin";
                          }else{
                            echo "BCH";
                          }
                            ?>
                        </td>
                        <td>
                      
                        <?php 
                        if(isset($row["name"])){
                          echo $row["name"];
                        }else{
                          echo '-';
                        }
                          // if ($row['wallet']=="Bitcoin") {
                          //   echo '<i class="cf cf-btc tx-22"></i>';
                          // }elseif ($row['wallet']=="Etherium") {
                          //   echo '<i class="cf cf-eth tx-22"></i>';
                          // }elseif ($row['wallet']=="Litecoin") {
                          //   echo '<i class="cf cf-ltc tx-22"></i>';
                          // }elseif ($row['wallet']=="Dogecoin") {
                          //   echo '<i class="cf cf-doge tx-22"></i>';
                          // }else{
                          //   echo '<i class="cf cf-btc tx-22"></i>';
                          // }
                            ?>
                      </td>
                        <td>$ <?= $row["amount"] ?></td>
                        <td class="text-green"><?= $row["interest"] ?></td>
                       
                        <td><?= $row["plan"] ?></td>
                        <td>
                        <a href="#" class="btn btn-sm <?= $row["status"]=='pending'?'btn-warning':'btn-success' ?> "><?= $row["status"]=='pending'?'Pending':'Active' ?></a>
                        </td>
                      </tr>
                     
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /conatiner -->
    </div>
    <!-- /main-content -->

    <!-- Footer opened -->
    <div class="main-footer">
      <div class="container-fluid ht-100p">
        <span>Copyright © 2015 <a href="#">Mirror Trading</a> All rights
          reserved.</span>
      </div>
    </div>
    <!-- Footer closed -->
  </div>
  <!--end  Page -->

  <!-- Back-to-top -->
  <a href="#top" id="back-to-top"><i class="la la-chevron-up"></i></a>

  <!-- JQuery min js -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>

  <!-- Bootstrap Bundle js -->
  <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
  <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

  <!-- Datepicker js -->
  <script src="assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>

  <!-- Moment js -->
  <script src="assets/plugins/moment/moment.js"></script>

  <!--Chart bundle min js -->
  <script src="assets/plugins/chart.js/Chart.bundle.min.js"></script>
  <script src="assets/plugins/raphael/raphael.min.js"></script>
  <script src="assets/plugins/peity/jquery.peity.min.js"></script>

  <!-- JQuery sparkline js -->
  <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

  <!-- Sampledata js -->
  <script src="assets/js/chart.flot.sampledata.js"></script>

  <!-- Perfect-scrollbar js -->
  <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="assets/plugins/perfect-scrollbar/p-scroll.js"></script>
  <script src="assets/plugins/perfect-scrollbar/p-scroll-1.js"></script>

  <!-- Internal  Flot js-->
  <script src="assets/plugins/jquery.flot/jquery.flot.js"></script>
  <script src="assets/plugins/jquery.flot/jquery.flot.pie.js"></script>
  <script src="assets/plugins/jquery.flot/jquery.flot.categories.js"></script>
  <script src="assets/plugins/jquery.flot/jquery.flot.resize.js"></script>
  <script src="assets/js/dashboard.sampledata.js"></script>
  <script src="assets/js/chart.flot.sampledata.js"></script>

  <!-- Owl Carousel js-->
  <script src="assets/plugins/owl-carousel/owl.carousel.js"></script>
  <script src="assets/js/owl-carousel.js"></script>

  <!-- Eva-icons js -->
  <script src="assets/js/eva-icons.min.js"></script>

  <!-- Sidemenu js -->
  <script src="assets/plugins/side-menu/sidemenu.js"></script>

  <!-- right-sidebar js -->
  <script src="assets/plugins/sidebar/sidebar.js"></script>
  <script src="assets/plugins/sidebar/sidebar-custom.js"></script>

  <!-- Internal Nice-select js-->
  <script src="assets/plugins/jquery-nice-select/js/jquery.nice-select.js"></script>
  <script src="assets/plugins/jquery-nice-select/js/nice-select.js"></script>

  <!-- Sticky js -->
  <script src="assets/js/sticky.js"></script>

  <!-- index js -->
  <script src="assets/js/dashboard.js"></script>

  <!-- Color Theme js -->
  <script src="assets/js/themeColors.js"></script>

  <!-- custom js -->
  <script src="assets/js/custom.js"></script>

  <!-- Custom-switcher js -->
  <script src="assets/js/custom-switcher.js"></script>
  <script src="assets/js/app.js"></script>
</body>

</html>
