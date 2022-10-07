<?php
session_start();
if(!isset($_SESSION['user_id'])){
  echo ("<script>location.href='../login.html'</script>");
}
?>

<?php 
include '../access/db.php';



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
  <title>Market - Mirror Trading</title>

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
              <p class="text-primary mb-0 hover-cursor">Market</p>
            </div>
          </div>
          <!-- <div
              class="d-flex align-items-end flex-wrap my-auto right-content breadcrumb-right"
            >
              <button
                type="button"
                class="btn btn-warning btn-icon me-3 mt-2 mt-xl-0"
              >
                <i class="mdi mdi-download"></i>
              </button>
              <button
                type="button"
                class="btn btn-danger btn-icon me-3 mt-2 mt-xl-0"
              >
                <i class="mdi mdi-clock"></i>
              </button>
              <button
                type="button"
                class="btn btn-success btn-icon me-3 mt-2 mt-xl-0"
              >
                <i class="mdi mdi-plus"></i>
              </button>
              <button class="btn btn-primary mt-2 mt-xl-0">
                Download report
              </button>
            </div> -->
        </div>
        <!-- /breadcrumb -->

        <!-- row  -->

        <!-- /row -->

        <!-- row -->
        <div class="row row-sm row-deck market-cap-ht">
          <div class="col-xl-12 col-lg-12">
            <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container">
              <div class="tradingview-widget-container__widget"></div>
              <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/cryptocurrencies/" rel="noopener" target="_blank"><span class="blue-text">Bitcoin and Altcoin Prices</span></a> by TradingView</div>
              <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
                {
                  "title": "Cryptocurrencies",
                  "title_raw": "Cryptocurrencies",
                  "tabs": [{
                      "title": "Overview",
                      "title_raw": "Overview",
                      "symbols": [{
                          "s": "CRYPTOCAP:TOTAL"
                        },
                        {
                          "s": "BITSTAMP:BTCUSD"
                        },
                        {
                          "s": "BITSTAMP:ETHUSD"
                        },
                        {
                          "s": "FTX:SOLUSD"
                        },
                        {
                          "s": "BINANCE:AVAXUSD"
                        },
                        {
                          "s": "COINBASE:UNIUSD"
                        }
                      ],
                      "quick_link": {
                        "title": "More cryptocurrencies",
                        "href": "/markets/cryptocurrencies/prices-all/"
                      }
                    },
                    {
                      "title": "Bitcoin",
                      "title_raw": "Bitcoin",
                      "symbols": [{
                          "s": "BITSTAMP:BTCUSD"
                        },
                        {
                          "s": "COINBASE:BTCEUR"
                        },
                        {
                          "s": "COINBASE:BTCGBP"
                        },
                        {
                          "s": "BITFLYER:BTCJPY"
                        },
                        {
                          "s": "CEXIO:BTCRUB"
                        },
                        {
                          "s": "CME:BTC1!"
                        }
                      ],
                      "quick_link": {
                        "title": "More Bitcoin pairs",
                        "href": "/symbols/BTCUSD/markets/"
                      }
                    },
                    {
                      "title": "Ethereum",
                      "title_raw": "Ethereum",
                      "symbols": [{
                          "s": "BITSTAMP:ETHUSD"
                        },
                        {
                          "s": "KRAKEN:ETHEUR"
                        },
                        {
                          "s": "COINBASE:ETHGBP"
                        },
                        {
                          "s": "BITFLYER:ETHJPY"
                        },
                        {
                          "s": "BINANCE:ETHBTC"
                        },
                        {
                          "s": "BINANCE:ETHUSDT"
                        }
                      ],
                      "quick_link": {
                        "title": "More Ethereum pairs",
                        "href": "/symbols/ETHUSD/markets/"
                      }
                    },
                    {
                      "title": "Solana",
                      "title_raw": "Solana",
                      "symbols": [{
                          "s": "FTX:SOLUSD"
                        },
                        {
                          "s": "BINANCE:SOLEUR"
                        },
                        {
                          "s": "COINBASE:SOLGBP"
                        },
                        {
                          "s": "BINANCE:SOLBTC"
                        },
                        {
                          "s": "HUOBI:SOLETH"
                        },
                        {
                          "s": "BINANCE:SOLUSDT"
                        }
                      ],
                      "quick_link": {
                        "title": "More Solana pairs",
                        "href": "/symbols/SOLUSD/markets/"
                      }
                    },
                    {
                      "title": "Uniswap",
                      "title_raw": "Uniswap",
                      "symbols": [{
                          "s": "COINBASE:UNIUSD"
                        },
                        {
                          "s": "KRAKEN:UNIEUR"
                        },
                        {
                          "s": "COINBASE:UNIGBP"
                        },
                        {
                          "s": "BINANCE:UNIBTC"
                        },
                        {
                          "s": "KRAKEN:UNIETH"
                        },
                        {
                          "s": "BINANCE:UNIUSDT"
                        }
                      ],
                      "quick_link": {
                        "title": "More Uniswap pairs",
                        "href": "/symbols/UNIUSD/markets/"
                      }
                    }
                  ],
                  "title_link": "/markets/cryptocurrencies/prices-all/",
                  "width": "100%",
                  "height": "100%",
                  "showChart": true,
                  "showFloatingTooltip": false,
                  "locale": "en",
                  "plotLineColorGrowing": "#2962FF",
                  "plotLineColorFalling": "#2962FF",
                  "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
                  "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
                  "belowLineFillColorGrowingBottom": "rgba(41, 98, 255, 0)",
                  "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",
                  "gridLineColor": "rgba(240, 243, 250, 0)",
                  "scaleFontColor": "rgba(120, 123, 134, 1)",
                  "showSymbolLogo": true,
                  "symbolActiveColor": "rgba(41, 98, 255, 0.12)",
                  "colorTheme": "dark",
                  "isTransparent": "true"
                }
              </script>
            </div>
            <!-- TradingView Widget END -->
          </div>
        </div>
        <!-- /row  -->
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
</body>

</html>
