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
    <style type="text/css">
    .active{
        background-color: #ffffff !important;
    }
    .active_link{
        color: #000
    }
</style>
    <!-- CORE CSS TEMPLATE - END -->

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

                <div class='col-xs-12'>
                    <div class="page-title">

                        <div class="pull-left">
                            <!-- PAGE HEADING TAG - START -->
                            <h1 class="title">CFX Mining Plans</h1>
                            <!-- PAGE HEADING TAG - END -->
                        </div>

                    </div>
                </div>
               

                <div class="clearfix"></div>
                <!-- MAIN CONTENT AREA STARTS -->

                <div class='col-xs-12'>

                    <div class="pull-left">
                        <!-- PAGE HEADING TAG - START -->
                        <h4 class="title boldy mb-5 mt-15">CFX Mining Plans</h4>
                        <!-- PAGE HEADING TAG - END -->
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="alert alert-info">
                    <span class="fa fa-info-circle"></span>
                   <small> Choose a plan copy any of the crypto address of your choice and pay make your deposit. Send prove of payment to admin@cfxmining.com. Your account will be credited 24hrs.</small>
                </div>
               <div class="col-lg-4 col-sm-6 col-xs-12">
                    <div class="ref-num-box statistics-box text-center mt-15">
                        <div class="mb-15">
                            
                            <img src="data/crypto-dash/ref1.png" class="ico-icon-o mt-10 mb-10" alt="">
                            <h4 class="bold mt-10 mb-10">Standard </h4>
                            <p class="mb-0">Standard 1.5% at $500 minimum</p>
                            <div class="text-center">
                                <a data-toggle="modal" href="#cmpltadminModal-29" class="btn btn-primary mt-15 btn-corner">Continue</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-xs-12">
                    <div class="ref-num-box statistics-box text-center mt-15">
                        <div class="mb-15">
                            
                            <img src="data/crypto-dash/ref2.png" class="ico-icon-o mt-10 mb-10" alt="">
                            <h4 class="bold mt-10 mb-10">Premium plan </h4>
                            <p class="mb-0">Premium plan 3% at $3000</p>
                            <div class="text-center">
                                <a data-toggle="modal" href="#cmpltadminModal-29" class="btn btn-primary mt-15 btn-corner">Continue</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-xs-12">
                    <div class="ref-num-box statistics-box text-center mt-15">
                        <div class="mb-15">
                            
                            <img src="data/crypto-dash/ref3.png" class="ico-icon-o mt-10 mb-10" alt="">
                            <h4 class="bold mt-10 mb-10">PRO </h4>
                            <p class="mb-0">PRO at 5% $10000</p>
                            <div class="text-center">
                                <a data-toggle="modal" href="#cmpltadminModal-29" class="btn btn-primary mt-15 btn-corner">Continue</a>
                            </div>
                        </div>
                    </div>
                </div>
              <!--   <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="ref-num-box statistics-box text-center mt-15">
                        <div class="mb-15">
                            
                            <img src="data/crypto-dash/ref4.png" class="ico-icon-o mt-10 mb-10" alt="">
                            <h4 class="bold mt-10 mb-10">Advance </h4>
                            <p class="mb-0">$100,000 with a minimum of 10%</p>
                            <div class="text-center">
                                <a data-toggle="modal" href="#cmpltadminModal-29" class="btn btn-primary mt-15 btn-corner">Continue</a>
                            </div>
                        </div>
                    </div>
                </div>
 -->
                <div class="clearfix"></div>

                  <!-- modal start -->
                                        <div class="modal fade col-xs-12" id="cmpltadminModal-29" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog animated shake">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title">Deposit</h4>
                                                    </div>
                                                    <div class="modal-body">

                                                        <p class="font-weight-bold text-info">Please pay the plan amount to any of this crypto address: </p>
                                                        <div class="row">
                                                            <div class="crypto-info-wrap">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label class="form-label" style="color:#000">Bitcoin address</label>
                                            <span class="desc"></span>

                                            <div class="input-group mb-10">
                                                <span class="input-group-addon">
                                                    <span class="arrow"></span>
                                                    <img src="data/crypto-dash/icons/2.png" alt="icon">    
                                                </span>
                                                <input type="text" value="bc1q02rhs3mctsxq062dnzy7zahuumgkhjezx4n0c0" readonly class="form-control" placeholder="bc1q02rhs3mctsxq062dnzy7zahuumgkhjezx4n0c0">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="crypto-info-wrap">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label class="form-label" style="color:#000">Etherium address</label>
                                            <span class="desc"></span>

                                            <div class="input-group mb-10">
                                                <span class="input-group-addon">
                                                    <span class="arrow"></span>
                                                    <img src="data/crypto-dash/icons/2.png" alt="icon">    
                                                </span>
                                                <input type="text" value="0x540DB5EF08Fb2C9f4eedfb20e6311e7416f677F6" readonly class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="crypto-info-wrap">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label class="form-label" style="color:#000">Litecoin address</label>
                                            <span class="desc"></span>

                                            <div class="input-group mb-10">
                                                <span class="input-group-addon">
                                                    <span class="arrow"></span>
                                                    <img src="data/crypto-dash/icons/2.png" alt="icon">    
                                                </span>
                                                <input type="text" value="ltc1qw2su4khgsxhvmlklrp2fh5tskuqvyjs89f45zx" readonly class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
                                                        <!-- <button class="btn btn-success" type="button">Save changes</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- modal end -->



                <!-- MAIN CONTENT AREA ENDS -->
            </div>
        </section>
        <!-- END CONTENT -->
        

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