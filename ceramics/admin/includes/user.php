<?php
/* User Class for account creation and login pupose
*/
class User
{
	
	private $con;

	function __construct()
	{
		include_once("../database/db.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	//User is already registered or not
	private function emailExists($email){
		$pre_stmt = $this->con->prepare("SELECT user_id FROM user_info WHERE email = ? ");
		$pre_stmt->bind_param("s",$email);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		if($result->num_rows > 0){
			return 1;
		}else{
			return 0;
		}
	}

	public function createUserAccount($fname,$lname,$email,$password,$mobile,$address1,$address2,$usertype){
		//To protect your application from sql attack you can user 
		//prepares statment
		if ($this->emailExists($email)) {
			return "EMAIL_ALREADY_EXISTS";
		}else{
			$pass_hash = md5($password);
			$date = date("Y-m-d");
			$notes = "";
			$pre_stmt = $this->con->prepare("INSERT INTO `user_info` (`first_name`, `last_name`, `email`, 
			`password`, `mobile`, `address1`, `address2`,`usertype`,`register_date`,`last_login`,`notes`)
			 VALUES (?,?,?,?,?,?,?,?,?,?,?)");
			$pre_stmt->bind_param("sssssssssss",$fname, $lname, $email,$pass_hash, $mobile, $address1, $address2,$usertype,$date,$date,$notes);
			$result = $pre_stmt->execute() or die($this->con->error);
			if ($result) {
				return $this->con->insert_id;
			}
			else{
				return "SOME_ERROR";
			}
		}
			
	}

	public function userLogin($email,$password){
		$pre_stmt = $this->con->prepare("SELECT user_id,first_name,last_name,password,last_login FROM user_info WHERE email = ? AND usertype = 'Admin'");
		$pre_stmt->bind_param("s",$email);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();

		if ($result->num_rows < 1) {
			return "NOT_REGISTERD";
		}else{
			$row = $result->fetch_assoc();
			$pass = md5($password);
			if ($pass == $row["password"]) {
				$_SESSION["userid"] = $row["user_id"];
				$_SESSION["username"] = $row["first_name"];
				$_SESSION["username1"] = $row["last_name"];
				$_SESSION["last_login"] = $row["last_login"];
				$_SESSION["usertype"] = "Admin";

				//Here we are updating user last login time when he is performing login
				$last_login = date("Y-m-d h:m:s");
				$pre_stmt = $this->con->prepare("UPDATE user_info SET last_login = ? WHERE email = ?");
				$pre_stmt->bind_param("ss",$last_login,$email);
				$result = $pre_stmt->execute() or die($this->con->error);
				if ($result) {
					return 1;
				}else{
					return 0;
				}

			}else{
				return "PASSWORD_NOT_MATCHED";
			}
		}
	}
	
	
	//for changing the password
	public function changePassword($email,$oldpassword,$password,$repassword){
		$pre_stmt = $this->con->prepare("SELECT user_id, password FROM user_info WHERE email = ? AND usertype = 'Admin'");
		$pre_stmt->bind_param("s",$email);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		if ($result->num_rows < 1) {
			return "EMAIL NOT CORRECT";
		}
		else{
			$row = $result->fetch_assoc();
			$pass = $row['password'];
			   if($oldpassword!= $pass){
        			return "Password incorrect";
        		   }
        		   if($password != $repassword){
        		   	return "Wrong Entry";
        		   }
        		   if($password==$repassword) {
        		   	if (isset($_SESSION["userid"])) {
					session_destroy();
				}
        			$password = md5($password);
        			$pre_stmt = $this->con->prepare("UPDATE user_info set password = ? WHERE email = ?");
				$pre_stmt->bind_param("ss",$password,$email);
				$result = $pre_stmt->execute() or die($this->con->error);
				if ($result) {
					return "DONE";
				}else{
					return "Error";
				}
				
        		   }		   
        	}
	
	}

}
?>
