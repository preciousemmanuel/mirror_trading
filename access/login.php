<!DOCTYPE html>
<html lang="en">

<head>
   
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - CFXMining</title>
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
    <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
    <!-- CORE CSS FRAMEWORK - END -->

    <!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - START -->

    <!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - END -->

    <!-- CORE CSS TEMPLATE - START -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <!-- CORE CSS TEMPLATE - END -->
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
<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class=" login_page login-bg">
<div id="loader_submit" class="loader"></div>
    <div class="container">
        <div class="row">
            
            <div class=" mt-90 col-lg-8 col-lg-offset-2">
             <center> <div style="width: 142px ;height: 34px">
             <a href="/">
               <img src="../assets/images/logo/logo-light.png"  width="141" height="33">
             </a> 
           </div></center>
                <div class="row">
                    <div class="login-wrapper crypto">
                        <div class="col-lg-5 col-sm-12 hidden-sm no-padding-left  no-padding-right">
                            <img src="data/crypto-dash/login-img.png" alt="">
                        </div>
                        <div class="col-lg-7 col-sm-12">
                            <div id="login" class="login loginpage mt-0 no-pl no-pr pt30 pb30">    
                                <div class="login-form-header  flex align-items-center">
                                     <img src="data/crypto-dash/padlock.png" alt="login-icon" style="max-width:64px">
                                     <div class="login-header">
                                         <h4 class="bold">Login Now!</h4>
                                         <h4><small>Enter your credentials to login.</small></h4>
                                     </div>
                                </div>
                               
                                <div class="box login">

                                    <div class="content-body" style="padding-top:30px">

                                        <form method="POST" action="#" id="msform" novalidate="novalidate" class="no-mb no-mt">
                                            <div class="row">
                                                <div class="col-xs-12">

                                                    <div class="form-group">
                                                        <label class="form-label">Email</label>
                                                        <div class="controls">
                                                            <input type="text" class="form-control" name="email" id="email" placeholder="email">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="form-label">Password</label>
                                                        <div class="controls">
                                                            <input type="password" class="form-control" name="password" id="password" placeholder="password">
                                                        </div>
                                                    </div>

                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary mt-10 btn-corner right-15">Log in</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <p id="nav" class="over-h">
                                    <!-- <a class="pull-left blue-text" href="#" title="Password Lost and Found">Forgot password?</a> -->
                                    <a class="pull-right blue-text" href="register.php" title="Sign Up">Sign Up</a>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- MAIN CONTENT AREA ENDS -->
    <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->

    <!-- CORE JS FRAMEWORK - START -->
    <script src="assets/js/jquery-1.11.2.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/pace/pace.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/plugins/viewport/viewportchecker.js"></script>
    <script>
        window.jQuery || document.write('<script src="assets/js/jquery-1.11.2.min.js"><\/script>');
    </script>
    <!-- CORE JS FRAMEWORK - END -->

    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->

    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->

    <!-- CORE TEMPLATE JS - START -->
    <script src="assets/js/scripts.js"></script>
    <!-- END CORE TEMPLATE JS - END -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script type="text/javascript">
    $(document).on('submit','#msform',function(e){
    
    e.preventDefault()
    var url="signup-auth.php?action=login";
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
                  title: "Successfull... ",
                  showConfirmButton: false,
                  timer: 3500
                });
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
    
    
})
  </script>

    
</body>

</html>