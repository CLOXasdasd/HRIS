<?php
	$filename = "Generated All Employees" . date("Y-m-d h:i");


	$conn = new mysqli('192.168.11.213', 'root', '');  
	mysqli_select_db($conn, 'hirs_db');  
	  
	$setSql = "SELECT 
    emp_id,
    position,
    department,
    Lastname,
    Firstname,
    Middlename,
    Date_hired,
    emp_status_1,
    emp_status_2,
    civil_status,
    gender,
    birthday,contact,course, school, contact_person, contact_person_num, contact_relation, sss, TIN, philhealth, pagibig, spouse, spouse_bday,
     dependent1, dependent1_bday, dependent2, dependent2_bday, dependent3, dependent3_bday, dependent4, dependent4_bday,present_address, permanent_address,reg_date,email
     FROM tbl_employee ORDER BY emp_id ASC;";  
	$setRec = mysqli_query($conn, $setSql);  
	  
	$columnHeader = '';  
	$columnHeader = "Employee ID" . "\t" . "Position" . "\t". "Department" . "\t" . "Lastname". "\t" . "Firstname" . "\t" ."Middlename" 
    . "\t" . "Date Hired" . "\t". "Status1" . "\t". "Status2" . "\t". "Civil Status" . "\t" . "Gender" . "\t" . "Birthday"
    . "\t" . "Contact NUmber" . "\t" . "Course". "\t" . "School" . "\t" . "Contact Person" . "\t" . "Contact Person NUm" . "\t" . "Relation" . "\t"
    . "SSS" . "\t" . "TIN" . "\t" . "Philhealth" . "\t" . "Pagibig" . "\t" . "Spouse" . "\t" . "Spouse Birthday" . "\t"  . "Dependent 1" . "\t" . "Dependent1 Birthday" . "\t"
    . "Dependent2" . "\t" . "Dependent2 Birthday" . "\t" . "Dependent3" . "\t" . "Dependent3 Birthday" . "\t" . "Dependent4" . "\t" . "Dependent4 Birthday" . "\t" . "Present Address" . "\t" . "Permanent Address" . "\t" . "Regularizarion Date" . "\t" . "Email" . "\t";  
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