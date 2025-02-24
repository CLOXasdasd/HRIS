<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 0);
    $start_date =  $_GET['startDate'];
    $end_date =  $_GET['endDate'];
    $emp_id = $_GET['emp_id'];

    $dateStart = date('y-m-d', strtotime($start_date));
    $dateEnd = date('y-m-d', strtotime($end_date));
    ob_end_clean();
    
    function getDatesFromRange($start, $end, $format = 'y-m-d') { 
        $array = array(); 
        $interval = new DateInterval('P1D'); 
        $realEnd = new DateTime($end); 
        $realEnd->add($interval); 
        $period = new DatePeriod(new DateTime($start), $interval, $realEnd); 

        foreach($period as $date) {                  
            $array[] = $date->format($format);  
        } 
      
        return $array; 
    } 
      

    function getDateRange($startDate, $endDate) {
        $start = new DateTime($startDate);
        $end = new DateTime($endDate);      
        $dateRange = [];        
        $interval = new DateInterval('P1D'); // 1 day interval
        $dateRange[] = $start->format('Y-m-d');
        while ($start < $end) {
            $start->add($interval);
            $dateRange[] = $start->format('Y-m-d');
        }   
        return $dateRange;
    }       

    function fetchTimeIn($dateStart, $emp_id){
        $conn = new mysqli('localhost', 'root', '', 'hirs_db');
        $result = mysqli_query($conn, "SELECT timeIn1 FROM hirs_db.tbl_dailyattendance WHERE emp_id = '$emp_id' AND date = '$dateStart' ");
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if($row["timeIn1"] != ""){
            return $row["timeIn1"];
        } else {
           $leave_date = date('Y-m-d', strtotime($dateStart));

            $result1 = mysqli_query($conn, "SELECT * FROM hirs_db.tbl_leaverequest WHERE emp_id = '$emp_id' AND startDate = '$leave_date' AND status = 'Approved' ");
            $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
            $count = $result1->num_rows;
              
            if($count > 0) {
                return $row1['leaveRequest'];
            } else {
                return "";
            }
        }
    }


    function fetchTimeOut($dateStart, $emp_id){
        $conn = new mysqli('localhost', 'root', '', 'hirs_db');
        $result = mysqli_query($conn, "SELECT timeOut1, timeOut2, timeOut3 FROM hirs_db.tbl_dailyattendance WHERE emp_id = '$emp_id' AND date = '$dateStart' ");
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $out1 =$row["timeOut1"];
        $out2 =$row["timeOut2"];
        $out3 =$row["timeOut3"];

        if($out3 != ""){
            return  $out3;
        } else   if($out2 != ""){
            return  $out2;
        } else   if($out1 != ""){
            return  $out1;
        } else {
             $leave_date = date('Y-m-d', strtotime($dateStart));

            $result1 = mysqli_query($conn, "SELECT * FROM hirs_db.tbl_leaverequest WHERE emp_id = '$emp_id' AND startDate = '$leave_date' AND status = 'Approved' ");
            $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
            $count = $result1->num_rows;
              
            if($count > 0) {
                return $row1['leaveRequest'];
            } else {
                return "";
            }
        }

        return $row["timeIn1"];
    }

    function   fetchFullname($emp_id){
        $conn = new mysqli('localhost', 'root', '', 'hirs_db');
        $result = mysqli_query($conn, "SELECT Lastname, Firstname FROM hirs_db.tbl_employee WHERE emp_id = '$emp_id'");
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $row["Lastname"] . ", " . $row["Firstname"];
    }
  
    function fetchTotal($timeIn, $timeOut, $date){
        
        $day = date('N', strtotime($date));

        if( $day == "7"){
            return "";
        } else if($timeIn =="" &&  $timeOut == ""){
               return "Absent";
        } else if($timeIn != "" && $timeOut== "") {
                return "Did not Time Out";
        } else {
            $timestamp1 = strtotime($timeOut);
            $timestamp2 = strtotime($timeIn);        

            $difference_in_seconds = abs($timestamp2 - $timestamp1);        

            $difference_in_hours = $difference_in_seconds / 3600;       

            return number_format($difference_in_hours, 2) . " hour(s)";
        }
     
    }

    $dateRange = getDatesFromRange( $start_date, $end_date); 
    require_once('tcpdf/tcpdf.php');  
	// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, false, 'UTF-8', true);  
	$pdf = new TCPDF('P', 'mm', 'A4', FALSE, 'ISO-8859-1', false, true);
	$pdf->SetCreator(PDF_CREATOR);  
	$pdf->SetTitle("Generated PDF");  
	$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  

	$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 035', PDF_HEADER_STRING);
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
	$pdf->SetMargins(10, 10, 10, 10);

	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER, '', PDF_MARGIN_FOOTER);
	$pdf->SetFooterMargin();
	$pdf->SetLineStyle( array( 'width' => 100, 'color' => array(0,0,0)));
	$pdf->SetDefaultMonospacedFont('helvetica');  
	$pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
	$pdf->setPrintHeader(false);  
	$pdf->setPrintFooter(false);  
	$pdf->SetAutoPageBreak(TRUE, 10);  
	$pdf->SetFont('helvetica', '', 19); 
	$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
	$pdf->AddPage();  

	$pdf->SetFont('helvetica', '', 12); 


        $dateStart = date('y-m-d', strtotime($start_date));
        $dateEnd = date('y-m-d', strtotime($end_date));



    $content = " ";
    $content .=" 
        <table>
            <tr>
                <td style='width: 50px'>Period : </td>
                <td>" .  date('M d Y', strtotime($dateStart)) ." - " . date('M d Y', strtotime($dateEnd)). "</td>
                <td style='width: 50px'></td>
                <td></td>
            </tr>
            <tr>
                <td>Employee Number: </td>
                <td> ". $emp_id. "</td>
                <td>FullName</td>
                <td>". fetchFullname($emp_id)."</td>
            </tr>
        </table>
            <br><hr><br>
        <table  border='1' cellspacing='3' cellpadding='4'>
            <tr>
                <th style=' border: 1px solid; width: 100px; text-align:center;border-right-width:0.1px;'> Date </th>
                <th style=' border: 1px solid; width: 100px; text-align:center;border-right-width:0.1px;'> Time In </th>
                <th style=' border: 1px solid; width: 100px; text-align:center;border-right-width:0.1px;'> Time Out </th>
                <th style=' border: 1px solid; width: 100px; text-align:center;border-right-width:0.1px;'> Total </th>
            </tr>";

        $pdf->SetFont('helvetica', '', 9); 
        $dateRange = getDateRange($dateStart, $dateEnd);        
        foreach ($dateRange as $date) {
            $content .= "
            <tr>
                <td style=' border: 1px solid; width: 100px; text-align:center;border-right-width:0.1px;'>" . $date . "</td>
                <td style=' border: 1px solid; width: 100px; text-align:center;border-right-width:0.1px;'>" . fetchTimeIn(date('y-m-d', strtotime($date)), $emp_id)."</td>
                <td style=' border: 1px solid; width: 100px; text-align:center;border-right-width:0.1px;'>" . fetchTimeOut(date('y-m-d', strtotime($date)), $emp_id)."</td>
                <td style=' border: 1px solid; width: 100px; text-align:center;border-right-width:0.1px;'>" . 
                        fetchTotal(fetchTimeIn(date('y-m-d', strtotime($date)), $emp_id),fetchTimeOut(date('y-m-d', strtotime($date)), $emp_id) ,$date)  . " </td>
            </tr>";
        }
    
    $content .= "</table>";

	$pdf->writeHTML($content);  
	$pdf->Output("test" . '.pdf', 'I');

?>