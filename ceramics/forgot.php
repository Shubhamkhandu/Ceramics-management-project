<?php
include ('db.php');
include ('function.php');
	
if(isset($_POST['submit']))
{
	$uemail = $_POST['uemaill'];
	$uemail = mysqli_real_escape_string($con, $uemail);
	
	if(checkUser($uemail) == "true")
	{
		$userID = UserID($uemail);
		$token = generateRandomString();
		
		$query = mysqli_query($con, "INSERT INTO recovery_keys (userID, token) VALUES ($userID, '$token') ");
		if($query)
		{
			 $send_mail = send_mail($uemail, $token);


			if($send_mail === 'success')
			{
				 $msg = 'A mail with recovery instruction has sent to your email.';
				 $msgclass = 'bg-success';
			}else{
				$msg = 'There is something wrong.';
				$msgclass = 'bg-danger';
			}



		}else
		{
				$msg = 'There is something wrong.';
				 $msgclass = 'bg-danger';
		}
		
	}else
	{
		$msg = "This email doesn't exist in our database.";
				 $msgclass = 'bg-danger';
	}
}

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Vijay Ceramics</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/bootstrap.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<script src="js/bootstrap.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="shortcut icon" href="favicon.ico">
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">Vijay Ceramics</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="product.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>






<div class="container">
	<div class="row">

    	<div class="col-lg-4 col-lg-offset-4">
        

        	<form class="form-horizontal" role="form" method="post">
			    <h2>Forgot Password</h2>

				<?php if(isset($msg)) {?>
                    <div class="<?php echo $msgclass; ?>" style="padding:5px;"><?php echo $msg; ?></div>
                <?php } ?>
    
                <div class="row">
                    <div class="col-lg-12">
                    <label class="control-label">Email</label>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-lg-12">
                        <input class="form-control" name="uemaill" type="email" placeholder="Enter email" required>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-lg-12">
                        <button class="btn btn-success btn-block" name="submit" style="margin-top:8px;">Submit</button>
                    </div>
                </div>
			</form>
		</div>
           

	</div>
    

    </div>
</div>    

</body>
</html>
