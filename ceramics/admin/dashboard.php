<?php
include_once("./database/constants.php");
if (!isset($_SESSION["userid"])) {
	header("location:http://localhost/ceramics/admin/index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Admin Portal</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	<script type="text/javascript" src="./js/main.js"></script>
 	<script type="text/javascript" src="./js/calender.js"></script>
 	<style>
 		body{
 		background-color:#d9d9d9;
 		}
    		#calendar{
    		background-color: cornflowerblue;
    		color: #fff;
    		border-radius: 5%;
	    	box-shadow: 0 4px 4px 0 rgba(50, 50, 50, 0.4);
		}

		#calendar>p{
    		font-family: Verdana, Arial, sans-serif;
    		padding: 10px 0;
    		margin: 0;
    		color: #fff;
    		text-align: center;
		}

		#calendar-day{
    		font-size: 30px;
		}

		#calendar-month-year{
    		font-size: 20px;
		}

		#calendar-date{
    		font-size: 64px;
    		padding-top: 10px;
    		padding-bottom: 0;
		}
		#topic{
		text-align:center;
		font-family:Bodani MT,Didot,Didot LT STD,Hoefier Text,Garamond,Time New Roman,serif;
		}
	</style>	
 </head>
<body>
	<!-- Navbar -->
	<?php include_once("./templates/header.php"); ?>
	<br/><br/>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card mx-auto">
				  <img class="card-img-top mx-auto" style="width:60%;" src="./images/user.png" alt="Card image cap">
				  <div class="card-body">
				    <h4 class="card-title"></h4>
				    <p class="card-text" id = "admin_name"><i class="fa fa-user">&nbsp;</i><?php echo($_SESSION["username"]." ".$_SESSION["username1"]);?></p>
				    <p class="card-text"><i class="fa fa-user">&nbsp;</i>Admin</p>
				    <p class="card-text" id ="admin_last_login">Last Login : <?php echo $_SESSION["last_login"];?></p>
				    <a href="register.php" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Add New Admin</a>
				  </div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="jumbotron" style="width:100%;height:100%;">
					<h1 id ="topic">Welcome <?php echo($_SESSION["username"]);?></h1>
					<br />
					<div class="row">
						<div class="col-sm-6" >
						<br />
							<iframe src="http://free.timeanddate.com/clock/i616j2aa/n1993/szw160/szh160/cf100/hnce1ead6" frameborder="0" width="160" height="160"></iframe>

						</div>
						<div class="col-sm-6">
						  <!---<div class="card">--->
						   <div class="card-body">  	
						      <div id="calendar">
            							<p id="calendar-day"></p>
            							<p id="calendar-date"></p>
            							<p id="calendar-month-year"></p>
        					      </div>
        					    </div>
						 <!--- </div>--->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<p></p>
	<p></p>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Categories</h4>
						<p class="card-text">Here you can manage your categories and you add new parent and sub categories</p>
						<a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-primary">Add</a>
						<a href="manage_categories.php" class="btn btn-primary">Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Brands</h4>
						<p class="card-text">Here you can manage your brand and you add new brand</p>
						<a href="#" data-toggle="modal" data-target="#form_brand" class="btn btn-primary">Add</a>
						<a href="manage_brand.php" class="btn btn-primary">Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Products</h4>
						<p class="card-text">Here you can manage your prpducts and you add new products</p>
						<a id = "add" href="#" data-toggle="modal" data-target="#form_products" class="btn btn-primary">Add</a>
						<a href="manage_product.php" class="btn btn-primary">Manage</a>
					</div>
				</div>
			</div>
		</div>
		<br />
		<div class="row">
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Customer Details</h4>
						<p class="card-text">Here you can see customer details.</p>
						<a href="manage_customers.php" class="btn btn-primary">Show Details</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">New Orders</h4>
						<p class="card-text">Here you can make invoices and create new orders</p>
						<a href="new_order.php" class="btn btn-primary">New Orders</a>
						</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Invoice and sales</h4>
						<p class="card-text">Detail information of sales and invoices.</p>
						<a href="#" class="btn btn-primary">Manage</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br />
	<?php
	//Categpry Form
	include_once("./templates/category.php");
	 ?>
	 <?php
	//Brand Form
	include_once("./templates/brand.php");
	 ?>
	 <?php
	//Products Form
	include_once("./templates/products.php");
	 ?>


</body>
</html>
