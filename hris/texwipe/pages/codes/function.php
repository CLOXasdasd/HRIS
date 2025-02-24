<?php
	date_default_timezone_set('Asia/Manila');
	error_reporting(E_ALL);
	ini_set('display_errors', 0);
	header('Access-Control-Allow-Origin: *'); 
	session_start();

	define('DB_SERVER','192.168.11.177');
	define('DB_USER','root');
	define('DB_PASS' ,'');
	define('DB_NAME', 'hirs_db');

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

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

	    // end session
	    public function user_logout() {
	        $_SESSION['login'] = FALSE;
	        session_destroy();
	    }

		// user login
	   	public function check_login($emp_id, $password){
			$encryted_password=base64_encode(urldecode($password));
	      
	        $result = mysqli_query($this->dbh,"SELECT emp_id,  Firstname,Middlename,Lastname,department,position,status FROM tbl_employee WHERE emp_id='$emp_id' and password='$encryted_password' AND status = 'Active'");
	        $user_data = mysqli_fetch_array($result);
	        $count_row = $result->num_rows;

	        if ($count_row == 1) {
	        	$_SESSION['login'] = true;  
	            $_SESSION['emp_id'] = $user_data['emp_id'];  
	            $_SESSION['name'] = $user_data['Firstname'] . " " . $user_data['Middlename'] . " " . $user_data['Lastname'];  
	            $_SESSION['department'] = $user_data['department']; 	            
	            $_SESSION['position'] = $user_data['position'];  
			    $_SESSION['status'] = $user_data['status'];  		

			    $account_admin = $_SESSION['name'];
			    $description = " user [". $account_admin."] has logged in"; 
			    $date = date("Y-m-d H:i:s") ;
			    mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");
	            return $result;
	        } else {
	      	    return 0;
	        }
	    }

	    public function logout($name){
 			$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has logged out"; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");
	    }

	    public function updateProfile($username,$name,$account_type,$email){
	        $result = mysqli_query($this->dbh,"UPDATE tbl_users SET username='$username', name='$name', account_type='$account_type',email='$email' WHERE username = '$username' ");

	        	$account_admin = $_SESSION['name'];
				$description = " user [". $account_admin."] has Update Information"; 
				$date = date("Y-m-d H:i:s") ;
				mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");
	        return $result;
	    }

	    public function ChangePassword($oldPass,$newPass,$username){
	    	$oldpassword=base64_encode(urldecode($oldPass));
			$newpassword=base64_encode(urldecode($newPass));
			
			$result = mysqli_query($this->dbh,"SELECT emp_id FROM tbl_employee WHERE emp_id='$username' and password='$oldpassword'");
	        $count_row = $result->num_rows;	

	        if ($count_row == 1) {
	        	$data = mysqli_query($this->dbh,"UPDATE tbl_employee SET password='$newpassword' WHERE emp_id = '$username'");

	        	$account_admin = $_SESSION['name'];
				$description = " user [". $account_admin."] has Change Password"; 
				$date = date("Y-m-d H:i:s") ;
				mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");

	        	return $data;
	        } else {
	      	    return 0;
	        }    	
	    }

	    public function createAdminAccount($username,$name,$accountType,$email, $password, $status){
	    	$encryted_password=base64_encode(urldecode($password));

	    	$exist = mysqli_query($this->dbh,"SELECT username FROM tbl_users WHERE username='$username' ");
	        $count_row = $exist->num_rows;		    	

	        if ($count_row >= 1) {
	      	    return 0;
	        } else {
	        	$result = mysqli_query($this->dbh,"INSERT INTO tbl_users (username, password, name, account_type, status, email) VALUES ('$username','$encryted_password','$name','$accountType','$status', '$email') ");
		    	$account_admin = $_SESSION['name'];
				$description = " user [". $account_admin."] has Created Account for [". $username ."]"; 
				$date = date("Y-m-d H:i:s") ;
				mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");
		        
	        	return $result;	
	        } 
	    }

	    public function selectAddAdminAccount(){
	    	$select = mysqli_query($this->dbh,"SELECT username, name, account_type, email, status FROM tbl_users");
	    	return $select;
	    }

	    public function changeAdminStatus($username, $status){
	    	$data = mysqli_query($this->dbh,"UPDATE tbl_users SET status='$status' WHERE username = '$username'");

	    	$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has change [". $username ."] status to [".$status."]"; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");
	        return $data;	
	    }

	    public function changeAdminPassword($username, $password){
	    	$encryted_password=base64_encode(urldecode($password));
	    	$data = mysqli_query($this->dbh,"UPDATE tbl_users SET password='$encryted_password' WHERE username = '$username'");

	    	$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has change reset password for [". $username ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");
	        return $data;
	    }

	    public function createDepartment($department){
	    	$result = mysqli_query($this->dbh,"INSERT INTO tbl_department (dept_description) VALUES ('$department') ");
		    	$account_admin = $_SESSION['name'];
				$description = " user [". $account_admin."] has Created Department [". $department ."]"; 
				$date = date("Y-m-d H:i:s") ;
				mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");
	        	return $result;	
	    }

	    public function selectDepartment(){
	    	$select = mysqli_query($this->dbh,"SELECT * FROM tbl_department");
	    	return $select;
	    }

	    public function deleteDepartment($id){
	    	 $select = mysqli_query($this->dbh,"DELETE FROM tbl_department WHERE dept_id = '$id'");
		    	$account_admin = $_SESSION['name'];
				$description = " user [". $account_admin."] has Deleted Department [". $department ."]"; 
				$date = date("Y-m-d H:i:s") ;
				mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");
	    	return $select;
	    }

	    public function createPosition($position, $approver){
	    		$result = mysqli_query($this->dbh,"INSERT INTO tbl_position (position_desc, approver) VALUES ('$position', '$approver') ");
		    	$account_admin = $_SESSION['name'];
				$description = " user [". $account_admin."] has Created Postion [". $position ."]"; 
				$date = date("Y-m-d H:i:s") ;
				mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");
		        
	        	return $result;	
	    }

	    public function  selectPosition(){
	    	$select = mysqli_query($this->dbh,"SELECT * FROM tbl_position");
	    	return $select; 	
	    }
		
		public function deletePosition($id){
			$account_admin = $_SESSION['name'];
				$description = " user [". $account_admin."] has deleted Postion [". $id ."]"; 
				$date = date("Y-m-d H:i:s") ;
				mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");
			$select = mysqli_query($this->dbh,"DELETE FROM tbl_position WHERE id = '$id'");
	    	return $select; 		
		}

		public function reports(){
			$select = mysqli_query($this->dbh,"SELECT * FROM tbl_reports ORDER BY id DESC");
	    	return $select; 				
		}

		public function createDocumentType($Document){
			$data = mysqli_query($this->dbh,"INSERT INTO tbl_documenttype (description) VALUES ('$Document')");
			return $data;				
		}

		public function selectDocument(){
			$data = mysqli_query($this->dbh,"SELECT * FROM  tbl_documenttype ");
			return $data;	
		}

		public function DeleteDocumentType($id){
			$data = mysqli_query($this->dbh,"DELETE FROM  tbl_documenttype WHERE id = '$id'");
			return $data;				
		}

		public function createEmployee($emp_id,$status,$position,$department,$Lastname,$Firstname,$Middlename,$date_hired,$emp_status_1,$emp_status_2, $age,$civil_status,$gender,$birthday,$contact,$course,$school,$contact_person,$contact_person_num,$contact_relation,$sss,$TIN,$philhealth,$pagibig,$spouse,$spouse_bday,$dependent1,$dependent1_bday,$dependent2,$dependent2_bday,$dependent3,$dependent3_bday,$dependent4,$dependent4_bday, $present_address, $permanent_address){

			$encryted_password=base64_encode(urldecode($emp_id));
	        $result = mysqli_query($this->dbh,"SELECT emp_id FROM tbl_employee WHERE emp_id ='$emp_id' ");
	        $user_data = mysqli_fetch_array($result);
	        $count_row = $result->num_rows;

 			if ($count_row == 0) {
				$data = mysqli_query($this->dbh,"INSERT INTO tbl_employee (emp_id,password,status,position,department,Lastname,Firstname,Middlename, date_hired,emp_status_1,emp_status_2, age, civil_status,gender,birthday,contact,course,school,contact_person,contact_person_num,contact_relation,sss,TIN,philhealth,pagibig,spouse,spouse_bday,dependent1,dependent1_bday,dependent2,dependent2_bday,dependent3,dependent3_bday,dependent4,dependent4_bday,present_address,permanent_address) VALUES ('$emp_id','$encryted_password','$status','$position','$department','$Lastname','$Firstname','$Middlename','$date_hired','$emp_status_1','$emp_status_2', '$age','$civil_status','$gender','$birthday','$contact','$course','$school','$contact_person','$contact_person_num','$contact_relation','$sss','$TIN','$philhealth','$pagibig','$spouse','$spouse_bday','$dependent1','$dependent1_bday','$dependent2','$dependent2_bday','$dependent3','$dependent3_bday','$dependent4','$dependent4_bday','$present_address','$permanent_address')");
				return $data;
			} else {
				return "Exist";
			}
		}

		public function selectEmployeeAccounts(){
			$data = mysqli_query($this->dbh,"SELECT emp_id,status,position,department,Lastname,Firstname,Middlename FROM  tbl_employee ");
			return $data;		
		}

		public function selectEmployeeAccountsDepartment($emp_id){
			$data = mysqli_query($this->dbh,"SELECT emp_id,status,position,department,Lastname,Firstname,Middlename FROM  tbl_employee WHERE firstapprover = '$emp_id'");
			return $data;		
		}

		public function getEmployeeInformation($id){
			$data = mysqli_query($this->dbh,"SELECT * FROM  tbl_employee WHERE emp_id = '$id'");
			return $data;	
		}

		public function deactivateEmployeeAccount($emp_id,$status){
			$data = mysqli_query($this->dbh,"UPDATE tbl_employee SET status='$status' WHERE emp_id = '$emp_id'");

	    	$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has change " . $status . " for employee id [". $emp_id ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");	
			return $data;		
		}

		public function changedEmployeeAccount($emp_id){
			$encryted_password=base64_encode(urldecode($emp_id));
			$data = mysqli_query($this->dbh,"UPDATE tbl_employee SET password='$encryted_password' WHERE emp_id = '$emp_id'");

	    	$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has change change passdord for employee id [". $emp_id ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");	
			return $data;		
		}

		public function createLeaveType($leave_description, $leave_Count, $earned){
			$data = mysqli_query($this->dbh,"INSERT INTO tbl_leavetype (leave_description, leave_count,earned) VALUES ('$leave_description','$leave_Count','$earned')");

			$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has Created Leave  [". $leave_description ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");	
			return $data;		
		}

		public function selectLeaveTypes(){
			$data = mysqli_query($this->dbh,"SELECT * FROM tbl_leavetype");
			return $data;			
		}

		public function deleteLeaveType($id){
			$data = mysqli_query($this->dbh,"DELETE FROM tbl_leavetype WHERE id = '$id'");
			return $data;			
		}

		public function selectLeaveDesignation(){
			$data = mysqli_query($this->dbh,"SELECT * FROM tbl_leavetype");
			return $data;	
		}

		public function saveLeaveRequest($emp_id, $selected){
			$data = mysqli_query($this->dbh,"UPDATE tbl_employee SET leaveType='$selected' WHERE emp_id = '$emp_id'");
			return $data;				
		}

		public function selectLeaves($id){
			$result = mysqli_query($this->dbh,"SELECT leaveType FROM tbl_employee WHERE emp_id='$id' ");
			$user_data = mysqli_fetch_array($result);
			$leave = explode(",",$user_data['leaveType']);  
			$leave_id = implode("','", $leave);
			$data = mysqli_query($this->dbh,"SELECT * FROM tbl_leavetype WHERE id in ('$leave_id') ");
			return $data;
		}

		public function checkleave($leave_id, $emp_id){
			$result = mysqli_query($this->dbh,"SELECT leaveType FROM tbl_employee WHERE emp_id='$emp_id' ");
			$user_data = mysqli_fetch_array($result);
			$leave = explode(",",$user_data['leaveType']); 
			if (in_array($leave_id, $leave)) {
			    echo "Checked";
			}
		}

		public function selectDocumentEmployee($id){
			$result = mysqli_query($this->dbh,"SELECT documentType as documentType,
					document_description as document_description,
					id as doc_id FROM tbl_employeedocuments WHERE emp_id='$id' AND status = 'Viewable' ");		
			return $result;	
		}

		public function saveFileRequest($emp_id, $documentTypes, $filename){
			$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has uploaded " . $documentTypes . " for employee id [". $emp_id ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");

			$date = date("y-m-d");
			$sql =  mysqli_query($this->dbh,"INSERT INTO tbl_employeedocuments (emp_id,documentType, document_description, date_uploaded) VALUES ('$emp_id', '$documentTypes', '$filename','$date') ");
			return "Uploaded Successfully";
		}
		
		public function selectAllNotifRequest($emp_id){
			$result = mysqli_query($this->dbh,"SELECT 
							tbl_employee.Firstname as Firstname,
						    tbl_employee.Lastname as Lastname,
						    tbl_itrequest.department as department,
						    tbl_itrequest.dateFiled as dateFiled,
						    tbl_itrequest.description as description,
						    tbl_itrequest.resolution as resolution,
						    tbl_itrequest.datefinished as datefinished,
						    tbl_itrequest.status as status,
						    tbl_itrequest.ITConcernID as ITConcernID
						FROM hirs_db.tbl_itrequest 
						INNER JOIN hirs_db.tbl_employee
						ON tbl_itrequest.employee_name = tbl_employee.emp_id
						WHERE tbl_itrequest.employee_name = '$emp_id'
						ORDER BY id DESC");		
			return $result;				
		}


		public function selectAllNotifRequest1($emp_id){
			$result = mysqli_query($this->dbh,"SELECT 
							tbl_employee.Firstname as Firstname,
						    tbl_employee.Lastname as Lastname,
						    tbl_notifpass.dateFiled as dateFiled,
						    tbl_notifpass.date as date,
						    tbl_notifpass.notif_desc as notif_desc,
						    tbl_notifpass.status as status,
						    tbl_notifpass.notifID as notifID,
						    tbl_notifpass.status1 as status1,
						    tbl_notifpass.status2 as status2

						FROM hirs_db.tbl_notifpass 
						INNER JOIN hirs_db.tbl_employee

						ON tbl_notifpass.emp_id = tbl_employee.emp_id
						WHERE tbl_notifpass.emp_id = '$emp_id'
						ORDER BY id DESC");		
			return $result;				
		}
		public function selectAllNotifRequestList($department){
			$result = mysqli_query($this->dbh,"
				SELECT 
						tbl_employee.Firstname as Firstname,
						tbl_employee.Lastname as Lastname,
						tbl_notifpass.notifID,
						tbl_notifpass.notif_desc,
						tbl_notifpass.status,
						tbl_notifpass.status1,
						tbl_notifpass.status2		 
				FROM hirs_db.tbl_notifpass
				INNER JOIN hirs_db.tbl_employee 
				ON tbl_notifpass.emp_id = tbl_employee.emp_id
				WHERE  tbl_employee.department= '$department' AND tbl_notifpass.status = 'Pending' AND tbl_notifpass.status1 is null");
			return $result;				
		}

		public function selectAllNotifRequestListhead($emp_id){
			$result = mysqli_query($this->dbh,"
					SELECT 
							tbl_employee.Firstname as Firstname,
						    tbl_employee.Lastname as Lastname,
						    tbl_notifpass.date as date,
						    tbl_notifpass.notif_desc as notif_desc,
						    tbl_notifpass.status as status,
						    tbl_notifpass.notifID as notifID,
						    tbl_notifpass.status1 as status1,
						    tbl_notifpass.status2 as status2
					FROM hirs_db.tbl_notifpass 
					INNER JOIN hirs_db.tbl_employee 
					ON tbl_notifpass.emp_id = tbl_employee.emp_id
					WHERE  tbl_notifpass.firstapprover = '$emp_id'  AND status1 is null
				OR tbl_notifpass.secondapprover = '$emp_id' AND tbl_notifpass.status1 = 'Approved' AND tbl_notifpass.status2 is null
				OR tbl_notifpass.secondapprover = '$emp_id' AND tbl_notifpass.firstapprover = ''   AND tbl_notifpass.status2 is null  ");
			return $result;				
		}

		public function selectAllNotifRequestListWarehouse($department){
			$result = mysqli_query($this->dbh,"
			SELECT 
					tbl_employee.Firstname as Firstname,
					tbl_employee.Lastname as Lastname,
					tbl_notifpass.notifID,
					tbl_notifpass.notif_desc,
					tbl_notifpass.status,
					tbl_notifpass.status1,
					tbl_notifpass.status2		 
			FROM hirs_db.tbl_notifpass
			
			INNER JOIN hirs_db.tbl_employee 
			ON tbl_notifpass.emp_id = tbl_employee.emp_id

			WHERE  tbl_employee.department= '$department' OR tbl_employee.department = 'Warehouse' AND tbl_notifpass.status = 'Pending' AND tbl_notifpass.status1 is null");
			return $result;				
		}

		public function saveNotifPass($emp_id, $date_filed,$department,$concern, $nfID){
			// $sql = mysqli_query($this->dbh,"SELECT Firstname, Lastname FROM tbl_employee WHERE emp_id='$emp_id' ");
			// $user_data = mysqli_fetch_array($sql);
			// $name = $user_data['Firstname'] . " " . $user_data['Lastname']; 

			$result = mysqli_query($this->dbh,"INSERT INTO tbl_itrequest (employee_name,dateFiled, department, description, ITConcernID, status) VALUES ('$emp_id', '$date_filed','$department','$concern', '$nfID', 'Open')");

			// $account_admin = $_SESSION['name'];
			// $description = " user [". $account_admin."] has Create IT Concern ID [" .$nfID . "] "; 
			// $date = date("Y-m-d H:i:s") ;
			// mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");
			return $result;
		}


		public function saveNotifPass1($nfID, $employee_id,$date_filed ,$notification, $status, $firstapprover, $secondapprover,$dateFiled){

			$sql = mysqli_query($this->dbh,"SELECT Firstname, Lastname FROM tbl_employee WHERE emp_id='$employee_id' ");
			$user_data = mysqli_fetch_array($sql);
			$name = $user_data['Firstname'] . " " . $user_data['Lastname']; 

			
				$result = mysqli_query($this->dbh,"INSERT INTO tbl_notifpass (notifID,emp_name ,emp_id, date, notif_desc, status, firstapprover, secondapprover,dateFiled) VALUES ('$nfID','$name' ,'$employee_id','$date_filed' ,'$notification', '$status', '$firstapprover', '$secondapprover','$dateFiled')");
				return $result;
		}

		public function rejectFinalApprover($id,$status){
			$account_admin = $_SESSION['name'] . " " . date("Y-m-d H:i:s");;
			$description = " user [". $account_admin."] has  " . $status . " notification pass [". $id ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");

			  $result = mysqli_query($this->dbh,"        SELECT 
				tbl_notifpass.emp_id as emp_id,
				tbl_notifpass.firstapprover as firstapprover,
				tbl_notifpass.secondapprover as secondapprover,
				tbl_notifpass.status1 as status1
				FROM hirs_db.tbl_notifpass 
				INNER JOIN hirs_db.tbl_employee
				ON tbl_notifpass.emp_id = tbl_notifpass.emp_id WHERE notifID = '$id' ");
			$user_data = mysqli_fetch_array($result);
	        $approver1 =  $user_data['firstapprover'];
	        $approver2 =  $user_data['secondapprover'];
	        $status1 =  $user_data['status1'];

	        if( $approver1 == '' && $approver2 != '' ){
				$data = mysqli_query($this->dbh,"UPDATE tbl_notifpass SET status2= '$status' , status2_approver = '$account_admin', status= '$status'  WHERE notifID = '$id'");	
	        } else if( $approver1 != '' && $status1 == '' ){
				$data = mysqli_query($this->dbh,"UPDATE tbl_notifpass SET status1= '$status' , status1_approver = '$account_admin' WHERE notifID = '$id'");		   
	        } else {
				$data = mysqli_query($this->dbh,"UPDATE tbl_notifpass SET status2= '$status' , status2_approver = '$account_admin', status= '$status'  WHERE notifID = '$id'");
	        }
		
			return $data;				
		}

		public function selectAllOBRequest($emp_id){
			$result = mysqli_query($this->dbh,"SELECT * FROM tbl_officialbusiness WHERE emp_id ='$emp_id' ORDER BY id DESC");		
			return $result;				
		}

		public function selectAllOBRequestList($emp_id){
			$result = mysqli_query($this->dbh,"
			SELECT
					tbl_officialbusiness.OBid,
					tbl_officialbusiness.emp_name,
					tbl_officialbusiness.date,
					tbl_officialbusiness.time_in,
					tbl_officialbusiness.time_out,
					tbl_officialbusiness.destination,
					tbl_officialbusiness.reason,
					tbl_officialbusiness.status,
					tbl_officialbusiness.status1
			FROM hirs_db.tbl_officialbusiness 
			INNER JOIN hirs_db.tbl_employee 
			ON tbl_officialbusiness.emp_id = tbl_employee.emp_id
			WHERE tbl_employee.firstapprover = '$emp_id' AND  status1 is null AND status2 is null
			OR tbl_employee.secondapprover = '$emp_id' AND status1 = 'Approved'  AND status2 is null
			OR tbl_employee.secondapprover = '$emp_id' AND tbl_employee.firstapprover = ''   AND status2 is null
			ORDER BY id DESC");
			return $result;		
		}

		public function selectAllOBRequestAll(){
			$result = mysqli_query($this->dbh,"
			SELECT
					tbl_officialbusiness.OBid,
					tbl_officialbusiness.emp_name,
					tbl_officialbusiness.date,
					tbl_officialbusiness.time_in,
					tbl_officialbusiness.time_out,
					tbl_officialbusiness.destination,
					tbl_officialbusiness.reason,
					tbl_officialbusiness.status,
					tbl_officialbusiness.status1
			FROM hirs_db.tbl_officialbusiness 
			INNER JOIN hirs_db.tbl_employee 
			ON tbl_officialbusiness.emp_id = tbl_employee.emp_id
			WHERE   tbl_officialbusiness.status = 'Pending' OR tbl_officialbusiness.status1 is null AND tbl_officialbusiness.status1 != 'Rejected' or tbl_officialbusiness.status2 AND tbl_officialbusiness.status2 != 'Rejected' is null  ORDER BY id DESC");
			return $result;		
		}


		public function saveOB($OBID,$emp_id, $date_filed,$notification,$timein,$timeout,$destination,$dateFiled){
			$sql = mysqli_query($this->dbh,"SELECT Firstname, Lastname FROM tbl_employee WHERE emp_id='$emp_id' ");
			$user_data = mysqli_fetch_array($sql);
			$name = $user_data['Firstname'] . " " . $user_data['Lastname']; 

			$result = mysqli_query($this->dbh,"INSERT INTO tbl_officialbusiness (OBid, emp_id, emp_name, date, reason, time_in, time_out,destination, status,dateFiled) VALUES ('$OBID','$emp_id','$name' ,'$date_filed','$notification','$timein','$timeout','$destination','Pending','$dateFiled')");
	
			$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has created Official Business Request for [". $name ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");

			return $result;	
		}

		public function rejectFinalApproverOB($id,$status){
			$account_admin = $_SESSION['name']. " " . date("Y-m-d H:i:s");
			$description = " user [". $account_admin."] has  " . $status . " Officil Business pass [". $id ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");

			$result = mysqli_query($this->dbh,"
				SELECT 
					tbl_officialbusiness.emp_id as emp_id,
					tbl_employee.firstapprover as firstapprover,
					tbl_employee.secondapprover as secondapprover,
					tbl_officialbusiness.status1 as status1
				FROM hirs_db.tbl_officialbusiness 
				INNER JOIN hirs_db.tbl_employee
				ON tbl_employee.emp_id = tbl_officialbusiness.emp_id WHERE OBid = '$id' ");
			$user_data = mysqli_fetch_array($result);
	        $approver1 =  $user_data['firstapprover'];
	        $approver2 =  $user_data['secondapprover'];
	        $status1 =  $user_data['status1'];

   			if( $approver1 == '' && $approver2 != '' ){
				$data = mysqli_query($this->dbh,"UPDATE tbl_officialbusiness SET  status2= '$status' , status2_approver = '$account_admin' , status= '$status'WHERE OBid = '$id'");			
	        } else if( $approver1 != '' && $status1 == '' ){
				$data = mysqli_query($this->dbh,"UPDATE tbl_officialbusiness SET  status1= '$status' , status1_approver = '$account_admin' WHERE OBid = '$id'");
	        } else {
				$data = mysqli_query($this->dbh,"UPDATE tbl_officialbusiness SET  status2= '$status' , status2_approver = '$account_admin' , status= '$status'WHERE OBid = '$id'");		
	        }

			return $data;				
		}

		public function rejectFinalOB($id,$status){
			$data = mysqli_query($this->dbh,"UPDATE tbl_officialbusiness SET status= '$status'WHERE OBid = '$id'");	
						return $data;		
		}

		public function saveOT($OTID,$emp_id,$date_filed,$hours,$notification,$date,$date_filed_to){
			$sql = mysqli_query($this->dbh,"SELECT Firstname, Lastname FROM tbl_employee WHERE emp_id='$emp_id' ");
			$user_data = mysqli_fetch_array($sql);
			$name = $user_data['Firstname'] . " " . $user_data['Lastname']; 

			$result = mysqli_query($this->dbh,"INSERT INTO tbl_overtime 
				(OTID, emp_id, emp_name, date_worked,total_hours,reason,  date_filed, status,date_filed_to)
				VALUES ('$OTID','$emp_id','$name','$date_filed','$hours','$notification','$date','Pending','$date_filed_to')");
	
			$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has created Official Business Request for [". $name ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");

			return $result;	
		}

		public function selectOTRequest($emp_id){
			$result = mysqli_query($this->dbh,"SELECT * FROM tbl_overtime WHERE emp_id = '$emp_id' ORDER BY id DESC");		
			return $result;	
		}

		public function selectOTRequestList($department){
			$result = mysqli_query($this->dbh,"
				SELECT
					tbl_overtime.OTID,
					tbl_overtime.emp_name,
					tbl_overtime.date_worked,
					tbl_overtime.total_hours,
					tbl_overtime.reason,
					tbl_overtime.status,
					tbl_overtime.status1
				FROM hirs_db.tbl_overtime 
				INNER JOIN hirs_db.tbl_employee 
				ON tbl_overtime.emp_id = tbl_employee.emp_id
				WHERE  department = '$department'  AND tbl_overtime.status = 'Pending' AND tbl_overtime.status1 is null");		
							return $result;	
		}

		public function selectOTRequestListHead($emp_id){
			$result = mysqli_query($this->dbh,"
						SELECT
							tbl_overtime.OTID,
							tbl_overtime.emp_name,
							tbl_overtime.date_worked,
							tbl_overtime.total_hours,
							tbl_overtime.date_filed_to,
							tbl_overtime.reason,
							tbl_overtime.status,
							tbl_overtime.status1,
							tbl_overtime.date_filed
						FROM hirs_db.tbl_overtime 
						INNER JOIN hirs_db.tbl_employee 
						ON tbl_overtime.emp_id = tbl_employee.emp_id
						WHERE firstapprover = '$emp_id'  AND status1 is null AND status2 is null 
						OR secondapprover = '$emp_id' AND status1 = 'Approved'  AND status2 is null 
						OR secondapprover = '$emp_id' AND firstapprover = ''   AND status2 is null
						ORDER BY id DESC");		
			return $result;	
		}

		public function selectOTRequestListWarehouse($department){
			$result = mysqli_query($this->dbh,"SELECT
					tbl_overtime.OTID,
					tbl_overtime.emp_name,
					tbl_overtime.date_worked,
					tbl_overtime.total_hours,
					tbl_overtime.reason,
					tbl_overtime.status,
					tbl_overtime.status1

				 	FROM hirs_db.tbl_overtime 
					INNER JOIN hirs_db.tbl_employee 
					ON tbl_overtime.emp_id = tbl_employee.emp_id
					WHERE  department = '$department'  OR department = 'Warehouse'  AND tbl_overtime.status = 'Pending' AND tbl_overtime.status1 is null");		
			return $result;		
		}

		public function rejectFinalApproverOT($id,$status){
			$account_admin = $_SESSION['name']. " " . date("Y-m-d H:i:s");
			$description = " user [". $account_admin."] has  " . $status . " Overtime ID [". $id ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");


	        $result = mysqli_query($this->dbh,"SELECT 
				tbl_overtime.emp_id as emp_id,
				tbl_employee.firstapprover as firstapprover,
				tbl_employee.secondapprover as secondapprover,
				tbl_overtime.status1 as status1
				FROM hirs_db.tbl_overtime 
				INNER JOIN hirs_db.tbl_employee
				ON tbl_employee.emp_id = tbl_overtime.emp_id WHERE OTID = '$id' ");
			$user_data = mysqli_fetch_array($result);
	        $approver1 =  $user_data['firstapprover'];
	        $approver2 =  $user_data['secondapprover'];
	        $status1 =  $user_data['status1'];

	        if( $approver1 == '' && $approver2 != '' ){
				// $data = mysqli_query($this->dbh,"UPDATE tbl_leaverequest SET  status2 = '$status' , status2_approver = '$account_admin' WHERE leave_id = '$id'");		        	
				$data = mysqli_query($this->dbh,"UPDATE tbl_overtime SET status2= '$status' , status2_approver = '$account_admin', status= '$status' WHERE OTID = '$id'");	
	        } else if( $approver1 != '' && $status1 == '' ){
				//$data = mysqli_query($this->dbh,"UPDATE tbl_leaverequest SET  status1 = '$status' , status1_approver = '$account_admin' WHERE leave_id = '$id'");	
				$data = mysqli_query($this->dbh,"UPDATE tbl_overtime SET status1= '$status' , status1_approver = '$account_admin' WHERE OTID = '$id'");		        	
	        } else {
				//$data = mysqli_query($this->dbh,"UPDATE tbl_leaverequest SET  status2 = '$status' , status2_approver = '$account_admin' WHERE leave_id = '$id'");	
				$data = mysqli_query($this->dbh,"UPDATE tbl_overtime SET status2= '$status' , status2_approver = '$account_admin', status= '$status' WHERE OTID = '$id'");	
	        }
			return $data;					
		}

		public function saveChangeShift($date_filed, $change_shift, $unique_id, $employee_id, $change_shiftfrom, $change_shiftto, $rep_employee_id, $rep_shiftfrom, $rep_shiftto, $notification,$date_filed1,$dateFiled){

			$sql = mysqli_query($this->dbh,"SELECT Firstname, Lastname FROM tbl_employee WHERE emp_id='$employee_id' ");
			$user_data = mysqli_fetch_array($sql);
			$name = $user_data['Firstname'] . " " . $user_data['Lastname']; 

			$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has created Official Business Request for [". $name ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");
			$result = mysqli_query($this->dbh,"INSERT INTO tbl_changeshift (filed_date,changeshift_id, category, emp_id,emp_name, shift_start, shift_end,replacement_personel ,  rep_shiftstart,rep_shiftend,reason, status,date_filed1,dateFiled) VALUES ('$date_filed', '$unique_id','$change_shift','$employee_id','$name','$change_shiftfrom','$change_shiftto','$rep_employee_id','$rep_shiftfrom','$rep_shiftto',' $notification','Pending','$date_filed1','$dateFiled')");
			return $result;	
		}

		public function selectCSRequest($emp_id){
			$result = mysqli_query($this->dbh,"SELECT * FROM tbl_changeshift WHERE emp_id = '$emp_id' ORDER BY id DESC");		
			return $result;	
		}

		public function selectCSRequestList($department){
			$result = mysqli_query($this->dbh,"SELECT 
				tbl_changeshift.changeshift_id,
				tbl_changeshift.category,
				tbl_changeshift.emp_name,
				tbl_changeshift.date_filed,
				tbl_changeshift.reason,
				tbl_changeshift.status,
				tbl_changeshift.status1
				FROM hirs_db.tbl_changeshift 
					INNER JOIN hirs_db.tbl_employee 
			ON tbl_changeshift.emp_id = tbl_employee.emp_id
			WHERE department = '$department'  AND tbl_changeshift.status = 'Pending' AND tbl_changeshift.status1 is null");		
			return $result;	
		}

		public function selectCSRequestListhead($emp_id){
			// $result1 = mysqli_query($this->dbh,"SELECT firstapprover FROM hirs_db.tbl_employee WHERE firstapprover = '$emp_id' ");		
			// $user_data = mysqli_fetch_array($result1);
			// $sqlresult1 = $user_data['firstapprover']; 

			// $result2 = mysqli_query($this->dbh,"SELECT firstapprover, secondapprover FROM hirs_db.tbl_employee WHERE secondapprover = '$emp_id' ");		
			// $user_data1 = mysqli_fetch_array($result2);
			// $sqlresult2 = $user_data1['secondapprover']; 
			// $sqlresult3 = $user_data1['firstapprover']; 
			$result = mysqli_query($this->dbh,"
				SELECT 
					tbl_changeshift.changeshift_id,
					tbl_changeshift.category,
					tbl_changeshift.emp_name,
					tbl_changeshift.filed_date,
					tbl_changeshift.date_filed1,
					tbl_changeshift.reason,
					tbl_changeshift.dateFiled,
					tbl_changeshift.status,
					tbl_changeshift.status1
				FROM hirs_db.tbl_changeshift 
				INNER JOIN hirs_db.tbl_employee 
				ON tbl_changeshift.emp_id = tbl_employee.emp_id
				WHERE firstapprover = '$emp_id'  AND status1 is null
				OR secondapprover = '$emp_id' AND status1 = 'Approved' AND status2 is  null
				OR secondapprover = '$emp_id' AND firstapprover = ''  AND status2 is  null
						ORDER BY id DESC");
			
	
			return $result;	
		}

		public function selectCSRequestListWarehouse(){
			$result = mysqli_query($this->dbh,"SELECT 

				tbl_changeshift.changeshift_id,
				tbl_changeshift.category,
				tbl_changeshift.emp_name,
				tbl_changeshift.date_filed,
				tbl_changeshift.reason,
				tbl_changeshift.status,
				tbl_changeshift.status1
				FROM hirs_db.tbl_changeshift 
					INNER JOIN hirs_db.tbl_employee 
			ON tbl_changeshift.emp_id = tbl_employee.emp_id
			WHERE department = '$department' OR department = 'Warehouse' AND tbl_changeshift.status = 'Pending' AND tbl_changeshift.status1 is null");		
			return $result;	
		}

		public function selectCSRequestinfo($id){
			$result = mysqli_query($this->dbh,"SELECT * FROM tbl_changeshift WHERE changeshift_id = '$id'");		
			return $result;	
		}

		public function rejectFinalApproverCS($id,$status){
			$account_admin = $_SESSION['name'] . " " . date("Y-m-d H:i:s");
			$description = " user [". $account_admin."] has  " . $status . " Overtime ID [". $id ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");


			$result = mysqli_query($this->dbh,"SELECT 
				tbl_changeshift.emp_id as emp_id,
				tbl_employee.firstapprover as firstapprover,
				tbl_employee.secondapprover as secondapprover,
				tbl_changeshift.status1 as status1
				FROM hirs_db.tbl_changeshift 
				INNER JOIN hirs_db.tbl_employee
				ON tbl_employee.emp_id = tbl_changeshift.emp_id 
                WHERE changeshift_id =  '$id' ");
			
			$user_data = mysqli_fetch_array($result);
	        $approver1 =  $user_data['firstapprover'];
	        $approver2 =  $user_data['secondapprover'];
	        $status1 =  $user_data['status1'];

	        if( $approver1 == '' && $approver2 != '' ){
	        	$data = mysqli_query($this->dbh,"UPDATE tbl_changeshift SET  status = '$status', status2= '$status' , status2_approver = '$account_admin' WHERE changeshift_id = '$id'");
	        } else if( $approver1 != '' && $status1 == '' ){
	        	if($status == 'Rejected'){
					$data = mysqli_query($this->dbh,"UPDATE tbl_changeshift SET  status = '$status',status1= '$status' , status1_approver = '$account_admin' WHERE changeshift_id = '$id'");
				} else {
					$data = mysqli_query($this->dbh,"UPDATE tbl_changeshift SET status1= '$status' , status1_approver = '$account_admin' WHERE changeshift_id = '$id'");	
				}  		        	
	        } else {
	        	$data = mysqli_query($this->dbh,"UPDATE tbl_changeshift SET  status = '$status',status2= '$status' , status2_approver = '$account_admin' WHERE changeshift_id = '$id'");	
			}

			return $data;					
		}

		public function checkstatusCS($id){
			$sql = mysqli_query($this->dbh,"SELECT status1 FROM tbl_changeshift WHERE changeshift_id='$id' ");
			$user_data = mysqli_fetch_array($sql);
			return $user_data['status1'];			
		}

		public function requestLeave($leaveID,$employee_id,$leave,$start_date,$days,$end_date,$description_reason,$dateFiled,$time_Filed){

			$sql = mysqli_query($this->dbh,"SELECT Firstname, Lastname FROM tbl_employee WHERE emp_id='$employee_id' ");
			$user_data = mysqli_fetch_array($sql);
			$name = $user_data['Firstname'] . " " . $user_data['Lastname']; 

			$account_admin = $_SESSION['name'];
			$description = " user [". $name ."] has created a Leave Request ID  [". $leaveID ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");

			$result = mysqli_query($this->dbh,"INSERT INTO tbl_leaverequest (leave_id,emp_id,emp_name,leaveRequest,startDate,days,endDate,reason,status,reset,dateFiled,time_Filed) VALUES ('$leaveID','$employee_id','$name','$leave','$start_date','$days','$end_date','$description_reason','0','1','$dateFiled','$time_Filed')");

			return $result;				
		}

		public function selectLEAVERequest($emp_id){
			$result = mysqli_query($this->dbh,"SELECT * FROM tbl_leaverequest WHERE emp_id = '$emp_id' ORDER BY id DESC");		
			return $result;				
		}

		public function selectLEAVERequestlist($department, $position){
			$result = mysqli_query($this->dbh,"
			SELECT 
				tbl_leaverequest.leave_id,
				tbl_leaverequest.leaveRequest,
				tbl_leaverequest.emp_name,
				tbl_leaverequest.startDate,
				tbl_leaverequest.endDate,
				tbl_leaverequest.days,
				tbl_leaverequest.reason,
				tbl_leaverequest.status1_approver,
				tbl_leaverequest.status2_approver,
				tbl_leaverequest.status
			FROM hirs_db.tbl_leaverequest 
			INNER JOIN hirs_db.tbl_employee 
			ON tbl_leaverequest.emp_id = tbl_employee.emp_id
			WHERE tbl_employee.department = '$department' AND position != '$position'  AND tbl_leaverequest.status1 is null or tbl_leaverequest.status1=''  ");		
			return $result;				
		}

		public function selectLEAVERequestlistHead($emp_id){
				$result = mysqli_query($this->dbh,"
					SELECT 
					tbl_leaverequest.leave_id,
					tbl_leaverequest.leaveRequest,
					tbl_leaverequest.emp_name,
					tbl_leaverequest.startDate,
					tbl_leaverequest.endDate,
					tbl_leaverequest.days,
					tbl_leaverequest.reason,
					tbl_leaverequest.time_Filed,
					tbl_leaverequest.status,
                    tbl_leaverequest.status1,
                    tbl_leaverequest.status2,
					tbl_leaverequest.dateFiled,
                    tbl_employee.secondapprover,
                    tbl_employee.firstapprover
				FROM hirs_db.tbl_leaverequest 
				INNER JOIN hirs_db.tbl_employee 
				ON tbl_leaverequest.emp_id = tbl_employee.emp_id
				WHERE firstapprover = '$emp_id'  AND status1 is null
				OR secondapprover = '$emp_id' AND status1 = 'Approved' AND status2 is null
				OR secondapprover = '$emp_id' AND firstapprover = ''   AND status2 is null
				ORDER BY id DESC");	
			return $result;	 
		}

		// public function selectLEAVERequestlistChecked($emp_id){
		// 		$result = mysqli_query($this->dbh,"
		// 			SELECT 
		// 			tbl_leaverequest.leave_id,
		// 			tbl_leaverequest.leaveRequest,
		// 			tbl_leaverequest.emp_name,
		// 			tbl_leaverequest.startDate,
		// 			tbl_leaverequest.endDate,
		// 			tbl_leaverequest.days,
		// 			tbl_leaverequest.reason,
		// 			tbl_leaverequest.status,
        //             tbl_leaverequest.status1,
        //             tbl_leaverequest.status2,
        //             tbl_employee.secondapprover,
        //             tbl_employee.firstapprover
		// 		FROM hirs_db.tbl_leaverequest 
		// 		INNER JOIN hirs_db.tbl_employee 
		// 		ON tbl_leaverequest.emp_id = tbl_employee.emp_id
		// 		WHERE firstapprover = '$emp_id'  AND status1 != "" OR
		// 		OR secondapprover = '$emp_id' AND status1 = 'Approved' 
		// 		OR secondapprover = '$emp_id' AND firstapprover = ''   AND status2 is null
		// 				ORDER BY id DESC");	
		// 	return $result;	 
		// }
		public function selectLEAVERequestlistWarehouse($department, $position){
			$result = mysqli_query($this->dbh,"
			SELECT 
				tbl_leaverequest.leave_id,
				tbl_leaverequest.leaveRequest,
				tbl_leaverequest.emp_name,
				tbl_leaverequest.startDate,
				tbl_leaverequest.endDate,
				tbl_leaverequest.days,
				tbl_leaverequest.reason,

				tbl_leaverequest.status
			 FROM hirs_db.tbl_leaverequest 
			INNER JOIN hirs_db.tbl_employee 
			ON tbl_leaverequest.emp_id = tbl_employee.emp_id
			WHERE tbl_employee.department = '$department' AND position != '$position' OR tbl_employee.department = 'Warehouse' AND tbl_leaverequest.status1 is null or tbl_leaverequest.status1='' 
			");		
			return $result;	 
		}

		public function rejectFinalApproverLeave($id, $status){
			$account_admin = $_SESSION['name'] . " " . date("Y-m-d H:i:s");
			$description = " user [". $account_admin."] has  " . $status . " Overtime ID [". $id ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");

	        $result = mysqli_query($this->dbh,"SELECT 
				tbl_leaverequest.emp_id as emp_id,
				tbl_employee.firstapprover as firstapprover,
				tbl_employee.secondapprover as secondapprover,
				tbl_leaverequest.status1 as status1
				FROM hirs_db.tbl_leaverequest 
				INNER JOIN hirs_db.tbl_employee
				ON tbl_employee.emp_id = tbl_leaverequest.emp_id WHERE leave_id = '$id' ");
					        $user_data = mysqli_fetch_array($result);
	        $approver1 =  $user_data['firstapprover'];
	        $approver2 =  $user_data['secondapprover'];
	        $status1 =  $user_data['status1'];

	        if( $approver1 == '' && $approver2 != '' ){
				$data = mysqli_query($this->dbh,"UPDATE tbl_leaverequest SET  status2 = '$status' , status2_approver = '$account_admin' WHERE leave_id = '$id'");		        	
	        } else if( $approver1 != '' && $status1 == '' ){
				$data = mysqli_query($this->dbh,"UPDATE tbl_leaverequest SET  status1 = '$status' , status1_approver = '$account_admin' WHERE leave_id = '$id'");		        	
	        } else {
				$data = mysqli_query($this->dbh,"UPDATE tbl_leaverequest SET  status2 = '$status' , status2_approver = '$account_admin' WHERE leave_id = '$id'");	
	        }

			return $data;					
		}

		public function  checkLeaveIfApprovable($id){
			$result = mysqli_query($this->dbh,"SELECT emp_id, leaveRequest,days FROM tbl_leaverequest WHERE leave_id = '$id'");		
	 		$user_data = mysqli_fetch_array($result);
			$emp_id = $user_data['emp_id']; 
			$leaveRequest = $user_data['leaveRequest']; 
			
			$days = $user_data['days']; 
			
			$data = mysqli_query($this->dbh,"SELECT sum(days) as days FROM hirs_db.tbl_leaverequest WHERE emp_id = '$emp_id' AND leaveRequest = '$leaveRequest' AND status = 'Approved'");		
	 		$data = mysqli_fetch_array($data);
			$days_approved = $data['days']; 


			return $days+$days_approved;
		}

		public function checkPendingLeave($id , $emp_id){
			$result = mysqli_query($this->dbh,"SELECT sum(days) as days FROM tbl_leaverequest WHERE leaveRequest='$id' AND emp_id = '$emp_id' AND status = 'Pending' AND reset = '1' ");
			$user_data = mysqli_fetch_array($result);

			if($user_data['days'] != "") {
				return $user_data['days']; 
			} else {
				return 0; 
			}
		}

		public function checkRemainingLeave($id, $emp_id, $earned){
			$count = mysqli_query($this->dbh,"SELECT sum(days) as days FROM tbl_leaverequest WHERE leaveRequest='$id' AND emp_id = '$emp_id' AND status = 'Approved' AND reset = '1' ");
			$user_count = mysqli_fetch_array($count);
			return $earned-$user_count['days'];
		}

		public function checkifearnable($id){
			$result = mysqli_query($this->dbh,"SELECT earned,leave_count FROM tbl_leavetype WHERE id = '$id' ");
			$user_data = mysqli_fetch_array($result);
			if($user_data['earned'] == 'yes') {
				$sum = 11 - date('m') + 2;
				return $user_data['leave_count'] - $sum  ;
			} else {
				return $user_data['leave_count'];
			}
		}

		public function checkifLeaveisRight($leave, $employee_id){
			$result = mysqli_query($this->dbh,"SELECT earned,leave_count FROM tbl_leavetype WHERE leave_description = '$leave' ");
			$user_data = mysqli_fetch_array($result);

			$result_data = mysqli_query($this->dbh,"SELECT sum(days) as days FROM tbl_leaverequest WHERE leaveRequest='$leave' AND emp_id = '$employee_id' AND status = 'Approved' AND reset = '1' ");
			$data = mysqli_fetch_array($result_data);
			$precomputed = $data['days'];

			if($user_data['earned'] == 'yes') {
				$sum = 11 - date('m');
				$computed = $user_data['leave_count'] - $sum  ;
			} else {
				$computed =  $user_data['leave_count'];
			}
			return $computed-$precomputed;
		}

		public function checkifUsed($id , $emp_id){
			$result = mysqli_query($this->dbh,"SELECT sum(days) as days FROM tbl_leaverequest WHERE leaveRequest='$id' AND emp_id = '$emp_id' AND status = 'Approved' AND reset = '1' ");
			$user_data = mysqli_fetch_array($result);

			if($user_data['days'] != "") {
				return $user_data['days']; 
			} else {
				return 0; 
			}	
		}

		public function checkifLeaveisZero($leave){
			$result = mysqli_query($this->dbh,"SELECT leave_count FROM tbl_leavetype WHERE leave_description='$leave'");
			$user_data = mysqli_fetch_array($result);
				return $user_data['leave_count']; 			
		}

		public function checkPosition($position){
			$result = mysqli_query($this->dbh,"SELECT approver FROM tbl_position WHERE position_desc='$position'");
			$user_data = mysqli_fetch_array($result);
			return $user_data['approver']; 		
		}


		// public function checkPositionAdmin($position){
		// 	$result = mysqli_query($this->dbh,"SELECT approver FROM tbl_position WHERE position_desc='$position'");
		// 	$user_data = mysqli_fetch_array($result);
		// 	return $user_data['approver']; 		
		// }


		public function selectallLeaveRequest($emp_id){
			$result = mysqli_query($this->dbh,"SELECT count(id) as num FROM tbl_leaverequest WHERE emp_id='$emp_id' AND status = '0'");
			$user_data = mysqli_fetch_array($result);
			return $user_data['num']; 	
		}

		public function selectallLeaveRequestdepartment($emp_id){
			$result = mysqli_query($this->dbh,"
					SELECT 
					count(tbl_leaverequest.leave_id) as num
				FROM hirs_db.tbl_leaverequest 
				INNER JOIN hirs_db.tbl_employee 
				ON tbl_leaverequest.emp_id = tbl_employee.emp_id
				WHERE firstapprover = '$emp_id'  AND status1 is null AND tbl_leaverequest.status = '0' 
				OR secondapprover = '$emp_id' AND status1 = 'Approved' AND status2 is null AND tbl_leaverequest.status = '0'
				OR secondapprover = '$emp_id' AND firstapprover = ''   AND status2 is null AND tbl_leaverequest.status = '0'
				ORDER BY id DESC");

			$user_data = mysqli_fetch_array($result);
			return $user_data['num']; 	
		}

		public function selectallchangeshift($emp_id){
			$result = mysqli_query($this->dbh,"SELECT count(id) as num FROM tbl_changeshift  WHERE emp_id='$emp_id' AND status = 'Pending'");
			$user_data = mysqli_fetch_array($result);
			return $user_data['num']; 
		}


		public function selectallchangedepartment($emp_id){
			$result = mysqli_query($this->dbh,"SELECT 
					count(tbl_changeshift.changeshift_id) as num
				FROM hirs_db.tbl_changeshift 
						INNER JOIN hirs_db.tbl_employee 
				ON tbl_changeshift.emp_id = tbl_employee.emp_id
				WHERE firstapprover = '$emp_id'  AND status1 is null  AND status2 is null AND tbl_changeshift.status = 'Pending'
				OR secondapprover = '$emp_id' AND  status1 = 'Approved'  AND status2 is null AND tbl_changeshift.status = 'Pending'
				OR secondapprover = '$emp_id' AND firstapprover = ''  AND status2 is  null  AND tbl_changeshift.status = 'Pending'
");	
	
			$user_data = mysqli_fetch_array($result);
			return $user_data['num'];
		}
	
		public function selectallovertime($emp_id){
			$result = mysqli_query($this->dbh,"SELECT count(id) as num FROM tbl_overtime  WHERE emp_id='$emp_id' AND status = 'Pending'");
			$user_data = mysqli_fetch_array($result);
			return $user_data['num']; 
		}

		public function selectallovertimedepartment($emp_id){
					$result = mysqli_query($this->dbh,"SELECT
					count(tbl_overtime.OTID) as num

				FROM hirs_db.tbl_overtime 
				INNER JOIN hirs_db.tbl_employee 
				ON tbl_overtime.emp_id = tbl_employee.emp_id
				WHERE firstapprover = '$emp_id'  AND status1 is null AND status2 is null AND tbl_overtime.status = 'Pending'
				OR secondapprover = '$emp_id' AND status1 = 'Approved'  AND status2 is null AND tbl_overtime.status = 'Pending'
				OR secondapprover = '$emp_id' AND firstapprover = ''   AND status2 is null AND tbl_overtime.status = 'Pending'
						ORDER BY id DESC

			");	
			
			$user_data = mysqli_fetch_array($result);
			return $user_data['num']; 	
		}

		public function selectallOfficial($emp_id){
			$result = mysqli_query($this->dbh,"SELECT count(id) as num FROM tbl_officialbusiness  WHERE emp_id='$emp_id' AND status = 'Pending'");
			$user_data = mysqli_fetch_array($result);
			return $user_data['num']; 
		}

		public function selectallOfficialdepartmentAdmin(){

			$result = mysqli_query($this->dbh,"
							SELECT
					count(tbl_officialbusiness.OBid) as num
			FROM hirs_db.tbl_officialbusiness 
			INNER JOIN hirs_db.tbl_employee 
			ON tbl_officialbusiness.emp_id = tbl_employee.emp_id
			WHERE   tbl_officialbusiness.status = 'Pending' OR tbl_officialbusiness.status1 is null AND tbl_officialbusiness.status1 != 'Rejected' or tbl_officialbusiness.status2 AND tbl_officialbusiness.status2 != 'Rejected' is null  ORDER BY id DESC");

			$user_data = mysqli_fetch_array($result);
			return $user_data['num'];
		}

		public function selectallOfficialdepartment($emp_id){
			$result = mysqli_query($this->dbh,"
							SELECT
					count(tbl_officialbusiness.OBid) as num
			FROM hirs_db.tbl_officialbusiness 
			INNER JOIN hirs_db.tbl_employee 
			ON tbl_officialbusiness.emp_id = tbl_employee.emp_id
			WHERE tbl_employee.firstapprover = '$emp_id' AND  status1 is null AND status2 is null AND tbl_officialbusiness.status = 'Pending'
			OR tbl_employee.secondapprover = '$emp_id' AND status1 = 'Approved'  AND status2 is null AND tbl_officialbusiness.status = 'Pending'
			OR tbl_employee.secondapprover = '$emp_id' AND tbl_employee.firstapprover = ''   AND status2 is null AND tbl_officialbusiness.status = 'Pending'
			ORDER BY id DESC");
			
			$user_data = mysqli_fetch_array($result);
			return $user_data['num'];		
		}


		public function selectallNotification($emp_id){
			$result = mysqli_query($this->dbh,"SELECT
					count(id) as num
			FROM hirs_db.tbl_notifpass 

			WHERE firstapprover = '$emp_id' AND  status1 is null AND status2 is null AND tbl_notifpass.status = 'Pending'
			OR secondapprover = '$emp_id' AND status1 = 'Approved'  AND status2 is null AND tbl_notifpass.status = 'Pending'
			OR secondapprover = '$emp_id' AND firstapprover = ''   AND status2 is null AND tbl_notifpass.status = 'Pending'
			ORDER BY id DESC");
			
			$user_data = mysqli_fetch_array($result);
			return $user_data['num'];		
		}
		public function selectRequest($emp_id){
			$result = mysqli_query($this->dbh,"SELECT * FROM tbl_specialrequest WHERE employeeName = '$emp_id' ORDER BY id DESC");		
			return $result;	
		}

		public function CreateUserInquiries($date_filed,$notification,$status){
			$result = mysqli_query($this->dbh,"INSERT INTO tbl_specialrequest (employeeName, description, status) VALUES ('$date_filed','$notification','$status')");		
			return $result;	
		}
	
		public function selectAllAnnouncement(){
						$result = mysqli_query($this->dbh,"SELECT * FROM tbl_announcement ");		
			return $result;	
		}

		public function selectAllBirthdays(){
			$result = mysqli_query($this->dbh,"SELECT emp_id, Lastname, Firstname, Middlename FROM hirs_db.tbl_employee WHERE 
					  DATE_FORMAT(birthday,'%m-%d') = DATE_FORMAT(NOW(),'%m-%d') AND status = 'Active' ");		
			return $result;	
		}

		public function selectAllBirthday($dateToday){

			if($dateToday != '1996-11-23'){
				$result = "";
			} else {
				$result = mysqli_query($this->dbh,"SELECT Firstname, Lastname FROM tbl_employee WHERE birthday = '$dateToday' ");				
			}
			return $result;
		}

		public function selectAllAsset($emp_id){
			$result = mysqli_query($this->dbh,"SELECT * FROM tbl_assets WHERE emp_id = '$emp_id' ORDER BY status DESC");
	        return $result;				
		}

		public function UpdateAssets($id,$status){
			$result = mysqli_query($this->dbh,"UPDATE tbl_assets SET status = '$status' WHERE id = '$id'");
	        return $result;				
		}

		public function selectAllMaterials($emp_id){
			$result = mysqli_query($this->dbh,"SELECT * FROM tbl_materials WHERE emp_id = '$emp_id' ORDER BY status DESC");
	        return $result;				
		}

		public function UpdateMaterials($id,$status){
			$result = mysqli_query($this->dbh,"UPDATE tbl_materials SET status = '$status' WHERE id = '$id'");
	        return $result;				
		}

		public function getProfilePic($id){
			$result = mysqli_query($this->dbh,"SELECT image FROM tbl_employee WHERE emp_id = '$id' ");		
			$user_data = mysqli_fetch_array($result);
			$imageName = $user_data['image']; 

			if( $user_data['image'] == '') {
				return "";
			}else {
				return $destination = '../../admin/pages/img/' . $user_data['image'];			
			}
		}

		public function bday($birthday){
			$date_today = date("Y-m-d");
			$computed = $date_today - $birthday;
			echo  $computed ;
		}

		public function checkWorkEmail($emp_id, $type, $leaveID){

			$result1 = mysqli_query($this->dbh,"SELECT  (SELECT email FROM hirs_db.tbl_workemail WHERE emp_id = firstapprover) as firstapprover, (SELECT email FROM hirs_db.tbl_workemail WHERE emp_id = secondapprover ) as secondapprover FROM hirs_db.tbl_employee WHERE emp_id = '$emp_id' ");		
			$user_data1 = mysqli_fetch_array($result1);
			$email1 = $user_data1['firstapprover']; 
			$email2 = $user_data1['secondapprover']; 
		
			if($email1 == '') {
				$email = $email2;
				// $email = "chesterallancustodio@gmail.com";
			} else {
			 	$email = $email1;

			 	// $email = "chesterallancustodio@gmail.com";
			}
			
			
			require './PHPMailer/src/Exception.php';
		    require './PHPMailer/src/PHPMailer.php';
		    require './PHPMailer/src/SMTP.php';

		   try {
		        $mail = new PHPMailer(true);
		        $mail->isSMTP();
		        $mail->Host = 'smtp.gmail.com';
		        //$mail->Host = 'smtp.office365.com';
		        $mail->SMTPAuth = true;
		        
				$mail->Username = 'chester.atiph@gmail.com';
		        $mail->Password = 'sjiwzhmwlgkargnh';
				
				$mail->Port = 587;
		        $mail->SMTPSecure = "tls";
		       	$mail->setFrom('chester.atiph@gmail.com', 'Texwipe HRIS Approval');
		        $mail->addAddress($email);
		        		       // $mail->addAddress('ITSupport_Asia@texwipe.com');

		        $mail->isHTML(true);                                  // Set email format to HTML
		        $mail->Subject = "APPROVAL OF HRIS REQUEST ";
		        $mail->Body = " <!DOCTYPE html>
                        <html>
                            <head>
                                <style>
                                    div {
                                      background-color: white;
                                      width: 700px;
                                      margin-left: auto;
                                      margin-right: auto;
                                      text-align: center;
                                    }

                                    h2, p {
                                        text-align: center;
                                    }
                                 
                                </style>
                            </head>
                            <body>
                                <div>
                                    <img src='https://tukuz.com/wp-content/uploads/2021/02/texwipe-logo-vector.png' width='650' height=350'>
                                    <h1>" . $type . " Number " . $leaveID . " is waiting for approval</h1>
                                    <h2> " .  date("D M j Y g:i:s T") . " </h2>
                                   
                                </div>
                            </body>
                        </html>";
		            
		                	
                        $mail->send();
          
		 	} catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}


		public function checkWorkEmail1($emp_id, $type, $leaveID){

			$result1 = mysqli_query($this->dbh,"SELECT email FROM hirs_db.tbl_workemail WHERE emp_id = '$emp_id' ");		
			$user_data1 = mysqli_fetch_array($result1);
			$email = $user_data1['email']; 
			// echo $email;
			
			
			require './PHPMailer/src/Exception.php';
		    require './PHPMailer/src/PHPMailer.php';
		    require './PHPMailer/src/SMTP.php';

		   try {
		        $mail = new PHPMailer(true);
		        $mail->isSMTP();
		        $mail->Host = 'smtp.gmail.com';
		        //$mail->Host = 'smtp.office365.com';
		        $mail->SMTPAuth = true;
		        
				$mail->Username = 'chester.atiph@gmail.com';
		        $mail->Password = 'sjiwzhmwlgkargnh';
				
				$mail->Port = 587;
		        $mail->SMTPSecure = "tls";
		       	$mail->setFrom('chester.atiph@gmail.com', 'Texwipe HRIS Approval');
		        $mail->addAddress($email);
		        		       // $mail->addAddress('ITSupport_Asia@texwipe.com');

		        $mail->isHTML(true);                                  // Set email format to HTML
		        $mail->Subject = "APPROVAL OF HRIS REQUEST ";
		        $mail->Body = " <!DOCTYPE html>
                        <html>
                            <head>
                                <style>
                                    div {
                                      background-color: white;
                                      width: 700px;
                                      margin-left: auto;
                                      margin-right: auto;
                                      text-align: center;
                                    }

                                    h2, p {
                                        text-align: center;
                                    }
                                 
                                </style>
                            </head>
                            <body>
                                <div>
                                    <img src='https://tukuz.com/wp-content/uploads/2021/02/texwipe-logo-vector.png' width='650' height=350'>
                                    <h1>" . $type . " Number " . $leaveID . " is waiting for approval</h1>
                                    <h2> " .  date("D M j Y g:i:s T") . " </h2>
                                   
                                </div>
                            </body>
                        </html>";
		            
		                	
                        $mail->send();
          
		 	} catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}


		public function getEmpID($id){
				$result1 = mysqli_query($this->dbh,"SELECT emp_id FROM hirs_db.tbl_leaverequest WHERE leave_id = '$id' ");		
				$user_data1 = mysqli_fetch_array($result1);
				$email = $user_data1['emp_id']; 
				return $email;
		}

		public function CheckIfApproved($id){
			$result = mysqli_query($this->dbh,"SELECT 
							tbl_leaverequest.leave_id,
						    tbl_workemail.email
						FROM hirs_db.tbl_leaverequest
						INNER JOIN hirs_db.tbl_employee
						ON tbl_leaverequest.emp_id = tbl_employee.emp_id
						INNER JOIN hirs_db.tbl_workemail
						ON tbl_employee.secondapprover = tbl_workemail.emp_id
						WHERE tbl_leaverequest.leave_id = '$id'");
			$user_data = mysqli_fetch_array($result);
			$secondapprover = $user_data['email']; 
			return $secondapprover;
		}

		public function CheckIfApprovedCS($id){
			$result = mysqli_query($this->dbh,"SELECT 
						    tbl_workemail.email
						FROM hirs_db.tbl_changeshift
						INNER JOIN hirs_db.tbl_employee
						ON tbl_changeshift.emp_id = tbl_employee.emp_id
						INNER JOIN hirs_db.tbl_workemail
						ON tbl_employee.secondapprover = tbl_workemail.emp_id
						WHERE tbl_changeshift.changeshift_id = '$id'");
			$user_data = mysqli_fetch_array($result);
			$secondapprover = $user_data['email']; 
			return $secondapprover;
		}

		public function CheckIfApprovedOT($id){
			$result = mysqli_query($this->dbh,"SELECT 
								tbl_overtime.OTID,
						    tbl_workemail.email
						FROM hirs_db.tbl_overtime
						INNER JOIN hirs_db.tbl_employee
						ON tbl_overtime.emp_id = tbl_employee.emp_id
						INNER JOIN hirs_db.tbl_workemail
						ON tbl_employee.secondapprover = tbl_workemail.emp_id
						WHERE tbl_overtime.OTID = '$id'");
			$user_data = mysqli_fetch_array($result);
			$secondapprover = $user_data['email']; 
			return $secondapprover;			
		}

		public function CheckIfApprovedOB($id){
				$result = mysqli_query($this->dbh,"SELECT 
								tbl_officialbusiness.OBid,
						    tbl_workemail.email
						FROM hirs_db.tbl_officialbusiness
						INNER JOIN hirs_db.tbl_employee
						ON tbl_officialbusiness.emp_id = tbl_employee.emp_id
						INNER JOIN hirs_db.tbl_workemail
						ON tbl_employee.secondapprover = tbl_workemail.emp_id
						WHERE tbl_officialbusiness.OBid = '$id'");
			$user_data = mysqli_fetch_array($result);
			$secondapprover = $user_data['email']; 
			return $secondapprover;			
		}
		public function sendSecondApprover($email, $type, $id){
			require './PHPMailer/src/Exception.php';
		    require './PHPMailer/src/PHPMailer.php';
		    require './PHPMailer/src/SMTP.php';

		    if($email == '' ){
		    	echo '0';
		    } else {
			    
			  try {   
		        $mail = new PHPMailer(true);
		        $mail->isSMTP();
	
		         $mail->Host = 'smtp.gmail.com';
		        //$mail->Host = 'smtp.office365.com';
        		$mail->SMTPAuth = true;
       		 	$mail->Username = 'chester.atiph@gmail.com';
        		$mail->Password = 'sjiwzhmwlgkargnh';
		        
		        $mail->Port = 587;
		        $mail->SMTPSecure = "tls";
		        $mail->setFrom('chester.atiph@gmail.com', 'Texwipe HRIS Approval');
		      	//$mail->setFrom('HRIS_TexwipeAsia@outlook.com', 'Texwipe HRIS Approval');
		        $mail->addAddress($email); 
		     	$mail->addAddress('chester.atiph@gmail.com'); 
			      
			        $mail->isHTML(true);                                  // Set email format to HTML
			        $mail->Subject = "APPROVAL OF HRIS REQUEST ";
			        $mail->Body = " <!DOCTYPE html>
	                        <html>
	                            <head>
	                                <style>
	                                    div {
	                                      background-color: white;
	                                      width: 700px;
	                                      margin-left: auto;
	                                      margin-right: auto;
	                                      text-align: center;
	                                    }

	                                    h2, p {
	                                        text-align: center;
	                                    }
	                                 
	                                </style>
	                            </head>
	                            <body>
	                                <div>
	                                    <img src='https://tukuz.com/wp-content/uploads/2021/02/texwipe-logo-vector.png' width='650' height=350'>
	                                    <h1>" . $type . " Number " . $id . " is waiting for approval</h1>
	                                    <h2> " .  date("D M j Y g:i:s T") . " </h2>
	                                   
	                                </div>
	                            </body>
	                        </html>";
			        $mail->send();

			  } catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			  }
		    }
		}

		public function selectEmployeeForWorkEmail(){
			$data = mysqli_query($this->dbh,"SELECT 
				tbl_workemail.id,
				tbl_employee.emp_id,
			    tbl_employee.Lastname,
			    tbl_employee.Firstname,
				tbl_workemail.email
			 FROM hirs_db.tbl_employee
			 INNER JOIN hirs_db.tbl_workemail
			 ON tbl_employee.emp_id = tbl_workemail.emp_id");
			return $data;			
		}

		public function checkifOBApprove($id){
			$result = mysqli_query($this->dbh,"SELECT status2 FROM hirs_db.tbl_officialbusiness WHERE OBid = '$id'");
			$user_data = mysqli_fetch_array($result);
			$data = $user_data['status2']; 

			if($data == 'Approved'){
				$send = '1';
			} else if ($data == 'Rejected'){
				$send = '2';
			} else {
				$send = '0';
			}

			return $send;
		}

		public function checkifOTApprove($id){
			$result = mysqli_query($this->dbh,"SELECT status2 FROM hirs_db.tbl_overtime WHERE OTID = '$id'");
			$user_data = mysqli_fetch_array($result);
			$data = $user_data['status2']; 

			if($data == 'Approved'){
				$send = '1';
			} else if ($data == 'Rejected'){
				$send = '2';
			} else {
				$send = '0';
			}

			return $send;			
		}

		public function checkifCSApprove($id){
			$result = mysqli_query($this->dbh,"SELECT status2 FROM hirs_db.tbl_changeshift WHERE changeshift_id = '$id'");
			$user_data = mysqli_fetch_array($result);
			$data = $user_data['status2']; 

			if($data == 'Approved'){
				$send = '1';
			} else if ($data == 'Rejected'){
				$send = '2';
			} else {
				$send = '0';
			}

			return $send;		
		}

		public function checkifLRApprove($id){
			$result = mysqli_query($this->dbh,"SELECT status2 FROM hirs_db.tbl_leaverequest leave_id= '$id'");
			$user_data = mysqli_fetch_array($result);
			$data = $user_data['status2']; 
			if($data == 'Approved'){
				$send = '1';
			} else if ($data == 'Rejected'){
				$send = '2';
			} else {
				$send = '0';
			}
			return $send;					
		}
		
		public function HRselectLEAVERequest($year){
			$result = mysqli_query($this->dbh,"SELECT tbl_leaverequest.dateFiled,tbl_leaverequest.leave_id, tbl_leaverequest.leaveRequest, tbl_leaverequest.emp_name, tbl_leaverequest.startDate, tbl_leaverequest.endDate, tbl_leaverequest.days, tbl_leaverequest.reason, tbl_leaverequest.status, tbl_leaverequest.status1, tbl_leaverequest.status2
	 		FROM hirs_db.tbl_leaverequest 
            INNER JOIN hirs_db.tbl_employee 
            ON tbl_leaverequest.emp_id = tbl_employee.emp_id
            INNER JOIN hirs_db.tbl_position
            ON tbl_employee.position = tbl_position.position_desc
            WHERE startDate like '%$year%'
            ORDER BY status DESC");		
			return $result;				
		}

		public function addapplicant($date,$expectedsalary,$position,$firstName,$MiddleName,$lastName,$completecurrentaddress,$completeprobaddress,$phone,$birthday,$age,$placeofbirth,$civilstatus,$religion,$nationality,$language,$arrsfamilyInfo,$arrsemploymentHist,$arrsschoolDetails,$skills,$arrstraininglist,$arrgovernmentexamlist,$arrcharacterReference,$arrcontactperson,$sss ,$tin,$philhealth,$pagibig ,$contactPersonRel,$contactRelation,$contactContactnum,$contactaddress,$uniqueId,$pos_desc,$status){
			$result = mysqli_query($this->dbh,"INSERT INTO hirs_db.tbl_applicant (date,expectedsalary,position,firstName,MiddleName,lastName,completecurrentaddress,completeprobaddress,phone,birthday,age,placeofbirth,civilstatus,religion,nationality,language,familyInfo,employmentHist,schoolDetails,skills,traininglist,governmentexamlist,characterReference,contactperson,sss,tin,philhealth,pagibig,contactPersonRel,contactRelation,contactContactnum,contactaddress,uniqueId,position_desc,interviewee_status,interviewer_status,final_status) VALUES 	('$date','$expectedsalary','$position','$firstName','$MiddleName','$lastName','$completecurrentaddress','$completeprobaddress','$phone','$birthday','$age','$placeofbirth','$civilstatus','$religion','$nationality','$language','$arrsfamilyInfo','$arrsemploymentHist','$arrsschoolDetails','$skills','$arrstraininglist','$arrgovernmentexamlist','$arrcharacterReference','$arrcontactperson','$sss ','$tin','$philhealth','$pagibig ','$contactPersonRel','$contactRelation','$contactContactnum','$contactaddress','$uniqueId','$pos_desc','$status','$status','$status')");
			return $result;
		}

		public function addSuggestions($date, $suggestions,$val_id ){
			$result = mysqli_query($this->dbh,"INSERT INTO tbl_suggestions (date, description,emp_id) VALUES ('$date', '$suggestions','$val_id')");
			return $result;
		}

		public function examType($position){
			$result = mysqli_query($this->dbh,"SELECT * FROM hirs_db.tb_exam WHERE examType = '$position' AND status = '1' ORDER BY examCat ASC");
			return $result;
		}

		public function tekeExam($examid,$position,$examIdList,$radioBox,$exammAsnswerList,$essayAnswerList,$date){
			$result = mysqli_query($this->dbh,"INSERT INTO tbl_examtake (examid,position,examIdList,radioBox,exammAsnswerList,essayAnswerList,date) values ('$examid','$position','$examIdList','$radioBox','$exammAsnswerList','$essayAnswerList','$date')	");
			return $result;
		}

		public function countReExam($exam_id){
			$result = mysqli_query($this->dbh,"SELECT count(id) as count FROM tbl_examtake WHERE examid = '$exam_id'	");
			$user_data = mysqli_fetch_array($result);
			return $user_data['count']; 
		}

		public function GetexamId($exam_id){
			$result = mysqli_query($this->dbh,"SELECT * FROM hirs_db.tbl_examtake WHERE examid = '$exam_id' ORDER BY id DESC limit 1");
			return $result; 
		}

		public function examQuestion($exam_id){
			$id = str_replace(",","','",$exam_id);
 			$result = mysqli_query($this->dbh,"SELECT * FROM hirs_db.tb_exam WHERE id in ('$id') ORDER BY examCat DESC");
			return $result;
		}

		public function getemployeeDept($emp_id){
			$result = mysqli_query($this->dbh,"SELECT department FROM hirs_db.tbl_employee WHERE emp_id = '$emp_id'	");
			$user_data = mysqli_fetch_array($result);
			return $user_data['department']; 
		}

		public function getApplicant($emp_id){
			$result = mysqli_query($this->dbh,"SELECT id, firstName, MiddleName, lastName, position_desc FROM hirs_db.tbl_applicant WHERE  interviewee = '$emp_id' AND interviewee_status = 'Pending' OR interviewer = '$emp_id' AND interviewee_status = 'Done' AND  interviewer_status= 'Pending' OR final_interviewer = '$emp_id' AND interviewee_status = 'Done' AND  interviewer_status= 'Done' AND final_status = 'Pending' AND final_interviewer = '$emp_id' ");
			return $result; 
		}

		public function GetApplicationByID($applicant_id){
			$result = mysqli_query($this->dbh,"SELECT * FROM hirs_db.tbl_applicant WHERE id = '$applicant_id' ");
	        return $result;	

		}

		public function getifinterviewer($emp_id){
		    $result = mysqli_query($this->dbh,"SELECT count(id) as num FROM hirs_db.tbl_workemail WHERE emp_id =  '$emp_id'	");
			$user_data = mysqli_fetch_array($result);
			return $user_data['num'];
		}

		public function firstinterview($app_id,$notes,$status){
			if($status == 'Cancelled'){
				$result = mysqli_query($this->dbh,"UPDATE tbl_applicant SET interviewerNote1 = '$notes', interviewee_status = '$status', interviewer_status= '$status', final_status = '$status' WHERE id = '$app_id'");
			} else {
				$result = mysqli_query($this->dbh,"UPDATE tbl_applicant SET interviewerNote1 = '$notes', interviewee_status = '$status' WHERE id = '$app_id'");
			}
			return $result;
		}

		public function getapplicantInfo($app_id){
			$result = mysqli_query($this->dbh,"SELECT interviewer, firstName, MiddleName, lastName FROM hirs_db.tbl_applicant WHERE id = '$app_id'");
			$user_data = mysqli_fetch_array($result);
			$interviewer = $user_data['interviewer'];
			$fullname = $user_data['firstName'] . " " . $user_data['MiddleName'] . " " .  $user_data['lastName'];
			$result2 = mysqli_query($this->dbh,"SELECT email FROM hirs_db.tbl_workemail WHERE emp_id = '$interviewer'");
			$email = mysqli_fetch_array($result2);
			$email1 = $email['email'];
			return $fullname . "||" . $email1;			
		}

		public function getapplicantInfoFinal($app_id){
			$result = mysqli_query($this->dbh,"SELECT final_interviewer, firstName, MiddleName, lastName FROM hirs_db.tbl_applicant WHERE id = '$app_id'");
			$user_data = mysqli_fetch_array($result);
			$interviewer = $user_data['final_interviewer'];
			$fullname = $user_data['firstName'] . " " . $user_data['MiddleName'] . " " .  $user_data['lastName'];
			$result2 = mysqli_query($this->dbh,"SELECT email FROM hirs_db.tbl_workemail WHERE emp_id = '$interviewer'");
			$email = mysqli_fetch_array($result2);
			$email1 = $email['email'];
			return $fullname . "||" . $email1;			
		}

		public function finaltinterview($app_id,$notes,$status){
			if($status == 'Cancelled'){
				$result = mysqli_query($this->dbh,"UPDATE tbl_applicant SET interviewerNote2 = '$notes', interviewer_status = '$status', final_status = '$status' WHERE id = '$app_id'");
			} else {
				$result = mysqli_query($this->dbh,"UPDATE tbl_applicant SET interviewerNote2 = '$notes', interviewer_status = '$status' WHERE id = '$app_id'");
			}
			return $result;
		}

		public function GetFinalAssessmentByID($applicant_id, $emp_id){
			$result = mysqli_query($this->dbh,"SELECT count(id) as total_count FROM tbl_applicant WHERE id = '$applicant_id' AND final_interviewer = '$emp_id' AND interviewee_status = 'Done' AND interviewer_status= 'Done' ");
			$user_data = mysqli_fetch_array($result);
			return $user_data['total_count'];
		}

		public function medical($app_id,$notes,$status){
			$result = mysqli_query($this->dbh,"UPDATE tbl_applicant SET final_note = '$notes', final_status = '$status' WHERE id = '$app_id'");
			return $result;
		}
	


	public function sendToHr(){
			require './PHPMailer/src/Exception.php';
		    require './PHPMailer/src/PHPMailer.php';
		    require './PHPMailer/src/SMTP.php';

		try{
	        $mail = new PHPMailer(true);
	        $mail->isSMTP();
	        // $mail->Host = 'smtp.office365.com';
	        $mail->Host = 'smtp.gmail.com';
	        $mail->SMTPAuth = true;	

	        $mail->Username = 'chester.atiph@gmail.com';
	        $mail->Password = 'sjiwzhmwlgkargnh';	
	

	        // $mail->Username = 'PurchaseRequest_Asia@outlook.com';
	        // $mail->Password = 'AdvMolding123!';
	        
	        $mail->Port = 587;
	        $mail->SMTPSecure = "tls";
	        // $mail->setFrom('PurchaseRequest_Asia@outlook.com', 'Texwipe PR Request');
	        $mail->setFrom('chester.atiph@gmail.com', 'Texwipe Interviewer Session');	
	
// $mail->addAddress('ccustodio@texwipe.com'); 	
	        $mail->addAddress('humanresource_asia@texwipe.com'); 	

	        $mail->isHTML(true);                                  // Set email format to HTML
	        $mail->Subject = "Applicatant Interview";
	        $mail->Body = " <!DOCTYPE html>
	                        <html>
	                            <head>
	                                <style>
	                                    div {
	                                      background-color: white;
	                                      width: 700px;
	                                      margin-left: auto;
	                                      margin-right: auto;
	                                      text-align: center;
	                                    }	

	                                    h2, p {
	                                        text-align: center;
	                                    }
	                                 
	                                </style>
	                            </head>
	                            <body>
	                                <div>
	                                    <img src='https://tukuz.com/wp-content/uploads/2021/02/texwipe-logo-vector.png' width='650' height=350'>
	                                    <h1>    exam is done </h1>
	                                    <h2> " .  date("D M j Y g:i:s T") . " </h2>
	                                </div>
	                            </body>
	                        </html>";
	        $mail->send();
	        $getSet = 1;
	    } catch(Exception $e) {
	        echo $e;
	    }
	}

} 

?>

