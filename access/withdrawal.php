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
    <title>Home- Trade-Rich</title>
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
    .active_li{
        background-color: #ffffff !important;
    }
    .active_links{
        color: #000
    }
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
</style>
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class=" ">
    <div id="loader_submit" class="loader"></div>
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
                            <h1 class="title">Trade-Rich Withdrawal</h1>
                            <!-- PAGE HEADING TAG - END -->
                        </div>

                    </div>
                </div>
               

                <div class="clearfix"></div>
                <!-- MAIN CONTENT AREA STARTS -->

                <div class='col-xs-12'>

                    <div class="pull-left">
                        <!-- PAGE HEADING TAG - START -->
                        <h4 class="title boldy mb-5 mt-15">Withdrawal</h4>
                        <!-- PAGE HEADING TAG - END -->
                    </div>

                </div>

                <div class="clearfix"></div>
                  <div class="alert alert-info">
                    <span class="fa fa-info-circle"></span>
                   <small> Choose the wallet address you want to withdraw from and the amount...</small>
                </div>
                <div class="col-lg-12">
                    <section class="box ">
                        <header class="panel_header">
                            <h2 class="title pull-left">Select Wallet addresses</h2>
                            <div class="actions panel_actions pull-right">
                                <a class="box_toggle fa fa-chevron-down"></a>
                                <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                                <a class="box_close fa fa-times"></a>
                            </div>
                        </header>
                        <div class="content-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="row tabs-area">
                                        <ul class="nav nav-tabs crypto-wallet-address vertical col-xs-4 col-md-3 left-aligned primary">
                                            <li class="active text-center relative">
                                                <a href="#home-5" data-toggle="tab" aria-expanded="true">
                                                    <img src="data/crypto-dash/coin1.png" class="crypto-i" alt="">
                                                    <h4>Bitcoin</h4>
                                                </a>
                                                <div class="check-span"><i class="fa fa-check"></i></div>
                                            </li>
                                            <li class="text-center relative">
                                                <a href="#profile-5" data-toggle="tab" aria-expanded="false">
                                                    <img src="data/crypto-dash/coin2.png" class="crypto-i" alt="">
                                                    <h4>Ethereum</h4>
                                                </a>
                                                <div class="check-span"><i class="fa fa-check"></i></div>
                                            </li>
                                            <li class="text-center relative">
                                                <a href="#messages-5" data-toggle="tab" aria-expanded="false">
                                                    <img src="data/crypto-dash/coin8.png" class="crypto-i" alt="">
                                                    <h4>Litecoin</h4>
                                                </a>
                                                <div class="check-span"><i class="fa fa-check"></i></div>
                                            </li>
                                            <!-- <li class="text-center relative">
                                                <a href="#settings-5" data-toggle="tab">
                                                    <img src="data/crypto-dash/coin6.png" class="crypto-i" alt="">
                                                    <h4>Dogecoin</h4>
                                                </a>
                                                <div class="check-span"><i class="fa fa-check"></i></div>
                                            </li> -->
                                        </ul>

                                        <div class="tab-content wallet-address-tab vertical col-xs-12 col-lg-9 left-aligned primary" style="padding-right: 0px;">
                                            <div class="tab-pane fade active in" id="home-5">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="option-identity-wrapper mb-15">
                                                            <h3 class="boldy mt-0">BTC Balance:  <?php
                          $user_id=$_SESSION['user_id'];
                          $qrx=mysqli_query($db,"select bitcoin from accounts where user_id=$user_id") or die(mysqli_error($db));
                          echo mysqli_fetch_array($qrx)['bitcoin'];
                           ?></h3>

                                                            <div class="row">
                                                                <form id="form_bitcoin" >
                                                                <div class="col-lg-12">
                                                                    <div class="form-group mb-0">
                                                                        <label class="form-label mb-10">Enter your Wallet Address</label>
                                                                        
                                                                        <div class="input-group primary">
                                                                            <span class="input-group-addon">                
                                                                            <span class="arrow"></span>
                                                                            <i class="cc BTC-alt"></i>
                                                                            </span>
                                                                            <input name="address" type="text" class="form-control" required value="" >
                                                                        </div>
                                                                        <input type="hidden" name="wallet" value="bitcoin">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group mb-0">
                                                                        <label class="form-label mb-10">Amount</label>
                                                                        
                                                                        <div class="input-group primary">
                                                                            <span class="input-group-addon">                
                                                                            <span class="arrow"></span>
                                                                            <i class="fa fa-money"></i>
                                                                            </span>
                                                                            <input name="amount" type="text" class="form-control" required value="">
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 no-pl mt-30">
                                                                   
                                                                    <button type="submit" class="btn btn-primary btn-corner right15">Submit</button>
                                                                </div>
                                                            </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="profile-5">

                                                <div class="row">
                                                      <div class="col-xs-12">
                                                        <div class="option-identity-wrapper mb-15">
                                                            <h3 class="boldy mt-0">ETH Balance:  <?php
                          $user_id=$_SESSION['user_id'];
                          $qrx=mysqli_query($db,"select Etherium from accounts where user_id=$user_id") or die(mysqli_error($db));
                          echo mysqli_fetch_array($qrx)['Etherium'];
                           ?></h3>

                                                            <div class="row">
                                                                <form id="form_etherium">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group mb-0">
                                                                        <label class="form-label mb-10">Enter your Wallet Address</label>
                                                                        
                                                                        <div class="input-group primary">
                                                                            <span class="input-group-addon">                
                                                                            <span class="arrow"></span>
                                                                            <i class="cc ETH-alt"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control" name="address" value="" required>
                                                                        </div>
                                                                        <input type="hidden" name="wallet" value="etherium">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group mb-0">
                                                                        <label class="form-label mb-10">Amount</label>
                                                                        
                                                                        <div class="input-group primary">
                                                                            <span class="input-group-addon">                
                                                                            <span class="arrow"></span>
                                                                            <i class="fa fa-money"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control" name="amount" required value="">
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 no-pl mt-30">
                                                                   
                                                                    <button type="submit" class="btn btn-primary btn-corner right15">Submit</button>
                                                                </div>
                                                            </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                            </div>
                                            <div class="tab-pane fade" id="messages-5">

                                                <div class="row">
                                                     <div class="col-xs-12">
                                                        <div class="option-identity-wrapper mb-15">
                                                            <h3 class="boldy mt-0">LTE Balance:  <?php
                          $user_id=$_SESSION['user_id'];
                          $qrx=mysqli_query($db,"select litecoin from accounts where user_id=$user_id") or die(mysqli_error($db));
                          echo mysqli_fetch_array($qrx)['litecoin'];
                           ?></h3>

                                                            <div class="row">
                                                                <form id="form_litecoin">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group mb-0">
                                                                        <label class="form-label mb-10">Enter your Wallet Address</label>
                                                                        
                                                                        <div class="input-group primary">
                                                                            <span class="input-group-addon">                
                                                                            <span class="arrow"></span>
                                                                            <i class="cc LTC-alt"></i>
                                                                            </span>
                                                                            <input type="text" name="address" class="form-control" required value="" >
                                                                        </div>
                                                                        <input type="hidden" name="wallet" value="litecoin">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group mb-0">
                                                                        <label class="form-label mb-10">Amount</label>
                                                                        
                                                                        <div class="input-group primary">
                                                                            <span class="input-group-addon">                
                                                                            <span class="arrow"></span>
                                                                            <i class="fa fa-money"></i>
                                                                            </span>
                                                                            <input type="text" name="amount" class="form-control" required value="">
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 no-pl mt-30">
                                                                   
                                                                     <button type="submit" class="btn btn-primary btn-corner right15">Submit</button>
                                                                </div>
                                                            </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                </div>

                                            </div>

                                          
                                        </div>
                                    </div>

                                    <!-- </div>  -->

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="clearfix"></div>

                



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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script type="text/javascript">
    $(document).on('submit','#form_bitcoin',function(e){
    
    e.preventDefault()
    var url="signup-auth.php?action=withdrawal";
  var spinner = $('#loader_submit');
    spinner.show();
        
        var form=$(this);
    var data=form.serialize();
     $.ajax({
        url:url,
        type:'POST',
        data:data,
        //dataType: 'json',
        success:function(response){
          spinner.hide();
            console.log(response)
            var data=JSON.parse(response);
            
            if (data.status) {
                //$('#modal'+id).modal('hide')
                Swal.fire({
                  position: 'top-end',
                  type: 'success',
                  title: data.message,
                  showConfirmButton: false,
                  timer: 4000
                });
                $('#form_bitcoin')[0].reset()
                //location.assign('index.php');
            }else{
                Swal.fire({
                  position: 'top-end',
                  type: 'error',
                  title: data.message,
                  showConfirmButton: false,
                  timer: 3000
                });
                
            }
        },
        error:function(error){
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
    
    
})

      $(document).on('submit','#form_etherium',function(e){
    
    e.preventDefault()
    var url="signup-auth.php?action=withdrawal";
  var spinner = $('#loader_submit');
    spinner.show();
        
        var form=$(this);
    var data=form.serialize();
     $.ajax({
        url:url,
        type:'POST',
        data:data,
        //dataType: 'json',
        success:function(response){
          spinner.hide();
            console.log(response)
            var data=JSON.parse(response);
            
            if (data.status) {
                //$('#modal'+id).modal('hide')
                Swal.fire({
                  position: 'top-end',
                  type: 'success',
                  title: data.message,
                  showConfirmButton: false,
                  timer: 4000
                });
                $('#form_etherium')[0].reset();
                //location.assign('index.php');
            }else{
                Swal.fire({
                  position: 'top-end',
                  type: 'error',
                  title: data.message,
                  showConfirmButton: false,
                  timer: 3000
                });
                
            }
        },
        error:function(error){
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
    
    
})

        $(document).on('submit','#form_litecoin',function(e){
    
    e.preventDefault()
    var url="signup-auth.php?action=withdrawal";
  var spinner = $('#loader_submit');
    spinner.show();
        
        var form=$(this);
    var data=form.serialize();
     $.ajax({
        url:url,
        type:'POST',
        data:data,
        //dataType: 'json',
        success:function(response){
          spinner.hide();
            console.log(response)
            var data=JSON.parse(response);
            
            if (data.status) {
                //$('#modal'+id).modal('hide')
                Swal.fire({
                  position: 'top-end',
                  type: 'success',
                  title: data.message,
                  showConfirmButton: false,
                  timer: 4000
                });
                $('#form_litecoin')[0].reset()
                //location.assign('index.php');
            }else{
                Swal.fire({
                  position: 'top-end',
                  type: 'error',
                  title: data.message,
                  showConfirmButton: false,
                  timer: 3000
                });
                
            }
        },
        error:function(error){
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
    
    
})
  </script>
</body>

</html>