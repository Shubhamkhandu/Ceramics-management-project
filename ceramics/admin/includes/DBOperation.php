<?php

/**
* 
*/
class DBOperation
{
	
	private $con;

	function __construct()
	{
		include_once("../database/db.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	public function addCategory($parent,$cat){
		$pre_stmt = $this->con->prepare("INSERT INTO `categories` (`parent_cat`, `cat_title`)
		 VALUES (?,?)");
		$pre_stmt->bind_param("is",$parent,$cat);
		$result = $pre_stmt->execute() or die($this->con->error);
		if ($result) {
			return "CATEGORY_ADDED";
		}else{
			return 0;
		}

	}

	public function addBrand($brand_name){
		$pre_stmt = $this->con->prepare("INSERT INTO `brands`(`brand_title`)
		 VALUES (?)");
		$pre_stmt->bind_param("s",$brand_name);
		$result = $pre_stmt->execute() or die($this->con->error);
		if ($result) {
			return "BRAND_ADDED";
		}else{
			return 0;
		}

	}

	public function addProduct($cid,$bid,$pro_name,$price,$stock,$date,$image,$details){
		$pre_stmt = $this->con->prepare("INSERT INTO `products`
			(`product_cat`, `product_brand`, `product_title`, `product_price`,`product_desc`,`product_image`,`product_stock`, `added_date`)
			 VALUES (?,?,?,?,?,?,?,?)");
		$pre_stmt->bind_param("iisissis",$cid,$bid,$pro_name,$price,$details,$image,$stock,$date);
		$result = $pre_stmt->execute() or die($this->con->error);
		if ($result) {
			return "NEW_PRODUCT_ADDED";
		}else{
			return 0;
		}

	}

	public function getAllRecord($table){
		if($table =="products"){
			$pre_stmt = $this->con->prepare("SELECT * FROM ".$table." where product_stock != 0");
		}
		else{
			$pre_stmt = $this->con->prepare("SELECT * FROM ".$table);
		}
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		$rows = array();
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$rows[] = $row;
			}
			return $rows;
		}
		return "NO_DATA";
	}
}

//$opr = new DBOperation();
//echo $opr->addCategory(1,"Mobiles");
//echo "<pre>";
//print_r($opr->getAllRecord("categories"));
?>
