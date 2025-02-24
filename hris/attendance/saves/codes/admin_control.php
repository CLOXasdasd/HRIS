<?php

	date_default_timezone_set('Asia/Manila');
	$date=date("Y-m-d H:i:s");
	require_once'function.php';
	$insertdata=new admin_creation();

	$pick=urldecode($_POST['pick']);


	if($pick == 1 ||$pick == "1" ||$pick=='1' ){
		$emp = htmlentities(htmlspecialchars(urldecode($_POST['emp'])));
		$qty = htmlentities(htmlspecialchars(urldecode($_POST['qty'])));
		$itemDescription = htmlentities(htmlspecialchars(urldecode($_POST['itemDescription'])));
		$variation = htmlentities(htmlspecialchars(urldecode($_POST['variation'])));
		$remarks = htmlentities(htmlspecialchars(urldecode($_POST['remarks'])));
		$sql=$insertdata->save($emp, $qty, $itemDescription, $variation , $date, $remarks);
		if($sql) {
			echo "1";
		} else {
			echo "0";
		}
	
	} 	if($pick == 2 ||$pick == "2" ||$pick=='2' ){
		$emp = htmlentities(htmlspecialchars(urldecode($_POST['emp'])));
		
		$sql=$insertdata->saveRequestee($emp);
		if($sql) {
			echo "1";
		} else {
			echo "0";
		}
	
	} 

?>	