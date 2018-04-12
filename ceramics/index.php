<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Vijay Ceramics</title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/heroic-features.css"/>
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="main.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style></style>

  </head>

<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.php" class="navbar-brand">Vijay Ceramics</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="product.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="cart.php" ><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
				</li>
				<?php 
				if(isset($_SESSION["uid"])) {
					echo "<li><a href='#' class='dropdown-toggle' data-toggle='dropdown'><span class='glyphicon glyphicon-user'></span>".$_SESSION["name"]."</a>
					<ul class='dropdown-menu'>
						<li><a href='cart.php' style='text-decoration:none; color:blue;'><span class='glyphicon glyphicon-shopping-cart'>Cart</a></li>
						<li class='divider'></li>
						<li><a href='customer_order.php' style='text-decoration:none; color:blue;'>Orders</a></li>
						<li class='divider'></li>
						<li><a href='passchange.php' style='text-decoration:none; color:blue;'>Change Password</a></li>
						<li class='divider'></li>
						<li><a href='logout.php' style='text-decoration:none; color:blue;'>Logout</a></li>
					</ul>
				</li>
";
				}
				else {
					echo "<li><a href='login_form.php'><span class='glyphicon glyphicon-user'></span>SignIn</a>";
				}
				
				?>

			</ul>
		</div>
	</div>
</div>	

      <!-- Jumbotron Header -->
      <header>
      
      	<img class="cover" src='logo/logo.jpg' style="height:100%; width:100%;" alt="Vijay Ceramics">
      
      </header>
	<p><br/></p>

      
<?php
include "db.php"; 
	$p="SELECT "."cat_id".","."cat_title"." FROM categories "." WHERE parent_cat=0 OR parent_cat= -1;";
	$run_query1 = mysqli_query($con,$p);
	if(mysqli_num_rows($run_query1) > 0){
		while($row = mysqli_fetch_array($run_query1)){
			$cat_title = $row['cat_title'];
			$cat_id = $row['cat_id'];
			echo "	<div class='container'>      
			       <div class='row text-center'>
			      <header style='background-color:#9AC0CD'>
			      	<div class='container'>
 			     	<h2 class='display-3'>$cat_title</h2></div>
 			     </header>
 			     	<p><br/></p>
      
  			    <div class='container'>
			";
 		       $q="SELECT product_id,product_title,product_desc,product_image FROM products WHERE product_cat IN (SELECT cat_id FROM categories WHERE parent_cat=$cat_id) LIMIT 4;";
        		$run_query = mysqli_query($con,$q);
			if(mysqli_num_rows($run_query) > 0){
				while($row1 = mysqli_fetch_array($run_query)){
					$pro_id = $row1['product_id'];
					$pro_title = $row1['product_title'];
					$pro_desc = $row1['product_desc'];
					$pro_image = $row1['product_image'];
					echo "        <div class='col-lg-3 col-md-4 mb-4'>
						          <div class='card'>
						            <img class='card-img-top' style='width:160px; height:160px;' src='product_images/$pro_image' alt=''>
						            <div class='card-body'>
						              <h4 class='card-title'>$pro_title</h4>
						              <p class='card-text'>$pro_desc</p>
     						       </div>
     						       <div class='card-footer'>
     						         <a href='prodesc.php?varname=".$pro_id."' class='btn btn-primary'>Find Out More!</a>
     						       </div>
     						     </div>
     						   </div>
";
				}
     			}
     			echo "</div></div></div>
     			<p><br/></p>";

		}
	}
	
	
      

        
?>


	<p><br/></p>
	<p><br/></p>
	<p><br/></p>




  </body>

</html>
