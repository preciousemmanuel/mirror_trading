<?php
session_start();
if(!isset($_SESSION['user_id'])){
  echo ("<script>location.href='../login.html'</script>");
}

include '../access/db.php';
$id = $_SESSION['user_id'];
?>

<?php 






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
  <title>Expert Traders - Mirror Trading</title>

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
              <p class="text-primary mb-0 hover-cursor">Expert Traders Investment</p>
            </div>
          </div>
        </div>
        <!-- /breadcrumb -->

        <!-- row  -->

        <!-- /row -->

        <!-- row -->



          <!-- row -->
          <div class="row">

          <?php
                    
          $qr1=mysqli_query($db,"select t.*,deposit.copied_trader as traderid from traders t left join deposit_histories deposit on t.id=deposit.copied_trader and deposit.user_id=$id and deposit.status!='pending' ");
          while ($row=mysqli_fetch_array($qr1)) {

          ?>

            <div class="col-sm-12 col-lg-4">
              <div class="card">
                <div class="card-body text-center">
                  <div class="profile-pic mb-3">
                    <img src="<?= $row["img"] ?>" class="brround avatar avatar-lg mx-auto"
                      alt="user">
                    <h5 class="mt-3 mb-0 font-weight-semibold tx-18"><?= $row["name"] ?></h5>
                    <p class="text-grey-light my-text-mg-up"><?= $row["loses"] ?> Losses</p>
                    <p class="text-grey-light my-tx-mg-neg"><?= $row["win_percent"] ?> % Win Rate</p>
                    <p class="text-grey-light my-tx-mg-neg"><?= $row["interest"] ?>% Profit Share</p>
                  </div>
                  <?php
                  $stocks=explode(",",$row["investments"]);
                  foreach ($stocks as $key => $value) {
                   ?>
                    <div class="chip"><?= $value ?></div>
                   <?php
                  }
                  ?>
                 
                  <div class="chip bg-primary text-white"><?= $row["win_percent"] ?>%</div>
                </div>
                <div class="p-4 b-t card-footer">
                  <div class="row text-center">
                    <div class="col-12 text-center">
                      <div class="text-center">
                        <?php
                          if($row["id"]==$row["traderid"]){
                            ?>
                        <a href="#" class="btn btn-success">Copied</a>

                            <?php
                          }else{
                            ?>
                        <a href="trading-investment.php?trader=<?= $row['id'] ?>" class="btn btn-outline-primary">Copy Trader</a>

                            <?php
                          }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php } ?>
            

          </div>
          <!-- row -->

          <!-- row -->
       
          <!-- row -->


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
