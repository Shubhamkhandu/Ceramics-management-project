<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Vijay Ceramics</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
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
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">Change Password</div>
					<div class="panel-body">
						<!--User Login Form-->
						<form onsubmit="return false" id="changepass">
							<label for="ema">Email</label>
							<input type="email" class="form-control" name="ema" id="ema" required/>
							<label for="opass">Old Password</label>
							<input type="password" class="form-control" name="opass" id="opass" required/>
							<label for="pass">New Password</label>
							<input type="password" class="form-control" name="pass" id="pass" required/>
							<label for="rpass">Re-Enter Password</label>
							<input type="password" class="form-control" name="rpass" id="rpass" required/>
							<p><br/></p>
							<input type="submit" class="btn btn-success" Value="Change Password">
						</form>
				</div>
				<div class="panel-footer"><div id="cp_msg"></div></div>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>
</html>
