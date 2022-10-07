<?php
session_start();
include 'db.php';
include 'Mail.php';
include 'functions.php';
$site_url = "http://mirrortrading.org/dashboard/";
$site_reset = "http://mirrortrading.org/";
if ($_GET['action'] == "signup") {
	$fname = $_POST['name'];
	$lname = $_POST['lname'];
	// $mname=$_POST['mname'];
	// $country=$_POST['country'];
	// $state=mysqli_real_escape_string($db,$_POST['state']);
	// $city=mysqli_real_escape_string($db,$_POST['city']);
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$address = $_POST['address'];
	//$account_type=$_POST['account_type'];
	if (isset($_POST['referal'])) {
		$referal = $_POST['referal'];
	} else {
		$referal = '';
	}


	if ($password != $cpassword) {
		echo json_encode(["status" => false, "message" => "Password do not match"]);
		return;
	}
	// if (empty($city)) {
	// 	echo json_encode(["status"=>false,"message"=>"Select city"]);
	// 	return;
	// }

	$chk1 = mysqli_query($db, "select * from users where email='$email'  LIMIT 1");
	$row = mysqli_fetch_array($chk1);
	if ($row) {
		echo json_encode(["status" => false, "message" => "User with email already exist!"]);
		return;
	}
	$account_num = rand(9999999999, 1000000000);
	$vcode = md5(rand(99999, 10000));
	$msg = file_get_contents('email-t.html');

	$msg = str_replace('%name%', $fname, $msg);

	$msg = str_replace('%email%', $email, $msg);
	$msg = str_replace('%vcode%', $vcode, $msg);
	$msg = str_replace('%site_url%', $site_url.'verify.php?email='.$email.'&vcode='.$vcode, $msg);
	$referal_link = str_replace(' ', '-', $fname) . rand(9999, 1000);
	//var_dump($msg);
	$qin = mysqli_query($db, "insert into users (name,last_name,email,password,vcode,isVerified,referal,referal_link,image,address) values ('$fname','$lname','$email','$password','$vcode',0,'$referal','$referal_link','uploads/user.png','$address')");
	if ($qin) {
		//send mail
		$last_id = mysqli_insert_id($db);
		mysqli_query($db, "insert into accounts (user_id) values ($last_id)");
		mysqli_query($db, "insert into earnings (user_id) values ($last_id)");
		mysqli_query($db, "insert into earnings_farm (user_id) values ($last_id)");
		mysqli_query($db, "insert into deposits (user_id) values ($last_id)");
		mysqli_query($db, "insert into deposits_farm (user_id) values ($last_id)");
		mysqli_query($db, "insert into accounts_farming (user_id) values ($last_id)");
		$result = Mail::sendMail($email, "Verification", $msg);
		// $_SESSION['user_id'] = $last_id;
		// $_SESSION['email'] = $email;
		//$_SESSION['account_type']=$row['account_type'];
		//$_SESSION['account_num']=$row['account_num'];
		// $_SESSION['name'] = $fname;
		// echo json_encode(["status" => true, "message" => "Account created successfully", "email" => $email]);
		// return;
		if ($result=="success") {
			echo json_encode(["status"=>true,"message"=>"Please go to your email to verify account","email"=>$email]);
		return;
		}else{
			echo json_encode(["status"=>false,"message"=>$result]);
		return;
		}
	} else {
		echo json_encode(["status" => false, "message" => mysqli_error($db)]);
	}
} elseif ($_GET['action'] == "login") {

	$email = $_POST['email'];
	$password = $_POST['password'];

	$rand = rand(1000, 9999);
	$chk1 = mysqli_query($db, "select * from users where email='$email' and password='$password' and isVerified=1 LIMIT 1");
	$row = mysqli_fetch_array($chk1);
	if (!$row) {
		echo json_encode(["status" => false, "message" => "User do not exist!"]);
		return;
	}
	if (empty($row['referal_link'])) {
		$referal_link = str_replace(' ', '-', $row['name']) . rand(9999, 1000);

		$upq = mysqli_query($db, "update users set referal_link='$referal_link' where id=" . $row['id']);
	}


	$_SESSION['user_id'] = $row['id'];
	$_SESSION['email'] = $row['email'];
	//$_SESSION['account_type']=$row['account_type'];
	//$_SESSION['account_num']=$row['account_num'];
	$_SESSION['name'] = $row['name'];

	echo json_encode(["status" => true, "message" => "success"]);
	return;
} elseif ($_GET['action'] == "farm_click") {

	$crypto = $_POST['crypto'];

	$user_id = $_SESSION['user_id'];
	$chk1 = mysqli_query($db, "select * from farm where user_id='$user_id' LIMIT 1");
	$row = mysqli_fetch_array($chk1);
	if (!$row) {
		echo json_encode(["status" => false, "message" => "User do not exist!"]);
		return;
	}





	echo json_encode(["status" => true, "message" => $row]);
	return;
} elseif ($_GET['action'] == "resend_signup") {
	$email = $_POST['email'];
	if (empty($email)) {
		echo json_encode(["status" => false, "message" => "Oops no email to resend!"]);
		return;
	}
	$vcode = md5(rand(99999, 10000));
	$msg = file_get_contents('email-t.html');

	$msg = str_replace('%name%', " ", $msg);

	$msg = str_replace('%email%', $email, $msg);
	$msg = str_replace('%vcode%', $vcode, $msg);
	$msg = str_replace('%site_url%', $site_url, $msg);

	$upq = mysqli_query($db, "update users set vcode='$vcode' where email='$email'");
	$result = Mail::sendMail($email, "Verify Account", $msg);
	if ($result == "success") {
		echo json_encode(["status" => true, "message" => "Please go to your email to verify account"]);
		return;
	} else {
		echo json_encode(["status" => false, "message" => $result]);
		return;
	}
} elseif ($_GET['action'] == "resend_login") {
	$email = $_POST['email'];
	if (empty($email)) {
		echo json_encode(["status" => false, "message" => "Oops no email to resend!"]);
		return;
	}
	$rand = rand(1000, 9999);
	$upq = mysqli_query($db, "update users set vcode='$rand' where email='$email'");
	//$msg="Hi ".$row['lname']."<br/>";
	//$word="Your verification code is: ".$rand;

	$word = "Hello ";
	$msg = file_get_contents('email-v.html');

	$msg = str_replace('%word%', $word, $msg);

	$msg = str_replace('%vcode%', $rand, $msg);
} elseif ($_GET['action'] == "forgot") {
	$email = $_POST['email'];
	if (empty($email)) {
		echo json_encode(["status" => false, "message" => "Oops no email to resend!"]);
		return;
	}
	$rand = md5(rand(1000, 9999));
	$sel = mysqli_query($db, "select * from users where email='$email' LIMIT 1");
	$row = mysqli_fetch_array($sel);
	if (!$row) {
		echo json_encode(["status" => false, "message" => "User with email do not exist!"]);
		return;
	}
	$upq = mysqli_query($db, "update users set resetcode='$rand' where email='$email'");
	//$msg="Hi ".$row['lname']."<br/>";
	//$word="Your verification code is: ".$rand;

	$word = "Hello " . $row["name"] . "\n";
	$word .= "Click this link to reset your password.\n";
	$word .= "<a href='" . $site_reset . "reset-password.php?email=" . $row["email"] . "&code=" . $rand . "'>Reset Password link</a>";

	$result = Mail::sendMail($email, "Reset Password", $word);
	if ($result == "success") {
		echo json_encode(["status" => true, "message" => "Your reset link has been sent successfully...Check your spam mail too.", "email" => $email]);
		return;
	} else {
		echo json_encode(["status" => false, "message" => $result]);
		return;
	}
} elseif ($_GET['action'] == "resetpassword") {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpasssword = $_POST['cpassword'];
	$code = $_POST['code'];
	if (empty($email)) {
		echo json_encode(["status" => false, "message" => "Oops no email to provided!"]);
		return;
	}
	if ($password != $cpasssword) {
		echo json_encode(["status" => false, "message" => "Password and confirm password do not match"]);
		return;
	}
	$rand = md5(rand(1000, 9999));
	$sel = mysqli_query($db, "select * from users where email='$email' and resetcode='$code' LIMIT 1");
	$row = mysqli_fetch_array($sel);
	if (!$row) {
		echo json_encode(["status" => false, "message" => "reset code is Invalid!"]);
		return;
	}
	$upq = mysqli_query($db, "update users set password='$password' where email='$email'");
	//$msg="Hi ".$row['lname']."<br/>";
	//$word="Your verification code is: ".$rand;

	echo json_encode(["status" => true, "message" => "Your password is updated", "email" => $email]);
} elseif ($_GET['action'] == "two") {
	$email = $_POST['email'];
	$vcode = $_POST['vcode'];

	$chk1 = mysqli_query($db, "select * from users where email='$email' and vcode='$vcode' LIMIT 1");
	$row = mysqli_fetch_array($chk1);
	if (!$row) {
		echo json_encode(["status" => false, "message" => "Verification code is invaid!"]);
		return;
	}

	$upq = mysqli_query($db, "update users set vcode='' where id=" . $row['id']);
	$_SESSION['user_id'] = $row['id'];
	$_SESSION['email'] = $row['email'];
	$_SESSION['account_type'] = $row['account_type'];
	$_SESSION['account_num'] = $row['account_num'];
	$_SESSION['name'] = $row['fname'] . ' ' . $row['lname'];

	echo json_encode(["status" => true, "message" => "success"]);
	return;
} elseif ($_GET['action'] == "update_referee") {
	$referal = $_POST['user_id'];
	$referee = $_POST['referee'];
	//$vcode=$_POST['vcode'];



	$upq = mysqli_query($db, "update users set referal_clearal='yes' where id=" . $referee);
	$upwq = mysqli_query($db, "insert into notification(user_id,message) values($referal,'You have earn 0.3% referal bonus!') ");


	echo json_encode(["status" => true, "message" => "success"]);
	return;
} elseif ($_GET['action'] == "contact") {
	$email = $_POST['email'];
	$name = $_POST['name'];
	$message = $_POST['message'];
	// $Cryptocurreny=$_POST['Cryptocurreny'];

	$msg = 'Hello , here is the details of enquiry made:<br/>';
	$msg .= 'Name: ' . $name . '<br/>';
	$msg .= 'Email: ' . $email . '<br/>';
	// $msg.='Cryptocurreny: '.$Cryptocurreny.'<br/>';
	$msg .= 'Message: ' . $message . '<br/>';
	$result = Mail::sendMail('admin@mirrortrading.org', "Enquiry", $msg);
	if ($result == "success") {
		echo json_encode(["status" => true, "message" => "Your enquiry has been sent successfully", "email" => $email]);
		return;
	} else {
		echo json_encode(["status" => false, "message" => $result]);
		return;
	}
} elseif ($_GET['action'] == "confirm_deposit") {
	$date_paid = $_POST['date_paid'];
	//$transaction_memo=$_POST['transaction_memo'];
	$ref = $_POST['ref'];
	//$Cryptocurreny=$_POST['Cryptocurreny'];
	$upq = mysqli_query($db, "update deposit_histories set date_confirmed='$date_paid' where ref=" . $ref);
	$msg = 'Hello , A user with transaction ref of ' . $ref . ' has a pending deposit transaction<br/>';
	$msg .= '<a href="https://mirrortrading.org/access/admin.php">Click to confirm</a><br/>';

	$result = Mail::sendMail('admin@mirrortrading.org', "Deposit", $msg);
	if ($result == "success") {
		echo json_encode(["status" => true, "message" => "Confirmation request is sent.. We will confirm and approve payment shorlty"]);
		return;
	} else {
		echo json_encode(["status" => false, "message" => "Oops .. Try again"]);
		return;
	}
} elseif ($_GET['action'] == "confirm_deposit_farm") {
	$date_paid = $_POST['date_paid'];
	//$transaction_memo=$_POST['transaction_memo'];
	$ref = $_POST['ref'];
	//$Cryptocurreny=$_POST['Cryptocurreny'];
	$upq = mysqli_query($db, "update deposit_farm_histories set date_confirmed='$date_paid' where ref=" . $ref);
	$msg = 'Hello , A user with transaction ref of ' . $ref . ' has a pending Mining deposit transaction<br/>';
	$msg .= '<a href="https://mirrortrading.org/access/admin.php">Click to confirm</a><br/>';

	$result = Mail::sendMail('admin@mirrortrading.org', "Farm Deposit", $msg);
	if ($result == "success") {
		echo json_encode(["status" => true, "message" => "Confirmation request is sent.. We will confirm and approve payment shorlty"]);
		return;
	} else {
		echo json_encode(["status" => false, "message" => "Oops .. Try again"]);
		return;
	}
} elseif ($_GET['action'] == "deposit") {
	$amount_to_send = $_POST['amount_to_send'];
	$wallet = $_POST['wallet'];
	$trader = $_POST['trader'];
	//$wallet_amount=$_POST['wallet_amount'];
	$crypto_amount = $_POST['crypto_amount'];
	// $payment_method=$_POST['payment_method'];
	//$Cryptocurreny=$_POST['Cryptocurreny'];
	if (isset($_SESSION['user_id'])) {
		$user_id = $_SESSION['user_id'];
		$number = rand(100, 100000);
		$plan = "BASIC";
		$interest = 5;
		$plan = Utility::getPlandByAmount($amount_to_send)["plan"];
		$interest = Utility::getPlandByAmount($amount_to_send)["interest"];
		$res;
		if ($trader == "") {
			$res = mysqli_query($db, "insert into deposit_histories (user_id,amount,wallet,crypto_amount,payment_method,ref,plan,interest) values ($user_id,'$amount_to_send','$wallet','$crypto_amount','$wallet','$number','$plan',$interest)");
		} else {
			$res = mysqli_query($db, "insert into deposit_histories (user_id,amount,wallet,crypto_amount,payment_method,ref,plan,interest
	,copied_trader) values ($user_id,'$amount_to_send','$wallet','$crypto_amount','$wallet','$number','$plan',$interest,$trader)");
		}
		$last_id = mysqli_insert_id($db);
		if ($res) {
			echo json_encode(["status" => true, "message" => "", "trans_id" => $last_id]);
			return;
		} else {
			echo json_encode(["status" => false, "message" => $res]);
			return;
		}
	} else {
		echo json_encode(["status" => false, "message" => "Session Timed out... Refresh to login"]);
		return;
	}
} elseif ($_GET['action'] == "deposit_farm") {
	$amount_to_send = $_POST['amount_to_send'];
	$wallet = $_POST['wallet'];
	$trader = $_POST['trader'];
	//$wallet_amount=$_POST['wallet_amount'];
	$crypto_amount = $_POST['crypto_amount'];
	// $payment_method=$_POST['payment_method'];
	//$Cryptocurreny=$_POST['Cryptocurreny'];
	if (isset($_SESSION['user_id'])) {
		$user_id = $_SESSION['user_id'];
		$number = rand(100, 100000);
		$plan = "BASIC";
		$interest = 5;
		$plan = Utility::getPlandByAmount($amount_to_send)["plan"];
		$interest = Utility::getPlandByAmount($amount_to_send)["interest"];


		$res = mysqli_query($db, "insert into deposit_farm_histories (user_id,amount,wallet,crypto_amount,payment_method,ref,plan,interest) values ($user_id,'$amount_to_send','$wallet','$crypto_amount','$wallet','$number','$plan',$interest)");

		$last_id = mysqli_insert_id($db);
		if ($res) {
			echo json_encode(["status" => true, "message" => "", "trans_id" => $last_id]);
			return;
		} else {
			echo json_encode(["status" => false, "message" => $res]);
			return;
		}
	} else {
		echo json_encode(["status" => false, "message" => "Session Timed out... Refresh to login"]);
		return;
	}
} elseif ($_GET['action'] == "settings") {
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];

	if ($password != $cpassword) {
		echo json_encode(["status" => false, "message" => "Password do not match"]);
		return;
	}
	if (isset($_SESSION['user_id'])) {
		$user_id = $_SESSION['user_id'];
	} else {
		$user_id = $_SESSION['admin_id'];
	}


	$upq = mysqli_query($db, "update users set password=$password where id=" . $user_id);


	echo json_encode(["status" => true, "message" => "success"]);
	return;
} elseif ($_GET['action'] == "admin_login") {

	$email = $_POST['username'];
	$password = $_POST['password'];


	$chk1 = mysqli_query($db, "select * from admin where username='$email' and password='$password' LIMIT 1");
	$row = mysqli_fetch_array($chk1);
	if (!$row) {
		echo json_encode(["status" => false, "message" => "User do not exist!"]);
		return;
	}


	$_SESSION['admin_id'] = $row['id'];

	$_SESSION['name'] = "Admin";

	echo json_encode(["status" => true, "message" => "success"]);
	return;
} elseif ($_GET['action'] == "transfer") {
	$account = $_POST['account'];
	$bank = $_POST['bank'];
	$amount = $_POST['amount'];
	$user_id = $_SESSION['user_id'];
	$email = $_SESSION['email'];
	$chk1 = mysqli_query($db, "select * from users where email='$email' LIMIT 1");
	$row = mysqli_fetch_array($chk1);

	$vcode = md5(rand(99999, 10000));
	$msg = file_get_contents('email-r.html');

	$msg = str_replace('%lname%', $row['lname'], $msg);

	$msg = str_replace('%account%', $account, $msg);
	$msg = str_replace('%bank%', $bank, $msg);
	$msg = str_replace('%amount%', $amount, $msg);
	$msg = str_replace('%site_url%', $site_url, $msg);
	//var_dump($msg);
	$qin = mysqli_query($db, "insert into transfers (user_id,bank,account,amount) values ($user_id,'$bank','$account','$amount')");
	if ($qin) {
		//send mail
		$result = Mail::sendMail($email, "Transfer", $msg);
		if ($result == "success") {
			echo json_encode(["status" => true, "message" => "Transaction is successful..."]);
			return;
		} else {
			echo json_encode(["status" => false, "message" => $result]);
			return;
		}
	}
} elseif ($_GET['action'] == "withdrawff") {
	$amount_to_send = $_POST['amount_to_send'];
	$wallet = $_POST['wallet'];
	//$wallet_amount=$_POST['wallet_amount'];
	$crypto_amount = $_POST['crypto_amount'];
	$payment_method = $_POST['payment_method'];
	//$Cryptocurreny=$_POST['Cryptocurreny'];
	if (isset($_SESSION['user_id'])) {
		$user_id = $_SESSION['user_id'];
		$number = rand(100, 100000);

		$res = mysqli_query($db, "insert into deposits (user_id,amount,wallet,crypto_amount,payment_method,ref) values ($user_id,'$amount_to_send','$wallet','$crypto_amount','$payment_method','$number')");
		$last_id = mysqli_insert_id($db);
		if ($res) {
			echo json_encode(["status" => true, "message" => "", "trans_id" => $last_id]);
			return;
		} else {
			echo json_encode(["status" => false, "message" => $res]);
			return;
		}
	} else {
		echo json_encode(["status" => false, "message" => "Session Timed out... Refresh to login"]);
		return;
	}
} elseif ($_GET['action'] == "withdraw") {
	$amount_to_send = $_POST['amount_to_send'];
	$wallet = $_POST['wallet'];
	//$wallet_amount=$_POST['wallet_amount'];
	$crypto_amount = $_POST['crypto_amount'];
	$payment_method = $_POST['wallet'];
	$wallet_address = $_POST['wallet_address'];
	$wallet_email = $_POST['wallet_email'];
	$pin = rand(9999, 100000);
	if (!isset($_SESSION['user_id'])) {
		echo json_encode(["status" => false, "message" => "Session Timed out... Refresh to login"]);
		return;
	}
	$user_id = $_SESSION['user_id'];
	$msg = "<p>You have a withdrawal request</p>";
	$current_month = date('Y-m-d');
	// $chkQ=mysqli_query($db,"select * from withdraw where user_id=$user_id and MONTH(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(CURDATE())");

	// $number=mysqli_num_rows($chkQ);
	// if ($number > 3) {
	// 	echo json_encode(["status"=>false,"message"=>"You have exceeded withdrwal limit"]);
	// 	return;
	// }
	//$email=$_SESSION['email'];
	if ($wallet == "Bitcoin") {
		$chk1 = mysqli_query($db, "select bitcoin from earnings where user_id=$user_id LIMIT 1");
		$row = mysqli_fetch_array($chk1);
		$bitcoin = $row['bitcoin'];


		$total_amount = $bitcoin;
		if ($crypto_amount > $total_amount) {
			echo json_encode(["status" => false, "message" => "Invalid withdrawal amount"]);
			return;
		}
		$res = mysqli_query($db, "insert into withdraw (user_id,amount,wallet,crypto_amount,withdrawal_method,wallet_address,wallet_email,pin) values ($user_id,'$amount_to_send','$wallet','$crypto_amount','$payment_method','$wallet_address','$wallet_email','$pin')");
		$last_id = mysqli_insert_id($db);


		$result = Mail::sendMail("admin@copytrademarket.com", "withdrawal", $msg);
	} elseif ($wallet == "Ethereum") {
		$chk1 = mysqli_query($db, "select etherium from earnings where user_id=$user_id LIMIT 1");
		$row = mysqli_fetch_array($chk1);
		$etherium = (float)$row['etherium'];
		// $chk2=mysqli_query($db,"select etherium from accounts where user_id=$user_id LIMIT 1");
		// $rowD=mysqli_fetch_array($chk2);
		// $ethAccount=$row['etherium'];
		$total_amount = $etherium;
		if ($crypto_amount > $total_amount) {
			echo json_encode(["status" => false, "message" => "Invalid withdrawal amount"]);
			return;
		}
		$res = mysqli_query($db, "insert into withdraw (user_id,amount,wallet,crypto_amount,withdrawal_method,wallet_address,wallet_email,pin) values ($user_id,'$amount_to_send','$wallet','$crypto_amount','$payment_method','$wallet_address','$wallet_email','$pin')");
		$msg = "<p>You have a withdrawal request</p>";

		$result = Mail::sendMail("admin@copytrademarket.com", "withdrawal", $msg);
	} elseif ($wallet == "Litecoin") {
		$chk1 = mysqli_query($db, "select litecoin from earnings where user_id=$user_id LIMIT 1");
		$row = mysqli_fetch_array($chk1);
		$litecoin = (float)$row['litecoin'];


		
		$total_amount = $litecoin;
		if ($crypto_amount > $total_amount) {
			echo json_encode(["status" => false, "message" => "Invalid withdrawal amount"]);
			return;
		}
		$res = mysqli_query($db, "insert into withdraw (user_id,amount,wallet,crypto_amount,withdrawal_method,wallet_address,wallet_email) values ($user_id,'$amount_to_send','$wallet','$crypto_amount','$payment_method','$wallet_address','$wallet_email')");

		$result = Mail::sendMail("admin@copytrademarket.com", "withdrawal", $msg);
	} elseif ($wallet == "Dogecoin") {
		$chk1 = mysqli_query($db, "select dogecoin from earnings where user_id=$user_id LIMIT 1");
		$row = mysqli_fetch_array($chk1);
		$dogecoin = (float)$row['dogecoin'];


		$total_amount = $dogecoin;
		if ($crypto_amount > $total_amount) {
			echo json_encode(["status" => false, "message" => "Invalid withdrawal amount"]);
			return;
		}
		$res = mysqli_query($db, "insert into withdraw (user_id,amount,wallet,crypto_amount,withdrawal_method,wallet_address,wallet_email) values ($user_id,'$amount_to_send','$wallet','$crypto_amount','$payment_method','$wallet_address','$wallet_email')");

		$result = Mail::sendMail("admin@copytrademarket.com", "withdrawal", $msg);
	} elseif ($wallet == "Ripple") {
		$chk1 = mysqli_query($db, "select xrp from earnings where user_id=$user_id LIMIT 1");
		$row = mysqli_fetch_array($chk1);
		$xrp = (float)$row['xrp'];



		$total_amount = $xrp;
		if ($crypto_amount > $total_amount) {
			echo json_encode(["status" => false, "message" => "Invalid withdrawal amount"]);
			return;
		}
		$res = mysqli_query($db, "insert into withdraw (user_id,amount,wallet,crypto_amount,withdrawal_method,wallet_address,wallet_email,pin) values ($user_id,'$amount_to_send','$wallet','$crypto_amount','$payment_method','$wallet_address','$wallet_email'.'$pin')");

		$result = Mail::sendMail("admin@copytrademarket.com", "withdrawal", $msg);
	} elseif ($wallet == "BCH") {
		$chk1 = mysqli_query($db, "select bch from earnings where user_id=$user_id LIMIT 1");
		$row = mysqli_fetch_array($chk1);
		$bch = (float)$row['bch'];



		$total_amount = $bch;
		if ($crypto_amount > $total_amount) {
			echo json_encode(["status" => false, "message" => "Invalid withdrawal amount"]);
			return;
		}
		$res = mysqli_query($db, "insert into withdraw (user_id,amount,wallet,crypto_amount,withdrawal_method,wallet_address,wallet_email,pin) values ($user_id,'$amount_to_send','$wallet','$crypto_amount','$payment_method','$wallet_address','$wallet_email'.'$pin')");

		$result = Mail::sendMail("admin@copytrademarket.com", "withdrawal", $msg);
	}
	//echo json_encode(["status"=>true,"message"=>"Request is sent successfully, withdrawal will be proccess 24hours"]);
	echo json_encode(["status" => true, "message" => "Withdrawal Request is sent successfully"]);
	return;
	//$email=$_SESSION['email'];

} elseif ($_GET['action'] == "confirm_withdrawal_code") {
	$pin = $_POST['pin'];
	// $wallet=$_POST['wallet'];
	//$wallet_amount=$_POST['wallet_amount'];

	if (!isset($_SESSION['user_id'])) {
		echo json_encode(["status" => false, "message" => "Session Timed out... Refresh to login"]);
		return;
	}
	$user_id = $_SESSION['user_id'];

	$chk1 = mysqli_query($db, "select pin from withdraw where pin='$pin' LIMIT 1");
	$row = mysqli_fetch_array($chk1);

	if ($row) {
		echo json_encode(["status" => true, "message" => "Withdrawal Pin confirm...Your withdrawal will be process in less than 48 hours"]);
		return;
	}
	echo json_encode(["status" => false, "message" => "Invalid withdrawal pin"]);


	//$email=$_SESSION['email'];

} elseif ($_GET['action'] == "withdraw_farm") {
	$amount_to_send = $_POST['amount_to_send'];
	$wallet = $_POST['wallet'];
	//$wallet_amount=$_POST['wallet_amount'];
	$crypto_amount = $_POST['crypto_amount'];
	$payment_method = $_POST['wallet'];
	$wallet_address = $_POST['wallet_address'];
	$wallet_email = $_POST['wallet_email'];
	$pin = rand(9999, 100000);
	if (!isset($_SESSION['user_id'])) {
		echo json_encode(["status" => false, "message" => "Session Timed out... Refresh to login"]);
		return;
	}
	$user_id = $_SESSION['user_id'];
	$msg = "<p>You have a withdrawal request</p>";
	$current_month = date('Y-m-d');
	// $chkQ=mysqli_query($db,"select * from withdraw where user_id=$user_id and MONTH(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(CURDATE())");

	// $number=mysqli_num_rows($chkQ);
	// if ($number > 3) {
	// 	echo json_encode(["status"=>false,"message"=>"You have exceeded withdrwal limit"]);
	// 	return;
	// }
	//$email=$_SESSION['email'];
	if ($wallet == "Bitcoin") {
		$chk1 = mysqli_query($db, "select bitcoin from earnings_farm where user_id=$user_id LIMIT 1");
		$row = mysqli_fetch_array($chk1);
		$bitcoin = $row['bitcoin'];


		$total_amount = $bitcoin;
		if ($crypto_amount > $total_amount) {
			echo json_encode(["status" => false, "message" => "Invalid withdrawal amount"]);
			return;
		}
		$res = mysqli_query($db, "insert into withdraw_farming (user_id,amount,wallet,crypto_amount,withdrawal_method,wallet_address,wallet_email,pin) values ($user_id,'$amount_to_send','$wallet','$crypto_amount','$payment_method','$wallet_address','$wallet_email','$pin')");
		$last_id = mysqli_insert_id($db);


		$result = Mail::sendMail("admin@copytrademarket.com", "withdrawal", $msg);
	} elseif ($wallet == "Ethereum") {
		$chk1 = mysqli_query($db, "select etherium from earnings_farm where user_id=$user_id LIMIT 1");
		$row = mysqli_fetch_array($chk1);
		$etherium = (float)$row['etherium'];
		// $chk2=mysqli_query($db,"select etherium from accounts where user_id=$user_id LIMIT 1");
		// $rowD=mysqli_fetch_array($chk2);
		// $ethAccount=$row['etherium'];
		$total_amount = $etherium;
		if ($crypto_amount > $total_amount) {
			echo json_encode(["status" => false, "message" => "Invalid withdrawal amount"]);
			return;
		}
		$res = mysqli_query($db, "insert into withdraw_farming (user_id,amount,wallet,crypto_amount,withdrawal_method,wallet_address,wallet_email,pin) values ($user_id,'$amount_to_send','$wallet','$crypto_amount','$payment_method','$wallet_address','$wallet_email','$pin')");
		$msg = "<p>You have a withdrawal request</p>";

		$result = Mail::sendMail("admin@copytrademarket.com", "withdrawal", $msg);
	} elseif ($wallet == "Litecoin") {
		$chk1 = mysqli_query($db, "select litecoin from earnings_farm where user_id=$user_id LIMIT 1");
		$row = mysqli_fetch_array($chk1);
		$litecoin = (float)$row['litecoin'];


		
		$total_amount = $litecoin;
		if ($crypto_amount > $total_amount) {
			echo json_encode(["status" => false, "message" => "Invalid withdrawal amount"]);
			return;
		}
		$res = mysqli_query($db, "insert into withdraw_farming (user_id,amount,wallet,crypto_amount,withdrawal_method,wallet_address,wallet_email) values ($user_id,'$amount_to_send','$wallet','$crypto_amount','$payment_method','$wallet_address','$wallet_email')");

		$result = Mail::sendMail("admin@copytrademarket.com", "withdrawal", $msg);
	} elseif ($wallet == "Dogecoin") {
		$chk1 = mysqli_query($db, "select dogecoin from earnings_farm where user_id=$user_id LIMIT 1");
		$row = mysqli_fetch_array($chk1);
		$dogecoin = (float)$row['dogecoin'];


	
		$total_amount = $dogecoin;
		if ($crypto_amount > $total_amount) {
			echo json_encode(["status" => false, "message" => "Invalid withdrawal amount"]);
			return;
		}
		$res = mysqli_query($db, "insert into withdraw_farming (user_id,amount,wallet,crypto_amount,withdrawal_method,wallet_address,wallet_email) values ($user_id,'$amount_to_send','$wallet','$crypto_amount','$payment_method','$wallet_address','$wallet_email')");

		$result = Mail::sendMail("admin@copytrademarket.com", "withdrawal", $msg);
	} elseif ($wallet == "Ripple") {
		$chk1 = mysqli_query($db, "select xrp from earnings where user_id=$user_id LIMIT 1");
		$row = mysqli_fetch_array($chk1);
		$xrp = (float)$row['xrp'];



		$total_amount = $xrp;
		if ($crypto_amount > $total_amount) {
			echo json_encode(["status" => false, "message" => "Invalid withdrawal amount"]);
			return;
		}
		$res = mysqli_query($db, "insert into withdraw_farming (user_id,amount,wallet,crypto_amount,withdrawal_method,wallet_address,wallet_email,pin) values ($user_id,'$amount_to_send','$wallet','$crypto_amount','$payment_method','$wallet_address','$wallet_email'.'$pin')");

		$result = Mail::sendMail("admin@copytrademarket.com", "withdrawal", $msg);
	} elseif ($wallet == "BCH") {
		$chk1 = mysqli_query($db, "select bch from earnings_farm where user_id=$user_id LIMIT 1");
		$row = mysqli_fetch_array($chk1);
		$bch = (float)$row['bch'];



		$total_amount = $bch;
		if ($crypto_amount > $total_amount) {
			echo json_encode(["status" => false, "message" => "Invalid withdrawal amount"]);
			return;
		}
		$res = mysqli_query($db, "insert into withdraw_farming (user_id,amount,wallet,crypto_amount,withdrawal_method,wallet_address,wallet_email,pin) values ($user_id,'$amount_to_send','$wallet','$crypto_amount','$payment_method','$wallet_address','$wallet_email'.'$pin')");

		$result = Mail::sendMail("admin@copytrademarket.com", "withdrawal", $msg);
	}
	//echo json_encode(["status"=>true,"message"=>"Request is sent successfully, withdrawal will be proccess 24hours"]);
	echo json_encode(["status" => true, "message" => "Withdrawal Request is sent successfully"]);
	return;	//$email=$_SESSION['email'];

}
