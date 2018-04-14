<?php

session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}

if (isset($_POST["st"])) {

	# code...
		$trx_id = $_POST["transaction_id"];
		$p_st = $_POST["st"];
/*		$amt = $_GET["amt"];
		$cc = $_GET["cc"];
		$cm_user_id = $_GET["cm"];
		$c_amt = $_COOKIE["ta"];
*/	if ($p_st == "Completed") {

		

		include_once("db.php");
		$sql = "SELECT p_id,qty FROM cart WHERE user_id = '".$_SESSION["uid"]."'";
		$query = mysqli_query($con,$sql);
		if (mysqli_num_rows($query) > 0) {
			# code...
			while ($row=mysqli_fetch_array($query)) {
				$product_id[] = $row["p_id"];
				$qty[] = $row["qty"];
			}

			for ($i=0; $i < count($product_id); $i++) { 
				$sql1 = "SELECT product_stock FROM products WHERE product_id =".$product_id[$i].";";
				$run_query1 = mysqli_query($con,$sql1);
				$row=mysqli_fetch_array($run_query1);
				$pro_stock = $row['product_stock'];
				$a = $pro_stock-$qty[$i];
				$sql2 = "UPDATE products SET product_stock=".$a." WHERE product_id = ".$product_id[$i].";";
				mysqli_query($con,$sql2);

				$sql = "INSERT INTO orders (user_id,product_id,qty,trx_id,p_status) VALUES ('".$_SESSION["uid"]."','".$product_id[$i]."','".$qty[$i]."','$trx_id','$p_st')";
				mysqli_query($con,$sql);				
			}
			$sql = "DELETE FROM cart WHERE user_id = '".$_SESSION["uid"]."'";
			if (mysqli_query($con,$sql)) {
				?>
					<!DOCTYPE html>
					<html>
						<head>
							<meta charset="UTF-8">
							<title>Vijay Ceramics</title>
							<link rel="stylesheet" href="css/bootstrap.min.css"/>
							<script src="js/jquery2.js"></script>
							<script src="js/bootstrap.min.js"></script>
							<script src="main.js"></script>
							<link rel="shortcut icon" href="favicon.ico">
							<style>
								table tr td {padding:10px;}
							</style>
						</head>
					<body>
						<div class="navbar navbar-inverse navbar-fixed-top">
							<div class="container-fluid">	
								<div class="navbar-header">
									<a href="index.php" class="navbar-brand">Vijay Ceramics</a>
								</div>
								<ul class="nav navbar-nav">
									<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
									<li><a href="profile.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
								</ul>
							</div>
						</div>
						<p><br/></p>
						<p><br/></p>
						<p><br/></p>
						<div class="container-fluid">
						
							<div class="row">
								<div class="col-md-2"></div>
								<div class="col-md-8">
									<div class="panel panel-default">
										<div class="panel-heading"></div>
										<div class="panel-body">
											<h1>Thank You! </h1>
											<hr/>
											<p>Hello <?php echo "<b>".$_SESSION["name"]."</b>"; ?>,Your payment process is successfully completed and your Transaction id is <b><?php echo $trx_id; ?></b><br/>
											You can continue your Shopping... <br/></p>
											<a href="index.php" class="btn btn-success btn-lg">Continue Shopping</a>
										</div>
										<div class="panel-footer"></div>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
						</div>
					</body>
					</html>

				<?php
			}
		}else{
			header("location:index.php");
		}
		
	}
}



?>
