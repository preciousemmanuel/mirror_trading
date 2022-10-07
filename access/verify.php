<?php
  include 'db.php';

  if(!isset($_GET['vcode'])||!isset($_GET['email'])){
  	echo "<script>alert('Oops!! Invalid atirbutes')</script>";
	echo ("<script>location.href='dashboard/login.php'</script>");
  }else{
  	$email=$_GET['email'];
  	$vcode=$_GET['vcode'];
  	$chk1=mysqli_query($db,"select * from users where email='$email' and vcode='$vcode'  LIMIT 1");
	$row=mysqli_fetch_array($chk1);
	if($row){
		$chk1=mysqli_query($db,"update users set isVerified=1 where email='$email' and vcode='$vcode'  LIMIT 1");
	if ($chk1) {
		echo "<script>alert('Yeah!! Account is verified!...Please Login')</script>";
	echo ("<script>location.href='login.php'</script>");
	}else{
		echo "<script>alert('Oops!! Failed')</script>";
	echo ("<script>location.href='login.php'</script>");
	}
	}else{
		echo "<script>alert('Oops!! Invalid atirbutes')</script>";
	echo ("<script>location.href='login.php'</script>");
	}
  }
?>