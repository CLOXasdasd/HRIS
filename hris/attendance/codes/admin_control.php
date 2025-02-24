<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 0);
	date_default_timezone_set('Asia/Manila');
	$date=date("Y-m-d H:i:s");
	require_once'function.php';
	$data=new admin_creation();

	$pick=urldecode($_POST['pick']);

	if($pick == 1 || $pick == '1'){
		$fullname = htmlentities(htmlspecialchars(urldecode($_POST['fullname']))) ;
		$company = htmlentities(htmlspecialchars(urldecode($_POST['company']))) ;
		$tel = htmlentities(htmlspecialchars(urldecode($_POST['tel']))) ;
		$email = htmlentities(htmlspecialchars(urldecode($_POST['email']))) ;
		$purpose = htmlentities(htmlspecialchars(urldecode($_POST['purpose']))) ;

		$check = $data->TimeINVisit($fullname,$company,$tel,$email,$purpose,$date);
		echo $check;

	} 	

	else if($pick == 2 || $pick == '2'){
		$id = htmlentities(htmlspecialchars(urldecode($_POST['id']))) ;
		$check = $data->TimeOutVisit($id,$date);
		echo $check;
	} 
	else if($pick == 3 || $pick == '3'){
		$emp_id = htmlentities(htmlspecialchars(urldecode($_POST['emp_id']))) ;
		$dateToday = htmlentities(htmlspecialchars(urldecode($_POST['dateToday']))) ;
		$checks = htmlentities(htmlspecialchars(urldecode($_POST['checks']))) ;
		$text = htmlentities(htmlspecialchars(urldecode($_POST['text']))) ;
		$time = date('Y-m-d H:i:s');

		$forcountchecks = explode(",",$checks);
		$forcounttext = explode(",",$text);

		for ($i = 0;  $i < count($forcounttext) ;$i++){
			if($forcounttext[$i] == "" ){
				$column = '0';
			} else {
				$column = '1';
			}
		}
		
		if($column == 0) {
			echo 10;
		} else {
			$check = $data->checkifattendanceexist($emp_id,$dateToday);

			if($check == 0) {
				$data->createattendance($emp_id,$dateToday,$time,$checks, $text);
				echo 2;
			} 
			 else {
				$data->updateattendance($emp_id,$dateToday,$time,$checks, $text );	
		 		echo 1; 			
			}
		}
	} 
	else if($pick == 4 || $pick == '4'){
		$emp_id = htmlentities(htmlspecialchars(urldecode($_POST['emp_id']))) ;
		$status = htmlentities(htmlspecialchars(urldecode($_POST['status']))) ;
		$assessment = htmlentities(htmlspecialchars(urldecode($_POST['assessment']))) ;
		$time = date('Y-m-d H:i:s');
		echo $data->TimeOUTattendance($emp_id,$status,$assessment,$time);	
	} 
		
?>