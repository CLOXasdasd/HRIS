

<?php
	$id =  $_GET['id'];

 	$conn = new mysqli('192.168.11.213', 'root', '', 'hirs_db');

	function generateRow($id) {
		$contents = '';
 		$conn = new mysqli('192.168.11.213', 'root', '', 'hirs_db');
		$sqlLeaveDetails = "SELECT leaveType FROM tbl_employee WHERE emp_id='$id' ";
		$query = $conn->query($sqlLeaveDetails);
		$user_data = mysqli_fetch_array($query);

		$leave = explode(",",$user_data['leaveType']);  
		$leave_id = implode("','", $leave);

		$sqlLeaveEmployee = "SELECT * FROM tbl_leavetype WHERE id in ('$leave_id')  ";

		$query = $conn->query($sqlLeaveEmployee);

		while($row = $query->fetch_assoc()){
			$contents .= "
			<tr>
				<td align='center'>" . $row['leave_description']."</td>
				<td align='center'>" . $row['leave_count']."</td>
				<td align='center'>" . checkifearnable($row['id']) ."</td>				
				<td align='center'>" . checkifUsed($row['leave_description'], $id) ."</td>				
				<td align='center'>" . checkPendingLeave($row['leave_description'], $id) . "</td>
				<td align='center'>" . abs(checkRemainingLeave($row['leave_description'],$id, checkifearnable($row['id']))) ."</td>
			</tr>
			";
		}
		return $contents;
	}


	function checkifearnable($temp_id){
		 	$conn = new mysqli('192.168.11.213', 'root', '', 'hirs_db');
			$sqlLeaveDetails = "SELECT earned,leave_count FROM tbl_leavetype WHERE id = '$temp_id'  ";
			$query = $conn->query($sqlLeaveDetails);
			$user_data = mysqli_fetch_array($query);

			if($user_data['earned'] == 'yes') {
				$sum = 11 - date('m') + 2;
				return $user_data['leave_count'] - $sum  ;
			} else {
				return $user_data['leave_count'];
			}
	}

	function checkifUsed($id , $emp_id){
		 	$conn = new mysqli('192.168.11.213', 'root', '', 'hirs_db');
			$sqlLeaveDetails = "SELECT sum(days) as days FROM tbl_leaverequest WHERE leaveRequest='$id' AND emp_id = '$emp_id' AND status = 'Approved' AND reset = '1' ";
			$query = $conn->query($sqlLeaveDetails);
			$user_data = mysqli_fetch_array($query);
			if($user_data['days'] != "") {
				return $user_data['days']; 
			} else {
				return 0; 
			}	
	}

	function checkPendingLeave($id , $emp_id){
				 	$conn = new mysqli('192.168.11.213', 'root', '', 'hirs_db');
			$sqlLeaveDetails = "SELECT sum(days) as days FROM tbl_leaverequest WHERE leaveRequest='$id' AND emp_id = '$emp_id' AND status = 'Pending' AND reset = '1'";
			$query = $conn->query($sqlLeaveDetails);
			$user_data = mysqli_fetch_array($query);

			if($user_data['days'] != "") {
				return $user_data['days']; 
			} else {
				return 0; 
			}
	
	}

	function checkRemainingLeave($id, $emp_id, $earned){
			$conn = new mysqli('192.168.11.213', 'root', '', 'hirs_db');
			$sqlLeaveDetails = "SELECT sum(days) as days FROM tbl_leaverequest WHERE leaveRequest='$id' AND emp_id = '$emp_id' AND status = 'Approved' AND reset = '1'";
			$query = $conn->query($sqlLeaveDetails);
			$user_data = mysqli_fetch_array($query);
			return $earned-$user_data['days'];
	}

	function generateRowDetails($id) {
		$contents = '';
		$conn = new mysqli('192.168.11.213', 'root', '', 'purchase');
		$sql = "SELECT leave_id,leaveRequest,reason,startDate, endDate, days FROM hirs_db.tbl_leaverequest WHERE emp_id = '$id' and status = 'Approved' ORDER BY leaveRequest DESC";
		$query = $conn->query($sql);

		while($row = $query->fetch_assoc()){
			$contents .= "
			<tr>
				<td align='center'>".$row['leave_id']."</td>
				<td align='center'>".$row['leaveRequest']."</td>
				<td align='center'>".$row['reason']."</td>
				<td align='center'>". date("M d Y", strtotime($row['startDate'])).  "</td>
				<td align='center'>".date("M d Y", strtotime($row['endDate']))."</td>
				<td align='center'>".$row['days']."</td>
			</tr>
			";
		}
		return $contents;
	}

	require_once('tcpdf/tcpdf.php');  

	// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, false, 'UTF-8', true);  
	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, false, 'ISO-8859-1', false);
	$pdf->SetCreator(PDF_CREATOR);  
	$pdf->SetTitle("Generated PDF");  
	$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  

	// set default header data
	$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 035', PDF_HEADER_STRING);

	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
	$pdf->SetMargins(10, 10, 10, 10);
	// set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER, '', PDF_MARGIN_FOOTER);
	$pdf->SetFooterMargin();

	$pdf->SetLineStyle( array( 'width' => 100, 'color' => array(0,0,0)));

	$pdf->SetDefaultMonospacedFont('helvetica');  
	$pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
	$pdf->setPrintHeader(false);  
	$pdf->setPrintFooter(false);  
	$pdf->SetAutoPageBreak(TRUE, 10);  

	$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
	$pdf->AddPage();  

	$pdf->SetFont('helvetica', '', 11); 
	$x = $pdf->pixelsToUnits('40');
	$y = $pdf->pixelsToUnits('25');
    $gen = "ADVANCED MOLDING CO. INC. ";
	$pdf->Text  ( $x, $y, $gen, false, false, true, 0, 0, '', false, '', 0, true, 'T', 'M', true );

	$pdf->SetFont('helvetica', '', 11); 

	$genx = $pdf->pixelsToUnits('450');
	$geny = $pdf->pixelsToUnits('25');
    $gen1 = date("F d Y");
	$pdf->Text  ( $genx, $geny, $gen1, false, false, true, 0, 0, '', false, '', 0, true, 'T', 'M', true );


	$pdf->SetFont('helvetica', '', 10); 
	$content = "";
	$content .= "<br><br><br>";  
	$sql = "SELECT Firstname, Middlename, Lastname FROM hirs_db.tbl_employee WHERE emp_id = '$id' ";
	$query = $conn->query($sql);

	while($row = $query->fetch_assoc()){
		$content .=  '
			<table border="1" cellspacing="0" cellpadding="3" align="center" style="width:160%">
				<tr >
					<td  width="100px"> Employee ID </td>
					<td> ' . $id . '</td>
				</tr><tr>	
					<td> Full Name </td>
					<td> ' . $row["Lastname"] . ', ' . $row["Firstname"] .' '. $row["Middlename"] . '</td>
				</tr>
			</table>
		';
	}

	$content .= '
	      	<h2 align="center"></h2>
	      	<table border="1" cellspacing="0" cellpadding="3" align="center" style="width:100%">
	           <tr>  
					<th width="16.5%" align="center"><b>Description</b></th>
					<th width="16.5%" align="center"><b>Total Leave Credit</b></th>
					<th width="16.5%" align="center"><b>Total Earned</b></th> 
					<th width="16.5%" align="center"><b>Used</b></th> 
					<th width="16.5%" align="center"><b>Pending</b></th> 
					<th width="16.5%" align="center"><b>Remaining</b></th> 
	           </tr>';  
	$content .= generateRow($id);  
	$content .= '</table>';  
		$content .= '
	      	<h2 align="center"></h2>
	      	<table border="1" cellspacing="0" cellpadding="3" align="center" style="width:100%">
	           <tr>  
					<th width="16%" align="center"><b>Leave ID</b></th>
					<th width="16%" align="center"><b>Leave Type</b></th>
					<th width="20%" align="center"><b>Reason</b></th>
					<th width="16%" align="center"><b>Start Day</b></th> 
					<th width="16%" align="center"><b>End Day</b></th> 
					<th width="16%" align="center"><b>days</b></th> 
	           </tr>';  
	$content .= generateRowDetails($id);  
	$content .= '</table>'; 
	$pdf->writeHTML($content);
	ob_end_clean();  
	$pdf->Output($id . '.pdf', 'I');
?>