<?php
include_once("../database/constants.php");
include_once("user.php");
include_once("DBOperation.php");
include_once("manage.php");

if (isset($_POST["f_name"]) AND isset($_POST["email"])) {
	$user = new User();
	$result = $user->createUserAccount($_POST["f_name"],$_POST["l_name"],$_POST["email"],$_POST["password1"],$_POST["mobile"],$_POST["address1"],$_POST["address2"],"Admin");
	echo $result;
	exit();
}

//for change password
if (isset($_POST["email"]) AND isset($_POST["pass_1"])){
	$email = $_POST['email'];
	$oldpassword = $_POST['old_pass'];
	$oldpassword = md5($oldpassword);
	$password = $_POST['pass_1'];
	$repassword = $_POST['r_pass'];
	$user = new User();
	$result = $user->changePassword($email,$oldpassword,$password,$repassword);
	echo $result;
	exit();
}
//For Login Processing
if (isset($_POST["log_email"]) AND isset($_POST["log_password"])) {
	$user = new User();
	$result = $user->userLogin($_POST["log_email"],$_POST["log_password"]);
	echo $result;
	exit();
}

//To get Category
if (isset($_POST["getCategory"])) {
	$obj = new DBOperation();
	$rows = $obj->getAllRecord("categories");
	foreach ($rows as $row) {
		echo "<option value='".$row["cat_id"]."'>".$row["cat_title"]."</option>";
	}
	exit();
}

//Fetch Brand
if (isset($_POST["getBrand"])) {
	$obj = new DBOperation();
	$rows = $obj->getAllRecord("brands");
	foreach ($rows as $row) {
		echo "<option value='".$row["brand_id"]."'>".$row["brand_title"]."</option>";
	}
	exit();
}

//Add Category
if (isset($_POST["category_name"]) AND isset($_POST["parent_cat"])) {
	$obj = new DBOperation();
	$result = $obj->addCategory($_POST["parent_cat"],$_POST["category_name"]);
	echo $result;
	exit();
}

//Add Brand
if (isset($_POST["brand_name"])) {
	$obj = new DBOperation();
	$result = $obj->addBrand($_POST["brand_name"]);
	echo $result;
	exit();
}

//Add Product
if (isset($_POST["added_date"]) AND isset($_POST["product_name"])) {
	$file_name = $_FILES['userfile']['name'];
	$temp_name= $_FILES["userfile"]["tmp_name"];
	$target_dir = "../../product_images/".$file_name;
	if(move_uploaded_file($temp_name, $target_dir)){
		$obj = new DBOperation();
		$result = $obj->addProduct($_POST["select_cat"],
								$_POST["select_brand"],
								$_POST["product_name"],
								$_POST["product_price"],
								$_POST["product_qty"],
								$_POST["added_date"],
								$file_name,
								$_POST["product_details"]);
		echo $result;
		exit();
	}
	else{
		echo "un_upload";
	}
}

//Manage Category
if (isset($_POST["manageCategory"])) {
	$m = new Manage();
	$result = $m->manageRecordWithPagination("categories",$_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if (count($rows) > 0) {
		$n = (($_POST["pageno"] - 1) * 5)+1;
		foreach ($rows as $row) {
			?>
				<tr>
			        <td><?php echo $n; ?></td>
			        <td><?php echo $row["category"]; ?></td>
			        <td><?php echo $row["parent"]; ?></td>
			        <td>
			        	<a href="#" did="<?php echo $row['cat_id']; ?>" class="btn btn-danger btn-sm del_cat">Delete</a>
			        	<a href="#" eid="<?php echo $row['cat_id']; ?>" data-toggle="modal" data-target="#form_category" class="btn btn-info btn-sm edit_cat">Edit</a>
			        </td>
			      </tr>
			<?php
			$n++;
		}
		?>
			<tr><td colspan="5"><?php echo $pagination; ?></td></tr>
		<?php
		exit();
	}
}


//Delete Category
if (isset($_POST["deleteCategory"])) {
	$m = new Manage();
	$result = $m->deleteRecord("categories","cat_id",$_POST["id"]);
	echo $result;
}

//Update Category
if (isset($_POST["updateCategory"])) {
	$m = new Manage();
	$result = $m->getSingleRecord("categories","cat_id",$_POST["id"]);
	echo json_encode($result);
	exit();
}

//Update Record after getting data
if (isset($_POST["update_category"])) {
	$m = new Manage();
	$id = $_POST["cid"];
	$name = $_POST["update_category"];
	$parent = $_POST["parent_cat"];
	$result = $m->update_record("categories",["cat_id"=>$id],["parent_cat"=>$parent,"cat_title"=>$name]);
	echo $result;
}

//------------------Brand---------------------


//Manage Brand
if (isset($_POST["manageBrand"])) {
	$m = new Manage();
	$result = $m->manageRecordWithPagination("brands",$_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if (count($rows) > 0) {
		$n = (($_POST["pageno"] - 1) * 5)+1;
		foreach ($rows as $row) {
			?>
				<tr>
			        <td><?php echo $n; ?></td>
			        <td><?php echo $row["brand_title"]; ?></td>
			        <td>
			        	<a href="#" did="<?php echo $row['brand_id']; ?>" class="btn btn-danger btn-sm del_brand">Delete</a>
			        	<a href="#" eid="<?php echo $row['brand_id']; ?>" data-toggle="modal" data-target="#form_brand" class="btn btn-info btn-sm edit_brand">Edit</a>
			        </td>
			      </tr>
			<?php
			$n++;
		}
		?>
			<tr><td colspan="5"><?php echo $pagination; ?></td></tr>
		<?php
		exit();
	}
}

//Delete 
if (isset($_POST["deleteBrand"])) {
	$m = new Manage();
	$result = $m->deleteRecord("brands","brand_id",$_POST["id"]);
	echo $result;
}


//Update Brand
if (isset($_POST["updateBrand"])) {
	$m = new Manage();
	$result = $m->getSingleRecord("brands","brand_id",$_POST["id"]);
	echo json_encode($result);
	exit();
}

//Update Record after getting data
if (isset($_POST["update_brand"])) {
	$m = new Manage();
	$id = $_POST["bid"];
	$name = $_POST["update_brand"];
	$result = $m->update_record("brands",["brand_id"=>$id],["brand_title"=>$name]);
	echo $result;
}

//----------------Products---------------------

if (isset($_POST["manageProduct"])) {
	$m = new Manage();
	$result = $m->manageRecordWithPagination("products",$_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if (count($rows) > 0) {
		$n = (($_POST["pageno"] - 1) * 5)+1;
		foreach ($rows as $row) {
			?>
				<tr>
			        <td><?php echo $n; ?></td>
			        <td><?php echo $row["product_name"]; ?></td>
			        <td><?php echo $row["category_name"]; ?></td>
			        <td><?php echo $row["brand_name"]; ?></td>
			        <td><?php echo $row["product_price"]; ?></td>
			        <td><?php echo $row["product_stock"]; ?></td>
			        <td><?php echo $row["added_date"]; ?></td>
			        <td><?php echo $row["description"]; ?></td>
			        <td>
			        	<a href="#" did="<?php echo $row['product_id']; ?>" class="btn btn-danger btn-sm del_product">Delete</a>
			        	<a href="#" eid="<?php echo $row['product_id']; ?>" data-toggle="modal" data-target="#form_products" class="btn btn-info btn-sm edit_product">Edit</a>
			        </td>
			      </tr>
			<?php
			$n++;
		}
		?>
			<tr><td colspan="5"><?php echo $pagination; ?></td></tr>
		<?php
		exit();
	}
}

//Delete 
if (isset($_POST["deleteProduct"])) {
	$m = new Manage();
	$result = $m->deleteRecord("products","product_id",$_POST["id"]);
	echo $result;
}

//Update Product
if (isset($_POST["updateProduct"])) {
	$m = new Manage();
	$result = $m->getSingleRecord("products","product_id",$_POST["id"]);
	echo json_encode($result);
	exit();
}

//Update Record after getting data
if (isset($_POST["update_product"])) {
	$m = new Manage();
	$id = $_POST["pid"];
	$name = $_POST["update_product"];
	$cat = $_POST["select_cat"];
	$brand = $_POST["select_brand"];
	$price = $_POST["product_price"];
	$qty = $_POST["product_qty"];
	$date = $_POST["added_date"];
	$desc = $_POST["product_details"];
	$result = $m->update_record("products",["product_id"=>$id],["product_cat"=>$cat,"product_brand"=>$brand,"product_title"=>$name,"product_price"=>$price,"product_stock"=>$qty,"added_date"=>$date,"product_desc"=>$desc]);
	echo $result;
}

//-------------------------Order Processing--------------

if (isset($_POST["getNewOrderItem"])) {
	$obj = new DBOperation();
	$rows = $obj->getAllRecord("products");
	?>
	<tr>
		    <td><b class="number">1</b></td>
		    <td>
		        <select name="pid[]" class="form-control form-control-sm pid" required>
		            <option value="">Choose Product</option>
		            <?php 
		            	foreach ($rows as $row) {
		            		?><option value="<?php echo $row['product_id']; ?>"><?php echo $row["product_title"]; ?></option><?php
		            	}
		            ?>
		        </select>
		    </td>
		    <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm tqty"></td>   
		    <td><input name="qty[]" type="text" class="form-control form-control-sm qty" required></td>
		    <td><input name="price[]" type="text" class="form-control form-control-sm price" readonly></span>
		    <span><input name="pro_name[]" type="hidden" class="form-control form-control-sm pro_name"></td>
		    <td>Rs.<span class="amt">0</span></td>
	</tr>
	<?php
	exit();
}


//Get price and qty of one item
if (isset($_POST["getPriceAndQty"])) {
	$m = new Manage();
	$result = $m->getSingleRecord("products","product_id",$_POST["id"]);
	echo json_encode($result);
	exit();
}


if (isset($_POST["order_date"]) AND isset($_POST["cust_name"])) {
	
	$orderdate = $_POST["order_date"];
	$cust_name = $_POST["cust_name"];

	//Now getting array from order_form
	$ar_tqty = $_POST["tqty"];
	$ar_qty = $_POST["qty"];
	$ar_price = $_POST["price"];
	$ar_pro_name = $_POST["pro_name"];


	$sub_total = $_POST["sub_total"];
	$gst = $_POST["gst"];
	$discount = $_POST["discount"];
	$net_total = $_POST["net_total"];
	$paid = $_POST["paid"];
	$due = $_POST["due"];
	$payment_type = $_POST["payment_type"];
	$m = new Manage();
	echo $result = $m->storeCustomerOrderInvoice($cust_name,$orderdate,$ar_tqty,$ar_qty,$ar_price,$ar_pro_name,$sub_total,$gst,$discount,$net_total,$paid,$due,$payment_type);
}



//-------------------------Customer-------------------------


if (isset($_POST["showCustomer"])) {
	$m = new Manage();
	$result = $m->manageRecordWithPagination("user_info",$_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if (count($rows) > 0) {
		$n = (($_POST["pageno"] - 1) * 5)+1;
		foreach ($rows as $row) {
			?>
				<tr>
			        <td><?php echo $n; ?></td>
			        <td><?php echo "".$row["first_name"]." ".$row["last_name"]; ?></td>
			        <td><?php echo $row["email"]; ?></td>
			        <td><?php echo $row["mobile"]; ?></td>
				<td><?php echo "".$row["address1"].",".$row["address2"]; ?></td>
			      </tr>
			<?php
			$n++;
		}
		?>
			<tr><td colspan="5"><?php echo $pagination; ?></td></tr>
		<?php
		exit();
	}
}


//-------------------------------Invoice_manage----------------------------------------

if (isset($_POST["manageInvoice"])) {
	$m = new Manage();
	$result = $m->manageRecordWithPagination("invoice",$_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if (count($rows) > 0) {
		$n = (($_POST["pageno"] - 1) * 5)+1;
		foreach ($rows as $row) {
			?>
				<tr>
			        <td><?php echo $n; ?></td>
			        <td><?php echo $row["customer_name"]; ?></td>
			        <td><?php echo $row["order_date"]; ?></td>
			        <td><?php echo $row["net_total"]; ?></td>
			        <td><?php echo $row["paid"]; ?></td>
			        <td><?php echo $row["due"]; ?></td>
			        <td>
			        	<a href="#" did="<?php echo $row['invoice_no']; ?>" data-toggle="modal" data-target="#show_invoice_2"  class="btn btn-info btn-sm show_invoice">Show</a>
			        </td>
			      </tr>
			<?php
			$n++;
		}
		?>
			<tr><td colspan="5"><?php echo $pagination; ?></td></tr>
		<?php
		exit();
	}
}

if (isset($_POST["showInvoice"])) {
	$m = new Manage();
	$rows = $m->getAlldetails("invoice_details","invoice_no",$_POST["id"]);
	if($rows == "NO_DATA"){
		echo("sorry");
		exit();
	}
	$n = 1;
	foreach ($rows as $row) {
		?>
			<tr>
			<td><?php echo $n; ?></td>
			<td><?php echo $row["product_name"]; ?></td>
			<td><?php echo $row["price"]; ?></td>
			<td><?php echo $row["qty"]; ?></td>
			</td>
			</tr>
		<?php
			$n++;
		}
		?>
		<?php
		exit();
}

?>
