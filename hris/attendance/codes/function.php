<?php
	date_default_timezone_set('Asia/Manila');
	error_reporting(E_ALL);
	ini_set('display_errors', 0);
	header('Access-Control-Allow-Origin: *'); 

	define('DB_SERVER','192.168.11.213');
	define('DB_USER','root');
	define('DB_PASS' ,'');
	define('DB_NAME', 'hirs_db');

	class admin_creation {
		public function __construct(){
			$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
			$this->dbh=$con;
			if (mysqli_connect_errno()) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
	 		}
		}
		
		public function getAllEmployees(){
			$data = mysqli_query($this->dbh,"SELECT emp_id, Firstname, Lastname FROM  tbl_employee ");
			return $data;	
		}

		public function selectEmployeeonLeave($date){
			$data = mysqli_query($this->dbh,"SELECT 
									tbl_employee.Lastname as lastname,
								    tbl_employee.Firstname as firstname,
									tbl_employee.Middlename as middlename,
								    tbl_leaverequest.leaveRequest as leaveRequest,
								    tbl_leaverequest.startDate as startDate,
									tbl_leaverequest.endDate as endDate,
									tbl_leaverequest.time_Filed as time_Filed
								FROM hirs_db.tbl_leaverequest
								INNER JOIN hirs_db.tbl_employee
								ON tbl_leaverequest.emp_id = tbl_employee.emp_id
								WHERE tbl_leaverequest.status2 = 'Approved' AND startDate = '$date'   ");
			return $data;	
		}

		public function selectEmployeeCS($date){
			$data = mysqli_query($this->dbh,"SELECT 
									tbl_employee.Lastname as lastname,
								    tbl_employee.Firstname as firstname,
									tbl_employee.Middlename as middlename,
								    tbl_changeshift.date_filed1 as filed_date,
								    tbl_changeshift.rep_shiftstart as shift_start,
									tbl_changeshift.rep_shiftend as shift_end
								FROM hirs_db.tbl_changeshift
								INNER JOIN hirs_db.tbl_employee
								ON tbl_changeshift.emp_id = tbl_employee.emp_id
								WHERE date_filed1 = '$date' AND tbl_changeshift.status = 'Approved' ");
			return $data;	
								
		}

		public function selectEmployeeOB($date){
			$data = mysqli_query($this->dbh,"SELECT 
									tbl_employee.Lastname as lastname,
								    tbl_employee.Firstname as firstname,
									tbl_employee.Middlename as middlename,
								    tbl_officialbusiness.date as date,
								    								    tbl_officialbusiness.destination as destination,
								    tbl_officialbusiness.time_in as time_in,
									tbl_officialbusiness.time_out as time_out
								FROM hirs_db.tbl_officialbusiness
								INNER JOIN hirs_db.tbl_employee
								ON tbl_officialbusiness.emp_id = tbl_employee.emp_id
								WHERE date = '$date' AND tbl_officialbusiness.status = 'Approved' ");
			return $data;			
		}
	

		public function selectEmployeeNF($date){
			$data = mysqli_query($this->dbh,"SELECT 
									tbl_employee.Lastname as lastname,
								    tbl_employee.Firstname as firstname,
									tbl_employee.Middlename as middlename,
								    tbl_notifpass.date as date,
								    tbl_notifpass.notif_desc as notif_desc
								FROM hirs_db.tbl_notifpass
								INNER JOIN hirs_db.tbl_employee
								ON tbl_notifpass.emp_id = tbl_employee.emp_id
								WHERE date like '$date%' AND tbl_notifpass.status = 'Approved' ");
			return $data;		
		}

		public function TimeINVisit($fullname,$company,$tel,$email,$purpose,$date){
			$data = mysqli_query($this->dbh,"INSERT INTO tbl_visitor (name, company, number, email, visitDetails, timeIn) VALUES ('$fullname','$company','$tel','$email','$purpose','$date')");
			return $data;		
		}

		public function selectAllVisitor(){
			$data = mysqli_query($this->dbh,"SELECT id, name, company, timeIn FROM hirs_db.tbl_visitor WHERE timeOut is null");
			return $data;				
		}

		public function TimeOutVisit($id,$date){
						$data = mysqli_query($this->dbh,"UPDATE hirs_db.tbl_visitor SET timeOut = '$date' WHERE id = '$id' ");
			return $data;	
		}

		public function selectAllActiveEmployee(){
			$data = mysqli_query($this->dbh,"SELECT image, emp_id, Firstname, Lastname,department FROM hirs_db.tbl_employee WHERE status = 'Active'  ");
			return $data;
		}

		public function getProfilePic($id){
			$result = mysqli_query($this->dbh,"SELECT image FROM tbl_employee WHERE emp_id = '$id' ");		
			$user_data = mysqli_fetch_array($result);
			$imageName = $user_data['image']; 

			if( $user_data['image'] == '') {
				return "";
			}else {
				return $destination = '../admin/pages/img/' . $user_data['image'];			
			}
		}
		public function selectAllQuestion(){
			$result = mysqli_query($this->dbh,"SELECT * FROM tbl_entrancequestion WHERE status Like '%Open%' ORDER BY ID DESC ");
	        return $result;	
		}

		public function checkifattendanceexist($emp_id,$dateToday) {
			$result = mysqli_query($this->dbh,"SELECT count(id) as countID  FROM hirs_db.tbl_dailyattendance WHERE emp_id = '$emp_id' AND date = '$dateToday' ");		
			$user_data = mysqli_fetch_array($result);
			return $user_data['countID']; 
		}

		public function createattendance($emp_id,$dateToday,$time,$checks, $text ) {
			$data = mysqli_query($this->dbh,"INSERT INTO hirs_db.tbl_dailyattendance (emp_id, date, timeIn1, question, answer, status) VALUES ('$emp_id','$dateToday','$time','$checks','$text','1')");
			return $data;
		}

		public function updateattendance($emp_id,$dateToday,$time,$checks, $text ) {
			$data1 = mysqli_query($this->dbh,"SELECT id FROM hirs_db.tbl_dailyattendance WHERE emp_id = '$emp_id' AND date = '$dateToday'");
			$user_data1 = mysqli_fetch_array($data1);
			$uid = $user_data1['id'];

			$data = mysqli_query($this->dbh,"SELECT timeIn1, timeIn2 FROM hirs_db.tbl_dailyattendance WHERE id = '$uid'");
			$user_data = mysqli_fetch_array($data);
			$timeIn1 = $user_data['timeIn1'];
			$timeIn2 = $user_data['timeIn2'];

			if($timeIn2 == ''){
				$check = mysqli_query($this->dbh,"UPDATE hirs_db.tbl_dailyattendance SET timeIn2 = '$time', status = '1' WHERE emp_id = '$emp_id' AND date='$dateToday' ");
				return $check;
			} else if ($timeIn3 == ''){
				$check = mysqli_query($this->dbh,"UPDATE hirs_db.tbl_dailyattendance SET timeIn3 = '$time', status = '1' WHERE emp_id = '$emp_id' AND date='$dateToday' ");
				return $check;
			}
		}
		
		public function checkifattendancstatus($emp_id, $basedate){
			$data = mysqli_query($this->dbh,"SELECT status FROM hirs_db.tbl_dailyattendance WHERE emp_id = '$emp_id' AND date = '$basedate'");
			$user_data = mysqli_fetch_array($data);

			$data1 = mysqli_query($this->dbh,"SELECT count(id) as status FROM hirs_db.tbl_dailyattendance WHERE emp_id = '$emp_id' AND status = '1'");
			$user_data1 = mysqli_fetch_array($data1);

			if($user_data1['status'] > 0){
				$check = "1";
			} else if($user_data['status'] == "" ||$user_data['status'] == "0" ) {
				$check = "0";
			} else {
				$check = "1";
			}
			return $check;
		}

		public function TimeOUTattendance($emp_id,$status,$assessment,$time){
			$data1 = mysqli_query($this->dbh,"SELECT id FROM hirs_db.tbl_dailyattendance WHERE emp_id = '$emp_id' AND status = '$status'");
			$user_data1 = mysqli_fetch_array($data1);
			$uid = $user_data1['id'];

			$data = mysqli_query($this->dbh,"SELECT timeOut1, timeOut2, timeOut1 FROM hirs_db.tbl_dailyattendance WHERE id = '$uid'");
			$user_data = mysqli_fetch_array($data);
		 	$timeout1 = $user_data['timeOut1'];
			$timeout2 = $user_data['timeOut2'];
			$timeout3 = $user_data['timeOut3'];

			if($timeout1 == ""){
				$check = mysqli_query($this->dbh,"UPDATE hirs_db.tbl_dailyattendance SET timeOUT1 = '$time', choice = '$assessment', status = '0' WHERE id = '$uid'");
			} else if ($timeout2 == "" ){
				$check = mysqli_query($this->dbh,"UPDATE hirs_db.tbl_dailyattendance SET timeOUT2 = '$time', choice = '$assessment', status = '0' WHERE id = '$uid'");
			} else if ($timeout3 == "" ){
				$check = mysqli_query($this->dbh,"UPDATE hirs_db.tbl_dailyattendance SET timeOUT3 = '$time', choice = '$assessment', status = '0' WHERE id = '$uid'");
			}
			return $check;
		}

		public function timeInOutDesc($emp_id, $basedate){
			$sql = mysqli_query($this->dbh,"SELECT timeIn1, timeOut1,timeOut2,timeOut3, date FROM hirs_db.tbl_dailyattendance WHERE emp_id = '$emp_id' AND date = '$basedate'");
			$data = mysqli_fetch_array($sql);
			 $count_row = $sql->num_rows;
				 	$date = $data['date'];	 
		 	$timeIn1 = $data['timeIn1'];
		 	
		 	$timeOut1 = $data['timeOut1'];
		 	$timeOut2 = $data['timeOut2'];
		 	$timeOut3 = $data['timeOut3'];


		 	if($count_row == 0) {
				$sql1 = mysqli_query($this->dbh,"SELECT  timeOut1 as out1,timeOut2 as out2, timeOut3 as out3, date as date1 FROM hirs_db.tbl_dailyattendance WHERE emp_id = '$emp_id' LIMIT 1");
				$data1 = mysqli_fetch_array($sql1);
		 		$date1 = $data1['date1'];
		 		$out3 = $data1['out3'];
		 		$out2 = $data1['out2'];
		 		$out1 = $data1['out1'];

		 		if($out3 != ""){
		 			return "Has logged off " . $date1 . " at " .$out3;
		 		} else if($out2 != ""){
					return "Has logged off " . $date1 . " at " .$out2;
		 		} else if($out1 != ""){
		 			return "Has logged off " . $date1 . " at " .$out1;
		 		} else {
		 			return "";
		 		}
		 	} else {
		 		if($timeOut3 != ""){
		 			return "Has logged off " . $date . " at " . $timeOut3 . "3";
				} else if($timeOut3 != ""){
					return "Has logged off " . $date . " at " . $timeOut2 . "2" ;
				} else if ($timeOut2 != "") {
				 	return "Has logged off " . $date . " at " . $timeOut1 . "1";
				} else if($timeOut1 != "") {
				 	if($timeIn1 != ""){
		 				return "Has logged off " . $date . " at " . $timeOut1 . "1";
		 			}
		 		} else {
		 			return "Has logged In " . $date . " at " . $timeIn1;
		 		}
		 	}

		}

		
	} 
?>