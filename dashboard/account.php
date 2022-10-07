<?php include '../access/db.php'; ?>
<?php

session_start();

$id=$_SESSION['user_id'];




if(!isset($_SESSION['user_id'])){
  echo ("<script>location.href='../login.html'</script>");
}

$qrx=mysqli_query($db,"select * from users where id=$id") or die(mysqli_error($db));
$user=mysqli_fetch_array($qrx);


if (isset($_POST['submit'])) {
  // header("Location:res.php");c
    $name=$_POST['name'];
    $last_name=$_POST['last_name'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $id=$_SESSION['user_id'];
    $target_dir = "uploads/";
    $q=mysqli_query($db,"update users set last_name='$last_name', phone='$phone',address='$address' , name='$name' where id=$id");

    echo "<script>alert('Profile updated successfully!')</script>";
echo ("<script>location.href='account.php'</script>");


//     if (empty($_FILES['fileToUpload']['name'])) {
//         $q=mysqli_query($db,"update users set last_name='$last_name', phone='$phone',address='$address'  name='$name' where id=$id");
//          echo "<script>alert('Profile updated successfully!')</script>";
//      echo ("<script>location.href='account.php'</script>");
//     } else {
        
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//   if($check !== false) {
//     //echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
//   } else {
    
//     $uploadOk = 0;
//     echo "<script>alert('File not an image')</script>";
//   }
// }

// // Check if file already exists
// // if (file_exists($target_file)) {
// //   echo "Sorry, file already exists.";
// //   $uploadOk = 0;
// // }

// // Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//   //echo "Sorry, your file is too large.";
//   $uploadOk = 0;
//   echo "<script>alert('Image is too large must be less than 5mb')</script>";
// }

// // Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
//   echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
// }

// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//   //echo "Sorry, your file was not uploaded.";
//    echo "<script>alert('Sorry, your file was not uploaded.')</script>";
// // if everything is ok, try to upload file
// } else {
//   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//     $image= $_FILES["fileToUpload"]["name"];
//         $q=mysqli_query($db,"update users set image='uploads/$image',name='$name' where id=$id");
//     echo "<script>alert('Profile updated successfully!')</script>";
//      echo ("<script>location.href='profile.php'</script>");
//   } else {
//     echo "<script>alert('Sorry, your file was not uploaded.')</script>";
//   }
}
//}
//}
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
  <title>My Account - Mirror Trading</title>

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
</head>

<body class="ltr main-body app sidebar-mini light-mode">
  <!-- Loader -->
  <div id="global-loader" class="light-loader">
    <img src="assets/img/loaders/loader.svg" class="loader-img" alt="Loader" />
  </div>
  <!-- /Loader -->

  <!-- Page -->
  <div class="page">
    <!-- main-header -->
   
    <!-- /main-header -->

    <!-- main-sidebar opened -->
  <?php require_once 'menu.php'; ?>
    <!-- main-sidebar -->

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
              <p class="text-primary mb-0 hover-cursor">Account</p>
            </div>
          </div>
          <!-- <div
              class="d-flex align-items-end flex-wrap my-auto right-content breadcrumb-right"
            >
              <button
                type="button"
                class="btn btn-warning btn-icon me-3 mt-2 mt-xl-0"
              >
                <i class="mdi mdi-download"></i>
              </button>
              <button
                type="button"
                class="btn btn-danger btn-icon me-3 mt-2 mt-xl-0"
              >
                <i class="mdi mdi-clock"></i>
              </button>
              <button
                type="button"
                class="btn btn-success btn-icon me-3 mt-2 mt-xl-0"
              >
                <i class="mdi mdi-plus"></i>
              </button>
              <button class="btn btn-primary mt-2 mt-xl-0">
                Download report
              </button>
            </div> -->
        </div>
        <!-- /breadcrumb -->

        <!-- row  -->

        <!-- /row -->

        <!-- row -->
        <div class="row row-sm">
          <!-- <div class="col-lg-12 col-xl-4">
            <div class="card mg-b-20">
              <div class="card-body p-0">
                <div class="p-1-25">
                  <div class="avatar-xxl mb-3 position-relative">
                    <img alt="" class="rounded-circle" src="assets/img/faces/5.jpg"><a class="fa fa-camera profile-icon tx-14" href="JavaScript:void(0);"></a>
                  </div>
                  <div class="d-flex justify-content-between mg-b-20">
                    <div class="">
                      <h5 class="main-profile-name">John Doe</h5>
                      <p class="main-email-address">info@example.com</p>

                    </div>

                  </div>


                </div>
              </div>
            </div>

          </div> -->
          <div class="col-lg-12 col-xl-12">
            <div class="main-content-body main-content-body-profile">
              <nav class="nav main-nav-line card mb-4 flex-nowrap">

                <!-- <a class="nav-link active" data-bs-toggle="tab" href="#tab6">Edit Profile</a> -->



              </nav><!-- main-profile-body -->
              <div class="main-profile-body p-0">
                <div class="row row-sm">
                  <div class="col-12">
                    <div class="panel-body tabs-menu-body p-0 border-0">
                      <div class="tab-content">

                        <div class="tab-pane active" id="tab6">
                          <div class="card">
                            <div class="card-body">
                              <div class="mb-4 main-content-label">Personal Information
                              </div>
                              <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group ">

                                </div>
                                <div class="mb-2 main-content-label">Name</div>
                                <!-- <div class="form-group ">
                                  <div class="row">
                                    <div class="col-md-3">
                                      <label class="form-label">User Name</label>
                                    </div>
                                    <div class="col-md-9">
                                      <input type="text" class="form-control" placeholder="User Name" value="Johnny">
                                    </div>
                                  </div>
                                </div> -->
                                <div class="form-group ">
                                  <div class="row">
                                    <div class="col-md-3">
                                      <label class="form-label">First Name</label>
                                    </div>
                                    <div class="col-md-9">
                                      <input name="name" type="text" class="form-control" placeholder="First Name" value="<?= $user["name"] ?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <div class="row">
                                    <div class="col-md-3">
                                      <label class="form-label">last Name</label>
                                    </div>
                                    <div class="col-md-9">
                                      <input name="last_name" type="text" class="form-control" placeholder="Last Name" value="<?= $user["last_name"] ?>">
                                    </div>
                                  </div>
                                </div>

                                <div class="mb-2 main-content-label">Contact Info</div>
                                <div class="form-group ">
                                  <div class="row">
                                    <div class="col-md-3">
                                      <label class="form-label">Email<i>(required)</i></label>
                                    </div>
                                    <div class="col-md-9">
                                      <input type="text" class="form-control" readonly="true"  placeholder="Email" value="<?= $user["email"] ?>">
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group ">
                                  <div class="row">
                                    <div class="col-md-3">
                                      <label class="form-label">Phone</label>
                                    </div>
                                    <div class="col-md-9">
                                      <input type="text" name="phone" class="form-control" placeholder="phone number" value="<?= $user["phone"] ?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <div class="row">
                                    <div class="col-md-3">
                                      <label class="form-label">Address</label>
                                    </div>
                                    <div class="col-md-9">
                                      <textarea class="form-control" name="address" rows="2" placeholder="Address"><?= $user["address"] ?></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="card-footer">
                              <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Update
                                Profile</button>
                            </div>

                              </form>
                            </div>
                           
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- main-profile-body -->
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
</body>

</html>
