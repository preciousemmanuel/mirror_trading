<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  echo ("<script>location.href='../login.html'</script>");
}
?>
<?php include '../access/db.php';



$id = $_SESSION['user_id'];



$qrx = mysqli_query($db, "select * from users where id=$id") or die(mysqli_error($db));
$user = mysqli_fetch_array($qrx);
$qrxF = mysqli_query($db, "select * from farm where user_id=$id") or die(mysqli_error($db));
$farm = mysqli_fetch_array($qrxF);

$trader="";
if(isset($_GET["trader"]) && !empty($_GET["trader"])){
  $trader=$_GET["trader"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="Description" content="Digital assets trading and investments platform" />
  <meta name="Author" content="Mirror Trading Inc" />
  <meta name="Keywords" content="Mining, Trading, Investment " />

  <!-- Title -->
  <title>Trading Investment - Mirror Trading</title>

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
  <!-- JQuery min js -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>

  <style>
      #loader_submit {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  background: rgba(0,0,0,0.75) url(small.gif) no-repeat center center;
  z-index: 10000;
}

select option {
  /* background: white !important; */
  color: white !important;
}
    </style>
</head>

<body class="ltr main-body app sidebar-mini light-mode">
<div id="loader_submit" class="loader"></div>
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
              <p class="text-primary mb-0 hover-cursor">Trading Investment</p>
            </div>
          </div>
        </div>
        <!-- /breadcrumb -->

        <!-- row  -->

        <!-- /row -->

        <!-- row -->

        <div class="col-lg-12 col-md-12">
          <div class="card" id="button7">
            <div class="card-body">
              <div class="row">

                <div class="col-xl-12 col-xxl-12">
                  <ul class="nav nav-tabs" data-tabs="tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="color: #ddd">FUND DEPOSIT</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" style="color: #ddd" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">DEPOSIT HISTORY</a>
                    </li>

                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <form id="form_ms">
                        <input name="trader" hidden="false" value="<?= $trader ?>" />
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title" style="color: #ff231f">Use this form to deposit</h4>
                            <div class="basic-form">

                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Wallet you intend to fund</label>
                                    <select name="wallet" required id="wallet" class="form-control form-control-lg">
                                      <option value="">-- Select A Wallet --</option>
                                      <option>Bitcoin</option>
                                      <option value="Ethereum">Ethereum</option>
                                      <option value="Litecoin">Litecoin</option>
                                      <option value="Dogecoin">Dogecoin</option>
                                      <option value="BCH">BCH</option>

                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Deposit Amount(Amount you will send)</label>
                                    <div class="input-group mb-3">
                                      
                                        <span class="input-group-text">$</span>
                                      
                                      <input type="number" value="1" min="1" required name="amount_to_send" id="amount_to_send" class="form-control ">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">

                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>You will send</label>
                                    <div class="input-group">
                                      
                                        <div class="input-group-text crypto_symbol" id="crypto_symbol">BTC</div>
                                      
                                      <input type="text" required name="crypto_amount" id="crypto_amount" class="form-control ">
                                    </div>
                                  </div>
                                </div>
                              </div>

                            </div>

                          </div>



                        </div>

                        <div class="card" style="">
                          <center>
                            <h6 class="card-title my-3">Your wallet will be credited as follows</h6>
                          </center>
                          <div class="card-body">

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">

                                  <div class="input-group">
                                    
                                      <div class="input-group-text credit_symbol" id="credit_symbol">BTC</div>
                                    

                                    <input type="text" name="" id="credit_wallet_name" class="form-control ">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">

                                  <div class="input-group">
                                    
                                      <div class="input-group-text credit_symbol">BTC</div>
                                    

                                    <input type="text" name="credit_usd" id="credit_usd" class="form-control ">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>




                        <button type="submit" class="btn btn-primary">Deposit</button>
                      </form>
                    </div>

                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      <!-- deposit history-->
                      <div style="overflow: auto;">
                        <table class="table table-bordered ">
                          <thead>
                            <th>REF</th>
                            <th>WALLET</th>
                            <th>AMOUNT(USD)</th>
                            <th>CRYPTO AMOUNT</th>
                            <th>DATE</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                          </thead>
                          <tbody>
                            <?php
                            $qr1 = mysqli_query($db, "select * from deposit_histories where user_id=" . $id);
                            if ($qr1) {
                              while ($row = mysqli_fetch_array($qr1)) {
                            ?>
                                <tr>
                                  <td><?= $row['ref'] ?></td>
                                  <td><?= $row['wallet'] ?></td>
                                  <td><?= $row['amount'] ?></td>
                                  <td><?= $row['crypto_amount'] ?></td>
                                  <td><?= $row['created_at'] ?></td>
                                  <td><?= $row['status'] == "pending" ? '<span class="badge badge-warning">Pending</span>' : '<span class="badge badge-success">Approved</span>' ?></td>
                                  <td><a class="btn btn-sm btn-primary" href="confirm_deposit.php?trans_id=<?= $row['id'] ?>"><span class="fa fa-edit"></span></a></td>
                                </tr>
                            <?php }
                            } else {
                              echo "<p class='text-danger'></p>";
                            }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
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
  <!-- <script src="assets/js/chart.flot.sampledata.js"></script> -->

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
  <script type="text/javascript" src="assets/twitterbootstrap/js/bootstrap-tab.js"></script>

  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('#myTab a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
      });


    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


  <script type="text/javascript">
    $(document).ready(function() {
      $(document).on('change', '#wallet', function(e) {
        var wallet = $(this).val();
        // var wallet = $('#wallet').val();
        if (wallet != "") {
          var spinner = $('#loader_submit');
          spinner.show();

          //$('#payment_div').show();
          var amount_to_send = $('#amount_to_send').val() != "" ? $('#amount_to_send').val() : 0;

          // if (wallet == "Bitcoin") {
          //   $('.crypto_symbol').html('BTC');

          //   $.get("https://blockchain.info/tobtc?currency=USD&value=" + amount_to_send, function(data, status) {
              
          //     $('#crypto_amount').val(data);
          //     ////$('#wallet_address').val('0x327eC41685Fc99A494a9BFA6A08d1d77688eE8C3');

          //     //alert("Data: " + data + "\nStatus: " + status);
          //     $('.crypto_symbol').html('BTC');
          //   $('.credit_symbol').html('BTC');
          //     spinner.hide();
          //   });

          // } else if (wallet == "Ethereum") {
          //   $('.crypto_symbol').html('ETH');
          //   $('.credit_symbol').html('ETH');
          //   $('#credit_wallet_name').val("Ethereum");
          //   $.get("https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=ETH,USD,EUR", function(data, status) {
          //     console.log(data)
          //     //alert("Data: " + JSON.stringify(data) + "\nStatus: " + status);
          //     var eth = data.USD;
          //     var amt_n = amount_to_send / eth;
          //     $('#crypto_amount').val(amt_n.toFixed(5));
          //     spinner.hide();
          //   });

          // } else if (wallet == "Litecoin") {
          //   ////$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
          //   $.get("https://min-api.cryptocompare.com/data/price?fsym=LTC&tsyms=LTC,USD,EUR", function(data, status) {
          //     $('.credit_symbol').html('LTC');
          //     var ltc = data.USD;
          //     $('#credit_wallet_name').val("Litecoin");
          //     $('#crypto_amount').val((amount_to_send / ltc).toFixed(5));
          //     $('.crypto_symbol').html('LTC');
          //     spinner.hide();
          //   });
          // } else if (wallet == "Dogecoin") {
          //   ////$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
          //   $.get("https://min-api.cryptocompare.com/data/price?fsym=DOGE&tsyms=DOGE,USD,EUR", function(data, status) {
          //     $('.credit_symbol').html('DOGE');
          //     $('#credit_wallet_name').val("DOGE");
          //     var doge = data.USD;

          //     $('#crypto_amount').val((amount_to_send / doge).toFixed(5));
          //     $('.crypto_symbol').html('DOGE');
          //     spinner.hide();
          //   });
          // } else if (wallet == "bnb") {
          //   ////$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
          //   $.get("https://min-api.cryptocompare.com/data/price?fsym=BNB&tsyms=BNB,USD,EUR", function(data, status) {
          //     $('.credit_symbol').html('BNB');
          //     $('#credit_wallet_name').val("bnb");
          //     var BNB = data.USD;

          //     $('#crypto_amount').val((amount_to_send / BNB).toFixed(5));
          //     $('.crypto_symbol').html('BNB');
          //     spinner.hide();
          //   });
          // } else if (wallet == "xrp") {
          //   ////$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
          //   $.get("https://min-api.cryptocompare.com/data/price?fsym=XRP&tsyms=XRP,USD,EUR", function(data, status) {
          //     $('.credit_symbol').html('XRP');
          //     $('#credit_wallet_name').val("XRP");
          //     var XRP = data.USD;

          //     $('#crypto_amount').val((amount_to_send / XRP).toFixed(5));
          //     $('.crypto_symbol').html('XRP');
          //     spinner.hide();
          //   });
          // }

          // spinner.show();
          if (wallet == "Bitcoin") {
            $.get("https://blockchain.info/tobtc?currency=USD&value=" + amount_to_send, function(data, status) {
              //alert(data)
              //$('#wallet_address').val('0x327eC41685Fc99A494a9BFA6A08d1d77688eE8C3');
              $('.credit_symbol').html('BTC');
              $('#credit_wallet_name').val("Bitcoin");
              $('#credit_usd').val(data);
              $('#crypto_amount').val(data);
              $('.crypto_symbol').html('BTC');
              //$('#credit_usd').val(data);             
              //alert("Data: " + data + "\nStatus: " + status);
              spinner.hide();

            });

          } else if (wallet == "Ethereum") {
            $.get("https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=ETH,USD,EUR", function(data, status) {
              //alert("Data: " + JSON.stringify(data) + "\nStatus: " + status);
              var eth = data.USD;
              //$('#crypto_amount').val(eth*amount_to_send);
              //alert(eth)
              //$('#wallet_address').val('0x327eC41685Fc99A494a9BFA6A08d1d77688eE8C3');
              $('.credit_symbol').html('ETH');
              $('.crypto_symbol').html('ETH');
              $('#credit_wallet_name').val("Ethereum");
              var amt_n = amount_to_send / eth;
              $('#credit_usd').val(amt_n.toFixed(5));
              $('#crypto_amount').val(amt_n.toFixed(5));

              spinner.hide();
            });

          } else if (wallet == "Litecoin") {
            $.get("https://min-api.cryptocompare.com/data/price?fsym=LTC&tsyms=LTC,USD,EUR", function(data, status) {
              var ltc = data.USD;
              var amt_n = amount_to_send / ltc;
              //$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
              $('.credit_symbol').html('LTC');
              $('.crypto_symbol').html('LTC');
              $('#credit_wallet_name').val("Litecoin");
              $('#credit_usd').val(amt_n.toFixed(5));
              $('#crypto_amount').val(amt_n);
              spinner.hide();
            })
          } else if (wallet == "Dogecoin") {
            $.get("https://min-api.cryptocompare.com/data/price?fsym=DOGE&tsyms=DOGE,USD,EUR", function(data, status) {
              var DOGE = data.USD;
              var amt_n = amount_to_send / DOGE;
              //$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
              $('.credit_symbol').html('DOGE');
              $('#credit_wallet_name').val("Dogecoin");
              $('#credit_usd').val(amt_n.toFixed(5));
              $('#crypto_amount').val(amt_n);
              $('.crypto_symbol').html('DOGE');
              spinner.hide();
            })
          } else if (wallet == "bnb") {
            $.get("https://min-api.cryptocompare.com/data/price?fsym=BNB&tsyms=BNB,USD,EUR", function(data, status) {
              var BNB = data.USD;
              var amt_n = amount_to_send / BNB;
              //$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
              $('.credit_symbol').html('BNB');
              $('#credit_wallet_name').val("BNB");
              $('#credit_usd').val(amt_n.toFixed(5));
              $('#crypto_amount').val(amt_n);
              $('.crypto_symbol').html('BNB');
              spinner.hide();
            })
          } else if (wallet == "BCH") {
            $.get("https://min-api.cryptocompare.com/data/price?fsym=BCH&tsyms=BCH,USD,EUR", function(data, status) {
              var BCH = data.USD;
              var amt_n = amount_to_send / BCH;
              //$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
              $('.credit_symbol').html('BCH');
              $('#credit_wallet_name').val("BCH");
              $('#credit_usd').val(amt_n.toFixed(5));
              $('.crypto_symbol').html('BCH');
              $('#crypto_amount').val(amt_n);
              spinner.hide();
            })
          }
        }
        // 
      })


      $(document).on('change', '#walletss', function(e) {
        var spinner = $('#loader_submit');
        spinner.show();
        var payment_method = $('#payment_method').val();
        var wallet = $(this).val();
        //$('#payment_div').show();
        var amount_to_send = $('#amount_to_send').val() != "" ? $('#amount_to_send').val() : 0;

        if (payment_method == "Bitcoin") {
          $('.crypto_symbol').html('BTC');

          $.get("https://blockchain.info/tobtc?currency=USD&value=" + amount_to_send, function(data, status) {

            $('#crypto_amount').val(data);
            ////$('#wallet_address').val('0x327eC41685Fc99A494a9BFA6A08d1d77688eE8C3');

            //alert("Data: " + data + "\nStatus: " + status);

            spinner.hide();
          });

        } else if (payment_method == "Ethereum") {
          $('.crypto_symbol').html('ETH');
          $('.credit_symbol').html('ETH');

          $.get("https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=ETH,USD,EUR", function(data, status) {
            //alert("Data: " + JSON.stringify(data) + "\nStatus: " + status);
            var eth = data.USD;
            var amt_n = amount_to_send / eth;
            $('#crypto_amount').val(amt_n.toFixed(5));
            // $('#crypto_amount').val(eth*amount_to_send);
            spinner.hide();
          });

        } else if (payment_method == "Litecoin") {
          $.get("https://min-api.cryptocompare.com/data/price?fsym=LTC&tsyms=LTC,USD,EUR", function(data, status) {
            ////$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
            $('.credit_symbol').html('LTC');

            var ltc = data.USD;
            var amt_n = amount_to_send / ltc;
            //$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');


            $('#crypto_amount').val(amt_n.toFixed(5));


            $('.crypto_symbol').html('LTC');
            spinner.hide();
          })
        } else if (payment_method == "Dogecoin") {
          $.get("https://min-api.cryptocompare.com/data/price?fsym=DOGE&tsyms=DOGE,USD,EUR", function(data, status) {
            ////$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
            $('.credit_symbol').html('DOGE');

            var DOGE = data.USD;
            var amt_n = amount_to_send / DOGE;
            //$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');


            $('#crypto_amount').val(amt_n.toFixed(5));


            $('.crypto_symbol').html('DOGE');
            spinner.hide();
          })
        } else if (payment_method == "bnb") {
          $.get("https://min-api.cryptocompare.com/data/price?fsym=BNB&tsyms=BNB,USD,EUR", function(data, status) {
            ////$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
            $('.credit_symbol').html('BNB');

            var BNB = data.USD;
            var amt_n = amount_to_send / BNB;
            //$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');


            $('#crypto_amount').val(amt_n.toFixed(5));


            $('.crypto_symbol').html('BNB');
            spinner.hide();
          })
        } else if (payment_method == "xrp") {
          $.get("https://min-api.cryptocompare.com/data/price?fsym=XRP&tsyms=XRP,USD,EUR", function(data, status) {
            ////$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
            $('.credit_symbol').html('XRP');

            var XRP = data.USD;
            var amt_n = amount_to_send / XRP;
            //$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');


            $('#crypto_amount').val(amt_n.toFixed(5));


            $('.crypto_symbol').html('XRP');
            spinner.hide();
          })
        } else {
          spinner.hide();
        }

        if (payment_method != "") {
          spinner.show();
          if (wallet == "Bitcoin") {
            $.get("https://blockchain.info/tobtc?currency=USD&value=" + amount_to_send, function(data, status) {
              //alert(data)
              //$('#wallet_address').val('0x327eC41685Fc99A494a9BFA6A08d1d77688eE8C3');
              $('.credit_symbol').html('BTC');
              $('#credit_wallet_name').val("Bitcoin");
              $('#credit_usd').val(data);
              //$('#credit_usd').val(data);             
              //alert("Data: " + data + "\nStatus: " + status);
              spinner.hide();

            });

          } else if (wallet == "Ethereum") {
            $.get("https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=ETH,USD,EUR", function(data, status) {
              //alert("Data: " + JSON.stringify(data) + "\nStatus: " + status);
              var eth = data.USD;
              //$('#crypto_amount').val(eth*amount_to_send);
              //alert(eth)
              //$('#wallet_address').val('0x327eC41685Fc99A494a9BFA6A08d1d77688eE8C3');
              $('.credit_symbol').html('ETH');
              $('#credit_wallet_name').val("Ethereum");

              var amt_n = amount_to_send / eth;
              $('#credit_usd').val(amt_n.toFixed(5));

              //$('#credit_usd').val(eth*amount_to_send);
              spinner.hide();
            });

          } else if (wallet == "Litecoin") {

            $.get("https://min-api.cryptocompare.com/data/price?fsym=LTC&tsyms=LTC,USD,EUR", function(data, status) {
              var ltc = data.USD;
              var amt_n = amount_to_send / ltc;
              //$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
              $('.credit_symbol').html('LTC');
              $('#credit_wallet_name').val("Litecoin");
              $('#credit_usd').val(amt_n.toFixed(5));


              spinner.hide();
            })
          } else if (wallet == "Dogecoin") {

            $.get("https://min-api.cryptocompare.com/data/price?fsym=DOGE&tsyms=DOGE,USD,EUR", function(data, status) {
              var DOGE = data.USD;
              var amt_n = amount_to_send / DOGE;
              //$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
              $('.credit_symbol').html('DOGE');
              $('#credit_wallet_name').val("Dogecoin");
              $('#credit_usd').val(amt_n.toFixed(5));


              spinner.hide();
            })
          } else if (wallet == "bnb") {

            $.get("https://min-api.cryptocompare.com/data/price?fsym=BNB&tsyms=BNB,USD,EUR", function(data, status) {
              var BNB = data.USD;
              var amt_n = amount_to_send / BNB;
              //$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
              $('.credit_symbol').html('BNB');
              $('#credit_wallet_name').val("BNB");
              $('#credit_usd').val(amt_n.toFixed(5));


              spinner.hide();
            })
          } else if (wallet == "xrp") {

            $.get("https://min-api.cryptocompare.com/data/price?fsym=XRP&tsyms=XRP,USD,EUR", function(data, status) {
              var XRP = data.USD;
              var amt_n = amount_to_send / XRP;
              //$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
              $('.credit_symbol').html('XRP');
              $('#credit_wallet_name').val("XRP");
              $('#credit_usd').val(amt_n.toFixed(5));


              spinner.hide();
            })
          } else {
            spinner.hide();
          }
        }
        // 
      })


      $(document).on('keyup', '#amount_to_send', function(e) {
        var payment_method = $('#payment_method').val();
        var wallet = $('#wallet').val();
        if (wallet != "") {
          var spinner = $('#loader_submit');
          spinner.show();

          //$('#payment_div').show();
          var amount_to_send = $('#amount_to_send').val() != "" ? $('#amount_to_send').val() : 0;
          console.log(amount_to_send, $(this).val())

          // if (payment_method == "Bitcoin") {
          //   $('.crypto_symbol').html('BTC');

          //   $.get("https://blockchain.info/tobtc?currency=USD&value=" + amount_to_send, function(data, status) {
          //     console.log(data);

          //     $('#crypto_amount').val(data);
          //     ////$('#wallet_address').val('0x327eC41685Fc99A494a9BFA6A08d1d77688eE8C3');

          //     //alert("Data: " + data + "\nStatus: " + status);

          //     spinner.hide();
          //   });

          // } else if (payment_method == "Ethereum") {
          //   $('.crypto_symbol').html('ETH');
          //   $('.credit_symbol').html('ETH');

          //   $.get("https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=ETH,USD,EUR", function(data, status) {
          //     //alert("Data: " + JSON.stringify(data) + "\nStatus: " + status);
          //     var eth = data.USD;

          //     var amt_n = amount_to_send / eth;
          //     $('#crypto_amount').val(amt_n.toFixed(5));



          //     //$('#crypto_amount').val(eth*amount_to_send);
          //     spinner.hide();
          //   });

          // } else if (payment_method == "Litecoin") {
          //   ////$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc')
          //   $.get("https://min-api.cryptocompare.com/data/price?fsym=LTC&tsyms=LTC,USD,EUR", function(data, status) {
          //     $('.credit_symbol').html('LTC');
          //     var ltc = data.USD;
          //     $('#crypto_amount').val((amount_to_send / ltc).toFixed(5));
          //     $('.crypto_symbol').html('LTC');
          //     spinner.hide();
          //   })
          // } else if (payment_method == "Dogecoin") {
          //   ////$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc')
          //   $.get("https://min-api.cryptocompare.com/data/price?fsym=DOGE&tsyms=DOGE,USD,EUR", function(data, status) {
          //     $('.credit_symbol').html('DOGE');
          //     var DOGE = data.USD;
          //     $('#crypto_amount').val((amount_to_send / DOGE).toFixed(5));
          //     $('.crypto_symbol').html('DOGE');
          //     spinner.hide();
          //   })
          // } else if (payment_method == "bnb") {
          //   ////$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc')
          //   $.get("https://min-api.cryptocompare.com/data/price?fsym=BNB&tsyms=BNB,USD,EUR", function(data, status) {
          //     $('.credit_symbol').html('BNB');
          //     var BNB = data.USD;
          //     $('#crypto_amount').val((amount_to_send / BNB).toFixed(5));
          //     $('.crypto_symbol').html('BNB');
          //     spinner.hide();
          //   })
          // } else if (payment_method == "xrp") {
          //   ////$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc')
          //   $.get("https://min-api.cryptocompare.com/data/price?fsym=XRP&tsyms=XRP,USD,EUR", function(data, status) {
          //     $('.credit_symbol').html('XRP');
          //     var XRP = data.USD;
          //     $('#crypto_amount').val((amount_to_send / XRP).toFixed(5));
          //     $('.crypto_symbol').html('XRP');
          //     spinner.hide();
          //   })
          // } else {
          //   spinner.hide();
          // }


          spinner.show();
          if (wallet == "Bitcoin") {
            $.get("https://blockchain.info/tobtc?currency=USD&value=" + amount_to_send, function(data, status) {
              //alert(data)
              //$('#wallet_address').val('0x327eC41685Fc99A494a9BFA6A08d1d77688eE8C3');
              $('.credit_symbol').html('BTC');
              $('#credit_wallet_name').val("Bitcoin");
              $('.crypto_symbol').html('BTC');
              $('#credit_usd').val(data);
              $('#crypto_amount').val(data);
              //$('#credit_usd').val(data);             
              //alert("Data: " + data + "\nStatus: " + status);
              spinner.hide();

            });

          } else if (wallet == "Ethereum") {
            $.get("https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=BTC,USD,EUR", function(data, status) {
              //alert("Data: " + JSON.stringify(data) + "\nStatus: " + status);
              var eth = data.USD;
              //$('#crypto_amount').val(eth*amount_to_send);
              //alert(eth)
              //$('#wallet_address').val('0x327eC41685Fc99A494a9BFA6A08d1d77688eE8C3');
              $('.credit_symbol').html('ETH');
              $('#credit_wallet_name').val("Ethereum");
              $('.crypto_symbol').html('ETH');
              $('#credit_usd').val((amount_to_send / eth).toFixed(5));
              $('#crypto_amount').val((amount_to_send / eth).toFixed(5));
              spinner.hide();
            });

          } else if (wallet == "Litecoin") {
            $.get("https://min-api.cryptocompare.com/data/price?fsym=LTC&tsyms=LTC,USD,EUR", function(data, status) {
              var ltc = data.USD;

              //$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
              $('.credit_symbol').html('LTC');
              $('#credit_wallet_name').val("Litecoin");
              $('.crypto_symbol').html('LTC');
              $('#credit_usd').val((amount_to_send / ltc).toFixed(5));
              $('#crypto_amount').val((amount_to_send / ltc).toFixed(5));
              spinner.hide();
            })
          } else if (wallet == "Dogecoin") {
            $.get("https://min-api.cryptocompare.com/data/price?fsym=DOGE&tsyms=DOGE,USD,EUR", function(data, status) {
              var DOGE = data.USD;

              //$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
              $('.credit_symbol').html('DOGE');
              $('.crypto_symbol').html('DOGE');
              $('#credit_wallet_name').val("Dogecoin");
              $('#credit_usd').val((amount_to_send / DOGE).toFixed(5));
              $('#crypto_amount').val((amount_to_send / DOGE).toFixed(5));
              spinner.hide();
            })
          } else if (wallet == "bnb") {
            $.get("https://min-api.cryptocompare.com/data/price?fsym=BNB&tsyms=BNB,USD,EUR", function(data, status) {
              var BNB = data.USD;

              //$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
              $('.crypto_symbol').html('BNB');
              $('.credit_symbol').html('BNB');
              $('#credit_wallet_name').val("BNB");
              $('#credit_usd').val((amount_to_send / BNB).toFixed(5));
              $('#crypto_amount').val((amount_to_send / BNB).toFixed(5));
              spinner.hide();
            })
          } else if (wallet == "BCH") {
            $.get("https://min-api.cryptocompare.com/data/price?fsym=BCH&tsyms=BCH,USD,EUR", function(data, status) {
              var BCH = data.USD;

              //$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
              $('.crypto_symbol').html('BCH');
              $('.credit_symbol').html('BCH');
              $('#credit_wallet_name').val("BCH");
              $('#credit_usd').val((amount_to_send / BCH).toFixed(5));
              $('#crypto_amount').val((amount_to_send / BCH).toFixed(5));
              
              spinner.hide();
            })
          } else {
            spinner.hide();
          }
        }
        // 
      })

      $(document).on('submit', '#form_ms', function(e) {

        e.preventDefault()
        var url = "../access/signup-auth.php?action=deposit";
        Swal.fire({
          title: 'Are you sure?',
          text: "You want to continue",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.value) {
            var spinner = $('#loader_submit');
            spinner.show();

            var form = $(this);
            var data = form.serialize();
            $.ajax({
              url: url,
              type: 'POST',
              data: data,
              //dataType: 'json',
              success: function(response) {
                spinner.hide();
                console.log(response)
                var data =JSON.parse(response);

                if (data.status) {
                  //$('#modal'+id).modal('hide')
                  //alert("Deposit log successfully")
                  //  $('#form_bitcoin')[0].reset()
                  location.assign('confirm_deposit.php?trans_id=' + data.trans_id);
                } else {
                  alert(data.message)

                }
              },
              error: function(error) {
                spinner.hide();
                console.log(error)
                console.log(url)
                Swal.fire({
                  position: 'top-end',
                  type: 'error',
                  title: data.message,
                  showConfirmButton: false,
                  timer: 1500
                });

              }
            })
          }
        })

      })

    })
  </script>
</body>

</html>