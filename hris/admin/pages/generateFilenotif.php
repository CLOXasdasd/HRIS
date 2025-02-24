<?php
	$filename = "Generated NOtification" . date("Y-m-d");
   $startDate = $_GET['startDate'];
   $endDate = $_GET['endDate'];

	$conn = new mysqli('192.168.11.213', 'root', '');  
	mysqli_select_db($conn, 'hirs_db');  
	  
	$setSql = "
	SELECT notifID,emp_name, date, notif_desc, status  FROM hirs_db.tbl_notifpass WHERE date between '$startDate' and '$endDate' ORDER BY id DESC";  
	$setRec = mysqli_query($conn, $setSql);  
	  
	$columnHeader = '';  
	$columnHeader = "Notif ID" . "\t"  ."EmployeeName" . "\t" . "date" . "\t" ."Description" . "\t"  . "Status" .  "\t" ;  
	$setData = '';  
	  
	while ($rec = mysqli_fetch_row($setRec)) {  
	    $rowData = '';  
	    foreach ($rec as $value) {  
	        $value = '"' . $value . '"' . "\t";  
	        $rowData .= $value;  
	    }  
	    $setData .= trim($rowData) . "\n";  
	}  
	  
	header("Content-type: application/octet-stream");  
	header("Content-Disposition: attachment; filename=".$filename .".xls");  
	header("Pragma: no-cache");  
	header("Expires: 0");  
	echo ucwords($columnHeader) . "\n" . $setData . "\n";  
?>