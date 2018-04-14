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
	<link rel="shortcut icon" href="favicon.ico">
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
					echo "<li><a href='login_form.php'><span class='glyphicon glyphicon-user'></span>SignIn</a>
				</li>
";
				}
				
				?>
			</ul>
		</div>
	</div>
</div>	
	<p><br/></p>
	<p><br/></p>

<div class="container">
        <!-- Page Features -->
      
       <div class="row">
      <div class="container">
<?php
	include "db.php";
        $prid = $_GET['varname'];
        $query = "SELECT * FROM products WHERE product_id =".$prid.";";
	$run_query = mysqli_query($con,$query);
	$row = mysqli_fetch_array($run_query);
	$pro_id = $row['product_id'];
	$pro_cat = $row['product_cat'];
	$pro_desc = $row['product_desc'];
	$pro_stock = $row['product_stock'];
	$pro_brand = $row['product_brand'];
	$pro_title = $row['product_title'];
	$pro_price = $row['product_price'];
	$pro_image = $row['product_image'];

        $query2 = "SELECT * FROM brands WHERE brand_id =".$pro_brand.";";
	$run_query2 = mysqli_query($con,$query2);
	$row2 = mysqli_fetch_array($run_query2);
	$b_id    = $row2['brand_id'];
	$b_title   = $row2['brand_title'];

        echo "<div>
            <img class='card-img-top col-lg-6 col-md-6 mb-6' src='product_images/".$pro_image."' alt=''>
        </div>

        <div class='col-lg-6 col-md-6 mb-6'>
            <div>
              <h2>".$pro_title."</h2>
              <h4>".$b_title."<h4></div>
              <div>
              <p>".$pro_desc."</p>
            </div>
	    <div>
	    	<h4 style='color:#830303'><label>Rs.".$pro_price.".00</label></h4>
	    	<h4>Exclusive of All Taxes</h4>
	    	<h4>Free Delivery on orders over <label style='color:#830303'>Rs.999.00</label></h4>";
	    
	  if($pro_stock != 0){
	  	echo "<h4 style='color:#228B22'>In Stock</h4>";
	  }
	  else {
	  	echo "<h4 style='color:#830303'>Out Of Stock</h4>";
	  }
	  echo "</div>
            <div class='card-footer'>
		<button pid='$pro_id' style='float:right;' id='product' class='btn btn-primary btn-block'>Add To Cart</button>
	    </div>
          </div>
        </div>

      </div>";
?>
      <!-- /.row -->
</div>
    </div>
    <!-- /.container -->

	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	
	
	<div class="container">      
	       <div class="row text-center">
		      <header style="background-color:#4c4ca6">
		      	<div class="container">
		     	<h2 class="display-3" style="color:#fff;font-family:Bodoni MT,Didot,Didot LT STD,Hoefler Text,Garamond,Times New Roman,serif;">Similar Products</h2></div>
		     </header>
	     	<p><br/></p>
      
	    <div class='container'>
<?php
include "db.php"; 
        $prid1 = $_GET['varname'];
        $query1 = "SELECT product_cat FROM products WHERE product_id =".$prid1.";";
	$run_query1 = mysqli_query($con,$query1);
	$row3 = mysqli_fetch_array($run_query1);
	$cat_id    = $row3['product_cat'];

        $q="SELECT product_id,product_title,product_desc,product_image FROM products WHERE product_cat=".$cat_id." AND product_id!=".$prid1." LIMIT 4;";
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

?>
</div></div></div>
<p><br/></p>
<p><br/></p>
<p><br/></p>

  </body>

</html>
