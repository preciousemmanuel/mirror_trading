<?php
session_start();
if(!isset($_SESSION['admin_id'])){
  echo ("<script>location.href='admin_login.php'</script>");
}
?>
<?php include 'db.php'; ?>

<?php
if(isset($_POST['editAmount'])){
 
  
  $id=$_POST['trans_id'];
  $crypto_amount=(float) $_POST['crypto_amount'];
  $amount=(float) $_POST['amount'];
  $wallet=$_POST['wallet'];
  $user_id=$_POST['user_id'];
  $column='bitcoin';
  if($wallet=='Bitcoin'){
    $column='bitcoin';
  }elseif ($wallet=='Ripple') {
    $column='xrp';
  }else if($wallet=="Dogecoin"){
    $column='dogecoin';
  }else if($wallet=="Ethereum"){
    $column='etherium';
  }
  else if($wallet=="Litecoin"){
    $column='litecoin';
  }else if($wallet=="BCH"){
    $column='bch';
  }
  
  mysqli_query($db,"update deposit_farm_histories set status='approved' where id=$id") or die(mysqli_error($db));
 

  
 
  //update accounts

    $q=mysqli_query($db,"update deposits_farm set $column=$column+$crypto_amount,usd=usd+$amount where user_id=$user_id") or die(mysqli_error($db));
  
  if ($q) {
    echo "<script>alert('Approved successfull...')</script>";
  echo ("<script>location.href='deposit_farm.php'</script>");
  }else{
    var_dump(mysqli_error($db));

  }
}
if(isset($_POST['deleteDeposit'])){
 
  
  $id=$_POST['trans_id'];

  
  
  $q=mysqli_query($db,"delete from deposits where id=$id") or die(mysqli_error($db));
 
  //update accounts

    // $q=mysqli_query($db,"update accounts set $column=$column+$crypto_amount where user_id=$user_id") or die(mysqli_error($db));
  
  if ($q) {
    echo "<script>alert('Delete successfull...')</script>";
  echo ("<script>location.href='deposit.php'</script>");
  }else{
    var_dump(mysqli_error($db));

  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Deposit Mining- MIRRORTRADING</title>
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
    .modal-dialog {
    z-index: 1000 !important;
  }

  .modal {
    z-index: 1000 !important;
  }
    .modal-backdrop {
    /* bug fix - no overlay */    
    display: none;    
}
</style>
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class=" ">
    <!-- START TOPBAR -->
  
    <!-- END TOPBAR -->
    <!-- START CONTAINER -->
    <?php require 'nav_admin.php'; ?>
        <!--  SIDEBAR - END -->

        <!-- START CONTENT -->
        <section id="main-content" class=" ">
            <div class="wrapper main-wrapper row" style=''>

                <div class='col-xs-12'>
                    <div class="page-title">

                        <div class="pull-left">
                            <!-- PAGE HEADING TAG - START -->
                            <h1 class="title">MIRRORTRADING Admin</h1>
                            <!-- PAGE HEADING TAG - END -->
                        </div>

                    </div>
                </div>
               

                <div class="clearfix"></div>
                <!-- MAIN CONTENT AREA STARTS -->

                <div class='col-xs-12'>

                    <div class="pull-left">
                        <!-- PAGE HEADING TAG - START -->
                        <h4 class="title boldy mb-5 mt-15">Deposit Mining history</h4>
                        <!-- PAGE HEADING TAG - END -->
                    </div>

                </div>

                <div class="clearfix"></div>

                  <div class="col-lg-12">
                    <section class="box">
                        <header class="panel_header">
                            <h2 class="title pull-left">Deposit Mining History</h2>
                            <div class="actions panel_actions pull-right">
                                <a class="box_toggle fa fa-chevron-down"></a>
                                <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                                <a class="box_close fa fa-times"></a>
                            </div>
                        </header>
                        <div class="content-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="table-responsive" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table vm trans table-small-font no-mb table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Reference</th>
                                                    <th>Wallet to Fund</th>
                                                    <th>Amount</th>
                                                    <th>Amount in Usd</th>
                                                    <th>Payment method</th>
                                                    <th>Plan</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Transaction memo</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                          $qr1=mysqli_query($db,"select t.*,u.email,u.name from deposit_farm_histories t join users u on t.user_id=u.id order by id desc");
                          while ($row=mysqli_fetch_array($qr1)) {
                            ?>
                            <tr>
                          
                          <td><?= $row['name'] ?></td>
                          <td><?= $row['email'] ?></td>
                          <td><?= $row['ref'] ?></td>
                          <td><?= $row['wallet'] ?></td>
                          <td><?= $row['crypto_amount'] ?></td>
                          <td><?= $row['amount'] ?></td>
                          <td><?= $row['payment_method'] ?></td>
                          <td><?= $row['plan'] ?></td>
                          <td><?= $row['created_at'] ?></td>
                          <td><?= $row['status']=="pending"?'<span class="badge badge-warning">Pending</span>':'<span class="badge badge-success">Approved</span>' ?></td>
                          <td><?= $row['transaction_memo'] ?></td>
                          <td>
                            <?php
                              if($row['status']=="pending"){
                                  ?>
                          <button class="btn-primary" data-toggle="modal" data-target="#m<?= $row['id'] ?>"><span class="fa fa-edit"></span></button>

                                  <?php
                              }else{
                                ?>
                                --

                                <?php

                              }

                            ?>
                            

                          </td>

                           <div style="background-color: rgba(0, 0, 0, 0.5);z-index: 1" class="modal fade" id="m<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Action</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="" action="" method="POST">
              <div class="modal-body">
                
              <input type="hidden" name="trans_id" value="<?= $row['id']; ?>">
              <input type="hidden" name="crypto_amount" value="<?= $row['crypto_amount'] ?>">
              <input type="hidden" name="amount" value="<?= $row['amount'] ?>">
              <input type="hidden" name="user_id" value="<?= $row['user_id']; ?>">
              <input type="hidden" name="wallet" value="<?= $row['wallet']; ?>">
              
               <h4 style="color: #333">Do you want to continue?</h4>
               
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" name="editAmount" class="btn btn-success">Yes</button>
                <!-- <button type="submit" name="deleteDeposit" class="btn btn-danger">Delete</button> -->
              </div>
            </form>
            </div>
          </div>
        </div>



                        </tr>
                        <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

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