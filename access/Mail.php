<?php

/**
 * 
 */

include 'mailer/PHPMailerAutoload.php';


class Mail
{
	
	public static function sendMail($to,$subj,$msg){
		$mail=new PHPMailer;
		//$mail->IsSMTP();                           
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = true; 
		$mail->SMTPSecure = 'ssl';
		$mail->Host = 'mirrortrading.org';  
		$mail->Port = 465;  
		$mail->IsHTML(true);     
		$mail->Username = 'admin@mirrortrading.org';         
		$mail->Password = 'mirrortrading';                         
		$mail->setFrom('admin@mirrortrading.org', 'Mirror Trading');      
		$mail->Subject = $subj;
		$mail->Body    = $msg;
		$mail->AltBody=strip_tags($msg);
		$mail->addAddress($to); 
		
		if(!$mail->send()) {
		    $ret = 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    $ret = "success";
		}
	    return $ret;
		}
	}



?>