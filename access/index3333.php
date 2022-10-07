<?php
session_start();
if(!isset($_SESSION['user_id'])){
  echo ("<script>location.href='login.php'</script>");
}
?>
<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home- CFX Mining</title>
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
    <!-- For iPhone -->
    <link rel="apple-touch-icon-precomposed" href="assets/images/apple-touch-icon-57-precomposed.png">
    <!-- For iPhone 4 Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/apple-touch-icon-114-precomposed.png">
    <!-- For iPad -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/apple-touch-icon-72-precomposed.png">
    <!-- For iPad Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/apple-touch-icon-144-precomposed.png">

    <!-- CORE CSS FRAMEWORK - START -->
    <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/fonts/webfont/cryptocoins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
    <!-- CORE CSS FRAMEWORK - END -->

    <!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - START -->

    <link href="assets/plugins/jvectormap/jquery-jvectormap-2.0.1.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/morris-chart/css/morris.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/calendar/fullcalendar.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="assets/plugins/icheck/skins/minimal/minimal.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="assets/plugins/swiper/swiper.css" rel="stylesheet" type="text/css">

    <!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - END -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CORE CSS TEMPLATE - START -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <!-- CORE CSS TEMPLATE - END -->
<style type="text/css">
    .active{
        background-color: #ffffff !important;
    }
    .active_link{
        color: #000
    }
</style>
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class=" ">
    <!-- START TOPBAR -->
  
    <!-- END TOPBAR -->
    <!-- START CONTAINER -->
    <?php require 'nav_user.php'; ?>
        <!--  SIDEBAR - END -->

        <!-- START CONTENT -->
        <section id="main-content" class=" ">
            <div class="wrapper main-wrapper row" style=''>
                <div class="alert alert-info">Welcome <?= $_SESSION['name'] ?> to CFXMining!</div>
                <div class='col-xs-12'>
                    <div class="page-title">

                        <div class="pull-left">
                            <!-- PAGE HEADING TAG - START -->
                            <h1 class="title">CFX Mining Dashboard</h1>
                            <!-- PAGE HEADING TAG - END -->
                        </div>

                    </div>
                </div>
               

                <div class="clearfix"></div>
                <!-- MAIN CONTENT AREA STARTS -->

                <div class='col-xs-12'>
                    
                    <div class="pull-left">
                        <!-- PAGE HEADING TAG - START -->
                        <h4 class="title boldy mb-5 mt-15">Crypto Balance</h4>
                        <!-- PAGE HEADING TAG - END -->
                    </div>

                </div>

                <div class="clearfix"></div>
                
                <div class="col-lg-9 mt-15 mb-15">
                    <section class="wra">
                        <div class="swiper-container coins-slider text-center">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="coin-box flex align-items-center">
                                        <div class="coin-icon mr-10">
                                            <img src="data/crypto-dash/coin1.png" alt="">
                                        </div>
                                        <div class="coin-balance text-left">
                                            <h5 class="coin-name boldy">Bitcoin Balance</h5>
                                            <p class="mb-0"><?php
                          $user_id=$_SESSION['user_id'];
                          $qrx=mysqli_query($db,"select bitcoin from accounts where user_id=$user_id") or die(mysqli_error($db));
                          echo mysqli_fetch_array($qrx)['bitcoin'];
                           ?><i class="complete fa fa-arrow-up ml-10"></i></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="coin-box flex align-items-center">
                                        <div class="coin-icon mr-10">
                                            <img src="data/crypto-dash/coin2.png" alt="">
                                        </div>
                                        <div class="coin-balance text-left">
                                            <h5 class="coin-name boldy">Eth Balance</h5>
                                            <p class="mb-0"><?php
                         // $user_id=$_SESSION['user_id'];
                          $qrx=mysqli_query($db,"select etherium from accounts where user_id=$user_id") or die(mysqli_error($db));
                          echo mysqli_fetch_array($qrx)['etherium'];
                           ?><i class="cancelled fa fa-arrow-down ml-10"></i></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="coin-box flex align-items-center">
                                        <div class="coin-icon mr-10">
                                            <img src="data/crypto-dash/coin3.png" alt="">
                                        </div>
                                        <div class="coin-balance text-left">
                                            <h5 class="coin-name boldy">Litecoin Balance</h5>
                                            <p class="mb-0"><?php
                          //$user_id=$_SESSION['user_id'];
                          $qrx=mysqli_query($db,"select litecoin from accounts where user_id=$user_id") or die(mysqli_error($db));
                          echo mysqli_fetch_array($qrx)['litecoin'];
                           ?><i class="complete fa fa-arrow-up ml-10"></i></p>
                                        </div>
                                    </div>
                                </div>
                               <!--  <div class="swiper-slide">
                                    <div class="coin-box flex align-items-center">
                                        <div class="coin-icon mr-10">
                                            <img src="data/crypto-dash/coin4.png" alt="">
                                        </div>
                                        <div class="coin-balance text-left">
                                            <h5 class="coin-name boldy">Ripple Balance</h5>
                                            <p class="mb-0">210.3123<i class="complete fa fa-arrow-up ml-10"></i></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="coin-box flex align-items-center">
                                        <div class="coin-icon mr-10">
                                            <img src="data/crypto-dash/coin5.png" alt="">
                                        </div>
                                        <div class="coin-balance text-left">
                                            <h5 class="coin-name boldy">Bitcoincash</h5>
                                            <p class="mb-0">2.092832<i class="complete fa fa-arrow-up ml-10"></i></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="coin-box flex align-items-center">
                                        <div class="coin-icon mr-10">
                                            <img src="data/crypto-dash/coin6.png" alt="">
                                        </div>
                                        <div class="coin-balance text-left">
                                            <h5 class="coin-name boldy">Doge Balance</h5>
                                            <p class="mb-0">877393,12<i class="cancelled fa fa-arrow-down ml-10"></i></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="coin-box flex align-items-center">
                                        <div class="coin-icon mr-10">
                                            <img src="data/crypto-dash/coin7.png" alt="">
                                        </div>
                                        <div class="coin-balance text-left">
                                            <h5 class="coin-name boldy">Monero Balance</h5>
                                            <p class="mb-0">1.932845<i class="complete fa fa-arrow-up ml-10"></i></p>
                                        </div>
                                    </div>
                                </div> -->
                            </div>

                        </div>
                        <!-- <div class="apg-arrows"> -->
                            <!-- Add Navigation -->
                            <!-- <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div> -->
                        <!-- </div> -->
                    </section>
                </div>
                <div class="col-md-1"></div>
                <div class="col-lg-2 no-pl mt-15 mb-15">
                    <a href="choose_plan.php" type="button" class="btn btn-primary gradient-blue" style="width:100%">
                        <div><span class="add-plus fa fa-plus"></span> </div>Deposit
                    </a>
                </div>

                <div class="clearfix"></div>

                



                <!-- MAIN CONTENT AREA ENDS -->
            </div>
        </section>
        <!-- END CONTENT -->
        
=
    </div>
    <!-- END CONTAINER -->
    <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->

    <!-- CORE JS FRAMEWORK - START -->
    <script src="assets/plugins/swiper/jquery.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/pace/pace.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/plugins/viewport/viewportchecker.js"></script>
    <script>
        window.jQuery || document.write('<script src="assets/js/jquery-1.11.2.min.js"><\/script>');
    </script>
    <!-- CORE JS FRAMEWORK - END -->
   
    <script src="assets/plugins/swiper/swiper.js"></script>
    <script src="assets/js/dashboard-crypto.js"></script>

    
    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->

    <!-- CORE TEMPLATE JS - START -->
    <script src="assets/js/scripts.js"></script>
    <!-- END CORE TEMPLATE JS - END -->

</body>

</html>