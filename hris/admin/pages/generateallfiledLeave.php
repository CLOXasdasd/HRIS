<?php
    // Include PhpSpreadsheet library
    require_once './vendor/autoload.php';  // Make sure the path is correct 

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;   

    $conn = new mysqli('192.168.11.213', 'root', '', 'hirs_db'); 
    
    

    function generateRow($id) {
        global $conn;
        $contents = [];
        $sqlLeaveDetails = "SELECT leaveType FROM tbl_employee WHERE emp_id='$id'";
        $query = $conn->query($sqlLeaveDetails);
        $user_data = mysqli_fetch_array($query);    

        $leave = explode(",", $user_data['leaveType']);
        $leave_id = implode("','", $leave); 

        $sqlLeaveEmployee = "SELECT * FROM tbl_leavetype WHERE id in ('$leave_id')";    

        $query = $conn->query($sqlLeaveEmployee);   

        while ($row = $query->fetch_assoc()) {
            if ($row['earned'] == "yes" || $row['leave_description'] == "Probationary earned Leave") {
                $result = abs(checkRemainingLeave($row['leave_description'], $id, checkifearnable($row['id'])));
            } else {
                $result = 0;
            }   

            $contents[] = [
                'leave_description' => $row['leave_description'],
                'leave_count' => $row['leave_count'],
                'earned_leave' => checkifearnable($row['id']),
                'used_leave' => checkifUsed($row['leave_description'], $id),
                'pending_leave' => checkPendingLeave($row['leave_description'], $id),
                'remaining_leave' => $result
            ];
        }
        return $contents;
    }   

    function checkifearnable($temp_id) {
        global $conn;
        $sqlLeaveDetails = "SELECT earned, leave_count FROM tbl_leavetype WHERE id = '$temp_id'";
        $query = $conn->query($sqlLeaveDetails);
        $user_data = mysqli_fetch_array($query);    

        if ($user_data['earned'] == 'yes') {
            $sum = 11 - date('m') + 2;
            return $user_data['leave_count'] - $sum;
        } else {
            return $user_data['leave_count'];
        }
    }   

    function checkifUsed($id, $emp_id) {
        global $conn;
        $sqlLeaveDetails = "SELECT sum(days) as days FROM tbl_leaverequest WHERE leaveRequest='$id' AND emp_id = '$emp_id' AND status = 'Approved' AND reset = '1'";
        $query = $conn->query($sqlLeaveDetails);
        $user_data = mysqli_fetch_array($query);
        return $user_data['days'] ?: 0;
    }   

    function checkPendingLeave($id, $emp_id) {
        global $conn;
        $sqlLeaveDetails = "SELECT sum(days) as days FROM tbl_leaverequest WHERE leaveRequest='$id' AND emp_id = '$emp_id' AND status = 'Pending' AND reset = '1'";
        $query = $conn->query($sqlLeaveDetails);
        $user_data = mysqli_fetch_array($query);
        return $user_data['days'] ?: 0;
    }   

    function checkRemainingLeave($id, $emp_id, $earned) {
        global $conn;
        $sqlLeaveDetails = "SELECT sum(days) as days FROM tbl_leaverequest WHERE leaveRequest='$id' AND emp_id = '$emp_id' AND status = 'Approved' AND reset = '1'";
        $query = $conn->query($sqlLeaveDetails);
        $user_data = mysqli_fetch_array($query);
        return $earned - $user_data['days'];
    }   

    // Create a new Spreadsheet object
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();    

    // Set the headers for the Excel file
    $sheet->setCellValue('A1', 'Employee ID');
    $sheet->setCellValue('B1', 'Full Name');
    $sheet->setCellValue('C1', 'Leave Description');
    $sheet->setCellValue('D1', 'Total Leave Credit');
    $sheet->setCellValue('E1', 'Total Earned');
    $sheet->setCellValue('F1', 'Used');
    $sheet->setCellValue('G1', 'Pending');
    $sheet->setCellValue('H1', 'Remaining');    

    // Fetch employee data
    $sql = "SELECT emp_id, Firstname, Middlename, Lastname FROM tbl_employee WHERE status = 'Active'";
    $query = $conn->query($sql);
    $row_num = 2; // Start writing data from row 2  

    while ($row = $query->fetch_assoc()) {
        $emp_id = $row["emp_id"];
        $full_name = $row["Lastname"] . ', ' . $row["Firstname"] . ' ' . $row["Middlename"];    

        // Set Employee ID and Full Name
        $sheet->setCellValue('A' . $row_num, $emp_id);
        $sheet->setCellValue('B' . $row_num, $full_name);   

        // Get leave details for the employee
        $leave_details = generateRow($emp_id);  

        // Write leave data for the employee
        foreach ($leave_details as $leave_data) {
            $sheet->setCellValue('C' . $row_num, $leave_data['leave_description']);
            $sheet->setCellValue('D' . $row_num, $leave_data['leave_count']);
            $sheet->setCellValue('E' . $row_num, $leave_data['earned_leave']);
            $sheet->setCellValue('F' . $row_num, $leave_data['used_leave']);
            $sheet->setCellValue('G' . $row_num, $leave_data['pending_leave']);
            $sheet->setCellValue('H' . $row_num, $leave_data['remaining_leave']);
            $row_num++; // Move to the next row
        }
    }   

    // Create the Excel writer and save to file
    $writer = new Xlsx($spreadsheet);
    $filename = 'leave_report||'.date('Y').'.xlsx';    

    // Save the file to the server or directly output it to the browser
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output'); // Output directly to the browser
    exit;
?>
