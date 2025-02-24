<?php
	$filename = "Generated File Overtime" . date("Y-m-d");
   $startDate = $_GET['startDate'];
   $endDate = $_GET['endDate'];

	$conn = new mysqli('192.168.11.213', 'root', '');  
	mysqli_select_db($conn, 'hirs_db');  
	  
	$setSql = "SELECT 
		tbl_overtime.OTID, 
	    tbl_overtime.emp_id,
	    tbl_overtime.emp_name, 
	    tbl_employee.department,
	    tbl_overtime.reason, 
	    tbl_overtime.date_worked, 
	    tbl_overtime.date_filed_to, 
	    tbl_overtime.total_hours, 
	    tbl_overtime.status1_approver,
	    tbl_overtime.status2_approver, 
	    tbl_overtime.date_filed 
	FROM hirs_db.tbl_overtime
	INNER JOIN hirs_db.tbl_employee
	ON tbl_overtime.emp_id = tbl_employee.emp_id WHERE tbl_overtime.status = 'Approved' AND tbl_overtime.date_worked BETWEEN  '$startDate' AND '$endDate' ORDER BY tbl_overtime.date_worked ASC";  
	$setRec = mysqli_query($conn, $setSql);  
	  
	$columnHeader = '';  
	$columnHeader = "Overtime ID" . "\t" . "Employee ID" . "\t". "EmployeeName" . "\t" . "Department" . "\t" ."Description" . "\t" . "Start Date" . "\t". "End Date" . "\t". "Hours" . "\t". "Approver 1" . "\t" . "Approver 2" . "\t" . "Date Filed" . "\t";  
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