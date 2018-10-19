<?php
session_start();

$GLOBALS['output'] = true;
if (!$_GET) {
    # code...
    
    $GLOBALS['output'] = false;
}

require_once 'dist/fpdf/fpdf.php';
class PDF extends FPDF
{
// Page header    
function Header()
{
    // Logo - left - top - width
    $this->Image('images/customer-shipping-quote-header.jpg',0,0,210);
    //(left, left-height, width, right-height)
    $this->Line(20,45,190,45);   
}

function customer() {


require 'inc/inc.connection.php';



if (isset($_SESSION['id']) && isset($_GET['id']) && isset($_GET['code']) ) {
    # code...
    $machine_id = preg_replace('/\D/', '', $_GET['id']);
    $shipping_id = preg_replace('/\D/', '', $_GET['code']);
    $sql = "SELECT a.name,a.company,a.email,a.phone,a.ext,b.* 
            FROM registers AS a
            INNER JOIN shipping_quote AS b
            ON 
            a.id = b.user_id
            WHERE 
            a.id='$_SESSION[id]' AND b.machine_id= '$machine_id' AND b.id = '$shipping_id' ";
}else if (isset($_GET['id']) && isset($_GET['user'])) {
    # code...

$machine_id = preg_replace('/\D/', '', $_GET['id']);
$user_id = preg_replace('/\D/', '', $_GET['user']);
$shipping_id = preg_replace('/\D/', '', $_GET['code']);

    $sql = "SELECT a.name,a.company,a.email,a.phone,a.ext,b.* 
            FROM registers AS a
            INNER JOIN shipping_quote AS b
            ON 
            a.id = b.user_id
            WHERE 
            a.id='$user_id' AND b.machine_id= '$machine_id' AND b.id = '$shipping_id'  ";
}else{
    $GLOBALS['output'] = false;
    echo "<body style='background-color: #2c3e50; padding-top: 100px;'>
        <h1 style='text-align:center; color: #FFF; font-size: 75;'>404</h1>
        <h3 style='text-align:center; color: #FFF;'>FILE NOT FOUND</h3>
    <p style='text-align:center; color: #FFF;'>The file you were looking for doesn't exist!</p>
    </body>";
    die();

}





$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {


$this -> SetY(50);
$this -> SetX(30);
$this ->SetTextColor(243,156,18);
$this->SetFont('Arial','',12); 
$this->Cell(250, 1, $row['name']);

$this->Ln(8);
$this -> SetX(30);
$this->SetTextColor(0,0,0);
$this->SetFont('Arial','',10); 
$this->Cell(250, 1, $row['email']);

$this->Ln(5);
$this -> SetX(30);
$this->SetTextColor(0,0,0);
$this->SetFont('Arial','',10); 
$this->Cell(250, 1, $row['phone']);

$this->Ln(5);
$this -> SetX(30);
$this->SetTextColor(0,0,0);
$this->SetFont('Arial','',10); 
$this->Cell(250, 1, $row['city'].", ".$row['state']. " ".$row['zip']);


$this -> SetY(57);
$this -> SetX(150);
$this->SetTextColor(0,0,0);
$this->SetFont('Arial','U',20); 
$this->Cell(250, 1, $row['ship_code']);

$this->Ln(5);
$this -> SetY(63);
$this -> SetX(150);
$this->SetTextColor(0,0,0);
$this->SetFont('Arial','',8); 
$this->Cell(250, 1, "QUOTATION CODE");


$this -> SetY(200);
// Logo - left - top - width
$this->Image('images/uploads/'.$row['press_image'],25,80,80);


$this -> SetY(85);
$this -> SetX(120);
$this->SetTextColor(0,0,0);
$this->SetFont('Arial','',10); 
$this->Cell(250, 1, "Model Number: ".$row['model_number']);

$this -> SetY(90);
$this -> SetX(120);
$this->SetTextColor(0,0,0);
$this->SetFont('Arial','',10); 
$this->Cell(250, 1, "Machine Type: ".$row['press_type']);

$this -> SetY(95);
$this -> SetX(120);
$this->SetTextColor(0,0,0);
$this->SetFont('Arial','',10); 
$this->Cell(250, 1, "Tonnage: ". $row['machine_tonnage'] ." Ton");

$this -> SetY(105);
$this -> SetX(120);
$this->SetTextColor(243,156,18);
$this->SetFont('Arial','',17); 
$this->Cell(250, 1, "$".$row['value']);

$this->SetTextColor(34,34,34);
$this -> SetFillColor(239, 239, 239);
$this->SetFont('Arial','',10); 

$this -> SetY(140);
$this -> SetX(20);

    //width, padding , color

$this->Cell(40,7,'Weight',0,0,'L',TRUE);
$this->Cell(40,7,$row['weight'],0,0,'L',TRUE);

$this->Ln(7);

$this -> SetX(20);
$this->Cell(40,7,'Dimension',0,0,'L',0);
$this->Cell(40,7,$row['dimension'],0,0,'L',0);

$this->Ln(7);

$this -> SetX(20);

$this->Cell(40,7,'Shipping Class',0,0,'L',TRUE);
$this->Cell(40,7,$row['shipping_class'],0,0,'L',TRUE);

$this->Ln(7);

$this -> SetX(20);
$this->Cell(40,7,'Condition',0,0,'L',0);
$this->Cell(40,7,$row['machine_condition'],0,0,'L',0);

$this->Ln(7);

$this -> SetX(20);

$this->Cell(40,7,'Delivery Type',0,0,'L',TRUE);
$this->Cell(40,7,$row['delivery_type'],0,0,'L',TRUE);

$this->Ln(7);

$this -> SetX(20);
$this->Cell(40,7,'Trailer',0,0,'L',0);
$this->Cell(40,7,$row['trailer'],0,0,'L',0);

$this->Ln(7);

$this -> SetX(20);

$this->Cell(40,7,'Pickup Date',0,0,'L',TRUE);
$this->Cell(40,7,$row['pickup_date'],0,0,'L',TRUE);

$this->Ln(7);

$this -> SetX(20);
$this->Cell(40,7,'Delivery Day',0,0,'L',0);
$this->Cell(40,7,$row['delivery_day'],0,0,'L',0);

$this->Ln(7);

$this -> SetX(20);

$this->Cell(40,7,'Base',0,0,'L',TRUE);
$this->Cell(40,7,$row['base'],0,0,'L',TRUE);

$this->Ln(7);

$this -> SetY(140);
$this -> SetX(110);

$this->Cell(40,7,'Stackable',0,0,'L',TRUE);
$this->Cell(40,7,$row['stackable'],0,0,'L',TRUE);

$this->Ln(7);

$this -> SetX(110);
$this->Cell(40,7,'Area',0,0,'L',0);
$this->Cell(40,7,$row['area'],0,0,'L',0);

$this->Ln(7);

$this -> SetX(110);

$this->Cell(40,7,'Loading Dock',0,0,'L',TRUE);
$this->Cell(40,7,$row['loading_dock'],0,0,'L',TRUE);

$this->Ln(7);

$this -> SetX(110);
$this->Cell(40,7,'Forklift',0,0,'L',0);
$this->Cell(40,7,$row['forklift'],0,0,'L',0);

$this->Ln(7);

$this -> SetX(110);

$this->Cell(40,7,'Forklift Capacity',0,0,'L',TRUE);
$this->Cell(40,7,$row['forklift_capacity'],0,0,'L',TRUE);

$this->Ln(7);

$this -> SetX(110);
$this->Cell(40,7,'Fork',0,0,'L',0);
$this->Cell(40,7,$row['fork'],0,0,'L',0);

$this->Ln(7);

$this -> SetX(110);
$this->Cell(40,7,'Building',0,0,'L',TRUE);
$this->Cell(40,7,$row['bldg'],0,0,'L',TRUE);

$this->Ln(7);

$this -> SetX(110);

$this->Cell(40,7,'Restriction Weight',0,0,'L',0);
$this->Cell(40,7,$row['restriction_weight'],0,0,'L',0);

$this->Ln(7);

$this -> SetX(110);
$this->Cell(40,7,'Insurance',0,0,'L',TRUE);
$this->Cell(40,7,$row['insurance'],0,0,'L',TRUE);



        $time = new DateTime($row['quotation_date']);
$date = $time->format('n.j.Y');




    // Position at 1.5 cm from bottom
    $this->SetY(270);
    $this->SetX(20);
    // Arial italic 8
    $this->SetFont('Arial','I',12);
    $this->SetTextColor(0, 0, 0);
    $this->Cell(250, 1, $row['site']);

    //     // Position at 1.5 cm from bottom
    // $this->SetY(270);
    // $this->SetX(160);
    // // Arial italic 8
    // $this->SetFont('Arial','I',12);
    // $this->Cell(250, 1, $row['invoice_date']);




  }
} else {
    echo "

    <body style='background-color: #2c3e50; padding-top: 100px;'>
        <h1 style='text-align:center; color: #FFF; font-size: 75;'>404</h1>
        <h3 style='text-align:center; color: #FFF;'>FILE NOT FOUND</h3>
    <p style='text-align:center; color: #FFF;'>The file you were looking for doesn't exist!</p>
    </body>

    ";
    $GLOBALS['output'] = false;
}



}
}




// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Customer();
if ($GLOBALS['output'] == true) {
    # code...
$pdf->Output();
}
