<?php
	date_default_timezone_set('Asia/Manila');
	error_reporting(E_ALL);
	ini_set('display_errors', 0);
	header('Access-Control-Allow-Origin: *'); 
	session_start();

	define('DB_SERVER','localhost');
	define('DB_USER','root');
	define('DB_PASS' ,'');
	define('DB_NAME', 'supplies');

	class admin_creation {
		// database conncections
		public function __construct(){
			$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
			$this->dbh=$con;
			// Check connection
			if (mysqli_connect_errno()) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
	 		}
		}

		// starting the session
	    public function get_session(){
	        return $_SESSION['login'];
	    }

	    public function employeeList(){
  			$result = mysqli_query($this->dbh,"SELECT * FROM tbl_users");
  			return $result;
	    }

	    public function save($emp, $qty, $itemDescription, $variation , $date, $remarks){
			$result = mysqli_query($this->dbh,"INSERT INTO tbl_supplies (emp_name,qty, item_desc,variation ,date, remarks) VALUES ('$emp', '$qty', '$itemDescription', '$variation' ,'$date','$remarks')");
  			return $result;
	    }

	    public function requestList(){
	    	$result = mysqli_query($this->dbh,"SELECT * FROM tbl_supplies");
  			return $result;
	    }

	    public function saveRequestee($emp){
	    	$result = mysqli_query($this->dbh,"INSERT INTO tbl_users (fullname) VALUES ('$emp')");
  			return $result;
	    }

	    public function itemDescription(){
	    	$result = mysqli_query($this->dbh,"SELECT * FROM tbl_supplies_inventory GROUP BY item_desc");
  			return $result;
	    }

	}
?>
