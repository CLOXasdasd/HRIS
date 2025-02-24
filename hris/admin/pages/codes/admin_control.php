<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 0);
	date_default_timezone_set('Asia/Manila');
	$date=date("Y-m-d H:i:s");
	require_once'function.php';

	$insertdata=new admin_creation();
	$approved_by = $_SESSION['name'];

	$pick=urldecode($_POST['pick']);

 	 if($pick == "workEmail" || $pick=='workEmail' ) {	//Login
	    $employeeEmail = htmlentities(htmlspecialchars(urldecode($_POST['employeeEmail']))) ;
	    $work_email = htmlentities(htmlspecialchars(urldecode($_POST['work_email']))) ;
		$login = $insertdata->insertWorkEmail($employeeEmail, $work_email);
		echo $login;
	} else  if($pick == "removeEmail" || $pick=='removeEmail' ) {	//Login
	    $id = htmlentities(htmlspecialchars(urldecode($_POST['id']))) ;
		$login = $insertdata->removeWorkEmail($id);


		echo $login;
	}

	else if($pick == 1 ||$pick == "1" ||$pick=='1' ) {	//Login
	    $emp_id = htmlentities(htmlspecialchars(urldecode($_POST['uname']))) ;
	    $password = htmlentities(htmlspecialchars(urldecode($_POST['upass']))) ;
		$login = $insertdata->check_login($emp_id, $password);

	    if ($login) {
	            echo '1';
	    } else {
	            echo '0';
	    }
	}

	else if($pick == 2 ||$pick == "2" ||$pick=='2' ) {	//Login
		$oldPass = htmlentities(htmlspecialchars(urldecode($_POST['oldPass']))) ;
		$newPass = htmlentities(htmlspecialchars(urldecode($_POST['newPass']))) ;
		$username = htmlentities(htmlspecialchars(urldecode($_POST['username']))) ;
		echo $check = $insertdata->ChangePassword($oldPass,$newPass,$username);
	}

	else if($pick == 3 ||$pick == "3" ||$pick=='3' ) {	//Login
		$username = htmlentities(htmlspecialchars(urldecode($_POST['username']))) ;
		$name = htmlentities(htmlspecialchars(urldecode($_POST['name']))) ;
		$account_type = htmlentities(htmlspecialchars(urldecode($_POST['account_type']))) ;
		$email = htmlentities(htmlspecialchars(urldecode($_POST['email']))) ;
		$login = $insertdata->updateProfile($username,$name,$account_type,$email);
	  	echo $login;
	}

	else if($pick == 4 ||$pick == "4" ||$pick=='4' ) {	//Login
		$username = htmlentities(htmlspecialchars(urldecode($_POST['username'])));
		$name = htmlentities(htmlspecialchars(urldecode($_POST['name'])));
		$email = htmlentities(htmlspecialchars(urldecode($_POST['email'])));
		$accountType = htmlentities(htmlspecialchars(urldecode($_POST['accountType'])));
		$password = "Texwipe2023!";
		$status = "Active";
		$login = $insertdata->createAdminAccount($username,$name,$accountType,$email, $password, $status);
	  	echo $login;
	}

	else if($pick == 5 ||$pick == "5" ||$pick=='5' ) {	//Login
		$username = htmlentities(htmlspecialchars(urldecode($_POST['username'])));
		$status = "Deactivate";
		$login = $insertdata->changeAdminStatus($username, $status);
	  	echo $login;
	}

	else if($pick == 6 ||$pick == "6" ||$pick=='6' ) {	//Login
		$username = htmlentities(htmlspecialchars(urldecode($_POST['username'])));
		$status = "Active";
		$login = $insertdata->changeAdminStatus($username, $status);
	  	echo $login;
	}

	else if($pick == 7 ||$pick == "7" ||$pick=='7' ) {	//Login
		$username = htmlentities(htmlspecialchars(urldecode($_POST['username'])));
		$password = "Texwipe2023!";
		$login = $insertdata->changeAdminPassword($username, $password);
	  	echo $login;
	}

	else if($pick == 8 ||$pick == "8" ||$pick=='8' ) {	//Login
		$department = htmlentities(htmlspecialchars(urldecode($_POST['department'])));
		$login = $insertdata->createDepartment($department);
	  	echo $login;
	}

	else if($pick == 9 ||$pick == "9" ||$pick=='9' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));
		$login = $insertdata->deleteDepartment($id);
	  	echo $login;
	}

	else if($pick == 10 ||$pick == "10" ||$pick=='10' ) {	//Login
		$position = htmlentities(htmlspecialchars(urldecode($_POST['position'])));
		$approver = htmlentities(htmlspecialchars(urldecode($_POST['approver'])));
		$isSingleapprover = htmlentities(htmlspecialchars(urldecode($_POST['isSingleapprover'])));
		$login = $insertdata->createPosition($position, $approver,$isSingleapprover);
	  	echo $login;
	}


	else if($pick == 11 ||$pick == "11" ||$pick=='11' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));
		
		$login = $insertdata->deletePosition($id);
	  	echo $login;
	}

	else if($pick == 12 ||$pick == "12" ||$pick=='12' ) {	//Login
		$Document = htmlentities(htmlspecialchars(urldecode($_POST['Document'])));
		
		$login = $insertdata->createDocumentType($Document);
	  	echo $login;
	}
	else if($pick == 13 ||$pick == "13" ||$pick=='13' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));
		
		$login = $insertdata->DeleteDocumentType($id);
	  	echo $login;
	}

	else if($pick == 14 ||$pick == "14" ||$pick=='14' ) {	//Login
		$emp_id = htmlentities(htmlspecialchars(urldecode($_POST['emp_id'])));
		$status = 'Active';
		$position = htmlentities(htmlspecialchars(urldecode($_POST['position'])));
		$department = htmlentities(htmlspecialchars(urldecode($_POST['department'])));
		$Lastname = htmlentities(htmlspecialchars(urldecode($_POST['Lastname'])));
		$Firstname = htmlentities(htmlspecialchars(urldecode($_POST['Firstname'])));
		$Middlename = htmlentities(htmlspecialchars(urldecode($_POST['Middlename'])));
		$date_hired = htmlentities(htmlspecialchars(urldecode($_POST['date_hired'])));
		$emp_status_1 = htmlentities(htmlspecialchars(urldecode($_POST['emp_status_1'])));
		$emp_status_2 = htmlentities(htmlspecialchars(urldecode($_POST['emp_status_2'])));
		
		$age = htmlentities(htmlspecialchars(urldecode($_POST['age'])));
		$civil_status = htmlentities(htmlspecialchars(urldecode($_POST['civil_status'])));
		$gender = htmlentities(htmlspecialchars(urldecode($_POST['gender'])));

		$birthday = htmlentities(htmlspecialchars(urldecode($_POST['birthday'])));
		$contact = htmlentities(htmlspecialchars(urldecode($_POST['contact'])));
		$course = htmlentities(htmlspecialchars(urldecode($_POST['course'])));
		$school = htmlentities(htmlspecialchars(urldecode($_POST['school'])));
		$contact_person = htmlentities(htmlspecialchars(urldecode($_POST['contact_person'])));
		$contact_person_num = htmlentities(htmlspecialchars(urldecode($_POST['contact_person_num'])));
		$contact_relation = htmlentities(htmlspecialchars(urldecode($_POST['contact_relation'])));

		$sss = htmlentities(htmlspecialchars(urldecode($_POST['sss'])));
		$TIN = htmlentities(htmlspecialchars(urldecode($_POST['TIN'])));
		$philhealth = htmlentities(htmlspecialchars(urldecode($_POST['philhealth'])));
		$pagibig = htmlentities(htmlspecialchars(urldecode($_POST['pagibig'])));

		$spouse = htmlentities(htmlspecialchars(urldecode($_POST['spouse'])));
		$spouse_bday = htmlentities(htmlspecialchars(urldecode($_POST['spouse_bday'])));
		$dependent1 = htmlentities(htmlspecialchars(urldecode($_POST['dependent1'])));
		$dependent1_bday = htmlentities(htmlspecialchars(urldecode($_POST['dependent1_bday'])));
		$dependent2 = htmlentities(htmlspecialchars(urldecode($_POST['dependent2'])));
		$dependent2_bday = htmlentities(htmlspecialchars(urldecode($_POST['dependent2_bday'])));
		$dependent3 = htmlentities(htmlspecialchars(urldecode($_POST['dependent3'])));
		$dependent3_bday = htmlentities(htmlspecialchars(urldecode($_POST['dependent3_bday'])));
		$dependent4 = htmlentities(htmlspecialchars(urldecode($_POST['dependent4'])));
		$dependent4_bday = htmlentities(htmlspecialchars(urldecode($_POST['dependent4_bday'])));

		$present_address = htmlentities(htmlspecialchars(urldecode($_POST['present_address'])));
		$permanent_address = htmlentities(htmlspecialchars(urldecode($_POST['permanent_address'])));

		$email = htmlentities(htmlspecialchars(urldecode($_POST['email'])));
		$reg_date = htmlentities(htmlspecialchars(urldecode($_POST['reg_date'])));
		


		$login = $insertdata->createEmployee($emp_id,$status,$position,$department,$Lastname,$Firstname,$Middlename,$date_hired,$emp_status_1,$emp_status_2, $age,$civil_status,$gender,$birthday,$contact,$course,$school,$contact_person,$contact_person_num,$contact_relation,$sss,$TIN,$philhealth,$pagibig,$spouse,$spouse_bday,$dependent1,$dependent1_bday,$dependent2,$dependent2_bday,$dependent3,$dependent3_bday,$dependent4,$dependent4_bday, $present_address, $permanent_address,$email,$reg_date);
	  	echo $login;
	}

	else if($pick == 15 ||$pick == "15" ||$pick=='15' ) {	//Login
		$emp_id = htmlentities(htmlspecialchars(urldecode($_POST['emp_id'])));
		$status = "Deactivated";

		$login = $insertdata->deactivateEmployeeAccount($emp_id,$status);
	  	echo $login;
	}

	else if($pick == 16 ||$pick == "16" ||$pick=='16' ) {	//Login
		$emp_id = htmlentities(htmlspecialchars(urldecode($_POST['emp_id'])));
		$status = "Active";

		$login = $insertdata->deactivateEmployeeAccount($emp_id,$status);
	  	echo $login;
	}

	else if($pick == 17 ||$pick == "17" ||$pick=='17' ) {	//Login
		$emp_id = htmlentities(htmlspecialchars(urldecode($_POST['emp_id'])));

		$login = $insertdata->changedEmployeeAccount($emp_id);
	  	echo $login;
	}

	else if($pick == 18 ||$pick == "18" ||$pick=='18' ) {	//Login
		$leave_description = htmlentities(htmlspecialchars(urldecode($_POST['leave_description'])));
		$leave_Count = htmlentities(htmlspecialchars(urldecode($_POST['leave_Count'])));
		$earned = htmlentities(htmlspecialchars(urldecode($_POST['earned'])));
		$login = $insertdata->createLeaveType($leave_description, $leave_Count, $earned);
	  	echo $login;
	}
	
	else if($pick == 19 ||$pick == "19" ||$pick=='19' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));

		$login = $insertdata->deleteLeaveType($id);
	  	echo $login;
	}

	else if($pick == 19 ||$pick == "19" ||$pick=='19' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));

		$login = $insertdata->deleteLeaveType($id);
	  	echo $login;
	}
	else if($pick == 20 ||$pick == "20" ||$pick=='20' ) {	//Login
		$emp_id = htmlentities(htmlspecialchars(urldecode($_POST['emp_id'])));
		$selected = htmlentities(htmlspecialchars(urldecode($_POST['selected'])));

		$login = $insertdata->saveLeaveRequest($emp_id,$selected);
	  	echo $login;
	}

	else if($pick == 21 ||$pick == "21" ||$pick=='21' ) {	//Login

		$emp_id = htmlentities(htmlspecialchars(urldecode($_POST['emp_id'])));
		$documentTypes = htmlentities(htmlspecialchars(urldecode($_POST['documentTypes'])));
		$filename = $_FILES['myfile']['name'];


		$status = htmlentities(htmlspecialchars(urldecode($_POST['status'])));

		$checkFileName = $insertdata->checkFileName($filename);


		if($checkFileName == "nonexisted"){
			$destination = 'C:/xampp/htdocs/hris/admin/pages/uploads/' . $filename;
			$extension = pathinfo($filename, PATHINFO_EXTENSION);

			$file = $_FILES['myfile']['tmp_name'];

			if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
				echo "You file extension must be .zip, .pdf or .docx";
			} else {
				if (move_uploaded_file($file, $destination)) {
					$login = $insertdata->saveFileRequest($emp_id, $documentTypes, $filename,$status);
		  		 	echo $login;
				} else {
					echo "Failed to upload file.";
				}
			}	
		} else {
			echo "File All Ready Exist!!";
		}
		
	}

	else if($pick == 22 ||$pick == "22" ||$pick=='22' ) {	//Login
		$nfID = "NP-".strtotime($date);
		$emp_id = htmlentities(htmlspecialchars(urldecode($_POST['employee_id'])));
		$notification = htmlentities(htmlspecialchars(urldecode($_POST['notification'])));
		$date_filed = htmlentities(htmlspecialchars(urldecode($_POST['date_filed'])));		
		$firstapprover = htmlentities(htmlspecialchars(urldecode($_POST['firstapprover'])));	
		$secondapprover = htmlentities(htmlspecialchars(urldecode($_POST['secondapprover'])));	
		$login = $insertdata->saveNotifPass($emp_id, $notification, $date_filed, $nfID, $firstapprover ,$secondapprover);
	  	echo $login;
	}

	else if($pick == 23 ||$pick == "23" ||$pick=='23' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status = 'Rejected';		
		$login = $insertdata->rejectFinalApprover($id,$status);
	  	echo $login;
	}

	else if($pick == 24 ||$pick == "24" ||$pick=='24' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status = 'Approved';		
		$login = $insertdata->rejectFinalApprover($id,$status);
	  	echo $login;
	}
	else if($pick == 25 ||$pick == "25" ||$pick=='25' ) {	//Login
		$OBID = "OB - ".strtotime($date);
		$emp_id = htmlentities(htmlspecialchars(urldecode($_POST['employee_id'])));
		$date_filed = htmlentities(htmlspecialchars(urldecode($_POST['date_filed'])));
		$notification = htmlentities(htmlspecialchars(urldecode($_POST['notification'])));
		$timein = htmlentities(htmlspecialchars(urldecode($_POST['timein'])));
		$timeout = htmlentities(htmlspecialchars(urldecode($_POST['timeout'])));
		$destination = htmlentities(htmlspecialchars(urldecode($_POST['destination'])));
	
		$login = $insertdata->saveOB($OBID,$emp_id, $date_filed,$notification,$timein,$timeout,$destination);
	  	echo $login;
	}

	else if($pick == 26 ||$pick == "26" ||$pick=='26' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status = 'Rejected';		
		$login = $insertdata->rejectFinalApproverOB($id,$status);
	  	echo $login;
	}

	else if($pick == 27 ||$pick == "27" ||$pick=='27' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status = 'Approved';		
		$login = $insertdata->rejectFinalApproverOB($id,$status);
	  	echo $login;
	}

	else if($pick == 28 ||$pick == "28" ||$pick=='28' ) {	//Login
		$OTID = "OT - ".strtotime($date);		
		$emp_id = htmlentities(htmlspecialchars(urldecode($_POST['employee_id'])));
		$date_filed = htmlentities(htmlspecialchars(urldecode($_POST['date_filed'])));
		$hours = htmlentities(htmlspecialchars(urldecode($_POST['hours'])));
		$notification = htmlentities(htmlspecialchars(urldecode($_POST['notification'])));
		$date_filed_to = htmlentities(htmlspecialchars(urldecode($_POST['date_filed_to'])));
		$login = $insertdata->saveOT($OTID,$emp_id,$date_filed,$hours,$notification,$date,$date_filed_to);
	  	echo $login;
	}

	else if($pick == 29 ||$pick == "29" ||$pick=='29' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status = 'Rejected';		
		$login = $insertdata->rejectFinalApproverOT($id,$status);
	  	echo $login;
	}

	else if($pick == 30 ||$pick == "30" ||$pick=='30' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status = 'Approved';		
		$login = $insertdata->rejectFinalApproverOT($id,$status);
	  	echo $login;
	}

	else if($pick == 31 ||$pick == "31" ||$pick=='31' ) {	//Login
		$change_shift = htmlentities(htmlspecialchars(urldecode($_POST['change_shift'])));

		if ($change_shift == "Change Shift"){
			$unique_id = "CS-" . strtotime($date);
		} else if ($change_shift == "No Overtime"){
			$unique_id = "NO-" . strtotime($date);
		}else if ($change_shift == "Undertime"){
			$unique_id = "UT-" . strtotime($date);
		}else if ($change_shift == "Early Out"){
			$unique_id = "EO-" . strtotime($date);
		}
		$date_filed = htmlentities(htmlspecialchars(urldecode($_POST['date_filed'])));
		$employee_id = htmlentities(htmlspecialchars(urldecode($_POST['employee_id'])));
		$change_shiftfrom = htmlentities(htmlspecialchars(urldecode($_POST['change_shiftfrom'])));
		$change_shiftto = htmlentities(htmlspecialchars(urldecode($_POST['change_shiftto'])));
		$rep_employee_id = htmlentities(htmlspecialchars(urldecode($_POST['rep_employee_id'])));
		$rep_shiftfrom = htmlentities(htmlspecialchars(urldecode($_POST['rep_shiftfrom'])));
		$rep_shiftto = htmlentities(htmlspecialchars(urldecode($_POST['rep_shiftto'])));
		$notification = htmlentities(htmlspecialchars(urldecode($_POST['notification'])));

		$login = $insertdata->saveChangeShift($date_filed, $change_shift, $unique_id, $employee_id, $change_shiftfrom, $change_shiftto, $rep_employee_id, $rep_shiftfrom, $rep_shiftto, $notification);
	  	echo $login;
	}

	else if($pick == 32 ||$pick == "32" ||$pick=='32' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status = 'Approved';		
		$login = $insertdata->rejectFinalApproverCS($id,$status);
	  	echo $login;
	}

	else if($pick == 33 ||$pick == "33" ||$pick=='33' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status = 'Rejected';		
		$login = $insertdata->rejectFinalApproverCS($id,$status);
	  	echo $login;
	}

	else if($pick == 34 ||$pick == "34" ||$pick=='34' ) {	//Login
		$leaveID = "LID-".strtotime($date);
		$employee_id = htmlentities(htmlspecialchars(urldecode($_POST['employee_id'])));	
		$leave = htmlentities(htmlspecialchars(urldecode($_POST['leave'])));	
		$start_date = htmlentities(htmlspecialchars(urldecode($_POST['start_date'])));	
		$end_date = htmlentities(htmlspecialchars(urldecode($_POST['end_date'])));	
		$description_reason = htmlentities(htmlspecialchars(urldecode($_POST['description'])));	
		$date = htmlentities(htmlspecialchars(urldecode($_POST['date'])));	
		
		$date1 = strtotime($start_date);
		$date2 = strtotime($end_date);
		$diff = $date2 - $date1;
		$days = floor($diff / (60 * 60 * 24))+1;
		
 		if($date == "2"){
 			if($days > 1){
 				$login = "2";
 			} else {
		 		$days = floor($diff / (60 * 60 * 24))+0.5;
				$login = $insertdata->requestLeave($leaveID,$employee_id,$leave,$start_date,$days,$end_date,$description_reason);
 			}
 		} else {
			$login = $insertdata->requestLeave($leaveID,$employee_id,$leave,$start_date,$days,$end_date,$description_reason);
 		}

		echo $login;
	}

	else if($pick == 35 ||$pick == "35" ||$pick=='35' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status = 'Approved';		
		$login = $insertdata->rejectFinalApproverLeave($id,$status);
	  	echo $login;
	}

	else if($pick == 36 ||$pick == "36" ||$pick=='36' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status = 'Rejected';		
		$login = $insertdata->rejectFinalApproverLeave($id,$status);
	  	echo $login;
	}

	else if($pick == 37 ||$pick == "37" ||$pick=='37' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status = 'Approved';		
		$login = $insertdata->HRrejectFinalApproverLeave($id,$status);
	  	echo $login;
	}

	else if($pick == 38 ||$pick == "38" ||$pick=='38' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status = 'Rejected';		
		$login = $insertdata->HRrejectFinalApproverLeave($id,$status);
	  	echo $login;
	}

	else if($pick == 39 ||$pick == "39" ||$pick=='39' ) {	//Login

		$leave_id = htmlentities(htmlspecialchars(urldecode($_POST['leave_id'])));	
		$leave_desc = htmlentities(htmlspecialchars(urldecode($_POST['leave_desc'])));	
		$leave_count = htmlentities(htmlspecialchars(urldecode($_POST['leave_count'])));	
		$earnable = htmlentities(htmlspecialchars(urldecode($_POST['earnable'])));	
		
		$login = $insertdata->saveEdittedLeave($leave_id,$leave_desc,$leave_count,$earnable);
	  	echo $login;
	}
	
	else if($pick == 40 ||$pick == "40" ||$pick=='40' ) {	//Login

		$value = "0";	
		
		$login = $insertdata->clearLeave($value);
	  	echo $login;
	}
	else if($pick == 41 ||$pick == "41" ||$pick=='41' ) {	//Login
		$emp_id = htmlentities(htmlspecialchars(urldecode($_POST['emp_id'])));
		$position = htmlentities(htmlspecialchars(urldecode($_POST['position'])));
		$department = htmlentities(htmlspecialchars(urldecode($_POST['department'])));
		$Lastname = htmlentities(htmlspecialchars(urldecode($_POST['Lastname'])));
		$Firstname = htmlentities(htmlspecialchars(urldecode($_POST['Firstname'])));
		$Middlename = htmlentities(htmlspecialchars(urldecode($_POST['Middlename'])));
		$date_hired = htmlentities(htmlspecialchars(urldecode($_POST['date_hired'])));
		$emp_status_1 = htmlentities(htmlspecialchars(urldecode($_POST['emp_status_1'])));
		$emp_status_2 = htmlentities(htmlspecialchars(urldecode($_POST['emp_status_2'])));
		
		$age = htmlentities(htmlspecialchars(urldecode($_POST['age'])));
		$civil_status = htmlentities(htmlspecialchars(urldecode($_POST['civil_status'])));
		$gender = htmlentities(htmlspecialchars(urldecode($_POST['gender'])));

		$birthday = htmlentities(htmlspecialchars(urldecode($_POST['birthday'])));
		$contact = htmlentities(htmlspecialchars(urldecode($_POST['contact'])));
		$course = htmlentities(htmlspecialchars(urldecode($_POST['course'])));
		$school = htmlentities(htmlspecialchars(urldecode($_POST['school'])));
		$contact_person = htmlentities(htmlspecialchars(urldecode($_POST['contact_person'])));
		$contact_person_num = htmlentities(htmlspecialchars(urldecode($_POST['contact_person_num'])));
		$contact_relation = htmlentities(htmlspecialchars(urldecode($_POST['contact_relation'])));

		$sss = htmlentities(htmlspecialchars(urldecode($_POST['sss'])));
		$TIN = htmlentities(htmlspecialchars(urldecode($_POST['TIN'])));
		$philhealth = htmlentities(htmlspecialchars(urldecode($_POST['philhealth'])));
		$pagibig = htmlentities(htmlspecialchars(urldecode($_POST['pagibig'])));

		$spouse = htmlentities(htmlspecialchars(urldecode($_POST['spouse'])));
		$spouse_bday = htmlentities(htmlspecialchars(urldecode($_POST['spouse_bday'])));
		$dependent1 = htmlentities(htmlspecialchars(urldecode($_POST['dependent1'])));
		$dependent1_bday = htmlentities(htmlspecialchars(urldecode($_POST['dependent1_bday'])));
		$dependent2 = htmlentities(htmlspecialchars(urldecode($_POST['dependent2'])));
		$dependent2_bday = htmlentities(htmlspecialchars(urldecode($_POST['dependent2_bday'])));
		$dependent3 = htmlentities(htmlspecialchars(urldecode($_POST['dependent3'])));
		$dependent3_bday = htmlentities(htmlspecialchars(urldecode($_POST['dependent3_bday'])));
		$dependent4 = htmlentities(htmlspecialchars(urldecode($_POST['dependent4'])));
		$dependent4_bday = htmlentities(htmlspecialchars(urldecode($_POST['dependent4_bday'])));

		$endDate = htmlentities(htmlspecialchars(urldecode($_POST['endDate'])));


		$firstapprover = htmlentities(htmlspecialchars(urldecode($_POST['firstapprover'])));
		$finalapprover = htmlentities(htmlspecialchars(urldecode($_POST['finalapprover'])));



		$present_address = htmlentities(htmlspecialchars(urldecode($_POST['present_address'])));
		$permanent_address = htmlentities(htmlspecialchars(urldecode($_POST['permanent_address'])));

		$email = htmlentities(htmlspecialchars(urldecode($_POST['email'])));
		$reg_date = htmlentities(htmlspecialchars(urldecode($_POST['reg_date'])));
		$filename= $_FILES['myfile']['name'];

		if($filename == '') {
			$file = $insertdata->checkifExist($emp_id);
			
			$login = $insertdata->editEmployee($emp_id,$position,$department,$Lastname,$Firstname,$Middlename,$date_hired,$emp_status_1,$emp_status_2, $age,$civil_status,$gender,$birthday,$contact,$course,$school,$contact_person,$contact_person_num,$contact_relation,$sss,$TIN,$philhealth,$pagibig,$spouse,$spouse_bday,$dependent1,$dependent1_bday,$dependent2,$dependent2_bday,$dependent3,$dependent3_bday,$dependent4,$dependent4_bday, $present_address, $permanent_address,$email,$reg_date, $file,$endDate,$firstapprover , $finalapprover);
		   echo $login;


		} else {
			$destination = 'C:/xampp/htdocs/hris/admin/pages/img/' . $filename;
			$extension = pathinfo($filename, PATHINFO_EXTENSION);

			$file = $_FILES['myfile']['tmp_name'];

			if($insertdata->duplicateFile($filename) == "0") {

				if (!in_array($extension, ['jpg','png','jpeg','PNG','JPG','JPEG'])) {
						echo "You file extension must be .jpg, .png or .jpeg";
				} else {
					if (move_uploaded_file($file, $destination)) {

						$login = $insertdata->editEmployee($emp_id,$position,$department,$Lastname,$Firstname,$Middlename,$date_hired,$emp_status_1,$emp_status_2, $age,$civil_status,$gender,$birthday,$contact,$course,$school,$contact_person,$contact_person_num,$contact_relation,$sss,$TIN,$philhealth,$pagibig,$spouse,$spouse_bday,$dependent1,$dependent1_bday,$dependent2,$dependent2_bday,$dependent3,$dependent3_bday,$dependent4,$dependent4_bday, $present_address, $permanent_address,$email,$reg_date, $filename,$endDate,$firstapprover , $finalapprover);
			  			echo $login;
			  			
					} else {
						echo "Failed to upload file.";
					}
				}
			} else {
				echo "File Name already exist, please change the name of the file you want to upload!!";
			}

		}


	}


	else if($pick == 42 ||$pick == "42" ||$pick=='42' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status = 'Approved';		
		$login = $insertdata->SpecialRequest($id,$status);
	  	echo $login;
	}

	else if($pick == 43 ||$pick == "43" ||$pick=='43' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status = 'Reject';		
		$login = $insertdata->SpecialRequest($id,$status);
	  	echo $login;
	}

	else if($pick == 44 ||$pick == "44" ||$pick=='44' ) {	//Login
		$leave_description = htmlentities(htmlspecialchars(urldecode($_POST['leave_description'])));	
		$status = 'Reject';		
		$login = $insertdata->createAnnouncement($leave_description);
	  	echo $login;
	}

	else if($pick == 45 ||$pick == "45" ||$pick=='45' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status = 'Reject';		
		$login = $insertdata->editAnnouncement($id);
	  	echo $login;
	}

	else if($pick == 46 ||$pick == "46" ||$pick=='46' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status = htmlentities(htmlspecialchars(urldecode($_POST['status'])));	
		$resolution = htmlentities(htmlspecialchars(urldecode($_POST['resolution'])));	
		$date_encyp = strtotime(date("Y-m-d H:i:s"));
	
		$login = $insertdata->editITConcern($id,$status,$resolution, $date_encyp);
	  	echo $login;
	}

	else if($pick == 47 ||$pick == "47" ||$pick=='47' ) {	//Login

		$date_filed = htmlentities(htmlspecialchars(urldecode($_POST['date_filed'])));	
		$employee_id = htmlentities(htmlspecialchars(urldecode($_POST['employee_id'])));	
		$department = htmlentities(htmlspecialchars(urldecode($_POST['department'])));	
		$assetTag = htmlentities(htmlspecialchars(urldecode($_POST['assetTag'])));	
		$assetDesc = htmlentities(htmlspecialchars(urldecode($_POST['assetDesc'])));	

		$date_encyp = strtotime($date_filed);
	
		$login = $insertdata->addAssets($employee_id,$department,$assetTag, $assetDesc, $date_encyp);
	  	echo $login;
	}

	else if($pick == 48 ||$pick == "48" ||$pick=='48' ) {	//Login

		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$Asset = htmlentities(htmlspecialchars(urldecode($_POST['Asset'])));	
		$location = htmlentities(htmlspecialchars(urldecode($_POST['location'])));	
		$employee_id = htmlentities(htmlspecialchars(urldecode($_POST['employee_id'])));	
		$status = htmlentities(htmlspecialchars(urldecode($_POST['status'])));	
		$description = htmlentities(htmlspecialchars(urldecode($_POST['description'])));	

	
		$login = $insertdata->editAssets($id,$Asset,$location,$employee_id, $status,$description);
	  	echo $login;
	}

	else if($pick == 49 ||$pick == "49" ||$pick=='49' ) {	//Login
		$date_filed = htmlentities(htmlspecialchars(urldecode($_POST['date_filed'])));	
		$employee_id = htmlentities(htmlspecialchars(urldecode($_POST['employee_id'])));	
		$department = htmlentities(htmlspecialchars(urldecode($_POST['department'])));	
		$assetTag = htmlentities(htmlspecialchars(urldecode($_POST['assetTag'])));	
		$assetDesc = htmlentities(htmlspecialchars(urldecode($_POST['assetDesc'])));	
		$date_encyp = strtotime($date_filed);
	
		$login = $insertdata->addMaterials($employee_id,$department,$assetTag, $assetDesc, $date_encyp);
	  	echo $login;
	
	}

	else if($pick == 50 ||$pick == "50" ||$pick=='50' ) {	//Login

		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$Asset = htmlentities(htmlspecialchars(urldecode($_POST['Asset'])));	
		$location = htmlentities(htmlspecialchars(urldecode($_POST['location'])));	
		$employee_id = htmlentities(htmlspecialchars(urldecode($_POST['employee_id'])));	
		$status = htmlentities(htmlspecialchars(urldecode($_POST['status'])));	
		$description = htmlentities(htmlspecialchars(urldecode($_POST['description'])));	

	
		$login = $insertdata->editMatrial($id,$Asset,$location,$employee_id, $status,$description);
	  	echo $login;
	}
	else if($pick == 51 ||$pick == "51" ||$pick=='51' ) {	//Login
	 	$selected = htmlentities(htmlspecialchars(urldecode($_POST['selected'])));
	 	$rawdata = explode(",", $selected);

		$status = "Approved";		
		if (is_array($rawdata) || is_object($rawdata)) {				
			foreach($rawdata as $datas){
				$login = $insertdata->HRrejectFinalApproverLeave($datas,$status);
			}
		} else {
			$login = "0";
		}
		echo $login;
	}
	else if($pick == 52 ||$pick == "52" ||$pick=='52' ) {	//Login
		$date_filed = htmlentities(htmlspecialchars(urldecode($_POST['date_filed'])));
		$status = htmlentities(htmlspecialchars(urldecode($_POST['status'])));
		$type = htmlentities(htmlspecialchars(urldecode($_POST['type'])));
		$optionsSelect = htmlentities(htmlspecialchars(urldecode($_POST['optionsSelect'])));
		$login = $insertdata->addEntranceQuestion($date_filed,$status,$type,$optionsSelect);
		echo $login;
   }
   else if($pick == 53 ||$pick == "53" ||$pick=='53' ) {	//Login
		$employee_id = htmlentities(htmlspecialchars(urldecode($_POST['employee_id'])));
		$startDate = htmlentities(htmlspecialchars(urldecode($_POST['startDate'])));
		$endDate = htmlentities(htmlspecialchars(urldecode($_POST['endDate'])));
		$dateRange = $insertdata->getDatesFromRange( $startDate, $endDate); 
		foreach($dateRange as $result) {
			$insertdata->getDatesforData( $employee_id, $result);
			echo $result ;
		}
	}
   else if($pick == 54 ||$pick == "54" ||$pick=='54' ) {	//Login
   			$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));
   			echo $result= $insertdata->deleteInformation($id);
	}
    else if($pick == 55 ||$pick == "55" ||$pick=='55' ) {	//Login

    	$targetDir = "C:/xampp/htdocs/hris/admin/pages/uploads/";
		$documentTypes = htmlentities(htmlspecialchars(urldecode($_POST['documentTypes'])));
    
 		   $username = htmlspecialchars($_POST['employee_id']);
 		   // $documentTypes = "";
		    $totalFiles = count($_FILES['files']['name']);		
		    for ($i = 0; $i < $totalFiles; $i++) {
		        // Get the file name and temporary file path
		        $fileName = basename($_FILES['files']['name'][$i]);
		        $tempFilePath = $_FILES['files']['tmp_name'][$i];
		        $targetFilePath = $targetDir . $fileName;		
		        if ($_FILES['files']['error'][$i] === UPLOAD_ERR_OK) {
		            if (move_uploaded_file($tempFilePath, $targetFilePath)) {
		                $response['files'][] = $fileName;
		                $login = $insertdata->saveFileRequest($username, $documentTypes, $fileName);
		            } else {
		                $response['message'] .= "Error uploading file " . $fileName . ".<br>";
		            }
		        } else {
		            $response['message'] .= "Error with file " . $fileName . ": " . $_FILES['files']['error'][$i] . "<br>";
		        }
		    }		

		    if (empty($response['message'])) {
		        $response['success'] = true;
		        $response['message'] = "All files uploaded successfully.";
		    }

		echo json_encode($response);
	
	}
    else if($pick == 56 ||$pick == "56" ||$pick=='56' ) {
    	$id = htmlentities(htmlspecialchars(urldecode($_POST['id']))); 
		$data = $insertdata->retrieveSchedule($id);
		echo json_encode($data);
	}
 
    else if($pick == 57 ||$pick == "57" ||$pick=='57' ) {
		$documentID = htmlentities(htmlspecialchars(urldecode($_POST['documentID'])));
		$documentTypes1 = htmlentities(htmlspecialchars(urldecode($_POST['documentTypes1'])));
		$documentName = htmlentities(htmlspecialchars(urldecode($_POST['documentName'])));

		$status = htmlentities(htmlspecialchars(urldecode($_POST['status'])));


		$DON = $insertdata->getDocumentName($documentID);
		$targetOld = "C:/xampp/htdocs/hris/admin/pages/uploads/" . $DON;
		$targetNew = "C:/xampp/htdocs/hris/admin/pages/uploads/" . $documentName;

		$data = $insertdata->editDocumentTypes($documentID, $documentTypes1,$documentName,$DON,$targetOld,$targetNew,$status );
		echo $data;
	}

	else if($pick == 58 ||$pick == "58" ||$pick=='58' ) {

		$examType = htmlentities(htmlspecialchars(urldecode($_POST['examType'])));
		$questionType = htmlentities(htmlspecialchars(urldecode($_POST['questionType'])));
		$question = htmlentities(htmlspecialchars(urldecode($_POST['question'])));
		$questionEssay = htmlentities(htmlspecialchars(urldecode($_POST['questionEssay'])));

		$answerBox = htmlentities(htmlspecialchars(urldecode($_POST['answerBox'])));
		$answerImageBox = htmlentities(htmlspecialchars(urldecode($_POST['answerImageBox'])));
		$radioBox = htmlentities(htmlspecialchars(urldecode($_POST['radioBox'])));

		$imageFiles = str_replace(' ', '', htmlentities(htmlspecialchars(urldecode($_POST['imageFiles']))));


		if($questionType == '1'){
			$insertdata->insertMultipleChoise($examType, $questionType,$question,$answerBox,$radioBox,$date);
			$data = "Successfully Added!";
		} else if($questionType == '2') {

			    $targetDir = "C:/xampp/htdocs/hris/admin/pages/examUpload/";			
    			$uploadedFiles = [];
			
			    foreach ($_FILES as $key => $file) {
      			  // Define the target directory where you want to save the files

			        // Get the file's temporary location and original name
			        $tempFile = $file['tmp_name'];
			        $fileName = basename($file['name']);
			        $targetFile = $targetDir . $fileName;			

			        // Check for any file upload errors
			        if ($file['error'] !== UPLOAD_ERR_OK) {
			            $errors[] = "Error uploading file $fileName.";
			            continue; // Skip to the next file if there is an error
			        }			

			        // Optionally, check the file type and size
			        $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
			        if (!in_array($file['type'], $allowedTypes)) {
			            $errors[] = "File type not allowed for $fileName.";
			            continue;
			        }			

			        if ($file['size'] > 5000000) { // 5MB size limit
			            $errors[] = "$fileName is too large.";
			            continue;
			        }			

			        // Move the uploaded file to the target directory
			        if (move_uploaded_file($tempFile, $targetFile)) {
			        	$uploadedFiles[] = ['fileName' => $fileName];
			        	// $data = "Successfully Added!";
			        } else {
			            $errors[] = "Failed to upload $fileName.";
			        }
			    }

			    $insertFile = [];
			    // Insert uploaded file information into the database
			    if (!empty($uploadedFiles)) {
			        foreach ($uploadedFiles as $fileData) {
			           $insertFile[] = $fileData['fileName'];
			        }

			        $forInsert = implode(", ", $insertFile);
			       	$sql = $insertdata->insertMultipleChoise($examType, $questionType,$question,$forInsert,$radioBox,$date);
						
					if(!$sql){
						$errors[] = "Failed to insert $fileName into the database.";
					} else {
						$data = "Successfully Added!";
					}
			    }			

		} else if($questionType == '3'){
			$insertdata->inserEssay($examType, $questionType,$questionEssay,$date);
			$data = "Successfully Added!";
		} else {
			$data = "Problem Encountered, Please try again Later!";
		}
		echo $data;
	
	}

	else if($pick == 59 ||$pick == "59" ||$pick=='59' ) {
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));
		$status = '0';
		$data = $insertdata->deleteExamQuestion($id, $status);
		echo $data;	
	}

	else if($pick == 60 ||$pick == "60" ||$pick=='60' ) {
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));
		$question = htmlentities(htmlspecialchars(urldecode($_POST['question'])));
		$answerBox = htmlentities(htmlspecialchars(urldecode($_POST['answerBox'])));
		$radioBox = htmlentities(htmlspecialchars(urldecode($_POST['radioBox'])));
		$type = htmlentities(htmlspecialchars(urldecode($_POST['type'])));

		if($type == '1'){

		} else if($type == '2') {

		} else if($type == '3') {
			$data = $insertdata->changeEssayQuestion($id, $question);	
		}

		echo $data;
	}
	else if($pick == 61 ||$pick == "61" ||$pick=='61' ) {

		$firstapprover = htmlentities(htmlspecialchars(urldecode($_POST['firstapprover'])));
		$secondapprover = htmlentities(htmlspecialchars(urldecode($_POST['secondapprover'])));
		$finalInterview = '426';
		$applicant_id = htmlentities(htmlspecialchars(urldecode($_POST['applicant_id'])));
		$status = "Pending";

		$data = $insertdata->settosecondInterview($firstapprover, $applicant_id, $status,$secondapprover,$finalInterview);	

		echo $data;
	
	}

	else if ($pick == 62 ||$pick == "62" ||$pick=='62') {
		$employeeId = htmlentities(htmlspecialchars(urldecode($_POST['employeeId'])));
		$password = base64_encode($employeeId);
		$firstName = htmlentities(htmlspecialchars(urldecode($_POST['firstName'])));
		$MiddleName = htmlentities(htmlspecialchars(urldecode($_POST['MiddleName'])));
		$lastName = htmlentities(htmlspecialchars(urldecode($_POST['lastName'])));
		$dateHired = htmlentities(htmlspecialchars(urldecode($_POST['dateHired'])));
		$emp_status_1 = htmlentities(htmlspecialchars(urldecode($_POST['emp_status_1'])));
		$emp_status_2 = htmlentities(htmlspecialchars(urldecode($_POST['emp_status_2'])));
		$civilstatus = htmlentities(htmlspecialchars(urldecode($_POST['civilstatus'])));
		$gender = htmlentities(htmlspecialchars(urldecode($_POST['gender'])));
		$birthday = htmlentities(htmlspecialchars(urldecode($_POST['birthday'])));
		$phone = htmlentities(htmlspecialchars(urldecode($_POST['phone'])));
		$contactPersonRel = htmlentities(htmlspecialchars(urldecode($_POST['contactPersonRel'])));
		$contactContactnum = htmlentities(htmlspecialchars(urldecode($_POST['contactContactnum'])));
		$contactRelation = htmlentities(htmlspecialchars(urldecode($_POST['contactRelation'])));
		$sss = htmlentities(htmlspecialchars(urldecode($_POST['sss'])));
		$tin = htmlentities(htmlspecialchars(urldecode($_POST['tin'])));
		$philhealth = htmlentities(htmlspecialchars(urldecode($_POST['philhealth'])));
		$pagibig = htmlentities(htmlspecialchars(urldecode($_POST['pagibig'])));
		$completecurrentaddress = htmlentities(htmlspecialchars(urldecode($_POST['completecurrentaddress'])));
		$completeprobaddress = htmlentities(htmlspecialchars(urldecode($_POST['completeprobaddress'])));
		$status = "Active";
		$applicant_id = htmlentities(htmlspecialchars(urldecode($_POST['applicant_id'])));

		$educationalBox1 = htmlentities(htmlspecialchars(urldecode($_POST['educationalBox1'])));

		$positions = htmlentities(htmlspecialchars(urldecode($_POST['positions'])));
		$departments = htmlentities(htmlspecialchars(urldecode($_POST['departments'])));
		$firstapprover = htmlentities(htmlspecialchars(urldecode($_POST['firstapprover'])));
		$finalapprover = htmlentities(htmlspecialchars(urldecode($_POST['finalapprover'])));


		$arrTextBox1 = htmlentities(htmlspecialchars(urldecode($_POST['arrTextBox1'])));
 		$array = explode(",", $arrTextBox1 );

 		$educational = explode(",", $educationalBox1 );


 		if($educational[21] != "" && $educational[24] != "") {
 			$course = $educational[21];
 			$school = $educational[24];
 		} else if($educational[16] != "" && $educational[19] != "") {
 			$course = $educational[16];
 			$school = $educational[19];
 		} else if($educational[11] != "" && $educational[14] != "") {
 			$course = $educational[11];
 			$school = $educational[14];
 		} else if($educational[6] != "" && $educational[9] != "") {
 			$course = $educational[6];
 			$school = $educational[9];
 		} else if($educational[1] != "" && $educational[4] != "") {
 			$course = $educational[1];
 			$school = $educational[4];
 		}
		$data = $insertdata->addtoexmployee($employeeId,$password,$firstName,$MiddleName,$lastName,$dateHired,$emp_status_1,$emp_status_2,$civilstatus,$gender,$birthday,$phone,$contactPersonRel,$contactContactnum,$contactRelation,$sss,$tin,$philhealth,$pagibig,$completecurrentaddress,$completeprobaddress,$status,$applicant_id,$array[11],$array[12],$array[21],$array[22],$array[26],$array[27],$array[31],$array[32],$array[36],$array[37],$course,$school,$positions,$departments,$firstapprover,$finalapprover
		);	
		echo $data;

	}

	else if ($pick == 63 ||$pick == "63" ||$pick=='63') {
		$employee_id = htmlentities(htmlspecialchars(urldecode($_POST['employee_id'])));
		$sql=$insertdata->GetEmployeeWorkInfo($employee_id);
		echo json_encode(array('position'=>$sql['0'], 'department'=>$sql['1']));
	}

	else if ($pick == 64 ||$pick == "64" ||$pick=='64') {
		$employee_id = htmlentities(htmlspecialchars(urldecode($_POST['employee_id'])));
		$jobTitle = htmlentities(htmlspecialchars(urldecode($_POST['jobTitle'])));
		$training = htmlentities(htmlspecialchars(urldecode($_POST['training'])));
		$startDate = htmlentities(htmlspecialchars(urldecode($_POST['startDate'])));
		$completionDate = htmlentities(htmlspecialchars(urldecode($_POST['completionDate'])));
		$trainer1 = htmlentities(htmlspecialchars(urldecode($_POST['trainer1'])));
		$trainer2 = htmlentities(htmlspecialchars(urldecode($_POST['trainer2'])));
		$trainer3 = htmlentities(htmlspecialchars(urldecode($_POST['trainer3'])));
		$trainer4 = htmlentities(htmlspecialchars(urldecode($_POST['trainer4'])));
		$trainer5 = htmlentities(htmlspecialchars(urldecode($_POST['trainer5'])));
		$Annex = htmlentities(htmlspecialchars(urldecode($_POST['Annex'])));
		$AnnexComment = htmlentities(htmlspecialchars(urldecode($_POST['AnnexComment'])));

				$AnnexTrain = htmlentities(htmlspecialchars(urldecode($_POST['AnnexTrain'])));

		$status = 'Pending';
		$sql=$insertdata->CreateTrainingForPersonnel($employee_id,$jobTitle,$training,$startDate,$completionDate,$trainer1,$trainer2,$trainer3,$trainer4,$trainer5,$Annex,$status,$AnnexComment,$AnnexTrain);
		echo $sql;
	}

?>


