<?php
session_start();
if(!isset($_SESSION['admin_id'])){
  echo ("<script>location.href='admin_login.php'</script>");
}
?>
<?php include 'db.php'; ?>

<?php
if(isset($_POST['editAmount'])){
  $bitcoin=$_POST['bitcoin'];
  $etherium=$_POST['etherium'];
  $litecoin=$_POST['litecoin'];
  $dogecoin=$_POST['dogecoin'];
  $bch=$_POST['bch'];
  $usd=$_POST['usd'];
  // $plan=$_POST['plan'];
  
  $id=$_POST['trans_id'];
  
  $q=mysqli_query($db,"update earnings_farm set usd=$usd, bitcoin='$bitcoin',etherium='$etherium',litecoin='$litecoin',dogecoin='$dogecoin',bch='$bch' where id=$id");
 
  
  
  if ($q) {
    echo "<script>alert('Earning update is successfull...')</script>";
  echo ("<script>location.href='farm_dashboard.php'</script>");
  }else{
    die(mysqli_error($db));

  }
}

if(isset($_POST['deleteUser'])){
  
  
  $id=$_POST['user_id'];
  
  $q=mysqli_query($db,"delete from users where id=$id");
 
  
  
  if ($q) {
    mysqli_query($db,"delete from accounts where user_id=$id");
    mysqli_query($db,"delete from deposits where user_id=$id");
    mysqli_query($db,"delete from withdraw where user_id=$id");
    mysqli_query($db,"delete from accounts_farming where user_id=$id");
    mysqli_query($db,"delete from deposit_farm where user_id=$id");
    mysqli_query($db,"delete from withdraw_farming where user_id=$id");
    echo "<script>alert('User  is successfully deleted...')</script>";
  echo ("<script>location.href='farm_dashboard.php'</script>");
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
    <title>Admin Earnings- MIRRORTRADING</title>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap.min.css">
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
td{
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
    <?php require 'nav_admin.php'; ?>
        <!--  SIDEBAR - END -->

        <!-- START CONTENT -->
        <section id="main-content" class=" ">
            <div class="wrapper main-wrapper row" style=''>

               
               

                <div class="clearfix"></div>
                <!-- MAIN CONTENT AREA STARTS -->

                <div class='col-xs-12'>

                    <div class="pull-left">
                        <!-- PAGE HEADING TAG - START -->
                        <h4 class="title boldy mb-5 mt-15">Mining Earnings</h4>
                        <!-- PAGE HEADING TAG - END -->
                    </div>

                </div>

                <div class="clearfix"></div>

                  <div class="col-lg-12">
                    <section class="box">
                        <header class="panel_header">
                            <h2 class="title pull-left">Mining Earnings</h2>
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
                                                    
                                                    
                                                    <!-- <th>Plan</th> -->
                                                    <th>USD</th>

                                                    <th>Bitcoin</th>
                                                    <th>Ethereum</th>
                                                    <th>Litecoin</th>
                                                    <th>Dogecoin</th>
                                                    <th>Bitcoin Cash</th>
                                               
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                          $qr1=mysqli_query($db,"select t.*, accounts.plan as plan,u.email,u.created_at,u.id as user_id,u.name from users u left join earnings_farm t on t.user_id=u.id left join accounts on accounts.user_id=u.id");
                          while ($row=mysqli_fetch_array($qr1)) {
                            ?>
                            <tr>
                          
                          <td style="color: black"><?= $row['name'] ?></td>
                          <td><?= $row['email'] ?></td>
                     
                         
                          
                          <td><?= $row['usd'] ?></td>
                          <td><?= $row['bitcoin'] ?></td>
                          <td><?= $row['etherium'] ?></td>
                          <td><?= $row['litecoin'] ?></td>
                          <td><?= $row['dogecoin'] ?></td>
                          <td><?= $row['bch'] ?></td>
                          <td><button class="btn-primary" title="Edit Earnings" data-toggle="modal" data-target="#m<?= $row['id'] ?>"><span class="fa fa-edit"></span></button>

                          </td>
                          


                           <div style="background-color: rgba(0, 0, 0, 0.5);z-index: 1" class="modal fade" id="delete<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" style="color: #000" id="exampleModalLabel">Action</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="" action="" method="POST">
              <div class="modal-body">
                
              <input type="hidden" name="user_id" value="<?= $row['user_id']; ?>">
              
               <h4 style="color: #333">Do you want to delete user?</h4>
               
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" name="deleteUser" class="btn btn-success">Yes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
              </div>
            </form>
            </div>
          </div>
        </div>


                           <div style="background-color: rgba(0, 0, 0, 0.5);z-index: 1" class="modal fade" id="m<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: #000">Edit Earnings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="" action="" method="POST">
              <div class="modal-body">
                
              <input type="hidden" name="trans_id" value="<?= $row['id']; ?>">
                <div class="row">
                <div class="col-md-12">
                        <label style="color: #333">USD</label>
                        <input type="text" class="form-control" value="<?= $row['usd'] ?>" name="usd">
                    </div>
                    <div class="col-md-12">
                        <label style="color: #333">Bitcoin</label>
                        <input type="text" class="form-control" value="<?= $row['bitcoin'] ?>" name="bitcoin">
                    </div>
                    <div class="col-md-12">
                        <label style="color: #333">Ethereum</label>
                        <input type="text" class="form-control" value="<?= $row['etherium'] ?>" name="etherium">
                    </div>
                    <div class="col-md-12">
                        <label style="color: #333">Litecoin</label>
                        <input type="text" class="form-control" value="<?= $row['litecoin'] ?>" name="litecoin">
                    </div>
                    <div class="col-md-12">
                        <label style="color: #333">Dogecoin</label>
                        <input type="text" class="form-control" value="<?= $row['dogecoin'] ?>" name="dogecoin">
                    </div>
                    <div class="col-md-12">
                        <label style="color: #333">Bitcoin Cash</label>
                        <input type="text" class="form-control" value="<?= $row['bch'] ?>" name="bch">
                    </div>
                </div>
               
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" name="editAmount" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
         $(document).ready(function() {
    $('#tech-companies-1').DataTable();
} );
    $(document).on('click','.approve_referee',function(e){
    
    if(confirm("Do you want to continue?")){
    var url="signup-auth.php?action=update_referee";
  // var spinner = $('#loader_submit');
  //   spinner.show();
       var user_id=$(this).attr('id');
       var referee=$(this).attr('data-refx');
       alert(user_id)

     $.ajax({
        url:url,
        type:'POST',
        data:{user_id:user_id,referee:referee},
        //dataType: 'json',
        success:function(response){
            //spinner.hide();
            console.log(response)
            var data=JSON.parse(response);
            
            if (data.status) {
                //$('#modal'+id).modal('hide')
                Swal.fire({
                  position: 'top-end',
                  type: 'success',
                  title: "Update successfull.",
                  showConfirmButton: false,
                  timer: 3500
                });

                //$('#msform')[0].reset()
                location.assign('index.php')
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

</script>
</body>

</html>