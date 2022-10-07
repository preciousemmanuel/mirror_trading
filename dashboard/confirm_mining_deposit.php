<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo ("<script>location.href='../login.html'</script>");
}
?>
<?php include '../access/db.php';

$id = $_SESSION['user_id'];

if (!isset($_GET['trans_id']) || empty($_GET['trans_id'])) {
    echo ("<script>location.href='index.php'</script>");
}
$trans_id = $_GET['trans_id'];
$qrx = mysqli_query($db, "select * from deposit_farm_histories where id=$trans_id") or die(mysqli_error($db));
$deposit = mysqli_fetch_array($qrx);


$qrx = mysqli_query($db, "select * from users where id=$id") or die(mysqli_error($db));
$user = mysqli_fetch_array($qrx);
$qrxF = mysqli_query($db, "select * from farm where user_id=$id") or die(mysqli_error($db));
$farm = mysqli_fetch_array($qrxF);
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
    <title>Confirm Minining - Mirror Trading</title>

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
    <style type="text/css">
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
                            <p class="text-primary mb-0 hover-cursor">Mining Investment</p>
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
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped table-responsive-sm">

                                                <tr>
                                                    <th>
                                                        WALLET
                                                    </th>
                                                    <th><?= $deposit['wallet'] ?></th>
                                                </tr>
                                                <tr>
                                                    <th>CRYPTO AMOUNT:</th>
                                                    <th>$<?= $deposit['crypto_amount'] ?></th>
                                                </tr>
                                                <tr>
                                                    <th>DEPOSIT METHOD:</th>
                                                    <th><?= $deposit['payment_method'] ?></th>
                                                </tr>
                                                <tr>
                                                    <th>STATUS: </th>
                                                    <th><?= $deposit['status'] == "pending" ? '<span class="badge badge-warning">Pending</span>' : '<span class="badge badge-success">Approved</span>' ?></th>
                                                </tr>
                                                <tr>
                                                    <th>DATE PAID: </th>
                                                    <th><?= $deposit['created_at'] ?></th>
                                                </tr>

                                                <tr>
                                                    <th>REF</th>
                                                    <th><?= $deposit['ref'] ?></th>
                                                </tr>
                                            </table>
                                        </div>



                                    </div>

                                    <?php
                                    if ($deposit['status'] == "pending") {
                                    ?>
                                        <div class="card" style="" id="payment_div">
                                            <center>
                                                <p class="card-title my-3">Pay into the address below and Enter Payment Date and ID </p>
                                            </center>
                                            <div class="card-body">
                                                <form id="form_ms">
                                                    <input type="hidden" name="ref" value="<?= $deposit['ref']; ?>">
                                                    <div class="form-group">

                                                        <div class="input-group">
                                                            
                                                                <div class="input-group-text crypto_symbol">
                                                                    <?php
                                                                    if ($deposit['payment_method'] == "Bitcoin") {
                                                                        echo "BTC";
                                                                    } elseif ($deposit['payment_method'] == "Litecoin") {
                                                                        echo "LTC";
                                                                    } elseif ($deposit['payment_method'] == "Dogecoin") {
                                                                        echo "LTC";
                                                                    } elseif ($deposit['payment_method'] == "Ethereum") {
                                                                        echo "LTC";
                                                                    } else {
                                                                        echo "ETH";
                                                                    } ?>

                                                                </div>
                                                            
                                                                <?php
                                                            if ($deposit['payment_method'] == "Bitcoin") {
                                                            ?>
                                                                <input type="text" name="wallet_address" disabled id="wallet_address" class="form-control " value="34E3rAQHy2964fZwuqqDewg3hQUsYqcE9R">
                                                            <?php
                                                            } elseif ($deposit['payment_method'] == "Ethereum") {
                                                            ?>
                                                                <input type="text" name="wallet_address" disabled id="wallet_address" class="form-control " value="0x31E202Abc818C08814630A4504bd429cF7Bd366E">
                                                            <?php
                                                            } elseif ($deposit['payment_method'] == "Dogecoin") {
                                                            ?>
                                                                <input type="text" name="wallet_address" disabled id="wallet_address" class="form-control " value="DRtcuSySKse7fRRxTmpqwwwKqLd1iZ68Uy">
                                                            <?php
                                                            } elseif ($deposit['payment_method'] == "Litecoin") {
                                                            ?>
                                                                <input type="text" name="wallet_address" disabled id="wallet_address" class="form-control " value="MFCJdS49hFA2eyyDy2CBbyvN8y2kVaEuW1">
                                                            <?php
                                                            } else {

                                                            ?>
                                                                <input type="text" value="qrueq8jj4n4thcu65nut28r2d258vuxv45negfxpqt" name="wallet_address" disabled id="wallet_address" class="form-control ">
                                                            <?php
                                                            } ?>

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Payment Date</label>
                                                                <div class="input-group">
                                                                    
                                                                        <div class="input-group-text"><span class="fa fa-dashboard"></span></div>
                                                                   
                                                                    <input type="date" placeholder="YYYY-MM-DD" id="mdate" class="form-control fc-datepicker" required name="date_paid">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Complete Deposit</button>
                                                </form>
                                            </div>

                                        </div>
                                    <?php } ?>

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

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type="text/javascript">
      $(document).ready(function(){


 $(document).on('submit','#form_ms',function(e){
    
    e.preventDefault();
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
    var url="../access/signup-auth.php?action=confirm_deposit_farm";
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
                alert(data.message)
                //$('#form_bitcoin')[0].reset()
                location.assign('index.php');
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
     }
     }) 
    
    
})
            // Datepicker
  $('.fc-datepicker').datepicker({
    showOtherMonths: true,
    selectOtherMonths: true
  });
      })
  
    </script>
</body>

</html>