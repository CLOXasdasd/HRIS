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
	      
	        // $result = mysqli_query($this->dbh,"SELECT username, name, account_type,email, status FROM tbl_employees WHERE username='$emp_id' AND password='$encryted_password' AND status = 'Active'");
			$result = mysqli_query($this->dbh,"SELECT emp_id,  Firstname,Middlename,Lastname,department,position,status FROM tbl_employee WHERE emp_id='$emp_id' and password='$encryted_password' AND status = 'Active'");
	        $user_data = mysqli_fetch_array($result);
	        $count_row = $result->num_rows;

	        if ($count_row == 1) {
	        	$_SESSION['login'] = true;  
	            $_SESSION['username'] = $user_data['username'];  
	            $_SESSION['name'] = $user_data['name'];  
	            $_SESSION['account_type'] = $user_data['account_type'];  
	           	$_SESSION['email'] = $user_data['email'];   
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

		public function selectApprover($emp_id){
			$sql = mysqli_query($this->dbh,"SELECT Firstname, Lastname FROM tbl_employee WHERE emp_id='$emp_id' ");
			$user_data = mysqli_fetch_array($sql);
			$name = $user_data['Lastname']. " " . $user_data['Firstname']  ; 
			return $name;
		}

	    public function updateProfile($username,$name,$account_type,$email){
	        $result = mysqli_query($this->dbh,"UPDATE tbl_users SET username='', name='$name', account_type='$account_type',email='$email' WHERE username = '$username' ");

	        	$account_admin = $_SESSION['name'];
				$description = " user [". $account_admin."] has Update Information"; 
				$date = date("Y-m-d H:i:s") ;
				mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");
	        return $result;
	    }

	    public function ChangePassword($oldPass,$newPass,$username){
	    	$oldpassword=base64_encode(urldecode($oldPass));
			$newpassword=base64_encode(urldecode($newPass));
			
			$result = mysqli_query($this->dbh,"SELECT username FROM tbl_users WHERE username='$username' and password='$oldpassword'");
	        $count_row = $result->num_rows;	

	        if ($count_row == 1) {
	        	$data = mysqli_query($this->dbh,"UPDATE tbl_users SET password='$newpassword' WHERE username = '$username'");

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

	    public function removeWorkEmail($id){
			$select = mysqli_query($this->dbh,"DELETE FROm tbl_workemail WHERE id = '$id'");
	    	return $select;
	    }

	    public function getAllworkEmail(){
	    	$select = mysqli_query($this->dbh,"SELECT 
				tbl_workemail.id,
				tbl_employee.emp_id,
			    tbl_employee.Lastname,
			    tbl_employee.Firstname,
				tbl_workemail.email
			 FROM hird_db.tbl_employee
			 INNER JOIN hirs_db.tbl_workemail
			 ON tbl_employee.emp_id = tbl_workemail.emp_id
			");
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

	   	public function selectAllapprover(){
	    	$select = mysqli_query($this->dbh,"SELECT 
					tbl_employee.emp_id, 
					tbl_employee.Lastname, 
					tbl_employee.Firstname
				FROM hirs_db.tbl_employee
				INNER JOIN  hirs_db.tbl_position
				ON tbl_employee.position = tbl_position.position_desc
				WHERE approver = 'yes' ");
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

	    public function createPosition($position, $approver,$isSingleapprover){
	    		$result = mysqli_query($this->dbh,"INSERT INTO tbl_position (position_desc, approver,SingleApprover) VALUES ('$position', '$approver','$isSingleapprover') ");
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
			$select = mysqli_query($this->dbh,"SELECT * FROM tbl_reports ORDER BY id DESC limit 1000");
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

		public function createEmployee($emp_id,$status,$position,$department,$Lastname,$Firstname,$Middlename,$date_hired,$emp_status_1,$emp_status_2, $age,$civil_status,$gender,$birthday,$contact,$course,$school,$contact_person,$contact_person_num,$contact_relation,$sss,$TIN,$philhealth,$pagibig,$spouse,$spouse_bday,$dependent1,$dependent1_bday,$dependent2,$dependent2_bday,$dependent3,$dependent3_bday,$dependent4,$dependent4_bday, $present_address, $permanent_address,$email,$reg_date){

			$encryted_password=base64_encode(urldecode($emp_id));
	      
	        $result = mysqli_query($this->dbh,"SELECT emp_id FROM tbl_employee WHERE emp_id ='$emp_id' ");
	        $user_data = mysqli_fetch_array($result);
	        $count_row = $result->num_rows;

 			if ($count_row == 0) {
				$data = mysqli_query($this->dbh,"INSERT INTO tbl_employee (emp_id,password,status,position,department,Lastname,Firstname,Middlename, date_hired,emp_status_1,emp_status_2, age, civil_status,gender,birthday,contact,course,school,contact_person,contact_person_num,contact_relation,sss,TIN,philhealth,pagibig,spouse,spouse_bday,dependent1,dependent1_bday,dependent2,dependent2_bday,dependent3,dependent3_bday,dependent4,dependent4_bday,present_address,permanent_address,email,reg_date) VALUES ('$emp_id','$encryted_password','$status','$position','$department','$Lastname','$Firstname','$Middlename','$date_hired','$emp_status_1','$emp_status_2', '$age','$civil_status','$gender','$birthday','$contact','$course','$school','$contact_person','$contact_person_num','$contact_relation','$sss','$TIN','$philhealth','$pagibig','$spouse','$spouse_bday','$dependent1','$dependent1_bday','$dependent2','$dependent2_bday','$dependent3','$dependent3_bday','$dependent4','$dependent4_bday','$present_address','$permanent_address','$email','$reg_date')");
				return $data;
			} else {
				return "Exist";
			}
		}

		public function selectEmployeeAccounts(){
			$data = mysqli_query($this->dbh,"SELECT emp_id,status,position,department,Lastname,Firstname,Middlename FROM tbl_employee WHERE status = 'Active' ORDER BY emp_id ASC");
			return $data;		
		}


		public function selectEmployeeProbi(){
			$data = mysqli_query($this->dbh,"SELECT emp_id,status,position,department,Lastname,Firstname,Middlename FROM tbl_employee WHERE status = 'Active' ORDER BY Lastname ASC;");
			return $data;		
		}




		public function selectEmployeeAccountsInactive(){
			$data = mysqli_query($this->dbh,"SELECT emp_id,status,position,department,Lastname,Firstname,Middlename FROM tbl_employee WHERE status != 'Active' ORDER BY emp_id ASC");
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

		public function selectEmployeeForWorkEmail(){
			$data = mysqli_query($this->dbh,"SELECT 
				tbl_employee.emp_id,
			    tbl_employee.Lastname,
			    tbl_employee.Firstname
			 FROM hirs_db.tbl_employee
			 INNER JOIN hirs_db.tbl_position
			 ON tbl_employee.position = tbl_position.position_desc
			 WHERE tbl_employee.position like '%Supervisor%' OR tbl_employee.position like '%Manager%' OR tbl_employee.department like '%General Admin%' OR tbl_position.approver = 'yes' AND tbl_employee.status = 'Active' ");
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
					document_description as document_description, status,
					id as doc_id FROM tbl_employeedocuments WHERE emp_id='$id' ");		
			return $result;	
		}

		public function saveFileRequest($emp_id, $documentTypes, $filename,$status){
			$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has uploaded " . $documentTypes . " for employee id [". $emp_id ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");

			$date = date("y-m-d");
			$sql =  mysqli_query($this->dbh,"INSERT INTO tbl_employeedocuments (emp_id,documentType, document_description, date_uploaded, status) VALUES ('$emp_id', '$documentTypes', '$filename','$date','$status') ");
			return "Uploaded Successfully";
		}
		

		public function insertWorkEmail($employeeEmail, $work_email){
		
			$sql =  mysqli_query($this->dbh,"INSERT INTO tbl_workemail (emp_id,email) VALUES ('$employeeEmail', '$work_email') ");
			return $sql;
		}


		public function selectAllNotifRequest(){
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
						ORDER BY id DESC ");		
			return $result;				
		}

		public function selectAllNotifPass(){
			$result = mysqli_query($this->dbh,"SELECT * FROM hirs_db.tbl_notifpass ORDER BY notifID DESC");		
			return $result;				
		}

		public function checkConcern($id){
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
						WHERE  tbl_itrequest.ITConcernID = '$id'
						ORDER BY id DESC

			");		
			return $result;	
		}

		public function saveNotifPass($emp_id, $notification, $date_filed, $nfID, $firstapprover ,$secondapprover){
			$sql = mysqli_query($this->dbh,"SELECT Firstname, Lastname FROM tbl_employee WHERE emp_id='$emp_id' ");
			$user_data = mysqli_fetch_array($sql);
			$name = $user_data['Firstname'] . " " . $user_data['Lastname']; 

			$result = mysqli_query($this->dbh,"INSERT INTO tbl_notifpass (notifID, emp_id, emp_name, notif_desc, date, status,firstapprover,secondapprover) VALUES ('$nfID', '$emp_id', '$name', '$notification', '$date_filed','Pending', '$firstapprover' ,'$secondapprover')");

			$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has created notification pass for [". $name ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");
			return $result;		
		}

		public function rejectFinalApprover($id,$status){
			$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has  " . $status . " notification pass [". $id ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");

			$result = mysqli_query($this->dbh,"UPDATE tbl_notifpass SET status = '$status', status2= '$status' , status2_approver = '$account_admin' WHERE notifID = '$id'");		
			return $result;				
		}

		public function selectAllOBRequest(){
			$result = mysqli_query($this->dbh,"SELECT 
							tbl_officialbusiness.id,
				tbl_officialbusiness.OBid,
				tbl_officialbusiness.emp_name,
				tbl_officialbusiness.date,				tbl_officialbusiness.dateFiled,
				tbl_officialbusiness.time_in,
				tbl_officialbusiness.time_out,
				tbl_officialbusiness.destination,
				tbl_officialbusiness.reason,
				tbl_officialbusiness.status,
				tbl_officialbusiness.status1,
				tbl_officialbusiness.status2,
				tbl_officialbusiness.status1_approver,
				tbl_officialbusiness.status2_approver
			 FROM hirs_db.tbl_officialbusiness 
            			  
            			 ORDER BY tbl_officialbusiness.id DESC");		
			return $result;				
		}

		public function saveOB($OBID,$emp_id, $date_filed,$notification,$timein,$timeout,$destination){
			$sql = mysqli_query($this->dbh,"SELECT Firstname, Lastname FROM tbl_employee WHERE emp_id='$emp_id' ");
			$user_data = mysqli_fetch_array($sql);
			$name = $user_data['Firstname'] . " " . $user_data['Lastname']; 

			$result = mysqli_query($this->dbh,"INSERT INTO tbl_officialbusiness (OBid, emp_id, emp_name, date, reason, time_in, time_out,destination, status) VALUES ('$OBID','$emp_id','$name' ,'$date_filed','$notification','$timein','$timeout','$destination','Pending')");
	
			$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has created Official Business Request for [". $name ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");

			return $result;	
		}

		public function rejectFinalApproverOB($id,$status){
	
			$result = mysqli_query($this->dbh,"UPDATE tbl_officialbusiness SET status = '$status' WHERE id = '$id'");		
			return $result;				
		}

		public function saveOT($OTID,$emp_id,$date_filed,$hours,$notification,$date,$date_filed_to){
			$sql = mysqli_query($this->dbh,"SELECT Firstname, Lastname FROM tbl_employee WHERE emp_id='$emp_id' ");
			$user_data = mysqli_fetch_array($sql);
			$name = $user_data['Firstname'] . " " . $user_data['Lastname']; 

			$result = mysqli_query($this->dbh,"INSERT INTO tbl_overtime 
				(OTID, emp_id, emp_name, date_worked,total_hours,reason,  date_filed, status)
			VALUES ('$OTID','$emp_id','$name','$date_filed','$hours','$notification','$date','Pending','$date_filed_to')");
	
			$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has created Official Business Request for [". $name ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");

			return $result;	
		}

		public function selectOTRequest(){
			$result = mysqli_query($this->dbh,"SELECT 
				tbl_overtime.OTID,
				tbl_overtime.emp_name,
				tbl_overtime.date_filed,
				tbl_overtime.date_filed_to,
				tbl_overtime.date_worked,
				tbl_overtime.total_hours,
				tbl_overtime.reason,
				tbl_overtime.status,
				tbl_overtime.status1,
				tbl_overtime.status2,
				tbl_overtime.status1_approver,
				tbl_overtime.status2_approver
			FROM tbl_overtime             
			INNER JOIN hirs_db.tbl_employee 
            ON tbl_overtime.emp_id = tbl_employee.emp_id
            ORDER BY id DESC LIMIT 1000
          ");		
			return $result;	
		}

		public function rejectFinalApproverOT($id,$status){
			$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has  " . $status . " Overtime ID [". $id ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");

			$result = mysqli_query($this->dbh,"UPDATE tbl_overtime SET status = '$status', status2= '$status' , status2_approver = '$account_admin' WHERE OTID = '$id'");		
			return $result;					
		}

		public function saveChangeShift($date_filed, $change_shift, $unique_id, $employee_id, $change_shiftfrom, $change_shiftto, $rep_employee_id, $rep_shiftfrom, $rep_shiftto, $notification){

			$sql = mysqli_query($this->dbh,"SELECT Firstname, Lastname FROM tbl_employee WHERE emp_id='$employee_id' ");
			$user_data = mysqli_fetch_array($sql);
			$name = $user_data['Firstname'] . " " . $user_data['Lastname']; 

			$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has created Official Business Request for [". $name ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");

			$result = mysqli_query($this->dbh,"INSERT INTO tbl_changeshift (date_filed,changeshift_id, category, emp_id,emp_name, shift_start, shift_end,replacement_personel ,  rep_shiftstart,rep_shiftend,reason, status) VALUES ('$date_filed', '$unique_id','$change_shift','$employee_id','$name','$change_shiftfrom','$change_shiftto','$rep_employee_id','$rep_shiftfrom','$rep_shiftto',' $notification','Pending')");
			return $result;	
		}

		public function selectCSRequest(){
			$result = mysqli_query($this->dbh,"SELECT 
				tbl_changeshift.changeshift_id,
				tbl_changeshift.category,
				tbl_changeshift.emp_name,
				tbl_changeshift.filed_date as date_filed,
								tbl_changeshift.date_filed1 as date_filed1,
				tbl_changeshift.dateFiled as dateFiled,
				tbl_changeshift.reason,
				tbl_changeshift.status,
				tbl_changeshift.status1,
				tbl_changeshift.status2,
				tbl_changeshift.status1_approver,
				tbl_changeshift.status2_approver
				FROM hirs_db.tbl_changeshift 
            INNER JOIN hirs_db.tbl_employee 
            ON tbl_changeshift.emp_id = tbl_employee.emp_id
 			ORDER BY status DESC
           ");		
			return $result;	
		}

		public function selectCSRequestinfo($id){
			$result = mysqli_query($this->dbh,"SELECT * FROM tbl_changeshift WHERE changeshift_id = '$id'");		
			return $result;	
		}

		public function rejectFinalApproverCS($id,$status){
			$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has  " . $status . " Overtime ID [". $id ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");

			$result = mysqli_query($this->dbh,"UPDATE tbl_changeshift SET status = '$status', status2= '$status' , status2_approver = '$account_admin' WHERE changeshift_id = '$id'");		
			return $result;					
		}

		public function checkstatusCS($id){
			$sql = mysqli_query($this->dbh,"SELECT status FROM tbl_changeshift WHERE changeshift_id='$id' ");
			$user_data = mysqli_fetch_array($sql);
			return $user_data['status'];			
		}

		public function requestLeave($leaveID,$employee_id,$leave,$start_date,$days,$end_date,$description_reason){

			$sql = mysqli_query($this->dbh,"SELECT Firstname, Lastname FROM tbl_employee WHERE emp_id='$employee_id' ");
			$user_data = mysqli_fetch_array($sql);
			$name = $user_data['Firstname'] . " " . $user_data['Lastname']; 

			$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has created Official Business Request for [". $name ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");

			$result = mysqli_query($this->dbh,"INSERT INTO tbl_leaverequest (leave_id,emp_id,emp_name,leaveRequest,startDate,days,endDate,reason,status,reset) VALUES ('$leaveID','$employee_id','$name','$leave','$start_date','$days','$end_date','$description_reason','0','1')");

			return $result;				
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

		public function checkRemainingLeave($id, $emp_id, $earned){
			$count = mysqli_query($this->dbh,"SELECT sum(days) as days FROM tbl_leaverequest WHERE leaveRequest='$id' AND emp_id = '$emp_id' AND status = 'Approved' AND reset = '1' ");
			$user_count = mysqli_fetch_array($count);
			return $earned-$user_count['days'];
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
				
		public function checkPendingLeave($id , $emp_id){
			$result = mysqli_query($this->dbh,"SELECT sum(days) as days FROM tbl_leaverequest WHERE leaveRequest='$id' AND emp_id = '$emp_id' AND status = 'Pending' AND reset = '1' ");
			$user_data = mysqli_fetch_array($result);

			if($user_data['days'] != "") {
				return $user_data['days']; 
			} else {
				return 0; 
			}
		}

		public function selectLEAVERequest(){
			$result = mysqli_query($this->dbh,"SELECT 
					tbl_leaverequest.leave_id, 
					tbl_leaverequest.leaveRequest, 
					tbl_leaverequest.emp_name, 
					tbl_leaverequest.startDate, 
					tbl_leaverequest.endDate, 
					tbl_leaverequest.days, 
					tbl_leaverequest.reason, 
					tbl_leaverequest.status, 
					tbl_leaverequest.status1, 
					tbl_leaverequest.status2, 
					tbl_leaverequest.status1_approver, 
					tbl_leaverequest.status2_approver
	 		FROM hirs_db.tbl_leaverequest 
            INNER JOIN hirs_db.tbl_employee 
            ON tbl_leaverequest.emp_id = tbl_employee.emp_id
            ORDER BY id DESC");		
			return $result;				
		}

		public function HRselectLEAVERequest(){
			$result = mysqli_query($this->dbh,"SELECT *
	 		FROM hirs_db.tbl_leaverequest 
          
            ORDER BY id DESC");		
			return $result;				
		}

		public function rejectFinalApproverLeave($id,$status){
			$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has  " . $status . " Overtime ID [". $id ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");

			$result = mysqli_query($this->dbh,"UPDATE tbl_leaverequest SET  status2 = '$status' , status2_approver = '$account_admin' WHERE leave_id = '$id'");		
			return $result;					
		}

		public function HRrejectFinalApproverLeave($id,$status){
			$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has  " . $status . " Overtime ID [". $id ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");

			$result = mysqli_query($this->dbh,"UPDATE tbl_leaverequest SET  status = '$status' WHERE leave_id = '$id'");		
			return $result;					
		}

		public function countActiveUsers(){
	        $result = mysqli_query($this->dbh,"SELECT emp_id FROM tbl_employee WHERE status='Active'");
	        $count_row = $result->num_rows;		
	        return $count_row;	
		}

		public function countPendingLeaveRequest(){
			$result = mysqli_query($this->dbh,"SELECT leave_id FROM tbl_leaverequest WHERE status='Pending' AND status1='Approved'");
	        $count_row = $result->num_rows;		
	        return $count_row;
		}

		public function countPendingNotifPass(){
			$result = mysqli_query($this->dbh,"SELECT id FROM tbl_assets WHERE status = 'Approved'");
	        $count_row = $result->num_rows;		
	      
			$result1 = mysqli_query($this->dbh,"SELECT id FROM tbl_materials WHERE status = 'Approved'");
	        $count_row2 = $result1->num_rows;		
	      

	        return $count_row +  $count_row2;
		}

		public function countPedingBusinessRequest(){
			$result = mysqli_query($this->dbh,"SELECT id FROM tbl_officialbusiness WHERE status='Pending'");
	        $count_row = $result->num_rows;		
	        return $count_row;			
		}

		public function countPedingOverTime(){
			$result = mysqli_query($this->dbh,"SELECT id FROM tbl_overtime WHERE status='Pending'");
	        $count_row = $result->num_rows;		
	        return $count_row;			
		}

		public function countPedingChangeShift(){
			$result = mysqli_query($this->dbh,"SELECT id FROM tbl_changeshift WHERE status='Pending'");
	        $count_row = $result->num_rows;		
	        return $count_row;		
		}

		public function getLeaveforEdit($id){
			$result = mysqli_query($this->dbh,"SELECT * FROM tbl_leavetype WHERE id='$id'");
	        return $result;	
		}

		public function saveEdittedLeave($leave_id,$leave_desc,$leave_count,$earnable){


			$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has editted leave  [". $leave_desc ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");


			$result = mysqli_query($this->dbh,"UPDATE tbl_leavetype SET leave_description = '$leave_desc', leave_count = '$leave_count', earned= '$earnable' WHERE id='$leave_id'");
			return $result;

		}

		public function clearLeave($value){

			$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has cleared all the leave request "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");

			$result = mysqli_query($this->dbh,"UPDATE tbl_leaverequest SET reset = '$value' ");
			return $result;
		}

		public function editEmployee($emp_id,$position,$department,$Lastname,$Firstname,$Middlename,$date_hired,$emp_status_1,$emp_status_2, $age,$civil_status,$gender,$birthday,$contact,$course,$school,$contact_person,$contact_person_num,$contact_relation,$sss,$TIN,$philhealth,$pagibig,$spouse,$spouse_bday,$dependent1,$dependent1_bday,$dependent2,$dependent2_bday,$dependent3,$dependent3_bday,$dependent4,$dependent4_bday, $present_address, $permanent_address,$email,$reg_date, $filename,$endDate,$firstapprover , $finalapprover){

			$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has editted employee id [". $emp_id . "] account "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");

		
				$result = mysqli_query($this->dbh,"UPDATE tbl_employee SET position='$position',department='$department',Lastname='$Lastname',Firstname='$Firstname', Middlename='$Middlename',date_hired='$date_hired',emp_status_1='$emp_status_1',emp_status_2='$emp_status_2', age='$age',civil_status='$civil_status',gender='$gender',birthday='$birthday',contact='$contact',course='$course',school='$school',contact_person='$contact_person',contact_person_num='$contact_person_num',contact_relation='$contact_relation',sss='$sss',TIN='$TIN',philhealth='$philhealth',pagibig='$pagibig',spouse='$spouse',spouse_bday='$spouse_bday',dependent1='$dependent1',dependent1_bday='$dependent1_bday',dependent2='$dependent2',dependent2_bday='$dependent2_bday',dependent3='$dependent3',dependent3_bday='$dependent3_bday',dependent4='$dependent4',dependent4_bday='$dependent4_bday',present_address='$present_address',permanent_address='$permanent_address',email='$email',reg_date='$reg_date' , image = '$filename', endDate='$endDate',
					firstapprover='$firstapprover' , secondapprover='$finalapprover' WHERE emp_id = '$emp_id' ");
				return $result;
	      

		}

		public function selectRequest(){
			$result = mysqli_query($this->dbh,"SELECT 
				tbl_specialrequest.id,
				tbl_specialrequest.description,
				tbl_employee.Lastname,
				tbl_employee.Firstname,	
				tbl_employee.Middlename							
			 FROM tbl_specialrequest

			 INNER JOIN tbl_employee
			 ON tbl_specialrequest.employeeName = tbl_employee.emp_id
			 WHERE tbl_specialrequest.status = 'Pending'
			 ORDER BY id DESC");		
			return $result;	
		}


		public function selectSuggestion(){
			$result = mysqli_query($this->dbh,"SELECT * FROM hirs_db.tbl_suggestions ORDER BY id DESC");		
			return $result;	
		}


		public function SpecialRequest($id,$status){
			$result = mysqli_query($this->dbh,"UPDATE tbl_specialrequest SET  status = '$status' WHERE id = '$id'");		
			return $result;					
		}

		public function countPendingSpecialINQ(){
			$result = mysqli_query($this->dbh,"SELECT id FROM tbl_specialrequest WHERE status='Pending'");
	        $count_row = $result->num_rows;		
	        return $count_row;				
		}

		public function createAnnouncement($leave_description){
			$result = mysqli_query($this->dbh,"INSERT INTO tbl_announcement (descipriton, status) VALUES ('$leave_description','Active') ");
	        return $result;			
		}


		public function selectAllAnnouncement(){
			$result = mysqli_query($this->dbh,"SELECT * FROM tbl_announcement ");
	        return $result;			
		}

		public function editAnnouncement($id){
			$result = mysqli_query($this->dbh,"DELETE FROM tbl_announcement WHERE id = '$id'");
	        return $result;			
		}

		public function editITConcern($id,$status,$resolution, $date_encyp){
			$account_admin = $_SESSION['name'];
			$description = " user [". $account_admin."] has [". $status ."] id  [". $id ."] "; 
			$date = date("Y-m-d H:i:s") ;
			mysqli_query($this->dbh,"INSERT INTO tbl_reports (description, date) VALUES ('$description', '$date')");

			$result = mysqli_query($this->dbh,"UPDATE tbl_itrequest SET status='$status', resolution='$resolution' ,datefinished='$date_encyp' WHERE ITConcernID = '$id'");
	        return $result;	
		}

		public function OpenITConcern(){
			$result = mysqli_query($this->dbh,"SELECT id FROM tbl_itrequest WHERE status='Open' OR status='Re-Open' ");
	        $count_row = $result->num_rows;		
	        return $count_row;	
		}



		public function addAssets($employee_id,$department,$assetTag, $assetDesc, $date_encyp){

			$sql = mysqli_query($this->dbh,"SELECT Firstname, Lastname FROM tbl_employee WHERE emp_id='$employee_id' ");
			$user_data = mysqli_fetch_array($sql);
			$name = $user_data['Firstname'] . " " . $user_data['Lastname']; 

			$result = mysqli_query($this->dbh,"INSERT INTO tbl_assets (employee, location, asset_no, item_desc,date_issued,status,emp_id ) VALUES ('$name','$department','$assetTag', '$assetDesc', '$date_encyp', 'Pending','$employee_id') ");
	        return $result;	
		}

		public function selectAllAsset(){
			$result = mysqli_query($this->dbh,"SELECT * FROM tbl_assets ORDER BY status DESC ");
	        return $result;				
		}

		public function selectAllAssetID($id){
			$result = mysqli_query($this->dbh,"SELECT * FROM tbl_assets WHERE id = '$id' ");
	        return $result;				
		}
		public function editAssets($id,$Asset,$location,$employee_id, $status, $description){
			$sql = mysqli_query($this->dbh,"SELECT Firstname, Lastname FROM tbl_employee WHERE emp_id='$employee_id' ");
			$user_data = mysqli_fetch_array($sql);
			$name = $user_data['Firstname'] . " " . $user_data['Lastname']; 

			$result = mysqli_query($this->dbh,"UPDATE tbl_assets SET 
				employee='$name', 
				emp_id = '$employee_id',
				asset_no='$Asset', 
				item_desc='$description', 
				location='$location', 
				status='$status' 
				WHERE id = '$id'  ");
	        return $result;		

		}

		public function addMaterials($employee_id,$department,$assetTag, $assetDesc, $date_encyp){
				$sql = mysqli_query($this->dbh,"SELECT Firstname, Lastname FROM tbl_employee WHERE emp_id='$employee_id' ");
			$user_data = mysqli_fetch_array($sql);
			$name = $user_data['Firstname'] . " " . $user_data['Lastname']; 

			$result = mysqli_query($this->dbh,"INSERT INTO tbl_materials (employee, location, quantity, item_desc,date_issued,status,emp_id ) VALUES ('$name','$department','$assetTag', '$assetDesc', '$date_encyp', 'Pending','$employee_id') ");
	        return $result;			
		}

		public function selectAllMaterials(){
			$result = mysqli_query($this->dbh,"SELECT * FROM tbl_materials ");
	        return $result;				
		}

		public function selectAllmaterialID($id){
			$result = mysqli_query($this->dbh,"SELECT * FROM tbl_materials WHERE id = '$id' ");
	        return $result;				
		}

		public function editMatrial($id,$Asset,$location,$employee_id, $status,$description){
			$sql = mysqli_query($this->dbh,"SELECT Firstname, Lastname FROM tbl_employee WHERE emp_id='$employee_id' ");
			$user_data = mysqli_fetch_array($sql);
			$name = $user_data['Firstname'] . " " . $user_data['Lastname']; 

			$result = mysqli_query($this->dbh,"UPDATE tbl_materials SET 
				employee='$name', 
				emp_id = '$employee_id',
				quantity='$Asset', 
				item_desc='$description', 
				location='$location', 
				status='$status' 
				WHERE id = '$id'  ");
	        return $result;					
		}

		public function checkFileName($filename){
			$result = mysqli_query($this->dbh,"SELECT document_description FROM tbl_employeedocuments WHERE document_description='$filename' ");
	        $user_data = mysqli_fetch_array($result);
	        $count_row = $result->num_rows;
	        if ($count_row == 1 ||$count_row >= 1 ) {
	        	return "existed";
	        } else {
	        	return "nonexisted";
	        }
		}

		public function getProfilePic($id){
			$result = mysqli_query($this->dbh,"SELECT image FROM tbl_employee WHERE emp_id = '$id' ");		
			$user_data = mysqli_fetch_array($result);
			$imageName = $user_data['image']; 

			if( $user_data['image'] == '') {
				return "";
			}else {
				return $destination = 'img/' . $user_data['image'];			
			}
		}

		public function duplicateFile($filename){
			$checkPic = mysqli_query($this->dbh,"SELECT emp_id FROM tbl_employee WHERE image='$filename'");
	        $count_row = $checkPic->num_rows;	

	        if($count_row == 1){
	        	return "1";
	        } else {
  		       	return "0";		
  			}
		}

		public function checkifExist( $emp_id){
			$result = mysqli_query($this->dbh,"SELECT image FROM tbl_employee WHERE emp_id = '$emp_id' ");		
			$user_data = mysqli_fetch_array($result);
			$imageName = $user_data['image']; 
			
			if($imageName == ''){
				return '';
			} else {
				return $imageName;
			}				
		}

		public function bday($birthday){
			$date_today = date("Y-m-d");
			$computed = $date_today - $birthday;
			echo  $computed ;
		}

		public function GenerateLeaveFile($startDate, $endDate){
			$result = mysqli_query($this->dbh,"SELECT leave_id, emp_name, leaveRequest, startDate, endDate, days FROM hirs_db.tbl_leaverequest WHERE status = 'Approved' AND startDate BETWEEN '$startDate' AND '$endDate'; ");		
			return $result;
		}

		public function selectAllVisitor(){
			$result = mysqli_query($this->dbh,"SELECT name, company, number, visitDetails, email, timeIn, timeOut FROM hirs_db.tbl_visitor ORDER BY id DESC");		
			return $result;
		}

		public function getApproverNAme($emp_id){
			$result = mysqli_query($this->dbh,"SELECT Lastname,Firstname, Middlename FROM tbl_employee WHERE emp_id = '$emp_id' ");		
			$user_data = mysqli_fetch_array($result);

			if($user_data['Lastname'] == ''){
				return "-";
			} else {
				return $user_data['Lastname'] . ", ". $user_data['Firstname']; 	
			}
		}

		public function selectAllQuestion(){
			$result = mysqli_query($this->dbh,"SELECT * FROM tbl_entrancequestion WHERE status Like '%Open%' ORDER BY ID DESC ");
	        return $result;	
		}

		public function addEntranceQuestion($date_filed,$status,$type,$optionsSelect){
			$result = mysqli_query($this->dbh,"INSERT INTO hirs_db.tbl_entrancequestion (description, status,questionType,options) VALUES ('$date_filed','$status','$type','$optionsSelect')");
	        return $result;	
		}

		public function fetch_Attendance(){
			$result = mysqli_query($this->dbh,"SELECT id, date, emp_id as emp,(SELECT Firstname FROM hirs_db.tbl_employee WHERE emp_id = emp) as Firstname, (SELECT Lastname FROM hirs_db.tbl_employee WHERE emp_id = emp) as Lastname FROM hirs_db.tbl_dailyattendance ORDER BY id DESC");
	        return $result;	
		}

		public function checkAttendanceRecord($id){
			$result = mysqli_query($this->dbh,"SELECT *, emp_id as emp,(SELECT Firstname FROM hirs_db.tbl_employee WHERE emp_id = emp) as Firstname, (SELECT Lastname FROM hirs_db.tbl_employee WHERE emp_id = emp) as Lastname FROM hirs_db.tbl_dailyattendance ORDER BY id DESC limit 1");
	        return $result;
		}

		public function fetchDataQuestions($questions){
            $data = explode(",",$questions);
            $datu = implode("','",$data);
            $result = mysqli_query($this->dbh,"SELECT 	id as qid, description FROM hirs_db.tbl_entrancequestion WHERE id IN('". $datu. "')");
            return $result;   
        }

        public function fetchDataAnswers($i, $id){
            $result = mysqli_query($this->dbh,"SELECT answer FROM hirs_db.tbl_dailyattendance WHERE id = '$id'");
            $data = mysqli_fetch_array($result);
            $datu = explode(",", $data['answer']);
            return  $datu[$i]; 

        }

		public function getDatesFromRange($start, $end, $format = 'Y-m-d') { 
			$array = array(); 
			$interval = new DateInterval('P1D'); 
		  
			$realEnd = new DateTime($end); 
			$realEnd->add($interval); 
		  
			$period = new DatePeriod(new DateTime($start), $interval, $realEnd); 
		
			foreach($period as $date) {                  
				$array[] = $date->format($format);  
			}
			return $array; 
		} 

		public function getDatesforData( $employee_id, $result){
			$result = mysqli_query($this->dbh,"SELECT * FROM hirs_db.tbl_dailyattendance WHERE emp_id = '$employee_id' AND date =  '$result' ");
	        return $result;
		}
		
		public function test123(){
			$result = "test";
	        return $result;	
		}

		public function selectallappicants(){

			$result = mysqli_query($this->dbh,"SELECT * FROM hirs_db.tbl_applicant  ORDER BY id DESC");
	        return $result;	
			
		}

		public function GetApplicationByID($applicant_id){
			$result = mysqli_query($this->dbh,"SELECT * FROM hirs_db.tbl_applicant WHERE id = '$applicant_id' ");
	        return $result;	

		}

		public function deleteInformation($id){
				$result = mysqli_query($this->dbh,"DELETE FROM hirs_db.tbl_employeedocuments WHERE id = '$id' ");
	        return $result;	
		}

		public function selectTopUploads(){
			$result = mysqli_query($this->dbh,"SELECT emp_id as emp, 
				(SELECT Firstname FROM hirs_db.tbl_employee WHERE emp_id = emp) as Firstname,
				(SELECT Middlename FROM hirs_db.tbl_employee  WHERE emp_id = emp) as Middlename,
				(SELECT Lastname FROM hirs_db.tbl_employee WHERE emp_id =  emp) as Lastname,
				document_description,documentType
				FROM hirs_db.tbl_employeedocuments ORDER BY id DESC LIMIT 10 ");
	        return $result;	

		}

		public function retrieveSchedule($id) {
		    $result = mysqli_query($this->dbh, "SELECT id, documentType,document_description,status FROM hirs_db.tbl_employeedocuments WHERE id = '$id'");
		    $data = array();
		    if ($result->num_rows > 0) {
		        while ($row = mysqli_fetch_assoc($result)) {
		            $data[] = $row;
		        }
		    } else {
		        $data = ['error' => 'No results found'];
		    }
		    return $data;
		}

		public function editDocumentTypes($documentID, $documentTypes1,$documentName,$DON,$targetOld,$targetNew,$status ){
			if (rename($targetOld, $targetNew)) {
    			$result = mysqli_query($this->dbh,"UPDATE hirs_db.tbl_employeedocuments set documentType = '$documentTypes1', document_description = '$documentName', status = '$status' WHERE id = '$documentID' ");
	        	return $result;	
			} else {
			    echo "Error renaming the file.";
			}
		    return $result;	
		}

		public function getDocumentName($documentID){
			$result = mysqli_query($this->dbh,"SELECT document_description FROM hirs_db.tbl_employeedocuments WHERE id = '$documentID'");
            $data = mysqli_fetch_array($result);
			return $data['document_description'];
		}

		public function insertMultipleChoise($examType, $questionType,$question,$answerBox,$radioBox,$date){
			$result = mysqli_query($this->dbh,"INSERT INTO hirs_db.tb_exam (examType,examDescription,examAnswerSet,examAnswer,status,dateCreated,examCat) VALUES ('$examType', '$question', '$answerBox','$radioBox','1','$date','$questionType') ");
	        return $result;				
		}

		public function inserEssay($examType, $questionType,$question,$date){
			$result = mysqli_query($this->dbh,"INSERT INTO hirs_db.tb_exam (examType,examDescription,status,dateCreated,examCat) VALUES ('$examType', '$question','1','$date','$questionType') ");
	        return $result;	
		}

		public function selectquestion(){
			$result = mysqli_query($this->dbh,"SELECT * FROM hirs_db.tb_exam WHERE status = '1' ORDER BY id DESC");
	        return $result;	
		}

		public function deleteExamQuestion($id, $status){
			$result = mysqli_query($this->dbh,"UPDATE tb_exam SET status = '$status'WHERE id = '$id'");
	        return $result;
		}

		public function GetQuestion($id){
			$result = mysqli_query($this->dbh,"SELECT * FROM hirs_db.tb_exam WHERE id = '$id'");
			return $result;
		}

		public function changeEssayQuestion($id, $question){
			$result = mysqli_query($this->dbh,"UPDATE tb_exam SET examDescription = '$question'WHERE id = '$id'");
	        return $result;
		}

		public function examTakes($uniqId){
			$result = mysqli_query($this->dbh,"SELECT * FROM hirs_db.tbl_examtake WHERE examid = '$uniqId' ORDER BY id ASC");
	        return $result;	
		}


		public function GetexamId($exam_id){
			$result = mysqli_query($this->dbh,"SELECT * FROM hirs_db.tbl_examtake WHERE examid = '$exam_id' ORDER BY id DESC limit 1");
			return $result; 
		}

		public function examQuestion($exam_id){
			// $ids = explode(',', $exam_id);

    		// $placeholders = implode(',', array_fill(0, count($ids), '?'));

			// $result = mysqli_query($this->dbh,"SELECT * FROM hirs_db.tb_exam WHERE id IN ('$placeholders') ORDER BY examCat ASC");
			// return $result; 
			$id = str_replace(",","','",$exam_id);
 			$result = mysqli_query($this->dbh,"SELECT * FROM hirs_db.tb_exam WHERE id in ('$id') ORDER BY examCat DESC");
			return $result; 
		}





		public function settosecondInterview($firstapprover, $applicant_id, $status, $secondapprover,$finalInterview){
			$getEmail = mysqli_query($this->dbh,"SELECT email FROM hirs_db.tbl_workemail WHERE emp_id = '$firstapprover'");
            $data = mysqli_fetch_array($getEmail);
			$email = $data['email'];

			include 'test.php';

			if($getSet == 1) {
 				$result = mysqli_query($this->dbh," UPDATE tbl_applicant SET interviewee = '$firstapprover', interviewee_status = '$status', interviewer = '$secondapprover', interviewer_status = '$status',final_interviewer = '$finalInterview' WHERE id = '$applicant_id';");
				return $result; 	
			} else {
				return 0;
			}

		}

		public function addtoexmployee($employeeId,$password,$firstName,$MiddleName,$lastName,$dateHired,$emp_status_1,$emp_status_2,$civilstatus,$gender,$birthday,$phone,$contactPersonRel,$contactContactnum,$contactRelation,$sss,$tin,$philhealth,$pagibig,$completecurrentaddress,$completeprobaddress,$status,$applicant_id,$data0,$data1,$data2,$data3,$data4,$data5,$data6,$data7,$data8,$data9,$course,$school,$positions,$departments,$firstapprover,$finalapprover){
			$result = mysqli_query($this->dbh,"INSERT INTO hirs_db.tbl_employee (emp_id, password, Firstname, Middlename, Lastname, date_hired, emp_status_1, emp_status_2, civil_status, gender, birthday, contact, contact_person, contact_person_num, contact_relation, sss, TIN, philhealth, pagibig, present_address,permanent_address, status,leaveType,spouse,spouse_bday,dependent1,dependent1_bday,dependent2,dependent2_bday,dependent3,dependent3_bday,dependent4,dependent4_bday,course,school,position,department,firstapprover,secondapprover) VALUES ('$employeeId','$password','$firstName','$MiddleName','$lastName','$dateHired','$emp_status_1','$emp_status_2','$civilstatus','$gender','$birthday','$phone','$contactPersonRel','$contactContactnum','$contactRelation','$sss','$tin','$philhealth','$pagibig','$completecurrentaddress','$completeprobaddress','$status','4','$data0','$data1','$data2','$data3','$data4','$data5','$data6','$data7','$data8','$data9','$course','$school','$positions','$departments','$firstapprover','$finalapprover')");

				mysqli_query($this->dbh," UPDATE tbl_applicant SET stat = '0' WHERE id = '$applicant_id';");


			return $result; 
		}

		public function GetEmployeeWorkInfo($employee_id) {

			$result = mysqli_query($this->dbh,"SELECT position, department FROM tbl_employee WHERE emp_id = '$employee_id'");
	        $user_data = mysqli_fetch_array($result);
			$data[0] = $user_data['position'];
			$data[1] = $user_data['department'];	
	        return $data;


		}


		public function selectEmployeeTrainger(){
			$result = mysqli_query($this->dbh,"SELECT emp_id, Firstname, Middlename, Lastname FROM hirs_db.tbl_employee WHERE status = 'Active' AND department != 'Production' AND department != 'Warehouse'  AND department != 'Facility' AND department != 'Sales' ");
	        return $result;
		}

		public function CreateTrainingForPersonnel($employee_id,$jobTitle,$training,$startDate,$completionDate,$trainer1,$trainer2,$trainer3,$trainer4,$trainer5,$Annex,$status,$AnnexComment,$AnnexTrain){
			$result = mysqli_query($this->dbh,"INSERT INTO hirs_db.tbl_trainings 
			(emp_id, trainingType, description, start, completion, trainer1, trainer1Status, trainer2, trainer2Status, trainer3, trainer3Status, trainer4, trainer4Status, trainer5, trainer5Status, annexDesc, status, annexRemarks, annexTrainer) 
			VALUES 
			('$employee_id', '$training', '$jobTitle', '$startDate', '$completionDate', '$trainer1', '$status', '$trainer2', '$status', '$trainer3', '$status', '$trainer4', '$status', '$trainer5', '$status', '$Annex', '$status', '$AnnexComment', '$AnnexTrain');
			");	        
			return $result;
		}


		public function selectAllTrainginReg(){
			$result = mysqli_query($this->dbh,"SELECT * FROM hirs_db.tbl_trainings");
	        return $result;
		}


		public function selectAllTrainginRegByID($id){
			$result = mysqli_query($this->dbh,"SELECT *, emp_id as empid, 
				(SELECT position FROM hirs_db.tbl_employee WHERE emp_id = empid) as position,
				(SELECT department FROM hirs_db.tbl_employee WHERE emp_id =  empid ) as department   
				FROM hirs_db.tbl_trainings WHERE id = '$id'");
	        return $result;
		}

	} 
?>