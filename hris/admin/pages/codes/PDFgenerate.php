<?php
	$pr = $_GET['id'];
	include_once('dbcon.php');
 	$conn = new mysqli('192.168.11.213', 'root', '', 'purchase');

	function generateRow($pr) {
		$contents = '';
		$conn = new mysqli('192.168.11.213', 'root', '', 'purchase');
		$sql = "SELECT * FROM tbl_request WHERE pr_number = '$pr' AND status = 'Approve' ";
		$query = $conn->query($sql);

		while($row = $query->fetch_assoc()){
			$contents .= "
			<tr>
				<td align='center'>".$row['code']."</td>
				<td align='center'>".$row['qty']."</td>
				<td align='center'>".$row['description']."</td>
				<td align='center'>".$row['priority']."</td>
			</tr>
			";
		}
		return $contents;
	}

	require_once('tcpdf/tcpdf.php');  
	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
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
	$pdf->SetFont('helvetica', '', 19); 

	$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));

	$pdf->AddPage();  

	$pdf->SetLineStyle( array( 'width' => 1, 'color' => array(0,0,0)));
	$pdf->Line(12,12,198,12); //top
	$pdf->Line(198,12,198,284); //right
	$pdf->Line(12,284,198,284); //down
	$pdf->Line(12,12,12,284);//left

	$pdf->SetLineStyle( array( 'width' => 0.5, 'color' => array(0,0,0)));
	$pdf->Line(195,55,15,55); //down
	$pdf->Line(195,15,15,15); //top
	$pdf->Line(195,15,195,55); //right

	$x = $pdf->pixelsToUnits('247');
	$y = $pdf->pixelsToUnits('95');
    $txt = "PURCHASE REQUISITION FORM";
	$pdf->Text  ( $x, $y, $txt, false, false, true, 0, 0, '', false, '', 0, false, 'T', 'M', false );

	$pdf->SetFont('helvetica', '', 10); 
	$textx = $pdf->pixelsToUnits('35');
	$texty = $pdf->pixelsToUnits('813');
    $amci = "AMCI-PU-REC-001";
	$pdf->Text  ( $textx, $texty, $amci, false, false, true, 0, 0, '', false, '', 0, true, 'T', 'M', true );

	$revx = $pdf->pixelsToUnits('135');
    $rev = "REV007";
	$pdf->Text  ( $revx, $texty, $rev, false, false, true, 0, 0, '', false, '', 0, true, 'T', 'M', true );

	$conx = $pdf->pixelsToUnits('250');
    $con = "CONFIDENTIAL";
	$pdf->Text  ( $conx, $texty, $con, false, false, true, 0, 0, '', false, '', 0, true, 'T', 'M', true );

	$genx = $pdf->pixelsToUnits('375');
    $gen = "THIS IS A SYSTEM GENERATED FILE ";
	$pdf->Text  ( $genx, $texty, $gen, false, false, true, 0, 0, '', false, '', 0, true, 'T', 'M', true );

	$pdf->SetXY(15, 15);
	$pdf->Image('texwipe.jpg', '', '', 70, 40, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

	$pdf->SetFont('helvetica', '', 12); 
	$content = "";
	$content .= "<br><br><br><br><br><br><br><br><br><br><br>";  
	$sql = "SELECT tbl_users.firstname as name,
        		tbl_request.pr_number as pr,
        		tbl_request.date_needed as date,
        		tbl_request.pr_date as pr_date
			FROM tbl_request
			INNER JOIN tbl_users
			ON tbl_request.emp_id = tbl_users.emp_id 
			WHERE tbl_request.pr_number = '$pr' GROUP BY pr_number ";
	$query = $conn->query($sql);

	while($row = $query->fetch_assoc()){
		$content .=  "
			<table >
				<tr>
				<td> Date Requested: " . $row['pr_date'] . "</td>
					<td> </td>
				</tr>
				<br>
				<tr>
					<td> Requested By: " . $row['name'] . "</td>
					<td> PR Number: " . $row['pr'] . "</td>
				</tr>
			</table>
		";
	}

	$content .= '
	      	<h2 align="center"></h2>
	      	<table border="1" cellspacing="0" cellpadding="3" align="center" style="width:100%">
	           <tr>  
					<th width="20%" align="center"><b>Code</b></th>
					<th width="20%" align="center"><b>Quantity</b></th>
					<th width="45%" align="center"><b>Description</b></th> 
					<th width="15%" align="center"><b>Date</b></th> 
	           </tr>';  
	$content .= generateRow($pr);  
	$content .= '</table>';  
	$pdf->writeHTML($content);  
	$pdf->Output($pr . '.pdf', 'I');
?>