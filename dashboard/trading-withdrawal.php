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
    <title>Trading Withdrawal - Mirror Trading</title>

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
                            <p class="text-primary mb-0 hover-cursor">Trading Withdrawal</p>
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
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="color: #ddd">WITHDRAW FUND</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" style="color: #ddd" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">WITHDRAWAL HISTORY</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <form id="form_ms">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title" style="color: #ff231f">Use this form to withdraw</h4>
                                                        <div class="basic-form">

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Wallet you intend to withdraw</label>
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
                                                                    
                                                                        <label>Amount to withdraw</label>
                                                                        <div class="input-group mb-3">
                                                                           
                                                                                <div class="input-group-text">$</div>
                                                                            
                                                                            <input type="number" value="1" min="1" required name="amount_to_send" id="amount_to_send" class="form-control ">
                                                                        </div>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <!-- <div class="col-md-6">
                          <div class="form-group">
                              <label>Withdrawal method(How you intend to withdraw)</label>
                              <select required id="payment_method" name="payment_method" class="form-control form-control-lg">
                              <option value="">-- Select A Withdrawal Method --</option>
                              <option>Bitcoin</option>
                              <option>Ethereum</option>
                              <option>Litecoin</option>
                          </select>
                      </div>
                      </div> -->
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>We will send</label>
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
                                                        <h6 class="card-title my-3">Your wallet details</h6>
                                                    </center>
                                                    <div class="card-body">

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Your <span class="crypto_symbol">BTC</span> Address</label>
                                                                    <div class="input-group">
                                                                        
                                                                            <div class="input-group-text crypto_symbol">BTC</div>
                                                                        

                                                                        <input type="text" name="wallet_address" required="" id="" class="form-control ">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Your <span class="crypto_symbol">BTC</span> Email Address</label>
                                                                    <div class="input-group">
                                                                        
                                                                            <div class="input-group-text crypto_symbol">BTC</div>
                                                                       

                                                                        <input type="text" name="wallet_email" class="form-control ">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>




                                                <button type="submit" class="btn btn-primary">WITHDRAW FUND</button>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            <!-- deposit history-->
                                            <div style="overflow: auto;">
                                                <table class="table table-bordered ">
                                                    <thead style="">

                                                        <th>WALLET </th>
                                                        <th>WITHDRAWAL AMOUNT </th>
                                                        <th>WITHDRAWAL METHOD </th>
                                                        <th>DATE</th>
                                                        <th>WALLET ADDRESS</th>
                                                        <th>WALLET EMAIL</th>
                                                        <th>STATUS</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $qr1 = mysqli_query($db, "select * from withdraw where user_id=" . $_SESSION['user_id'] . " order by id desc");
                                                        if ($qr1) {
                                                            while ($row = mysqli_fetch_array($qr1)) {
                                                        ?>
                                                                <tr>

                                                                    <td><?= $row['wallet'] ?></td>
                                                                    <td><?= $row['crypto_amount'] ?></td>
                                                                    <td><?= $row['withdrawal_method'] ?></td>
                                                                    <td><?= $row['created_at'] ?></td>
                                                                    <td><?= $row['wallet_address'] ?></td>
                                                                    <td><?= $row['wallet_email'] ?></td>
                                                                    <td><?= $row['status'] == "pending" ? '<span class="badge badge-warning">Pending</span>' : '<span class="badge badge-success">Approved</span>' ?></td>
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
    jQuery(document).ready(function($) {
      $('#myTab a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
      });


    });
  </script>
  <script type="text/javascript">
         $(document).ready(function(){
          


     $(document).on('change','#wallet',function(e){
                        var spinner = $('#loader_submit');
    spinner.show();
            //var payment_method=$('#payment_method').val();
            var wallet=$(this).val();
            //$('#payment_div').show();
            var amount_to_send=$('#amount_to_send').val()!="" ? $('#amount_to_send').val():0;

   if (wallet=="Bitcoin") {
        $('.crypto_symbol').html('BTC');
        
        $.get("https://blockchain.info/tobtc?currency=USD&value="+amount_to_send, function(data, status){
            
             $('#crypto_amount').val(data);
             ////$('#wallet_address').val('0x327eC41685Fc99A494a9BFA6A08d1d77688eE8C3');
             
    //alert("Data: " + data + "\nStatus: " + status);

    spinner.hide();
  });

   }else if(wallet=="Ethereum"){
    $('.crypto_symbol').html('ETH');
     $('.credit_symbol').html('ETH');
     
    $.get("https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=BTC,USD,EUR", function(data, status){
    //alert("Data: " + JSON.stringify(data) + "\nStatus: " + status);
    var eth=data.USD;
    var amt_n=amount_to_send/eth;
    $('#crypto_amount').val(amt_n.toFixed(5));

    //$('#crypto_amount').val(eth*amount_to_send);
    spinner.hide();
  });
    
   }else if(wallet=="Litecoin"){
    ////$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
     $.get("https://min-api.cryptocompare.com/data/price?fsym=LTC&tsyms=BTC,USD,EUR", function(data, status){
     $('.credit_symbol').html('LTC');
    var ltc=data.USD;
     var amt_n=amount_to_send/ltc;
     $('#crypto_amount').val(amt_n.toFixed(5));
    $('.crypto_symbol').html('LTC');
     spinner.hide();
   })
   }else if(wallet=="Dogecoin"){
    ////$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
     $.get("https://min-api.cryptocompare.com/data/price?fsym=DOGE&tsyms=BTC,USD,EUR", function(data, status){
     $('.credit_symbol').html('DOGE');
    var DOGE=data.USD;
     var amt_n=amount_to_send/DOGE;
     $('#crypto_amount').val(amt_n.toFixed(5));
    $('.crypto_symbol').html('DOGE');
     spinner.hide();
   })
   }else if(wallet=="BCH"){
    ////$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
     $.get("https://min-api.cryptocompare.com/data/price?fsym=BCH&tsyms=BCH,USD,EUR", function(data, status){
     $('.credit_symbol').html('BCH');
    var BCH=data.USD;
     var amt_n=amount_to_send/BCH;
     $('#crypto_amount').val(amt_n.toFixed(5));
    $('.crypto_symbol').html('BCH');
     spinner.hide();
   })
   }
   else{
     spinner.hide();
   }
   
     // 
})
  

$(document).on('keyup','#amount_to_send',function(e){
    
            var wallet=$('#wallet').val();
   
    var spinner = $('#loader_submit');
    spinner.show();
            
            //$('#payment_div').show();
            var amount_to_send=$('#amount_to_send').val()!="" ? $('#amount_to_send').val():0;

   if (wallet=="Bitcoin") {
        $('.crypto_symbol').html('BTC');
        
        $.get("https://blockchain.info/tobtc?currency=USD&value="+amount_to_send, function(data, status){
            
             $('#crypto_amount').val(data);
             ////$('#wallet_address').val('0x327eC41685Fc99A494a9BFA6A08d1d77688eE8C3');
             
    //alert("Data: " + data + "\nStatus: " + status);

    spinner.hide();
  });

   }else if(wallet=="Ethereum"){
    $('.crypto_symbol').html('ETH');
     $('.credit_symbol').html('ETH');
     
    $.get("https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=BTC,USD,EUR", function(data, status){
    //alert("Data: " + JSON.stringify(data) + "\nStatus: " + status);
    var eth=data.USD;
   // $('#crypto_amount').val(eth*amount_to_send);

    var amt_n=amount_to_send/eth;
    $('#crypto_amount').val(amt_n.toFixed(5));
    spinner.hide();
  });
    
   }else if(wallet=="Litecoin"){
    ////$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
     $.get("https://min-api.cryptocompare.com/data/price?fsym=LTC&tsyms=BTC,USD,EUR", function(data, status){
     $('.credit_symbol').html('LTC');
   var ltc=data.USD;
     var amt_n=amount_to_send/ltc;
     $('#crypto_amount').val(amt_n.toFixed(5));
    $('.crypto_symbol').html('LTC');
     spinner.hide();
   });
   }else if(wallet=="Dogecoin"){
    ////$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
     $.get("https://min-api.cryptocompare.com/data/price?fsym=DOGE&tsyms=BTC,USD,EUR", function(data, status){
     $('.credit_symbol').html('DOGE');
   var DOGE=data.USD;
     var amt_n=amount_to_send/DOGE;
     $('#crypto_amount').val(amt_n.toFixed(5));
    $('.crypto_symbol').html('DOGE');
     spinner.hide();
   });
   }else if(wallet=="BCH"){
    ////$('#wallet_address').val('MGCACVQYapg2zG1KJgogwdqVQ5VH3ZL6xc');
     $.get("https://min-api.cryptocompare.com/data/price?fsym=BCH&tsyms=BCH,USD,EUR", function(data, status){
     $('.credit_symbol').html('BCH');
   var BCH=data.USD;
     var amt_n=amount_to_send/BCH;
     $('#crypto_amount').val(amt_n.toFixed(5));
    $('.crypto_symbol').html('BCH');
     spinner.hide();
   });
   }
   else{
     spinner.hide();
   }
   
    
        
         
     // 
})

 $(document).on('submit','#form_ms',function(e){
    
    e.preventDefault()
    var url="../access/signup-auth.php?action=withdraw";
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
               alert("Withdrawal request sent successfully")
              $('#form_ms')[0].reset()
              
              var tab = $('a[href="#profile"]').data('next'); 
  $(tab).tab('show');
                //location.assign('withdrawal.php#profile');
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

        })
    </script>
</body>

</html>