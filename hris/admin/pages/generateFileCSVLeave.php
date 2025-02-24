<?php
	$filename = "Generated File Leave" . date("Y-m-d");
   $startDate = $_GET['startDate'];
   $endDate = $_GET['endDate'];

	$conn = new mysqli('192.168.11.213', 'root', '');  
	mysqli_select_db($conn, 'hirs_db');  
	  
	$setSql = "
	SELECT tbl_leaverequest.leave_id, 
	   tbl_leaverequest.emp_id, 
        tbl_leaverequest.emp_name, 
        tbl_employee.department,
        tbl_leaverequest.leaveRequest, 
        tbl_leaverequest.startDate, 
        tbl_leaverequest.endDate, 
        tbl_leaverequest.days , 
         tbl_leaverequest.reason,
        tbl_leaverequest.status1_approver , 
        tbl_leaverequest.status2_approver 
        
FROM hirs_db.tbl_leaverequest
INNER JOIN hirs_db.tbl_employee
ON tbl_leaverequest.emp_id = tbl_employee.emp_id WHERE tbl_leaverequest.status = 'Approved' AND tbl_leaverequest.startDate BETWEEN '$startDate' AND '$endDate' ORDER BY tbl_leaverequest.startDate ASC";  
	$setRec = mysqli_query($conn, $setSql);  
	  
	$columnHeader = '';  
	$columnHeader = "Leave ID" . "\t" . "Employee ID" . "\t" ."EmployeeName" . "\t" . "Department" . "\t" ."Description" . "\t" . "Start Date" . "\t". "End Date" . "\t". "Days". "\t" ."Reason" .  "\t"."First Approver " . "\t" ."Second Approver" .  "\t" ;  
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