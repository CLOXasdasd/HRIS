<?php
	date_default_timezone_set('Asia/Manila');
	error_reporting(E_ALL);
	ini_set('display_errors', 0);
	header('Access-Control-Allow-Origin: *'); 

	define('DB_SERVER1','192.168.11.177');
	define('DB_USER1','root');
	define('DB_PASS1' ,'');
	define('DB_NAME1', 'injection');

	class injection_creation {
		// database conncections
		public function __construct(){
			$con = mysqli_connect(DB_SERVER1,DB_USER1,DB_PASS1,DB_NAME1);
			$this->dbh=$con;
			// Check connection
			if (mysqli_connect_errno()) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
	 		}
		}


		public function getDailySchedule(){
			$result=mysqli_query($this->dbh," SELECT 
						tbl_schedule.id as id,
						tbl_schedule.ihp_no as ihp_no,

						tbl_workorder.prod_desc as prod_desc,
						tbl_workorder.machine_no as machine_no,

						tbl_schedule.emp_id as emp_id,
                        tbl_users.firstname as firstname,
						tbl_schedule.schedule as schedule,
						tbl_schedule.time_in as time_in,
						tbl_schedule.time_out as time_out,
						tbl_schedule.break_in as break_in,
						tbl_schedule.break_out as break_out,
						tbl_schedule.break_in1 as break_in1,
						tbl_schedule.break_out2 as break_out1
				FROM injection.tbl_schedule 
				INNER JOIN injection.tbl_users 
				ON tbl_users.emp_id = tbl_schedule.emp_id
				INNER JOIN injection.tbl_workorder
				ON tbl_workorder.sap_wo_number = tbl_schedule.ihp_no
				WHERE time_in is not null ORDER BY tbl_schedule.time_in DESC");
			return $result;
		}


	} 

?>

