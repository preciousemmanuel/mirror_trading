<?php 
include 'access/db.php';

$qrxF=mysqli_query($db,"select * from deposit_histories where status='approved'") or die(mysqli_error($db));
if ($qrxF) {
	 while ($row=mysqli_fetch_array($qrxF)) {
	$wallet=$row['wallet'];
	
	$amount=(float) $row['amount'];
	$crypto_amount=$row["crypto_amount"];
	$interest=(int) $row['interest']||5;
	
	$user_id= $row['user_id'];
    $column="bitcoin";

    $interest_amount=($interest/100)*$crypto_amount;
		
		$usd=($interest/100)*$amount;

    if($wallet=="Bitcoin"){
        $column='bitcoin';
	mysqli_query($db,"insert into earnings_history (amount,etherium,bitcoin,litecoin,dogecoin,bch, user_id)values($usd,0,$interest_amount,0,0,0,$user_id)");

    }elseif ($wallet=="Ethereum") {
        $column='etherium';
	mysqli_query($db,"insert into earnings_history (amount,etherium,bitcoin,litecoin,dogecoin,bch, user_id)values($usd,$interest_amount,0,0,0,0,$user_id)");

    }elseif ($wallet=="Litecoin") {
        $column='litecoin';
	mysqli_query($db,"insert into earnings_history (amount,etherium,bitcoin,litecoin,dogecoin,bch, user_id)values($usd,0,0,$interest_amount,0,0,$user_id)");

    }elseif ($wallet=="BCH") {
        $column='bch';
	mysqli_query($db,"insert into earnings_history (amount,etherium,bitcoin,litecoin,dogecoin,bch, user_id)values($usd,0,0,0,0,$interest_amount,$user_id)");

    }elseif ($wallet=="Dogecoin") {
        $column='dogecoin';
	mysqli_query($db,"insert into earnings_history (amount,etherium,bitcoin,litecoin,dogecoin,bch, user_id)values($usd,0,0,0,$interest_amount,0,$user_id)");

    }

	
	
		
		
		
	$q=mysqli_query($db,"update earnings set usd=usd+$usd,$column=$column+$interest_amount where user_id=$user_id");



}
 // echo ("<script>alert('Earnings updated successfully')</script>");
 // echo ("<script>location.href='access/index.php'</script>");
}
//$data=mysqli_fetch_assoc($qrxF);


?>