<?php
include "db.php";
if (isset($_POST["ema"])) {
	$email = $_POST['ema'];
	$oldpassword = $_POST['opass'];
	$oldpassword = md5($oldpassword);
	$password = $_POST['pass'];
	$repassword = $_POST['rpass'];
	$result = mysqli_query($con,"SELECT password FROM user_info WHERE email='$email'");
	$row = mysqli_fetch_array($result);
	$pass = $row['password'];
        if($oldpassword!= $pass)
        {
        	echo "You entered an incorrect password";
        	exit();
        }
        if($password==$repassword) {
        	$password = md5($password);
        	$sql=mysqli_query($con,"UPDATE user_info SET password='$password' where email='$email'");
        }
        if($sql)
        {
        	echo "Password_Changed";
        	exit();
        }
        else
        {
        	echo "Passwords do not match";
        	exit();
       	}


}
?>
