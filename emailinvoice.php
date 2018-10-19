<?php
require('fpdf/fpdf.php');
require('fpdf/WriteHTML.php');

require_once('./treyanusers.php');
mysqli_select_db($treyanusers, $database_treyan);
// join registers and newinformation
$id=$_GET['article_id'];
$users = "SELECT * FROM registers a INNER JOIN newinfo_tbl b ON a.id = b.newinfo_id WHERE a.id = '$id'";
$registers = mysqli_query($treyanusers, $users);
$rowReg = mysqli_fetch_assoc($registers);

$query_get_registered = "SELECT *, DATE_FORMAT(date, '%m-%d-%Y') AS registered FROM registers WHERE registers.id = $id";
$get_registered = mysqli_query($treyanusers, $query_get_registered) or die(mysql_error());
$row_get_registered = mysqli_fetch_assoc($get_registered);
$totalRows_get_parts = mysqli_num_rows($get_registered);



    $showInv = "SELECT * FROM invoice a INNER JOIN machines b ON a.machine_id = b.new_machine_id WHERE a.user_id = '$id'";
    $resShowInv = mysqli_query($treyanusers, $showInv);
    $countInv = mysqli_num_rows($resShowInv);


    $invoice = mysqli_real_escape_string($treyanusers, $_GET['invoiceno']);

    $invSql = "SELECT * FROM invoice a INNER JOIN machines b ON a.machine_id = b.new_machine_id WHERE a.invoice = '$invoice'";
    $resInv = mysqli_query($treyanusers, $invSql);
    $invSql1 = "SELECT * FROM invoice a INNER JOIN machines b ON a.machine_id = b.new_machine_id WHERE a.invoice = '$invoice'";
    $resInv1 = mysqli_query($treyanusers, $invSql1);
    $row_inv1 = mysqli_fetch_assoc($resInv1);

$pdf = new PDF_HTML('P', 'mm', 'A4');
$pdf->AddFont('Georgia','','Georgia.php');
$pdf->AddPage(); 
$pdf->SetFont('Arial', '', 12);
$pdf->Image('CJRlogo.png',20,2,50,'C');
$pdf -> SetY(10);
$pdf -> SetX(90);
$pdf->SetTextColor(194,8,8);
$pdf->SetFont(  '', 'B', '20' ); 
$pdf->Cell(250, 1, "INVOICE");
$pdf -> SetY(20);
$pdf -> SetX(100);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont(  '', '', '11' );
$pdf->Cell(100, 1, "Invoice Number:");
$pdf -> SetX(150);
$pdf->Cell(250, 1, $invoice);
$pdf->Ln(10);
$pdf -> SetX(100);
$pdf->Cell(100, 1, "Date:");
$pdf -> SetX(150);
$pdf->Cell(250, 1, $row_inv1['invoicedate']);
$pdf->Ln(10);
$pdf -> SetY(50);
$pdf -> SetX(10);
$pdf->SetFont(  '', '', '15' );
$pdf->Cell(100, 1, "Seller:");
$pdf -> SetX(100);
$pdf->Cell(100, 1, "Buyer:");
$pdf->Ln(10);
$pdf -> SetX(10);
$pdf->SetFont(  '', '', '14' );
$pdf->Cell(100, 1, "CJR Distributing");
$pdf->Ln(10);
$pdf->SetFont(  'Georgia', '', '12' );
$pdf->Cell(100, 1, "441 W. 12300 S.  Ste A600");
$pdf->Ln(5);
$pdf->Cell(100, 1, "Draper, Utah  84020");
$pdf->Ln(5);
$pdf->Cell(100, 1, "P. 800 733 2302 F. 888 368 4111");
$pdf -> SetX(100);
$pdf -> Sety(50);
$pdf->Ln(10);
$pdf -> SetX(100);
$pdf->SetFont(  '', '', '14' );
$pdf->Cell(50, 1, $rowReg['company']);
$pdf->SetFont(  'Georgia', '', '12' );
$pdf->Cell(100, 1, $rowReg['name']);
$pdf->Ln(10);
$pdf -> SetX(100);
$pdf->Cell(100, 1, ucfirst(strtolower($rowReg['city'])) ." ".$rowReg['state'] .", ".$rowReg['zip_code'] ." ".$rowReg['country']);
$pdf->Ln(5);
$pdf -> SetX(100);
$pdf->Cell(100, 1, "Ph.".$rowReg['phone']);
$pdf -> SetY(90); 
$pdf -> SetX(10);
$pdf->SetFillColor(11, 47, 132);
$pdf->SetTextColor(241,255,153);
$pdf->Cell(40,5,'Model Number',1,0,'C', TRUE);
$pdf->Cell(45,5,'Machine Type',1,0,'C', TRUE);
$pdf->Cell(20,5,'Ton',1,0,'C', TRUE);
$pdf->Cell(30,5,'Unit Cost',1,0,'C', TRUE);
$pdf->Cell(30,5,'QTY',1,0,'C', TRUE);
$pdf->Cell(30,5,'Total',1,0,'C', TRUE);
$pdf->Ln(5);
$pdf->SetTextColor(0,0,0);
$subtotal=0;
while($row_inv = mysqli_fetch_assoc($resInv)){
$pdf->Cell(40,5,$row_inv['machine_tonnage']."-".$row_inv['type_abbr']."-".$row_inv['cnc']."-".$row_inv['factory']."-".$row_inv['customized'],1,0,'C');
$pdf->Cell(45,5,$row_inv['machine_type'],1,0,'C');
$pdf->Cell(20,5,$row_inv['machine_tonnage'],1,0,'C');
$pdf->Cell(30,5,'$'.$row_inv['unit_price'],1,0,'C');
$qty = $row_inv['quantity'];
$unit = str_replace(",", "", $row_inv['unit_price']);
$calc = $unit * $qty;
$pdf->Cell(30,5,$qty,1,0,'C');
$pdf->Cell(30,5,'$'.number_format($calc, 2),1,0,'C');
$pdf->Ln(5);
$subtotal=$subtotal+$unit;
}

$pdf->Cell(195,5,'',1,0,'C');
$pdf->Ln(5);
$pdf->Cell(105,5,'',1,0,'C');
$pdf->Cell(30,5,'Sub-Total',1,0,'R');
$pdf->Cell(30,5,'$',1,0,'R');
$pdf->Cell(30,5,number_format($subtotal, 2),1,0,'C');
$pdf->Ln(5);
$pdf->Cell(105,5,'',1,0,'C');
$pdf->Cell(30,5,'Amount Tax',1,0,'R');
$pdf->Cell(30,5,'$',1,0,'R');
$pdf->Cell(30,5,$row_inv1['tax'],1,0,'C');
$pdf->Ln(5);
$pdf->Cell(105,5,'',1,0,'C');
$pdf->Cell(30,5,'Grand Total',1,0,'R');
$pdf->Cell(30,5,'$',1,0,'R');
$pdf->Cell(30,5,number_format($row_inv1['grandtotal'], 2),1,0,'C');
$pdf->Ln(10);

//terms column 1
$term_column_one = explode('</p>', $row_inv1['term_column_one']);
$count = count($term_column_one);
$pdf->SetFont(  'Georgia', '', '12' );
for ($i=0; $i < $count; $i++) {
	if($i>1){
		 $term_column_one[$i] = substr($term_column_one[$i], 1);
	}
	if (strpos($term_column_one[$i], '<strong>') !== false) {
 		$pdf->SetFont(  'Helvetica', 'B', '11' );
		$term_column_one[$i] =  str_replace("<p>","",$term_column_one[$i]);
		$term_column_one[$i] =  str_replace("<strong>","",$term_column_one[$i]);
		$term_column_one[$i] =  str_replace("</strong>","",$term_column_one[$i]);
		$pdf->Multicell(60,5,$term_column_one[$i]);
 	}
 	else{
		$pdf->SetFont(  'Helvetica', '', '10' );
	 	if (strpos($term_column_one[$i], '<span') !== false) {
	 		$pdf->SetTextColor(194,8,8);
		}
 		$term_column_one[$i] =  str_replace("<p>","",$term_column_one[$i]);
		$term_column_one[$i] =  str_replace("<strong>","",$term_column_one[$i]);
		$term_column_one[$i] =  str_replace("</strong>","",$term_column_one[$i]);
		$term_column_one[$i] =  str_replace("</span>","",$term_column_one[$i]);
		$term_column_one[$i] =  str_replace('<span style="color: #ff0000;">','',$term_column_one[$i]);
		$pdf->Multicell(80,5,$term_column_one[$i]);
		$pdf->SetTextColor(0, 0, 0); 
	}
}


//term column 2
$pdf -> SetX(70);
$pdf -> SetY(125);
$term_column_two = explode('</p>', $row_inv1['term_column_two']);
$count = count($term_column_two);
$pdf->SetFont(  'Georgia', '', '11' );
for ($i=0; $i < $count; $i++) {
	if($i>1){
		 $term_column_two[$i] = substr($term_column_two[$i], 1);
	}
	if (strpos($term_column_two[$i], '<strong>') !== false) {
 		$pdf->SetFont(  'Helvetica', 'B', '11' );
 		$pdf -> SetX(100);
		$term_column_two[$i] =  str_replace("<p>","",$term_column_two[$i]);
		$term_column_two[$i] =  str_replace("<strong>","",$term_column_two[$i]);
		$term_column_two[$i] =  str_replace("</strong>","",$term_column_two[$i]);
		$pdf->Multicell(70,5,$term_column_two[$i]);
 	}
 	else{
		$pdf->SetFont(  'Helvetica', '', '10' );
	 	if (strpos($term_column_two[$i], '<span') !== false) {
	 		$pdf->SetTextColor(194,8,8);
		}
		$pdf -> SetX(100);
 		$term_column_two[$i] =  str_replace("<p>","",$term_column_two[$i]);
		$term_column_two[$i] =  str_replace("<strong>","",$term_column_two[$i]);
		$term_column_two[$i] =  str_replace("</strong>","",$term_column_two[$i]);
		$term_column_two[$i] =  str_replace("</a>","",$term_column_two[$i]);
		$term_column_two[$i] =  str_replace('<a href="www.cjrterms.com">','',$term_column_two[$i]);
		$pdf->Multicell(95,5,$term_column_two[$i]);
		$pdf->SetTextColor(0, 0, 0); 
	}
}

$pdf->AddFont('Georgia','','Georgia.php');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf -> SetY(20);
$pdf -> SetX(90);
$pdf->SetTextColor(194,8,8);
$pdf->SetFont(  '', 'B', '20' ); 
$pdf->Cell(250, 1, "INVOICE");
$pdf -> SetY(30);
$pdf -> SetX(100);
$pdf->Image('http://www.cjrtec.com/images/uploads/'.$row_inv1['img_main'],10,25,70,'C');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont(  '', '', '11' );
$pdf->Cell(100, 1, "Invoice Number:");
$pdf -> SetX(150);
$pdf->Cell(250, 1, $invoice);
$pdf->Ln(10);
$pdf -> SetX(100);
$pdf->Cell(100, 1, "Date:");
$pdf -> SetX(150);
$pdf->Cell(250, 1, $row_inv1['invoicedate']);
$pdf -> SetY(80);
$pdf -> SetX(80);
$pdf->SetFont(  '', 'B', '20' );
$pdf->Cell(250, 1, "Specifications");

$pdf -> SetY(90);
$fields = explode(';', $row_inv1['fields']);
$values = explode(';', $row_inv1['values']);
$count = count($fields);
$pdf->SetFont(  'Georgia', '', '12' );
for ($i=0; $i < $count; $i++) { 
if ($fields[$i]!='Video'){
$pdf->Cell(95,5,$fields[$i],1,0,'L');
$pdf->Cell(95,5,$values[$i],1,0,'C');
$pdf->Ln(5);  
   }                                   
}
$pdf->Ln(5); 
$pdf -> SetX(80);
$pdf->SetFont(  'Helvetica', 'B', '20' );
$pdf->Cell(250, 1, "Customizations");
$description = explode(';', $row_inv1['description']);
foreach ($description as $key => $value) {
$pdf->Cell(95,5,$value,1,0,'C');
$pdf->Ln(5);  
}

$pdf->WriteHTML('<hr>');
$pdf->Ln(5); 
$pdf -> SetX(10);
$pdf->SetFont(  'Georgia', '', '13' );
$pdf->Cell(100, 1, "Date:");
$pdf -> SetX(70);
$pdf->Cell(100, 1, "Name:");
$pdf -> SetX(130);
$pdf->Cell(100, 1, "Signature:");
$pdf->Ln(5);
$pdf -> SetX(10);
$pdf->Cell(100, 1, "__________________");
$pdf -> SetX(70);
$pdf->Cell(100, 1, "__________________");
$pdf -> SetX(130);
$pdf->Cell(100, 1, "__________________");
$pdf->Ln(10);
$pdf->SetFont(  'Georgia', '', '10' );
$pdf->WriteHTML('<p align="center">Please Sign Both Pages and Fax to 888.368.4111</p>');
$pdf->WriteHTML('<p align="center">Send Two Original Copies By Mail</p>');

$pdf->Output();


// email stuff (change data below)
$to = $rowReg['email']; 
$from = "Support@CJRtec.com"; 
$subject = "Invoice"; 
$message = "<p>Please see the attachment.</p>";

// a random hash will be necessary to send mixed content
$separator = md5(time());

// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;

// attachment name
$filename = "invoice.pdf";

// encode data (puts attachment in proper format)
$pdfdoc = $pdf->Output("", "S");
$attachment = chunk_split(base64_encode($pdfdoc));

// main header
$headers  = "From: ".$from.$eol;
$headers .= "MIME-Version: 1.0".$eol; 
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

// no more headers after this, we start the body! //

$body = "--".$separator.$eol;
$body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
$body .= "This is a MIME encoded message.".$eol;

// message
$body .= "--".$separator.$eol;
$body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$body .= $message.$eol;

// attachment
$body .= "--".$separator.$eol;
$body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol; 
$body .= "Content-Transfer-Encoding: base64".$eol;
$body .= "Content-Disposition: attachment".$eol.$eol;
$body .= $attachment.$eol;
$body .= "--".$separator."--";

// send message
mail($to, $subject, $body, $headers);

?>