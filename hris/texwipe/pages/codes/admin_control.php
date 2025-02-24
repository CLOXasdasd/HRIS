<?php
			error_reporting(E_ALL);
	ini_set('display_errors', 0);

	date_default_timezone_set('Asia/Manila');
	$date=date("Y-m-d H:i:s");
	require_once'function.php';
 	 $emp_id = $_SESSION['emp_id'];
	$insertdata=new admin_creation();
	$approved_by = $_SESSION['name'];

	
// 	if($_SESSION['emp_id'] == "699"){
// $pick="18";
// 	} else {
	$pick=urldecode($_POST['pick']);	
	//}
	
		
	



 	if($pick == 1 ||$pick == "1" ||$pick=='1' ) {	//Login
	    $emp_id = htmlentities(htmlspecialchars(urldecode($_POST['uname']))) ;
	    $password = htmlentities(htmlspecialchars(urldecode($_POST['upass']))) ;
		
	    $login = $insertdata->check_login($emp_id, $password);

	    if ($login) {
	            echo '1';
	    } else {
	            echo '0';
	    }
	}

	else if($pick == 2 ||$pick == "2" ||$pick=='2' ) {	//Login50
		$oldPass = htmlentities(htmlspecialchars(urldecode($_POST['oldPass']))) ;
		$newPass = htmlentities(htmlspecialchars(urldecode($_POST['newPass']))) ;
		$username = htmlentities(htmlspecialchars(urldecode($_POST['username']))) ;


	    $check = $insertdata->ChangePassword($oldPass,$newPass,$username);
		echo $check;
	}

	else if($pick == 3 ||$pick == "3" ||$pick=='3' ) {	//Login
		$username = htmlentities(htmlspecialchars(urldecode($_POST['username']))) ;
		$name = htmlentities(htmlspecialchars(urldecode($_POST['name']))) ;
		$account_type = htmlentities(htmlspecialchars(urldecode($_POST['account_type']))) ;
		$email = htmlentities(htmlspecialchars(urldecode($_POST['email']))) ;
		$login = $insertdata->updateProfile($username,$name,$account_type,$email);
	  	echo $login;
	}

	else if($pick == 18 ||$pick == "18" ||$pick=='18' ) {	//Login


		// if($_SESSION['emp_id'] == "699"){
		// 	$firstapprover = "699";
		// 	$secondapprover =  "699";
		// 	$type= "Notification Pass";
		// 	$nfID = "NF-".strtotime($date);
		// 	$employee_id =  "699";
		// 	$date_filed =  "699";
		// 	$notification =  "699";
		// 	$status = 'Pending';
		// 	$dateFiled = strtotime(date("Y-m-d"));
		// 	$login = $insertdata->saveNotifPass1($nfID, $employee_id,$date_filed ,$notification, $status, $firstapprover, $secondapprover,$dateFiled);
			
		// 	 // if($firstapprover == ''){
		// 		$email = $insertdata->checkWorkEmail1($firstapprover, $type,$nfID);
		// 	// } else {
		// 	// 	$email = $insertdata->checkWorkEmail1($secondapprover, $type,$nfID);
		// 	// }

		//   	echo $email .$firstapprover;
	
		// } else {
			

			$firstapprover = htmlentities(htmlspecialchars(urldecode($_POST['firstapprover'])));
			$secondapprover = htmlentities(htmlspecialchars(urldecode($_POST['secondapprover'])));
			$type= "Notification Pass";
			$nfID = "NF-".strtotime($date);
			$employee_id = htmlentities(htmlspecialchars(urldecode($_POST['employee_id'])));
			$date_filed = htmlentities(htmlspecialchars(urldecode($_POST['date_filed'])));
			$notification = htmlentities(htmlspecialchars(urldecode($_POST['notification'])));
			$status = 'Pending';
			$dateFiled = strtotime(date("Y-m-d"));
			$login = $insertdata->saveNotifPass1($nfID, $employee_id,$date_filed ,$notification, $status, $firstapprover, $secondapprover,$dateFiled);
			

			// echo $firstapprover . " || " . $secondapprover;
			//  if($firstapprover == ''){
			// 	$email = $insertdata->checkWorkEmail1($firstapprover, $type,$nfID);
			// } else {
			// 	$email = $insertdata->checkWorkEmail1($secondapprover, $type,$nfID);
			// }

		  	echo $login;		

		// }


		
	}

	else if($pick == 19 ||$pick == "19" ||$pick=='19' ) {	//Login
		$OTID = "OT - ".strtotime($date);		
		$emp_id = htmlentities(htmlspecialchars(urldecode($_POST['employee_id'])));
		$date_filed = htmlentities(htmlspecialchars(urldecode($_POST['date_filed'])));
		$hours = htmlentities(htmlspecialchars(urldecode($_POST['hours'])));
		$notification = htmlentities(htmlspecialchars(urldecode($_POST['notification'])));
		$date_filed_to = htmlentities(htmlspecialchars(urldecode($_POST['date_filed_to'])));
		$login = $insertdata->saveOT($OTID,$emp_id,$date_filed,$hours,$notification,$date,$date_filed_to);
	  	echo $login;
	}

	else if($pick == 20 ||$pick == "20" ||$pick=='20' ) {	//Login
		$emp_id = htmlentities(htmlspecialchars(urldecode($_POST['emp_id'])));
		$selected = htmlentities(htmlspecialchars(urldecode($_POST['selected'])));

		$login = $insertdata->saveLeaveRequest($emp_id,$selected);
	  	echo $login;
	}

	else if($pick == 22 ||$pick == "22" ||$pick=='22' ) {	//Login
		$nfID = "IT-".strtotime($date);
		$emp_id = htmlentities(htmlspecialchars(urldecode($_POST['employee_id'])));
		$date_filed = htmlentities(htmlspecialchars(urldecode($_POST['date_filed'])));		
		$department = htmlentities(htmlspecialchars(urldecode($_POST['department'])));
		$concern = htmlentities(htmlspecialchars(urldecode($_POST['concern'])));

		$login = $insertdata->saveNotifPass($emp_id, $date_filed,$department,$concern, $nfID);
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

		
		$type= "Official Business";
		$OBID = "OB - ".strtotime($date);
		$emp_id = htmlentities(htmlspecialchars(urldecode($_POST['employee_id'])));
		$date_filed = htmlentities(htmlspecialchars(urldecode($_POST['date_filed'])));
		$notification = htmlentities(htmlspecialchars(urldecode($_POST['notification'])));
		$timein = htmlentities(htmlspecialchars(urldecode($_POST['timein'])));
		$timeout = htmlentities(htmlspecialchars(urldecode($_POST['timeout'])));
		$destination = htmlentities(htmlspecialchars(urldecode($_POST['destination'])));
		$dateFiled = strtotime(date("Y-m-d")) ;

		$login = $insertdata->saveOB($OBID,$emp_id, $date_filed,$notification,$timein,$timeout,$destination,$dateFiled);
		$email = $insertdata->checkWorkEmail($emp_id, $type,$OBID);
	
	  	echo $login;
	}

	else if($pick == 26 ||$pick == "26" ||$pick=='26' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
				$position = htmlentities(htmlspecialchars(urldecode($_POST['position'])));

		$status = 'Rejected';		

			if($position == "Business Unit Manager"){
			$login = $insertdata->rejectFinalOB($id,$status);
		} else {
					$login = $insertdata->rejectFinalApproverOB($id,$status);
		}


	  	echo $login;
	}

	else if($pick == 27 ||$pick == "27" ||$pick=='27' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$position = htmlentities(htmlspecialchars(urldecode($_POST['position'])));

		$type = "Official Business";
		$status = 'Approved';		

		if($position == "Business Unit Manager"){
			$login = $insertdata->rejectFinalOB($id,$status);
		} else {
			$login = $insertdata->rejectFinalApproverOB($id,$status);
			$email = $insertdata->CheckIfApprovedOB($id);			
			$check=$insertdata->checkifOBApprove($id);

			if($check == '0'){

				$data = $insertdata->sendSecondApprover($email, $type, $id);
			} 	
		}


	  	echo $login;
	}

	else if($pick == 28 ||$pick == "28" ||$pick=='28' ) {	//Login
		$type= "Overtime";
		$OTID = "OT - ".strtotime($date);		
		$emp_id = htmlentities(htmlspecialchars(urldecode($_POST['employee_id'])));
		$date_filed = htmlentities(htmlspecialchars(urldecode($_POST['date_filed'])));
		$hours = htmlentities(htmlspecialchars(urldecode($_POST['hours'])));
		$notification = htmlentities(htmlspecialchars(urldecode($_POST['notification'])));
		$date_filed_to = htmlentities(htmlspecialchars(urldecode($_POST['date_filed_to'])));
		$login = $insertdata->saveOT($OTID,$emp_id,$date_filed,$hours,$notification,$date,$date_filed_to);

		$email = $insertdata->checkWorkEmail($emp_id, $type, $OTID);
	  	echo $login;
	}

	else if($pick == 29 ||$pick == "29" ||$pick=='29' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status = 'Rejected';		
		$login = $insertdata->rejectFinalApproverOT($id,$status);
	  	echo $login;
	}

	else if($pick == 30 ||$pick == "30" ||$pick=='30' ) {	//Login
		$type = "Overtime";
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status = 'Approved';		
		$login = $insertdata->rejectFinalApproverOT($id,$status);

		$email = $insertdata->CheckIfApprovedOT($id);
		$check=$insertdata->checkifOTApprove($id);

		if($check == '0'){
			$data = $insertdata->sendSecondApprover($email, $type, $id);
		} 
	  	echo $login;
	}

	else if($pick == 31 ||$pick == "31" ||$pick=='31' ) {	//Login


	// if($emp_id == '699' || $emp_id == "699"){
	// 	echo "test";
 
		
	// 		$type = "Change Shift";
	// 		$unique_id = "CS-" . strtotime($date);
	
		
	
	// 	$employee_id = "699";
		




	// 	$email = $insertdata->checkWorkEmail($employee_id, $type,$unique_id);
	//   	echo $email;


	// } else {
		$change_shift = htmlentities(htmlspecialchars(urldecode($_POST['change_shift'])));

		if ($change_shift == "Change Shift"){
			$type = "Change Shift";
			$unique_id = "CS-" . strtotime($date);
		} else if ($change_shift == "No Overtime"){
			$type = "No Overtime";
			$unique_id = "NO-" . strtotime($date);		
		}else if ($change_shift == "Undertime"){
			$type = "Undertime";
			$unique_id = "UT-" . strtotime($date);
		}else if ($change_shift == "Early Out"){
			$type = "Early Out";
			$unique_id = "EO-" . strtotime($date);
		}
		
		$date_filed1 = htmlentities(htmlspecialchars(urldecode($_POST['date_filed1'])));
		$date_filed = htmlentities(htmlspecialchars(urldecode($_POST['date_filed'])));
		$employee_id = htmlentities(htmlspecialchars(urldecode($_POST['employee_id'])));
		$change_shiftfrom = htmlentities(htmlspecialchars(urldecode($_POST['change_shiftfrom'])));
		$change_shiftto = htmlentities(htmlspecialchars(urldecode($_POST['change_shiftto'])));
		$rep_employee_id = htmlentities(htmlspecialchars(urldecode($_POST['rep_employee_id'])));
		$rep_shiftfrom = htmlentities(htmlspecialchars(urldecode($_POST['rep_shiftfrom'])));
		$rep_shiftto = htmlentities(htmlspecialchars(urldecode($_POST['rep_shiftto'])));
		$notification = htmlentities(htmlspecialchars(urldecode($_POST['notification'])));
		$dateFiled = strtotime(date("Y-m-d"));
		$login = $insertdata->saveChangeShift($date_filed, $change_shift, $unique_id, $employee_id, $change_shiftfrom, $change_shiftto, $rep_employee_id, $rep_shiftfrom, $rep_shiftto, $notification,$date_filed1,$dateFiled);




		// $email = $insertdata->checkWorkEmail($employee_id, $type,$unique_id);
	  	echo $login;
	// }



		
	}

	else if($pick == 32 ||$pick == "32" ||$pick=='32' ) {	//Login
		$type = "Change Shift";
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status = 'Approved';		
		$login = $insertdata->rejectFinalApproverCS($id,$status);

		$email = $insertdata->CheckIfApprovedCS($id);
		$check=$insertdata->checkifCSApprove($id);

		if($check == '0'){
			$data = $insertdata->sendSecondApprover($email, $type, $id);
		} 
	  	echo $login;
	}

	else if($pick == 33 ||$pick == "33" ||$pick=='33' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status = 'Rejected';		
		$login = $insertdata->rejectFinalApproverCS($id,$status);
	  	echo $login;
	}

	else if($pick == 34 ||$pick == "34" ||$pick=='34' ) {	//Login
		$type = "Leave Request";
		$leaveID = "LID-".strtotime($date);
		$employee_id = htmlentities(htmlspecialchars(urldecode($_POST['employee_id'])));	
		$leave = htmlentities(htmlspecialchars(urldecode($_POST['leave'])));	
		$start_date = htmlentities(htmlspecialchars(urldecode($_POST['start_date'])));	
		$end_date = htmlentities(htmlspecialchars(urldecode($_POST['end_date'])));	
		$description_reason = htmlentities(htmlspecialchars(urldecode($_POST['description'])));	
		$date = htmlentities(htmlspecialchars(urldecode($_POST['date'])));	

		$time_Filed = htmlentities(htmlspecialchars(urldecode($_POST['time_Filed'])));	

		$dateFiled = date("Y-m-d");	
		$date1 = strtotime($start_date);
		$date2 = strtotime($end_date);
	
		$diff = $date2 - $date1;
		$days = floor($diff / (60 * 60 * 24))+1;
		
		$checkifLeaveisZero =  $insertdata->checkifLeaveisZero($leave);
		$check_leave = $insertdata->checkifLeaveisRight($leave, $employee_id);

	 	if($date == "2"){
 			if($days > 1){
 				$login = "2";
 			} else {
		 		$days = floor($diff / (60 * 60 * 24))+0.5;
				$login = $insertdata->requestLeave($leaveID,$employee_id,$leave,$start_date,$days,$end_date,$description_reason,$dateFiled,$time_Filed);
 			}
 		} else {
			$login = $insertdata->requestLeave($leaveID,$employee_id,$leave,$start_date,$days,$end_date,$description_reason,$dateFiled,$time_Filed);
 		}

	 	// $email = $insertdata->checkWorkEmail($emp_id, $type,$leaveID);
		echo $login;
	}

	else if($pick == 35 ||$pick == "35" ||$pick=='35' ) {	//Login
		$type = "Leave Request";
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status = 'Approved';		
		$login = $insertdata->rejectFinalApproverLeave($id,$status);
		// $email = $insertdata->CheckIfApproved($id);
		// $check=$insertdata->checkifLRApprove($id);

		// if($check == '0'){
		// 	$data = $insertdata->sendSecondApprover($email, $type, $id);
		// } 

	  	echo $login;
	}

	else if($pick == 36 ||$pick == "36" ||$pick=='36' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status = 'Rejected';		
		$login = $insertdata->rejectFinalApproverLeave($id,$status);
	  	echo $login;
	}
	else if($pick == 37 ||$pick == "37" ||$pick=='37' ) {	//Login
		$date_filed = htmlentities(htmlspecialchars(urldecode($_POST['date_filed'])));	
		$notification = htmlentities(htmlspecialchars(urldecode($_POST['notification'])));	


		$status = 'Pending';		
		$login = $insertdata->CreateUserInquiries($date_filed,$notification,$status);
	  	echo $login;
	}

 	else if($pick == 38 ||$pick == "38" ||$pick=='38' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status =  htmlentities(htmlspecialchars(urldecode($_POST['status'])));		
		$login = $insertdata->UpdateAssets($id,$status);
	  	echo $login;
	}     

	 	else if($pick == 39 ||$pick == "39" ||$pick=='39' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status =  htmlentities(htmlspecialchars(urldecode($_POST['status'])));		
		$login = $insertdata->UpdateAssets($id,$status);
	  	echo $login;
	}     

	 	else if($pick == 40 ||$pick == "40" ||$pick=='40' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status =  htmlentities(htmlspecialchars(urldecode($_POST['status'])));		
		$login = $insertdata->UpdateMaterials($id,$status);
	  	echo $login;
	}     

	 	else if($pick == 41 ||$pick == "41" ||$pick=='41' ) {	//Login
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id'])));	
		$status =  htmlentities(htmlspecialchars(urldecode($_POST['status'])));		
		$login = $insertdata->UpdateMaterials($id,$status);
	  	echo $login;
	}  

         else if($pick == 42 ||$pick == "42" ||$pick=='42' ) {        //Login
                 $selected = htmlentities(htmlspecialchars(urldecode($_POST['selected'])));
                 $rawdata = explode(",", $selected);
                $status = "Approved";                
                if (is_array($rawdata) || is_object($rawdata)) {                                
                        foreach($rawdata as $datas){
                                $login = $insertdata->rejectFinalApproverLeave($datas,$status);
                        }
                } else {
                        $login = "0";
                }
                if($login != '0' && is_array($rawdata) || is_object($rawdata)){
                                $email = $insertdata->CheckIfApproved($datas);
                                // $data = $insertdata->sendSecondApprover($email, $type, $selected);                
                }
        
                echo $login;
        }  
        else if($pick == 43 ||$pick == "43" ||$pick=='43' ) {        //Login
                 $selected = htmlentities(htmlspecialchars(urldecode($_POST['selected'])));
                 $rawdata = explode(",", $selected);
                $status = "Approved";                
                if (is_array($rawdata) || is_object($rawdata)) {                                
                        foreach($rawdata as $datas){
                                $login = $insertdata->rejectFinalApproverOT($datas,$status);
                        }
                } else {
                        $login = "0";
                }
                if($login != '0' && is_array($rawdata) || is_object($rawdata)){
                                $email = $insertdata->CheckIfApproved($datas);
                                $data = $insertdata->sendSecondApprover($email, $type, $selected);                
                }
        
                echo $login;
        }  
        else if($pick == 44 ||$pick == "44" ||$pick=='44' ) {        //Login
                 $selected = htmlentities(htmlspecialchars(urldecode($_POST['selected'])));
                 $rawdata = explode(",", $selected);
                $status = "Approved";                
                if (is_array($rawdata) || is_object($rawdata)) {                                
                        foreach($rawdata as $datas){
                                $login = $insertdata->rejectFinalApproverOB($datas,$status);
                        }
                } else {
                        $login = "0";
                }
                if($login != '0' && is_array($rawdata) || is_object($rawdata)){
                                $email = $insertdata->CheckIfApproved($datas);
                                 $data = $insertdata->sendSecondApprover($email, $type, $selected);                
                }
        
                echo $login;
        }
        else if($pick == 45 ||$pick == "45" ||$pick=='45' ) {        //Login
                 $selected = htmlentities(htmlspecialchars(urldecode($_POST['selected'])));
                 $rawdata = explode(",", $selected);
                $status = "Approved";                
                if (is_array($rawdata) || is_object($rawdata)) {                                
                        foreach($rawdata as $datas){
                                $login = $insertdata->rejectFinalApproverCS($datas,$status);
                        }
                } else {
                        $login = "0";
                }
                if($login != '0' && is_array($rawdata) || is_object($rawdata)){
                                $email = $insertdata->CheckIfApproved($datas);
                                $data = $insertdata->sendSecondApprover($email, $type, $selected);                
                }
        
                echo $login;
        }
        else if($pick == 46 ||$pick == "46" ||$pick=='46' ) {        //Login
                 $selected = htmlentities(htmlspecialchars(urldecode($_POST['selected'])));
                 $rawdata = explode(",", $selected);
                $status = "Rejected";                
                if (is_array($rawdata) || is_object($rawdata)) {                                
                        foreach($rawdata as $datas){
                                $login = $insertdata->rejectFinalApproverOT($datas,$status);
                        }
                } else {
                        $login = "0";
                }
                if($login != '0' && is_array($rawdata) || is_object($rawdata)){
                                $email = $insertdata->CheckIfApproved($datas);
                                $data = $insertdata->sendSecondApprover($email, $type, $selected);                
                }
        
                echo $login;
        } 

         else if($pick == 47 ||$pick == "47" ||$pick=='47' ) {        //Login
                 $selected = htmlentities(htmlspecialchars(urldecode($_POST['selected'])));
                 $rawdata = explode(",", $selected);
                $status = "Rejected";                
                if (is_array($rawdata) || is_object($rawdata)) {                                
                        foreach($rawdata as $datas){
                                $login = $insertdata->rejectFinalApproverLeave($datas,$status);
                        }
                } else {
                        $login = "0";
                }
                if($login != '0' && is_array($rawdata) || is_object($rawdata)){
                                $email = $insertdata->CheckIfApproved($datas);
                                $data = $insertdata->sendSecondApprover($email, $type, $selected);                
                }
        
                echo $login;
        }     
        
        else if($pick == 48 ||$pick == "48" ||$pick=='48' ) {        //Login
                 $selected = htmlentities(htmlspecialchars(urldecode($_POST['selected'])));
                 $rawdata = explode(",", $selected);
                $status = "Rejected";                
                if (is_array($rawdata) || is_object($rawdata)) {                                
                        foreach($rawdata as $datas){
                                $login = $insertdata->rejectFinalApproverCS($datas,$status);
                        }
                } else {
                        $login = "0";
                }
                if($login != '0' && is_array($rawdata) || is_object($rawdata)){
                                $email = $insertdata->CheckIfApproved($datas);
                                $data = $insertdata->sendSecondApprover($email, $type, $selected);                
                }
        
                echo $login;
        }  

         else if($pick == 49 ||$pick == "49" ||$pick=='49' ) {        //Login
                 $selected = htmlentities(htmlspecialchars(urldecode($_POST['selected'])));
                 $rawdata = explode(",", $selected);
                $status = "Rejected";                
                if (is_array($rawdata) || is_object($rawdata)) {                                
                        foreach($rawdata as $datas){
                                $login = $insertdata->rejectFinalApproverOB($datas,$status);
                        }
                } else {
                        $login = "0";
                }
                if($login != '0' && is_array($rawdata) || is_object($rawdata)){
                                $email = $insertdata->CheckIfApproved($datas);
                                $data = $insertdata->sendSecondApprover($email, $type, $selected);                
                }
        
                echo $login;
        }
        else if($pick == 50 ||$pick == "50" ||$pick=='50'){

		$uniqueId = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['uniqueId']))));

		$date = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['date']))));
		$expectedsalary = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['expectedsalary']))));
		$position = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['position']))));
		$firstName = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['firstName']))));
		$MiddleName = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['MiddleName']))));
		$lastName = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['lastName']))));
		$completecurrentaddress = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['completecurrentaddress']))));
		$completeprobaddress = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['completeprobaddress']))));
		$phone = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['phone']))));
		$birthday = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['birthday']))));
		$age = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['age']))));
		$placeofbirth = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['placeofbirth']))));
		$civilstatus = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['civilstatus']))));
		$religion = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['religion']))));
		$nationality = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['nationality']))));
		$language = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['language']))));
		$arrsfamilyInfo = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['arrsfamilyInfo']))));
		$arrsemploymentHist = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['arrsemploymentHist']))));
		$arrsschoolDetails = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['arrsschoolDetails']))));
		$skills = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['skills']))));
		$arrstraininglist = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['arrstraininglist']))));
		$arrgovernmentexamlist = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['arrgovernmentexamlist']))));
		$arrcharacterReference = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['arrcharacterReference']))));
		$arrcontactperson = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['arrcontactperson']))));
		$sss = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['sss']))));
		$tin = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['tin']))));
		$philhealth = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['philhealth']))));
		$pagibig = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['pagibig']))));
		$contactPersonRel = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['contactPersonRel']))));
		$contactRelation = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['contactRelation']))));
		$contactContactnum = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['contactContactnum']))));
		$contactaddress = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['contactaddress']))));

		$pos_desc = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['pos_desc']))));


		$status = 'Pending';

		echo $login = $insertdata->addapplicant($date,$expectedsalary,$position,$firstName,$MiddleName,$lastName,$completecurrentaddress,$completeprobaddress,$phone,$birthday,$age,$placeofbirth,$civilstatus,$religion,$nationality,$language,$arrsfamilyInfo,$arrsemploymentHist,$arrsschoolDetails,$skills,$arrstraininglist,$arrgovernmentexamlist,$arrcharacterReference,$arrcontactperson,$sss ,$tin,$philhealth,$pagibig ,$contactPersonRel,$contactRelation,$contactContactnum,$contactaddress,$uniqueId,$pos_desc,$status);
        }

        else if($pick == 51 ||$pick == "51" ||$pick=='51'){




        	$val_id = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['val_id']))));

        	$suggestions = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['suggestionsText']))));

		echo $login = $insertdata->addSuggestions($date, $suggestions, $val_id);
        }


        else if($pick == 52 ||$pick == "52" ||$pick=='52'){

		$examid = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['examid']))));
		$position = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['position']))));
		$examIdList = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['examIdList']))));
		$radioBox = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['radioBox']))));
		$exammAsnswerList = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['exammAsnswerList']))));
		$essayAnswerList = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['essayAnswerList']))));



		$insertdata->sendToHr();


		echo $login = $insertdata->tekeExam($examid,$position,$examIdList,$radioBox,$exammAsnswerList,$essayAnswerList, $date);


        }


        else if($pick == 53 ||$pick == "53" ||$pick=='53'){
        	$app_id = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['app_id']))));
		$notes = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['notes']))));
		$status = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['arrCheckbox']))));
		$data = $insertdata->firstinterview($app_id,$notes,$status);
		$get_info = $insertdata->getapplicantInfo($app_id);
		
		$description = "1st Interview ";
		include 'test.php';

		echo $data;
        }


        else if($pick == 54 ||$pick == "54" ||$pick=='54'){
        	$app_id = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['app_id']))));
		$notes = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['notes2']))));
		$status = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['arrCheckbox']))));
		$data = $insertdata->finaltinterview($app_id,$notes,$status);
		$get_info = $insertdata->getapplicantInfoFinal($app_id);

		$description = "2nd Interview ";
		include 'test.php';
        
		echo $data;
        }

        else if($pick == 55 ||$pick == "55" ||$pick=='55'){
        	$app_id = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['app_id']))));
		$notes = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['notes3']))));
		$status = stripslashes(htmlentities(htmlspecialchars(urldecode($_POST['arrCheckbox2']))));
		$data = $insertdata->medical($app_id,$notes,$status);
		
		echo $data;
        }

?>




