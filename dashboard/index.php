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
$qrxF=mysqli_query($db,"select * from farm where user_id=$id") or die(mysqli_error($db));
$farm=mysqli_fetch_array($qrxF);
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
  <title>Dashboard - Mirror Trading</title>

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
    <!-- main-header -->
    <?php require_once 'menu.php'; ?>
    <!-- main-sidebar -->

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
              <p class="text-primary mb-0 hover-cursor">Home</p>
            </div>
          </div>

        </div>
        <!-- /breadcrumb -->

        <!-- row  -->
        <div class="row">
          <div class="col-xl-12 col-md-12 col-lg-12">
            <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container">
              <div class="tradingview-widget-container__widget"></div>
              <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/" rel="noopener" target="_blank"><span class="blue-text">Markets</span></a> by TradingView</div>
              <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                {
                  "symbols": [{
                      "proName": "FOREXCOM:SPXUSD",
                      "title": "S&P 500"
                    },
                    {
                      "proName": "FOREXCOM:NSXUSD",
                      "title": "US 100"
                    },
                    {
                      "proName": "FX_IDC:EURUSD",
                      "title": "EUR/USD"
                    },
                    {
                      "proName": "BITSTAMP:BTCUSD",
                      "title": "Bitcoin"
                    },
                    {
                      "proName": "BITSTAMP:ETHUSD",
                      "title": "Ethereum"
                    },
                    {
                      "description": "Luna",
                      "proName": "BINANCE:LUNAUSDT"
                    },
                    {
                      "description": "Doge",
                      "proName": "BINANCE:DOGEUSD"
                    },
                    {
                      "description": "Litecoin",
                      "proName": "COINBASE:LTCUSD"
                    },
                    {
                      "description": "Bitcoin Cash",
                      "proName": "BITTREX:BCHUSD"
                    },
                    {
                      "description": "Lunc",
                      "proName": "BINANCE:LUNCBUSD"
                    },
                    {
                      "description": "Cosmos",
                      "proName": "BINANCE:ATOMUSDT"
                    },
                    {
                      "description": "Solana",
                      "proName": "FTX:SOLUSD"
                    }
                  ],
                  "showSymbolLogo": true,
                  "colorTheme": "dark",
                  "isTransparent": true,
                  "displayMode": "adaptive",
                  "locale": "en"
                }
              </script>
            </div>
            <!-- TradingView Widget END -->
          </div>
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row row-sm row-deck">
          <div class="col-xl-12 col-lg-12">
            <div class="card overflow-hidden my-height-big">
              <!-- TradingView Widget BEGIN -->
              <div class="tradingview-widget-container">
                <div id="tradingview_bf5ed"></div>
                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/BTCUSD/?exchange=COINBASE" rel="noopener" target="_blank"><span class="blue-text">BTCUSD Chart</span></a> by TradingView</div>
                <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                <script type="text/javascript">
                  new TradingView.widget({

                    "width": "100%",
                    "height": "100%",
                    "symbol": "COINBASE:BTCUSD",
                    "interval": "1",
                    "timezone": "Etc/UTC",
                    "theme": "dark",
                    "style": "1",
                    "locale": "en",
                    "toolbar_bg": "#f1f3f6",
                    "enable_publishing": false,
                    "hide_side_toolbar": false,
                    "allow_symbol_change": true,
                    "watchlist": [
                      "BITSTAMP:ETHUSD",
                      "COINBASE:LTCUSD",
                      "BINANCE:DOGEUSD",
                      "BITTREX:BCHUSD"
                    ],
                    "details": true,
                    "container_id": "tradingview_bf5ed"
                  });
                </script>
              </div>
              <!-- TradingView Widget END -->
            </div>
          </div>
          <div class="col-xl-12 col-lg-12">
            <div class="card card-bitcoin my-height">
              <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                  <h4 class="card-title mg-b-10">Forex Cross Rates</h4>
                </div>

              </div>

              <!-- TradingView Widget BEGIN -->
              <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/currencies/forex-cross-rates/" rel="noopener" target="_blank"><span class="blue-text">Exchange Rates</span></a> by TradingView</div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js" async>
                  {
                    "width": "100%",
                    "height": "100%",
                    "currencies": [
                      "EUR",
                      "USD",
                      "JPY",
                      "GBP",
                      "CHF",
                      "AUD",
                      "CAD",
                      "NZD",
                      "CNY"
                    ],
                    "isTransparent": true,
                    "colorTheme": "dark",
                    "locale": "en"
                  }
                </script>
              </div>
              <!-- TradingView Widget END -->

            </div>
          </div>
        </div>
        <!-- /row  -->




      </div>
      <!-- /conatiner -->
    </div>
    <!-- /main-content -->

    <!-- Right-sidebar-->

    <!-- Right-sidebar-closed -->

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
</body>

</html>
