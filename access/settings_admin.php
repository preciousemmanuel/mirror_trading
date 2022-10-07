<?php
session_start();
if(!isset($_SESSION['admin_id'])){
  echo ("<script>location.href='admin_login.php'</script>");
}
?>
<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Settings- XYZTradeMarket</title>
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
                            <h1 class="title">XYZTradeMarket Dashboard</h1>
                            <!-- PAGE HEADING TAG - END -->
                        </div>

                    </div>
                </div>
               

                <div class="clearfix"></div>
                <!-- MAIN CONTENT AREA STARTS -->

                <div class='col-xs-12'>

                    <div class="pull-left">
                        <!-- PAGE HEADING TAG - START -->
                        <h4 class="title boldy mb-5 mt-15">Settings</h4>
                        <!-- PAGE HEADING TAG - END -->
                    </div>

                </div>

                <div class="clearfix"></div>
                 <div class="col-lg-12">
                 <section class="box ">
                     <form id="msform">
                                <header class="panel_header" style="border-bottom:1px solid #eee">
                                    <h2 class="title pull-left"><img src="data/crypto-dash/set4.png" class="wd mr-5" alt="">Security: Password</h2>
                                    <div class="actions panel_actions pull-right">
                                        <div class="form-group no-mb">
                                            <button type="submit" class="btn btn-primary btn-corner "><i class="fa fa-check"></i> Update Settings</button>
                                        </div>
                                    </div>
                                </header>  
                                <div class="content-body">
                                    <div class="row">
                                      
                                            <div class="col-xs-12 mt-20">

                                                <div class="form-group">
                                                    <label class="form-label"> Password</label>
                                                    <span class="desc"></span>
                                                    <div class="controls">
                                                        <input type="password" required name="password" class="form-control" value="" placeholder="Enter you current password" id="field-31">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label">Confirm Password</label>
                                                    <span class="desc"></span>
                                                    <div class="controls">
                                                        <input type="password" required name="cpassword" class="form-control" value="password" id="field-41">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xs-12 padding-bottom-30">
                                                <div class="pull-left">
                                                    <h4><i class="fa fa-info-circle color-primary complete f-s-14"></i><small>Avoid using easy to guess password</small></h4>
                                                    <ul class="ml-20 mt-30 list-unstyled">
                                                        <li><h5><i class="fa fa-dot-circle-o blue-text mr-10"></i>Password must be at lest 7 - 15 character</h5></li>
                                                        <li><h5><i class="fa fa-dot-circle-o blue-text mr-10"></i>Password must contain Lowercase and uppercase letters</h5></li>
                                                    </ul>
                                                </div>
                                            </div>

                                       
                                    </div>

                                </div>
                                 </form>
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
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


  <script type="text/javascript">
    $(document).on('submit','#msform',function(e){
    
    e.preventDefault()
    var url="signup-auth.php?action=settings";
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
                  title: "Update successfull...",
                  showConfirmButton: false,
                  timer: 3500
                });
                $('#msform')[0].reset()
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
                  timer: 2500
                });
                
        }
     })   
    
    
})
  </script>
    <!-- END CORE TEMPLATE JS - END -->

</body>

</html>