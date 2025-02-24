<?php
	$filename = "Generated File Change Shift" . date("Y-m-d");
   $startDate = $_GET['startDate'];
   $endDate = $_GET['endDate'];

	$conn = new mysqli('192.168.11.213', 'root', '');  
	mysqli_select_db($conn, 'hirs_db');  
	  
	$setSql = "SELECT 
	tbl_changeshift.changeshift_id, 
    tbl_changeshift.emp_id, 
    tbl_changeshift.emp_name,
    tbl_employee.department,
    tbl_changeshift.category,
    tbl_changeshift.reason,
    tbl_changeshift.filed_date,
    tbl_changeshift.shift_start,
    tbl_changeshift.shift_end,
    tbl_changeshift.replacement_personel,
    tbl_changeshift.date_filed1,
    tbl_changeshift.rep_shiftstart,
    tbl_changeshift.rep_shiftend,
    tbl_changeshift.status1_approver,
    tbl_changeshift.status2_approver
FROM hirs_db.tbl_changeshift
INNER JOIN hirs_db.tbl_employee
ON tbl_changeshift.emp_id = tbl_employee.emp_id
WHERE date_filed1 between '$startDate' AND '$endDate' ORDER BY tbl_changeshift.date_filed1 ASC";  
	$setRec = mysqli_query($conn, $setSql);  
	  
	$columnHeader = '';  
	$columnHeader = "Change Shift ID" . "\t" . "Employee ID" . "\t". "EmployeeName" . "\t" . "Department". "\t" . "Category" . "\t" ."Description" . "\t" . "Scheduled Date" . "\t". "Start Shift" . "\t". "End Shift" . "\t". "Replacement" . "\t" . "Filed Date" . "\t" . "Filed Start Shift". "\t" . "Filed End Shift" . "\t" . "First Approver". "\t" . "Second Approver" . "\t";  
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