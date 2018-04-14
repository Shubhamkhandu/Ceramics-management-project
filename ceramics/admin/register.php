<?php
include_once("./database/constants.php");
if (!isset($_SESSION["userid"])) {
	header("location:".DOMAIN."/index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>AdminPortal</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	<script type="text/javascript" src="./js/main.js"></script>
	<link rel="shortcut icon" href="favicon.ico">
 	<style>
 	body{
 		background-color:#d9d9d9;
 	}
 	</style>
 </head>
<body>
<div class="overlay"><div class="loader"></div></div>
	<!-- Navbar -->
	<?php include_once("./templates/header.php"); ?>
	<br/><br/>
	<div class="container">
		<div class="card mx-auto" style="width: 30rem;">
	        <div class="card-header">Register</div>
		      <div class="card-body">
		        <form id="register_form" onsubmit="return false" autocomplete="off">
		          <div class="form-group">
		          	<div class="row">
					<div class="col-md-6">
						<label for="f_name">First Name</label>
						<input type="text" id="f_name" name="f_name" class="form-control" placeholder="Enter FirstName">
						<small id="f_error" class="form-text text-muted"></small>
					</div>
					<div class="col-md-6">	
						<label for="l_name">Last Name</label>
						<input type="text" id="l_name" name="l_name"class="form-control" placeholder="LastName">
						<small id="l_error" class="form-text text-muted"></small>
					</div>
				</div>
		          </div>
		          <div class="form-group">
		    		<label for="email">Email address</label>
		    	        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
		            <small id="e_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
		          </div>
		          <div class="form-group">
		            <label for="password1">Password</label>
		            <input type="password" name="password1" class="form-control"  id="password1" placeholder="Password">
		            <small id="p1_error" class="form-text text-muted"></small>
		          </div>
		          <div class="form-group">
		            <label for="password2">Re-enter Password</label>
		            <input type="password" name="password2" class="form-control"  id="password2" placeholder="Password">
		            <small id="p2_error" class="form-text text-muted"></small>
		          </div>
		          <div class="form-group">
				<label for="mobile">Mobile</label>
				<input type="text" id="mobile" name="mobile"class="form-control">
				<small id="m_error" class="form-text text-muted"></small>
			  </div>
			<div class="form-group">
				<label for="address1">Address Line 1</label>
				<input type="text" id="address1" name="address1"class="form-control">
				<small id="a1_error" class="form-text text-muted"></small>
			</div>
			<div class="form-group">
				<label for="address2">Address Line 2</label>
				<input type="text" id="address2" name="address2"class="form-control">
				<small id="a2_error" class="form-text text-muted"></small>
			</div>
		        <button type="submit" name="user_register" class="btn btn-primary "><span class="fa fa-user"></span>&nbsp;Register</button>
		      </form>
		      </div>
	      <div class="card-footer text-muted">
	        
	      </div>
	    </div>
	</div>

</body>
</html>
