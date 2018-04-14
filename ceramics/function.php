<?php
function checkUser($email)
{
	include "db.php";
	$a = "SELECT user_id FROM user_info WHERE email = '$email';";
	$query = mysqli_query($con, $a);

	if(mysqli_num_rows($query) > 0)
	{
		return 'true';
	}else
	{
		return 'false';
	}
}

function UserID($email)
{	
	include "db.php";
	$query = mysqli_query($con, "SELECT user_id FROM user_info WHERE email = '$email'");
	$row = mysqli_fetch_assoc($query);
	
	return $row['user_id'];
}


function generateRandomString($length = 20) {
	// This function has taken from stackoverflow.com
    
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return md5($randomString);
}

function send_mail($to, $token)
{
	require 'PHPMailer/PHPMailerAutoload.php';
	
	$mail = new PHPMailer;
	
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'info.vijayceramics@gmail.com';
	$mail->Password = 'ceramics18';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	
	$mail->From = 'info.vijayceramics@gmail.com';
	$mail->FromName = 'Vijay Ceramics';
	$mail->addAddress($to);
	$mail->addReplyTo('info.vijayceramics@gmail.com', 'Reply');
	
	$mail->isHTML(true);
	
	$mail->Subject = 'Password Recovery';
	$link = 'http://domainname/forget.php?email='.$to.'&token='.$token;
	$mail->Body    = "<b>Hello</b><br><br>You have requested for your password recovery. <a href='$link' target='_blank'>Click here</a> to reset your password. If you are unable to click the link then copy the below link and paste in your browser to reset your password.<br><i>". $link."</i>";
	
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	
	if(!$mail->send()) {
		return 'fail';
	} else {
		return 'success';
	}
}

function verifytoken($userID, $token)
{
	include "db.php";	
	$query = mysqli_query($con, "SELECT valid FROM recovery_keys WHERE userID = $userID AND token = '$token'");
	$row = mysqli_fetch_assoc($query);
	
	if(mysqli_num_rows($query) > 0)
	{
		if($row['valid'] == 1)
		{
			return 1;
		}else
		{
			return 0;
		}
	}else
	{
		return 0;
	}
	
}
?>
